<?php

declare(strict_types=1);

namespace Melasistema\HydeLayoutsManager;

use Exception;
use Hyde\Pages\MarkdownPage;
use Hyde\Pages\MarkdownPost;
use Illuminate\Support\ServiceProvider;
use Melasistema\HydeLayoutsManager\Console\Commands\ListLayoutsCommand;
use Melasistema\HydeLayoutsManager\Console\Commands\MergePackageJsonCommand;
use Melasistema\HydeLayoutsManager\Console\Commands\MergeTailwindConfigCommand;
use Melasistema\HydeLayoutsManager\Layouts\LayoutManager;

/**
 * HydeLayoutsManagerServiceProvider
 *
 * This service provider is responsible for registering and bootstrapping all services,
 * views, and commands related to the HydePHP Layouts Manager package. It handles configuration
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

        // Register custom Artisan commands if the application is running in the console
        if ($this->app->runningInConsole()) {
            $this->commands([
                ListLayoutsCommand::class,
                MergeTailwindConfigCommand::class,
                MergePackageJsonCommand::class,
            ]);
        }

        // Bind the LayoutManager to the service container as a singleton
        // It resolves the LayoutManager with the ViewFactory dependency.
        $this->app->singleton('layout.manager', function ($app) {
            return new LayoutManager($app['view']);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * This method is used for tasks that need to run after all services have been registered.
     * It includes loading views and publishing assets (e.g., config and view files).
     *
     * @return void
     * @throws Exception
     */
    public function boot(): void
    {
        // Load views from the published folder, if available, or fallback to the package's views
        $this->loadViewsFrom([
            resource_path('views/vendor/hyde-layouts-manager'), // Check for published views
            __DIR__ . '/../resources/views'                     // Fallback to package views
        ], 'hyde-layouts-manager');

        // Dynamically set the template for MarkdownPage based on HydePHP Layouts Manager configuration
        $defaultLayout = \Hyde\Facades\Config::get('hyde-layouts-manager.default_layout', 'hyde');
        $layouts = \Hyde\Facades\Config::get('hyde-layouts-manager.layouts');

        MarkdownPage::$template = $layouts[$defaultLayout]['page'] ?? 'hyde::layouts.page';
        MarkdownPost::$template = $layouts[$defaultLayout]['post'] ?? 'hyde::layouts.post';

        // Publish the package's assets (views, configuration, Tailwind config) to the application
        $this->publishAssets();

        // Handle media folder or symlink logic as the last step to serve default media files
        $this->handleMediaSymlink();
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
            // Publish the Tailwind configuration file to the application's root directory
            __DIR__ . '/../tailwind-layouts-manager.config.js' => base_path('tailwind-layouts-manager.config.js'),
            // Publish the package.json to the application's root directory
            __DIR__ . '/../package.json' => base_path('package-hyde-layouts-manager.json'),
            // Publish the hyde-layouts-manager-font.json to the application's config directory
            __DIR__ . '/../config/hyde-layouts-manager-fonts.json' => config_path('hyde-layouts-manager-fonts.json'),
        ], 'hyde-layouts-manager-config');

        $this->publishes([
            // Publish the views to the application's views directory
            __DIR__ . '/../resources/views' => resource_path('views/vendor/hyde-layouts-manager'),
        ], 'hyde-layouts-manager-views');

        $this->publishes([
            // Publish the assets to the application's resources directory
            __DIR__.'/../resources/assets' => resource_path('assets/vendor/hyde-layouts-manager'),
        ], 'hyde-layouts-manager-assets');
    }

    /**
     * Create a symlink to the package's media folder in the application for the default images.
     *
     * @return void
     * @throws Exception
     */
    protected function handleMediaSymlink(): void
    {
        // Define the paths for media
        $targetPath = base_path('vendor/melasistema/hyde-layouts-manager/resources/images');
        $symlinkPath = base_path('_media/hyde-layouts-manager'); // This is where the media should be in the project

        // Check if the symlink or folder handling needs to occur
        if (file_exists($symlinkPath)) {
            if (is_dir($symlinkPath)) {
                // Published folder exists, no action needed
                return;
            } elseif (is_link($symlinkPath)) {
                // Symlink exists, ensure the target is valid
                if (!file_exists($targetPath)) {
                    throw new \Exception("Symlink target path does not exist: $targetPath");
                }
                // Symlink is valid, no further action needed
                return;
            } else {
                // Unexpected file exists, throw an exception to avoid conflicts
                throw new \Exception("Unexpected file exists at $symlinkPath");
            }
        }

        // If the symlinkPath does not exist, create a symlink
        if (file_exists($targetPath)) {
            symlink($targetPath, $symlinkPath);
        } else {
            throw new \Exception("Target path does not exist: $targetPath");
        }
    }
}
