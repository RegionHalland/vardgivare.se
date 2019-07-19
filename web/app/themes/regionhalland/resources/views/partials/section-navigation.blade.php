<nav aria-label="Undersidor">
    <ul class="clearfix pt3 mb4" aria-label="Undersidor" style="background-color: white; border-radius: 0.4ex;box-shadow: 1px 2px 6px grey;">
        @php($page_children = get_region_halland_page_children())
        @foreach($page_children as $index => $page)
            <li class="rh-navigation-card col col-12 sm-col-6 md-col-4 lg-col-4 px3" style="position:relative">
                <div class="rh-navigation-card-title">
                    <span class="rh-navigation-card-title-icon" style="height: 10em; width: 10em;"></span>
                    <strong><a href="{{ $page->url }}" class="h3" style="text-decoration: none; color: black; line-height: 1.4;">
                        {{ $page->post_title }}
                    </a></strong>
                </div>
            </li>
        @endforeach
    </ul>
</nav>