@php($myParentPage = get_region_halland_parent_page())
@if($myParentPage['has_back'] == 1)
    <div class="pb2 rh-label-previous">
        <span class="rh-round-button icon-corner-left-up" style="margin-right: 0.5em;"></span>

        <p class="rh-label-previous-title">
			<a href="{{$myParentPage['url']}}" class="rh-link--navigation rh-vg__nav-left__link">{{$myParentPage['post_title']}}</a>
        </p>
    </div>
@endif

@php($myPages = get_region_halland_current_page_and_child_pages())
@if(isset($myPages))
<div class="rh-navigation-left rh-dp-from-lg">
    <div class="rh-navigation-left__header">
        <p class="rh-navigation-left__header-text">
            {{ $myPages['current_page']->post_title }}
        </p>
    </div>

    @if (!empty($myPages['page_children']))
    <div>
        @foreach ($myPages['page_children'] as $myChilds)
        <div class="rh-navigation-left__item">
            <p class="rh-navigation-left__item-text">
                <a class="rh-link--navigation rh-navigation-left__item-link" href="{{ $myChilds->url }}">
                    <span class="rh-navigation-left__item-box">{{ $myChilds->post_title }}</span>
                </a>
            </p>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endif
