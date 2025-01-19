<!--
|--------------------------------------------------------------------------
| Hero Component (Jumbotron)
|--------------------------------------------------------------------------
| This is the Hero component file for the HydePHP Layouts Manager package.
| File Path: resources/views/components/flowbite/hero-sections/jumbotron.blade.php
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
    'styleKey' => 'melasistema',
    'settings' => []
])

@php
    $layout = \Hyde\Facades\Config::get('hyde-layouts-manager.components.flowbite.hero-sections.jumbotron.styles.' . $styleKey);

    // Fallback layout settings if not found
    $layoutSettings = $layout['config'] ?? [];

    // Merge layout data, settings, and defaults
    $mergedSettings = array_replace_recursive(
        $layoutSettings['layout'] ?? [],
        $layoutSettings['settings'] ?? [],
        $settings
    );

    // Set default values for font families
    $headingTextFontFamily = $mergedSettings['headingTextFontFamily'] ?? '';
    $subHeadingTextFontFamily = $mergedSettings['subHeadingTextFontFamily'] ?? '';

    // Extract other settings for easier usage in Blade
    $bgImageUrl = $mergedSettings['bgImageUrl'] ?? '';
    $darkBgImageUrl = $mergedSettings['darkBgImageUrl'] ?? '';
    $bgColor = $mergedSettings['bgColor'] ?? '';
    $darkBgColor = $mergedSettings['darkBgColor'] ?? '';
    $padding = $mergedSettings['padding'] ?? '';

    // New setting to check whether to apply max-width
    $applyContentMaxWidth = $mergedSettings['applyContentMaxWidth'] ?? false;

    // Set component id for dynamic dark mode background image
    $componentId = uniqid('hero-section-');
@endphp

{{-- Rendering --}}
<div
    id="{{ $componentId }}"
    style="background-image: url('{{ $bgImageUrl }}');"
    class="
        {{ $bgColor }}
        dark:{{ $darkBgColor }}
        {{ $mergedSettings['bgImageAdditionalClasses'] ?? '' }}
        {{ $padding ?? '' }}
    ">

    <div class="mx-auto {{ $applyContentMaxWidth ? 'max-w-7xl' : '' }}">
        {{-- Heading --}}
        @if ($mergedSettings['headingText'] ?? false)
            <h1 class="font-{{ $headingTextFontFamily }} {{ $mergedSettings['headingTextSize']['default'] ?? '' }} md:{{ $mergedSettings['headingTextSize']['md'] ?? '' }} lg:{{ $mergedSettings['headingTextSize']['lg'] ?? '' }} {{ $mergedSettings['headingTextColor'] ?? '' }} dark:{{ $mergedSettings['darkHeadingTextColor'] ?? '' }} text-{{ $mergedSettings['headingTextAlign'] ?? '' }} {{ $mergedSettings['headingTextExtraClasses'] ?? '' }}">
                {!! $mergedSettings['headingText'] !!}
            </h1>
        @endif

        {{-- Subheading --}}
        @if ($mergedSettings['showSubHeadingText'] ?? false)
            @if ($mergedSettings['subHeadingText'] ?? false)
                <p class="font-{{ $subHeadingTextFontFamily }} {{ $mergedSettings['subHeadingTextSize']['default'] ?? '' }} md:{{ $mergedSettings['subHeadingTextSize']['md'] ?? '' }} lg:{{ $mergedSettings['subHeadingTextSize']['lg'] ?? '' }} {{ $mergedSettings['subHeadingTextColor'] ?? '' }} dark:{{ $mergedSettings['darkSubHeadingTextColor'] ?? '' }} text-{{ $mergedSettings['subHeadingTextAlign'] ?? '' }} {{ $mergedSettings['subHeadingTextExtraClasses'] ?? '' }}">
                    {!! $mergedSettings['subHeadingText'] !!}
                </p>
            @endif
        @endif

        {{-- Buttons --}}
        @if (($mergedSettings['showPrimaryButton'] ?? false) || ($mergedSettings['showSecondaryButton'] ?? false))
            <div class="flex flex-col sm:flex-row sm:space-y-0 space-y-4 w-full {{ $mergedSettings['buttonsGroupJustify'] ?? '' }} {{ $mergedSettings['buttonsGroupExtraClasses'] ?? '' }}">

                {{-- Primary Button --}}
                @if (($mergedSettings['showPrimaryButton'] ?? false) && !empty($mergedSettings['primaryButton']['link']))
                    <a href="{{ $mergedSettings['primaryButton']['link'] }}" class="
                        {{ $mergedSettings['primaryButton']['extraClasses'] ?? '' }}
                        {{ $mergedSettings['primaryButton']['textColor'] ?? '' }}
                        dark:{{ $mergedSettings['primaryButton']['darkTextColor'] ?? '' }}
                        {{ $mergedSettings['primaryButton']['bgColor'] ?? '' }}
                        dark:{{ $mergedSettings['primaryButton']['darkBgColor'] ?? '' }}
                        hover:{{ $mergedSettings['primaryButton']['hoverBgColor'] ?? '' }}
                        dark:hover:{{ $mergedSettings['primaryButton']['darkHoverBgColor'] ?? '' }}
                        focus:ring-4
                        focus:{{ $mergedSettings['primaryButton']['focusRingColor'] ?? '' }}
                        dark:focus:{{ $mergedSettings['primaryButton']['darkFocusRingColor'] ?? '' }}
                    ">
                        {!! $mergedSettings['primaryButton']['text'] !!}
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                @endif

                {{-- Secondary Button --}}
                @if (($mergedSettings['showSecondaryButton'] ?? false) && !empty($mergedSettings['secondaryButton']['link']))
                    <a href="{{ $mergedSettings['secondaryButton']['link'] }}" class="
                        {{ $mergedSettings['secondaryButton']['extraClasses'] ?? '' }}

                        {{ $mergedSettings['secondaryButton']['textColor'] ?? '' }}
                        dark:{{ $mergedSettings['secondaryButton']['darkTextColor'] ?? '' }}

                        {{ $mergedSettings['secondaryButton']['borderColor'] ?? '' }}
                        {{ $mergedSettings['secondaryButton']['bgColor'] ?? '' }}
                        dark:{{ $mergedSettings['secondaryButton']['darkBgColor'] ?? '' }}
                        hover:{{ $mergedSettings['secondaryButton']['hoverBgColor'] ?? '' }}
                        dark:hover:{{ $mergedSettings['secondaryButton']['darkHoverBgColor'] ?? '' }}

                        focus:{{ $mergedSettings['secondaryButton']['focusRingColor'] ?? '' }}
                        dark:focus:{{ $mergedSettings['secondaryButton']['darkFocusRingColor'] ?? '' }}
                    ">
                        {{ $mergedSettings['secondaryButton']['text'] }}
                    </a>
                @endif
            </div>
        @endif

        {{-- Optional Image After Heading --}}
        @if ($mergedSettings['showImageAfterHeading'] ?? false)
            <div class="flex justify-center">
                <img src="{{ $mergedSettings['imageBelowHero'] }}" alt="Image Below Hero">
            </div>
        @endif
    </div>
</div>

{{-- Dynamic Dark Mode Background Image --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the current component's element
        const currentComponent = document.getElementById('{{ $componentId }}');

        // Access the necessary variables within the component's script
        const darkBgImageUrl = '{{ $darkBgImageUrl }}';
        const lightBgImageUrl = '{{ $bgImageUrl }}';

        // Function to update background image for the current component
        const updateBackground = () => {
            if (document.documentElement.matches('.dark')) {
                currentComponent.style.backgroundImage = `url('${darkBgImageUrl}')`;
            } else {
                currentComponent.style.backgroundImage = `url('${lightBgImageUrl}')`;
            }
        };

        // Initial update and observe changes
        updateBackground();
        const observer = new MutationObserver(updateBackground);
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
    });
</script>
