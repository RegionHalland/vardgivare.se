@php($myNews = get_region_halland_news_archive_taxonomi_category_items(3))
@foreach($myNews as $news)
    <article class="rh-search-elements">
        <h2 class="h3"><a href="{{ $news->permalink }}" title="" class="rh-search-elements-title" style="color:black">
            {{ $news->post_title }}
        </a></h2>
        <span class="rh-search-elements-inline">Publicerad: <time itemprop="datePublished" datetime="{{ $news->date }}">{{ $news->date }}</time></span>
        <p class="rh-search-elements-description">{{ html_entity_decode(wp_trim_words($news->post_content, 40, '...')) }}</p> 
    </article>
@endforeach
<span><a href="{!! env('WP_HOME') !!}/nyheter/">Visa alla nyheter</a></span>