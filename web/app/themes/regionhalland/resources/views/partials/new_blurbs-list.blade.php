@php($myBlurbs = get_region_halland_acf_main_post_page_links_blurbs())
@if(isset($myBlurbs))
    <div class="center" style="max-width: 1440px;">
        <ul class="clearfix center mb2 mt2" style="max-width:1440px;">
        @foreach ($myBlurbs as $blurbs)
            <li class="center col col-12 sm-col-6 md-col-6 lg-col-4" style="max-width: 416px;">
                <div class="rh-blurb mx1 my2">
                    <div style="height: 195px; overflow:hidden;position:relative;">
                        <img src="{!! $blurbs['image_url'] !!}" style="height:100%;">
                    </div>
                    <div class="rh-blurb__description mx2 pt2">
                        <h3 style="line-height: 1.3"><a href="{{ $blurbs['link_url'] }}" target="{{ $blurbs['link_target'] }}" style="color:black;">{{ $blurbs['link_title'] }}</a></h3>
                        <p style="line-height: 1.4">{{ $blurbs['post_content'] }}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    </div>
@endif
