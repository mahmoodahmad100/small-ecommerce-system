<?php

namespace Core\Inventory\Resources;

use Illuminate\Http\Resources\Json\JsonResource as Resource;

class CategoryResource extends Resource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            $this->mergeWhen($request->route()->getName() == 'api.v1.categories.show', [
                'products' => ProductResource::collection($this->whenLoaded('products'))
            ])
        ];
    }
}