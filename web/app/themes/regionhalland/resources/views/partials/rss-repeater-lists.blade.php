@php($myData = get_region_halland_acf_page_rss_links_items())
@foreach ($myData as $data)
	@if($data['link_data']['has_content'] == 1)
		<h2>{{$data['link_data']['rss_title']}}</h2><br>
		@foreach($data['link_data']['rss_content'] as $content)
		<a href="{{ $content['link'] }}"><strong>{!! $content['title'] !!}</strong></a><br><br>
		<p>{{ $content['description'] }}</p>
		<p><i>{{ $content['date'] }}</i></p><br>
		@endforeach
	@endif
@endforeach
