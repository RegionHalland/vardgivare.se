@if(function_exists('get_region_halland_find_on_page'))
	@php($myNavs = get_region_halland_find_on_page())
	@if(isset($myNavs) && count($myNavs) > 0)
		@php($id = uniqid())
		<div id="content-nav-placeholder"></div>
		<nav class="content-nav-container rh-get-sticky hidden-sm" id="content-nav-container">
			<div>
				<p class="h2" id="{{ $id }}">Hitta på sidan</p>
				<ul>
					@foreach ($myNavs as $myNav)
						<li class="content-nav__item {{ $myNav['class'] }}" >
							<a class="content-nav__item-link" href="#{{ $myNav['slug'] }}" data-pointstoid="{{ $myNav['slug'] }}">
								{!! $myNav['content'] !!}
							</a>
							<meta itemprop="position" content="{{ $loop->iteration }}" />
						</li>
					@endforeach
				</ul>
			</div>
			<div id="content-nav-bottom-placeholder"></div>
		</nav>
	@endif
@endif