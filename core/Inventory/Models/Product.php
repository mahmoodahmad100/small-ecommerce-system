<?php

namespace Core\Inventory\Models;

use Core\Base\Models\Base;

class Product extends Base
{
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new Scopes\ContentScope);
        static::addGlobalScope(new Scopes\RangeScope);
    }

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