<?php

declare(strict_types=1);

namespace Melasistema\HydeLayoutsManager\Layouts;

use Hyde\Facades\Config;
use Illuminate\View\Factory as ViewFactory;
use Melasistema\HydeLayoutsManager\Traits\HasAttributes;

/**
 * LayoutManager
 *
 * This class is responsible for managing layouts, including rendering components and loading layout views.
 * It provides methods to interact with the layout configuration, dynamically merge attributes,
 * and render associated components using Blade templates.
 *
 * Key methods:
 * - listLayouts(): Fetches and returns an array of registered layouts from the configuration.
 * - renderComponent(): Renders a specified component by merging default configuration values with custom attributes.
 *
 * This class leverages the `HasAttributes` trait for flexible and efficient attribute merging,
 * ensuring default values and user-provided attributes are seamlessly combined.
 *
 * @package Melasistema\HydeLayoutsManager
 * @author  Luca Visciola
 * @copyright 2024 Luca Visciola
 * @license MIT License
 */

class LayoutManager
{
    use HasAttributes; // Include the trait for flexible attribute handling

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
        $layouts = Config::getArray('hyde-layouts-manager.layouts', []);

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
     * @param string $layoutKey
     * @return string|null
     */
    public function renderComponent(string $name, array $attributes = [], string $layoutKey = 'melasistema'): ?string
    {
        // Traverse the configuration nested array to find the component by name
        $keys = explode('.', $name);
        $component = Config::get('hyde-layouts-manager.components');

        // Check if the component exists
        foreach ($keys as $key) {
            if (!isset($component[$key])) {
                return null; // Component not found
            }
            $component = $component[$key];
        }

        // Ensure component has a valid view
        if (!isset($component['view'])) {
            return 'View not found for component: ' . $name; // Return an error message if no view found
        }

        // Check if the layout exists, if not fallback to the default layout ('melasistema')
        if (!isset($component['layouts'][$layoutKey])) {
            $layoutKey = 'melasistema'; // Fallback to default layout
        }

        // Retrieve the layout configuration
        $layoutConfig = $this->getLayoutConfiguration($component, $layoutKey);

        // Merge the layout and provided attributes with the default settings applied
        $data = $this->mergeAttributes(
            array_replace_recursive($layoutConfig['settings'] ?? [], $component['layouts'][$layoutKey]['settings'] ?? []),
            $attributes
        );

        // Render the view with the merged data
        return $this->viewFactory->make($component['view'], $data)->render();
    }

    /**
     * Get the layout configuration for a given component and layout.
     *
     * @param array $component
     * @param string $layout
     * @return array
     */
    protected function getLayoutConfiguration(array $component, string $layout): array
    {
        // Default settings and layout configuration
        $defaultLayoutConfig = [
            'settings' => [], // Defaults for settings
            'layout' => [],   // Defaults for layout
        ];

        // Ensure the layout exists in the component
        if (!isset($component['layouts'][$layout])) {
            return $defaultLayoutConfig; // Fallback to default layout config
        }

        // Retrieve the layout settings and layout data
        $layoutConfig = $component['layouts'][$layout];

        // Return the layout configuration, using default values when necessary
        return [
            'settings' => $layoutConfig['settings'] ?? $defaultLayoutConfig['settings'],
            'layout' => $layoutConfig['layout'] ?? $defaultLayoutConfig['layout'],
        ];
    }
}
