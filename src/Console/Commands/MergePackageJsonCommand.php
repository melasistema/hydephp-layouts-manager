<?php

namespace Melasistema\HydeLayoutsManager\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

/**
 * MergePackageJsonCommand
 *
 * This command merges the `package.json` dependencies provided by the
 * Melasistema HydeLayoutsManager package with the user's existing `package.json`.
 * It ensures the required dependencies (e.g., Flowbite) are included in the user's
 * project without overwriting custom dependencies.
 *
 * Key methods:
 * - handle(): Checks for an existing `package.json` file, merges the required
 *   dependencies from the package's default configuration, and writes the updated
 *   file back to the user's project.
 *
 * Important Notice:
 * - The command will merge the dependencies and preserve custom entries in the
 *   user's `package.json`. However, the user should run `npm install` afterward
 *   to install the new dependencies.
 *
 * For detailed instructions, refer to the README.md file.
 *
 * @package Melasistema\HydeLayoutsManager
 * @author  Luca Visciola
 * @copyright 2024 Luca Visciola
 * @license MIT License
 */
class MergePackageJsonCommand extends Command
{
    protected $signature = 'package-json:merge';
    protected $description = 'Merge the package.json dependencies with HydeLayoutsManager requirements.';

    public function handle(): void
    {
        $projectPackagePath = base_path('package.json');
        $packageManagerPath = base_path('package-hyde-layouts-manager.json');

        // Ensure both files exist
        if (!File::exists($projectPackagePath)) {
            $this->error('Error: package.json not found in the root directory.');
            return;
        }

        if (!File::exists($packageManagerPath)) {
            $this->error('Error: package-hyde-layouts-manager.json not found. Please ensure it is published.');
            return;
        }

        // Load JSON content
        $projectPackage = json_decode(File::get($projectPackagePath), true);
        $managerPackage = json_decode(File::get($packageManagerPath), true);

        // Ensure valid JSON structures
        if (is_null($projectPackage) || is_null($managerPackage)) {
            $this->error('Error: Invalid JSON structure in one of the files.');
            return;
        }

        // Merge dependencies (devDependencies only)
        $projectDevDependencies = $projectPackage['devDependencies'] ?? [];
        $managerDependencies = $managerPackage['dependencies'] ?? [];

        $mergedDependencies = array_merge($projectDevDependencies, $managerDependencies);

        // Update project package.json
        $projectPackage['devDependencies'] = $mergedDependencies;

        // Write back to package.json
        File::put($projectPackagePath, json_encode($projectPackage, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $this->info('package.json has been successfully updated with the required dependencies.');
        $this->info('Please run "npm install" to install the updated dependencies.');
    }
}
