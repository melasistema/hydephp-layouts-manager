<!--
|--------------------------------------------------------------------------
| Gallery Component
|--------------------------------------------------------------------------
| This is the Gallery component file for the HydePHP Layouts Manager package.
| File Path: resources/views/components/gallery.blade.php
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
| @see https://flowbite.com/docs/components/gallery/ (default Flowbite gallery component)
|
| @package    Melasistema\HydeLayoutsManager
| @author     Luca Visciola
| @copyright  2024 Luca Visciola
| @license    MIT License
|--------------------------------------------------------------------------
-->

@props([
    'images' => Config::getArray('hyde-layouts-manager.components.gallery.default.images', []),
    'layout' => Config::getArray('hyde-layouts-manager.components.gallery.default.layout', []),
])

@php
    // Extract and sanitize layout values
    $cols = $layout['cols'] ?? ['default' => 3];
    $gap = $layout['gap'] ?? 'gap-4';

    // Filter and map to valid CSS classes
    $gridClasses = collect($cols)
        ->filter(fn($colCount) => $colCount !== '' && $colCount !== null) // Exclude empty or null breakpoints
        ->map(function ($colCount, $breakpoint) {
            return $breakpoint === 'default'
                ? "grid-cols-$colCount"
                : "$breakpoint:grid-cols-$colCount";
        })
        ->implode(' ');
@endphp

@if (is_array($images) && count($images) > 0)
    <div class="grid {{ $gap }} {{ $gridClasses }}">
        @foreach ($images as $image)
            <div>
                <img class="h-auto max-w-full rounded-lg" src="{{ $image }}" alt="Gallery Image">
            </div>
        @endforeach
    </div>
@else
    {{-- Fallback when no images are provided --}}
    <div class="flex flex-col items-center justify-center text-center w-full h-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="150" height="150" stroke-width="0.3" stroke="currentColor" class="stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
        </svg>
        <p class="mt-4 text-gray-600">Sorry, no images are available. Customize this component via the configuration file or pass attributes directly.</p>
    </div>
@endif
