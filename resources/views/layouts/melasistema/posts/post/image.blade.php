@php
    /** @var \Hyde\Pages\MarkdownPost $page  */
    /** @var \Hyde\Framework\Features\Blogging\Models\FeaturedImage $image  */
    $image = $post->image ?? $page->image;
    $baseWidth = 'w-full'; // Default width
    $desktopWidth = isset($post->image) ? 'md:w-96' : ''; // Apply md:w-96 conditionally
@endphp
<figure class="{{ $baseWidth }} {{ $desktopWidth }}" aria-label="Cover image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="doc-cover">
    <img src="{{ $image->getSource() }}" alt="{{ $image->getAltText() ?? '' }}" title="{{ $image->getTitleText() ?? '' }}" itemprop="image" class="mb-0 object-cover w-full rounded-t-lg md:h-auto md:rounded-none md:rounded-s-lg">
    <figcaption aria-label="Image caption" itemprop="caption">
        @if($image->hasAuthorName())
            <span>Image by</span>
            <span itemprop="creator" itemscope="" itemtype="https://schema.org/Person">
                @if($image->hasAuthorUrl())
                    <a href="{{ $image->getAuthorUrl() }}" rel="author noopener nofollow" itemprop="url">
                        <span itemprop="name">{{ $image->getAuthorName() }}</span>.
                    </a>
                @else
                    <span itemprop="name">{{ $image->getAuthorName() }}</span>.
                @endif
            </span>
        @endif

        @if($image->hasCopyrightText())
            <span itemprop="copyrightNotice">{{ $image->getCopyrightText() }}</span>.
        @endif

        @if($image->hasLicenseName())
            <span>License</span>
            @if($image->hasLicenseUrl())
                <a href="{{ $image->getLicenseUrl() }}" rel="license nofollow noopener" itemprop="license">{{ $image->getLicenseName() }}</a>.
            @else
                <span itemprop="license">{{ $image->getLicenseName() }}</span>.
            @endif
        @endif
    </figcaption>

    @foreach ($image->getMetadataArray() as $name => $value)
        <meta itemprop="{{ $name }}" content="{{ $value }}">
    @endforeach
</figure>