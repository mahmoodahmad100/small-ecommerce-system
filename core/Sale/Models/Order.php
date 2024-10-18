<?php

namespace Core\Sale\Models;

use Core\Base\Models\Base;

class Order extends Base
{
    /**
     * Get the user
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function user()
    {
        return $this->belongsTo(\Core\Auth\Models\User::class);
    }

    /**
     * Get the items
     * 
     * @return Illuminate\Database\Eloquent\Relations\MorphMany;
     */
    public function items()
    {
        return $this->morphMany(Item::class, 'itemable');
    }
}
