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
    public function renderComponent(string $name, array $attributes = [], string $styleKey = 'melasistema'): ?string
    {
        $component = $this->getComponentFromConfig($name);

        if (!$component) {
            return 'Component not found: ' . $name;
        }

        if (!isset($component['view'])) {
            return 'View not found for component: ' . $name;
        }

        // Update styleKey usage
        $styleKey = $this->getValidStyleKey($component, $styleKey);
        $styleConfig = $this->getStyleConfiguration($component, $styleKey);

        $data = $this->mergeAttributes(
            array_replace_recursive($styleConfig['settings'] ?? [], $component['styles'][$styleKey]['settings'] ?? []),
            $attributes
        );

        return $this->viewFactory->make($component['view'], $data)->render();
    }

    /**
     * @param string $name
     * @return array|null
     */
    protected function getComponentFromConfig(string $name): ?array
    {
        $keys = explode('.', $name);
        $component = Config::get('hyde-layouts-manager.components');

        foreach ($keys as $key) {
            if (!isset($component[$key])) {
                return null;
            }
            $component = $component[$key];
        }

        return $component;
    }

    /**
     * @param array $component
     * @param string $style
     * @return array|array[]
     */
    protected function getStyleConfiguration(array $component, string $style): array
    {
        $defaultStyleConfig = [
            'settings' => [],
            'layout' => [],
        ];

        if (!isset($component['styles'][$style])) {
            return $defaultStyleConfig;
        }

        $styleConfig = $component['styles'][$style];

        return [
            'settings' => $styleConfig['settings'] ?? $defaultStyleConfig['settings'],
            'layout' => $styleConfig['layout'] ?? $defaultStyleConfig['layout'],
        ];
    }

    /**
     * @param array $component
     * @param string $styleKey
     * @return string
     */
    protected function getValidStyleKey(array $component, string $styleKey): string
    {
        if (!isset($component['styles'][$styleKey])) {
            $styleKey = 'melasistema'; // Default to 'melasistema' if style doesn't exist
        }
        return $styleKey;
    }
}
