<!doctype html>

<html data-server="{!! env('SITE_SERVER') !!}" data-version="1.5.1" style="height: 101%;" @php(language_attributes())>

@include('partials.head')

<body style="height: 101%" @php(body_class())>

@include('partials.site-message')
@include('partials.jump-to-content')
@include('partials.cookie-notice')

<nav class="rh-header center px3" aria-label="Sidhuvud" style="max-width: 1440px;">
    <a href="https://vardgivare.regionhalland.se"><img class="" src="/include/img/rh-logo.jpg" alt="Länk till förstasidan"></a>
    {{-- Utilities --}}
    <div class="rh-toplinks">
        <ul class="rh-toplinks-nav" aria-label="Genvägar i sidhuvudet">
            <li class="rh-toplinks-nav-item">
                <i class="feather icon-volume-1 rh-toplinks-nav-link-icon"></i>
                <a id="bapluslogo" class="rh-toplinks-nav-link logo" title="Aktivera Talande Webb" onclick="toggleBar();" href="#">Talande Webb</a>
            </li>
        </ul>
    </div>

    {{-- Utilities END --}}
</nav>

@yield('content')

@include('partials.footer')

</body>

</html>