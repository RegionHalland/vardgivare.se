{{--
	Template Name: Formulär Iohexol
--}}

@extends('layouts.app')

@section('content')

{{-- Container --}}
<div class="mx-auto clearfix" style="max-width: 1440px">
	<div>
		
		<div class="justify-between">

		{{-- Sidebar --}}
		<aside class="rh-xpad--left pt3 pb2 col col-12 sm-col-12 md-col-12 lg-col-3">
			@include('partials.nav-sidebar')
		</aside>

		{{-- Main Content --}}
		<main class="pl3 pr2 pt3 pb1 col col-12 sm-col-12 md-col-12 lg-col-6" id="main">
	
			{{-- Title --}}
			<h1>{{ the_title() }}</h1>
			
			{{-- Ingress --}}
			<p>{{ get_region_halland_acf_page_ingress() }}</p>
	
			@php($myResult = get_region_halland_api_analysforteckning_form_iohexol())
			<?php 
				$myHasSubmittedIohexol = 0;
				if(isset($_POST["has-submitted-iohexol"])){
			        $myHasSubmittedIohexol = $_POST["has-submitted-iohexol"];
			    }
			?>
			@if($myHasSubmittedIohexol == 0)
				<form method="post" action="./">
					<h3 class="pt1">Beräkna Iohexol</h3>
					<input type="hidden" name="has-submitted-iohexol" value="1">
					<h5>Kön (m/k)</h5>
					<select name="my-iohexol-kon" style="width:100%;height:32px;">
						<option value="1" selected>&nbsp;Man</option>
						<option value="2">&nbsp;Kvinna</option>
					</select><br><br>
					<h5>Ålder (år)</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-iohexol-alder" class="rh-form__control">
					</div>
					<h5>Kreatinin (mikromol/L)</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-iohexol-kreatinin" class="rh-form__control">
					</div>
					<h5>Vikt (kg)</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-iohexol-vikt" class="rh-form__control">
					</div>
					<h5>Längd (m)</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-iohexol-langd" class="rh-form__control">
					</div>
					<input type="submit" value="BERÄKNA" class="rh-button rh-button--primary">
					@if($myHasSubmittedIohexol != 0)
						&nbsp;&nbsp;<a href="./" class="rh-button rh-button--icon">TÖM FORMULÄR</a>
					@endif
					<p>&nbsp;</p>
				</form>
			@else
				<form method="post" action="./">
					<h3>Beräkna Iohexol</h3>
					<input type="hidden" name="has-submitted-iohexol" value="1">
					<h5>Kön (m/k)</h5>
					<select name="my-iohexol-kon" style="width:100%;height:32px;">
						<option value="1" <?php if ($_POST["my-iohexol-kon"] == 1) echo "selected" ?> >&nbsp;Man</option>
						<option value="2" <?php if ($_POST["my-iohexol-kon"] == 2) echo "selected" ?>>&nbsp;Kvinna</option>
					</select><br>
					<h5>Ålder (år)</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-iohexol-alder" value="<?=$_POST["my-iohexol-alder"]?>" class="rh-form__control">
					</div>
					<h5>Kreatinin (mikromol/L)</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-iohexol-kreatinin" value="<?=$_POST["my-iohexol-kreatinin"]?>" class="rh-form__control">
					</div>
					<h5>Vikt (kg)</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-iohexol-vikt" value="<?=$_POST["my-iohexol-vikt"]?>" class="rh-form__control">
					</div>
					<h5>Längd (m)</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-iohexol-langd" value="<?=$_POST["my-iohexol-langd"]?>" class="rh-form__control">
					</div>
					<input type="submit" value="BERÄKNA" class="rh-button rh-button--primary">
					@if($myHasSubmittedIohexol != 0)
						&nbsp;&nbsp;<a href="./" class="rh-button rh-button--icon">TÖM FORMULÄR</a>
					@endif
				</form>
			@endif
			@if($myResult != 0)
				<div class="pt2 pb3">
					<br><h3>Resultat</h3>
					<div class="pt2 pl2" style="height:50px;width:100%;background-color:#eeeeee">Du ska göra en <strong><?=$myResult['1']?>-punkts </strong> Iohexol undersökning</div>
					<p style="height:5px;">&nbsp;</p>
					@if($myResult['1'] == '1')
						<div class="pt2 pl2" style="height:80px;width:100%;background-color:#eeeeee">
							<strong>Prov 1</strong> efter injektionen ska tas efter <strong><?=$myResult['2']?></strong> timmar (OBS! exakta tidpunkterna [timme, minuter] för proverna måste anges!)
						</div>
					@else
						<div class="pt2 pl2" style="height:80px;width:100%;background-color:#eeeeee">
							<strong>Prov 1 och 2</strong> efter injektionen ska tas efter <strong><?=$myResult['2']?></strong> timmar (OBS! exakta tidpunkterna [timme, minuter] för proverna måste anges!)
						</div>
					@endif
				</div>
			@endif

			@while(have_posts()) @php(the_post())
				
				{{-- Content --}}
				@if(function_exists('get_region_halland_prepare_the_content'))
					@php(get_region_halland_prepare_the_content())
				@endif
				<article class="rh-article">
					{!! the_content() !!}
				</article>

			@endwhile

			{{-- Author --}}
			<div class="pt2">
				@include('partials.author-info')
			</div>
			
			{{-- Feedback --}}
			@include('partials.feedback')

		</main>

		<aside class="pt4 col col-12 sm-col-12 md-col-12 lg-col-3">
			@include('partials.content-nav')
		</aside>

		</div>
	</div>
</div>
{{-- Container END --}}
@endsection
