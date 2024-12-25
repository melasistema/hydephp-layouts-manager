<article aria-label="Article" id="{{ $page->identifier }}" itemscope itemtype="https://schema.org/Article"
        @class(['post-article mx-auto', config('markdown.prose_classes', 'prose dark:prose-invert'), 'torchlight-enabled' => Features::hasTorchlight()])>
    <meta itemprop="identifier" content="{{ $page->identifier }}">
    @if($page->getCanonicalUrl() !== null)
        <meta itemprop="url" content="{{ $page->getCanonicalUrl() }}">
    @endif

    <header aria-label="Header section" role="doc-pageheader">
        <h1 itemprop="headline" class="mb-4 mt-8">{{ $page->title }}</h1>
        <div id="byline" aria-label="About the post" role="doc-introduction">
            @includeWhen(isset($page->date), 'hyde-layouts-manager::layouts.melasistema.posts.post.date')
            @includeWhen(isset($page->author), 'hyde-layouts-manager::layouts.melasistema.posts.post.author')
            @includeWhen(isset($page->category), 'hyde-layouts-manager::layouts.melasistema.posts.post.category')
        </div>
    </header>
    @includeWhen(isset($page->image), 'hyde-layouts-manager::layouts.melasistema.posts.post.image')
    <div aria-label="Article body" itemprop="articleBody">
        {!! $content !!}
    </div>
    <span class="sr-only">End of article</span>
</article>