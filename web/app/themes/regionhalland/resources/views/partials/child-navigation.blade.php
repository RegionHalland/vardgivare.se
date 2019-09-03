@php($myFirstLevelPages = get_region_halland_page_children())
<nav aria-label="Undersidor">
    <div class="rh-container--auto clearfix rh-navigation-block-group rh-navigation-block-group__container rh-navigation-block-group__container-px rh-navigation-block-group__container-py">
        <div class="row row-eq-height">

            @foreach($myFirstLevelPages as $page)
            <div class="col col-12 md-col-6 lg-col-4 rh-navigation-block-group__item-container">
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
                            Halland ska hålla i längden. Det betyder att det vi gör i dag ska fungera även för framtida
                            generationer.
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</nav>