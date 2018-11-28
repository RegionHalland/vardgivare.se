<article class="py-4">
	<a href="{{ the_permalink() }}" title="" class="text-blue-dark hover:bg-yellow-light focus:bg-yellow-light mb-2 inline-block">
		<h2 class="text-xl sm:text-2xl leading-tight">{{ get_the_title() }}</h2>
	</a>
	<span class="text-base block text-grey-darkest mb-4">Publicerad: <time itemprop="datePublished" datetime="{{ get_the_date('Y-m-d', get_the_id()) }}">{{ get_the_date('Y-m-d', get_the_id()) }}</time></span>
	<p class="text-lg text-grey-darkest leading-tight mb-4">{!! get_the_excerpt() !!}</p>
	@if(get_the_terms(get_the_id(), 'category'))
		@foreach(get_the_terms(get_the_id(), 'category') as $key => $term)
			<a href="{{ get_post_type_archive_link(get_post_type()) }}?{{'filter[category]=' .  $term->slug }}" class="px-2 mr-2 mb-2 py-1 text-sm no-underline hover:underline focus:underline text-black bg-blue-light rounded-full inline-block">{{ $term->name }}</a>
		@endforeach
	@endif
</article>