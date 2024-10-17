<?php

namespace Core\Inventory\Models;

use Core\Base\Models\Base;

class Product extends Base
{
    /**
     * Get the items
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(\Core\Sale\Models\Item::class);
    }
}