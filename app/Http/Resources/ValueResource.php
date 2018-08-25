<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ValueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this->filters);
        return [
            'title'                    =>  $this->title,
            //'title'                  =>  $this->title,
            //'url'                   =>  $this->getUrl(),
            'slug'                  =>  $this->slug,
            
        ];
    }

    protected function includeHasAttribute($attributes, $attribute)
    {
        $attributes = explode(',', $attributes);
        
        return in_array($attribute, $attributes);
    }
}
