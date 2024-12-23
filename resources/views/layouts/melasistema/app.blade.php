<!--
|--------------------------------------------------------------------------
| Base Layout: MelaSistema Theme
|--------------------------------------------------------------------------
| This is the base layout file for the MelaSistema theme used in the HydeLayoutsManager package.
| File Path: resources/views/layouts/app.blade.php
|
| Usage Recommendation:
| - This file is the foundation for rendering your web pages using the MelaSistema theme.
| - It is recommended to extend this layout in your page-specific Blade views using the extends directive.
|
| Purpose:
| - Provides the core HTML structure for the MelaSistema theme, including the header, footer,
|   and other common elements shared across your site's pages.
| - It includes essential configurations such as dark mode and accessibility features.
|
| Components Included:
| - **Head Section**: Includes external styles, scripts, and meta tags required for the layout.
| - **Skip to Content Button**: Provides a link for users to quickly skip to the main content for accessibility.
| - **Navigation**: Displays the main site navigation.
| - **Footer**: Contains the site's footer elements.
| - **Scripts**: Includes necessary JavaScript files.
|
| Flowbite Integration:
| - This layout uses **Flowbite** https://flowbite.com, a Tailwind CSS component library, for the styling of navigation and other UI elements.
| - Ensure Flowbite is properly installed and configured to achieve the expected layout behavior.
|
| @package    Melasistema\HydeLayoutsManager
| @author     Luca Visciola
| @copyright  2024 Luca Visciola
| @license    MIT License
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="{{ config('hyde.language', 'en') }}">
    <head>
        <head>
            @include('hyde-layouts-manager::layouts.melasistema.head')
        </head>
    </head>
    <body id="app" class="flex flex-col min-h-screen overflow-x-hidden dark:bg-gray-900 dark:text-white" x-data="{ navigationOpen: false }" x-on:keydown.escape="navigationOpen = false;">
        @include('hyde-layouts-manager::layouts.melasistema.skip-to-content-button')
        @include('hyde-layouts-manager::layouts.melasistema.navigation.navigation')
        <h1>MelaTheme</h1>
        <section>
            @yield('content')
        </section>

        @include('hyde-layouts-manager::layouts.melasistema.footer')

        @include('hyde-layouts-manager::layouts.melasistema.scripts')
    </body>
</html>
