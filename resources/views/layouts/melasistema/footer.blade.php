@if(config('hyde.footer') !== false)
    <footer class="p-4 bg-white md:p-8 lg:p-10 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl text-center">
            <a href="{{ route('index') }}" class="flex justify-center items-center text-2xl font-semibold text-gray-900 dark:text-white">
                <img src="{{ asset('hyde-layouts-manager/logo/hydephp-logo.svg') }}" class="h-8" alt="HydePHP Layouts Manager">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                    {{ config('hyde.name', 'HydePHP Layouts Manager') }}
                </span>
            </a>
            <p class="my-6 text-gray-500 dark:text-gray-400">{{ config('hyde-layouts-manager.layouts.melasistema.footer.default.description') }}</p>
            <ul class="flex flex-wrap justify-center items-center mb-6 text-gray-900 dark:text-white">
                @foreach(config('hyde-layouts-manager.layouts.melasistema.footer.default.links', []) as $link)
                    <li>
                        <a href="{{ $link['url'] }}" class="mr-4 hover:underline md:mr-6 ">{{ $link['title'] }}</a>
                    </li>
                @endforeach
            </ul>
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">{!! \Hyde\Support\Includes::markdown('footer', config('hyde.footer', 'Site proudly built with [HydePHP](https://github.com/hydephp/hyde) 🎩')) !!}</span>
        </div>
        <a href="#app" aria-label="Go to top of page" class="float-right">
            <button title="Scroll to top">
                <svg width="1.5rem" height="1.5rem" role="presentation" class="fill-current text-gray-500 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z" />
                </svg>
            </button>
        </a>
    </footer>
@endif