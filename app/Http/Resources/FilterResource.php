<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilterResource extends JsonResource
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
            'category_id'           =>  $this->category_id,
            //'catSlug'               =>  $this->category->slug,
            //'status'                =>  $this->status == 1 ? 'В наличии' : 'Нет в наличии',
            //'excerpt'               =>  $this->withFakes()->excerpt,
            //'characteristics'       =>  $this->when($this->requestHasAttribute($request->get('with'), 'characteristics'), json_decode($this->withFakes()->characteristics)),
            // 'apointment'            =>  $this->when($this->requestHasAttribute($request->get('with'), 'appointment'), $this->withFakes()->appointment),
            // 'application_area'      =>  $this->when($this->requestHasAttribute($request->get('with'), 'application_area'), $this->withFakes()->application_area),
            // 'consumer_properties'   =>  $this->when($this->requestHasAttribute($request->get('with'), 'consumer_properties'), $this->withFakes()->consumer_properties),
            // 'recommendations'       =>  $this->when($this->requestHasAttribute($request->get('with'), 'recommendations'), $this->withFakes()->recommendations),
            //'image'             =>  asset('/uploads/'.$this->image),
            //'content'           =>  $this->content
            'values'              =>  ValueResource::collection($this->values)
        ];
    }

    protected function includeHasAttribute($attributes, $attribute)
    {
        $attributes = explode(',', $attributes);
        
        return in_array($attribute, $attributes);
    }
}
