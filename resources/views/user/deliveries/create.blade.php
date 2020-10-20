@extends('layouts.app')

@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('user'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New delivery') }}</div>

                <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif


                    <form action="/deliveries" method="POST">
                        @csrf

                        <input type="hidden" name="shift_id" value="{{$shift->id}}">

                        <div class="form-group">
                            <label for="input-client">{{__('Client')}}</label>
                            <input type="text" class="form-control" id="input-client" name="client"
                                placeholder="{{__('Add client')}}">
                        </div>

                        <div class="form-group">
                            <label for="input-phone">{{__('Client phone')}}</label>
                            <input type="number" class="form-control" id="input-phone" name="phone"
                                placeholder="{{__('Add phone')}}">
                        </div>

                        <div class="form-group">
                            <label for="input-appartment">{{__('Client appartment')}}</label>
                            <input type="text" class="form-control" id="input-appartment" name="appartment"
                                placeholder="{{__('Add appartment')}}">
                        </div>
                        <div class="form-group">
                            <label for="input-address">{{__('Client address')}}</label>
                            <input type="text" class="form-control" id="input-address" name="address"
                                placeholder="{{__('Add address')}}">
                        </div>

                        <div class="form-group">
                            <label for="input-notes">{{__('Client notes')}}</label>
                            <textarea class="form-control" id="input-notes" name="notes"
                                placeholder="{{__('Add notes')}}"></textarea>
                        </div>


                        {{-- <div class="form-group">
                            <label for="input-end-km">{{__('End kilometers')}}</label>
                        <input type="number" class="form-control" id="input-end-start" name="end_kilometers"
                            placeholder="{{__('Add km')}}">
                </div> --}}

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="{{__('Save delivery')}}">


                </form>

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