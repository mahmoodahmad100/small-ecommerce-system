<?php

namespace Core\Sale\Observers;

use Core\Sale\Models\Order;
use Core\Inventory\Models\Product;

class OrderObserver
{
    /**
     * Handle the Order "saving" event.
     */
    public function saving(Order $order): void
    {
        if (request()->items) {
            $newItems = [];
            $order->items()->delete();
            $order->subtotal = 0;
            $order->tax      = 0;
            $order->total    = 0;

            foreach (request()->items as $item) {
                $product          = Product::find($item['product_id']);
                $order->subtotal += $product->price * $item['quantity'];
                $newItems[] = array_merge($item, [
                    'price' => $product->price,
                ]);
            }

            $order->items()->createMany($newItems);
            $order->tax   = ($order->subtotal * config('core_sale.tax')) / 100;
            $order->total = $order->subtotal + $order->tax;
        }
    }

    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        // an email notification will be sent to the admin.
        logger('an email notification will be sent to the admin', $order->toArray());
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleting" event.
     */
    public function deleting(Order $order): void
    {
        $order->items()->delete();
    }
}
