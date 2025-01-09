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

{{-- Fallback LayoutKey --}}
@props([ 'layoutKey' => 'melasistema',])

{{-- Fetch layout data directly --}}
@php($layout = \Hyde\Facades\Config::get('hyde-layouts-manager.components.flowbite.hero-sections.default-jumbotron.layouts.' . $layoutKey))

{{-- Check if layout is found, otherwise fallback to default --}}
@php($layoutSettings = $layout['config'] ?? [])

{{-- Merge layout data and settings --}}
@php(
    $mergedSettings = array_replace_recursive(
        $layoutSettings['layout'] ?? [],
        $layoutSettings['settings'] ?? [],
        $settings ?? []
    )
)  <!-- Ensure overrides apply -->


<!-- Render Hero Component (Jumbotron) -->
<section class="{{ $mergedSettings['bgColor'] ?? 'bg-white' }} dark:bg-{{ $mergedSettings['darkBgColor'] ?? 'gray-900' }}">
    <div class="{{ $mergedSettings['padding'] ?? 'py-8 px-4' }} mx-auto {{ $mergedSettings['maxWidth'] ?? 'max-w-screen-xl' }} text-center lg:py-16">

        <!-- Heading -->
        @if (!empty($mergedSettings['headingText']))
            <h1 class="mb-4 {{ $mergedSettings['headingTextSize']['default'] ?? 'text-4xl' }}
                md:{{ $mergedSettings['headingTextSize']['md'] ?? 'text-5xl' }}
                lg:{{ $mergedSettings['headingTextSize']['lg'] ?? 'text-6xl' }}
                font-extrabold tracking-tight leading-none
                text-{{ $mergedSettings['headingTextColor'] ?? 'gray-900' }} dark:text-{{ $mergedSettings['darkHeadingTextColor'] ?? 'white' }}">
                {{ $mergedSettings['headingText'] }}
            </h1>
        @endif

        <!-- Subheading -->
        @if (!empty($mergedSettings['subHeadingText']) && ($mergedSettings['showSubHeadingText'] ?? true))
            <p class="mb-8 {{ $mergedSettings['subHeadingTextSize']['default'] ?? 'text-lg' }}
            md:{{ $mergedSettings['subHeadingTextSize']['md'] ?? 'text-xl' }}
            lg:{{ $mergedSettings['subHeadingTextSize']['lg'] ?? '' }}
            font-normal text-{{ $mergedSettings['subHeadingTextColor'] ?? 'gray-500' }}
            sm:px-16 lg:px-48 dark:text-{{ $mergedSettings['darkSubHeadingTextColor'] ?? 'gray-400' }}">
                {{ $mergedSettings['subHeadingText'] }}
            </p>
        @endif

        <!-- Button Group -->
        @if (($mergedSettings['showPrimaryButton'] ?? false) || ($mergedSettings['showSecondaryButton'] ?? false))
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-{{ $mergedSettings['buttonsGroupAlign'] ?? 'center' }} sm:space-y-0 w-full">

                <!-- Primary Button -->
                @if (($mergedSettings['showPrimaryButton'] ?? false) && !empty($mergedSettings['primaryButton']['link']))
                    <a href="{{ $mergedSettings['primaryButton']['link'] }}"
                       class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center
                       {{ $mergedSettings['primaryButton']['textColor'] ?? 'text-white' }}
                       rounded-lg {{ $mergedSettings['primaryButton']['bgColor'] ?? 'bg-blue-700' }}
                       hover:bg-{{ $mergedSettings['primaryButton']['hoverBgColor'] ?? 'blue-800' }} focus:ring-4
                       focus:ring-{{ $mergedSettings['primaryButton']['focusRingColor'] ?? 'blue-300' }}
                       dark:focus:ring-{{ $mergedSettings['primaryButton']['darkFocusRingColor'] ?? 'blue-900' }}">
                        {!! $mergedSettings['primaryButton']['text'] !!}
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                @endif

                <!-- Secondary Button -->
                @if (($mergedSettings['showSecondaryButton'] ?? false) && !empty($mergedSettings['secondaryButton']['link']))
                    <a href="{{ $mergedSettings['secondaryButton']['link'] }}"
                       class="py-3 px-5 sm:ms-4 text-sm font-medium text-{{ $mergedSettings['secondaryButton']['textColor'] ?? 'gray-900' }}
                       focus:outline-none {{ $mergedSettings['secondaryButton']['bgColor'] ?? 'bg-white' }} rounded-lg border
                       {{ $mergedSettings['secondaryButton']['borderColor'] ?? 'border-gray-200' }}
                       hover:bg-{{ $mergedSettings['secondaryButton']['hoverBgColor'] ?? 'gray-100' }} focus:z-10
                       focus:ring-4 {{ $mergedSettings['secondaryButton']['focusRingColor'] ?? 'focus:ring-gray-100' }}
                       dark:focus:ring-{{ $mergedSettings['secondaryButton']['darkFocusRingColor'] ?? 'gray-700' }}
                       dark:bg-{{ $mergedSettings['secondaryButton']['darkBgColor'] ?? 'gray-800' }} dark:text-{{ $mergedSettings['secondaryButton']['darkTextColor'] ?? 'gray-400' }}
                       dark:border-{{ $mergedSettings['secondaryButton']['darkBorderColor'] ?? 'gray-600' }}
                       dark:hover:text-{{ $mergedSettings['secondaryButton']['darkHoverTextColor'] ?? 'white' }}
                       dark:hover:bg-{{ $mergedSettings['secondaryButton']['darkHoverBgColor'] ?? 'gray-700' }}">
                        {{ $mergedSettings['secondaryButton']['text'] }}
                    </a>
                @endif
            </div>
        @endif

    </div>
</section>
