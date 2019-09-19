{{--
	Template Name: Styrda dokument
--}}

@extends('layouts.app')

@section('content')



<main class="bg-white pt-16 pb-8" id="main">
	<div class="mt2 rh-container--auto rh-container-px rh-vg__styrda-dokument">
		<div class="w-full mx-auto rh-vg__styrda-dokument__items">
			<h1 class="mb-4">{!! get_the_title() !!}</h1>
			@include('partials.styrda')
		</div>
	</div>
</main>

@endsection