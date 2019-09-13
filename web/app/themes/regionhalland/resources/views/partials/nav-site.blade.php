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
                                <span id="searchtoggle" class="icon-volume-1"></span>
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
                                <span id="searchtoggle" class="icon-search"></span>
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
                                        style="height:5ex;" aria-label="Sökruta">
                                    <button type="submit" class="rh-button rh-vg__header-search-button"
                                        style="height:5ex; width:8ex;">
                                        Sök
                                    </button>
                                </div>

                            </form>
                        </div>

                        <div class="rh-vg__header-functions__item">
                            <div id="rh-menu-main-button"
                                class="rh-round-button rh-vg__header-round-button rh-vg__header-icon-theme rh-menu__button">
                                <span id="searchtoggle" class="icon-menu"></span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</nav>


<div class="rh-menu__overlay rh-dp--none"></div>
<div id="rh-menu-body" class="rh-menu__body">

    <div class="rh-menu__top-bar">
        <div id="rh-menu-close-button"
            class="rh-round-button rh-vg__header-round-button rh-vg__header-icon-theme rh-menu__button rh-menu__button--close">
            <span id="searchtoggle" class="icon-x"></span>
        </div>
    </div>


    {{-- Item - Level 1 - Root --}}
    <div>
        <div class="rh-menu__item rh-menu__item-level-1 rh-pl-1">
            <a href="#" class="rh-link--navigation rh-menu__link-level-1">
                Behandlingsstöd
            </a>

            <div id="1" class="rh-round-button rh-round-button--small rh-menu__item-button">
                <span class="icon-minus"></span>
            </div>
        </div>


        {{-- Sub item container - Level 2 --}}
        <div id="sub1" class="rh-menu__item-sub-container">
            <div class="rh-menu__item rh-menu__item-sub-item rh-pl-1">
                <a href="#" class="rh-link--navigation rh-menu__link">
                    Diagnos- och åtgärdskodning primärvård
                </a>
            </div>

            <div class="rh-menu__item rh-menu__item-sub-item rh-pl-1">
                <a href="#" class="rh-link--navigation rh-menu__link">
                    Smittskydd
                </a>

                <div id="12"
                    class="rh-round-button rh-round-button--small rh-menu__item-button rh-menu__item-button-sub-item">
                    <span class="icon-plus"></span>
                </div>
            </div>

            <div class="rh-menu__item rh-menu__item-sub-item rh-pl-1">
                <a href="#" class="rh-link--navigation rh-menu__link rh-menu__link--active">
                    Läkemedel
                </a>

                <div id="13"
                    class="rh-round-button rh-round-button--small rh-menu__item-button rh-menu__item-button-sub-item--active">
                    <span class="icon-minus"></span>
                </div>
            </div>

            {{-- Level 3 --}}
            <div id="sub13" class="rh-menu__item-sub-container rh-menu__item-sub-container-level-3">
                <div class="rh-menu__item rh-menu__item-sub-item rh-pl-2">
                    <a href="#" class="rh-link--navigation rh-menu__link">
                        Beställa läkemedel
                    </a>

                    <div id="131"
                        class="rh-round-button rh-round-button--small rh-menu__item-button rh-menu__item-button-sub-item">
                        <span class="icon-plus"></span>
                    </div>
                </div>

                <div class="rh-menu__item rh-menu__item-sub-item rh-pl-2">
                    <a href="#" class="rh-link--navigation rh-menu__link rh-menu__link--active">
                        Läkemedelsgenomgångar
                    </a>

                    <div id="132"
                        class="rh-round-button rh-round-button--small rh-menu__item-button rh-menu__item-button-sub-item--active">
                        <span class="icon-minus"></span>
                    </div>
                </div>

                {{-- Level 4 --}}
                <div id="sub132" class="rh-menu__item-sub-container rh-menu__item-sub-container-level-4">
                    <div class="rh-menu__item rh-menu__item-sub-item rh-pl-3">
                        <a href="#" class="rh-link--navigation rh-menu__link">
                            Äldre och läkemedel
                        </a>
                    </div>

                    <div class="rh-menu__item rh-menu__item-sub-item rh-pl-3">
                        <a href="#" class="rh-link--navigation rh-menu__link rh-menu__link--active">
                            Verktyg vid läkemedelsgenomgångar
                        </a>

                        <div id="1322"
                            class="rh-round-button rh-round-button--small rh-menu__item-button rh-menu__item-button-sub-item--active">
                            <span class="icon-minus"></span>
                        </div>
                    </div>

                    {{-- Level 5 --}}
                    <div id="sub1322" class="rh-menu__item-sub-container rh-menu__item-sub-container-level-5">
                        <div class="rh-menu__item rh-menu__item-sub-item rh-pl-4">
                            <a href="#" class="rh-link--navigation rh-menu__link">
                                Arbetsgång vid läkemedelsgenomgång
                            </a>
                        </div>
                        <div class="rh-menu__item rh-menu__item-sub-item rh-pl-4">
                            <a href="#" class="rh-link--navigation rh-menu__link">
                                Checklista vid läkemedelsgenomgång
                            </a>
                        </div>
                    </div>

                    <div class="rh-menu__item rh-menu__item-sub-item rh-pl-3">
                        <a href="#" class="rh-link--navigation rh-menu__link rh-menu__link">
                            Patientkost
                        </a>
                    </div>

                    <div class="rh-menu__item rh-menu__item-sub-item rh-pl-3">
                        <a href="#" class="rh-link--navigation rh-menu__link rh-menu__link--active">
                            Patientinformation
                        </a>

                        <div id="1323"
                            class="rh-round-button rh-round-button--small rh-menu__item-button rh-menu__item-button-sub-item">
                            <span class="icon-plus"></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Item - Level 1 - Root --}}
    <div>
        <div class="rh-menu__item  rh-menu__item-level-1 rh-pl-1">
            <a href="#" class="rh-link--navigation rh-menu__link-level-1">
                Kompetens och utveckling
            </a>

            <div id="2" class="rh-round-button rh-round-button--small rh-menu__item-button">
                <span class="icon-plus"></span>
            </div>
        </div>
    </div>

    {{-- Item - Level 1 - Root --}}
    <div>
        <div class="rh-menu__item  rh-menu__item-level-1 rh-pl-1">
            <a href="#" class="rh-link--navigation rh-menu__link-level-1">
                Medicinska områden
            </a>

            <div id="2" class="rh-round-button rh-round-button--small rh-menu__item-button">
                <span class="icon-plus"></span>
            </div>
        </div>
    </div>
</div>