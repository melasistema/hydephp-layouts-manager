<!--
|--------------------------------------------------------------------------
| Accordion Component
|--------------------------------------------------------------------------
| This is the Accordion component file for the HydePHP Layouts Manager package.
| File Path: resources/views/components/accordion.blade.php
|
| Usage:
| - Use the `renderComponent` method to render this component.
|   This approach ensures that your attributes are dynamically merged with the
|   default configuration values defined in the `hyde-layouts-manager` config file.
|
| Purpose:
| - Provides a reusable Hero UI element for developers using the HydePHP framework.
| - Includes default styles and text, which can be customized via the config file
|   or overridden during usage.
|
| Flowbite:
| - The component uses **Flowbite** https://flowbite.com, a Tailwind CSS component library, to implement the carousel functionality and design.
| - Make sure Flowbite is properly integrated into your project to ensure correct rendering of the carousel and its controls.
|
| @package    Melasistema\HydeLayoutsManager
| @author     Luca Visciola
| @copyright  2024 Luca Visciola
| @license    MIT License
|--------------------------------------------------------------------------
-->

@props([
    'settings' => Config::getArray('hyde-layouts-manager.components.accordion.default.settings', []),
    'layout' => Config::getArray('hyde-layouts-manager.components.accordion.default.layout', []),
    'items' => Config::getArray('hyde-layouts-manager.components.accordion.default.items', []),
])

<div id="accordion-flush"
     class="{{ $settings['bgColor'] }} {{ $settings['darkBgColor'] }} {{ $settings['textColor'] }} {{ $settings['darkTextColor'] }}"
     data-accordion="collapse"
     data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
     data-inactive-classes="text-gray-500 dark:text-gray-400">
    @foreach ($items as $key => $item)
        <h2 id="accordion-flush-heading-{{ $key }}">
            <button type="button"
                    class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                    data-accordion-target="#accordion-flush-body-{{ $key }}"
                    aria-expanded="true"
                    aria-controls="accordion-flush-body-{{ $key }}">
                <span>{{ $item['title'] }}</span>
                <svg data-accordion-icon
                     class="w-3 h-3 rotate-180 shrink-0"
                     aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-flush-body-{{ $key }}" class="hidden" aria-labelledby="accordion-flush-heading-{{ $key }}">
            <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                <p class="mb-2">{!! $item['description'] !!}</p>
            </div>
        </div>
    @endforeach
</div>
