@php($checkCookieNotice = check_region_halland_cookie_notice())
@if ($checkCookieNotice == false)
	@php($cookie_notice = get_region_halland_cookie_notice())
	<div class="rh-vg__background-color-light-2">
        <div class="rh-cookie rh-container--auto rh-container-px">
            <span class="rh-cookie-icon"></span>
            <p class="rh-cookie-description">
                På den här webbplatsen använder vi cookies (kakor) för att webbplatsen ska fungera på ett bra sätt för dig. Genom att klicka vidare eller på “Jag förstår” godkänner du att vi använder cookies.
            </p>
            <button id="cookie-consent" class="rh-button rh-button--primary rh-cookie-button" aria-label="Acceptera cookies och dölj meddelandet" role="button">Jag förstår</button>
        </div>
    </div>
@endif