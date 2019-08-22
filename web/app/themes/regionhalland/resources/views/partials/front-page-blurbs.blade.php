@php($myFrontPageBlurbs = get_region_halland_acf_front_page_blurbs())
@if(isset($myFrontPageBlurbs))
<div>
    <ul class="clearfix center mb2 mt2" aria-label="Puffar" style="max-width:1440px;">
    @foreach ($myFrontPageBlurbs as $blurbs)
        <li class="left-align col col-12 sm-col-6 md-col-6 lg-col-4">
            <div class="rh-blurb mx1 my2">
                <div style="height: 200px; overflow:hidden;position:relative">
                    <img src="{!! $blurbs['image_url'] !!}" alt="{{$blurbs['image_alt']}}" style="width:100%; position: absolute; top:50%; transform: translateY(-50%);">
                </div>
                <div class="mx2 pt2 rh-blurb__description">
                    <h1 class="h3"><a href="{{ $blurbs['link_url'] }}" target="{{ $blurbs['link_target'] }}" style="color:black">{{ $blurbs['link_title'] }}</a></h1>
                    <p>{{ $blurbs['text_content'] }}</p>
                </div>
            </div>
        </li>
    @endforeach
    </ul>
</div>
@endif