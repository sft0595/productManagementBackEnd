<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'meta_description' => $this->meta_description,
            'categories' => CategoryResource::collection($this->categories),
            'attrvalues' => $this->attrvalues()->with('attribute')->get(),
            'varities' => $this->varities()->get(),
        ];
    }
}
