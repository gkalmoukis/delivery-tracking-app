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


                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
    @endsection