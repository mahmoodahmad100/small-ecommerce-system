<?php

namespace Core\Sale;

use Illuminate\Support\ServiceProvider;
use Core\Base\Traits\ServiceProvider\File;
use Illuminate\Database\Eloquent\Relations\Relation;

class ModuleServiceProvider extends ServiceProvider
{
    use File;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadFiles(__DIR__, 'sale');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::enforceMorphMap([
            'orders' => 'Core\Sale\Models\Order',
            'Item'   => 'Core\Sale\Models\Item',
        ]);
    }
}
