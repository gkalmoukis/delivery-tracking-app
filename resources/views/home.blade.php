@extends('layouts.app')

@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('admin'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    <a href="/admins/active-shifts"
                        class="btn btn-secondary btn-lg btn-block">{{__('Active shifts')}}</a>

                    <a href="/admins/past-shifts" class="btn btn-secondary btn-lg btn-block">{{__('Past shifts')}}</a>


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

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mb-1" role="alert">
                        {{$error}}
                    </div>
                    @endforeach
                    @endif


                    <a href="{{ route('new-shift-form') }}"
                        class="btn btn-primary btn-lg btn-block">{{__('New Shift')}}</a>

                    <a href="{{ route('shifts-index') }}"
                        class="btn btn-secondary btn-lg btn-block">{{__('Active shift')}}</a>

                    <a href="{{ route('past-index') }}"
                        class="btn btn-primary btn-lg btn-block">{{__('Past shifts')}}</a>




                </div>
            </div>
        </div>
    </div>
    @endif

</div>
@endsection
