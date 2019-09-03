
<div class="rh-label-previous mb2">
    <span class="rh-label-previous-icon--blue"></span>
    <p class="rh-label-previous-title">
    @if($_SESSION["type"] == 2)
        <a href="./?sid=<?=$_SESSION["sid"]?>">Analysförteckning</a>
    @elseif($_SESSION["type"] == 3)
        <a href="./?lid=<?=$_SESSION["lid"]?>">Analysförteckning</a>
    @elseif($_SESSION["type"] == 4)
        <a href="./?all=1">Analysförteckning</a>
    @elseif($_SESSION["type"] == 5)
        <a href="./?q=<?=$_SESSION["q"]?>">Analysförteckning</a>
    @else
        <a href="./">Analysförteckning</a>
    @endif
    </p>
</div>

<h2 class="mb3" style="border-bottom: 2px solid #004890;">{!! $myData['name'] !!}</h2>
<table class="rh-table-listing--hr mb3" style="width:100%; line-height: 1.4">
@if($myData['vas-order-code'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>VAS Provkod:</strong></td>
    <td class="rh-table-listing_cell--hr">
        {!! $myData['vas-order-code'] !!}
    </td>
</tr>
@endif
@if($myData['laboratory-name'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Analyserande lab:</strong></td>
    <td class="rh-table-listing_cell--hr">
    	{!! $myData['laboratory-name'] !!}<br>
    	{!! $myData['laboratory-description'] !!}<br>
        @if($myData['laboratory-link-url'])
            <a href="{!! $myData['laboratory-link-url'] !!}" target="_blank">{!! $myData['laboratory-link-text'] !!}</a>
        @endif
     </td>
</tr>
@endif
@if($myData['referral-name'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Remiss:</strong></td>
    <td class="rh-table-listing_cell--hr">
    	{!! $myData['referral-name'] !!}<br>
    	{!! $myData['referral-description'] !!}<br>
    	@if($myData['referral-link-url'])
            <br><a href="{!! $myData['referral-link-url'] !!}" target="_blank">{!! $myData['referral-link-text'] !!}</a>
        @endif
        @if($myData['links-exist-referral'] == 1)
            <br><a href="{!! $myData['links-link-url-referral'] !!}" target="_blank">{!! $myData['links-link-text-referral'] !!}</a>
        @endif
    </td>
</tr>
@endif
@if($myData['sampling-material-name'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Provtagningsmaterial:</strong></td>
    <td class="rh-table-listing_cell--hr">
    	{!! $myData['sampling-material-name'] !!}<br>
    	{!! $myData['sampling-material-description'] !!}<br>
        @if($myData['sampling-material-link-url'])
            <br><a href="{!! $myData['sampling-material-link-url'] !!}" target="_blank">{!! $myData['sampling-material-link-text'] !!}</a>
        @endif
        @if($myData['links-exist-provtagning'] == 1)
            <br><a href="{!! $myData['links-link-url-provtagning'] !!}" target="_blank">{!! $myData['links-link-text-provtagning'] !!}</a>
        @endif
    </td>
</tr>
@endif
@if($myData['informations-text-provtagning'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Provtagning:</strong></td>
    <td class="rh-table-listing_cell--hr">
        {!! $myData['informations-text-provtagning'] !!}
    </td>
</tr>
@endif
@if($myData['informations-text-take-care'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Omhändertagande:</strong></td>
    <td class="rh-table-listing_cell--hr">
        {!! $myData['informations-text-take-care'] !!}
        @if($myData['links-exist-take-care'] == 1)
            <br><a href="{!! $myData['links-link-url-take-care'] !!}" target="_blank">{!! $myData['links-link-text-take-care'] !!}</a>
        @endif
    </td>
</tr>
@endif
@if($myData['informations-text-indication'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Indikation:</strong></td>
    <td class="rh-table-listing_cell--hr">
        {!! $myData['informations-text-indication'] !!}
        @if($myData['links-exist-indication'] == 1)
            <br><a href="{!! $myData['links-link-url-indication'] !!}" target="_blank">{!! $myData['links-link-text-indication'] !!}</a>
        @endif
    </td>
</tr>
@endif
@if($myData['method'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Metod:</strong></td>
    <td class="rh-table-listing_cell--hr">
        {!! $myData['method'] !!}
    </td>
</tr>
@endif
@if($myData['informations-text-info'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Kommentar/mer info:</strong></td>
    <td class="rh-table-listing_cell--hr">
    	{!! $myData['informations-text-info'] !!}
        @if($myData['links-exist-information'] == 1)
            <br><a href="{!! $myData['links-link-url-information'] !!}" target="_blank">{!! $myData['links-link-text-information'] !!}</a>
        @endif
    </td>
</tr>
@endif
@if($myData['unit-name'] && $myData['unit-name'] != 'Ingen enhet')
    <tr class="rh-table-listing__row">
        <td class="rh-table-listing_cell--hr"><strong>Enhet:</strong></td>
        <td class="rh-table-listing_cell--hr">
            {!! $myData['unit-name'] !!}
        </td>
    </tr>
@endif
@if($myData['informations-text-interval'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Referensintervall:</strong></td>
    <td class="rh-table-listing_cell--hr">
    	{!! $myData['informations-text-interval'] !!}
    </td>
</tr>
@endif
@if($myData['informations-text-answer'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Svarstolkning:</strong></td>
    <td class="rh-table-listing_cell--hr">
        {!! $myData['informations-text-answer'] !!}
        @if($myData['links-exist-answer'] == 1)
            <br><a href="{!! $myData['links-link-url-answer'] !!}" target="_blank">{!! $myData['links-link-text-answer'] !!}</a>
        @endif
    </td>
</tr>
@endif
@if($myData['frequency'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Analysfrekvens:</strong></td>
    <td class="rh-table-listing_cell--hr">
    	{!! $myData['frequency'] !!}
    </td>
</tr>
@endif
@if($myData['informations-text-error'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Felkällor:</strong></td>
    <td class="rh-table-listing_cell--hr">
        {!! $myData['informations-text-error'] !!}
    </td>
</tr>
@endif
@if($myData['response-time'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Svarstid:</strong></td>
    <td class="rh-table-listing_cell--hr">
        {!! $myData['response-time'] !!}
    </td>
</tr>
@endif
@if($myData['price'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Pris:</strong></td>
    <td class="rh-table-listing_cell--hr">
    	{!! $myData['price'] !!}
    </td>
</tr>
@endif
@if($myData['accredited-text'] && ($myData['accredited-value'] == 1 || $myData['accredited-value'] == 2))
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Ackrediterad:</strong></td>
    <td class="rh-table-listing_cell--hr">
    	{!! $myData['accredited-text'] !!}
    </td>
</tr>
@endif
@if($myData['biobank-text'] && ($myData['biobank-value'] == 1 || $myData['biobank-value'] == 2))
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Biobank:</strong></td>
    <td class="rh-table-listing_cell--hr">
        {!! $myData['biobank-text'] !!}
        @if($myData['links-exist-biobank'] == 1)
            <br><a href="{!! $myData['links-link-url-biobank'] !!}" target="_blank">{!! $myData['links-link-text-biobank'] !!}</a>
        @endif
    </td>
</tr>
@endif
@if($myData['updated-date'])
<tr class="rh-table-listing__row">
    <td class="rh-table-listing_cell--hr"><strong>Uppdaterad:</strong></td>
    <td class="rh-table-listing_cell--hr">
        {!! $myData['updated-date'] !!}
    </td>
</tr>
@endif
</table>