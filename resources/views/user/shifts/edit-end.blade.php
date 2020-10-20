@extends('layouts.app')

@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('user'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New shift') }}</div>

                <div class="card-body">

                    <form action="/shifts/end" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$shift->id}}">
                        <div class="form-group">
                            <label for="input-end-km">{{__('End kilometers')}}</label>
                            <input type="number" class="form-control" id="input-km-end" name="end_kilometers"
                                placeholder="{{__('Add km')}}">
                        </div>


                        {{-- <div class="form-group">
                            <label for="input-end-km">{{__('End kilometers')}}</label>
                        <input type="number" class="form-control" id="input-end-start" name="end_kilometers"
                            placeholder="{{__('Add km')}}">
                </div> --}}

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="{{__('End Shift')}}">


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