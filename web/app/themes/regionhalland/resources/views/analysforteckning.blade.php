{{--
	Template Name: Analysförteckning
--}}

@extends('layouts.analys')

@section('content')

{{-- Container --}}
    
    <?php

        session_start();
        
        $_SESSION["type"] = "0";

        $type = 0;
        $aid = 0;
        $sid = 0;
        $lid = "";
        $all = 0;
        $q = "";
        
        if(isset($_GET["aid"])){
            $aid = $_GET["aid"];
            $_SESSION["type"] = "1";
            $type = 1;
        }
        if(isset($_GET["sid"])){
            $sid = $_GET["sid"];
            $type = 2;
            $_SESSION["sid"] = $sid;
            $_SESSION["type"] = "2";
        }
        if(isset($_GET["lid"])){
            $lid = $_GET["lid"];
            $type = 3;
            $_SESSION["lid"] = $lid;
            $_SESSION["type"] = "3";
        }
        if(isset($_GET["all"])){
            $type = 4;
            $_SESSION["type"] = "4";
        }
        if(isset($_GET["q"])){
            $type = 5;
            $_SESSION["q"] = $q;
            $_SESSION["type"] = "5";
        }
    ?>

    @php($myData = get_region_halland_api_analysforteckning_data($type, $aid, $sid, $lid))
    
    <div class="mx-auto clearfix" style="max-width: 1440px">
        
        <div>
            
            {{-- Main Content --}}
            <main class="rh-analysis-overview pl2 pr2 pt3 pb1 col col-12 sm-col-12 md-col-12 lg-col-9" id="main">

                <div class="center px3" id="main">
                    <div class="left-align pt3">
                        <h1 class="mb3">{{ the_title() }}</h1>
                        
                        <form name="myForm" method="get" action="./">
                            <?php
                            $strSearchText = "";
                            if(isset($_GET["q"])){
                                $strSearchText = $_GET["q"];
                            }
                            ?>
                            <div class="rh-search-field">
                                <input type="text" name="q" class="rh-search-term rh-search-term-larger" placeholder="Skriv din sökning här" value="<?=$strSearchText?>" aria-label="Sökruta" style="height: 7ex; max-width:60em;">
                                <button type="submit" class="rh-search-button rh-search-button-larger" style="background-color: #378A30; color:white; height: 7ex;">
                                Sök
                                </button>
                            </div>
                        </form>
                        
                        <p>{{ $post->post_content }}</p>
                        <a href="./?all=1">Lista alla analyser</a>


                        <form name="affiliation">
                            <select name="sid" method="get" class="mt2" style="height: 5ex; font-size: 1em;">
                                <option value="" disabled selected>Välj specialitet</option>
                                @php($myAff = get_region_halland_api_analysforteckning_affiliations())
                                @php($mySelected = "")
                                @foreach ($myAff as $aff)
                                    @if($aff['0'] == $sid)
                                        @php($mySelected = "selected")
                                    @endif
                                    <option {!! $mySelected !!} value="{!! $aff['0'] !!}">{!! $aff['1'] !!}</option>
                                @php($mySelected = "")
                                @endforeach
                            </select>
                            <input class="ml1 rh-button rh-button--primary" type='submit' value="Visa"/>
                        </form>
                        

                            <div class="mt3 rh-filter-alphabet mb4" style="max-width: 54em;">
                                @php($myActive = 0)
                                <?php $strAllLetters = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,x,y,z,Å,Ä,Ö";
                                    $arrAllLetters = explode(",",$strAllLetters);
                                    foreach ($arrAllLetters as $letter) {
                                    $strLetterU = strtoupper($letter);
                                ?>
                                    @if($strLetterU == $lid)
                                        @php($myActive = 1)
                                    @endif
                                    @if($myActive == 1)
                                        <a class="rh-filter-alphabet-link rh-filter-alphabet-link--active" href="./?lid={!! $strLetterU !!}">{!! $strLetterU !!}</a>
                                    @else
                                        <a class="rh-filter-alphabet-link" href="./?lid={!! $strLetterU !!}">{!! $strLetterU !!}</a>
                                    @endif
                                @php($myActive = 0)
                                <?php } ?>
                            </div>
                            @if($type == 1)
                                @include('partials.analys-single')
                            @endif
                            @if($type == 2)
                                @include('partials.analys-aff')
                            @endif
                            @if($type == 3)
                                @include('partials.analys-letter')
                            @endif
                            @if($type == 4)
                                @include('partials.analys-all')
                            @endif
                            @if($type == 5)
                                @include('partials.analys-search')
                            @endif
                    </div>
                </div>

            </main>
            {{-- Main Content END --}}

            <aside class="pt4 pl1 pr2 col col-12 sm-col-12 md-col-12 lg-col-3">
                @include('partials.analys-links')
            </aside>

            </div>
        </div>

    </div>

@endsection
