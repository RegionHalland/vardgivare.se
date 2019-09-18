@php($checkCookieNotice = check_region_halland_cookie_notice())
@if ($checkCookieNotice == false)
@php($cookie_notice = get_region_halland_cookie_notice())
<div id="cookie-notice" class="rh-vg__styling-light-1">
    <div class="rh-cookie rh-container--auto rh-container-px">
        <span class="rh-cookie-icon"></span>
        <p class="rh-cookie-description">
            {!! $cookie_notice['message'] !!}
        </p>
        <button id="cookie-consent" class="rh-button rh-button--primary rh-cookie-button"
            aria-label="Acceptera cookies och dölj meddelandet">
            {!! $cookie_notice['button'] !!}
        </button>
    </div>
</div>
@endif