@foreach(MarkdownPost::getLatestPosts() as $post)
    @include('hyde-layouts-manager::layouts.melasistema.posts.article-excerpt')
@endforeach