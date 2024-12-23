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
    | either 'hyde' for the default Hyde layout or any layout in your package's available layouts.
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
            'app' => 'vendor.hyde-layouts-manager.layouts.melasistema.app', // The custom layout view
            'styles' => 'vendor/hyde-layouts-manager/css/melasistema/app.css', // The CSS for this layout
            'scripts' => 'vendor/hyde-layouts-manager/js/melasistema/app.js', // The JS for this layout
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Definitions
    |--------------------------------------------------------------------------
    |
    | Define reusable components for layouts.
    |
    */
    'components' => [
        'hero' => [
            'view' => 'vendor.hyde-layouts-manager.components.hero',
            'default' => [
                'bgColor' => 'bg-white',
                'darkBgColor' => 'dark:bg-gray-900',
                'textColor' => 'text-gray-900',
                'darkTextColor' => 'dark:text-white',
                'title' => 'HydePHP Layouts Manager',
                'description' => 'Manage your layouts and reusable components with ease.',
                'align' => 'center',
                'primaryButton' => [
                    'text' => 'Learn More',
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
                        'title' => 'Item 1',
                        'description' => 'Content for the first item of the accordion.',
                        'link' => 'https://melasistema.com',
                    ],
                ],
            ],
        ],
        'carousel' => [
            'view' => 'vendor.hyde-layouts-manager.components.carousel',
            'default' => [
                'title' => '',
                'images' => [
                    '_media/carousel/example/carousel-1.svg',
                    '_media/carousel/example/carousel-2.svg',
                    '_media/carousel/example/carousel-3.svg',
                    '_media/carousel/example/carousel-4.svg',
                    '_media/carousel/example/carousel-5.svg',
                ],
            ],
        ],
    ],
];

