<nav class="rh-header center px3" aria-label="Sidhuvud" style="max-width: 1440px;">
    <a href="/"><img class="" src="/include/img/rh-logo.jpg" alt="Länk till förstasidan"></a>
    {{-- Utilities --}}
    <div class="rh-toplinks">
        <ul class="rh-toplinks-nav" aria-label="Genvägar i sidhuvudet">
            <li>
                <a onclick="toggleBar();" href="#" class="rh-round-button icon-volume-1"></a>
                <a id="bapluslogo" class="rh-toplinks-nav-link logo" title="Aktivera Talande Webb" onclick="toggleBar();" href="#">Talande Webb</a>
            </li>
        </ul>
    </div>

    {{-- Utilities END --}}
    <div class="pl1 rh-header-search-desktop">
        <form name="myForm" method="get" action="{!! env('FINDWISE_SEARCH_URL') !!}">
            <?php 
                $strSearchText = "";
                if(isset($_GET["q"])){
                    $strSearchText = $_GET["q"];
                }
            ?>
            <div class="rh-search-field">
                <input type="text" name="q" class="rh-search-term" placeholder="Skriv din sökning här" value="<?=$strSearchText?>" style="height:5ex;" aria-label="Sökruta">
                <button type="submit" class="rh-search-button" style="height:5ex; width:8ex;">
                    Sök
                </button>
            </div>
        </form>

    </div>

    <div class="rh-header-menu">
        <span id="searchtoggle" class="rh-round-button icon-search"></span>
        {{--<button class="rh-header-button rh-header-button--menu"></button>--}}
    </div>
</nav>