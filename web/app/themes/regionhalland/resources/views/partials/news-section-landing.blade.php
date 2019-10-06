@php($id = uniqid())
@php($newsitems = get_region_halland_page_news_taxonomi_category(1))
@if($newsitems)
<div class="col col-12 md-col-6 lg-col-12">
    <article class="rh-article-group">
        <div class="rh-article-group__header">
            <h2 id="$id" class="rh-article-group__header-title">Nyheter</h2>
        </div>

        <ul aria-labelledby="$id">
        @foreach($newsitems as $item)
        <li class="rh-article-block">
            <div class="rh-article-block__publish-date">
                <span class="rh-article-block__publish-date-icon"></span>
                <p class="rh-article-block__publish-date-info">Publicerad: <time
                    datetime="{{ $item['date'] }}">{{ $item['date'] }}</time></p>
            </div>

            <div>
                <h3 class="rh-article-block__title">
                    <a class="rh-link--navigation rh-article-block__title-link" href="{{ $item['permalink'] }}" title="">{{ $item['title'] }}</a>
                </h3>
                <p class="rh-article-block__description">
                    {{ wp_trim_words(region_halland_remove_shortcode($item['content']), 20, '...') }}
                </p>
            </div>
        </li>
        @endforeach
        </ul>
    </article>

    <div class="rh-article-group__view-more">
        <a class="rh-button rh-button--icon" style="text-decoration: none;" aria-label="Visa alla nyheter" role="button"
            href="{!! env('WP_HOME') !!}/nyheter/">
            Se alla nyheter inom {!! get_the_title() !!}
        </a>
    </div>
</div>
@endif