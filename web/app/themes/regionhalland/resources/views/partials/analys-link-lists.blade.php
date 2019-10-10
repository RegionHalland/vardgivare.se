@php($myLinks = get_region_halland_acf_page_link_lists_items())
@if($myLinks)
	@foreach ($myLinks as $link)
		<h3 id="{{ $link['link_slug'] }}" class="mb1" style="border-bottom: 2px solid #004890;">{{ $link['link_title'] }}</h3>
	    <div class="mb2">
	    	<ul>
			@foreach ($link['link_list'] as $list)
				<li class="content-nav__item" >
		            <a class="content-nav__item-link" href="{{ $list['link_url'] }}" target="_blank">
		                {{ $list['link_title'] }} 
		            </a>
		        </li>
			@endforeach
			</ul>
		</div>
	@endforeach
@endif