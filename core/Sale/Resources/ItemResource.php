<?php

namespace Core\Sale\Resources;

use Illuminate\Http\Resources\Json\JsonResource as Resource;
use Core\Inventory\Resources\ProductResource;

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
                'product' => new ProductResource($this->product),
                'orders'  => $this->when($this->itemable_type == 'orders', new OrderResource($this->itemable)),
            ])
        ];
    }
}
