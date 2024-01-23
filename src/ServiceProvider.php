<?php

namespace LaravelAtlas;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class AtlasServiceProvider extends IlluminateServiceProvider
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

        // Add the following code to copy assets during the post-autoload-dump event
        $this->app->booted(function () {
            // Define the source and destination paths
            $sourcePath = __DIR__ . '/public';
            $destinationPath = public_path();

            // Copy the files using a recursive directory copy function
            $this->recursiveCopy($sourcePath, $destinationPath);

            // Optional: Display a message to indicate successful copying
            echo "LaravelAtlas assets have been successfully copied to the Laravel public folder.\n";
        });
    }

    // Recursive directory copy function
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
