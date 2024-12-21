/**
 * This is the Tailwind CSS configuration file for the Hyde Layouts Manager package.
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



module.exports = {
    darkMode: 'class',
    content: [
        './vendor/melasistema/hyde-layouts-manager/resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
