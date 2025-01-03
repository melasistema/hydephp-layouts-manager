/**
 * This is the Tailwind CSS configuration file for the HydePHP Layouts Manager package.
 *
 * @package Melasistema\HydeLayoutsManager
 * @author  Luca Visciola
 * @copyright 2024 Luca Visciola
 * @license MIT License
 *
 * To include this configuration in your project's `tailwind.config.js`,
 * you need to require and merge it with your existing configuration or
 * use the command from the package `tailwind:merge`.
 *
 * Example usage in `tailwind.config.js`:
 *
 * const HydeLayoutsManagerConfig = require('./tailwind-layouts-manager.config.js');
 *
 * module.exports = {
 *     darkMode: 'class',
 *     content: [
 *         ...HydeLayoutsManagerConfig.content, // Merge Hyde Layouts Manager content paths
 *     ],
 *     theme: {
 *         extend: {
 *             ...HydeLayoutsManagerConfig.theme.extend, // Merge the extend
 *        },
 *     },
 * };
 **/
const fs = require('fs');
const path = require('path');

// Load the fonts configuration dynamically from the JSON config file
const userFonts = JSON.parse(
    fs.readFileSync(path.resolve(__dirname, 'config/hyde-layouts-manager-fonts.json'), 'utf8')
);

const melasistemaFonts = userFonts?.layouts?.melasistema?.families || {};
const typographyMapping = userFonts?.layouts?.melasistema?.typography_mapping || {};

const safeFontSplit = (font) => (font?.split(':')[0] || 'system-ui');

const plugin = require('tailwindcss/plugin');

module.exports = {
    darkMode: 'class',
    content: [
        './vendor/melasistema/hyde-layouts-manager/resources/views/**/*.blade.php',
        './vendor/melasistema/hyde-layouts-manager/resources/assets/**/*.css',
        './vendor/melasistema/hyde-layouts-manager/resources/assets/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: [safeFontSplit(melasistemaFonts.primary), 'system-ui', 'sans-serif'],
                secondary: [safeFontSplit(melasistemaFonts.secondary), 'system-ui', 'sans-serif'],
                display: [safeFontSplit(melasistemaFonts.display), 'system-ui', 'serif'],
            },
        },
    },
    plugins: [
        require('flowbite'),
        plugin(function ({ addBase }) {
            addBase({
                'h1': {
                    fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.h1] || 'primary'),
                },
                'h2': {
                    fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.h2] || 'primary'),
                },
                'p': {
                    fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.p] || 'primary'),
                },
            });
        }),
    ],
};
