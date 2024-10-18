<?php

namespace Core\Sale\Tests\Feature;

use Core\Base\Tests\ApiTestCase;
use Core\Sale\Models\Order as Model;
use Core\Inventory\Models\Product;

class OrderTest extends ApiTestCase
{
    /**
     * setting up
     *
     * @throws \ReflectionException
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->base_url     = $this->getApiBaseUrl() . 'orders/';
        $this->model        = new Model();
        $this->data         = $this->model::factory()->make()->toArray();
        $this->json         = $this->getJsonStructure();
        $this->json['data'] = ['id'];

        foreach ($this->data as $key => $value) {
            if ($key == 'user_id') {
                continue;
            }

            $this->json['data'][] = $key;
        }
    }

    /**
     * set request data for create/update
     */
    protected function setRequestData()
    {
        $product             = Product::factory()->create(['quantity' => 10]);
        $this->data['items'] = [
            [
                'product_id' => $product->id,
                'quantity'   => 2
            ],
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function testItShouldStoreNewlyCreatedResource()
    {
        $this->setRequestData();
        parent::testItShouldStoreNewlyCreatedResource();
    }

    /**
     * update a resource in storage.
     *
     * @return void
     */
    public function testItShouldUpdateSpecifiedResource()
    {
        $this->setRequestData();
        parent::testItShouldUpdateSpecifiedResource();
    }
}
