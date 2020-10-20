@extends('layouts.app')

@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('admin'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Plate</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Started at</th>
                                    <th scope="col">Ended at</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shifts as $shift)

                                <tr>
                                    <td>{{$shift->plate}}</td>
                                    <td>{{$shift->user->name}}</td>
                                    <td>{{$shift->started_at}}</td>
                                    <td>{{$shift->started_at}}</td>


                                    <td>
                                        <a href="/locations/{{$shift->id}}"
                                            class="btn btn-primary">{{__('Show location')}}</a>
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