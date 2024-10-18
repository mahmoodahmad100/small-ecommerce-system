<?php

namespace Core\Sale;

use Illuminate\Support\ServiceProvider;
use Core\Base\Traits\ServiceProvider\File;
use Illuminate\Database\Eloquent\Relations\Relation;
use Core\Sale\Models\Order;
use Core\Sale\Observers\OrderObserver;
use Core\Sale\Models\Item;
use Core\Sale\Observers\ItemObserver;

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
        Order::observe(OrderObserver::class);
        Item::observe(ItemObserver::class);

        Relation::enforceMorphMap([
            'orders' => 'Core\Sale\Models\Order',
            'Item'   => 'Core\Sale\Models\Item',
        ]);
    }
}
