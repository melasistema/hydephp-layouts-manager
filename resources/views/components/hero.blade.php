<!--
|--------------------------------------------------------------------------
| Hero Component
|--------------------------------------------------------------------------
| This is the Hero component file for the HydePHP Layouts Manager package.
| File Path: resources/views/components/hero.blade.php
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
    // Default background color fallback in case no value is passed.
    'bgColor' => 'bg-white',

    // Default dark background color fallback in case no value is passed.
    'darkBgColor' => 'dark:bg-gray-900',

    // Default padding fallback in case no value is passed.
    'padding' => 'py-16',

    // Default text color fallback for proper contrast and readability.
    'textColor' => 'text-gray-900',

    // Default dark text color fallback for proper contrast and readability.
    'darkTextColor' => 'dark:text-white',

    // Default title for the hero section when none is provided.
    'title' => 'HydePHP Layouts Manager',

    // Default description displayed in the hero section.
    'description' => 'Manage your layouts and reusable components with ease.',

    // Default alignment for text within the hero section: can be 'left', 'center', or 'right'.
    'align' => 'center',

    // Primary button details
    'primaryButton' => [
        'text' => '<svg width="48" height="46" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M48.854 0C21.839 0 0 22 0 49.217c0 21.756 13.993 40.172 33.405 46.69 2.427.49 3.316-1.059 3.316-2.362 0-1.141-.08-5.052-.08-9.127-13.59 2.934-16.42-5.867-16.42-5.867-2.184-5.704-5.42-7.17-5.42-7.17-4.448-3.015.324-3.015.324-3.015 4.934.326 7.523 5.052 7.523 5.052 4.367 7.496 11.404 5.378 14.235 4.074.404-3.178 1.699-5.378 3.074-6.6-10.839-1.141-22.243-5.378-22.243-24.283 0-5.378 1.94-9.778 5.014-13.2-.485-1.222-2.184-6.275.486-13.038 0 0 4.125-1.304 13.426 5.052a46.97 46.97 0 0 1 12.214-1.63c4.125 0 8.33.571 12.213 1.63 9.302-6.356 13.427-5.052 13.427-5.052 2.67 6.763.97 11.816.485 13.038 3.155 3.422 5.015 7.822 5.015 13.2 0 18.905-11.404 23.06-22.324 24.283 1.78 1.548 3.316 4.481 3.316 9.126 0 6.6-.08 11.897-.08 13.526 0 1.304.89 2.853 3.316 2.364 19.412-6.52 33.405-24.935 33.405-46.691C97.707 22 75.788 0 48.854 0z" fill="#fff"/></svg>Github',
        'link' => 'https://github.com/melasistema/hydephp-layouts-manager',
        'bgColor' => 'bg-blue-700',
        'darkBgColor' => 'dark:bg-blue-900',
        'textColor' => 'text-white',
        'darkTextColor' => 'dark:text-white',
    ],

    // Secondary button details
    'secondaryButton' => [
        'text' => 'About Me',
        'link' => 'https://github.com/melasistema',
        'bgColor' => 'bg-white',
        'darkBgColor' => 'dark:bg-gray-800',
        'textColor' => 'text-indigo-500',
        'darkTextColor' => 'dark:text-white',
    ],
])

<section class="{{ $bgColor }} {{ $darkBgColor }} {{ $padding }}">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-{{ $align }} lg:py-16">
        <!-- Hero Title -->
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            {{ $title }}
        </h1>

        <!-- Hero Description -->
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
            {{ $description }}
        </p>

        <!-- Button Group -->
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <!-- Primary Button -->
            <a href="{{ $primaryButton['link'] }}"
               class="inline-flex justify-center items-center gap-2 py-3 px-5 text-base font-medium text-center {{ $primaryButton['bgColor'] }} {{ $primaryButton['darkBgColor'] }} {{ $primaryButton['textColor'] }} rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                {!! $primaryButton['text'] !!} <!-- Render raw HTML (SVG) -->
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>

            <!-- Secondary Button -->
            <a href="{{ $secondaryButton['link'] }}"
               class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none {{ $secondaryButton['bgColor'] }} {{ $secondaryButton['textColor'] }} rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                {{ $secondaryButton['text'] }}
            </a>
        </div>
    </div>
</section>
