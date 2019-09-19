{{--
	Template Name: Section Overview
--}}

@extends('layouts.app')

@section('content')
    {{-- Parent Page --}}
    <div class="mt2 rh-container--auto rh-container-px">
        @include('partials.parent-page')
    </div>

    <div class="mt1 rh-container--auto rh-container-px">
        <h1>{!! get_the_title() !!}</h1>
    </div>
	
	@while(have_posts()) @php(the_post())
		<div>
			@php(the_content())
		</div>
	@endwhile

    {{-- Child Navigation --}}
    @include('partials.child-navigation')
    
    <div class="pb3">&nbsp;</div>
@endsection