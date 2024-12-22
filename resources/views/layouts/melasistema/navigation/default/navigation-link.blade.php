<a href="{{ $item }}" {!! $item->isCurrent() ? 'aria-current="page"' : '' !!} class="block py-2 px-4 text-gray-700 hover:bg-indigo-600 hover:text-white dark:text-gray-100 dark:hover:bg-indigo-600 dark:hover:text-white transition-all duration-200 {{ $item->isCurrent() ? 'bg-indigo-500 text-white' : '' }}">
    {{ $item->label }}
</a>
