@php($myLinks = get_region_halland_acf_page_link_lists_items())
@if($myLinks)
	@foreach ($myLinks as $link)
		<h2 id="{{ $link['link_slug'] }}">{{ $link['link_title'] }}</h2>
		@foreach ($link['link_list'] as $list)
			<a href="{{$list['link_url']}}" target="{{$list['link_target']}}">{{$list['link_title']}}</a><br><br>
		@endforeach
	@endforeach
@endif