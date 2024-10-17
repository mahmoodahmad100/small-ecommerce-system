<?php

namespace Core\Sale\Controllers\API\V1;

use Core\Sale\Requests\ItemRequest as FormRequest;
use Core\Sale\Models\Item as Model;
use Core\Sale\Resources\ItemResource as Resource;

class ItemController extends \Core\Base\Controllers\API\Controller
{
    /**
     * Init.
     *
     * @param FormRequest $request
     * @param Model       $model
     * @param string      $resource
     */
    public function __construct(FormRequest $request, Model $model, $resource = Resource::class)
    {
        parent::__construct($request, $model, $resource);
    }
}
