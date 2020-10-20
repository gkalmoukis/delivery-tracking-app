@extends('layouts.app')

@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('user'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pending Deliveries') }}</div>
                @if(session()->has('success'))
                <div class="alert alert-success">
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
                                        class="btn btn-primary pl-1">{{__('Started')}}</a>
                                    @endif

                                    <a href="/deliveries/update-delivered-at/{{$delivery->id}}"
                                        class="btn btn-primary">{{__('Delivered')}}</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>


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