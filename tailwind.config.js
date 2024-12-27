/**
 * This is the Merged Tailwind CSS configuration file for the HydePHP Layouts Manager package.
 *
 * @package Melasistema\HydeLayoutsManager
 * @author  Luca Visciola
 * @copyright 2024 Luca Visciola
 * @license MIT License
 *
 **/

const defaultTheme = require('tailwindcss/defaultTheme');
const HydeLayoutsManagerConfig = require('./tailwind-layouts-manager.config.js');

module.exports = {
    darkMode: 'class',
    content: [
        './_pages/**/*.blade.php',
        './resources/views/**/*.blade.php',
        './vendor/hyde/framework/resources/views/**/*.blade.php',
        ...HydeLayoutsManagerConfig.content,
    ],

    theme: {
        extend: {
            ...HydeLayoutsManagerConfig.theme.extend,
            typography: {
                DEFAULT: {
                    css: {
                        lineHeight: '1.5em',
                        maxWidth: '96ch',
                        h2: {
                            marginBottom: '0.75em',
                            marginTop: '1.5em',
                        },
                        a: {
                            color: '#5956eb',
                            '&:hover': {
                                color: '#4f46e5',
                            },
                            textDecoration: 'none'
                        },
                        blockquote: {
                            backgroundColor: '#80808020',
                            borderLeftColor: '#d1d5db',
                            color: 'unset',
                            fontWeight: 500,
                            fontStyle: 'unset',
                            lineHeight: '1.25em',
                            paddingLeft: '0.75em',
                            paddingTop: '.25em',
                            paddingBottom: '.25em',
                            marginTop: '1em',
                            marginBottom: '1em',
                            p: {
                                paddingRight: '.25em',
                                marginTop: '.25em',
                                marginBottom: '.25em',
                            },
                            'p::before': {
                                content: 'unset',
                            },
                            'p::after': {
                                content: 'unset',
                            },
                        },
                        code: {
                            font: 'unset',
                            backgroundColor: '#80808033',
                            paddingLeft: '4px',
                            paddingRight: '4px',
                            marginLeft: '-2px',
                            marginRight: '1px',
                            borderRadius: '4px'
                        },
                        'code::before': {
                            content: 'unset',
                        },
                        'code::after': {
                            content: 'unset',
                        },
                        pre: {
                            code: {
                                fontFamily: "'Fira Code Regular', Consolas, Monospace, 'Courier New'",
                            }
                        }
                    },
                },
                invert: {
                    css: {
                        a: {
                            color: '#818cf8',
                            '&:hover': {
                                color: '#6366f1',
                            },
                        },
                    },
                },
            },
            colors: {
                indigo: {
                    500: '#5956eb',
                },

            },
        },
    },

    plugins: [
        ...HydeLayoutsManagerConfig.plugins,
        require('@tailwindcss/typography')
    ],
};
