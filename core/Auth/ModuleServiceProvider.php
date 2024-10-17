<?php

namespace Core\Auth;

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
        $this->loadFiles(__DIR__, 'auth');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::enforceMorphMap([
            'users' => 'Core\Auth\Models\User',
        ]);
    }
}
