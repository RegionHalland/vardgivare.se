@extends('layouts.app')

@section('content')
<main>
	<div class="center px4" id="main" style="max-width: 1440px;">
		<div class="left-align clearfix">
			<div class="col col-12 sm-col-12 md-col-8 lg-col-8">
				<header class="">
					<h1 class="h1 pt3">Nyhetsarkiv </h1>
				</header>
				@php($myPosts = get_region_halland_news_archive_taxonomi_category_filter())
				@foreach($myPosts as $post)
					@include('partials.news-list-item')
				@endforeach
			</div>
			<div class="pt3 pb3 pl4 col col-12 sm-col-12 md-col-4 lg-col-4">
				<header>
					<h2 class="h2">Filtrera på område</h2>
				</header>
				@php($categories = get_region_halland_news_archive_taxonomi_category_categories('Visa alla nyheter'))
				<ul class="">
					@foreach($categories as $category)
						<li class="pb1"><a href="{{ $category['link'] }}" class="rh-labels" style="text-decoration:none">{{ $category['name'] }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</main>

@endsection