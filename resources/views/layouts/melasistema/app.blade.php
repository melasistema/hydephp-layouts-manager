<!DOCTYPE html>
<html lang="{{ config('hyde.language', 'en') }}">
<head>
    <head>
        @include('hyde-layouts-manager::layouts.melasistema.head')
    </head>
</head>
<body id="app" class="flex flex-col min-h-screen overflow-x-hidden dark:bg-gray-900 dark:text-white" x-data="{ navigationOpen: false }" x-on:keydown.escape="navigationOpen = false;">
@include('hyde-layouts-manager::components.skip-to-content-button')
@include('hyde-layouts-manager::components.navigation.default.navigation')

<section>
    @yield('content')
</section>

@include('hyde-layouts-manager::layouts.melasistema.footer')

@include('hyde-layouts-manager::layouts.melasistema.scripts')
</body>
</html>
