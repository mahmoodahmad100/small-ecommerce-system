<?php

namespace Core\Inventory\Models;

use Core\Base\Models\Base;

class Category extends Base
{
    /**
     * Get the products
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
