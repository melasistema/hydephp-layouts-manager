<!--
|--------------------------------------------------------------------------
| Accordion Component
|--------------------------------------------------------------------------
| This is the Accordion component file for the HydePHP Layouts Manager package.
| File Path: resources/views/components/flowbite/accordion/default-accordion.blade.php
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
    'styleKey' => 'default', // Default style key
    'settings' => [], // Settings to override defaults
    'layout' => [], // Layout overrides
    'items' => [], // Items to override default accordion items
])

@php
    // Fetch the accordion configuration for the given style key
    $accordionConfig = \Hyde\Facades\Config::get('hyde-layouts-manager.components.flowbite.accordion.default-accordion.styles.' . $styleKey);

    // Validate the configuration
    if (!$accordionConfig || !isset($accordionConfig['config'])) {
        throw new Exception("Accordion configuration for style key '{$styleKey}' is missing or invalid.");
    }

    // Merge configuration settings, layout, and items with user-provided overrides
    $mergedSettings = array_replace_recursive(
        $accordionConfig['config']['settings'] ?? [],
        $settings
    );

    $mergedLayout = array_replace_recursive(
        $accordionConfig['config']['layout'] ?? [],
        $layout
    );

    $mergedItems = $items ?: ($accordionConfig['config']['items'] ?? []);

    // Assign fallback values for individual settings
    $bgColor = $mergedSettings['bgColor'] ?? 'bg-white';
    $darkBgColor = $mergedSettings['darkBgColor'] ?? 'dark:bg-gray-900';
    $textColor = $mergedSettings['textColor'] ?? 'text-gray-900';
    $darkTextColor = $mergedSettings['darkTextColor'] ?? 'dark:text-white';

    // Generate a unique ID for this accordion instance
    $accordionId = 'accordion-' . uniqid();
@endphp

<div id="{{ $accordionId }}"
     class="{{ $bgColor }} {{ $darkBgColor }} {{ $textColor }} {{ $darkTextColor }}"
     data-accordion="collapse"
     data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
     data-inactive-classes="text-gray-500 dark:text-gray-400">
    @foreach ($mergedItems as $key => $item)
        @php
            // Generate unique IDs for headings and bodies
            $headingId = "{$accordionId}-heading-{$key}";
            $bodyId = "{$accordionId}-body-{$key}";
        @endphp

        <h2 id="{{ $headingId }}">
            <button type="button"
                    class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                    data-accordion-target="#{{ $bodyId }}"
                    aria-expanded="true"
                    aria-controls="{{ $bodyId }}">
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
        <div id="{{ $bodyId }}" class="hidden" aria-labelledby="{{ $headingId }}">
            <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                <p class="mb-2">{!! $item['description'] !!}</p>
            </div>
        </div>
    @endforeach
</div>
