@php($myFrontPage = get_region_halland_single_page_information(get_option('page_on_front')))
<div class="rh-vg__home-site-info">
    <h1 class="rh-vg__home-site-info__title">{{$myFrontPage->post_title}}</h1>
    <p class="rh-vg__description">{{$myFrontPage->post_content}}</p>
</div>