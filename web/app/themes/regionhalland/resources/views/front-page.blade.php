@extends('layouts.app')

@section('content')
    @include('partials.top-navigation')

    <div class="clearfix rh-container--auto rh-container-px rh-vg__home-page__main-content">
        <div class="col col-12 md-col-4">
            @include('partials.front-page-info')
            @include('partials.front-page-news')
        </div>

        <div class="col col-12 md-col-8">
            @include('partials.front-page-blurbs')
        </div>
    </div>

@endsection