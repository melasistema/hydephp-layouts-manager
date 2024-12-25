{{-- The Post Page Layout --}}
@extends('hyde-layouts-manager::layouts.melasistema.app')
@section('content')

    <main id="content" class="mx-auto max-w-7xl py-16 px-8">
        @include('hyde-layouts-manager::components.post.article')
    </main>

@endsection