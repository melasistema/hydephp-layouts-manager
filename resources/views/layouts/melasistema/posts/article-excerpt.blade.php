@php /** @var \Hyde\Pages\MarkdownPost $post */ @endphp
<article class="mt-4 mb-8" itemscope itemtype="https://schema.org/Article">

    <meta itemprop="identifier" content="{{ $post->identifier }}">
    @if(Hyde::hasSiteUrl())
        <meta itemprop="url" content="{{ Hyde::url('posts/' . $post->identifier) }}">
    @endif

    <a href="{{ $post->getRoute() }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <div>
            @includeWhen(isset($post->image), 'hyde-layouts-manager::layouts.melasistema.posts.post.image')
        </div>
        <div class="flex flex-col justify-between p-4 leading-normal w-3/4 md:w-2/3">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->data('title') ?? $post->title }}</h5>
            <div class="mb-8 text-xs">
                @isset($post->date)
                    <span class="opacity-75">
                        <span itemprop="dateCreated datePublished">{{ $post->date->short }}</span>{{ isset($post->author) ? ',' : '' }}
                    </span>
                @endisset
                @isset($post->author)
                    <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <span class="opacity-75">by</span>
                    <span itemprop="name">
                        {{ $post->author->name ?? $post->author->username }}
                    </span>
                </span>
                @endisset
            </div>
            @if($post->data('description') !== null)
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->data('description') }}</p>
            @endisset
        </div>
    </a>
</article>
