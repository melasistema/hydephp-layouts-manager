<!--
|--------------------------------------------------------------------------
| Carousel Component
|--------------------------------------------------------------------------
| This is the Carousel component file for the HydePHP Layouts Manager package.
| File Path: resources/views/components/carousel.blade.php
|
| Usage:
| - Use the `renderComponent` method to render this component.
|   This approach ensures that your attributes are dynamically merged with the
|   default configuration values defined in the `hyde-layouts-manager` config file.
|
| Purpose:
| - Provides a reusable Carousel UI element for developers using the HydePHP framework.
| - Includes default images and styles, which can be customized via the config file
|   or overridden during usage.
| - Allows dynamic rendering of carousel slides with default fallback images if none are provided.
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
    'images' => Config::getArray('hyde-layouts-manager.components.carousel.default.images', []),
    'layout' => Config::getArray('hyde-layouts-manager.components.carousel.default.layout', []),
])

<div class="relative w-full z-0" data-carousel="slide">
    <div class="relative h-56 overflow-hidden {{ ($layout['rounded'] ?? false) ? 'rounded-lg' : '' }} md:h-96">
        @forelse ($images as $index => $image)
            <div class="{{ $loop->first ? 'block' : 'hidden' }} duration-700 ease-in-out" data-carousel-item>
                <img src="{{ $image }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Slide {{ $index + 1 }}">
            </div>
        @empty
            <div class="block duration-700 ease-in-out" data-carousel-item>
                <p class="text-center text-gray-500">No images available for the carousel.</p>
            </div>
        @endforelse
    </div>

    @if(($layout['showIndicators'] ?? false) && count($images) > 1)
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            @foreach ($images as $index => $image)
                <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
            @endforeach
        </div>
    @endif

    @if(($layout['showControls'] ?? false) && count($images) > 1)
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    @endif
</div>
