<?php

namespace Melasistema\HydeLayoutsManager\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

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
