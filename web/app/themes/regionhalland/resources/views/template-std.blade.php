{{--
	Template Name: Styrda dokument
--}}

@extends('layouts.app')

@section('content')

<main class="bg-white pt-16 pb-8" id="main">
	<div class="container mx-auto px-4">
		<div class="w-full mx-auto">
			<h1 class="mb-4">{!! get_the_title() !!}</h1>
			@while(have_posts()) @php(the_post())
				<div class="text-lg leading-tight md:text-xl mb-12 text-grey-darkest lg:w-12/12">
					@php(the_content())
				</div>
			@endwhile
			@if (is_active_sidebar('sidebar-article-bottom'))
				@include('partials.sidebar-article-bottom')
			@endif
		</div>
	</div>
</main>

@endsection