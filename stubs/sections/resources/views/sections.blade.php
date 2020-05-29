@extends('main')

@section('content')
    @foreach($PageController->getTree($page->id) as $section)
        @include($section->view ?? 'sections.default')
    @endforeach
@endsection
