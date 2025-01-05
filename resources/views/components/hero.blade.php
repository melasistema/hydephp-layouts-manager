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
    'settings' => Config::getArray('hyde-layouts-manager.components.hero.default.settings', []),
    'layout' => Config::getArray('hyde-layouts-manager.components.hero.default.layout', []),
])

<!-- Render Hero component (Jumbotron) -->
<section class="{{ $settings['bgColor'] }} {{ $settings['darkBgColor'] }}">
    <div class="{{ $settings['padding'] }} mx-auto {{ $settings['maxWidth'] }} lg:py-16">

        <!-- Heading -->
        <h1 class="mb-4
            {{ $settings['headingTextSize']['default'] }}
            md:{{ $settings['headingTextSize']['md'] }}
            lg:{{ $settings['headingTextSize']['lg'] }}
            font-extrabold tracking-tight leading-none
            text-gray-900 dark:text-white text-{{ $settings['headingTextAlign'] }}">
            {{ $settings['headingText'] }}
        </h1>

        <!-- Subheading -->
        <p class="mb-8
            {{ $settings['subHeadingTextSize']['default'] }}
            md:{{ $settings['subHeadingTextSize']['md'] }}
            font-normal text-gray-500 lg:text-xl dark:text-gray-400
            text-{{ $settings['subHeadingTextAlign'] }}">
            {{ $settings['subHeadingText'] }}
        </p>

        <!-- Button Group -->
        <div class="flex flex-col space-y-4 sm:flex-row justify-{{
            $settings['buttonsGroupAlign'] === 'left' ? 'start' :
            ($settings['buttonsGroupAlign'] === 'right' ? 'end' : 'center') }} sm:space-y-0 w-full">
            <!-- Primary Button -->
            @if ($layout['showPrimaryButton'] && isset($settings['primaryButton']['link']))
                <button type="button" class="inline-flex justify-center items-center py-3 px-5 {{ $settings['buttonTextSize']['default'] }}
                   sm:{{ $settings['buttonTextSize']['sm'] }} font-medium text-center
                   {{ $settings['primaryButton']['textColor'] }}
                   rounded-lg {{ $settings['primaryButton']['bgColor'] }}
                   {{ $settings['primaryButton']['hoverBgColor'] }} focus:ring-4
                   {{ $settings['primaryButton']['focusRingColor'] }}
                   dark:focus:ring-{{ $settings['primaryButton']['darkFocusRingColor'] }} w-auto">
                    <a href="{{ $settings['primaryButton']['link'] }}">
                        {!! $settings['primaryButton']['text'] !!}
                    </a>
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </button>
            @endif

            <!-- Secondary Button -->
            @if ($layout['showSecondaryButton'] && isset($settings['secondaryButton']['link']))
                <button type="button" class="py-3 px-5 sm:ms-4 text-sm font-medium {{ $settings['secondaryButton']['textColor'] }} focus:outline-none
                   {{ $settings['secondaryButton']['bgColor'] }} rounded-lg border
                   {{ $settings['secondaryButton']['borderColor'] }}
                   {{ $settings['secondaryButton']['hoverBgColor'] }} focus:z-10
                   focus:ring-4 {{ $settings['secondaryButton']['focusRingColor'] }}
                   dark:focus:ring-{{ $settings['secondaryButton']['darkFocusRingColor'] }} w-auto">
                    <a href="{{ $settings['secondaryButton']['link'] }}">
                        {{ $settings['secondaryButton']['text'] }}
                    </a>
                </button>
            @endif
        </div>

    </div>
</section>
