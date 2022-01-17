@extends('Admin.layouts.master')
@section('title', 'Dashboard')
@section('extras-css')
    <style>
        #statistics-card p
        {
            color: black !important;
        }
    </style>
@endsection
@section('content')

    <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-3">
                    <div class="page-heading">
                        <h3>Dashboard</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-tabs-components">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h4 class="card-title">NOTIFICATIONS</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="all" data-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true">All</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="bookings" data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false">Bookings</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="consumers" data-toggle="tab" href="#dropdown31" aria-controls="about" role="tab" aria-selected="false">Consumers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="garages" data-toggle="tab" href="#about" aria-controls="about" role="tab" aria-selected="false">Garages</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">

                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @foreach(auth()->user()->unreadNotifications as $notification)
                                                        <tr>
                                                            <td style="width: 80px;">{{ date('d M', strtotime($notification->created_at)) }}</td>
                                                            <td>{{ $notification->data['data'] }}</td>
                                                            <td class="text-right">{{ $notification->created_at->diffForHumans() }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="text-center">
                                                    <a href="{{ route('admin.notifications') }}">See all</a>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @foreach(auth()->user()->unreadNotifications as $notification)
                                                        <tr>
                                                            <td style="width: 80px;">{{ date('d M', strtotime($notification->created_at)) }}</td>
                                                            <td>{{ $notification->data['data'] }}</td>
                                                            <td class="text-right">{{ $notification->created_at->diffForHumans() }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="text-center">
                                                    <a href="{{ route('admin.notifications') }}">See all</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="dropdown31" role="tabpanel" aria-labelledby="dropdown31-tab" aria-expanded="false">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @foreach(auth()->user()->unreadNotifications as $notification)
                                                        <tr>
                                                            <td style="width: 80px;">{{ date('d M', strtotime($notification->created_at)) }}</td>
                                                            <td>{{ $notification->data['data'] }}</td>
                                                            <td class="text-right">{{ $notification->created_at->diffForHumans() }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="text-center">
                                                    <a href="{{ route('admin.notifications') }}">See all</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="dropdown32" role="tabpanel" aria-labelledby="dropdown32-tab" aria-expanded="false">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @foreach(auth()->user()->unreadNotifications as $notification)
                                                        <tr>
                                                            <td style="width: 80px;">{{ date('d M', strtotime($notification->created_at)) }}</td>
                                                            <td>{{ $notification->data['data'] }}</td>
                                                            <td class="text-right">{{ $notification->created_at->diffForHumans() }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="text-center">
                                                    <a href="{{ route('admin.notifications') }}">See all</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="about" aria-labelledby="about-tab" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        @foreach(auth()->user()->unreadNotifications as $notification)
                                                        <tr>
                                                            <td style="width: 80px;">{{ date('d M', strtotime($notification->created_at)) }}</td>
                                                            <td>{{ $notification->data['data'] }}</td>
                                                            <td class="text-right">{{ $notification->created_at->diffForHumans() }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="text-center">
                                                    <a href="#">See all</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="statistics-card">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{route('admin.consumer')}}">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="fa fa-users text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $consumer_count }}</h2>
                                    <p class="mb-0">Consumers</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-1k"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{route('admin.garage.overview')}}">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-success p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="fa fa-car font-medium-5" style="color: #A9A2F6;"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $garage_count }}</h2>
                                    <p class="mb-0">Garages</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-2k"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{route('admin.garage.applications')}}">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-danger p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-edit font-medium-5" style="color: #7367F0;"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $application_count }}</h2>
                                    <p class="mb-0">New Applications</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-3k"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="javascript:void(0);">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-disc text-warning font-medium-5" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $vehicle_count }}</h2>
                                    <p class="mb-0">Total Vehicles</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-4k"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{route('admin.booking')}}">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-calendar text-success font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $complete_booking_count }}</h2>
                                    <p class="mb-0">Completed Bookings</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-5k"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{route('admin.booking')}}">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-success p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-bar-chart font-medium-5" style="color: #FADA5E;"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $in_progress_booking_count }}</h2>
                                    <p class="mb-0">Bookings In Progress</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-6k"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{route('admin.booking')}}">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-danger p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="fa fa-hourglass-end font-medium-5" style="color: #ffc085;" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $pending_booking_count }}</h2>
                                    <p class="mb-0">Bookings Pending</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-7k"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <a href="{{route('admin.booking')}}">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-danger p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="fa fa-ban font-medium-5" style="color: #828282;" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $cancel_booking_count }}</h2>
                                    <p class="mb-0">Bookings Cancelled</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-8k"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Media Alignment start -->
            <section id="media-alignment">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">RECENT ORDER ACTIVITIES</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media-list media-bordered">
                                        <div class="media">
                                            <a class="align-self-start media-left" href="#">
                                                <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" height="64" width="64" />
                                            </a>
                                            <div class="media-body">
                                                <h5 class="media-heading">John Doe</h5>
                                                <p class="mb-0">
                                                    John Doe has posted 4 images to booking <a href="#">GB1265843</a>
                                                </p>
                                                <div class="row">
                                                    <div style="position:relative;">
                                                        <img src="{{asset('assets/app-assets/images/pages/search-result.jpg')}}" alt="Generic placeholder image" height="125" width="200" style="margin: 20px 20px 20px 10px" />
                                                        <a href="#"><span style="position: absolute; bottom: 30px; right: 30px; font-size: 30px;"><i class="fa fa-download" aria-hidden="true"></i></span></a>
                                                    </div>
                                                    <div style="position:relative;">
                                                        <img src="{{asset('assets/app-assets/images/pages/search-result.jpg')}}" alt="Generic placeholder image" height="125" width="200" style="margin: 20px 20px 20px 10px" />
                                                        <a href="#"><span style="position: absolute; bottom: 30px; right: 30px; font-size: 30px;"><i class="fa fa-download" aria-hidden="true"></i></span></a>
                                                    </div>
                                                    <div style="position:relative;">
                                                        <img src="{{asset('assets/app-assets/images/pages/search-result.jpg')}}" alt="Generic placeholder image" height="125" width="200" style="margin: 20px 20px 20px 10px" />
                                                        <a href="#"><span style="position: absolute; bottom: 30px; right: 30px; font-size: 30px;"><i class="fa fa-download" aria-hidden="true"></i></span></a>
                                                    </div>
                                                    <div style="position:relative;">
                                                        <img src="{{asset('assets/app-assets/images/pages/search-result.jpg')}}" alt="Generic placeholder image" height="125" width="200" style="margin: 20px 20px 20px 10px" />
                                                        <a href="#"> <span style="position: absolute; bottom: 30px; right: 30px; font-size: 30px;"><i class="fa fa-download" aria-hidden="true"></i></span></a>
                                                    </div>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        {{date('d M')}}
                                                    </div>
                                                    <div class="float-right">
                                                        {{ now()->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="align-self-start media-left" href="#">
                                                <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" />
                                            </a>
                                            <div class="media-body">
                                                <h5 class="media-heading">Delta Motorworks</h5>
                                                <div class="row" style="margin: 20px 20px 20px  0px">
                                                    <p class="mb-0">
                                                        Delta Motorworks has started the order <a href="#">GB1265843</a>
                                                    </p>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        {{date('d M')}}
                                                    </div>
                                                    <div class="float-right">
                                                        {{ now()->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a class="align-self-start media-left" href="#">
                                                <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-16.jpg')}}" alt="Generic placeholder image" height="64" width="64" />
                                            </a>
                                            <div class="media-body">
                                                <h5 class="media-heading">John Doe</h5>
                                                <div class="row" style="margin: 20px 20px 20px 0px">
                                                    <p class="mb-0">
                                                        John Doe refused to cancel the order <a href="#">GB1265843</a>
                                                    </p>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        {{date('d M')}}
                                                    </div>
                                                    <div class="float-right">
                                                        {{ now()->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <a href="{{ route('admin.activities') }}">See all</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Media Alignment end -->
        </div>
    </div>
</div>

@endsection
@section("extra-js")
<script>
    loadConsumerCountChart();
    loadGarageCountChart();
    loadNewAppCountChart();
    loadCompBookingCountChart();
    loadInProgressCountChart();
    loadPendingBookingCountChart();
    loadCancelBookingCountChart();
    loadVehiclesCountChart();

    function loadConsumerCountChart()
    {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.consumer_count_chart') }}",
            success: function (response) {
                $('#line-area-chart-1k').html(response);
            }
        });
    }

    function loadGarageCountChart()
    {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.garage_count_chart') }}",
            success: function (response) {
                $('#line-area-chart-2k').html(response);
            }
        });
    }

    function loadNewAppCountChart()
    {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.new_app_count_chart') }}",
            success: function (response) {
                $('#line-area-chart-3k').html(response);
            }
        });
    }

    function loadCompBookingCountChart()
    {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.comp_booking_count_chart') }}",
            success: function (response) {
                $('#line-area-chart-5k').html(response);
            }
        });
    }

    function loadInProgressCountChart()
    {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.in_progress_count_chart') }}",
            success: function (response) {
                $('#line-area-chart-6k').html(response);
            }
        });
    }

    function loadPendingBookingCountChart()
    {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.pending_count_chart') }}",
            success: function (response) {
                $('#line-area-chart-7k').html(response);
            }
        });
    }

    function loadCancelBookingCountChart()
    {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.cancel_count_chart') }}",
            success: function (response) {
                $('#line-area-chart-8k').html(response);
            }
        });
    }

    function loadVehiclesCountChart()
    {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.vehicles_count_chart') }}",
            success: function (response) {
                $('#line-area-chart-4k').html(response);
            }
        });
    }


</script>
@endsection
