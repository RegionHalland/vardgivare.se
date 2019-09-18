{{--
	Template Name: Section Page
--}}

@extends('layouts.app')

@section('content')
	
	@while (have_posts()) @php the_post() @endphp

		<main id="main">
			
			<div class="rh-container--auto rh-container-px pt-16 pb-8 relative bg-blue-dark">
				<div class="container mx-auto px-4 relative">
					<div class="w-full mx-auto pt3">
						<h1 class="mb-4 text-white">{!! get_the_title() !!}</h1>
						<div class="text-lg leading-tight md:text-xl mb-12 text-white white-link lg:w-5/12">
							@php the_content() @endphp
						</div>
					</div>
				</div>
			</div>

			<div class="pb2">&nbsp;</div>
    
    		{{-- Parent Page --}}
    		<div class="rh-container--auto rh-container-px">
        		@include('partials.parent-page')
    		</div>

			<div class="bg-white pt-12 pb-8">
				<div class="container mx-auto px-4">
					<div class="w-full mx-auto">
						<div class="flex flex-wrap -mx-4">
							<div class="w-full lg:w-8/12 px-4 rh-container--auto">
								   @include('partials.child-navigation')
							</div>
						</div>
					</div>
				</div>
			</div>

			@if(function_exists('get_region_halland_page_news_taxonomi_category'))
	            @php($newsitems = get_region_halland_page_news_taxonomi_category())
	            @if($newsitems)
	                <div style="background-color: #F4F4F4;" class="pb3 pt3">
	                    <div class="center" style="max-width:1440px;">
	                        <div class="left-align">
	                            <div class="mx3 pt3 pb2">
	                                <h1 class="pb2">Nyheter</h1>
	                            </div>
	                            <ul class="flex flex-wrap pb3 mx3 pt3 px2" aria-label="Nyheter" style="background-color: white; border-radius: 0.4ex; box-shadow: 1px 2px 6px grey;">
	                                @foreach($newsitems as $item)
	                                    <li class="rh-article pb2 col-12 sm-col-6 md-col-6 lg-col-6 px2">
	                                        <h2 class="h3 rh-article-title"><a class="rh-article-title-link" style="color: #378A30;" href="{{ $item['permalink'] }}">{{ $item['title'] }}<a/></h2>
	                                        <p class="rh-article-published">Publicerad: {{ $item['date'] }}</p>
	                                        <p class="rh-article-description">
	                                            {{ wp_trim_words(region_halland_remove_shortcode($item['content']), 20, '...') }}
	                                        </p>
	                                    </li>
	                                @endforeach
	                            </ul>
	                            <div class="col-12 mt3" style="display: flex; justify-content: center;">
	                                <a href="/nyheter" class="rh-button rh-button--secondary" aria-label="Visa fler nyheter" role="button" style="text-decoration: none;">Visa fler nyheter</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            @endif
	        @endif
        	
        	<div class="pb3">&nbsp;</div>
		
		</main>

	@endwhile

@endsection