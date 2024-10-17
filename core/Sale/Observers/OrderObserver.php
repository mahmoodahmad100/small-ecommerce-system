<?php

namespace Core\Sale\Observers;

use Core\Sale\Models\Order;

class OrderObserver
{
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
