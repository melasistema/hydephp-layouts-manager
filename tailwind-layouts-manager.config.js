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

/**
 * TODO Add Flowbite as a plugin
 */

module.exports = {
    darkMode: 'class',
    content: [
        './vendor/melasistema/hyde-layouts-manager/resources/views/**/*.blade.php',
        './vendor/melasistema/hyde-layouts-manager/resources/assets/**/*.css', // Include your package css assets
        './vendor/melasistema/hyde-layouts-manager/resources/assets/**/*.js', // Include your package js assets
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('flowbite'),
    ],
};