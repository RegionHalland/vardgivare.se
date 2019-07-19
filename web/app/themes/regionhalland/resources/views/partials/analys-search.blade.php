<h2 class="mb3" style="border-bottom: 2px solid #004890;">Vad letar du efter?</h2>
<table class="rh-table-listing--alternating mb3" style="width:100%; line-height: 1.4">
<tr>
    <th class="rh-table-listing_cell" data-analysis-type="Bårhus, obduktion Halland" style="text-align:left;"><strong>System</strong></th>
    <th class="rh-table-listing_cell" data-analysis-type="Klinisk kemi Halland" style="text-align:left;"><strong>Analysnamn</strong></th>
    <th class="rh-table-listing_cell" style="text-align:left;"><strong>Lab</strong></th>
</tr>
@foreach ($myData as $data)
<tr>
    <td class="rh-table-listing_cell">{!! $data['system'] !!}</td>
    <td class="rh-table-listing_cell"><a href="./?aid={!! $data['link_to_id'] !!}">{!! $data['name'] !!}</a></td>
    <td class="rh-table-listing_cell">{!! $data['laboratory-name'] !!}</td>
</tr>
@endforeach
</table>
