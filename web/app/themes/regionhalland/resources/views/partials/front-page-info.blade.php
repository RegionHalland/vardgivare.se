@php($myFrontPage = get_region_halland_single_page_information(get_option('page_on_front')))
<div>
    <span><strong>{{$myFrontPage->post_title}}</strong></span><br>
    <span>{{$myFrontPage->post_content}}</span>
</div>