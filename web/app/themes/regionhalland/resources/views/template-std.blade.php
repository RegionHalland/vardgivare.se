{{--
	Template Name: Styrda dokument
--}}

@extends('layouts.app')

@section('content')

<main class="bg-white pt-16 pb-8" id="main">
    <div class="mt2 rh-container--auto rh-container-px rh-vg__styrda-dokument-container">
        <div id="std-results">
            <h1 class="mb-4">{!! get_the_title() !!}</h1>
            @while(have_posts()) @php(the_post())
            <div>
                @php(the_content())
            </div>
            @endwhile
        </div>
        {{-- <div id="std-results">
            @include('partials.styrda')
        </div> --}}

    </div>
</main>

@endsection