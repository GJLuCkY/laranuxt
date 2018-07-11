<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title'      =>  $this->title,
            'products'  => $this->when($this->includeHasAttribute($request->get('include'), 'products'), ProductResource::collection($this->products()->paginate(9))),
            'slug'      =>  $this->slug
        ];
    }

    protected function includeHasAttribute($attributes, $attribute)
    {
        $attributes = explode(',', $attributes);
        
        return in_array($attribute, $attributes);
    }
}
