@extends('layouts.app')

@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('user'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New shift') }}</div>

                <div class="card-body">

                    <form action="{{route('new-shift')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="supermarket-select">{{__('Supermarket')}}</label>
                            <select class="form-control" id="supermarket-select" name="supermarket">
                                <option value="{{null}}">{{__('Select supermarket')}}</option>
                                @foreach ($supermarkets as $supermarket)
                                <option value="{{$supermarket->id}}">
                                    {{$supermarket->name}}-{{$supermarket->store}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="input-start-km">{{__('Start kilometers')}}</label>
                            <input type="number" class="form-control" id="input-km-start" name="start_kilometers"
                                placeholder="{{__('Add km')}}">
                        </div>

                        <div class="form-group">
                            <label for="input-plate">{{__('Van plate')}}</label>
                            <input type="text" class="form-control" id="input-plate" name="plate"
                                placeholder="{{__('Add plate')}}">
                        </div>


                        {{-- <div class="form-group">
                            <label for="input-end-km">{{__('End kilometers')}}</label>
                        <input type="number" class="form-control" id="input-end-start" name="end_kilometers"
                            placeholder="{{__('Add km')}}">
                </div> --}}

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="{{__('Create shift')}}">


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