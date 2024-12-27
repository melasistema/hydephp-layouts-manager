<!--
|--------------------------------------------------------------------------
| Accordion Component
|--------------------------------------------------------------------------
| This is the Accordion component file for the HydePHP Layouts Manager package.
| File Path: resources/views/components/accordion.blade.php
|
| Usage Recommendation:
| - It is recommended to use the `renderComponent` method to render this component.
|   This approach ensures that your attributes are dynamically merged with the
|   default configuration values defined in the `hyde-layouts-manager` config file.
| - Props are retained as a fallback mechanism, enabling you to use this component
|   directly without the `renderComponent` method if needed.
|
| Purpose:
| - Provides a reusable Hero UI element for developers using the HydePHP framework.
| - Includes default styles and text, which can be customized via the config file
|   or overridden during usage.
|
| Flowbite:
| - The component uses **Flowbite** https://flowbite.com, a Tailwind CSS component library, to implement the carousel functionality and design.
| - Make sure Flowbite is properly integrated into your project to ensure correct rendering of the carousel and its controls.
|
| @package    Melasistema\HydeLayoutsManager
| @author     Luca Visciola
| @copyright  2024 Luca Visciola
| @license    MIT License
|--------------------------------------------------------------------------
-->

@props([
    'bgColor' => 'bg-grey-500',
    'darkBgColor' => 'dark:bg-gray-900',
    'textColor' => 'text-white',
    'darkTextColor' => 'dark:text-white',
    'title' => 'Default Title',
    'description' => 'Default description for the hero component.',
    'align' => 'center',
    'items' => [
        [
            'title' => '🚀 What is HydePHP Layouts Manager?',
            'description' => 'HydePHP Layouts Manager is a powerful package designed to simplify layout and component management for your HydePHP. With it, you can build dynamic, reusable designs while keeping your codebase clean and maintainable. <br><br> <strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hyde-layouts-manager" target="_blank">Explore it on GitHub →</a></strong>'
        ],
        [
            'title' => '🌟 Why Use HydePHP Layouts Manager?',
            'description' => '
                <ul>
                  <li><strong>Dynamic Layouts:</strong> Quickly switch and manage layouts across your site.</li>
                  <li><strong>Reusable Components:</strong> Save time by creating modular components with default attributes.</li>
                  <li><strong>Easy Integration:</strong> Works seamlessly with HydePHP.</li>
                  <li><strong>CLI Tools:</strong> Automate tasks like listing layouts, merging Tailwind configurations and more.</li>
                </ul>
                <br><strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hyde-layouts-manager/README.md" target="_blank">Learn more and get started →</a></strong>
            '
        ],
        [
            'title' => '🎯 Who Is It For?',
            'description' => '
                HydePHP Layouts Manager is perfect for:
                <ul>
                  <li>Developers building blogs, portfolios, or complex sites with HydePHP.</li>
                  <li>Laravel users looking for better layout and component management.</li>
                  <li>Teams seeking clean, maintainable design workflows. It\'s already including a Theme and few <a href="https://flowbite.com/" target="_blank">Flowbite</a> open source components.</li>
                </ul>
                <br><strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hyde-layouts-manager" target="_blank">See examples and contribute →</a></strong>
            '
        ],
        [
            'title' => '💡 Key Benefits',
            'description' => '
                <ul>
                  <li><strong>Centralized Configuration:</strong> Manage all layouts and components from one file.</li>
                  <li><strong>Flexible Defaults:</strong> Override default attributes easily in Blade templates.</li>
                  <li><strong>Improved Workflow:</strong> Save time with built-in tools and reusable designs.</li>
                </ul>
                <br><strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hyde-layouts-manager" target="_blank">Try it for yourself →</a></strong>
            '
        ],
        [
            'title' => '🚀 Ready to Get Started?',
            'description' => '
                 Download HydePHP Layouts Manager now and elevate your HydePHP projects. With easy installation, rich features, and detailed documentation, it\'s the perfect addition to your toolkit.<br><br><strong><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://github.com/melasistema/hyde-layouts-manager" target="_blank">Download from GitHub →</a></strong>
            '
        ],
        [
            'title' => '✨ Credits',
            'description' => '
                 HydePHP Layouts Manager is built with the help of many amazing tools and frameworks:
                <ul>
                  <li><strong>HydePHP:</strong> A modern PHP static site generator. <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://hydephp.github.io/" target="_blank">Explore HydePHP →</a></li>
                  <li><strong>Flowbite:</strong> A library for beautiful, accessible UI components. <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://flowbite.com/" target="_blank">Explore Flowbite →</a></li>
                </ul>
                Special thanks to the open-source community for their contributions!
            '
        ],
    ],
])

<div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">

    @foreach ($items as $key => $item)
        <h2 id="accordion-flush-heading-{{ $key }}">
            <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-{{ $key }}" aria-expanded="true" aria-controls="accordion-flush-body-{{ $key }}">
                <span>{{ $item['title'] }}</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-flush-body-{{ $key }}" class="hidden" aria-labelledby="accordion-flush-heading-{{ $key }}">
            <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                <p class="mb-2 text-gray-500 dark:text-gray-400">{!! $item['description']  !!}</p>
            </div>
        </div>
    @endforeach
</div>
