<div align="center">
<img src="https://raw.githubusercontent.com/kebalicious/laravel-atlas/master/logo.png" alt="logo" width="200"/>

# Laravel Atlas

</div>

![Laravel Atlas](https://raw.githubusercontent.com/kebalicious/laravel-atlas/master/screenshot.png)

# Installation

```bash
composer require kebal/laravel-atlas
```

If you are using autodiscovery in Laravel, it should work just nice.

Otherwise — open `config/app.php`. Under providers array, add:

```php
LaravelAtlas\ServiceProvider::class,
```

Next, publish the config:

```bash
php artisan vendor:publish --provider="PrettyRoutes\ServiceProvider"
```

To access your routes: `your-domain/routes`

If `/routes` not working, ensure that you have included the provider within the same area as all your package providers (before all your app's providers) to ensure it takes priority.

By default pretty routes only enables itself when `APP_DEBUG` env is true. You can configure this on the published config as above, or add any custom middlewares.
