<?php

namespace Backpack\NewsCRUD;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class NewsCRUDServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // publish migrations
        $this->publishes([__DIR__.'/database/migrations' => database_path('migrations')], 'migrations');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Backpack\NewsCRUD\app\Http\Controllers'], function ($router) {
            \Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['web', 'admin'], 'namespace' => 'Admin'], function () {
                \CRUD::resource('article', 'ArticleCrudController');
                \CRUD::resource('category', 'CategoryCrudController');
                \CRUD::resource('tag', 'TagCrudController');
            });
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // register its dependencies
        $this->app->register(\Cviebrock\EloquentSluggable\ServiceProvider::class);

        $this->setupRoutes($this->app->router);
    }
}
