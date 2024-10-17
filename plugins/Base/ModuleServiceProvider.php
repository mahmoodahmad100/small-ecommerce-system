<?php

namespace Plugins\Base;

use Illuminate\Support\ServiceProvider;
use Core\Base\Traits\ServiceProvider\File;
use Core\Base\Traits\ServiceProvider\Module;

class ModuleServiceProvider extends ServiceProvider
{
    use File, Module;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadFiles(__DIR__, 'base', true);
        $this->registerModules(true);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
