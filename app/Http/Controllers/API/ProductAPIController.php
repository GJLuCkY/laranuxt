<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $products = Product::with('category')->paginate(1);

        if($request->has('search') && !empty($request->get('search')))  {
            $products = Product::search($request->get('search'))->paginate(1);
        } else {
            $products = Product::paginate(1);
        }

        return ProductResource::collection($products);
    }

    public function getProduct($catSlug, $productSlug)
    {
        $product = Product::where('slug', $productSlug)
                    ->whereHas('category', function ($q) use ($catSlug) {
                        $q->where('slug', $catSlug);
                        // $q->orWhereHas('parent', function ($q2) use ($catSlug) {
                        //     $q2->where('slug', $catSlug);
                        // });
                    })    
                    ->first();

        if(is_null($product)) {
            return response()->json([
                'message'   =>  'Product not found!'
            ], 404);
        }

        return response()->json([
            'data' => new ProductResource($product),
            'message'   =>  'Product successfully retrieved!'
        ]);
    }
    
}
