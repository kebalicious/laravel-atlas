<?php

namespace LaravelAtlas;

use Route;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Register.
     *
     * @return void
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
            __DIR__ . '/../config.php',
            'laravel-atlas'
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

        $this->app->booted(function () {
            $sourcePath = base_path('vendor/kebalicious/laravel-atlas/resources');;
            $destinationPath = public_path('/vendor/laravel-atlas');

            $this->recursiveCopy($sourcePath, $destinationPath);

            // echo "LaravelAtlas assets have been successfully copied to the Laravel public folder.\n";
        });
    }

    protected function recursiveCopy($source, $destination)
    {
        $directory = opendir($source);

        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        while ($file = readdir($directory)) {
            if ($file !== "." && $file !== "..") {
                $sourceFile = $source . '/' . $file;
                $destinationFile = $destination . '/' . $file;

                if (is_dir($sourceFile)) {
                    $this->recursiveCopy($sourceFile, $destinationFile);
                } else {
                    copy($sourceFile, $destinationFile);
                }
            }
        }

        closedir($directory);
    }
}
