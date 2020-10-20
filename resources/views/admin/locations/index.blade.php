@extends('layouts.app')

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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Lat</th>
                                    <th scope="col">Lon</th>
                                    <th scope="col">At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locations as $location)
                                <tr>
                                    <td>{{$location->latitude}}</td>
                                    <td>{{$location->longitude}}</td>
                                    <td>{{$location->created_at}}</td>
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