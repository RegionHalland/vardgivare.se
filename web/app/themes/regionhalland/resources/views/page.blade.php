@extends('layouts.app')

@section('content')

{{-- Container --}}
<div class="clearfix rh-container--auto rh-container-px pt3 pb3">
    <div class="row">
        {{-- Sidebar --}}
        <nav title="Undersidor" class="col col-12 sm-col-12 md-col-12 lg-col-3 rh-vg__page-left-container-px">
            @include('partials.nav-sidebar')
        </nav>

        {{-- Main Content --}}
		<div class="col col-12 sm-col-12 md-col-12 lg-col-6 pt3 rh-vg__page-between-container-px">
            @while(have_posts()) @php(the_post())
                
                {{-- Title --}}
                <h1>{{ the_title() }}</h1>
                
                {{-- Content --}}
                @include('partials.article')

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
        </div>

        <nav title="Hitta på sidan" class="col col-12 sm-col-12 md-col-12 lg-col-3 pt3 rh-vg__page-right-container-px">
            @include('partials.content-nav')
        </nav>
    </div>
</div>
{{-- Container END --}}
@endsection