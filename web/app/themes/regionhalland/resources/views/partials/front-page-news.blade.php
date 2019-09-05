@php($myNews = get_region_halland_news_archive_taxonomi_category_items(3))
<article class="rh-vg__home-news">
    <div class="rh-vg__home-news__header">
        <p class="rh-vg__home-news__header-title">Nyheter</p>
    </div>

    @foreach($myNews as $news)
    <div class="rh-vg__home-news__item">
        <div class="rh-vg__home-news__item-publish">
            <span class="rh-vg__home-news__item-publish-icon"></span>
            <p class="rh-vg__home-news__item-publish-info">Publicerad: <time itemprop="datePublished"
                datetime="{{ $news->date }}">{{ $news->date }}</time></p>
        </div>

        <div>
            <p class="rh-vg__home-news__item-title">
                <a class="rh-link--navigation rh-vg__home-news__item-title-link" href="{{ $news->permalink }}" title="">{{ $news->post_title }}</a>
            </p>
            <p class="rh-vg__home-news__item-description">
                {{ html_entity_decode(wp_trim_words($news->post_content, 40, '...')) }}
            </p>
        </div>
    </div>
    @endforeach
</article>

<div class="rh-vg__home-news__view-more">
    <a class="rh-button rh-button--icon" aria-label="Visa alla nyheter" role="button"
        href="{!! env('WP_HOME') !!}/nyheter/">
        Visa alla nyheter
    </a>
</div>