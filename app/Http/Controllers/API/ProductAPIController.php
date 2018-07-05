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
        $products = Product::paginate(16);

        if($request->has('search') && !empty($request->get('search')))  {
            $products = Product::search($request->get('search'))->paginate(16);
        } else {
            $products = Product::paginate(16);
        }

        return ProductResource::collection($products);
    }
    
}
