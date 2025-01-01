<?php

declare(strict_types=1);

namespace Melasistema\HydeLayoutsManager\Traits;

use Hyde\Facades\Config;

/**
 * HasAttributes
 *
 * This trait provides utility methods for managing and merging attributes, allowing
 * for flexible configuration of components and layouts. It ensures that default
 * attributes can be overridden or extended with custom values, while handling specific
 * cases such as images and layout configurations.
 *
 * Key methods:
 * - mergeAttributes(): Combines default and user-provided attributes with support for
 *   deep merging and specific overrides (e.g., images and layout).
 * - resolveMediaPaths(): Resolves media paths for images, prioritizing custom project
 *   directories while falling back to default package paths.
 *
 * Usage:
 * - This trait is intended to be used in classes that need flexible attribute handling
 *   for layouts and components, ensuring default behavior can be customized dynamically.
 *
 * @package Melasistema\HydeLayoutsManager
 * @author  Luca Visciola
 * @copyright 2024 Luca Visciola
 * @license MIT License
 */
trait HasAttributes
{
    /**
     * Merge the default attributes with the provided attributes.
     *
     * @param array $defaultAttributes
     * @param array $attributes
     * @return array
     */
    public function mergeAttributes(array $defaultAttributes, array $attributes): array
    {
        // Handle images: prioritize user-defined images if provided
        if (isset($attributes['images']) && is_array($attributes['images'])) {
            $defaultAttributes['images'] = $attributes['images']; // Override default images with provided ones
        }

        // Resolve any media paths for images
        if (isset($defaultAttributes['images']) && is_array($defaultAttributes['images'])) {
            $defaultAttributes['images'] = $this->resolveMediaPaths($defaultAttributes['images']);
        }

        // Replace items entirely if provided
        if (isset($attributes['items']) && is_array($attributes['items'])) {
            $defaultAttributes['items'] = $attributes['items']; // Fully replace items
        }

        // Handle layout (e.g., columns): if layout is provided, fully override the layout
        if (isset($attributes['layout']) && is_array($attributes['layout'])) {
            $defaultAttributes['layout'] = $attributes['layout']; // Fully replace layout
        }

        // Merge the settings attribute (e.g., background color, heading text, etc.)
        if (isset($attributes['settings']) && is_array($attributes['settings'])) {
            $defaultAttributes['settings'] = array_replace_recursive(
                $defaultAttributes['settings'] ?? [],
                $attributes['settings']
            );
        }

        // Merge other attributes with defaults, replacing values for non-array keys
        return array_replace_recursive($defaultAttributes, $attributes);
    }

    /**
     * Resolve media paths for images, prioritize project media directory over package media directory.
     *
     * @param array $mediaPaths
     * @return array
     */
    protected function resolveMediaPaths(array $mediaPaths): array
    {
        $resolvedPaths = [];

        foreach ($mediaPaths as $path) {
            if (str_starts_with($path, Config::getString('hyde.media_directory', '_media'))) {
                // Use the developer's custom path directly, assuming they handle the `_media` prefix
                $resolvedPaths[] = asset($path);
            } else {
                // Default to the package's _media/hyde-layouts-manager folder for relative paths
                $resolvedPaths[] = asset('hyde-layouts-manager/' . ltrim($path, '/'));
            }
        }

        return $resolvedPaths;
    }
}
