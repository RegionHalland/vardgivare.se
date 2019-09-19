<nav class="rh-vg__header rh-container--auto rh-container-px" aria-label="Sidhuvud">
    <div class="row row-eq-height">

        <div class="col col-12 lg-col-8 rh-vg__header-logo-group--align-bottom">
            <div class="rh-vg__header-logo-group">
                <a href="/">
                    <img style="max-width: 100%;display:block;" class="" src="/include/img/rh-logo.jpg"
                        alt="Länk till förstasidan">
                </a>
                <p class="rh-dp-from-md rh-vg__header-logo-group__name">Vårdgivare Halland</p>
            </div>
        </div>

        <div class="col col-12 lg-col-4">
            <div class="rh-vg__header-functions">
                <div class="col col-6 lg-col-12">
                    <div class="rh-vg__header-functions__item rh-vg__header-functions-talking">
                        <a class="rh-vg__header-icon-link" onclick="toggleBar();" title="Aktivera webbaserad talsyntes"
                            href="#">
                            <div class="rh-round-button rh-vg__header-round-button rh-vg__header-icon-theme">
                                <span class="icon-volume-1"></span>
                            </div>
                        </a>

                        <a id="bapluslogo" class="rh-toplinks-nav-link logo rh-vg__header-functions__item-link"
                            title="Aktivera Talande Webb" onclick="toggleBar();" href="#">Talande webb</a>
                    </div>
                </div>

                <div class="col col-6 lg-col-12">
                    <div class="rh-vg__header-functions-search-and-menu">
                        {{-- Showed only on moblie (medium) and down --}}
                        <div class="rh-vg__header-functions__item mr1">
                            <div class="rh-round-button rh-vg__header-round-button rh-vg__header-icon-theme rh-dp-md">
                                <span class="icon-search"></span>
                            </div>

                        </div>

                        {{-- Showed only on desktop (large) and up --}}
                        <div class="rh-header-search-desktop mr2" style="width:100%;">
                            <form name="myForm" method="get" action="{!! env('FINDWISE_SEARCH_URL') !!}">
                                <?php 
                                    $strSearchText = "";
                                    if(isset($_GET["q"])){
                                        $strSearchText = $_GET["q"];
                                    }
                                ?>
                                <div class="rh-search-field">
                                    <input type="text" name="q" class="rh-search-term"
                                        placeholder="Skriv din sökning här" value="<?=$strSearchText?>"
                                        aria-label="Sökruta">
                                    <button type="submit" class="rh-search-button" style="height:41px">Sök</button>
                                </div>

                            </form>
                        </div>

                        <div class="rh-vg__header-functions__item">
                            <div id="rh-menu-main-button"
                                class="rh-round-button rh-vg__header-round-button rh-vg__header-icon-theme rh-menu__button">
                                <span class="icon-menu"></span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</nav>


<div class="rh-menu__overlay rh-dp--none"></div>
@if(function_exists('get_region_halland_tree_all_levels_vardgivare'))
@php($myTree = get_region_halland_tree_all_levels_vardgivare())
<div id="rh-menu-body" class="rh-menu__body rh-pos--fixed">

    <div class="rh-menu__top-bar">
        <div id="rh-menu-close-button"
            class="rh-round-button rh-vg__header-round-button rh-vg__header-icon-theme rh-menu__button rh-menu__button-close">
            <span id="searchtoggle" class="icon-x"></span>
        </div>
    </div>

    <div class="rh-menu__offset-top"></div>

    {{-- Item - Level 1 - Root --}}
    @foreach ($myTree as $tree1)
    @php ($level1ChildrenCount = count($tree1['children']))
    <div>
        <div class="rh-menu__item  rh-menu__item-level-1 rh-pl-1">
            <a href="{{ $tree1['page_url'] }}" class="rh-link--navigation rh-menu__link-level-1">
                {{ $tree1['post_title'] }}
            </a>

            @if($level1ChildrenCount > 0)
            <div id="{{ $tree1['ID'] }}"
                class="rh-round-button rh-round-button--small rh-menu__item-button rh-menu__item-button-parent">
                <span class="icon-plus"></span>
            </div>
            @endif
        </div>

        {{-- Sub item container - Level 2 --}}
        @if($level1ChildrenCount > 0)
        <div id="sub{{ $tree1['ID'] }}" class="rh-menu__item-sub-container">
            @foreach ($tree1['children'] as $tree2)
            @php ($level2ChildrenCount = count($tree2['children']))
            <div class="rh-menu__item rh-menu__item-sub-item rh-pl-1">
                <a href="{{ $tree2['page_url'] }}" class="rh-link--navigation rh-menu__link">
                    {{ $tree2['post_title'] }}
                </a>

                @if($level2ChildrenCount > 0)
                <div id="{{ $tree2['ID'] }}"
                    class="rh-round-button rh-round-button--small rh-menu__item-button rh-menu__item-button-sub-item--active">
                    <span class="icon-plus"></span>
                </div>
                @endif
            </div>

            {{-- Sub item container - Level 3 --}}
            @if($level2ChildrenCount > 0)
            <div id="sub{{ $tree2['ID'] }}" class="rh-menu__item-sub-container rh-menu__item-sub-container-level-3">
                @foreach ($tree2['children'] as $tree3)
                @php ($level3ChildrenCount = count($tree3['children']))
                <div class="rh-menu__item rh-menu__item-sub-item rh-pl-2">
                    <a href="{{ $tree3['page_url'] }}" class="rh-link--navigation rh-menu__link">
                        {{ $tree3['post_title'] }}
                    </a>

                    @if($level3ChildrenCount > 0)
                    <div id="{{ $tree3['ID'] }}"
                        class="rh-round-button rh-round-button--small rh-menu__item-button rh-menu__item-button-sub-item--active">
                        <span class="icon-plus"></span>
                    </div>
                    @endif
                </div>

                {{-- Sub item container - Level 4 --}}
                @if($level3ChildrenCount > 0)
                <div id="sub{{ $tree3['ID'] }}" class="rh-menu__item-sub-container rh-menu__item-sub-container-level-4">
                    @foreach ($tree3['children'] as $tree4)
                    @php ($level4ChildrenCount = count($tree4['children']))
                    <div class="rh-menu__item rh-menu__item-sub-item rh-pl-3">
                        <a href="{{ $tree4['page_url'] }}" class="rh-link--navigation rh-menu__link">
                            {{ $tree4['post_title'] }}
                        </a>

                        @if($level4ChildrenCount > 0)
                        <div id="{{ $tree4['ID'] }}"
                            class="rh-round-button rh-round-button--small rh-menu__item-button rh-menu__item-button-sub-item--active">
                            <span class="icon-plus"></span>
                        </div>
                        @endif
                    </div>

                    {{-- Sub item container - Level 5 --}}
                    @if($level4ChildrenCount > 0)
                    <div id="sub{{ $tree4['ID'] }}"
                        class="rh-menu__item-sub-container rh-menu__item-sub-container-level-5">
                        @foreach ($tree4['children'] as $tree5)
                        @php ($level5ChildrenCount = count($tree5['children']))
                        <div class="rh-menu__item rh-menu__item-sub-item rh-pl-4">
                            <a href="{{ $tree5['page_url'] }}" class="rh-link--navigation rh-menu__link">
                                {{ $tree5['post_title'] }}
                            </a>

                            @if($level5ChildrenCount > 0)
                            <div id="{{ $tree5['ID'] }}"
                                class="rh-round-button rh-round-button--small rh-menu__item-button rh-menu__item-button-sub-item--active">
                                <span class="icon-plus"></span>
                            </div>
                            @endif
                        </div>

                        {{-- Sub item container - Level 6 --}}
                        @if($level5ChildrenCount > 0)
                        <div id="sub{{ $tree5['ID'] }}"
                            class="rh-menu__item-sub-container rh-menu__item-sub-container-level-5">
                            @foreach ($tree5['children'] as $tree6)
                            @php ($level6ChildrenCount = count($tree6['children']))
                            <div class="rh-menu__item rh-menu__item-sub-item rh-pl-5">
                                <a href="{{ $tree6['page_url'] }}" class="rh-link--navigation rh-menu__link">
                                    {{ $tree6['post_title'] }}
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @endif {{-- End fo level 6 --}}
                        @endforeach
                    </div>
                    @endif {{-- End fo level 5 --}}
                    @endforeach
                </div>
                @endif {{-- End fo level 4 --}}
                @endforeach
            </div>
            @endif {{-- End of level 3 --}}
            @endforeach
        </div>
        @endif {{-- End of level 2 --}}
    </div>
    @endforeach

    <div class="rh-menu__offset-bottom"></div>
</div>
@endif