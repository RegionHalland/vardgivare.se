<header aria-label="sidhuvud">
    <nav aria-label="toppmeny" class="container mx-auto pb1 pt0 pr5 small bredcrumbs z4" style="text-align: right; background-color: #F3F3F3; position: relative;">
        <ul aria-label="Toppmenylänkar">
            <li class="pl4" style="display:inline">
                <svg  class="icon icon--sm mr1" viewBox="0 0 8 8">
                    {!! get_region_halland_icon('headphone') !!}
                </svg>
                <a id="bapluslogo" class="logo" title="Aktivera Talande Webb" onclick="toggleBar();" href="#" style="vertical-align: middle; color: black;">Aktivera Talande Webb</a>
            </li>
            <li class="pl4" style="display:inline">
                <svg  class="icon icon--sm mr1" viewBox="0 0 8 8">
                    {!! get_region_halland_icon('monitor') !!}
                </svg>
                <a href="https://etjanster.regionhalland.se" style="vertical-align: middle; color: black;">E-tjänster</a>
            </li>
        </ul>
    </nav>
  
    <nav class="py2 container z4" style="background-color: white; position: relative;">      
        <div class="clearfix">
            <div class="col col-4 pl4">
                <button class="burger-menu__button">
                    <svg class="burger-menu__burger-icon icon-badge-nav icon-badge-nav--md" viewBox="0 0 16 16">
                        {!! get_region_halland_icon('menu') !!}
                    </svg>
                    <svg class="burger-menu__close-icon icon-badge-nav icon-badge-nav--md" style="display: none;" viewBox="0 0 8 8">
                        {!! get_region_halland_icon('x') !!}
                    </svg>
                    <span class="hidden-inline-sm">
                        Meny
                    </span>
                </button>
            </div>
            <div class="col col-6">
                <span>
                    <a href="{!! env('WP_HOME') !!}" class="rh-site-nav__logo" aria-label="Till startsidan">
                        <img src="{!! env('WP_HOME') !!}/include/img/navigation_logo.svg" alt="">
                    </a>
                </span>
                <span class="ml1 pl1" style="border-left: 1px solid grey">
                www.regionhalland.se
                </span>
            </div>
        </div>
        <div class="burger-dropdown__container z4 mt2 text-white background-burger-dark-blue" style="display: none;">
            <ul class="pb6 pt3">
                @if(function_exists('get_region_halland_tree_first_level'))
                    @php($myNavs = get_region_halland_tree_first_level())    
                    @if(isset($myNavs))
                        @foreach ($myNavs as $myNav)
                            <li class="pl4 py2 pr5">
                                <a href="{{ get_page_link($myNav->ID) }}"  class="h3 burger-dropdown__list-item-link">{{ $myNav->post_title }}</a>
                            </li>
                        @endforeach
                    @endif
                @endif
            </ul>
        </div>
    </nav>
</header>