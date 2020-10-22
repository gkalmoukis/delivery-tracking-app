@extends('layouts.app')

@section('content')
<div class="container">
    @if ( Auth::user()->hasRole('admin'))
    <div class="row justify-content-center mb-4">

    </div>
{{--    row     --}}
    <div class="row d-flex justify-content-between">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>
                <div class="card-body">

                        <div >
                            <canvas class="mb-1" id="myChart" width="400" height="150"></canvas>
                        </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <div> {{$shift->user->name}} <br> {{$shift->plate}} </div>

                        <div>{{$shift->user->created_at}} | {{$shift->ended_at ?? "Currently active"}}</div>
                        <div>{{$shift->start_kilometers}} | {{$shift->ended_at ?? "Currently active"}}</div>
                        <div>{{$shift->supermarket->name}} | {{$shift->supermarket->store}} {{__('Km')}}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('page-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script>
    let deliveries = {!! $shift->deliveries !!};
    const deliveriesDoughnutChart = {
        delivered : 0,
        started : 0,
        pending : 0
    };

    deliveries.forEach(element => {
        console.log(element)
        if (element.delivered_at != null){
            deliveriesDoughnutChart.delivered++
        }

        if (element.started_at != null && element.delivered_at == null){
            deliveriesDoughnutChart.started++
        }
    });

    deliveriesDoughnutChart.pending = deliveries.length - (deliveriesDoughnutChart.delivered + deliveriesDoughnutChart.started);

    console.log(deliveriesDoughnutChart);
    console.log(deliveries.length);
    let ctx = document.getElementById('myChart');
    let myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Delivered', 'Started', 'Pending'],
            datasets: [{
                label: '# of Votes',
                data: [deliveriesDoughnutChart.delivered,
                    deliveriesDoughnutChart.started,
                    deliveriesDoughnutChart.pending],
                backgroundColor: [
                    'rgb(39,255,0)',
                    'rgb(0,152,255)',
                    'rgb(255, 206, 86)',
                ],
                borderColor: [
                    'rgb(0,0,0)',
                    'rgb(0,0,0)',
                    'rgb(0,0,0)',

                ],
                borderWidth: 0.5
            }]
        },
        options: {

        }
    });
</script>
@endsection
