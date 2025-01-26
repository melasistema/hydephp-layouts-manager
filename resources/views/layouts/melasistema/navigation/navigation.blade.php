@php
    $navigation = \Hyde\Framework\Features\Navigation\NavigationMenu::create();
    $ctaEnabled = \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.cta.enabled');
    $socialEnabled = \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.social.enabled');
    $social = \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.social.platforms');
@endphp

<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        @include('hyde-layouts-manager::layouts.melasistema.navigation.navigation-brand')
        <!-- Social Icons -->
        @if ($socialEnabled)
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="flex space-x-3">
                    @foreach ($social as $platform => $settings)
                        @if (isset($settings['enabled']) && $settings['enabled'])
                            <a href="{{ $settings['url'] }}" target="_blank"
                               class="flex items-center {{ $settings['iconColor'] }} dark:{{ $settings['darkIconColor'] }}">
                                <!-- SVG Icon with consistent size -->
                                <span class="inline-block w-6 h-6">
                            {!! $settings['icon'] !!}
                        </span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <!-- CTA Button -->
            @if ($ctaEnabled)
                <button type="button" class="
                    {{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.cta.extraClasses')  }}
                    {{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.cta.textColor')  }}
                    {{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.cta.bgColor')  }}
                    dark:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.cta.darkBgColor')  }}
                    hover:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.cta.hoverBgColor')  }}
                    dark:hover:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.cta.darkHoverBgColor')  }}
                    focus:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.cta.focusRingColor')  }}
                    dark:focus:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.cta.darkFocusRingColor')  }}
                ">
                    <a href="{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.cta.url', 'https://github.com/melasistema/hydephp-layouts-manager')  }}" target="{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.cta.urlTarget', '_self')  }}">
                        {{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.cta.text', 'Get Started')  }}
                    </a>
                </button>
            @endif
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
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-{{ $loop->index }}" class="
                        flex
                        items-center
                        {{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.navbarLink.color')  }}
                        dark:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.navbarLink.darkColor')  }}
                        hover:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.navbarLink.hoverColor')  }}
                        dark:hover:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.navbarLink.darkHoverColor')  }}
                    ">
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
                                                <a href="{{ $subItem }}" class="
                                        block
                                        py-2
                                        px-4
                                        {{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.navbarLink.color')  }}
                                        dark:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.navbarLink.darkColor')  }}
                                        hover:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.navbarLink.hoverColor')  }}
                                        dark:hover:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.navbarLink.darkHoverColor')  }}
                                    ">
                                                    {{ $subItem->label }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a href="{{ $item }}" {!! $item->isCurrent() ? 'aria-current="page"' : '' !!} class="
                    block
                    {{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.navbarLink.color')  }}
                    dark:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.navbarLink.darkColor')  }}
                    hover:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.navbarLink.hoverColor')  }}
                    dark:hover:{{ \Hyde\Facades\Config::get('hyde-layouts-manager.layouts.melasistema.navigation.navbarLink.darkHoverColor') }}
                ">
                                {{ $item->label }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
