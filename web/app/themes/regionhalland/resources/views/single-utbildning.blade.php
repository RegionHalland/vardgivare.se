@extends('layouts.app')

@section('content') 	
  	
  	<!-- **************************** -->
	<!-- Content with grey background -->
	<!-- **************************** -->
	<div class="relative">
		
		<nav aria-label="Huvudnavigation" class="breadcrumbs container background-dark-blue relative mx-auto pl5 pr5 pt1 pb2 z1">

			@include('partials.breadcrumb')
			
		</nav>
	</div>	
	
	<!-- ************ -->
	<!-- Page content -->
	<!-- ************ -->
	<div class="background-white">
		<div class="background-white">
			<div class="container mx-auto p4">
				<div class="m2 flex flex-wrap">
					
					<div class="col-12 lg-col-3">
					
						@include('partials.nav-sidebars')
						
						<div class="pt2">&nbsp;</div>

						@include('partials.content-nav')
					
					</div>
					
					<!-- ************ -->
					<!-- Page content -->
					<!-- ************ -->
					<div class="col-12 lg-col-9">
						<main class="ml4">
							
							<div>
								<h1>{{ the_title() }}</h1>
							</div>
							
							<div id="main">
								@while(have_posts()) @php(the_post())
									@include('partials.article')
										
										@php($field_kommun = get_field_object('field_1f9c9b0e1fdeaf06152a19e036017084'))
										@php($field_link = get_field_object('field_2450669a4351c764234e3694755f51ea'))
										
										{{ get_field('vux_utbildning_beskrivning') }}<br>
										{{ $field_kommun['choices'][get_field('vux_utbildning_kommun')] }}<br>
										{{ $field_link['value']['title'] }}<br>
										{{ $field_link['value']['url'] }}<br>
										{{ $field_link['value']['target'] }}<br>
										{{ get_field('vux_utbildning_starttid') }}<br>
										{{ get_field('vux_utbildning_sluttid') }}<br>
									
									@include('partials.entry-meta')
								@endwhile
							</div>

						</main>
					</div>

				</div>
			</div>
		</div>	
	</div>

@endsection
