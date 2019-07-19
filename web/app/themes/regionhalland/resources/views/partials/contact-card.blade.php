
@php($myPerson = get_region_halland_acf_page_personer_enheter_person())
@php($myEnhet = get_region_halland_acf_page_personer_enheter_enhet())

@if($myPerson)
    @php($myPersonData = get_region_halland_api_personer_enheter(1, $myPerson, ""))
    @if($myPersonData['status'] == 1)
        <div class="rh-personal-info pt2 mb2">
            <div class="rh-box-info-alone pb2 mb2" style="border-bottom: 2px solid #004890;">
                <p><strong>{{ $myPersonData['firstname'] }} {{ $myPersonData['lastname'] }}</strong></p>
                <span class="rh-personal-info-text">{{ $myPersonData['jobtitle'] }}</span>
            </div>
        </div>
    @endif
@endif

@if($myEnhet)
    @php($myEnhetData = get_region_halland_api_personer_enheter(2, "", $myEnhet))
    @if($myEnhetData['status'] == 1)
        <div class="rh-unit-info pt2">

            <div class="mb2 pb2" style="border-bottom: 2px solid #004890;">
                <strong>
                    {{ $myEnhetData['enhet_name'] }}
                </strong>
            </div>

            <p class="rh-unit-info-text rh-unit-info-text-inline">
                <strong>
                    Telefontider:
                </strong>
                @foreach ($myEnhetData['enhet_telephones'] as $phones)
                    {{ $phones['landsnummer'] }} {{ $phones['riktnummer'] }} {{ $phones['telefonnummer'] }}<br>
            <ul>
                @foreach ($phones['telefontider'] as $tider)
                    <li>
                        {{ $tider['day'] }} {{ $tider['openingTime'] }} - {{ $tider['closingTime'] }}
                    </li>
                @endforeach
            </ul>
            @endforeach
            </p>
            <p class="rh-unit-info-text"><strong>Öppettider:</strong>
            <ul>
                @foreach ($myEnhetData['visiting_hours'] as $visiting)
                    <li>
                        {{ $visiting['day'] }} {{ $visiting['openingTime'] }} - {{ $visiting['closingTime'] }}
                    </li>
                @endforeach
            </ul>
            </p>
            <p class="rh-unit-info-text"><strong>Besöksadress: </strong>{{ $myEnhetData['address_street'] }}<br>
                {{ $myEnhetData['address_postcode'] }} {{ $myEnhetData['address_city'] }}<br>
            </p>
        </div>
    @endif
@endif