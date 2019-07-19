@php($myParentPage = get_region_halland_parent_page())
@if($myParentPage['has_back'] == 1)
    <div class="pb3 rh-label-previous">
        <span class="rh-label-previous-icon"></span>
        <p class="rh-label-previous-title">
            <a href="{{$myParentPage['url']}}" style="color:black;">{{$myParentPage['post_title']}}
        </p>
    </div>
@endif
@if(function_exists('get_region_halland_current_page_and_child_pages'))
	@php($myPages = get_region_halland_current_page_and_child_pages())
	@if(isset($myPages))
		<ul class="rh-secondary-nav">
			<a class="rh-secondary-nav-link"><li class="rh-secondary-nav-item-parentlevel" style="font-size: 1.1em; font-weight:bold; color:black; background-color:#E4E4E4; border:none;">
				{{ $myPages['current_page']->post_title }}
			</li></a>
			@if (!empty($myPages['page_children']))
				@foreach ($myPages['page_children'] as $myChilds)
					<a class="rh-secondary-nav-link" style="color:black; font-size: 1.125em; text-decoration:none;" href="{{ $myChilds->url }}"><li class="rh-secondary-nav-item-toplevel">
						{{ $myChilds->post_title }}
					</li></a>
				@endforeach
			@endif
		</ul>
	@endif
@endif