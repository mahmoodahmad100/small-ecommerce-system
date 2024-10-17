<?php

namespace Core\Inventory\Observers;

use Core\Inventory\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleting" event.
     */
    public function deleting(Product $product): void
    {
        foreach ($product->items as $item) {
            $item->update(['product_id' => null]);
        }
    }
}
