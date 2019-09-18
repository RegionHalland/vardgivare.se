{{--
	Template Name: Section Overview
--}}

@extends('layouts.app')

@section('content')

    <div class="rh-container--auto rh-container-px pt3">
        <h1>{!! get_the_title() !!}</h1>
    </div>
	
	@while(have_posts()) @php(the_post())
		<div>
			@php(the_content())
		</div>
	@endwhile

    <div class="pb2">&nbsp;</div>
    
    {{-- Parent Page --}}
    <div class="rh-container--auto rh-container-px">
        @include('partials.parent-page')
    </div>
    
    {{-- Child Navigation --}}
    @include('partials.child-navigation')
        
    <div class="pb3">&nbsp;</div>

@endsection