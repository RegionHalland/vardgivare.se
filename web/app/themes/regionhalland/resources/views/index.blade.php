@extends('layouts.app')

@section('content')
    <div>
        <nav aria-label="Huvudnavigation" class="container background-dark-blue-frida mx-auto mobile-friendly-padding" style="background-image: url(../include/img/front.jpg); background-size: cover;">
            <ul class="flex flex-wrap p3 background-white" aria-label="Huvudnavigation">
                @include('partials.nav-front')
            </ul>
        </nav>
    </div>
@endsection
