{{--
	Template Name: Section Overview
--}}

@extends('layouts.app')

@section('content')

    <div class="rh-container--auto rh-container-px">
        <h1>{!! get_the_title() !!}</h1>
    </div>
	
	@while(have_posts()) @php(the_post())
		<div>
			@php(the_content())
		</div>
	@endwhile

    @include('partials.child-navigation')

@endsection