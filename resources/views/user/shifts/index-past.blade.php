@extends('layouts.app')

@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('user'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Shifts') }}</div>

                <div class="card-body">




                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Supermarket</th>
                                <th scope="col">Started at</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shifts as $shift)
                            <tr @if($shift->ended_at) class="table-secondary" @endif>
                                <th scope="row">{{$shift->id}}</th>
                                <td>{{$shift->supermarket->name}}-{{$shift->supermarket->store}} </td>
                                <td>{{$shift->created_at}}</td>
                                <td>



                                    <a href="/shifts/{{$shift->id}}" class="btn btn-primary pl-2">{{__('Details')}}</a>

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