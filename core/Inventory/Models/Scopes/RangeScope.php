<?php

namespace Core\Inventory\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class RangeScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (request()->min) {
            $builder->where('price', '>=', request()->min);
        }

        if (request()->max) {
            $builder->where('price', '<=', request()->max);
        }
    }
}
