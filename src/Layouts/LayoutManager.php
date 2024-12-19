<?php

declare(strict_types=1);

namespace Melasistema\HydeLayoutsManager\Layouts;

use Illuminate\View\Factory as ViewFactory;

class LayoutManager
{
    /**
     * @var ViewFactory
     */
    protected ViewFactory $viewFactory;

    /**
     * LayoutManager constructor.
     *
     * @param ViewFactory $viewFactory
     */
    public function __construct(ViewFactory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }

    /**
     * Register a new layout.
     *
     * @param string $name The unique name of the layout.
     * @param string $path The file path to the layout Blade template.
     */
    public function registerLayout(string $name, string $path): void
    {
        // Registering layouts is handled here
    }

    /**
     * Retrieve a registered layout by name.
     *
     * @param string $name
     * @return string|null
     */
    public function getLayout(string $name): ?string
    {
        // Getting a layout for Blade rendering
        return null;
    }

    /**
     * Parse the Markdown content and render components.
     *
     * @param string $content
     * @return string The content with rendered components.
     */
    public function parseComponents(string $content): string
    {
        // Regular expression to match component blocks in the Markdown
        $pattern = '/^---\ncomponent:\s*(\w+)\s*(.*?)(?=\n---|\z)/ms';

        return preg_replace_callback($pattern, function ($matches) {
            $componentName = $matches[1];  // The component name (e.g., 'hero')
            $attributes = $this->parseAttributes($matches[2]);  // Extract the attributes from the block

            // Render the component using Blade
            return $this->renderComponent($componentName, $attributes);
        }, $content);
    }

    /**
     * Parse the raw attributes block into an associative array.
     *
     * @param string $attributeString
     * @return array The parsed attributes as key-value pairs.
     */
    protected function parseAttributes(string $attributeString): array
    {
        $attributes = [];
        $lines = explode("\n", trim($attributeString));

        foreach ($lines as $line) {
            if (strpos($line, ':') !== false) {
                [$key, $value] = explode(":", $line, 2);
                $attributes[trim($key)] = trim($value);
            }
        }

        return $attributes;
    }

    /**
     * Render a component using Blade.
     *
     * @param string $name The name of the component to render.
     * @param array $attributes The attributes to pass to the component.
     * @return string|null The rendered component HTML, or null if the component is not found.
     */
    public function renderComponent(string $name, array $attributes = []): ?string
    {
        $component = config("hyde-layouts-manager.components.$name");

        if ($component && isset($component['view'])) {
            $defaultData = $component['default'] ?? [];
            $view = $component['view'];

            // Merge configuration defaults with passed attributes
            $data = array_merge($defaultData, $attributes);

            // Check if we are rendering in Markdown or Blade
            return $this->viewFactory->make($view, $data)->render();
        }

        return null;
    }
}
