@extends('layouts.app')

@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('user'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Shifts') }}</div>

                <div class="card-body">


                    {{ dump($shift)}}


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