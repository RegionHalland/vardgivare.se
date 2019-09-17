{{--
	Template Name: Formulär Absolut GFR
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

			@php($myResult = get_region_halland_api_analysforteckning_form_absolut_gfr())
			<?php 
				$myHasSubmittedGFR = 0;
				if(isset($_POST["has-submitted-gfr"])){
			        $myHasSubmittedGFR = $_POST["has-submitted-gfr"];
			    }
			?>
			@if($myHasSubmittedGFR == 0)
				<form method="post" action="./">
					<h3>Beräkna absolut GFR</h3>
					<input type="hidden" name="has-submitted-gfr" value="1">
					<h5>Vikt (kg)</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-gfr-vikt" class="rh-form__control">
					</div>
					<h5>Längd (cm)</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-gfr-langd" class="rh-form__control">
					</div>
					<h5>Ytnormaliserad GFR</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-gfr-ytnormaliserad" class="rh-form__control">
					</div>
					<input type="submit" value="BERÄKNA" class="rh-button rh-button--primary">
					@if($myHasSubmittedGFR != 0)
						&nbsp;&nbsp;<a href="./" class="rh-button rh-button--icon">TÖM FORMULÄR</a>
					@endif
					<p>&nbsp;</p>
				</form>	
			@else
				<form method="post" action="./">
					<h3>Beräkna absolut GFR</h3>
					<input type="hidden" name="has-submitted-gfr" value="1">
					<h5>Vikt (kg)</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-gfr-vikt" value="<?=$_POST["my-gfr-vikt"]?>" class="rh-form__control">
					</div>
					<h5>Längd (cm)</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-gfr-langd" value="<?=$_POST["my-gfr-langd"]?>" class="rh-form__control">
					</div>
					<h5>Ytnormaliserad GFR</h5>
					<div class="rh-form-group">
					    <input id="" type="text" name="my-gfr-ytnormaliserad" value="<?=$_POST["my-gfr-ytnormaliserad"]?>" class="rh-form__control">
					</div>
					<p>&nbsp;</p>
					<input type="submit" value="BERÄKNA" class="rh-button rh-button--primary">
					@if($myHasSubmittedGFR != 0)
						&nbsp;&nbsp;<a href="./" class="rh-button rh-button--icon">TÖM FORMULÄR</a>
					@endif
				</form>	
			@endif
			@if($myResult != 0)
				<div class="pt2 pb3">
					<br><h3>Resultat</h3>
					<div class="pt2 pl2" style="height:50px;width:100%;background-color:#eeeeee"><?=$myResult?> mL/min </div>
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
			
			<div class="pt2">
				<h3>Referenser</h3>
				<p>1.SBU.  Skattning av njurfunktion. 2013.</p>
				<p>2.Nyman U et al, The revised Lund-Malmö GFR estimating equation outperforms MDRD and CKD-EPI across GFR, age and BMI intervals in a large Swedish population. Clin Chem Lab Med. 2014 Jun;52(6):815-24.</p>
				<p>3.Grubb A et al, Generation of a new cystatin C-based estimating equation for glomerular filtration rate by use of 7 assays standardized to the international calibrator. Clin Chem. 2014 Jul;60(7):974-86.</p>
				<p>4.Preiss DJ et al, The influence of a cooked-meat meal on estimated glomerular filtration rate. Ann Clin Biochem. 2007 Jan;44(Pt 1):35-42.</p>
				<p>5.Hunter A, The creatine content of the muscles and some other tissues in fishes, J. Biol. Chem. 1929 81: 513-523.</p>
				<p>6.Robinson TM et al, Dietary creatine supplementation does not affect some haematological indices, or indices of muscle damage and hepatic and renal function. Br J Sports Med. 2000 Aug;34(4):284-8.</p>
				<p>7.Smith MC et al, Assessment of glomerular filtration rate during pregnancy using the MDRD formula. BJOG. 2008 Jan;115(1):109-12.</p>
				<p>8.Risch L et al, Effects of glucocorticoid immunosuppression on serum cystatin C concentrations in renal transplant patients. Clin Chem. 2001 Nov;47(11):2055-9.</p>
				<p>9.Jayagopal V et al, Paradoxical changes in cystatin C and serum creatinine in patients with hypo- and hyperthyroidism. Clin Chem. 2003 Apr;49(4):680-1.</p>
				<p>10.Elgadi A et al, Long-term effects of primary hypothyroidism on renal function in children. J Pediatr. 2008 Jun;152(6):860-4.</p>
				<p>11.Strevens H et al, Serum cystatin C for assessment of glomerular filtration rate in pregnant and non-pregnant women. Indications of altered filtration process in pregnancy. Scand J Clin Lab Invest. 2002;62(2):141-7.</p>
				<p>12.Grubb A et al, Reduction in glomerular pore size is not restricted to pregnant women. Evidence for a new syndrome: ‘Shrunken pore syndrome’. Scand J Clin Lab Invest. 2015 Jul;75(4):333-40.</p>
			
			</div>

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
