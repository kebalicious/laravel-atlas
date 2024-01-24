<div align="center">
  
# <img src="https://raw.githubusercontent.com/kebalicious/laravel-atlas/master/logo.png" alt="logo" width="50"/> Laravel Atlas
</div>

![Laravel Atlas](https://raw.githubusercontent.com/kebalicious/laravel-atlas/master/sample.png)

## Installation

Install package from Packagist via:

```bash
composer require kebalicious/laravel-atlas
```

If you are using Laravel Package Auto-Discovery, ignore next step.

Otherwise,

Open `config/app.php`. Under `'providers' => [ ]` array, add:

```php
LaravelAtlas\ServiceProvider::class,
```

Next, publish the config file:

```bash
php artisan vendor:publish --provider="LaravelAtlas\ServiceProvider"
```

To access your routes: `your-domain/routes`

If `/routes` not working, ensure that you have included the provider within the same area as all your package providers (before all your app's providers) to ensure it takes priority.

By default Laravel Atlas only enables itself when `APP_DEBUG` env is true. You can configure this on the published config as above, or add any custom middlewares.


## Notes

This package is originally forked from [GaryGreen's Pretty Routes](https://github.com/garygreen/pretty-routes), with some enhancement on UI and features.

