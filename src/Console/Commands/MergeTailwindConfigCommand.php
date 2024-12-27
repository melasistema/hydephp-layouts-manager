<?php

namespace Melasistema\HydeLayoutsManager\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

/**
 * MergeTailwindConfigCommand
 *
 * This command is responsible for merging the Tailwind CSS configurations between
 * the user's existing `tailwind.config.js` and the default configuration provided
 * by the Melasistema HydeLayoutsManager package. It replaces the user's Tailwind
 * configuration with the default settings if necessary, ensuring compatibility with
 * the package's layouts and components.
 *
 * Key methods:
 * - handle(): Checks for an existing `tailwind.config.js` file and prompts the user
 *   before replacing it with the default configuration from the package. If the file
 *   exists, the user is asked for confirmation before proceeding to overwrite.
 *   If the user confirms, the default configuration is copied to the user's project.
 *
 * Important Notice:
 * - The command will overwrite the existing `tailwind.config.js` file with the default
 *   configuration. If you'd like to preserve custom changes, make sure to back up
 *   your `tailwind.config.js` before running the command.
 *
 * For detailed instructions and to choose between manual configuration or using
 * the command, please consult the README.md file.
 *
 * @package Melasistema\HydeLayoutsManager
 * @author  Luca Visciola
 * @copyright 2024 Luca Visciola
 * @license MIT License
 */
class MergeTailwindConfigCommand extends Command
{
    protected $signature = 'tailwind:merge';
    protected $description = 'Merge HydePHP and Layouts Manager Tailwind configurations.';

    public function handle(): void
    {
        $tailwindConfigPath = base_path('tailwind.config.js'); // Path to the user's tailwind.config.js
        $packageConfigPath = __DIR__. '/../../../tailwind.config.js'; // Path to the default config in the package root

        // Check if the tailwind.config.js exists
        if (File::exists($tailwindConfigPath)) {
            $this->info('Warning: Your existing tailwind.config.js will be replaced.');

            if (!$this->confirm('Do you wish to continue? This will overwrite your custom Tailwind configuration.')) {
                $this->info('Operation cancelled.');
                return;
            }
        }

        // Copy the default config file from the package to the user's project
        File::copy($packageConfigPath, $tailwindConfigPath);

        $this->info('tailwind.config.js has been replaced with the Melasistema HydeLayoutsManager settings!');
    }
}
