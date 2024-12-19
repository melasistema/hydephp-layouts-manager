<!--
|--------------------------------------------------------------------------
| Hero Component
|--------------------------------------------------------------------------
| This is the Hero component file for the Hyde Layouts Manager package.
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
| @package    Melasistema\HydeLayoutsManager
| @author     Luca Visciola
| @copyright  2024 Luca Visciola
| @license    MIT License
|--------------------------------------------------------------------------
-->

@props([
    // Default background color fallback in case no value is passed.
    'bgColor' => 'bg-indigo-500',

    // Default dark background color fallback in case no value is passed.
    'darkBgColor' => 'dark:bg-gray-900',

    // Default text color fallback for proper contrast and readability.
    'textColor' => 'text-white',

    // Default dark text color fallback for proper contrast and readability.
    'darkTextColor' => 'dark:text-white',

    // Default title for the hero section when none is provided.
    'title' => 'Default Title',

    // Default description displayed in the hero section.
    'description' => 'Default description for the hero component.',

    // Default alignment for text within the hero section: can be 'left', 'center', or 'right'.
    'align' => 'center',
])

<section class="{{ $bgColor }} {{ $darkBgColor }} py-16">
    <div class="container mx-auto px-4 text-{{ $align }} {{ $textColor }} {{ $darkTextColor }}">
        <!-- Hero Title -->
        <h1 class="text-4xl font-bold mb-4">{{ $title }}</h1>
        <!-- Hero Description -->
        <p class="text-lg">{{ $description }}</p>
    </div>
</section>
