<?php

namespace Core\Inventory\Observers;

use Core\Inventory\Models\Category;

class CategoryObserver
{
    /**
     * Handle the Category "deleting" event.
     */
    public function deleting(Category $category): void
    {
        foreach ($category->products as $product) {
            $product->update(['category_id' => null]);
        }
    }
}
