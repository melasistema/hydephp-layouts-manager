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
            //'app' => 'hyde-layouts-manager::layouts.your-custom-theme.app',
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
            'view' => 'hyde-layouts-manager::components.hero',
            'default' => [
                'layout' => [
                    'showSubHeadingText' => true,  // New flag to control visibility of the subheading
                    'showPrimaryButton' => true, // New flag to control visibility of the primary button
                    'showSecondaryButton' => true, // New flag to control visibility of the secondary button
                ],
                'settings' => [
                    'bgColor' => 'bg-white',
                    'darkBgColor' => 'dark:bg-gray-900',
                    'padding' => 'py-16',
                    'textColor' => 'text-gray-900',
                    'darkTextColor' => 'dark:text-white',
                    'headingText' => 'HydePHP Layouts Manager',
                    'subHeadingText' => 'Manage your layouts and reusable components with ease.',
                    'align' => 'center',
                    'primaryButton' => [
                        'text' => '<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 98 96"><path fill-rule="evenodd" clip-rule="evenodd" d="M48.854 0C21.839 0 0 22 0 49.217c0 21.756 13.993 40.172 33.405 46.69 2.427.49 3.316-1.059 3.316-2.362 0-1.141-.08-5.052-.08-9.127-13.59 2.934-16.42-5.867-16.42-5.867-2.184-5.704-5.42-7.17-5.42-7.17-4.448-3.015.324-3.015.324-3.015 4.934.326 7.523 5.052 7.523 5.052 4.367 7.496 11.404 5.378 14.235 4.074.404-3.178 1.699-5.378 3.074-6.6-10.839-1.141-22.243-5.378-22.243-24.283 0-5.378 1.94-9.778 5.014-13.2-.485-1.222-2.184-6.275.486-13.038 0 0 4.125-1.304 13.426 5.052a46.97 46.97 0 0 1 12.214-1.63c4.125 0 8.33.571 12.213 1.63 9.302-6.356 13.427-5.052 13.427-5.052 2.67 6.763.97 11.816.485 13.038 3.155 3.422 5.015 7.822 5.015 13.2 0 18.905-11.404 23.06-22.324 24.283 1.78 1.548 3.316 4.481 3.316 9.126 0 6.6-.08 11.897-.08 13.526 0 1.304.89 2.853 3.316 2.364 19.412-6.52 33.405-24.935 33.405-46.691C97.707 22 75.788 0 48.854 0z" fill="#fff"/></svg> <span>GitHub</span>',
                        'link' => 'https://github.com/melasistema/hydephp-layouts-manager',
                        'bgColor' => 'bg-blue-700',
                        'textColor' => 'text-white',
                        'darkBgColor' => 'dark:bg-blue-900',
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
                ]
            ],
        ],
        'accordion' => [
            'view' => 'hyde-layouts-manager::components.accordion',
            'default' => [
                'layout' => [
                    // Add any additional layout options here in the future
                ],
                'settings' => [
                    'bgColor' => 'bg-white',          // Default background color
                    'darkBgColor' => 'dark:bg-gray-900',  // Default dark mode background color
                    'textColor' => 'text-gray-900',          // Default text color
                    'darkTextColor' => 'dark:text-white', // Default dark mode text color
                ],
                'items' => [                          // Default accordion items
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
        'carousel' => [
            'view' => 'hyde-layouts-manager::components.carousel',
            'default' => [
                'layout' => [
                    'showIndicators' => true,  // New flag to control visibility of the indicators
                    'showControls' => true,    // New flag to control visibility of the controls
                    'rounded' => false,         // New flag to control rounded corners
                ],
                'images' => [
                    'carousel/example/carousel-1.svg',
                    'carousel/example/carousel-2.svg',
                    'carousel/example/carousel-3.svg',
                    'carousel/example/carousel-4.svg',
                    'carousel/example/carousel-5.svg',
                ],
            ],
        ],
        'gallery' => [
            'view' => 'hyde-layouts-manager::components.gallery',
            'default' => [
                'layout' => [
                    // Default grid column counts for each breakpoint
                    'cols' => [
                        'default' => 3, // Default columns for 'lg' and 'xl' screens
                        'sm' => '',    // Small screens
                        'md' => '',    // Medium screens
                        'lg' => '',    // Large screens
                        'xl' => '',    // Extra-large screens
                    ],
                    'gap' => 'gap-4',  // Default gap between items
                ],
                'images' => [
                    'gallery/hyde/01-hyde-logo-cut.png',
                    'gallery/hyde/02-hyde-logo-cut.png',
                    'gallery/hyde/03-hyde-logo-cut.png',
                    'gallery/hyde/04-hyde-logo-cut.png',
                    'gallery/hyde/05-hyde-logo-cut.png',
                    'gallery/hyde/06-hyde-logo-cut.png',
                    'gallery/hyde/07-hyde-logo-cut.png',
                    'gallery/hyde/08-hyde-logo-cut.png',
                    'gallery/hyde/09-hyde-logo-cut.png',
                    'gallery/hyde/10-hyde-logo-cut.png',
                    'gallery/hyde/11-hyde-logo-cut.png',
                    'gallery/hyde/12-hyde-logo-cut.png',
                ],
            ],
        ],
    ],
];
