# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 0.4.0 - 2025-01-26

### **Added**

- **Themes Settings**:
  - Added new theme settings to the `hyde-layouts-manager.php` configuration file.

- **Navigation CTA Settings**:
  - Introduced a new `cta.enabled` option in the configuration file to enable or disable the Call to Action (CTA) button in the navigation bar.

- **Social Settings in Navigation**:
  - Integrated a configurable social media section in the navigation.
  - Social platforms such as GitHub, LinkedIn, Facebook, Instagram, X (formerly Twitter), and Discord have been added with customizable options like `enabled`, `url`, and `icon` (using SVG).
  - You can now easily add custom social platforms by defining the `enabled` option, platform `name`, `url`, and `svgIcon` in the configuration.

## 0.3.1 - 2025-01-19

### Fixed

- **Default theme image path**:
  - Image path for the `theme` needs `media` prefix to resolve correctly. Fixed the issue where the default theme image path was not resolving correctly.


## 0.3.0 - 2025-01-19

### **Changed**

- **Components Configuration**:
  - Renamed components to align with **Flowbite conventions** for improved consistency.
  - Restructured the components configuration tree to make it more extensible and future-proof. While this version represents a good starting point, it is likely not the final iteration. Exploring chunked JSON formats for configurations in the future may be beneficial. Feedback and suggestions are welcome!


- **Render Component Method**:
  - The **settings override mechanism** for components has been improved. Arrays such as `layout` and `settings`, defined in the `hydephp-layouts-manager.php` config file, are now **merged** to allow overriding of all options dynamically. Example usage:

  ```php
  {!! app('layout.manager')->renderComponent('flowbite.hero-sections.jumbotron', [
      'styleKey' => 'default',
      'settings' => [
          'applyContentMaxWidth' => true,
          'showPrimaryButton' => false,
          'showSecondaryButton' => false,
          'padding' => 'py-8 md:py-32 px-0 md:px-16',
          'bgImageUrl' => asset('hyde-hat-jumbotron.png'),
          'darkBgImageUrl' => asset('hyde-hat-jumbotron.png'),
          'bgImageAdditionalClasses' => 'bg-contain bg-no-repeat',
          'headingType' => 'h2',
          'headingTextFontFamily' => 'secondary',
          ...
      ]
  ]) !!}
  ```

### **Added**

- **Presets for Components**:
  - Introduced the ability to define **presets** for components, enabling quick and flexible customization. Use the `styleKey` to easily switch between pre-configured styles.


- **New Component Settings**:
  - **Jumbotron**: Introduced numerous new attributes, providing highly granular customization options.
  - **Grid**: Included additional settings for black & white control.


- **Tailwind Configuration Updates**:
  - Added new utility classes to the **Layouts Manager Tailwind configuration**.
  - Added new utility classes and an appropriate **`safelist`** to ensure proper class compilation.


## 0.2.1 - 2025-01-06

### Fixed

- **Configuration file**:
  - Set bigger default Hero text sizes for better visibility.
  - Added margin to default CTA button Hero GitHub icon.

- **Hero Component**:
  - Add inline-flex class to CTA button for alignment issue in the Hero component.

## 0.2.0 - 2025-01-06

### Added

- **Font Manager**:
  - Introduced a powerful Font Manager with the ability to dynamically load pre-mapped font families from [Google Fonts](https://fonts.google.com/).
  - Enabled font customization per layout through the `hyde-layouts-manager-fonts.json` configuration file.
  - Added `...HydeLayoutsManagerConfig.plugins` in the restructured `tailwind-layouts-manager.config.js`.
  - Introduced a new `DEFAULT_LAYOUT` option in the .env file, allowing users to specify/switch layouts and ensure consistent typography across the project.

- **Hero Component**:
  - Added alignment options for each part of the Hero component:
    - `headingTextAlign`: Controls the alignment of the heading text (`left`, `center`, `right`).
    - `subHeadingTextAlign`: Controls the alignment of the subheading text (`left`, `center`, `right`).
    - `buttonsGroupAlign`: Controls the alignment of the buttons (`left`, `center`, `right`).
  - Added font size options for each part of the Hero component:
    - `headingTextSize`: Controls the font size of the heading text. (`default`, `md`, `lg`).
    - `subHeadingTextSize`: Controls the font size of the heading text. (`default`, `md`, `lg`).
    - `buttonTextSize`: Controls the font size of the heading text. (`default`, `md`, `lg`).

- **Gallery Component**:
  - Added `rounded` layout option to allow configuring rounded corners for gallery images.

### Changed

- **Configuration Changes**:
  - The `DEFAULT_LAYOUT` variable is now a required setting in the `.env` file to ensure proper dynamic configuration of typography. Without this setting, the typography for the Hyde default theme will not render correctly when using the Layouts Manager.

### Documentation

- Updated the [README.md](./README.md) to include instructions for setting `DEFAULT_LAYOUT` in the `.env` file and other relevant information about the changes in this release.

## 0.1.1 - 2025-01-03

### Fixed
- **Fix Accordion default links**:
  - Fixed the issue where the default Accordion `links` configuration was not being loaded correctly.
- **Requirements section in [README.md](./README.md)**:
  - Updated the README.md with Requirements section.

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
