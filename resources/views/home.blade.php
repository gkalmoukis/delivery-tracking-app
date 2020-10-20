@extends('layouts.app')

@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('admin'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    <a href="/admins/deliveries" class="btn btn-secondary btn-lg btn-block">{{__('All deliveries')}}</a>


                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">

                    <a href="{{ route('shifts-index') }}"
                        class="btn btn-secondary btn-lg btn-block">{{__('All Shifts')}}</a>

                    <a href="{{ route('new-shift-form') }}"
                        class="btn btn-primary btn-lg btn-block">{{__('New Shift')}}</a>


                </div>
            </div>
        </div>
    </div>
    @endif

</div>
@endsection