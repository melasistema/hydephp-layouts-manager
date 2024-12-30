# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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
