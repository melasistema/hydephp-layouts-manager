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
 * - loadLayoutView(): Loads the view for the active layout based on configuration, or returns an empty string if not found.
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

            // Merge default attributes with passed attributes
            $data = array_merge($defaultData, $attributes);

            return $this->viewFactory->make($view, $data)->render();
        }

        return null;
    }

    /**
     * Load the view for the active layout.
     *
     * @param string|null $layout
     * @return string
     */
    public function loadLayoutView(string $layout = null): string
    {
        // Default to the config value if layout is not passed
        $layout = $layout ?: config('hyde-layouts-manager.default_layout', 'hyde');

        // Check if the layout exists in the configurations
        $layouts = config('hyde-layouts-manager.layouts', []);
        if (isset($layouts[$layout])) {
            // Return the layout view path
            return $layouts[$layout]['app'] ?? '';
        }

        // Return an empty string if the layout is not found
        return '';
    }
}
