<?php

namespace Core\Inventory\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ContentScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (request()->search) {
            $search = request()->search;
            $builder->where('name', 'like', "%$search%")->orWhere('description', 'like', "%$search%");
        }
    }
}
