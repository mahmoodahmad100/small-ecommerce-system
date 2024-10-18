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
            $newItems        = [];
            $order->subtotal = 0;
            $order->tax      = 0;
            $order->total    = 0;

            foreach (request()->items as $item) {
                $product = Product::find($item['product_id']);

                /**
                 * No need for middleware to check if the product exists and quantity is available.
                 */
                if (!$product) {
                    abort(400, 'The product does not exist.');
                }
                
                if ($item['quantity'] > $product->quantity) {
                    abort(400, 'The quantity is not available.');
                }

                $order->subtotal += $product->price * $item['quantity'];
                $newItems[] = array_merge($item, [
                    'price' => $product->price,
                ]);
            }
            
            $order->tax   = ($order->subtotal * config('core_sale.tax')) / 100;
            $order->total = $order->subtotal + $order->tax;
            cache()->put('current-order-items', $newItems, now()->addMinutes(10));
        }
    }

    /**
     * Handle the Order "saved" event.
     */
    public function saved(Order $order): void
    {
        if (cache()->has('current-order-items')) {
            $order->items()->delete();
            $order->items()->createMany(cache()->get('current-order-items'));
            cache()->forget('current-order-items');
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
