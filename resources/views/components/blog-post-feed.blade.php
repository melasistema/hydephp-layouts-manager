@foreach(MarkdownPost::getLatestPosts() as $post)
    @include('hyde-layouts-manager::components.article-excerpt')
@endforeach