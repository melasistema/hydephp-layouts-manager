<!--
|--------------------------------------------------------------------------
| Accordion Component
|--------------------------------------------------------------------------
| This is the Accordion component file for the Hyde Layouts Manager package.
| File Path: resources/views/components/accordion.blade.php
|
| Usage Recommendation:
| - It is recommended to use the `renderComponent` method to render this component.
|   This approach ensures that your attributes are dynamically merged with the
|   default configuration values defined in the `hyde-layouts-manager` config file.
| - Props are retained as a fallback mechanism, enabling you to use this component
|   directly without the `renderComponent` method if needed.
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
    'bgColor' => 'bg-grey-500',
    'darkBgColor' => 'dark:bg-gray-900',
    'textColor' => 'text-white',
    'darkTextColor' => 'dark:text-white',
    'title' => 'Default Title',
    'description' => 'Default description for the hero component.',
    'align' => 'center',
    'items' => [
        [
            'title' => 'Item 1',
            'description' => 'Content for the first item of the accordion.',
            'link' => 'https://melasistema.com',
        ],
    ],
])

<div id="accordion-collapse" data-accordion="collapse" data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
    @foreach ($items as $key => $item)
        <h2 id="accordion-collapse-heading-{{ $key }}">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-{{ $key }}" aria-expanded="true" aria-controls="accordion-collapse-body-{{ $key }}">
                <span>{{ $item['title'] }}</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-{{ $key }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $key }}">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $item['description'] }}</p>
                @isset($item['link'])
                    <p class="text-gray-500 dark:text-gray-400">Check out the <a href="{{ $item['link'] }}" class="text-blue-600 dark:text-blue-500 hover:underline">link</a></p>
                @endisset
            </div>
        </div>
    @endforeach
</div>
