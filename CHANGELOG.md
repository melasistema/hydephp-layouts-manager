# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 0.1.0 - 2025-01-01

### Added

- **Gallery Component**:
  - Introduced a new `Gallery` component with a customizable layout grid. This component supports default and developer-provided images and ensures proper path resolution for both scenarios.
    ```php
    {!! app('layout.manager')->renderComponent('gallery', [
    
        'images' => [
            'media/custom-image1.jpg',
            'media/custom-image2.jpg',
            'media/custom-image3.jpg',
            'media/custom-image4.jpg',
        ],
        
        'layout' => [
            // Default grid column counts for each breakpoint
            'cols' => [
                'default' => 3, // Default columns for 'lg' and 'xl' screens
                'sm' => '',    // Small screens
                'md' => '',    // Medium screens
                'lg' => '',    // Large screens
                'xl' => '',    // Extra-large screens
            ],
            'gap' => 'gap-4',  // Default gap between items
        ],
     
    ]) !!}
    ```

- **Accordion Component Enhancements**:
  - Updated the `Accordion` component to allow the `items` array to be completely replaced when passed as an attribute. This ensures predictable behavior and avoids unintended merging of default and user-defined values.
    ```php
    {!! app('layout.manager')->renderComponent('accordion', [
    
        'items' => [
            [
                'title' => 'Custom Item 1',
                'description' => 'Custom description for Item 1.',
            ],
            [
                'title' => 'Custom Item 2',
                'description' => 'Custom description for Item 2.',
            ],
        ],
    
    ]) !!}
    ```

- **Hero Component Refactor**:
  - Refactored the `Hero` component to include more flexibility for layout customization. Added flags to control visibility for the subheading and buttons (`showSubHeadingText`, `showPrimaryButton`, `showSecondaryButton`). The component ensures better alignment with user expectations by providing detailed default settings and a clear usage guide.
  - 
    ```php
    {!! app('layout.manager')->renderComponent('hero', [
    
        'layout' => [
            'showSubHeadingText' => true,
            'showPrimaryButton' => true,
            'showSecondaryButton' => false,
        ],
        'settings' => [
            'headingText' => 'Welcome to HydePHP',
            'subHeadingText' => 'Your ultimate PHP framework.',
            'primaryButton' => [
                'text' => 'Get Started',
                'link' => '/get-started',
            ],
        ],
    
    ]) !!}
    ```

- **Trait: `HasAttributes`**:
  - Added the `HasAttributes` trait, which simplifies merging default attributes with user-defined attributes. This trait ensures consistent and predictable behavior across all components.

### Deprecated

- **Usage of `@include`**:
  - The use of `@include` for rendering components is now deprecated. Developers should use the `renderComponent()` method for better compatibility and future-proofing.
    ```php
    // Old (deprecated)
    @include('hyde-layouts-manager::components.gallery', ['images' => [...]])
    
    // New (recommended)
    {!! app('layout.manager')->renderComponent('gallery', ['images' => [...]]) !!}
    ```

### Changed

- **Default Path Handling**:
  - Updated default media path resolution to ensure compatibility with both package-provided and developer-defined images. This change fixes issues where `asset()` could not resolve paths correctly in certain HydePHP environments.

- **Attribute Merging Logic**:
  - Refined the `mergeAttributes` method to ensure the `items` attribute in the `Accordion` component fully replaces the default values rather than merging with them. This change provides a more intuitive behavior when customizing the component.

- **Hero Component Defaults**:
  - Enhanced the `Hero` component with additional default settings for better customization. Developers can now toggle the visibility of subheadings and buttons independently.


---

## 0.0.2 - 2024-12-29

### Changed

- **Layouts Configuration**:
  - Updated the layouts configuration to use namespaces for views. This ensures the correct flow of loading views, allowing views to be loaded from the package by default and properly overridden when published, and fix the issue.
    ```php
    'melasistema' => [
        'app' => 'hyde-layouts-manager::layouts.melasistema.app',
        'page' => 'hyde-layouts-manager::layouts.melasistema.page',
        'post' => 'hyde-layouts-manager::layouts.melasistema.post',
    ];
    ```

- **Hero Component Attributes**:
  - Renamed `title` and `description` attributes in the `Hero` component to `headingText` and `subHeadingText` respectively. This change avoids conflicts with HydePHP’s default page `title` and `description` attributes.
  ```php
    {!! app('layout.manager')->renderComponent('hero', 
        [
        'headingText' => 'Make magic with HydePHP Layouts Manager',
        'subHeadingText' => 'HydePHP Layouts Manager simplifies layout and component management.',
        'primaryButton' => [
            'text' => 'Get Started',
            'link' => '/start',
            ],
        ]) 
    !!}
  ```
  
### Fixed
- **Carousel images override**:
  - Now carousel default images array will be replaced as expected.

### Added
- **Symlink Creation for Placeholder Images**:
  - Implemented symlink creation for placeholder images used by the "HydePHP Layouts Manager" package. This ensures that placeholder images are correctly located and functional when using default MelaSistema components settings or the theme templates.
  - The symlink is automatically created during the package's boot process.

---

## 0.0.1 - 2024-12-18

### Added
- Initial release of HydePHP Layouts Manager package. 🚀
