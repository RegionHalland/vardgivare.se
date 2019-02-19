<header class="relative pb-4 block mb-8">
	<span class="border-b-2 border-blue-dark text-2xl font-bold text-black pb-2 z-20 relative leading-none">Vad letar du efter?</span>
	<hr class="absolute pin-b pin-l w-full h-0 border-b-2 mb-1 border-blue-light z-10">
</header>
<ul class="flex flex-wrap list-reset items-stretch -mx-4" aria-labelledby="Länklista">
	@php($page_children = get_region_halland_page_children())
	@foreach($page_children as $index => $page)
		<li class="w-full sm:w-6/12 lg:w-6/12 px-4 mb-8">
			<a href="{{ $page->url }}" class="text-blue-dark hover:bg-yellow-light focus:bg-yellow-light inline-block">
				<h2 class="mb-2 text-xl md:text-2xl">{{ $page->post_title }}</h2>
			</a>
			<p class="leading-tight text-lg text-grey-darkest">
				@if(has_excerpt($page->ID)) 
					{{ $page->acf_excerpt }}
				@else
					{{ html_entity_decode(wp_trim_words(region_halland_remove_shortcode($page->post_content), 10, '...'))  }}
				@endif
			</p>
		</li>
	@endforeach
</ul>