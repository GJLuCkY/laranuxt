<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //dd($request);

        return [
            'id'                =>  $this->id,
            'title'             =>  $this->title,
            'description'       =>  $this->description,
            'image'             =>  asset('/uploads/'.$this->image)
        ];
    }

    // protected function requestHasAttribute($request, $attribute)
    // {
    //    $attributes = explode(',', $request);
       
    //     return in_array($attribute, $attributes);
    // }

    // protected function getUrl()
    // {
    //     return isset($this->category->parent) ? '/catalog/'. $this->category->parent->slug . '/' . $this->slug : '/catalog/' . $this->category->slug . '/' . $this->slug;
    // }
}
