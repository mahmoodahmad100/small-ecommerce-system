<?php

namespace Core\Inventory;

use Illuminate\Support\ServiceProvider;
use Core\Base\Traits\ServiceProvider\File;
use Illuminate\Database\Eloquent\Relations\Relation;
use Core\Inventory\Models\Product;
use Core\Inventory\Observers\ProductObserver;

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
        $this->loadFiles(__DIR__, 'inventory');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Product::observe(ProductObserver::class);

        Relation::enforceMorphMap([
            'products' => 'Core\Inventory\Models\Product',
        ]);
    }
}
