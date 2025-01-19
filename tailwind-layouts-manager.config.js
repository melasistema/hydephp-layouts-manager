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
 * @see [README.md#installation](https://github.com/melasistema/hydephp-layouts-manager/blob/master/README.md#installation)
 *
 **/
const fs = require('fs');
const path = require('path');
const plugin = require('tailwindcss/plugin');

const safeFontSplit = (font) => {
    const fontName = font?.split(':')[0] || 'system-ui';
    return fontName.includes(' ') ? `"${fontName}"` : fontName;
};

const fontConfigPath = './config/hyde-layouts-manager-fonts.json';
const userFonts = fs.existsSync(fontConfigPath)
    ? JSON.parse(fs.readFileSync(fontConfigPath, 'utf8'))
    : {};

// Dynamically load fonts based on the default layout injected by PHP
const layoutFonts = userFonts?.layouts?.[process.env.DEFAULT_LAYOUT || 'melasistema']?.families || {};
const typographyMapping = userFonts?.layouts?.[process.env.DEFAULT_LAYOUT || 'melasistema']?.typography_mapping || {};

module.exports = {
    darkMode: 'class',
    content: [
        './vendor/melasistema/hyde-layouts-manager/resources/views/**/*.blade.php',
        './vendor/melasistema/hyde-layouts-manager/resources/assets/**/*.css',
        './vendor/melasistema/hyde-layouts-manager/resources/assets/**/*.js',
    ],
    safelist: [
        // Spacing (Padding - Top)
        'pt-20',
        'pt-32',
        'pt-36',
        'md:pt-20',
        'md:pt-32',
        'md:pt-36',
        'lg:pt-32',
        'lg:pt-36',

        // Spacing (Padding - Bottom)
        'pb-20',
        'pb-32',

        // Spacing (Padding - Y Axis)
        'py-20',
        'md:py-32',
        'md:py-36',
        'lg:py-32',
        'lg:py-36',

        // Fonts
        'font-primary',
        'font-secondary',
        'font-display',
        'font-heading',
        'font-subheading',
        'font-accent',
        'font-code',
        'font-small',
        'font-special',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: [safeFontSplit(layoutFonts.primary), 'system-ui', 'sans-serif'],
                primary: [safeFontSplit(layoutFonts.primary), 'system-ui', 'sans-serif'],
                secondary: [safeFontSplit(layoutFonts.secondary), 'system-ui', 'sans-serif'],
                display: [safeFontSplit(layoutFonts.display), 'serif'],
                heading: [safeFontSplit(layoutFonts.heading), 'sans-serif'],
                subheading: [safeFontSplit(layoutFonts.subheading), 'sans-serif'],
                accent: [safeFontSplit(layoutFonts.accent), 'cursive'],
                code: [safeFontSplit(layoutFonts.code), 'monospace'],
                small: [safeFontSplit(layoutFonts.small), 'sans-serif'],
            },
            colors: {
                purple: {
                    500: '#ca34e8',
                    800: '#4C1EC6',
                },
            },
        },
    },
    plugins: [
        require('flowbite'),
        plugin(function ({ addBase }) {
            if (process.env.DEFAULT_LAYOUT !== 'hyde') {
                addBase({
                    'h1': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.h1] || 'system-ui') },
                    'h2': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.h2] || 'system-ui') },
                    'h3': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.h3] || 'system-ui') },
                    'h4': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.h4] || 'system-ui') },
                    'h5': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.h5] || 'system-ui') },
                    'h6': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.h6] || 'system-ui') },
                    'p': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.p] || 'system-ui') },
                    'small': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.small] || 'sans-serif') },
                    'code': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.code] || 'monospace') },
                    'blockquote': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.blockquote] || 'serif') },
                    'label': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.label] || 'system-ui') },
                    'button': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.button] || 'system-ui') },
                    '.font-special': { fontFamily: safeFontSplit(layoutFonts[typographyMapping.special] || 'system-ui') },
                });
            }
        }),
    ],
};
