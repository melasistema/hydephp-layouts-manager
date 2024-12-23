{{--<a href="{{ $item->url }}"
   class="block py-2 px-3 {{ $item->isCurrent() ? 'text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}"
   aria-current="{{ $item->isCurrent() ? 'page' : 'false' }}">
    {{ $item->label }}
</a>--}}

<a href="{{ $item->uri ?? '#' }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
    {{ $item->label ?? 'Undefined' }}
</a>
