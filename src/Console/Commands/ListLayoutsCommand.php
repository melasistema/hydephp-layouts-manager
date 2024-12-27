<?php

declare(strict_types=1);

namespace Melasistema\HydeLayoutsManager\Console\Commands;

use Illuminate\Console\Command;

/**
 * ListLayoutsCommand
 *
 * This command is responsible for listing all the registered layouts and components
 * in the HydePHP Layouts Manager package. It provides an organized view in the CLI of
 * available layouts and reusable components with their corresponding view paths.
 *
 * Key functions:
 * - handle(): Retrieves and displays the list of layouts and components.
 * - Displays layouts and components in separate sections for clarity.
 * - Handles cases when no layouts or components are registered.
 *
 * @package Melasistema\HydeLayoutsManager
 * @author  Luca Visciola
 * @copyright 2024 Luca Visciola
 * @license MIT License
 */
class ListLayoutsCommand extends Command
{
    protected $signature = 'layouts:list';
    protected $description = 'List all registered layouts and components';

    public function handle(): void
    {
        // Get the LayoutManager instance via the service container
        $layoutsManager = app('layout.manager');

        // Get the list of layouts
        $layouts = $layoutsManager->listLayouts();
        // Get the list of components
        $components = config('hyde-layouts-manager.components', []);

        // Check if layouts exist, otherwise notify the user
        if (empty($layouts) && empty($components)) {
            $this->info('No layouts or components registered.');
            return;
        }

        // Title for the CLI output
        $this->info('Registered Layouts and Components');
        $this->line('================================');

        // Display Layouts
        $this->info("Layouts:");
        $this->line("---------");

        // Loop through the layouts and display each layout name and path
        foreach ($layouts as $name => $layoutConfig) {
            // Assuming 'app' is the default key to get the layout view
            $layoutPath = $layoutConfig['app'] ?? 'No app view defined';

            // Print the layout name and path
            $this->line("Layout: $name");
            $this->line("  Path: $layoutPath");

            // Add a separator line between layouts
            $this->line('  -----------------------------------');
        }

        // Display Components
        $this->info("Components:");
        $this->line("-----------");

        // Loop through components and display each component name and view path
        foreach ($components as $componentName => $componentConfig) {
            $componentView = $componentConfig['view'] ?? 'No view defined';
            $this->line("  - $componentName: $componentView");
        }

        // Final message
        $this->line('================================');
        $this->info('End of registered layouts and components.');
    }
}
