/**
 * This is the Tailwind CSS configuration file for the HydePHP Layouts Manager package.
 *
 * @package Melasistema\HydeLayoutsManager
 * @copyright 2024 Luca Visciola
 * @license MIT License
 *
 * To include this configuration in your project's `tailwind.config.js`,
 * you need to require and merge it with your existing configuration or
 * use the command from the package `tailwind:merge`.
 * @see [README.md#installation] for more information on how to install the package. * @author  Luca Visciola
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
const melasistemaFonts = userFonts?.layouts?.melasistema?.families || {};
const typographyMapping = userFonts?.layouts?.melasistema?.typography_mapping || {};

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
                primary: [safeFontSplit(melasistemaFonts.primary), 'system-ui', 'sans-serif'],
                secondary: [safeFontSplit(melasistemaFonts.secondary), 'system-ui', 'sans-serif'],
                display: [safeFontSplit(melasistemaFonts.display), 'serif'],
                heading: [safeFontSplit(melasistemaFonts.heading), 'sans-serif'],
                subheading: [safeFontSplit(melasistemaFonts.subheading), 'sans-serif'],
                accent: [safeFontSplit(melasistemaFonts.accent), 'cursive'],
                code: [safeFontSplit(melasistemaFonts.code), 'monospace'],
                small: [safeFontSplit(melasistemaFonts.small), 'sans-serif'],
            },
        },
    },
    plugins: [
        require('flowbite'),
        plugin(function ({ addBase }) {
            addBase({
                'h1': { fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.h1] || 'sans') },
                'h2': { fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.h2] || 'sans') },
                'h3': { fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.h3] || 'subheading') },
                'h4': { fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.h4] || 'subheading') },
                'h5': { fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.h5] || 'secondary') },
                'h6': { fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.h6] || 'secondary') },
                'p': { fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.p] || 'sans') },
                'small': { fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.small] || 'small') },
                'code': { fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.code] || 'code') },
                'blockquote': { fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.blockquote] || 'display') },
                'label': { fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.label] || 'secondary') },
                'button': { fontFamily: safeFontSplit(melasistemaFonts[typographyMapping.button] || 'heading') }
            });
        }),
    ],
};
