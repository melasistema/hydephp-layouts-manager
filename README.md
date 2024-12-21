
# HydePHP Layouts Manager

## 🚀 Introduction

**HydeLayoutsManager** is a flexible package for managing layouts and reusable components in HydePHP-powered or Laravel-based websites. It allows you to easily define custom layouts, integrate components, and control your site's design from one central configuration. Whether you're building a blog, a portfolio, or a complex site, **HydeLayoutsManager** simplifies the process of managing and customizing layouts.

With **HydeLayoutsManager**, you can:

-   Define **custom layouts** and **components**.
-   Provide **default values** for your components, which can be easily overridden in Blade templates.
-   Use a built-in **command-line tool** to list all available layouts.
-   Seamlessly integrate with **HydePHP** or **Laravel** applications.

This package provides full flexibility while ensuring a clean, maintainable codebase.

----------

## 🌟 Key Features

-   **Dynamic Layout Management**: Manage multiple layouts in one place, making it easy to switch between them or add new ones.
-   **Reusable Components**: Build modular UI components that can be reused throughout your site with customizable default attributes.
-   **Easy Configuration**: Centralized configuration file for defining layouts and components, making it simple to adapt the package to your needs.
-   **CLI Tools**:
    -   `layouts:list` command for listing all registered layouts and components, perfect for quick checks and debugging.
    -   `tailwind:merge` command for automating the merging of Tailwind configurations.

----------

## 🛠️ Installation

You can install **HydeLayoutsManager** in any HydePHP or Laravel project.

### 1. Install via Composer

```bash
composer require melasistema/hyde-layouts-manager
```

### 2. Publish the Configuration

After installation, publish the package's configuration file to your app’s `config` directory:

```bash
php hyde vendor:publish --provider="Melasistema\HydeLayoutsManager\HydeLayoutsManagerServiceProvider" --tag="config"
```

### 3. Merge Tailwind Configuration

**Manually Merge Configuration:**

Include the Layouts Manager configuration in your `tailwind.config.js` file.

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

**Automate Tailwind Merge with Command:**

The `merge:tailwind` command helps automate the process of replacing your project's tailwind.config.js file with the default configuration from HydeLayoutsManager.

**Warning:** This will overwrite your existing tailwind.config.js. Back up your file if you have customizations.

Run the command:

```bash
php hyde merge:tailwind
```


### 4. (Optional) Publish Views

If you need to customize the default views, publish them to your application:

```bash
php hyde vendor:publish --provider="Melasistema\HydeLayoutsManager\HydeLayoutsManagerServiceProvider" --tag="views"
```
----------

## 🧩 Configuration

After installation, configure layouts and components in the `config/hyde-layouts-manager.php` file.

### Default Layout

Set the default layout for your site:

```php
'default_layout' => 'melasistema',
```
### Layout Definitions

Define your layouts with corresponding views:

```php
'layouts' => [
        // Default Hyde layout
        'hyde' => [
            'app' => 'hyde::layouts.app',
        ],
        // Melasistema custom layout
        'melasistema' => [
            'app' => 'vendor.hyde-layouts-manager.layouts.melasistema.app',
        ],
        // Your custom layout
        'my_custom_layout' => [
            'app' => 'vendor.hyde-layouts-manager.layouts.my_custom_layout.app',
        ],
    ],
```

### Component Definitions

Define reusable components with default attributes:

```php
'components' => [
    // Default hero component
    'hero' => [
            'view' => 'vendor.hyde-layouts-manager.components.hero',
            'default' => [
            'bgColor' => 'bg-blue-500',
            'title' => 'My Custom Hero',
        ],
    ],
    // Your custom component
    'my_custom_component' => [
        'view' => 'vendor.hyde-layouts-manager.components.my_custom_component',
        'default' => [
            'title' => 'My Custom Component',
            'description' => 'This is a custom component.',
        ],
    ],
],
```

----------

## ⚡ Usage

### Extending Layouts in Blade Templates

Extend a layout dynamically using the configuration file:

```blade
@extends(config('hyde-layouts-manager.layouts.' . config('hyde-layouts-manager.default_layout') . '.app', 'hyde::layouts.app'))
```

### Customizing Post Pages

An example of a custom post page using a layout:

```blade
@php($title = 'Latest Posts')

@extends(config('hyde-layouts-manager.layouts.' . config('hyde-layouts-manager.default_layout') . '.app', 'hyde::layouts.app'))

@section('content')
<main id="content" class="mx-auto max-w-7xl py-12 px-8">
    <header class="lg:mb-12 xl:mb-16">
        <h1 class="text-3xl text-left leading-10 tracking-tight font-extrabold sm:leading-none mb-8 md:mb-12 md:text-4xl md:text-center lg:text-5xl text-gray-700 dark:text-gray-200">
            Latest Posts
        </h1>
    </header>

    <div id="post-feed" class="max-w-3xl mx-auto">
        @include('hyde::components.blog-post-feed')
    </div>
</main>
@endsection` 

### Listing Layouts

You can list all available layouts and components with the following command:

`php artisan layouts:list`
```

----------

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

## 🔧 Service Provider

The **HydeLayoutsManagerServiceProvider** integrates the following features into your app:

-   Registers and configures layouts and components.
-   Loads and publishes configuration and views.
-   Enables easy customization and extension of your layout system.


```php
use Melasistema\HydeLayoutsManager\HydeLayoutsManagerServiceProvider;`
```

----------

## 📚 Documentation

For detailed instructions, refer to the [HydeLayoutsManager Documentation](https://your-documentation-link.com).

----------

## 💡 Contributing

We welcome contributions! Feel free to open an issue or submit a pull request on [GitHub](https://github.com/melasistema/hyde-layouts-manager).

----------

## 📝 License

This package is licensed under the MIT License. See the [LICENSE](./LICENSE.md) file for details.

----------

## 🎉 Credits

-   **Author**: [Luca Visciola](https://github.com/melasistema) ([info@melasistema.com](mailto:info@melasistema.com))
-   **Inspired by HydePHP**: Created by [Caen De Silva](https://github.com/caendesilva) ([HydePHP GitHub](https://github.com/hydephp/hyde))