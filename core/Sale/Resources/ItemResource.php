<?php

namespace Core\Sale\Resources;

use Illuminate\Http\Resources\Json\JsonResource as Resource;

class ItemResource extends Resource
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
            'id'    => $this->id,
            'price' => $this->price,
            $this->mergeWhen($request->route()->getName() == 'api.v1.items.show', [

            ])
        ];
    }
}
