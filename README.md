
# HydePHP Layouts Manager

**Simplify layout and component management in your HydePHP projects.**

HydePHP Layouts Manager is a powerful package designed to simplify the management of layouts and reusable components in your [HydePHP](https://hydephp.github.io/) projects. It provides an intuitive way to organize and customize themes, layouts, and components, enhancing your workflow while keeping your codebase clean and maintainable.

![HydePHP Layouts Manager](resources/images/mixed/header-melasistema-hydephp.png)

**Check it out:** [HydePHP Layouts Manager](https://hydephp.melasistema.com)

## 🌟 Features

-   **Dynamic Layout Management**: Easily switch and manage layouts across your HydePHP site.

-   **Reusable Components**: Build modular, customizable components with default attributes.

-   **CLI Tools**: Automate common tasks like listing layouts and merging configuration files.

-   **Built-in Flowbite Support**: Includes pre-designed components using the [Flowbite](https://flowbite.com/) library.

-   **Customizable Themes**: Modify and extend default layouts and styles.


## 🛠️ Installation

### 1. Install via Composer

Use Composer to add the package to your project:

```bash
composer require melasistema/hyde-layouts-manager
```

----------

### 2. Publish the Configuration

Publish the package's configuration file to your app's `config` directory for customization:

```bash
php hyde vendor:publish --provider="Melasistema\HydeLayoutsManager\HydeLayoutsManagerServiceProvider" --tag="hyde-layouts-manager-config"
```

----------

### 3. Merge Tailwind Configuration

#### **Manual Merge**

Manually include the Layouts Manager configuration in your `tailwind.config.js` file:

```javascript
const HydeLayoutsManagerConfig = require('./tailwind-layouts-manager.config.js');
    
    module.exports = {
       darkMode: 'class',
       content: [
           './resources/views/**/*.blade.php',
           './vendor/hyde/framework/resources/views/**/*.blade.php',
           ...HydeLayoutsManagerConfig.content,
       ],
       theme: {
           extend: {
               ...HydeLayoutsManagerConfig.theme.extend,
           },
       },
    };
```

#### **Automated Merge**

Automate the process with the `tailwind:merge` command. This replaces your existing `tailwind.config.js` file with the default configuration from HydeLayoutsManager.

**⚠️ Warning:** This will overwrite your existing file. Back it up if you have custom configurations.

Run the command:

```bash
php hyde tailwind:merge
```

----------

### 4. Install Required JavaScript Dependencies

The default theme and components shipped with HydeLayoutsManager use **Flowbite**. You can add these dependencies manually or by using the `package-json:merge` command.

#### **Manual Installation**

Add the following Flowbite dependencies to your `package.json` file:

```json
"devDependencies": {
  "flowbite": "^2.5.2"
}
```

Then, install the dependencies:

```bash
npm install
```

#### **Automated Merge**

Use the `package-json:merge` command to automatically merge the Flowbite dependencies into your existing `package.json`.

**⚠️ Safe in Fresh Projects:** This command modifies your `package.json`. Ensure to back it up if you have custom dependencies.

Run the command:

```bash
php hyde package-json:merge
```

Afterward, run:

```bash
npm install
```

----------

### 5. Add Flowbite Styles and Scripts to Laravel Mix Webpack

Add Flowbite styles and scripts in you `webpack.mix.js` file:

```js
let mix = require('laravel-mix');

mix.css('node_modules/flowbite/dist/flowbite.css', 'app.css')
    .js('node_modules/flowbite/dist/flowbite.js', 'app.js')
    .js('resources/assets/app.js', 'app.js')
    .postCss('resources/assets/app.css', 'app.css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .setPublicPath('_site/media')
    .copyDirectory('_site/media', '_media')
```

Run the Laravel Mix build:

```bash
npm run dev
```

----------

### 6. Modify the @extends Directive 

Add dynamic @extends() directive to your pages for the "Theme Switching" es. `index.blade.php`:

```php
@php($title = 'Home')

@extends(config('hyde-layouts-manager.layouts.' . config('hyde-layouts-manager.default_layout') . '.app', 'hyde::layouts.app'))

@section('content')
// page content
@endsection
```

If you are using a post page, you can use the MelaSistema blog post feed:

```php
@include('hyde-layouts-manager::layouts.melasistema.posts.blog-post-feed')
```

----------

### 7. (Optional) Publish Views

If you want to customize the default views, publish them to your application:

```bash
php hyde vendor:publish --provider="Melasistema\HydeLayoutsManager\HydeLayoutsManagerServiceProvider" --tag="hyde-layouts-manager-views"
```

----------

### Final Steps

After completing the installation, you’re ready to build dynamic layouts and reusable components with **HydePHP Layouts Manager**! 🎉

----------

## 🧩 Usage

### Setting the Default Layout

Edit the `default_layout` option in the configuration file:

```php
'default_layout' => 'melasistema', // Or 'hyde' for the default Hyde layout
```

### Customizing Layouts

Layouts are defined in the `layouts` section of the configuration file. Each layout can have different views, styles, scripts, and navigation settings:

```php
'layouts' => [
    'melasistema' => [
        'app' => 'hyde-layouts-manager::layouts.melasistema.app',
        'page' => 'hyde-layouts-manager::layouts.melasistema.page',
        'post' => 'hyde-layouts-manager::layouts.melasistema.post',
        'styles' => 'vendor/hyde-layouts-manager/css/melasistema/app.css',
        'scripts' => 'vendor/hyde-layouts-manager/js/melasistema/app.js',
    ],
],
```

## 📋 Example Project Structure

Below is an example of how your project could be structured after installing the package:

```plaintext
my-hyde-project/
├── config/
│   └── hyde-layouts-manager.php
├── resources/
│   └── views/
│       └── vendor/
│           └── hyde-layouts-manager/
│               ├── components/
│               │   └── hero.blade.php
│               └── layouts/
│                   └── melasistema/
│                       └── app.blade.php
└── tailwind-layouts-manager.config.js`
```
----------


### 🧩 Using Components

Components are reusable UI elements with configurable defaults. The package provides a method to dynamically render components in your Blade templates.

----------

#### **Using `renderComponent()`**

The `renderComponent()` method, provided by the `HydePHP Layouts Manager`, dynamically renders components with the ability to override default configurations. Here's an example:

```php
    {!! app('layout.manager')->renderComponent('hero', [
    
        'layout' => [
            'showSecondaryButton' => false,
        ],
        'settings' => [
            'textColor' => 'text-indigo-500',
            'darkTextColor' => 'dark:text-white',
            'headingText' => 'Make magic with HydePHP Layouts Manager',
            'subHeadingText' => 'HydePHP Layouts Manager simplifies layout and component management.',
            ...
        ]
                
    ]) !!} 
```

This method fetches the component configuration from the `hyde-layouts-manager.php` configuration file, allowing you to:

1.  Define defaults for each component.
2.  Override settings dynamically at runtime.

----------

#### **Deprecation Notice**

The usage of `@include` to render components is deprecated starting from version `0.1.0`. While previously supported, this approach does not leverage the package’s configuration capabilities and can lead to inconsistencies when managing assets like images.

If you previously used `@include`, we recommend migrating to the `renderComponent()` method for a more robust and future-proof implementation:

```php
    // Deprecated
    @include('hyde-layouts-manager::components.hero', [
        'settings' => [
            'headingText' => 'Make magic with HydePHP Layouts Manager',
            'subHeadingText' => 'HydePHP Layouts Manager simplifies layout and component management.',
        ]
    ])
    
    // Recommended
    {!! app('layout.manager')->renderComponent('hero', [
        'settings' => [
            'headingText' => 'Make magic with HydePHP Layouts Manager',
            'subHeadingText' => 'HydePHP Layouts Manager simplifies layout and component management.',
        ]
    ]) !!}
```

----------

#### **3. Configuring Components**

You can customize default settings for components in the `hyde-layouts-manager.php` configuration file under the `components` key. For example:

```php
'components' => [
    'hero' => [
        'view' => 'hyde-layouts-manager::components.hero',
        'default' => [
            'layout' => [
                'showSubHeadingText' => true,  // New flag to control visibility of the subheading
                'showPrimaryButton' => true, // New flag to control visibility of the primary button
                'showSecondaryButton' => true, // New flag to control visibility of the secondary button
            ],
            'settings' => [
                'bgColor' => 'bg-white',
                'darkBgColor' => 'dark:bg-gray-900',
                'padding' => 'py-16',
                'textColor' => 'text-gray-900',
                'darkTextColor' => 'dark:text-white',
                'headingText' => 'HydePHP Layouts Manager',
                'subHeadingText' => 'Manage your layouts and reusable components with ease.',
                'align' => 'center',
                'primaryButton' => [
                    'text' => '<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 98 96"><path fill-rule="evenodd" clip-rule="evenodd" d="M48.854 0C21.839 0 0 22 0 49.217c0 21.756 13.993 40.172 33.405 46.69 2.427.49 3.316-1.059 3.316-2.362 0-1.141-.08-5.052-.08-9.127-13.59 2.934-16.42-5.867-16.42-5.867-2.184-5.704-5.42-7.17-5.42-7.17-4.448-3.015.324-3.015.324-3.015 4.934.326 7.523 5.052 7.523 5.052 4.367 7.496 11.404 5.378 14.235 4.074.404-3.178 1.699-5.378 3.074-6.6-10.839-1.141-22.243-5.378-22.243-24.283 0-5.378 1.94-9.778 5.014-13.2-.485-1.222-2.184-6.275.486-13.038 0 0 4.125-1.304 13.426 5.052a46.97 46.97 0 0 1 12.214-1.63c4.125 0 8.33.571 12.213 1.63 9.302-6.356 13.427-5.052 13.427-5.052 2.67 6.763.97 11.816.485 13.038 3.155 3.422 5.015 7.822 5.015 13.2 0 18.905-11.404 23.06-22.324 24.283 1.78 1.548 3.316 4.481 3.316 9.126 0 6.6-.08 11.897-.08 13.526 0 1.304.89 2.853 3.316 2.364 19.412-6.52 33.405-24.935 33.405-46.691C97.707 22 75.788 0 48.854 0z" fill="#fff"/></svg> <span>GitHub</span>',
                    'link' => 'https://github.com/melasistema/hydephp-layouts-manager',
                    'bgColor' => 'bg-blue-700',
                    'textColor' => 'text-white',
                    'darkBgColor' => 'dark:bg-blue-900',
                    'darkTextColor' => 'dark:text-white',
                ],
                'secondaryButton' => [
                    'text' => 'About Me',
                    'link' => 'https://github.com/melasistema',
                    'bgColor' => 'bg-white',
                    'textColor' => 'text-indigo-500',
                    'darkBgColor' => 'dark:bg-gray-900',
                    'darkTextColor' => 'dark:text-white',
                ],
            ]
        ],
    ],
],
```

----------

#### **Benefits of `renderComponent()`**

-   **Dynamic Overrides:** Easily override defaults for individual component instances.
-   **Centralized Configuration:** Maintain consistent default values in the configuration file.
-   **Flexibility:** Simplifies reusability for components across projects.

----------

By leveraging these methods, you can build scalable and easily customizable layouts with HydeLayoutsManager. 🎉

### CLI Tools

The package includes several Artisan commands to streamline your workflow:

-   **List Layouts**: Display available layouts:

    ```php
    php hyde layouts:list
    ```

-   **Merge Package JSON**: Merge dependencies into your `package.json`:

    ```php
    php hyde package-json:merge
    ```

-   **Merge Tailwind Config**: Merge Tailwind configurations into your `tailwind.config.js` file:

    ```php
    php hyde tailwind:merge
    ```


## Customization

### Adding New Layouts

You can add custom layouts by defining them in the `layouts` section of the configuration file and placing the corresponding Blade templates in `resources/views/vendor/hyde-layouts-manager`.

### Overriding Default Components

To customize components, publish the views and edit the files in `resources/views/vendor/hyde-layouts-manager/components`.

### Dynamic Branding (with shipped default MelaSistema layout)

Customize navigation branding by setting the `navigation.brand` options in the configuration file:

```php
'navigation' => [
    'brand' => [
        'type' => 'image', // options: 'text', 'image', 'custom'
        'url' => '/',
        'lightLogo' => 'media/hyde-layouts-manager/logo/logo-navigation-light.png',
        'darkLogo' => 'media/hyde-layouts-manager/logo/logo-navigation-dark.png',
        'logoHeight' => 'h-10',
    ],
],
```

## 🌟 Credits

This project is made possible by the inspiration, contributions, and tools of an incredible community. A heartfelt thank you to:

-   **👨‍💻 Author**: [Luca Visciola](https://github.com/melasistema) – Passionate developer and creator of Hyde Layouts Manager. Reach out at [info@melasistema.com](mailto:info@melasistema.com) for inquiries or feedback.

-   **🚀 Inspired by HydePHP**: The foundation of this project stems from the brilliance of [Caen De Silva](https://github.com/caendesilva). Discover the magic of static site generation at [HydePHP GitHub](https://github.com/hydephp/hyde).

-   **🎨 Boosted by Flowbite**: This package features beautiful UI components and layouts, made even better with tools from [Flowbite](https://flowbite.com/).


### 🙌 Special Thanks

To the open-source community and all contributors—your dedication and collaboration inspire innovation and make projects like this possible. 🌟


## 📝 License

This package is licensed under the MIT License. See the [LICENSE](./LICENSE.md) file for details.

----------

## 📖 Changelog

All notable changes to this project are documented in [CHANGELOG](./CHANGELOG.md).

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

----------

## 💡 Contributing

We welcome contributions! Feel free to open an issue or submit a pull request on [GitHub](https://github.com/melasistema/hydephp-layouts-manager).

----------

## Support

If you encounter any issues or have questions, please open an issue on [GitHub](https://github.com/melasistema/hydephp-layouts-manager).