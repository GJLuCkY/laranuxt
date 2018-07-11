<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;

class CategoryAPIController extends Controller
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    
    // public function index()
    // {
    //     $categories = $this->category->getTree();

    //     return response()->json([
    //         'message' => 'Category tree successfully retrieved!',
    //         'data'  => $categories
    //     ]);
    // }


    public function getCategoryBySlug($slug)
    {
        $category = $this->category->where('slug', $slug)->first();

        if(is_null($category)) {
            return response()->json([
                'message'   =>  'Category not found!'
            ], 404);
        }

        return response()->json([
            'message'   =>  'Category successfully retrieved',
            'data'      =>  new CategoryResource($category)        
        ]);
    }

    public function getCategoryProducts($slug, Request $request)
    {
        $category = $this->category->where('slug', $slug)->first();

        if(is_null($category)) {
            return response()->json([
                'message'   =>  'Category not found!'
            ], 404);
        }
        
        if($request->has('search') && !empty($request->get('search')))  {
            $products = $category->products()->search($request->get('search'))->paginate(16);
        } else {
            $products = $category->products()->paginate(16);
        }

        return ProductResource::collection($products)
                ->additional([
                    'message'   =>  'Category (' .$category->name.') products successfully retrieved!',
                    'meta'      =>  [
                        'category'  =>  new CategoryResource($category)
                    ]
                ]);
    }

    public function getSubCategoryProducts($catSlug, $subCatSlug, Request $request)
    {
        $category = $this->category->whereHas('parent', function ($q) use ($catSlug) {
            $q->where('slug', $catSlug);
        })->where('slug', $subCatSlug)->first();

        if (is_null($category)) {
            return response()->json([
                'message'   =>  'Category not found!'
            ], 404);
        }

        if($request->has('search') && !empty($request->get('search')))  {
            $products = $category->products()->search($request->get('search'))->paginate(16);
        } else {
            $products = $category->products()->paginate(16);
        }

        return ProductResource::collection($products)
                ->additional([
                    'message'   =>  'Category (' .$category->name.') products successfully retrieved!',
                    'meta'      =>  [
                        'category'  =>  new CategoryResource($category)
                    ]
                ]);
    }

    public function getProductByCategoryAndProductSlug($catSlug, $productSlug)
    {
        $product = Product::where('slug', $productSlug)
                    ->whereHas('category', function ($q) use ($catSlug) {
                        $q->where('slug', $catSlug);
                        $q->orWhereHas('parent', function ($q2) use ($catSlug) {
                            $q2->where('slug', $catSlug);
                        });
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

    public function getFeaturedCategories()
    {
        $categories = $this->category->featured()->get();
        return response()->json([
            'data'      =>  CategoryResource::collection($categories),
            'message'   =>  'Featured categories successfully retrieved.'
        ]);
    }

    public function getCategories()
    {
        $categories = $this->category->get();
        return response()->json([
            'data'      =>  CategoryResource::collection($categories),
            'message'   =>  'Categories successfully retrieved.'
        ]);
    }



    
}
