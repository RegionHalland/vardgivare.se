@php($id = uniqid())

@php($myNews = get_region_halland_news_archive_taxonomi_category_items(3))
<div class="mt3 rh-dp-from-lg"></div>
<article class="rh-article-group">
    <div class="rh-article-group__header">
        <h2 id="$id" class="rh-article-group__header-title">Nyheter</h2>
    </div>

    <ul aria-labelledby="$id">
    @foreach($myNews as $news)
    <li class="rh-article-block">
        <div class="rh-article-block__publish-date">
            <span class="icon-clock rh-article-block__publish-date-icon"></span>
            <p class="rh-article-block__publish-date-info">Publicerad: <time
                datetime="{{ $news->date }}">{{ $news->date }}</time></p>
        </div>

        <div>
            <h3 class="rh-article-block__title">
                <a class="rh-link--navigation rh-article-block__title-link" href="{{ $news->url }}" title="">{{ $news->post_title }}</a>
            </h3>
            <p class="rh-article-block__description">
                {{ html_entity_decode(wp_trim_words($news->post_content, 20, '...')) }}
            </p>
        </div>
    </li>
    @endforeach
    </ul>
</article>

<div class="rh-article-group__view-more">
    <a class="rh-button rh-button--icon" style="text-decoration: none;" aria-label="Visa alla nyheter" role="button"
        href="{!! env('WP_HOME') !!}/nyheter/">
        Visa alla nyheter
    </a>
</div>