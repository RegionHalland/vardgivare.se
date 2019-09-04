@extends('layouts.app')

@section('content')
@include('partials.top-navigation')

<div class="clearfix rh-container--auto">
    <div class="rh-vg__home-main">
        <div class="col col-12 lg-col-4">
            <div class="rh-container-px rh-vg__home-left-group">
                @include('partials.front-page-info')
                @include('partials.front-page-news')
            </div>
        </div>

        <div class="col col-12 lg-col-8">
            @include('partials.front-page-blurbs')
        </div>
    </div>
</div>

@endsection