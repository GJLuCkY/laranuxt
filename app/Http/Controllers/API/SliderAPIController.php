<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Http\Resources\SliderResource;
use Illuminate\Http\Request;

class SliderAPIController extends Controller {


    
    public function getSliders()
    {
        $sliders = Slider::where('active', 1)->get();
       // dd($sliders);
        if(is_null($sliders)) {
            return response()->json([
                'message'   =>  'Slider not found!'
            ], 404);
        }

        return SliderResource::collection($sliders)
                ->additional([
                    'message'   =>  'Слайдеры загружены',
                    
                ]);
    }
}