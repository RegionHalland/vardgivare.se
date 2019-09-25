<form name="myForm" method="get" action="{!! env('FINDWISE_SEARCH_URL') !!}">
    <?php 
            $strSearchText = "";
            if(isset($_GET["q"])){
                $strSearchText = $_GET["q"];
            }
        ?>
    <div class="rh-search-field">
        <input type="text" name="q" class="rh-search-term" placeholder="Skriv din sökning här"
            value="<?=$strSearchText?>" aria-label="Sökruta">
        <button type="submit" class="rh-search-button" aria-label="Sökknapp">Sök</button>
    </div>

</form>