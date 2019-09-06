@if(!is_front_page())
    @php($breadcrumbs = get_region_halland_breadcrumbs())
    @if(isset($breadcrumbs))
		<nav aria-label="Breadcrumbs">
			<div class="rh-breadcrumbs hidden-sm">
			    <ol class="rh-breadcrumb-group pl3 mx-auto" style="max-width:1440px;">
					@foreach ($breadcrumbs as $breadcrumb)
						<li class="rh-breadcrumbs__item" @if ($loop->last) aria-current="page" @endif itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							@if ($breadcrumb['url'])
								<a class="rh-breadcrumbs__link" href="{{ $breadcrumb['url'] }}">{!! $breadcrumb['name'] !!}</a>
							@else
								{!! $breadcrumb['name'] !!}
							@endif
							<meta itemprop="position" content="{{ $loop->iteration }}">
						</li>
					@endforeach
				</ol>
			</div>
		</nav>
    @endif
@endif