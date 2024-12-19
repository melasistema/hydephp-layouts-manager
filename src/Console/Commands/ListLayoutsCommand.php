<?php

declare(strict_types=1);

namespace Melasistema\HydeLayoutsManager\Console\Commands;

use Illuminate\Console\Command;

class ListLayoutsCommand extends Command
{
    protected $signature = 'layouts:list';
    protected $description = 'List all registered layouts';

    public function handle(): void
    {
        $layoutsManager = app('layout.manager'); // Use the singleton instance
        $layouts = $layoutsManager->listLayouts();

        if (empty($layouts)) {
            $this->info('No layouts registered.');
            return;
        }

        foreach ($layouts as $name => $path) {
            $this->info("$name: $path");
        }
    }
}
