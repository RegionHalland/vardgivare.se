<!doctype html>

<html data-server="{!! env('SITE_SERVER') !!}" data-version="1.5.1" style="height: 101%;" @php(language_attributes())>
@include('partials.head')

<body style="height: 101%" @php(body_class())>
    <header>
        @include('partials.jump-to-content')
        @include('partials.site-message')
        @include('partials.cookie-notice')
        @include('partials.header')
    </header>

    <main id="main">
        @yield('content')
    </main>

    <footer>
        @include('partials.footer')
    </footer>
    @include('partials.arrow-up')

</body>

</html>