<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Filter;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\FilterResource;

class FilterAPIController extends Controller
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategoryFilters($slug, Request $request)
    {
        $category = $this->category->where('slug', $slug)->first();

        if(is_null($category)) {
            return response()->json([
                'message'   =>  'Category not found!'
            ], 404);
        }
        
        //if($request->has('search') && !empty($request->get('search')))  {
            $filters = $category->filters()->get();
        // } else {
        //     $products = $category->products()->paginate(16);
        // }

        return FilterResource::collection($filters);
    }
}