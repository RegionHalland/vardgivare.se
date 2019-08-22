{{--
	Template Name: Section Overview
--}}

@extends('layouts.app')

@section('content')

	<h1>{!! get_the_title() !!}</h1>
	
	@while(have_posts()) @php(the_post())
		<div>
			@php(the_content())
		</div>
	@endwhile

    @include('partials.child-navigation')

@endsection