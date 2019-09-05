@php($myFrontPageBlurbs = get_region_halland_acf_front_page_blurbs())

<div class="rh-container-px rh-dp-only-md">
    @include('partials.front-page-info')
</div>

@if(isset($myFrontPageBlurbs))
<div class="row row-eq-height rh-vg__home-blocks-container" aria-label="Puffar">
    @foreach ($myFrontPageBlurbs as $blurbs)
    <div class="col col-12 md-col-6 lg-col-12 xl-col-6 rh-block-group__item">
        <div class="rh-block-box">
            <div class="rh-block">
                <img src="{!! $blurbs['image_url'] !!}"
                    alt="{{$blurbs['image_alt']}}" aria-labelledby="334455">
                <div class="rh-block-text">
                    <p class="h3">
                        <a class="rh-block-text-title rh-link--navigation" href="{{ $blurbs['link_url'] }}" target="{{ $blurbs['link_target'] }}">
                            {{ $blurbs['link_title'] }}
                        </a>
                    </p>
                    <p>{{ $blurbs['text_content'] }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif