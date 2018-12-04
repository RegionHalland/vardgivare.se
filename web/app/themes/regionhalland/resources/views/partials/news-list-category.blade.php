@if(isset($news) && !empty($news))
	@foreach ($news as $myNews)
		<article class="py-4">
			<a href="{{ $myNews->url }}" title="" class="text-blue-dark hover:bg-yellow-light focus:bg-yellow-light mb-2 inline-block">
				<h2 class="text-xl sm:text-2xl leading-tight">{{ $myNews->post_title }}</h2>
			</a>
			<span class="text-base block text-grey-darkest mb-4">Publicerad: <time itemprop="datePublished" datetime="{{ get_the_date('Y-m-d', $myNews->post_date) }}">{{ get_the_date('Y-m-d', $myNews->post_date) }}</time></span>
			<p class="text-lg text-grey-darkest leading-tight mb-4">{!! html_entity_decode(wp_trim_words($myNews->post_content, 70, '...')) !!}</p>
			@if(get_the_terms($myNews->ID, 'category'))
				@foreach(get_the_terms($myNews->ID, 'category') as $key => $term)
					<a href="{{ get_post_type_archive_link(get_post_type()) }}?{{'filter[category]=' .  $term->slug }}" class="px-2 mr-2 mb-2 py-1 text-sm no-underline hover:underline focus:underline text-black bg-blue-light rounded-full inline-block">{{ $term->name }}</a>
				@endforeach
			@endif
		</article>
	@endforeach
	@if(isset($news_category->name))
		<a href="{{ get_post_type_archive_link(get_post_type()) }}?{{'filter[category]=' .  $news_category->slug }}" class="inline-flex no-underline text-white bg-blue-dark px-6 mt-4 items-center justify-between py-4 text-lg rounded">
		{{ get_post_type_object(get_post_type())->labels->view_items }} 
		{{ $news_category ? 'inom ' . strtolower($news_category->name) : '' }}
		<svg class="h-4 w-4"><use xlink:href="#chevron-right" /></svg></a>
	@else
		<a href="{{ get_post_type_archive_link(get_post_type()) }}" class="inline-flex no-underline text-white bg-blue-dark px-6 mt-4 items-center justify-between py-4 text-lg rounded">{{ get_post_type_object(get_post_type())->labels->view_items }}<svg class="h-4 w-4"><use xlink:href="#chevron-right" /></svg></a>
	@endif
@endif