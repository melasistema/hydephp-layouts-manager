@if(config('hyde-layouts-manager.layouts.melasistema.navigation.brand.type') === 'image')
    <a href="{{ route('index') }}"
       class="flex items-center space-x-3 rtl:space-x-reverse md:w-48"
       x-data="{ darkMode: document.documentElement.classList.contains('dark') }"
       x-init="
            $watch('darkMode', value => {
                $refs.logo.src = value
                    ? '{{ config('hyde-layouts-manager.layouts.melasistema.navigation.brand.darkLogo', 'media/hyde-layouts-manager/logo/navigation-logo-dark.png') }}'
                    : '{{ config('hyde-layouts-manager.layouts.melasistema.navigation.brand.lightLogo', 'media/hyde-layouts-manager/logo/navigation-logo-light.png') }}';
            });
            // Listen for changes to the `dark` class
            const observer = new MutationObserver(() => {
                darkMode = document.documentElement.classList.contains('dark');
            });
            observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
        ">
        <img
                x-ref="logo"
                :src="darkMode
            ? '{{ config('hyde-layouts-manager.layouts.melasistema.navigation.brand.darkLogo', 'media/hyde-layouts-manager/logo/navigation-logo-dark.png') }}'
            : '{{ config('hyde-layouts-manager.layouts.melasistema.navigation.brand.lightLogo', 'media/hyde-layouts-manager/logo/navigation-logo-light.png') }}'"
                class="{{ config('hyde-layouts-manager.layouts.melasistema.navigation.brand.logoHeight', 'h-10') }}"
        >
    </a>
@elseif(config('hyde-layouts-manager.layouts.melasistema.navigation.brand.type') === 'text')
    <a href="{{ Routes::get('index') }}" class="font-bold px-4" aria-label="Home page">
        {{ config('hyde.name', 'HydePHP') }}
    </a>
@elseif(config('hyde-layouts-manager.layouts.melasistema.navigation.brand.type') === 'custom')
    <a href="{{ Routes::get('index') }}">
        <div class="flex items-center gap-4">
            <img class="w-10 h-10 rounded-full" src="{{ asset('hyde-layouts-manager/mixed/melasistema-luca-visciola.jpg')  }}" alt="Melasistema - Luca Visciola">
            <div class="font-medium dark:text-white hidden md:block">
                <div>Melasistema</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Packages for HydePHP</div>
            </div>
        </div>
    </a>

@endif
