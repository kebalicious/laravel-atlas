<?php namespace LaravelAtlas;

use Route;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider {

/**
 * Register.
 *
 * @return
 */
public function register()
{
//
}

/**
 * Boot.
 *
 * @return void
 */
public function boot()
{
$this->mergeConfigFrom(
__DIR__ . '/../config.php', 'laravel-atlas'
);

if (config('laravel-atlas.debug_only', true) && empty(config('app.debug'))) {
return;
}

$this->loadViewsFrom(realpath(__DIR__ . '/../views'), 'laravel-atlas');

$this->publishes([
__DIR__ . '/../config.php' => config_path('laravel-atlas.php')
]);

Route::get(config('laravel-atlas.url'), 'LaravelAtlas\LaravelAtlasController@show')
->name('laravel-atlas.show')
->middleware(config('laravel-atlas.middlewares'));
}

}
