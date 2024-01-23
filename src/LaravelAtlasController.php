<?php

namespace LaravelAtlas;

use Route;
use Closure;

class LaravelAtlasController
{

    /**
     * Show pretty routes.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $middlewareClosure = function ($middleware) {
            return $middleware instanceof Closure ? 'Closure' : $middleware;
        };

        $routes = collect(Route::getRoutes());

        foreach (config('laravel-atlas.hide_matching') as $regex) {
            $routes = $routes->filter(function ($value, $key) use ($regex) {
                return !preg_match($regex, $value->uri());
            });
        }

        return view('laravel-atlas::routes', [
            'cssFile' => './public/app.css',
            'routes' => $routes,
            'middlewareClosure' => $middlewareClosure,
        ]);
    }
}
