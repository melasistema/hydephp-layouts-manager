<?php

declare(strict_types=1);

namespace Melasistema\HydeLayoutsManager\Layouts;

use Illuminate\View\Factory as ViewFactory;

class LayoutManager
{
    protected ViewFactory $viewFactory;

    public function __construct(ViewFactory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }

    public  function listLayouts(): array
    {

        return '(TODO) layouts available here!';
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
}
