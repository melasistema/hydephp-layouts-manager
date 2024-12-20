<?php

declare(strict_types=1);

namespace Melasistema\HydeLayoutsManager;

use Illuminate\Support\ServiceProvider;
use Melasistema\HydeLayoutsManager\Console\Commands\ListLayoutsCommand;
use Melasistema\HydeLayoutsManager\Layouts\LayoutManager;

/**
 * HydeLayoutsManagerServiceProvider
 *
 * This service provider is responsible for registering and bootstrapping all services,
 * views, and commands related to the HydeLayoutsManager package. It handles configuration
 * loading, view publishing, and commands registration for the package.
 *
 * Key functions:
 * - register(): Binds services to the Laravel container and merges the package configuration.
 * - boot(): Handles bootstrapping tasks like loading views and publishing assets.
 * - publishAssets(): Publishes package assets such as configuration files and views.
 *
 * @package Melasistema\HydeLayoutsManager
 * @author  Luca Visciola
 * @copyright 2024 Luca Visciola
 * @license MIT License
 */
class HydeLayoutsManagerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * This method is used to bind services into the Laravel service container.
     * It includes merging the configuration file and registering the LayoutManager service.
     *
     * @return void
     */
    public function register(): void
    {
        // Merge the package's default configuration file with the application's configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/hyde-layouts-manager.php', 'hyde-layouts-manager');

        // Bind the LayoutManager to the service container as a singleton
        // It resolves the LayoutManager with the ViewFactory dependency.
        $this->app->singleton('layout.manager', function ($app) {
            return new LayoutManager($app['view']);
        });

        // Register custom Artisan commands if the application is running in the console
        if ($this->app->runningInConsole()) {
            $this->commands([
                ListLayoutsCommand::class,  // Register the ListLayoutsCommand to list available layouts
            ]);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * This method is used for tasks that need to run after all services have been registered.
     * It includes loading views and publishing assets (e.g., config and view files).
     *
     * @return void
     */
    public function boot(): void
    {
        // Register the package's views so they can be used within the application
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'hyde-layouts-manager');
        // Publish the package's assets (views, configuration, Tailwind config) to the application
        $this->publishAssets();

        // Register the custom LayoutsManagerMarkdownPage class
        /*HydeKernel::getInstance()->registerPageClass(LayoutsManagerMarkdownPage::class);*/

    }

    /**
     * Publish the package assets to the application.
     *
     * This method publishes important package assets like the configuration file,
     * views, and the Tailwind configuration file to the application's directories.
     * It makes sure that these files are available and editable by the user.
     *
     * @return void
     */
    protected function publishAssets(): void
    {
        $this->publishes([
            // Publish the configuration file to the application's config directory
            __DIR__ . '/../config/hyde-layouts-manager.php' => config_path('hyde-layouts-manager.php'),

            // Publish the views to the application's views directory
            __DIR__ . '/../resources/views' => resource_path('views/vendor/hyde-layouts-manager'),

            // Publish the Tailwind configuration file for further customization
            __DIR__ . '/../tailwind-layouts-manager.config.js' => base_path('tailwind-layouts-manager.config.js'),
        ], 'hyde-layouts-manager-assets');
    }


}
