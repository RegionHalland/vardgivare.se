@php($myFirstLevelPages = get_region_halland_page_children())
<nav aria-label="Undersidor">
    <div class="clearfix rh-container--auto rh-navigation-block-group__container-p">
        <div class="row row-eq-height">
            @foreach($myFirstLevelPages as $page)
            <div class="col col-12 md-col-6 xl-col-4 rh-navigation-block-group__item-container">
                <div class="rh-navigation-block">
                    <div class="rh-navigation-block__header">
                        <div class="rh-round-button rh-navigation-block__header-round-button">
                            <span class="rh-navigation-block__header-round-button-icon"></span>
                        </div>
                        <div class="rh-navigation-block__header-title">
                            <a href="{{ $page->url }}"
                                class="rh-link--navigation rh-navigation-block__header-title-link">
                                {{ $page->post_title }}
                            </a>
                        </div>
                    </div>
                    <div class="rh-navigation-block__description hidden-sm">
                        <p class="rh-navigation-block__description-text">
                            {{ get_region_halland_acf_page_navigation_text($page->ID) }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</nav>