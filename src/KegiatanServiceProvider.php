<?php

namespace Bantenprov\Kegiatan;

use Illuminate\Support\ServiceProvider;
use Bantenprov\Kegiatan\Console\Commands\KegiatanCommand;

/**
 * The KegiatanServiceProvider class
 *
 * @package Bantenprov\Kegiatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class KegiatanServiceProvider extends ServiceProvider
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
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
        $this->seedHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('kegiatan', function ($app) {
            return new Kegiatan;
        });

        $this->app->singleton('command.kegiatan', function ($app) {
            return new KegiatanCommand;
        });

        $this->commands('command.kegiatan');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'kegiatan',
            'command.kegiatan',
        ];
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('kegiatan.php');

        $this->mergeConfigFrom($packageConfigPath, 'kegiatan');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'kegiatan-config');
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
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'kegiatan');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/kegiatan'),
        ], 'kegiatan-lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'kegiatan');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/kegiatan'),
        ], 'kegiatan-views');
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
        ], 'kegiatan-assets');
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
        ], 'kegiatan-migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'kegiatan-public');
    }

    public function seedHandle()
    {
        $packageSeedPath = __DIR__.'/database/seeds';

        $this->publishes([
            $packageSeedPath => base_path('database/seeds')
        ], 'kegiatan-seeds');
    }
}
