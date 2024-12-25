@php
    $navigation = \Hyde\Framework\Features\Navigation\NavigationMenu::create();
@endphp

<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        @include('hyde-layouts-manager::layouts.melasistema.navigation.navigation-brand')
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a href="docs/index">Documentation</a></button>
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                @include('hyde-layouts-manager::layouts.melasistema.navigation.theme-toggle-button')

                @foreach ($navigation->items as $item)
                    <li class="py-2 px-4">
                        @if($item instanceof \Hyde\Framework\Features\Navigation\DropdownNavItem)
                            <div class="relative group">
                                <!-- Dropdown Button -->
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-{{ $loop->index }}" class="flex items-center text-gray-700 hover:text-blue-700 dark:text-gray-400 dark:hover:text-blue-500">
                                    {{ \Hyde\Hyde::makeTitle($item->label) }}
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Dropdown Menu -->
                                <div id="dropdownNavbar-{{ $loop->index }}" class="absolute hidden z-50 bg-white rounded-lg shadow dark:bg-gray-700">
                                    <ul class="py-1">
                                        @foreach($item->items as $subItem)
                                            <li>
                                                <a href="{{ $subItem }}" class="block py-2 px-4 text-gray-700 hover:text-blue-700 dark:text-gray-400 dark:hover:text-blue-500">
                                                    {{ $subItem->label }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a href="{{ $item }}" {!! $item->isCurrent() ? 'aria-current="page"' : '' !!} class="block text-gray-700 hover:text-blue-700 dark:text-gray-400 dark:hover:text-blue-500">
                                {{ $item->label }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</nav>
