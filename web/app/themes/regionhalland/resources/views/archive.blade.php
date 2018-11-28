@extends('layouts.app')

@section('content')

<main class="bg-white pt-12 pb-8" id="main">
	<div class="container mx-auto px-4">
		<div class="w-full mx-auto">
			<div class="flex flex-wrap -mx-4">
				<div class="w-full md:w-8/12 px-4">
					<header class="relative pb-4 block">
						<h1 class="inline-block border-b-2 border-blue-dark text-2xl font-bold text-black pb-2 z-20 relative leading-none">{{ get_the_archive_title() }}</h1>
						<hr class="absolute pin-b pin-l w-full h-0 border-b-2 mb-4 border-blue-light z-10">
					</header>
					
					@if(function_exists('get_region_halland_vg_archive'))
					@php($archive_posts = get_region_halland_vg_archive())	
						@while($archive_posts->have_posts()) @php($archive_posts->the_post())
							@include('partials.news-list-item')
						@endwhile
					@endif
				</div>
				<div class="w-full md:w-4/12 px-4 mt-12 md:mt-0">
					<header class="relative pb-4 block mb-8">
						<span class="border-b-2 border-blue-dark text-2xl font-bold text-black pb-2 z-20 relative leading-none">Filtrera på område</span>
						<hr class="absolute pin-b pin-l w-full h-0 border-b-2 mb-1 border-blue-light z-10">
					</header>
					<ul class="list-reset">
						@if(function_exists('get_region_halland_vg_category'))
						@php($categories = get_region_halland_vg_category())
							@foreach($categories as $key => $value)
								<li><a href="{{ get_post_type_archive_link(get_post_type()) }}?{{'filter[category]=' .  $value->slug }}" class="px-2 mb-2 py-1 text-sm no-underline hover:underline focus:underline text-black bg-grey-lightest rounded-full inline-block">{{ $value->name }}</a></li>
							@endforeach
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection