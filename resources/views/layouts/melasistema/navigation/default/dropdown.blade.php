<div class="relative" x-data="{ open: false }">
    <button class="dropdown-button text-gray-700 hover:text-gray-900 dark:text-gray-100 dark:hover:text-gray-200 py-1" @click="open = ! open" @click.outside="open = false" @keydown.escape.window="open = false">
        {{ $label }}
        <svg x-bind:class="open ? 'transform rotate-180' : ''" class="transition-all w-5 h-5 dark:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="none" d="M0 0h24v24H0z"/>
            <path d="M7 10l5 5 5-5z"/>
        </svg>
    </button>

    <div class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-lg shadow-lg z-10 transition-all duration-200" :class="open ? 'block' : 'hidden'" x-cloak>
        <ul class="py-2">
            @isset($items)
                @foreach ($items as $item)
                    <li>
                        @include('hyde-layouts-manager::layouts.melasistema.navigation.default.navigation-link')
                    </li>
                @endforeach
            @else
                {{ $slot }}
            @endif
        </ul>
    </div>
</div>
