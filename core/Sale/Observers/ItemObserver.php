<?php

namespace Core\Sale\Observers;

use Core\Sale\Models\Item;

class ItemObserver
{
    /**
     * Handle the Item "saved" event.
     */
    public function saved(Item $item): void
    {
        if ($item->isDirty()) {
            $item->product->decrement('quantity', $item->quantity);
        }
    }
}
