@extends('consumer.profile.layout.master')
@section('extra-css')
    <style>
        .grey-color
        {
            color:grey;
        }
        .feedback-msg
        {
            text-align: justify;
        }
    </style>
@endsection
@section('main-content')
    <section id="basic-tabs-components">
        <div class="row">
            <div class="col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all" data-toggle="tab" href="#allTab" aria-controls="all" role="tab" aria-selected="true">Saved Garages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="bookings" data-toggle="tab" href="#bookingStat" aria-controls="bookings" role="tab" aria-selected="false">Bookings Statistics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account" data-toggle="tab" href="#feedbackLeft" aria-controls="account" role="tab" aria-selected="false">Feedback Left</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="allTab" aria-labelledby="all-tab" role="tabpanel">
                                    @foreach($garages as $data)
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <span class="font-weight-bold">{{ ucfirst($data->name) }}</span>
                                                        <div class="float-right pr-3 pl-1 pb-0">
                                                            @foreach ($data->garage_services as $gs)
                                                                <span><img src="{{ asset($gs->service->image) }}" width="16" alt="{{ $gs->service->name }}"></span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="row" style="margin: 0px 20px 10px  0px">
                                                    <div lass="col-md-12 col-12 pl-0 pt-0 text-left">
                                                        <div class="clearfix">
                                                            <span class="font-medium-3">
                                                                @for($i=1;$i<=5; $i++)
                                                                    <i class="fa fa-star font-medium-1 @if($i<=$data->reviews->avg('rating')) text-star-warning @endif"></i>
                                                                @endfor
                                                            </span> {{ $data->reviews->count() ?? '0' }} reviews
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 col-10 pl-0 pb-1 pt-1 text-left">
                                                        <p class="text-dark feedback-msg mb-0">
                                                            {{$data['address']}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-2 col-2 pr-0 mr-0">
                                                        <div class="clearfix">
                                                            <div class="dropdown dropleft float-right">
                                                                <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item delete-btn remove_garage" data-id="{{$data->id}}" href="javascript:void(0);">
                                                                        <div class="media">
                                                                            <div class="media-left" style="width: 25px;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                                            <div class="media-body">Remove</div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="pull-right">{{ $garages->links() }}</div>
                                </div>
                                <div class="tab-pane" id="bookingStat" aria-labelledby="booking-stat" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                           <div class="row avg-sessions pt-50">
                                                <div class="col-12 text-left">
                                                    <p class="mb-0">Completed: <span class="completed-count-info">{{ $graphConsumerBooking->completed_count }}</span></p>
                                                    <div class="progress progress-bar-primary mt-25">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="50" aria-valuemax="100" style="width:50%"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-left">
                                                    <p class="mb-0">Delayed: <span class="delayed-count-info">{{  $graphConsumerBooking->delayed_count }}</span></p>
                                                    <div class="progress progress-bar-warning mt-25">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="60" aria-valuemax="100" style="width:60%"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-left">
                                                    <p class="mb-0">Cancelled: <span class="cancelled-count-info">{{ $graphConsumerBooking->cancelled_count }}</span></p>
                                                    <div class="progress progress-bar-danger mt-25">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="70" aria-valuemax="100" style="width:70%"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-left">
                                                    <p class="mb-0">Reported: <span class="reported-count-info">{{  $graphConsumerBooking->reported_count }}</span></p>
                                                    <div class="progress progress-bar-success mt-25">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="90" aria-valuemax="100" style="width:90%"></div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <div class="col-md-12 col-12">
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between pb-0">
                                                        <h4 class="card-title"></h4>
                                                        <div class="dropdown chart-dropdown">
                                                            <button class="btn btn-sm border-0 dropdown-toggle p-0 booking-chart-btn" type="button" id="dropdownItem4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                @if(isset(request()->graph_duration))
                                                                    @if(request()->graph_duration=='1')
                                                                        Last 7 Days
                                                                    @elseif(request()->graph_duration=='2')
                                                                        Last 28 Days
                                                                    @elseif(request()->graph_duration=='3')
                                                                        Last Month
                                                                    @elseif(request()->graph_duration=='4')
                                                                        Last Year
                                                                    @endif
                                                                @else
                                                                    Last 7 Days
                                                                @endif
                                                                
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item duration_dropdown" data-type="1" data-duration="2">Last 7 Days</a>
                                                                <a class="dropdown-item duration_dropdown" data-type="1" data-duration="2">Last 28 Days</a>
                                                                <a class="dropdown-item duration_dropdown" data-type="1" data-duration="3">Last Month</a>
                                                                <a class="dropdown-item duration_dropdown" data-type="1" data-duration="4">Last Year</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body pt-0">
                                                            <div class="row">
                                                                <div>
                                                                    <h2 class="text-bold-700 mb-25 booking-total-count">{{ $graphConsumerBooking->data->count() ?? '0' }}</h2>
                                                                    <p class="text-bold-500 mb-75">Avg Bookings</p>
                                                                        <div class="col-sm-10 col-12 d-flex justify-content-center">
                                                                            <div id="graphConsumerBooking"></div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="row chart-info d-flex justify-content-between">
                                                <div class="col-12">
                                                    <div class="text-left">
                                                        <p class="mb-50">New Bookings</p>
                                                        <span class="font-large-1 new-bookings-count-info">{{ $circleConsumerBooking->total_bookings_count }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="text-left">
                                                        <p class="mb-50">Active Bookings</p>
                                                        <span class="font-large-1 active-bookings-count-info">{{ $circleConsumerBooking->active_bookings_count }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="text-left">
                                                        <p class="mb-50">Completed Bookings</p>
                                                        <span class="font-large-1 complete-bookings-count-info">{{ $circleConsumerBooking->completed_bookings_count }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-8 col-12">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between pb-0">
                                                    <h4 class="card-title">Bookings (<span class="new-bookings-count-info">{{ $circleConsumerBooking->total_bookings_count }}</span>)</h4>
                                                    <div class="dropdown chart-dropdown">
                                                        <button class="btn btn-sm border-0 dropdown-toggle p-0 completed-chart-btn" type="button" id="dropdownItem4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            @if(isset(request()->circle_duration))
                                                                @if(request()->circle_duration=='1')
                                                                    Last 7 Days
                                                                @elseif(request()->circle_duration=='2')
                                                                    Last 28 Days
                                                                @elseif(request()->circle_duration=='3')
                                                                    Last Month
                                                                @elseif(request()->circle_duration=='4')
                                                                    Last Year
                                                                @endif
                                                            @else
                                                                Last 7 Days
                                                            @endif
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item duration_dropdown" data-type="2" data-duration="1">Last 7 daus</a>
                                                            <a class="dropdown-item duration_dropdown" data-type="2" data-duration="2">Last 28 Days</a>
                                                            <a class="dropdown-item duration_dropdown" data-type="2" data-duration="3">Last Month</a>
                                                            <a class="dropdown-item duration_dropdown" data-type="2" data-duration="4">Last Year</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body pt-0">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-12 justify-content-center">
                                                                <div id="circleConsumerBooking"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="feedbackLeft" aria-labelledby="feedback-Left" role="tabpanel">
                                    @foreach($reviews_list as $review)
                                        <div class="media">
                                            
                                                <a class="align-self-start media-left @if($review->user_id==auth()->user()->id) mr-2 @else mr-4 @endif" href="#">
                                                    <img class="media-object img-xl rounded-circle @if($review->user_id==auth()->user()->id) d-block @else d-none @endif" src="{{asset('images/user.png')}}" alt="Generic placeholder image" />
                                                </a>
                                            <div class="media-body">
                                                @if($review->user_id==auth()->user()->id)
                                                    <div class="clearfix">
                                                        <div class="float-left">
                                                            <span class="font-weight-bold mb-0">{{auth()->user()->name}}</span> <span class="font-weight-bold text-star-warning mb-0"><i class="fa fa-star text-star-warning"></i> {{ $review->rating ?? '' }} </span>
                                                        </div>
                                                        <div class="float-right">
                                                            @foreach($review->booking->booking_services as $s)
                                                                <span><img src="{{asset($s->image)}}" width="16" alt="{{$s->name}}"></span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin: 10px 20px 10px  0px">
                                                        <p class="text-dark feedback-msg mb-0">
                                                            Booking ID: {{$review->booking_id}}
                                                        </p>
                                                    </div>
                                                    <div class="row" style="margin: 10px 20px 10px  0px">
                                                        <p class="text-dark feedback-msg mb-0">
                                                            {{$review->review ?? ''}}
                                                        </p>
                                                    </div>
                                                    <div class="row" style="margin: 10px 20px 10px  0px">
                                                        <p class="mt-0">
                                                            <small>{{$review->created_at->diffForHumans()}}</small>
                                                        </p>
                                                    </div>
                                                @else
                                                    <div class="media">
                                                        <a class="align-self-start media-left mr-2" href="#">
                                                            <img class="media-object img-xl rounded-circle" src="{{asset('images/user.png')}}" alt="Generic placeholder image" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="clearfix">
                                                                <div class="float-left">
                                                                    <span class="font-weight-bold">{{$review->booking->garage_profile_info->name}}'s Response</span> 
                                                                </div>
                                                                <div class="float-right">
                                                                    @foreach($review->booking->booking_services as $s)
                                                                        <span><img src="{{asset($s->image)}}" width="16" alt="{{$s->name}}"></span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin: 10px 20px 10px  0px">
                                                                <p class="text-dark feedback-msg mb-0">
                                                                    Booking ID: {{$review->booking_id}}
                                                                </p>
                                                            </div>
                                                            <div class="row" style="margin: 10px 20px 10px  0px">
                                                                <p class="text-dark feedback-msg mb-0">
                                                                    {{$review->review ?? ''}}
                                                                </p>
                                                            </div>
                                                            <div class="row" style="margin: 10px 20px 10px  0px">
                                                                <p class="mt-0">
                                                                    <small>{{$review->created_at->diffForHumans()}}</small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form class="filter_graph">
        <input type="hidden" name="filter" value="filter">
        <input type="hidden" class="graph_duration" name="graph_duration" value="{{ request()->graph_duration ?? '' }}">
        <input type="hidden" class="circle_duration" name="circle_duration" value="{{ request()->circle_duration ?? '' }}">
    </form>
@endsection

@section('extra-js')
<script src="{{asset('assets/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script>
    
    $(document).on("click",".remove_garage",function(e)
    {
        var garage_id=$(this).attr("data-id");
        e.preventDefault();
        $.ajax({
                type: "GET",
                url: "{{ route('consumer.profile.remove_garage') }}?garage_id="+garage_id,
                success: function (response) 
                {
                    toastr.success(response);
                    window.location.reload(true);
                }
            });
    });

    @if(isset(request()->filter))
        $("#bookings").addClass("active");
        $("#all").removeClass("active");
        $("#bookingStat").addClass("active");
        $("#allTab").removeClass("active");
        
    @endif

    $(document).on("click",".duration_dropdown",function(e){
        e.preventDefault();
        var type=$(this).attr('data-type');
        var duration=$(this).attr('data-duration');
        if(type=='1')
        {
            $(".graph_duration").val(duration);
        }
        if(type=='2')
        {
            $(".circle_duration").val(duration);
        }
        $('.filter_graph').submit();
    });

    graphConsumerBooking();
    circleConsumerBooking();

    function graphConsumerBooking()
    {
        var vlable=[
        <?php for($i = 0;$i < $graphConsumerBooking->limit;$i++): ?>
        <?php echo $graphConsumerBooking->data_array[$i]; ?>
        <?php if($i < ($graphConsumerBooking->limit-1)): ?>, <?php endif;endfor; ?>
        ];
        var target_id="#graphConsumerBooking";
        var $primary = '#7367F0';
        var $danger = '#EA5455';
        var $warning = '#FF9F43';
        var $info = '#0DCCE1';
        var $primary_light = '#8F80F9';
        var $warning_light = '#FFC085';
        var $danger_light = '#f29292';
        var $info_light = '#1edec5';
        var $strok_color = '#b9c3cd';
        var $label_color = '#e7eef7';
        var $white = '#fff';

        var sessionChartoptions = {
            chart: {
                type: 'bar',
                height: 200,
                sparkline: { enabled: true },
                toolbar: { show: false },
            },
            states: {
                hover: {
                    filter: 'none'
                }
            },
            colors: [$primary, $primary, $primary, $primary, $primary, $primary],
            series: [{
                name: 'Bookings',
                data: vlable
            }],
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            },

            plotOptions: {
                bar: {
                    columnWidth: '45%',
                    distributed: true,
                    endingShape: 'rounded'
                }
            },
            tooltip: {
                x: { show: false }
            },
            xaxis: {
                type: 'numeric',
            }
        }

        var sessionChart = new ApexCharts(
            document.querySelector(target_id),
            sessionChartoptions
        );

        sessionChart.render();
    }

    function circleConsumerBooking()
    {
        var target_id="#circleConsumerBooking";
        var $primary = '#7367F0';
        var $danger = '#EA5455';
        var $warning = '#FF9F43';
        var $info = '#0DCCE1';
        var $primary_light = '#8F80F9';
        var $warning_light = '#FFC085';
        var $danger_light = '#f29292';
        var $info_light = '#1edec5';
        var $strok_color = '#b9c3cd';
        var $label_color = '#e7eef7';
        var $white = '#fff';

                   // Support Tracker Chart starts
        // -----------------------------

        var supportChartoptions = {
            chart: {
                height: 270,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    size: 150,
                    startAngle: -150,
                    endAngle: 150,
                    offsetY: 20,
                    hollow: {
                        size: '65%',
                    },
                    track: {
                        background: $white,
                        strokeWidth: '100%',

                    },
                    dataLabels: {
                        value: {
                            offsetY: 30,
                            color: '#99a2ac',
                            fontSize: '2rem'
                        }
                    }
                },
            },
            colors: [$danger],
            fill: {
                type: 'gradient',
                gradient: {
                    // enabled: true,
                    shade: 'dark',
                    type: 'horizontal',
                    shadeIntensity: 0.5,
                    gradientToColors: [$primary],
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100]
                },
            },
            stroke: {
                dashArray: 8
            },
            series: ['{{ $circleConsumerBooking->percent_complete }}'],
            labels: ["Completed"],

        }

        var supportChart = new ApexCharts(
            document.querySelector(target_id),
            supportChartoptions
        );

        supportChart.render();

        // Support Tracker Chart ends
    }


</script>
@endsection