@extends('layouts.app')

@section('page-style')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzqBuAe2rJ3L-VodjTpDn5GlhJ6FCGYOo&callback=initMap&libraries=&v=weekly"
    defer></script>
@endsection


@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('admin'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }} <small>{{__('Submited locations')}}
                        {{$locations->count()}}</small></div>

                <div class="card-body">

                    <div class="card-body">






                        <div id="map" style="width: 100%; height:500px"></div>

                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>

    @endsection

    @section('page-script')
    <script>
        function initMap() {

            let lat =  {{ $last->latitude }};
            let lng = {{ $last->longitude}};

            const myLatLng = {
                lat: lat,
                lng: lng
            };
            const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 18,
            center: myLatLng,
            });
            new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello World!",
            });
        }

    </script>
    @endsection
