@extends('layouts.app')

@section('content')
<div class="center py4 px4" style="max-width:1440px;">
	<div class="rh-article left-align">
		@if (!have_posts())
			<h1 class="">{{ __('Sidan du söker efter verkar inte finnas.', 'halland') }}</h1>
			<p>Kontaktuppgifter, öppettider och övrig information om vård- och tandvårdsmottagningar hittar du på <a href="https://www.1177.se/Halland/hitta-vard/">www.1177.se/Halland/hitta-vard/</a>.</p>

			<h2>Det här kan du göra</h2>
			<ul>
				<li>Gå till startsidan <a href="/">www.regionhalland.se</a> och försök klicka dig fram till informationen du söker.</li>
				<li>Använd den här webbplatsens sökfunktion.</li>
				<li>Sök via en extern sökmotor som till exempel Google eller Bing.</li>
				<li>Ladda om sidan för att se om det var ett tillfälligt fel.</li>
				<li>Kontrollera om du skrivit in adressen rätt.</li>
			</ul>

			<h2 class="pt2">Hjälp oss att bli bättre</h2>
			Att sidan inte hittades kan bero på flera saker. Det kan vara vi som har gjort fel eller det kan vara felaktiga länkar till vår webbplats någon annanstans. Välkommen att <a href="mailto:infomaster@regionhalland.se">höra av dig via e-post</a> så att vi får reda på vad som inte fungerar.
		@endif
	</div>
</div>
@endsection
