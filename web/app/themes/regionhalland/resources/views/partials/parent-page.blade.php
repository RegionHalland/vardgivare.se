@php($myParentPage = get_region_halland_parent_page(1))
@if($myParentPage['has_back'] == 1)
    <div class="pb2 rh-label-previous">
        {{-- <span class="rh-label-previous-icon"></span>
        <p class="rh-label-previous-title">
            <a href="{{$myParentPage['url']}}" style="color:black;">{{$myParentPage['post_title']}}</a>
        </p> --}}

        <span class="rh-round-button icon-corner-left-up" style="margin-right: 0.5em;"></span>

        <p class="rh-label-previous-title">
            <a href="{{$myParentPage['url']}}" class="rh-link--navigation rh-vg__nav-left__link">{{$myParentPage['post_title']}}</a>
        </p>
    </div>
@endif