<?php

/**
 * HydePHP Layouts Manager Configuration File
 *
 * This file defines the configuration settings for the Hyde Layouts Manager package.
 * It includes layout definitions, component configurations, and their respective defaults.
 *
 * Key sections:
 * - 'layouts': Defines available layout templates.
 * - 'components': Defines the reusable components with their respective settings.
 *
 * You can modify the default values or add new components as needed.
 *
 * @package Melasistema\HydeLayoutsManager
 * @author  Luca Visciola
 * @copyright 2024 Luca Visciola
 * @license MIT License
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Default Theme Layout
    |--------------------------------------------------------------------------
    |
    | This setting determines the default layout theme used across the site.
    | Set it to 'hyde' for the default Hyde layout or specify any custom layout
    | available in this package or project.
    |
    | IMPORTANT:
    | To ensure seamless functionality of "HydePHP Layouts Manager" and
    | "Typo Manager," this value must be set in the .env file. The Tailwind
    | JavaScript configuration uses the (process.env) variable to dynamically
    | apply settings in a centralized and consistent way, ensuring default
    | fonts and layouts are applied correctly.
    |
    */
    'default_layout' => env('DEFAULT_LAYOUT', 'melasistema'),  // Use the .env file to manage this centrally.

    /*
    |--------------------------------------------------------------------------
    | Layout Definitions
    |--------------------------------------------------------------------------
    |
    | You can define custom layouts for each theme. Each theme can have multiple layouts.
    | You can override default views from this file.
    |
    */
    'layouts' => [
        'hyde' => [
            'app' => 'hyde::layouts.app', // Use Hyde's default layout view
        ],

        'melasistema' => [
            'app' => 'hyde-layouts-manager::layouts.melasistema.app',
            'page' => 'hyde-layouts-manager::layouts.melasistema.page',
            'post' => 'hyde-layouts-manager::layouts.melasistema.post',
            'styles' => 'vendor/hyde-layouts-manager/css/melasistema/app.css',
            'scripts' => 'vendor/hyde-layouts-manager/js/melasistema/app.js',
            'navigation' => [
                'brand' => [
                    'type' => 'custom', // accepted values: "image" "text" "custom"
                    'url' => '/',
                    'lightLogo'  => 'media/hyde-layouts-manager/logo/logo-navigation-light.png',
                    'darkLogo'  => 'media/hyde-layouts-manager/logo/logo-navigation-dark.png',
                    'logoHeight' => 'h-10',
                ],
                'navbarLink' => [
                    'color' => 'text-gray-700',
                    'darkColor' => 'text-gray-400',
                    'hoverColor' => 'text-purple-500',
                    'darkHoverColor' => 'text-purple-500',
                ],
                'cta' => [
                    'enabled' => true,
                    'text' => 'Get Started',
                    'textColor' => 'text-white',
                    'url' => 'https://github.com/melasistema/hydephp-layouts-manager',
                    'urlTarget' => '_blank',
                    'bgColor' => 'bg-purple-500',
                    'darkBgColor' => 'bg-purple-500',
                    'hoverBgColor' => 'bg-purple-800',
                    'darkHoverBgColor' => 'bg-purple-800',
                    'focusRingColor' => 'ring-purple-800',
                    'darkFocusRingColor' => 'ring-purple-800',
                    'extraClasses' => 'focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center',
                ],
                'social' => [
                    'enabled' => true,
                    'platforms' => [
                        'github' => [
                            'enabled' => true,
                            'url' => 'https://github.com/melasistema',
                            'icon' => '<svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path d="M16,2.345c7.735,0,14,6.265,14,14-.002,6.015-3.839,11.359-9.537,13.282-.7,.14-.963-.298-.963-.665,0-.473,.018-1.978,.018-3.85,0-1.312-.437-2.152-.945-2.59,3.115-.35,6.388-1.54,6.388-6.912,0-1.54-.543-2.783-1.435-3.762,.14-.35,.63-1.785-.14-3.71,0,0-1.173-.385-3.85,1.435-1.12-.315-2.31-.472-3.5-.472s-2.38,.157-3.5,.472c-2.677-1.802-3.85-1.435-3.85-1.435-.77,1.925-.28,3.36-.14,3.71-.892,.98-1.435,2.24-1.435,3.762,0,5.355,3.255,6.563,6.37,6.913-.403,.35-.77,.963-.893,1.872-.805,.368-2.818,.963-4.077-1.155-.263-.42-1.05-1.452-2.152-1.435-1.173,.018-.472,.665,.017,.927,.595,.332,1.277,1.575,1.435,1.978,.28,.787,1.19,2.293,4.707,1.645,0,1.173,.018,2.275,.018,2.607,0,.368-.263,.787-.963,.665-5.719-1.904-9.576-7.255-9.573-13.283,0-7.735,6.265-14,14-14Z"></path></svg>',
                            'iconColor' => 'text-gray-700',
                            'darkIconColor' => 'text-white',
                        ],
                        'linkedin' => [
                            'enabled' => true,
                            'url' => 'https://www.linkedin.com/in/luca-visciola/',
                            'icon' => '<svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path d="M26.111,3H5.889c-1.595,0-2.889,1.293-2.889,2.889V26.111c0,1.595,1.293,2.889,2.889,2.889H26.111c1.595,0,2.889-1.293,2.889-2.889V5.889c0-1.595-1.293-2.889-2.889-2.889ZM10.861,25.389h-3.877V12.87h3.877v12.519Zm-1.957-14.158c-1.267,0-2.293-1.034-2.293-2.31s1.026-2.31,2.293-2.31,2.292,1.034,2.292,2.31-1.026,2.31-2.292,2.31Zm16.485,14.158h-3.858v-6.571c0-1.802-.685-2.809-2.111-2.809-1.551,0-2.362,1.048-2.362,2.809v6.571h-3.718V12.87h3.718v1.686s1.118-2.069,3.775-2.069,4.556,1.621,4.556,4.975v7.926Z" fill-rule="evenodd"></path></svg>',
                            'iconColor' => 'text-gray-700',
                            'darkIconColor' => 'text-white',
                        ],
                        'facebook' => [
                            'enabled' => false,
                            'url' => 'https://facebook.com',
                            'icon' => '<svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path d="M16,2c-7.732,0-14,6.268-14,14,0,6.566,4.52,12.075,10.618,13.588v-9.31h-2.887v-4.278h2.887v-1.843c0-4.765,2.156-6.974,6.835-6.974,.887,0,2.417,.174,3.043,.348v3.878c-.33-.035-.904-.052-1.617-.052-2.296,0-3.183,.87-3.183,3.13v1.513h4.573l-.786,4.278h-3.787v9.619c6.932-.837,12.304-6.74,12.304-13.897,0-7.732-6.268-14-14-14Z"></path></svg>',
                            'iconColor' => 'text-gray-700',
                            'darkIconColor' => 'text-white',
                        ],
                        'instagram' => [
                            'enabled' => false,
                            'url' => 'https://facebook.com',
                            'icon' => '<svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path d="M10.202,2.098c-1.49,.07-2.507,.308-3.396,.657-.92,.359-1.7,.84-2.477,1.619-.776,.779-1.254,1.56-1.61,2.481-.345,.891-.578,1.909-.644,3.4-.066,1.49-.08,1.97-.073,5.771s.024,4.278,.096,5.772c.071,1.489,.308,2.506,.657,3.396,.359,.92,.84,1.7,1.619,2.477,.779,.776,1.559,1.253,2.483,1.61,.89,.344,1.909,.579,3.399,.644,1.49,.065,1.97,.08,5.771,.073,3.801-.007,4.279-.024,5.773-.095s2.505-.309,3.395-.657c.92-.36,1.701-.84,2.477-1.62s1.254-1.561,1.609-2.483c.345-.89,.579-1.909,.644-3.398,.065-1.494,.081-1.971,.073-5.773s-.024-4.278-.095-5.771-.308-2.507-.657-3.397c-.36-.92-.84-1.7-1.619-2.477s-1.561-1.254-2.483-1.609c-.891-.345-1.909-.58-3.399-.644s-1.97-.081-5.772-.074-4.278,.024-5.771,.096m.164,25.309c-1.365-.059-2.106-.286-2.6-.476-.654-.252-1.12-.557-1.612-1.044s-.795-.955-1.05-1.608c-.192-.494-.423-1.234-.487-2.599-.069-1.475-.084-1.918-.092-5.656s.006-4.18,.071-5.656c.058-1.364,.286-2.106,.476-2.6,.252-.655,.556-1.12,1.044-1.612s.955-.795,1.608-1.05c.493-.193,1.234-.422,2.598-.487,1.476-.07,1.919-.084,5.656-.092,3.737-.008,4.181,.006,5.658,.071,1.364,.059,2.106,.285,2.599,.476,.654,.252,1.12,.555,1.612,1.044s.795,.954,1.051,1.609c.193,.492,.422,1.232,.486,2.597,.07,1.476,.086,1.919,.093,5.656,.007,3.737-.006,4.181-.071,5.656-.06,1.365-.286,2.106-.476,2.601-.252,.654-.556,1.12-1.045,1.612s-.955,.795-1.608,1.05c-.493,.192-1.234,.422-2.597,.487-1.476,.069-1.919,.084-5.657,.092s-4.18-.007-5.656-.071M21.779,8.517c.002,.928,.755,1.679,1.683,1.677s1.679-.755,1.677-1.683c-.002-.928-.755-1.679-1.683-1.677,0,0,0,0,0,0-.928,.002-1.678,.755-1.677,1.683m-12.967,7.496c.008,3.97,3.232,7.182,7.202,7.174s7.183-3.232,7.176-7.202c-.008-3.97-3.233-7.183-7.203-7.175s-7.182,3.233-7.174,7.203m2.522-.005c-.005-2.577,2.08-4.671,4.658-4.676,2.577-.005,4.671,2.08,4.676,4.658,.005,2.577-2.08,4.671-4.658,4.676-2.577,.005-4.671-2.079-4.676-4.656h0"></path></svg>',
                            'iconColor' => 'text-gray-700',
                            'darkIconColor' => 'text-white',
                        ],
                        'x' => [
                            'enabled' => false,
                            'url' => 'https://x.com',
                            'icon' => '<svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path d="M18.42,14.009L27.891,3h-2.244l-8.224,9.559L10.855,3H3.28l9.932,14.455L3.28,29h2.244l8.684-10.095,6.936,10.095h7.576l-10.301-14.991h0Zm-3.074,3.573l-1.006-1.439L6.333,4.69h3.447l6.462,9.243,1.006,1.439,8.4,12.015h-3.447l-6.854-9.804h0Z"></path></svg>',
                            'iconColor' => 'text-gray-700',
                            'darkIconColor' => 'text-white',
                        ],
                        'discord' => [
                            'enabled' => false,
                            'url' => 'https://discord.com',
                            'icon' => '<svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path d="M26.413,6.536c-1.971-.902-4.052-1.543-6.189-1.904-.292,.523-.557,1.061-.793,1.612-2.277-.343-4.592-.343-6.869,0-.236-.551-.5-1.089-.793-1.612-2.139,.365-4.221,1.006-6.194,1.909C1.658,12.336,.596,17.987,1.127,23.558h0c2.294,1.695,4.861,2.984,7.591,3.811,.615-.827,1.158-1.704,1.626-2.622-.888-.332-1.744-.741-2.56-1.222,.215-.156,.425-.316,.628-.472,4.806,2.26,10.37,2.26,15.177,0,.205,.168,.415,.328,.628,.472-.817,.483-1.676,.892-2.565,1.225,.467,.918,1.011,1.794,1.626,2.619,2.732-.824,5.301-2.112,7.596-3.808h0c.623-6.461-1.064-12.06-4.46-17.025Zm-15.396,13.596c-1.479,0-2.702-1.343-2.702-2.994s1.18-3.006,2.697-3.006,2.73,1.354,2.704,3.006-1.192,2.994-2.699,2.994Zm9.967,0c-1.482,0-2.699-1.343-2.699-2.994s1.18-3.006,2.699-3.006,2.723,1.354,2.697,3.006-1.189,2.994-2.697,2.994Z"></path></svg>',
                            'iconColor' => 'text-gray-700',
                            'darkIconColor' => 'text-white',
                        ],
                    ],
                ],
            ],
            'footer' => [
                'view' => 'vendor.hyde-layouts-manager.layouts.melasistema.footer',
                'default' => [
                    'bgColor' => 'bg-white',
                    'darkBgColor' => 'dark:bg-gray-800',
                    'textColor' => 'text-gray-900',
                    'darkTextColor' => 'dark:text-white',
                    'description' => 'Manage your layouts and reusable components with ease.',
                    'links' => [
                        [
                            'title' => 'GitHub',
                            'url' => 'https://github.com/melasistema/hydephp-layouts-manager',
                        ],
                        [
                            'title' => 'About Me',
                            'url' => 'https://github.com/melasistema',
                        ],
                    ],
                ],
            ]
        ],
        // 'your-custom-theme' => [
        // 'app' => 'hyde-layouts-manager::layouts.your-custom-theme.app',
        // 'styles' => 'vendor/hyde-layouts-manager/css/your-custom-theme/app.css',
        // 'scripts' => 'vendor/hyde-layouts-manager/js/your-custom-theme/app.js',
        //],
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Definitions
    |--------------------------------------------------------------------------
    |
    | Define reusable components.
    |
    */
    'components' => [
        'flowbite' => [
            'hero-sections' => [
                'jumbotron' => [
                    'view' => 'hyde-layouts-manager::components.flowbite.hero-sections.jumbotron',
                    'styles' => [
                        'default' => [
                            'config' => [
                                'layout' => [
                                    'showSubHeadingText' => true,
                                    'showPrimaryButton' => true,
                                    'showSecondaryButton' => true,
                                    'showImageAfterHeading' => false,
                                    'applyContentMaxWidth' => true,
                                ],
                                'settings' => [
                                    'bgColor' => 'bg-white',
                                    'darkBgColor' => 'bg-gray-900',
                                    'bgImageUrl' => '',
                                    'darkBgImageUrl' => '',
                                    'bgImageAdditionalClasses' => '',
                                    'padding' => 'py-20 md:py-36 lg:py-36',
                                    'headingText' => 'HydePHP Layouts Manager',
                                    'headingTextColor' => 'text-gray-900',
                                    'darkHeadingTextColor' => 'text-white',
                                    'headingTextSize' => [
                                        'default' => 'text-6xl',
                                        'md' => 'md:text-6xl',
                                        'lg' => 'lg:text-8xl',
                                    ],
                                    'headingTextFontFamily' => '',
                                    'headingTextAlign' => 'center',
                                    'headingTextExtraClasses' => 'font-extrabold tracking-tight leading-none',
                                    'subHeadingText' => '<svg width="1.25rem" height="1.25rem" class="flex inline-flex ml-2 mb-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                        </svg> Relax, dim the lights, and cut through the complexity of managing layouts and reusable components with {!! ease !!}',
                                    'subHeadingTextColor' => 'text-gray-500',
                                    'darkSubHeadingTextColor' => 'text-white',
                                    'subHeadingTextSize' => [
                                        'default' => 'text-lg',
                                        'md' => 'md:text-xl',
                                        'lg' => 'lg:text-2xl',
                                    ],
                                    'subHeadingTextFontFamily' => '',
                                    'subHeadingTextAlign' => 'center',
                                    'subHeadingTextExtraClasses' => 'p-8 max-w-xl mx-auto',
                                    'buttonTextSize' => [
                                        'default' => 'text-base',
                                        'sm' => 'sm:text-lg',
                                    ],
                                    'buttonsGroupJustify' => 'justify-center',
                                    'buttonsGroupExtraClasses' => 'px-8',
                                    'primaryButton' => [
                                        'extraClasses' => ' inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center rounded-lg',
                                        'text' => '<svg class="mr-2 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 98 96"><path fill-rule="evenodd" clip-rule="evenodd" d="M48.854 0C21.839 0 0 22 0 49.217c0 21.756 13.993 40.172 33.405 46.69 2.427.49 3.316-1.059 3.316-2.362 0-1.141-.08-5.052-.08-9.127-13.59 2.934-16.42-5.867-16.42-5.867-2.184-5.704-5.42-7.17-5.42-7.17-4.448-3.015.324-3.015.324-3.015 4.934.326 7.523 5.052 7.523 5.052 4.367 7.496 11.404 5.378 14.235 4.074.404-3.178 1.699-5.378 3.074-6.6-10.839-1.141-22.243-5.378-22.243-24.283 0-5.378 1.94-9.778 5.014-13.2-.485-1.222-2.184-6.275.486-13.038 0 0 4.125-1.304 13.426 5.052a46.97 46.97 0 0 1 12.214-1.63c4.125 0 8.33.571 12.213 1.63 9.302-6.356 13.427-5.052 13.427-5.052 2.67 6.763.97 11.816.485 13.038 3.155 3.422 5.015 7.822 5.015 13.2 0 18.905-11.404 23.06-22.324 24.283 1.78 1.548 3.316 4.481 3.316 9.126 0 6.6-.08 11.897-.08 13.526 0 1.304.89 2.853 3.316 2.364 19.412-6.52 33.405-24.935 33.405-46.691C97.707 22 75.788 0 48.854 0z" fill="#fff"/></svg> <span>GitHub</span>',
                                        'link' => 'https://github.com/melasistema/hydephp-layouts-manager',
                                        'textColor' => 'text-white',
                                        'darkTextColor' => 'text-white',
                                        'bgColor' => 'bg-purple-500',
                                        'darkBgColor' => 'bg-purple-500',
                                        'hoverBgColor' => 'bg-purple-800',
                                        'darkHoverBgColor' => 'bg-purple-800',
                                        'focusRingColor' => 'ring-purple-800',
                                        'darkFocusRingColor' => 'ring-purple-800',
                                    ],
                                    'secondaryButton' => [
                                        'extraClasses' => 'py-3 px-5 sm:ms-4 text-sm font-medium text-center focus:outline-none rounded-lg border focus:ring-4',
                                        'text' => 'About Me',
                                        'link' => 'https://github.com/melasistema',
                                        'textColor' => 'text-gray-900',
                                        'darkTextColor' => 'text-gray-900',
                                        'bgColor' => 'bg-white',
                                        'darkBgColor' => 'bg-white',
                                        'hoverBgColor' => 'bg-gray-200',
                                        'darkHoverBgColor' => 'bg-gray-200',
                                        'focusRingColor' => 'ring-purple-800',
                                        'darkFocusRingColor' => 'ring-purple-800',
                                    ],
                                ]
                            ]
                        ],
                        'melasistema' => [
                            'config' => [  // Common config that applies to the layout
                                'layout' => [
                                    'showSubHeadingText' => true,
                                    'showPrimaryButton' => true,
                                    'showSecondaryButton' => true,
                                    'showImageAfterHeading' => true,
                                    'applyContentMaxWidth' => false,  // New setting to control max-width
                                ],
                                'settings' => [
                                    'bgColor' => 'bg-white',
                                    'darkBgColor' => 'bg-gray-900',
                                    'bgImageUrl' => 'media/hyde-layouts-manager/jumbotron/hero-purple-background.png',
                                    'darkBgImageUrl' => 'media/hyde-layouts-manager/jumbotron/hero-purple-background-dark.png',
                                    'bgImageAdditionalClasses' => 'bg-cover bg-center',
                                    'padding' => 'py-20 md:py-36 lg:py-36',
                                    'headingText' => 'HydePHP Layouts Manager',
                                    'headingTextColor' => 'text-purple-800',
                                    'darkHeadingTextColor' => 'text-white',
                                    'headingTextSize' => [
                                        'default' => 'text-6xl',
                                        'md' => 'md:text-6xl',
                                        'lg' => 'lg:text-8xl',
                                    ],
                                    'headingTextFontFamily' => 'display',
                                    'headingTextAlign' => 'center',
                                    'headingTextExtraClasses' => 'px-8 font-extrabold tracking-tight leading-none',
                                    'subHeadingText' => '<svg width="1.25rem" height="1.25rem" class="flex inline-flex ml-2 mb-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                        </svg> Relax, dim the lights, and cut through the complexity of managing layouts and reusable components with {!! ease !!}',
                                    'subHeadingTextColor' => 'text-gray-500',
                                    'darkSubHeadingTextColor' => 'text-white',
                                    'subHeadingTextSize' => [
                                        'default' => 'text-lg',
                                        'md' => 'md:text-xl',
                                        'lg' => 'lg:text-2xl',
                                    ],
                                    'subHeadingTextFontFamily' => 'code',
                                    'subHeadingTextAlign' => 'center',
                                    'subHeadingTextExtraClasses' => 'p-8 max-w-xl mx-auto',
                                    'buttonTextSize' => [
                                        'default' => 'text-base',
                                        'sm' => 'sm:text-lg',
                                    ],
                                    'buttonsGroupJustify' => 'justify-center',
                                    'buttonsGroupExtraClasses' => 'px-8',
                                    'primaryButton' => [
                                        'extraClasses' => ' inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center rounded-lg',
                                        'text' => '<svg class="mr-2 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 98 96"><path fill-rule="evenodd" clip-rule="evenodd" d="M48.854 0C21.839 0 0 22 0 49.217c0 21.756 13.993 40.172 33.405 46.69 2.427.49 3.316-1.059 3.316-2.362 0-1.141-.08-5.052-.08-9.127-13.59 2.934-16.42-5.867-16.42-5.867-2.184-5.704-5.42-7.17-5.42-7.17-4.448-3.015.324-3.015.324-3.015 4.934.326 7.523 5.052 7.523 5.052 4.367 7.496 11.404 5.378 14.235 4.074.404-3.178 1.699-5.378 3.074-6.6-10.839-1.141-22.243-5.378-22.243-24.283 0-5.378 1.94-9.778 5.014-13.2-.485-1.222-2.184-6.275.486-13.038 0 0 4.125-1.304 13.426 5.052a46.97 46.97 0 0 1 12.214-1.63c4.125 0 8.33.571 12.213 1.63 9.302-6.356 13.427-5.052 13.427-5.052 2.67 6.763.97 11.816.485 13.038 3.155 3.422 5.015 7.822 5.015 13.2 0 18.905-11.404 23.06-22.324 24.283 1.78 1.548 3.316 4.481 3.316 9.126 0 6.6-.08 11.897-.08 13.526 0 1.304.89 2.853 3.316 2.364 19.412-6.52 33.405-24.935 33.405-46.691C97.707 22 75.788 0 48.854 0z" fill="#fff"/></svg> <span>GitHub</span>',
                                        'link' => 'https://github.com/melasistema/hydephp-layouts-manager',
                                        'textColor' => 'text-white',
                                        'darkTextColor' => 'text-white',
                                        'bgColor' => 'bg-purple-500',
                                        'darkBgColor' => 'bg-purple-500',
                                        'hoverBgColor' => 'bg-purple-800',
                                        'darkHoverBgColor' => 'bg-purple-800',
                                        'focusRingColor' => 'ring-purple-800',
                                        'darkFocusRingColor' => 'ring-purple-800',
                                    ],
                                    'secondaryButton' => [
                                        'extraClasses' => 'py-3 px-5 sm:ms-4 text-sm font-medium text-center focus:outline-none rounded-lg border focus:ring-4',
                                        'text' => 'About Me',
                                        'link' => 'https://github.com/melasistema',
                                        'textColor' => 'text-gray-900',
                                        'darkTextColor' => 'text-gray-900',
                                        'bgColor' => 'bg-white',
                                        'darkBgColor' => 'bg-white',
                                        'hoverBgColor' => 'bg-gray-200',
                                        'darkHoverBgColor' => 'bg-gray-200',
                                        'focusRingColor' => 'ring-purple-800',
                                        'darkFocusRingColor' => 'ring-purple-800',
                                    ],
                                    'imageBelowHero' => 'media/hyde-layouts-manager/jumbotron/hero-purple-image.png',
                                ]
                            ]
                        ],
                    ],
                ],
            ],
            'carousel' => [
                'default-slider' => [
                    'view' => 'hyde-layouts-manager::components.flowbite.carousel.default-slider',
                    'styles' => [
                        'default' => [
                            'config' => [
                                'layout' => [
                                    'showIndicators' => true,  // New flag to control visibility of the indicators
                                    'showControls' => true,    // New flag to control visibility of the controls
                                    'rounded' => false,         // New flag to control rounded corners
                                ],
                                'settings' => [],
                                'images' => [
                                    'hyde-layouts-manager/carousel/example/carousel-1.svg',
                                    'hyde-layouts-manager/carousel/example/carousel-2.svg',
                                    'hyde-layouts-manager/carousel/example/carousel-3.svg',
                                    'hyde-layouts-manager/carousel/example/carousel-4.svg',
                                    'hyde-layouts-manager/carousel/example/carousel-5.svg',
                                ],
                            ]
                        ],
                    ]
                ],
            ],
            'gallery' => [
                'grid' => [
                    'view' => 'hyde-layouts-manager::components.flowbite.gallery.grid',
                    'styles' => [
                        'default' => [
                            'config' => [
                                'layout' => [
                                    'blackAndWhite' => false,  // New flag to control black and white images
                                    'randomBlackAndWhite' => false,
                                ],
                                'settings' => [
                                    'cols' => [
                                        'default' => 3,  // Columns for 'lg' and 'xl'
                                        'sm' => '',      // Small screens
                                        'md' => '',      // Medium screens
                                        'lg' => '',      // Large screens
                                        'xl' => '',      // Extra-large screens
                                    ],
                                    'gap' => 'gap-4',  // Gap between items
                                    'rounded' => true, // Rounded corners
                                ],
                                'images' => [
                                    'hyde-layouts-manager/gallery/hyde/01-hyde-logo-cut.png',
                                    'hyde-layouts-manager/gallery/hyde/02-hyde-logo-cut.png',
                                    'hyde-layouts-manager/gallery/hyde/03-hyde-logo-cut.png',
                                    'hyde-layouts-manager/gallery/hyde/04-hyde-logo-cut.png',
                                    'hyde-layouts-manager/gallery/hyde/05-hyde-logo-cut.png',
                                    'hyde-layouts-manager/gallery/hyde/06-hyde-logo-cut.png',
                                    'hyde-layouts-manager/gallery/hyde/07-hyde-logo-cut.png',
                                    'hyde-layouts-manager/gallery/hyde/08-hyde-logo-cut.png',
                                    'hyde-layouts-manager/gallery/hyde/09-hyde-logo-cut.png',
                                    'hyde-layouts-manager/gallery/hyde/10-hyde-logo-cut.png',
                                    'hyde-layouts-manager/gallery/hyde/11-hyde-logo-cut.png',
                                    'hyde-layouts-manager/gallery/hyde/12-hyde-logo-cut.png',
                                ],
                            ]
                        ],
                    ],
                ]
            ],
            'accordion' => [
                'default-accordion' => [
                    'view' => 'hyde-layouts-manager::components.flowbite.accordion.default-accordion',
                    'styles' => [
                        'default' => [
                            'config' => [
                                'layout' => [
                                    // Add any additional layout options here in the future
                                ],
                                'settings' => [
                                    'bgColor' => 'bg-white',          // Default background color
                                    'darkBgColor' => 'dark:bg-gray-900',  // Default dark mode background color
                                    'textColor' => 'text-gray-900',          // Default text color
                                    'darkTextColor' => 'dark:text-white', // Default dark mode text color
                                ],
                                'items' => [ // Default accordion items
                                    [
                                        'title' => '🚀 What is HydePHP Layouts Manager?',
                                        'description' => 'HydePHP Layouts Manager is a powerful package designed to simplify layout and component management for your HydePHP. With it, you can build dynamic, reusable designs while keeping your codebase clean and maintainable. It\'s already available a template and some components using <a href="https://flowbite.com" target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Flowbite</a> <br><br> <strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hydephp-layouts-manager" target="_blank">Explore it on GitHub →</a></strong>'
                                    ],
                                    [
                                        'title' => '🌟 Why Use HydePHP Layouts Manager?',
                                        'description' => '
                            <ul>
                              <li><strong>Dynamic Layouts:</strong> Quickly switch and manage layouts across your site.</li>
                              <li><strong>Reusable Components:</strong> Save time by creating modular components with default attributes.</li>
                              <li><strong>Easy Integration:</strong> Works seamlessly with HydePHP.</li>
                              <li><strong>CLI Tools:</strong> Automate tasks like listing layouts, merging Tailwind configurations and more.</li>
                            </ul>
                            <br><strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hydephp-layouts-manager" target="_blank">Learn more and get started →</a></strong>
                        '
                                    ],
                                    [
                                        'title' => '🎯 Who Is It For?',
                                        'description' => '
                            HydePHP Layouts Manager is perfect for:
                            <ul>
                              <li>Developers building blogs, portfolios, or complex sites with HydePHP.</li>
                              <li>Laravel users looking for better layout and component management.</li>
                              <li>Teams seeking clean, maintainable design workflows. It\'s already including a Theme and few <a href="https://flowbite.com/" target="_blank">Flowbite</a> open source components.</li>
                            </ul>
                            <br><strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hydephp-layouts-manager" target="_blank">See examples and contribute →</a></strong>
                        '
                                    ],
                                    [
                                        'title' => '💡 Key Benefits',
                                        'description' => '
                            <ul>
                              <li><strong>Centralized Configuration:</strong> Manage all layouts and components from one file.</li>
                              <li><strong>Flexible Defaults:</strong> Override default attributes easily in Blade templates.</li>
                              <li><strong>Improved Workflow:</strong> Save time with built-in tools and reusable designs.</li>
                            </ul>
                            <br><strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hydephp-layouts-manager" target="_blank">Try it for yourself →</a></strong>
                        '
                                    ],
                                    [
                                        'title' => '🚀 Ready to Get Started?',
                                        'description' => '
                             Download HydePHP Layouts Manager now and elevate your HydePHP projects. With easy installation, rich features, and detailed documentation, it\'s the perfect addition to your toolkit.<br><br><strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hydephp-layouts-manager" target="_blank">Download from GitHub →</a></strong>
                        '
                                    ],
                                    [
                                        'title' => '✨ Credits',
                                        'description' => '
                             HydePHP Layouts Manager is built with the help of many amazing tools and frameworks:
                            <ul>
                              <li><strong>HydePHP:</strong> A modern PHP static site generator. <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://hydephp.github.io/" target="_blank">Explore HydePHP →</a></li>
                              <li><strong>Flowbite:</strong> A library for beautiful, accessible UI components. <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://flowbite.com/" target="_blank">Explore Flowbite →</a></li>
                            </ul>
                            Special thanks to the open-source community for their contributions!
                        '
                                    ],
                                ],
                            ],
                        ],
                    ]
                ]
            ],
        ],
    ],
];
