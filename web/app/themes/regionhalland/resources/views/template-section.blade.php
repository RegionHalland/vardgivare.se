{{--
	Template Name: Section Overview
--}}

@extends('layouts.app')

@section('content')

	<h1>{!! get_the_title() !!}</h1>
	
	@while(have_posts()) @php(the_post())
		<div>
			@php(the_content())
		</div>
	@endwhile

    <nav aria-label="Undersidor" style="background-color: #F4F4F4;">
        <ul class="flex flex-wrap px3 pt3 center" aria-label="Undersidor" style="max-width: 1440px;">
			@php($page_children = get_region_halland_page_children())	
				@foreach($page_children as $page)
                <li class="rh-navigation-card left-align col-12 sm-col-6 md-col-4 lg-col-3 pr2" style="position:relative">
                    <div class="rh-navigation-card-title">
                        <span class="rh-navigation-card-title-icon"></span>
                        <strong><a href="{{ $page->url }}" class="h3" style="color:black; text-decoration: none;">
                            {{ $page->post_title }}
                        </a></strong>
                    </div>
                </li>
            @endforeach
        </ul>
    </nav>

@endsection