<?php

namespace Core\Sale\Models;

use Core\Base\Models\Base;

class Item extends Base
{
    /**
     * Get the parent itemable model (order for now, but it can be anything else like invoice ...etc).
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function itemable()
    {
        return $this->morphTo();
    }

    /**
     * Get the product
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(\Core\Inventory\Models\Product::class);
    }
}
