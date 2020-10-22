@extends('layouts.app')

@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('user'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pending Deliveries') }} <small id="status"></small></div>
                @if(session()->has('success'))
                <div class="alert alert-success m-1">
                    {{ session()->get('success') }}
                </div>
                @endif
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Client</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deliveries as $delivery)
                            <tr @if ($delivery->started_at && !$delivery->delivered_at) class="table-primary"
                                @elseif ($delivery->delivered_at) class="table-success"
                                @else class="table-warning"
                                @endif>
                                <td>{{$delivery->client}}</td>
                                <td>{{$delivery->address}}</td>
                                <td>{{$delivery->phone}}</td>
                                <td>
                                    @if (!$delivery->started_at)
                                    <a href="/deliveries/update-started-at/{{$delivery->id}}"
                                        class="btn btn-primary">{{__('Started')}}</a>
                                    @endif

                                    @if ($delivery->started_at)
                                    <a href="/deliveries/update-delivered-at/{{$delivery->id}}"
                                        class="btn btn-primary">{{__('Delivered')}}</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{ $deliveries->links('vendor.pagination.bootstrap-4') }}
                </div>


            </div>
        </div>
    </div>
    @else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Error') }}</div>

                <div class="card-body">
                    {{__('Not user')}}
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
@endsection

@section('page-script')

<script>
    let shiftId = {{$shift}}
    setInterval(function(){ getCurrentLocation(shiftId); }, 1000);

    function getCurrentLocation(shiftId) {

        const status = document.querySelector('#status');



        function success(position) {
            const latitude  = position.coords.latitude;
            const longitude = position.coords.longitude;

            status.textContent = `Last location update at ${new Date().toLocaleString()}`;

            $.ajax({
                type: "POST",
                url: `/api/location`,
                data: {
                    shift_id : shiftId,
                    latitude: latitude,
                    longitude : longitude

                },
                success: function() {
                    console.log('Ok')
                },
                error: function () {
                    console.log("error")
                },
                dataType: "json"
            });

        }

        function error() {
            status.textContent = 'Unable to retrieve your location';
        }

        if(!navigator.geolocation) {
            status.textContent = 'Geolocation is not supported by your browser';
        } else {
            status.textContent = 'Locating…';
            navigator.geolocation.getCurrentPosition(success, error);
        }

    }

</script>

@endsection
