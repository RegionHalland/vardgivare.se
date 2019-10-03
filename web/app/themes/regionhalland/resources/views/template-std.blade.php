{{--
	Template Name: Styrda dokument
--}}

@extends('layouts.app')

@section('content')
    
    <?php

        $pageNo = 1;
        if(isset($_GET["std_show"])){
            $pageNo = $_GET["std_show"];
        }

        $stdType = "";
        $stdName = "Alla";
        if(isset($_GET["stdtype"])){
            $stdType = $_GET["stdtype"];
            switch ($stdType) {
                 case '5B1A4777-D19F-4F91-A020-C43668B3D63F':
                     $stdName = "Vårdriktlinjer";
                     break;
                 case '3ecd4889-b546-4b08-8daf-345ed6a301ab':
                     $stdName = "Rutin";
                     break;
                 case 'F938415A-BE98-4925-A94E-4244C9668E60':
                     $stdName = "Patientinformation";
                     break;
                 case 'BFFDD78A-4A43-43F6-BEBC-861377F1DCA0':
                     $stdName = "Blankett";
                     break;
                 case '06CC56CF-C0B9-4A68-8FCC-0EB9BC3A2C8E':
                     $stdName = "Manualer";
                     break;
                 default:
                     $stdName = "Alla";
             } 
        }        

    ?>
    
    <main class="bg-white pt-16 pb-8" id="main">
        
        <div class="mt2 rh-container--auto rh-container-px rh-vg__styrda-dokument-container">
            
                <h1 class="mb-4 pb2">{!! get_the_title() !!} - sida {{ $pageNo }} ({{ $stdName }})</h1>
                
                <form name="myForm" method="get" action="./">
                    <?php
                    $strSearchText = "";
                    if(isset($_GET["search"])){
                        $strSearchText = $_GET["search"];
                    }
                    ?>
                    <div class="rh-search-field">
                        <input type="text" name="search" class="rh-search-term rh-search-term-larger" placeholder="Skriv din sökning här" value="<?=$strSearchText?>" aria-label="Sökruta">
                        <button type="submit" class="rh-search-button rh-search-button-larger" style="height:61px">
                            Sök
                        </button>
                    </div>
                </form>

            <div id="std-results">
            
                @while(have_posts()) @php(the_post())
                <div>
                    @php(the_content())
                </div>
                @endwhile

            </div>
            
            {{-- <div id="std-results">
                @include('partials.styrda')
            </div> --}}

        </div>

    </main>

@endsection