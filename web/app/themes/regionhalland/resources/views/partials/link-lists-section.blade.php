@php($myLinks = get_region_halland_acf_page_link_lists_items())
@if($myLinks)
<article class="rh-dp-from-md rh-goto-block">
    <div class="rh-goto-block__header">
        <h2 id="$id" class="rh-goto-block__header-title">Gå direkt till</h2>
    </div>
        @foreach ($myLinks as $link)
        <div class="mt2 rh-goto-block__body">
            <ul>        
                @foreach ($link['link_list'] as $list)
                    <li>
                        <a href="{{$list['link_url']}}"
                            class="rh-link--navigation rh-goto-block__body-item-link">{{$list['link_title']}}</a>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
</article>
@endif
