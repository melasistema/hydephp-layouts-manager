<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $page->title() }}</title>

@if (file_exists(Hyde::mediaPath('favicon.ico')))
    <link rel="shortcut icon" href="{{ Hyde::relativeLink('media/favicon.ico') }}" type="image/x-icon">
@endif

{{-- App Meta Tags --}}
@include('hyde-layouts-manager::layouts.melasistema.meta')

{{-- App Stylesheets --}}
@include('hyde-layouts-manager::layouts.melasistema.styles')

{{-- (Optional) Google Fonts --}}
@php
    // Load font configuration
    $fontConfigPath = config_path('hyde-layouts-manager-fonts.json');
    $userFonts = file_exists($fontConfigPath) ? json_decode(file_get_contents($fontConfigPath), true) : null;

    $useGoogleFonts = $userFonts['layouts']['melasistema']['use_google_fonts'] ?? false;
    $fontFamilies = $userFonts['layouts']['melasistema']['families'] ?? [];

    $googleFontsUrl = null;
    if ($useGoogleFonts && !empty($fontFamilies)) {
        $googleFonts = [];
        foreach ($fontFamilies as $font => $config) {
            // Split font name and variants
            [$family, $variants] = explode(':', $config . ':');
            $encodedFamily = urlencode($family);

            // If variants include "ital,wght", add them; otherwise default to normal
            $variants = $variants ?: 'wght@400';
            $googleFonts[] = "family={$encodedFamily}:{$variants}";
        }
        $googleFontsUrl = 'https://fonts.googleapis.com/css2?' . implode('&', $googleFonts) . '&display=swap';
    }
@endphp
@if ($useGoogleFonts && $googleFontsUrl)
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{ $googleFontsUrl }}" rel="stylesheet">
@endif

{{-- (Optional) Dark Mode --}}
@if(Features::hasDarkmode())
    {{-- Check the local storage for theme preference to avoid FOUC --}}
    <meta id="meta-color-scheme" name="color-scheme" content="{{ Config::getString('hyde.default_color_scheme', 'light') }}">
    <script>if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) { document.documentElement.classList.add('dark'); document.getElementById('meta-color-scheme').setAttribute('content', 'dark');} else { document.documentElement.classList.remove('dark') } </script>
@endif

{{-- Add any extra code to include before the closing <head> tag --}}
@stack('head')

{{-- If the user has defined any custom head tags, render them here --}}
{!! config('hyde.head') !!}
{!! Includes::html('head') !!}
