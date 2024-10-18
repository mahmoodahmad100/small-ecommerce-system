<?php

namespace Core\Auth\Resources;

use Illuminate\Http\Resources\Json\JsonResource as Resource;
use Core\Sale\Resources\OrderResource;

class UserResource extends Resource
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
            'name'  => $this->name,
            'email' => $this->email,
            $this->mergeWhen($request->route()->getName() == 'api.v1.users.show', [
                'orders' => OrderResource::collection($this->orders)
            ])
        ];
    }
}
