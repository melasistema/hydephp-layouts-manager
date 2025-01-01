<!--
|--------------------------------------------------------------------------
| Hero Component (Jumbotron)
|--------------------------------------------------------------------------
| This is the Hero component file for the HydePHP Layouts Manager package.
| File Path: resources/views/components/hero.blade.php
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
| - The component uses **Flowbite**, a Tailwind CSS component library, to implement the carousel functionality and design.
| - Make sure Flowbite is properly integrated into your project to ensure correct rendering of the carousel and its controls.
|
| @package    Melasistema\HydeLayoutsManager
| @author     Luca Visciola
| @copyright  2024 Luca Visciola
| @license    MIT License
|--------------------------------------------------------------------------
-->

@props([
    'settings' => config('hyde-layouts-manager.components.hero.default.settings', []),
    'layout' => config('hyde-layouts-manager.components.hero.default.layout', []),
])

<!-- Render Hero -->
<div class="{{ $settings['bgColor'] }} {{ $settings['darkBgColor'] }} {{ $settings['padding'] }}">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-{{ $settings['align'] }} lg:py-16">

        <!-- Hero Heading (always visible if provided) -->
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            {{ $settings['headingText'] }}
        </h1>

        <!-- Hero Sub Heading (conditionally rendered based on showSubHeadingText) -->
        @if (isset($layout['showSubHeadingText']) && $layout['showSubHeadingText'])
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                {{ $settings['subHeadingText'] }}
            </p>
        @endif

        <!-- Button Group -->
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">

            <!-- Primary Button (conditionally rendered based on showPrimaryButton) -->
            @if (isset($layout['showPrimaryButton']) && $layout['showPrimaryButton'] && isset($settings['primaryButton']['link']))
                <a href="{{ $settings['primaryButton']['link'] ?? '#' }}"
                   class="inline-flex justify-center items-center gap-2 py-3 px-5 text-base font-medium text-center {{ $settings['primaryButton']['bgColor'] }} {{ $settings['primaryButton']['darkBgColor'] }} {{ $settings['primaryButton']['textColor'] }} rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    {!! $settings['primaryButton']['text'] !!}
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            @endif

            <!-- Secondary Button (conditionally rendered based on showSecondaryButton) -->
            @if (isset($layout['showSecondaryButton']) && $layout['showSecondaryButton'] && isset($settings['secondaryButton']['link']))
                <a href="{{ $settings['secondaryButton']['link'] ?? '#' }}"
                   class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none {{ $settings['secondaryButton']['bgColor'] }} {{ $settings['secondaryButton']['textColor'] }} rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    {{ $settings['secondaryButton']['text'] }}
                </a>
            @endif
        </div>
    </div>
</div>

