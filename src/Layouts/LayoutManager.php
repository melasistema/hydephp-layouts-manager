<?php

declare(strict_types=1);

namespace Melasistema\HydeLayoutsManager\Layouts;

use Illuminate\View\Factory as ViewFactory;

/**
 * LayoutManager
 *
 * This class is responsible for managing layouts, including rendering components and loading layout views.
 * It provides functions to interact with the layout configuration and render associated components.
 *
 * Key methods:
 * - listLayouts(): Returns an array of registered layouts.
 * - renderComponent(): Renders a component with a given name and attributes, using the specified view and default data.
 *
 * @package Melasistema\HydeLayoutsManager
 * @author  Luca Visciola
 * @copyright 2024 Luca Visciola
 * @license MIT License
 */

class LayoutManager
{
    protected ViewFactory $viewFactory;

    public function __construct(ViewFactory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }

    /**
     * List the available layouts from the configuration.
     *
     * @return array
     */
    public function listLayouts(): array
    {
        // Get the layouts configuration from the package's config file
        $layouts = config('hyde-layouts-manager.layouts', []);

        // If no layouts are found, return an empty array
        if (empty($layouts)) {
            return [];
        }

        // Return the list of layouts, in this case, the names and paths
        return $layouts;
    }

    /**
     * Render a component with the given name and attributes.
     *
     * @param string $name
     * @param array $attributes
     * @return string|null
     */
    public function renderComponent(string $name, array $attributes = []): ?string
    {
        $component = config("hyde-layouts-manager.components.$name");

        if ($component && isset($component['view'])) {
            $view = $component['view'];
            $defaultData = $component['default'] ?? [];

            // Handle images: use provided array if set, otherwise default
            if (isset($attributes['images']) && is_array($attributes['images'])) {
                $defaultData['images'] = $attributes['images']; // Override defaults if images are explicitly set
            }

            // Resolve media paths for images
            if (isset($defaultData['images']) && is_array($defaultData['images'])) {
                $defaultData['images'] = $this->resolveMediaPaths($defaultData['images']);
            }

            // Merge other attributes with defaults
            $data = array_replace_recursive($defaultData, $attributes);

            return $this->viewFactory->make($view, $data)->render();
        }

        return null;
    }

    /**
     * Resolve media paths, prioritizing project media directory over package media directory.
     *
     * @param array $mediaPaths
     * @return array
     */
    protected function resolveMediaPaths(array $mediaPaths): array
    {
        $resolvedPaths = [];

        foreach ($mediaPaths as $path) {
            if (str_starts_with($path, 'media/')) {
                // Use the developer's custom path directly, assuming they handle the `_media` prefix
                $resolvedPaths[] = asset($path);
            } else {
                // Default to the package's _media/hyde-layouts-manager folder for relative paths
                $resolvedPaths[] = asset('hyde-layouts-manager/' . ltrim($path, '/'));
            }
        }
        return $resolvedPaths;
    }
}
