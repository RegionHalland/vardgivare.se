@extends('layouts.app')

@section('content')

<?php
	if(isset($_GET['ID'])) {
    	$myID = $_GET['ID'];
	} else {
		$myID = 1;
	}
?>

{{-- Container --}}
<div class="container mx-auto px-4 pt-8 md:pt-16 pb-12">
	<div class="w-full mx-auto">
		<div class="flex flex-wrap items-stretch -mx-4">
		
		{{-- Sidebar --}}
		<aside class="w-full md:w-3/12 px-4 mb-8">
			{{-- Sidebar Navigation --}}
			@include('partials.nav-sidebar')
			{{-- Sidebar Navigation END--}}

			{{-- Left Sidebar END --}}
			@if (is_active_sidebar('sidebar-left'))
				@include('partials.sidebar-left')
			@endif
			{{-- Left Sidebar END --}}
		</aside>
		{{-- Sidebar END --}}

		{{-- Main Content --}}
		<main class="w-full md:w-6/12 px-4" id="main">
			<div>
				@php($myAnalys = get_region_halland_analys_data(2, $myID, ""))
		        @foreach ($myAnalys as $analys)
		            <h1><b>{{ $analys['analys_name'] }}</b></h1><br>
		            <span>{{ $analys['analys_desc'] }}</span><br><br>
		        @endforeach
			</div>
			<div>
				<span><a href="{!! env('WP_HOME') !!}/analysforteckningar/">Tillbaka</a></span>
			</div>	
		</main>
		{{-- Main Content END --}}

		<aside class="w-full md:w-3/12 px-4">
			{{-- Content Navigation --}}
			@include('partials.content-nav')
			{{-- Content Navigation END --}}
		</aside>

		</div>
	</div>
</div>
{{-- Container END --}}
@endsection