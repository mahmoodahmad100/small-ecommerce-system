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
        $route_name = $request->route()->getName();
        return [
            'id'    => $this->id,
            'price' => $this->price,
            $this->mergeWhen($route_name == 'api.v1.items.show', [
                'order'   => $this->when($this->itemable_type == 'orders', new OrderResource($this->itemable)),
            ]),
            $this->mergeWhen(in_array($route_name, ['api.v1.items.show', 'api.v1.orders.show']), [
                'product' => new ProductResource($this->product)
            ])
        ];
    }
}
