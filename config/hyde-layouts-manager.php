<?php

/**
 * Hyde Layouts Manager Configuration File
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
    | This is the default layout theme used across the site. You can set this to
    | either 'hyde' for the default Hyde layout or any layout in your package's or project's available layouts.
    |
    */
    'default_layout' => 'melasistema',  // 'hyde' to use the default Hyde layout, or a custom layout like 'melasistema'

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
            'app' => 'vendor.hyde-layouts-manager.layouts.melasistema.app', // The MelaSistema Theme base layout view
            'page' => 'vendor.hyde-layouts-manager.layouts.melasistema.post', // The MelaSistema Theme pages layout view
            'post' => 'vendor.hyde-layouts-manager.layouts.melasistema.post', // The MelaSistema Theme posts layout view
            'styles' => 'vendor/hyde-layouts-manager/css/melasistema/app.css',
            'scripts' => 'vendor/hyde-layouts-manager/js/melasistema/app.js',
            'navigation' => [
                'brand' => [
                    'type' => 'custom', // accepted values: "image" "text" "custom"
                    'url' => '/',
                    'lightLogo'  => 'media/hyde-layouts-manager/logo/nav-logo.png',
                    'darkLogo'  => 'media/hyde-layouts-manager/logo/nav-logo-dark.png',
                    'logoHeight' => 'h-10',
                ],
                'cta' => [
                    'text' => 'Get Started',
                    'url' => 'https://github.com/melasistema/hydephp-layouts-manager',
                    'urlTarget' => '_blank',
                ]
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
        //'your-custom-theme' => [
        //'app' => 'vendor.your-custom-theme.layouts.melasistema.app',
        //'styles' => 'vendor/your-custom-theme/css/melasistema/app.css',
        //'scripts' => 'vendor/your-custom-theme/js/melasistema/app.js',
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
        'hero' => [
            'view' => 'vendor.hyde-layouts-manager.components.hero',
            'default' => [
                'bgColor' => 'bg-white',
                'darkBgColor' => 'dark:bg-gray-900',
                'padding' => 'py-16',
                'textColor' => 'text-gray-900',
                'darkTextColor' => 'dark:text-white',
                'title' => 'HydePHP Layouts Manager',
                'description' => 'Manage your layouts and reusable components with ease.',
                'align' => 'center',
                'primaryButton' => [
                    'text' => '<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 98 96"><path fill-rule="evenodd" clip-rule="evenodd" d="M48.854 0C21.839 0 0 22 0 49.217c0 21.756 13.993 40.172 33.405 46.69 2.427.49 3.316-1.059 3.316-2.362 0-1.141-.08-5.052-.08-9.127-13.59 2.934-16.42-5.867-16.42-5.867-2.184-5.704-5.42-7.17-5.42-7.17-4.448-3.015.324-3.015.324-3.015 4.934.326 7.523 5.052 7.523 5.052 4.367 7.496 11.404 5.378 14.235 4.074.404-3.178 1.699-5.378 3.074-6.6-10.839-1.141-22.243-5.378-22.243-24.283 0-5.378 1.94-9.778 5.014-13.2-.485-1.222-2.184-6.275.486-13.038 0 0 4.125-1.304 13.426 5.052a46.97 46.97 0 0 1 12.214-1.63c4.125 0 8.33.571 12.213 1.63 9.302-6.356 13.427-5.052 13.427-5.052 2.67 6.763.97 11.816.485 13.038 3.155 3.422 5.015 7.822 5.015 13.2 0 18.905-11.404 23.06-22.324 24.283 1.78 1.548 3.316 4.481 3.316 9.126 0 6.6-.08 11.897-.08 13.526 0 1.304.89 2.853 3.316 2.364 19.412-6.52 33.405-24.935 33.405-46.691C97.707 22 75.788 0 48.854 0z" fill="#fff"/></svg> <span>GitHub</span>',
                    'link' => 'https://github.com/melasistema/hydephp-layouts-manager',
                    'bgColor' => 'bg-blue-700',
                    'textColor' => 'text-white',
                    'darkBgColor' => 'dark:bg-gray-900',
                    'darkTextColor' => 'dark:text-white',
                ],
                'secondaryButton' => [
                    'text' => 'About Me',
                    'link' => 'https://github.com/melasistema',
                    'bgColor' => 'bg-white',
                    'textColor' => 'text-indigo-500',
                    'darkBgColor' => 'dark:bg-gray-900',
                    'darkTextColor' => 'dark:text-white',
                ],
            ],
        ],
        'accordion' => [
            'view' => 'vendor.hyde-layouts-manager.components.accordion',
            'default' => [
                'bgColor' => 'bg-gray-500',          // Default background color
                'darkBgColor' => 'dark:bg-gray-900',  // Default dark mode background color
                'textColor' => 'text-white',          // Default text color
                'darkTextColor' => 'dark:text-white', // Default dark mode text color
                'items' => [                          // Default accordion items
                    [
                        'title' => '🚀 What is Hyde Layouts Manager?',
                        'description' => 'HydeLayoutsManager is a powerful package designed to simplify layout and component management for your HydePHP. With it, you can build dynamic, reusable designs while keeping your codebase clean and maintainable. It\'s already available a template and some components using <a href="https://flowbite.com" target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Flowbite</a> <br><br> <strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hyde-layouts-manager" target="_blank">Explore it on GitHub →</a></strong>'
                    ],
                    [
                        'title' => '🌟 Why Use Hyde Layouts Manager?',
                        'description' => '
                            <ul>
                              <li><strong>Dynamic Layouts:</strong> Quickly switch and manage layouts across your site.</li>
                              <li><strong>Reusable Components:</strong> Save time by creating modular components with default attributes.</li>
                              <li><strong>Easy Integration:</strong> Works seamlessly with HydePHP.</li>
                              <li><strong>CLI Tools:</strong> Automate tasks like listing layouts, merging Tailwind configurations and more.</li>
                            </ul>
                            <br><strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hyde-layouts-manager/README.md" target="_blank">Learn more and get started →</a></strong>
                        '
                    ],
                    [
                        'title' => '🎯 Who Is It For?',
                        'description' => '
                            Hyde Layouts Manager is perfect for:
                            <ul>
                              <li>Developers building blogs, portfolios, or complex sites with HydePHP.</li>
                              <li>Laravel users looking for better layout and component management.</li>
                              <li>Teams seeking clean, maintainable design workflows. It\'s already including a Theme and few <a href="https://flowbite.com/" target="_blank">Flowbite</a> open source components.</li>
                            </ul>
                            <br><strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hyde-layouts-manager" target="_blank">See examples and contribute →</a></strong>
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
                            <br><strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hyde-layouts-manager" target="_blank">Try it for yourself →</a></strong>
                        '
                    ],
                    [
                        'title' => '🚀 Ready to Get Started?',
                        'description' => '
                             Download Hyde Layouts Manager now and elevate your HydePHP projects. With easy installation, rich features, and detailed documentation, it\'s the perfect addition to your toolkit.<br><br><strong><a href="https://github.com/melasistema/hyde-layouts-manager" target="_blank">Download from GitHub →</a></strong>
                        '
                    ],
                ],
            ],
        ],
        'carousel' => [
            'view' => 'vendor.hyde-layouts-manager.components.carousel',
            'default' => [
                'title' => '',
                'images' => [
                    'media/hyde-layouts-manager/carousel/example/carousel-1.svg',
                    'media/hyde-layouts-manager/carousel/example/carousel-2.svg',
                    'media/hyde-layouts-manager/carousel/example/carousel-3.svg',
                    'media/hyde-layouts-manager/carousel/example/carousel-4.svg',
                    'media/hyde-layouts-manager/carousel/example/carousel-5.svg',
                ],
            ],
        ],
    ],
];
