@extends('garage.layouts.master')
@section('title', 'Statistics')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endsection
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-3">
            <div class="page-heading">
                <h3 class="float-left">Statistics</h3>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <span class="feather-icon select-none relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home h-5 w-5 mb-1 stroke-current text-primary">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Statistics
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card bg-analytics text-white">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <img src="{{ asset('assets/app-assets/images/elements/decore-left.png') }}" class="img-left" alt="card-img-left">
                            <img src="{{ asset('assets/app-assets/images/elements/decore-right.png') }}" class="img-right" alt="card-img-right">
                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                <div class="avatar-content">
                                    <i class="feather icon-award white font-large-1"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-2 text-white">Congratulations {{getFirstName(garage()->user->name)}},</h1>
                                <p class="m-auto w-75">You have done <strong>57.6%</strong> more sales today. Check your new badge in your profile.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-users text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{ garageFollowers(garage()->id) }}</h2>
                        <p class="mb-0">Followers</p>
                    </div>
                    <div class="card-content">
                        <div id="subscribe-gain-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-warning p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-package text-warning font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{$complete_count}}</h2>
                        <p class="mb-0">Bookings Complete</p>
                    </div>
                    <div class="card-content">
                        <div id="orders-received-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row pb-50">
                                <div class="col-lg-6 col-12 d-flex justify-content-between flex-column order-lg-1 order-2 mt-lg-0 mt-2">
                                    <div>
                                        <h2 class="text-bold-700 mb-25">{{$total_views}}</h2>
                                        <p class="text-bold-500 mb-75">Profile Views</p>
                                        <h5 class="font-medium-2">
                                            <span class="text-success">+5.2% </span>
                                            <span>vs last 7 days</span>
                                        </h5>
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-primary shadow">View Details <i class="feather icon-chevrons-right"></i></a>
                                </div>
                                <div class="col-lg-6 col-12 d-flex justify-content-between flex-column text-right order-lg-2 order-1">
                                    <div class="dropdown chart-dropdown">
                                        <button class="btn btn-sm border-0 dropdown-toggle p-0 profile-chart-btn" type="button" id="dropdownItem5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Last 7 Days
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right dropdwown-profile-chart" aria-labelledby="dropdownItem5">
                                            <a class="dropdown-item profile-last-twenty-eight" href="javascript:void(0);">Last 28 Days</a>
                                            <a class="dropdown-item profile-last-month" href="javascript:void(0);">Last Month</a>
                                            <a class="dropdown-item profile-last-year" href="javascript:void(0);">Last Year</a>
                                        </div>
                                    </div>
                                    <div id="avg-session-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <h4 class="card-title">Booking Statistics</h4>
                        <div class="dropdown chart-dropdown">
                            <button class="btn btn-sm border-0 dropdown-toggle p-0 stat-chart-btn" type="button" id="dropdownItem4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Last 7 Days
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item stat-last-twenty-eight">Last 28 Days</a>
                                <a class="dropdown-item stat-last-month">Last Month</a>
                                <a class="dropdown-item stat-last-year">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                                    <h1 class="font-large-2 text-bold-700 mt-2 mb-0 total_bookings_count">{{$total_count}}</h1>
                                    <small>Bookings</small>
                                </div>
                                <div class="col-sm-10 col-12 d-flex justify-content-center">
                                    <div id="support-tracker-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4>Promotions History</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="dropdown sort-dropdown mb-1 mb-sm-0">
                                <button class="btn btn-white filter-btn dropdown-toggle border text-dark waves-effect waves-light" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1 - <span class="table_length">10</span> of <span class="table_count"></span></button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(118px, 49px, 0px);">
                                    <a class="dropdown-item custom-filter" data-value="10" href="javascript:void(0);">10</a>
                                    <a class="dropdown-item custom-filter" data-value="25" href="javascript:void(0);">25</a>
                                    <a class="dropdown-item custom-filter" data-value="50" href="javascript:void(0);">50</a>
                                    <a class="dropdown-item custom-filter" data-value="100" href="javascript:void(0);">100</a>
                                </div>
                            </div>
                            <div class="table-responsive mt-1">
                                <table class="table zero-configuration table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order No</th>
                                            <th>Plan</th>
                                            <th>Days</th>
                                            <th>Amount</th>
                                            <th>Start Date</th>
                                            <th>Expiry Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advertisings as $item)
                                            <tr>
                                                <td>#{{ $item->order_no }}</td>
                                                <td>{{ ucfirst($item->plan) }}</td>
                                                <td>{{ $item->days }}</td>
                                                <td>${{ $item->amount }}</td>
                                                <td>{{ $item->start_date }}</td>
                                                <td>{{ $item->end_date }}</td>
                                                <td>
                                                    @if ($item->status === "ended")
                                                        <div class="chip bg-warning">
                                                            <div class="chip-body">
                                                                <div class="chip-text text-white">Ended</div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="chip bg-success">
                                                            <div class="chip-body">
                                                                <div class="chip-text text-white">Active</div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@section('js')

<script src="{{asset('assets/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/extensions/tether.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.datetimepicker').datepicker();
    });

    $(document).ready(function () {
        $(".profile-last-twenty-eight").on("click",function(){
            $.ajax({
                type: "GET",
                url: "{{ route('garage.statistics.profile_views') }}?chart=last_twenty_eight",
                success: function (response) {
                    $('#avg-session-chart').html(response);
                    $('.profile-chart-btn').html("Last 28 Days");

                }
            });
        });

        $(".profile-last-month").on("click",function(){
            $.ajax({
                type: "GET",
                url: "{{ route('garage.statistics.profile_views') }}?chart=last_month",
                success: function (response) {
                    $('#avg-session-chart').html(response);
                    $('.profile-chart-btn').html("Last Month");
                }
            });
        });

        $(".profile-last-year").on("click",function(){
            $.ajax({
                type: "GET",
                url: "{{ route('garage.statistics.profile_views') }}?chart=last_year",
                success: function (response) {
                    $('#avg-session-chart').html(response);
                    $('.profile-chart-btn').html("Last Year");
                }
            });
        });

        $(".stat-last-month").on("click",function(){
            $.ajax({
                type: "GET",
                url: "{{ route('garage.statistics.booking_statistics') }}?chart=last_month",
                success: function (response) {
                    $('#support-tracker-chart').html(response);
                    $('.stat-chart-btn').html("Last Month");

                }
            });
        });

        $(".stat-last-twenty-eight").on("click",function(){
            $.ajax({
                type: "GET",
                url: "{{ route('garage.statistics.booking_statistics') }}?chart=last_twenty_eight",
                success: function (response) {
                    $('#support-tracker-chart').html(response);
                    $('.stat-chart-btn').html("Last 28 Days");

                }
            });
        });

        $(".stat-last-year").on("click",function(){
            $.ajax({
                type: "GET",
                url: "{{ route('garage.statistics.booking_statistics') }}?chart=last_year",
                success: function (response) {
                    $('#support-tracker-chart').html(response);
                    $('.stat-chart-btn').html("Last Year");

                }
            });
        });

    });

    loadCompleteBookingsCharts();
    loadProfileViewsChart();
    loadBookingStatisticsChart();
    loadFollowersChart();


    function loadBookingStatisticsChart() {
        $.ajax({
            type: "GET",
            url: "{{ route('garage.statistics.booking_statistics') }}",
            success: function (response) {
                $('#support-tracker-chart').html(response);
            }
        });
    }

    function loadCompleteBookingsCharts() {
        $.ajax({
            type: "GET",
            url: "{{ route('garage.statistics.complete_booking') }}",
            success: function (response) {
                $('#orders-received-chart').html(response);
            }
        });
    }

    function loadFollowersChart() {
        $.ajax({
            type: "GET",
            url: "{{ route('garage.statistics.followers') }}",
            success: function (response) {
                $('#subscribe-gain-chart').html(response);
            }
        });
    }

    function loadProfileViewsChart() {
        $.ajax({
            type: "GET",
            url: "{{ route('garage.statistics.profile_views') }}",
            success: function (response) {
                $('#avg-session-chart').html(response);
            }
        });
    }
</script>
@endsection
