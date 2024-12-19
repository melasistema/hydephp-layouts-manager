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
    | Layout Definitions
    |--------------------------------------------------------------------------
    |
    | The 'layouts' array allows you to define and configure different layout templates.
    | Each layout has a key (e.g., 'melasistema') that maps to a corresponding view file.
    | You can add custom layouts by adding new keys and views as necessary.
    |
    | Example:
    | 'custom' => [
    |     'app' => 'vendor.hyde-layouts-manager.layouts.custom',
    | ]
    |
    */
    'layouts' => [
        'melasistema' => [
            'app' => 'vendor.hyde-layouts-manager.layouts.app',  // The default layout view
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Definitions
    |--------------------------------------------------------------------------
    |
    | The 'components' array defines reusable components, such as the Hero component.
    | Each component can have a view path and optional default values for attributes.
    | The defaults can be overridden in the Blade templates when rendering the component.
    |
    | Example:
    | 'hero' => [
    |     'view' => 'vendor.hyde-layouts-manager.components.hero',
    |     'default' => [
    |         'bgColor' => 'bg-blue-500',
    |         'title' => 'My Custom Hero',
    |     ],
    | ]
    |
    */
    'components' => [
        'hero' => [
            'view' => 'vendor.hyde-layouts-manager.components.hero',  // Path to the hero component view
            'default' => [
                'bgColor' => 'bg-indigo-500',        // Default background color (light mode)
                'darkBgColor' => 'dark:bg-gray-900', // Dark mode background color
                'textColor' => 'text-white',         // Default text color (light mode)
                'darkTextColor' => 'dark:text-white', // Dark mode text color
                'title' => 'Default Title',          // Default title text
                'description' => 'Default description for the hero component.', // Default description text
                'align' => 'center',                 // Default text alignment: 'left', 'center', or 'right'
            ],
        ],
        // Additional components can follow this structure
        // 'tooltip' => [
        //     'view' => 'vendor.hyde-layouts-manager.components.tooltip',
        //     'default' => [
        //         'tooltipText' => 'Default tooltip text',
        //         'tooltipPosition' => 'top',
        //     ],
        // ],
    ],
];
