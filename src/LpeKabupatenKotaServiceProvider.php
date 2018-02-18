<?php namespace Bantenprov\LpeKabupatenKota;

use Illuminate\Support\ServiceProvider;
use Bantenprov\LpeKabupatenKota\Console\Commands\LpeKabupatenKotaCommand;

/**
 * The LpeKabupatenKotaServiceProvider class
 *
 * @package Bantenprov\LpeKabupatenKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LpeKabupatenKotaServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('lpe-kabupaten-kota', function ($app) {
            return new LpeKabupatenKota;
        });

        $this->app->singleton('command.lpe-kabupaten-kota', function ($app) {
            return new LpeKabupatenKotaCommand;
        });

        $this->commands('command.lpe-kabupaten-kota');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'lpe-kabupaten-kota',
            'command.lpe-kabupaten-kota',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('lpe-kabupaten-kota.php');

        $this->mergeConfigFrom($packageConfigPath, 'lpe-kabupaten-kota');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'lpe-kabupaten-kota');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/lpe-kabupaten-kota'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'lpe-kabupaten-kota');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/lpe-kabupaten-kota'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'lpe-kabupaten-kota-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'lpe-kabupaten-kota-public');
    }
}
