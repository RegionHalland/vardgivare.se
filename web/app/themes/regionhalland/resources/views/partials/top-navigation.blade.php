@php($myFirstLevelPages = get_region_halland_tree_first_level())
<nav aria-label="Undersidor" style="background-color: #F4F4F4;">
    <ul class="flex flex-wrap px3 pt3 center" aria-label="Undersidor" style="max-width: 1440px;">
        @foreach($myFirstLevelPages as $page)
            <li class="rh-navigation-card left-align col-12 sm-col-6 md-col-4 lg-col-3 pr2" style="position:relative">
                <div class="rh-navigation-card-title">
                    <span class="rh-navigation-card-title-icon"></span>
                    <strong><a href="{{ $page->url }}" class="h3" style="color:black; text-decoration: none;">
                        {{ $page->post_title }}
                    </a></strong>
                </div>
            </li>
        @endforeach
    </ul>
</nav>