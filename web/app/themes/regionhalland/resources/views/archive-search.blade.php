@extends('layouts.app')

@section('content')

	@php($myData = get_region_halland_search_findwise_vardgivare())

	@php($numberOfHits = $myData['documentList']['numberOfHits'])

	@php($query = $myData['query'])

	@php($hitsPerPage = $myData['documentList']['pagination']['hitsPerPage'])

	@php($currentPage = 1+$myData['documentList']['pagination']['offset']/$hitsPerPage)

	@php($numberOfPages = ceil($numberOfHits/$hitsPerPage))

	@php($arrFirst = $myData['documentList']['pagination']['firstPage'])

	@php($arrPrev = $myData['documentList']['pagination']['previousPage'])

	@php($arrNext = $myData['documentList']['pagination']['nextPage'])

	@php($arrLast = $myData['documentList']['pagination']['lastPage'])


	<main>
		<div class="rh-container--auto rh-container-px" id="main">
			<div class="left-align">
				<h1 class="mb3">Sök</h1>

				<form name="myForm" method="get" action="{!! env('FINDWISE_SEARCH_URL') !!}">
					<?php
					$strSearchText = "";
					if(isset($_GET["q"])){
						$strSearchText = $_GET["q"];
					}
					?>
					<div class="rh-search-field">
						<input type="text" name="q" class="rh-search-term rh-search-term-larger" placeholder="Skriv din sökning här" value="<?=$strSearchText?>" aria-label="Sökruta">
						<button type="submit" class="rh-search-button rh-search-button-larger" style="height:61px">
							Sök
						</button>
					</div>
				</form>
				<p class="pt3">Din sökning på <strong>'{{$strSearchText}}'</strong> gav {{ $numberOfHits }} träffar</p>
			</div>

			<div class="left-align clearfix">
				<div class="pt3 pb3 col col-12 sm-col-12 md-col-8 lg-col-8">

					@if(isset($myData))

						<h2 class="mb1" style="border-bottom: 4px solid #005069">Sökresultat - sida {{$currentPage}} av {{$numberOfPages}}</h2>

						<ul>
						@foreach ($myData['documentList']['documents'] as $data)
							<li class="py2">
								<p><a class="h2" href="{{ $data['url'] }}" style="color: #005069; text-decoration: none; line-height: 1.3;">{!! $data['title'] !!}</a></p>
								<p>Senast ändrad: {!! truncateDate($data['modified']) !!}</p>
								@if(function_exists('get_region_halland_breadcrumbs'))
									@php($myBreadcrumbs = get_region_halland_breadcrumbs_pages_search(get_region_halland_breadcrumbs_pages_search_id($data['_id']), $data['title'], 'Start'))
									@if(isset($myBreadcrumbs))
										<p style="line-height:1.4">
										@foreach ($myBreadcrumbs as $myBreadcrumb)
											@if ($myBreadcrumb['url'])
												<a href="{{ $myBreadcrumb['url'] }}" style="font-size: 0.9em; color:black; text-decoration:none;">{!! $myBreadcrumb['name'] !!}</a><span style="font-size: 0.9em; color:black">  >  </span>
											@else
												<a href="{{ $data['url'] }}" style="font-size: 0.9em; color:black; text-decoration:none;">{!! $myBreadcrumb['name'] !!}</a>
											@endif
										@endforeach
										</p>
									@endif
								@endif
							</li>
							{{-- <span>{{ $data['content'] }}</span><br><br> --}}

						@endforeach
						</ul>
					@else

						<p class="h2">Din sökning på <strong>'{{$strSearchText}}'</strong> gav tyvärr inga träffar</p>

					@endif

				</div>

				<div class="pt3 pb3 pl4 col col-12 sm-col-12 md-col-4 lg-col-4">
					<h2 style="border-bottom: 4px solid #005069">Söktips</h2>
					<div class="mt2 pt2 pl2 pb2" style="border-left: 4px solid #005069; background-color: #D9E4EA; border-bottom-left-radius: 5px; border-top-left-radius: 5px;">
					<ul>
						<li>Se till att alla ord är rättstavade</li>
						<li class="pt1 pb1">Försök att använda synonymer</li>
						<li>Försök med fler generella ord eller ta bort ett sökord</li>
					</ul>
					</div>
				</div>
				<div class="col col-12 pl4 pt3 pb3">
					@if($arrFirst)
						<a class="rh-pagination-link rh-pagination-link-previous" style="line-height: 3;" href="{!! env('FINDWISE_SEARCH_URL') !!}/?<?=$myData['documentList']['pagination']['firstPage']['query']?>">Första&nbsp;sidan</a>
					@else
						<span class="rh-pagination-link rh-pagination-link-previous" style="line-height: 3;">Första&nbsp;sidan</span>
					@endif

					@if($arrPrev)
						<a class="rh-pagination-link" style="line-height: 3;" href="{!! env('FINDWISE_SEARCH_URL') !!}/?<?=$myData['documentList']['pagination']['previousPage']['query']?>">Föregående&nbsp;sida</a>
					@else
						<span class="rh-pagination-link" style="line-height: 3;">Föregående&nbsp;sida</span>
					@endif

					@foreach ($myData['documentList']['pagination']['pages'] as $pages)
						@if($pages['selected'] == 1)
							<strong><a class="rh-pagination-link" style="line-height: 3;background-color: #FCAF15;" href="{!! env('FINDWISE_SEARCH_URL') !!}/?<?=$pages['query']?>">{!! $pages['displayName'] !!}</a></strong>
						@else
							<span><a class="rh-pagination-link"  style="line-height: 3;" href="{!! env('FINDWISE_SEARCH_URL') !!}/?<?=$pages['query']?>">{!! $pages['displayName'] !!}</a></span>
						@endif
					@endforeach

					@if($arrNext)
						<a class="rh-pagination-link"  style="line-height: 3;" href="{!! env('FINDWISE_SEARCH_URL') !!}/?<?=$myData['documentList']['pagination']['nextPage']['query']?>">Nästa&nbsp;sida</a>
					@else
						<span class="rh-pagination-link" style="line-height: 3;" >Nästa&nbsp;sida</span>
					@endif

					@if($arrLast)
						<a class="rh-pagination-link rh-pagination-link-next"  style="line-height: 3;" href="{!! env('FINDWISE_SEARCH_URL') !!}/?<?=$myData['documentList']['pagination']['lastPage']['query']?>">Sista&nbsp;sidan</a>
					@else
						<span class="rh-pagination-link rh-pagination-link-next" style="line-height: 3;">Sista&nbsp;sidan</span>
					@endif

				</div>

			</div>
		</div>
	</main>

	<?php
	function truncateDate($date) {
	    $myDate = substr($date,0,10);
	    return $myDate;
	}
	?>
@endsection
