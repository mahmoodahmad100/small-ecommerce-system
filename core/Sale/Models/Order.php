<?php

namespace Core\Sale\Models;

use Core\Base\Models\Base;

class Order extends Base
{
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
