@extends('layouts.app')

@section('content')

<?php
	if(isset($_GET['letter'])) {
    	$myLetter = $_GET['letter'];
	} else {
		$myLetter = "all";
	}
?>

<main class="bg-white pt-12 pb-8" id="main">
	<div class="container mx-auto px-4">
		<div class="w-full mx-auto">
			<div class="flex flex-wrap -mx-4">
				<div class="w-full md:w-12/12 px-4">
					<header class="relative pb-4 block">
						<h1 class="inline-block border-b-2 border-blue-dark text-2xl font-bold text-black pb-2 z-20 relative leading-none">Analysförteckning</h1>
						<hr class="absolute pin-b pin-l w-full h-0 border-b-2 mb-4 border-blue-light z-10">
					</header>
					<div>
						<span>
							<a href="{!! env('WP_HOME') !!}/analysforteckningar/?letter=A">A</a>
						</span>
						<span>
							&nbsp;&nbsp;<a href="{!! env('WP_HOME') !!}/analysforteckning/?letter=B">B</a>&nbsp;&nbsp;
						</span>
						<span>
							<a href="{!! env('WP_HOME') !!}/analysforteckningar/?letter=C">C</a>
						</span>
					</div>
					<div>
						&nbsp;
					</div>
					<div>
						<span>
							<a href="{!! env('WP_HOME') !!}/analysforteckningar/?letter=all">Visa alla</a>
						</span>
					</div>
					<div>
						&nbsp;
					</div>
					<div>
						@php($myAnalys = get_region_halland_analys_data(1, 0, $myLetter))
				        @foreach ($myAnalys as $analys)
				            <span><b><a href="{!! env('WP_HOME') !!}/analysforteckningar/analys/?ID={{ $analys['analys_id'] }}">{{ $analys['analys_name'] }}</a></b></span><br>
				            <span>{{ $analys['analys_desc'] }}</span><br><br>
				        @endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection