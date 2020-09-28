@extends('main')

@section('content')
    <article class="article max-width">
        <h1 class="title">{{ $page->head }}</h1>
        <div class="body">
            {!! $page->body !!}
        </div>
    </article>
@endsection
