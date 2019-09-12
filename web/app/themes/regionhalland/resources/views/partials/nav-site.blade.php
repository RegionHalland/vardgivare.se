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
                        <a class="rh-vg__header-icon-link" onclick="toggleBar();" title="Aktivera webbaserad talsyntes" href="#">
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
                                        style="height:5ex;" aria-label="Sökruta">
                                    <button type="submit" class="rh-button rh-vg__header-search-button"
                                        style="height:5ex; width:8ex;">
                                        Sök
                                    </button>
                                </div>

                            </form>
                        </div>

                        <div class="rh-vg__header-functions__item">
                            <div class="rh-round-button rh-vg__header-round-button rh-vg__header-icon-theme">
                                <span class="icon-menu"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</nav>