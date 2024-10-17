<?php

namespace Core\Sale\Resources;

use Illuminate\Http\Resources\Json\JsonResource as Resource;

class OrderResource extends Resource
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
            'id'       => $this->id,
            'tax'      => $this->tax,
            'subtotal' => $this->subtotal,
            'total'    => $this->total,
            $this->mergeWhen($request->route()->getName() == 'api.v1.orders.show', [

            ])
        ];
    }
}