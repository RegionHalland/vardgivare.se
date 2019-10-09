@php($myLinks = get_region_halland_acf_page_link_lists_items())
@if($myLinks)
<div class="rh-goto-page-block">
    <div class="rh-goto-page-block__header">
        <p class="rh-goto-page-block__header-text" aria-label="Gå direkt till">Gå direkt till</p>

        <div class="rh-circle-button rh-circle-button--small rh-goto-page-block__button">
            <span class="icon-plus"></span>
        </div>
    </div>

    @foreach ($myLinks as $link)
    <div class="rh-goto-page-block__body">
        <ul>
            @foreach ($link['link_list'] as $list)
            <li>
                <a href="{{$list['link_url']}}"
                    class="rh-link--navigation rh-goto-page-block__body-item-link">{{$list['link_title']}}</a>
            </li>
            @endforeach
        </ul>
    </div>
    @endforeach

</div>
@endif