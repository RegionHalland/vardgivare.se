@php($id = uniqid())
@php($newsitems = get_region_halland_page_news_taxonomi_category(1))
@if($newsitems)
<div class="col col-12 md-col-6 lg-col-12">
    <article class="rh-news-block">
        <div class="rh-news-block__header">
            <h2 id="$id" class="rh-news-block__header-title">Nyheter</h2>
        </div>

        <ul aria-labelledby="$id">
        @foreach($newsitems as $item)
        <li class="rh-news-block__item">
            <div class="rh-news-block__item-publish">
                <span class="rh-news-block__item-publish-icon"></span>
                <p class="rh-news-block__item-publish-info">Publicerad: <time
                    datetime="{{ $item['date'] }}">{{ $item['date'] }}</time></p>
            </div>

            <div>
                <h3 class="rh-news-block__item-title">
                    <a class="rh-link--navigation rh-news-block__item-title-link" href="{{ $item['permalink'] }}" title="">{{ $item['title'] }}</a>
                </h3>
                <p class="rh-news-block__item-description">
                    {{ wp_trim_words(region_halland_remove_shortcode($item['content']), 20, '...') }}
                </p>
            </div>
        </li>
        @endforeach
        </ul>
    </article>

    <div class="rh-news-block__view-more">
        <a class="rh-button rh-button--icon" style="text-decoration: none;" aria-label="Visa alla nyheter" role="button"
            href="{!! env('WP_HOME') !!}/nyheter/">
            Se alla nyheter inom {!! get_the_title() !!}
        </a>
    </div>
</div>
@endif