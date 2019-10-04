{{--
	Template Name: Section Page
--}}

@extends('layouts.app')

@section('content')
	
	@while (have_posts()) @php the_post() @endphp

		<main id="main">
   
    		{{-- Parent Page --}}
    		<div class="mt2 rh-container--auto rh-container-px">
        		@include('partials.parent-page')
            </div>
            
            {{-- Title --}}
            <div class="rh-container--auto rh-container-px pb-8 relative bg-blue-dark">
				<div class="container mx-auto px-4 relative">
					<div class="w-full mx-auto pt1">
						<h1 class="mb-4 text-white">{!! get_the_title() !!}</h1>
						<div class="text-lg leading-tight md:text-xl mb-12 text-white white-link lg:w-5/12">
							@php the_content() @endphp
						</div>
					</div>
				</div>
            </div>
            
            <div class="mt1 rh-container--auto rh-container-px">
                <div class="row">
                    {{-- Navigation --}}
                    <div class="col col-12 lg-col-8 rh-section-gutter-lx__left-side">
                        @include('partials.child-navigation-section-landing')
                    </div>

                    {{-- News and Go direct to page --}}
                    <div class="col col-12 lg-col-4 rh-section-gutter-lx__right-side">
                        <div class="row row-gutters">
                            <div class="mt3 rh-dp-md"></div>
                            <div class="col col-12 md-col-6 lg-col-12">
                                @include('partials.news-section-landing')
                            </div>

                            <div class="col col-12 md-col-6 lg-col-12">
                                <div class="rh-dp-from-md">
                                    ..."Gå direkt till " komponent...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="pb3">&nbsp;</div>
		</main>

	@endwhile

@endsection