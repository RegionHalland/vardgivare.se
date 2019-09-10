@extends('layouts.app')

@section('content')

{{-- Container --}}
<div class="clearfix rh-container--auto rh-container-px pt3 pb3">
    <div class="row">
        {{-- Sidebar --}}
        <aside class="col col-12 sm-col-12 md-col-12 lg-col-3 rh-vg__page-left-container-px">
            @include('partials.nav-sidebar')
        </aside>

        {{-- Main Content --}}
		<main id="main" class="col col-12 sm-col-12 md-col-12 lg-col-6 pt3 rh-vg__page-between-container-px">
            @while(have_posts()) @php(the_post())
                
                {{-- Title --}}
                <h1>{{ the_title() }}</h1>
                
                {{-- Content --}}
                @if(function_exists('get_region_halland_prepare_the_content'))
                    @php(get_region_halland_prepare_the_content())
                @endif
                <article class="rh-article">
                    {!! the_content() !!}
                </article>

                {{-- Links lists --}}
                @include('partials.link-lists')

                {{-- RSS Repeater list --}}
                @include('partials.rss-repeater-lists')

                {{-- Author --}}
                <div class="pt4">
                    @include('partials.author-info')
                </div>
                
                {{-- Feedback --}}
                @include('partials.feedback')

            @endwhile
        </main>

        <aside class="col col-12 sm-col-12 md-col-12 lg-col-3 pt3 rh-vg__page-right-container-px">
            @include('partials.content-nav')
        </aside>
    </div>
</div>
{{-- Container END --}}
@endsection