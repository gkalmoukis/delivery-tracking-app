@extends('layouts.app')

@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('admin'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Plate</th>
                                <th scope="col">Shift</th>
                                <th scope="col">Address</th>
                                <th scope="col">Client</th>
                                <th scope="col">Started at</th>
                                <th scope="col">Delivered at</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deliveries as $delivery)

                            <tr>
                                <td>{{ $delivery->shift->user->name}}</td>
                                <td>{{$delivery->shift->plate}}</td>
                                <td>{{$delivery->shift->created_at}}</td>
                                <td>{{$delivery->address}}</td>
                                <td>{{$delivery->client}}</td>
                                <td>{{$delivery->shift->started_at}} </td>
                                <td>{{$delivery->shift->ended_at}} </td>
                                <td>asdad</td>

                                <td>
                                    <a href="" class="btn btn-primary">{{__('Show map')}}</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @endif

</div>
@endsection