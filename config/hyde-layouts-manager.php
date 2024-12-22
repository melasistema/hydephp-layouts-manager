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
    'default_layout' => 'hyde',  // 'hyde' to use the default Hyde layout, or a custom layout like 'melasistema'

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
            'styles' => 'vendor/hyde-layouts-manager/css/melasistema/app.css', // Use a vendor namespace for the CSS file
            'scripts' => 'vendor/hyde-layouts-manager/js/melasistema/app.js', // Use a vendor namespace for the JS file
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
                'bgColor' => 'bg-indigo-500',
                'darkBgColor' => 'dark:bg-gray-900',
                'textColor' => 'text-white',
                'darkTextColor' => 'dark:text-white',
                'title' => 'Default Title',
                'description' => 'Default description for the hero component.',
                'align' => 'center',
            ],
        ],
    ],
];

