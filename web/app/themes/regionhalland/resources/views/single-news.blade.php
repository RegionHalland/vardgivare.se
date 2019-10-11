@extends('layouts.app')

@section('content')
<div class="center pt3 px4 pb4 clearfix" style="max-width: 1440px;">
	<div class="left-align col col-12 lg-col-9 pr4">
		<main class="rh-article">
			@while(have_posts()) @php(the_post())
				<h1 class="">{!! get_the_title() !!}</h1>
				<div class="">
					@php($myIngress = get_region_halland_page_news_taxonomi_category_ingress())
					@if($myIngress)
						<p>
							<strong>{{ $myIngress }}</strong>
						</p>
					@endif
					<p>{{ the_content() }}</p>
				</div>
			@include('partials.feedback')

			@endwhile
		</main>
	</div>
    <div class="left-align col col-12 md-col-3">
        <div class="mt2 pt2 pl2 pb2" style="border-left: 4px solid #61A2D8; background-color: #D0E3F3; border-bottom-left-radius: 5px; border-top-left-radius: 5px;">
            <p><strong>Publicerad:</strong> {{ get_the_date('Y-m-d') }}
            <p><strong>Senast ändrad:</strong> <time itemprop="dateModified" datetime="{{ the_modified_date('Y-m-d') }}">{{ the_modified_date('Y-m-d') }}</time></p>
        </div>
    </div>
</div>
@endsection
