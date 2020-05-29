<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $page->description ?? '' }}">
    	<title>{{ $page->html_title ?? config('app.name') }}</title>
    	{!! Minify::stylesheet(['../resources/sass/utility.css', '../resources/sass/styles.scss']) !!}
    </head>
    <body class="smooth">
        <input type="checkbox" id="nav-toggle">
        <nav class="nav" aria-label="main navigation" id="nav">
            <div class="max-width">
                <a href="/"><img class="nav-logo" alt="Logo"></a>
                <label class="nav-burger" for="nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
                {!! ($PageController ?? new App\Http\Controllers\PageController)->navigation() !!}
            </div>
        </nav>
        <div class="flex has-footer">
            <section class="content">
                @yield('content')
            </section>
            <footer class="footer">
                <div class="max-width">
                    &copy; {{ date('Y') }} <a href="https://nickdekruijk.nl" target="_blank">Nick de Kruijk</a>
                    <a href="https://github.com/nickdekruijk" target="_blank" class="f-right">Visit me on GitHub</a>
                </div>
            </footer>
        </div>
        {!! Minify::javascript(['../resources/js/scripts.js']) !!}
    </body>
</html>
