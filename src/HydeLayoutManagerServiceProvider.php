<?php

declare(strict_types=1);

namespace Melasistema\HydeApiDocGenerator;

use Illuminate\Support\ServiceProvider;

class HydeApiDocGeneratorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/hyde-api-doc-generator.php', 'hyde-api-doc-generator');

        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\Commands\GenerateApiDocs::class,
            ]);
        }
    }

    public function boot(): void
    {
        $this->publishAssets();
    }

    /**
     * Publish the package assets.
     */
    protected function publishAssets(): void
    {
        $this->publishes([
            __DIR__ . '/../config/hyde-api-doc-generator.php' => config_path('hyde-api-doc-generator.php'),
            __DIR__ . '/../resources/views' => resource_path('views/vendor/hyde-api-doc-generator'),
            __DIR__ . '/../tailwind-api-doc-generator.config.js' => base_path('tailwind-api-doc-generator.config.js'),
        ], 'hyde-api-doc-generator-assets');
    }

}
