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
     * @return string|null
     */
    public function renderComponent(string $name, array $attributes = []): ?string
    {
        $component = Config::getArray('hyde-layouts-manager.components.' . $name);

        if ($component && isset($component['view'])) {
            $view = $component['view'];
            $defaultData = $component['default'] ?? [];

            // Merge the default attributes with the user-provided ones using the trait method
            $data = $this->mergeAttributes($defaultData, $attributes);

            // Render the view with the merged data
            return $this->viewFactory->make($view, $data)->render();
        }

        return null;
    }
}
