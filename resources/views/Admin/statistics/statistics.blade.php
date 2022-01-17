@extends('Admin.layouts.master')
@section('title', 'Statistics')
@section('extras-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endsection
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="row">
                <div class="col-md-8 col-sm-12 mb-3">
                    <div class="page-heading">
                        <h3>Statistics</h3>
                        <input type="hidden" id="stop" value="true">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Search name, email, phone etc">
                        <div class="input-group-append">
                          <button type="button"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <section>
                <div class="row match-height">
                    <div class="col-lg-4 col-md-6 col-12 text-center">
                        <div class="content-header">
                            <div class="page-heading">
                                <h3>Total Website Visits</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="row">
                            <div class="col-12 m-auto">
                                <div class="datetimepicker-div float-right">
                                    <div class='input-group date datetimepicker'>
                                        <input type='text' class="form-control report-datepicker" data="visitors_chart" data-id="#visits-chart">
                                        <span class="input-group-append calendar-btn">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card justify-content-center text-center">
                            <h1 class="text-bold-600" style="font-size: 3rem;">
                                <span>{{ $total_visitors }}</span>
                            </h1>
                            <p class="text-bold-600"> Visits</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div id="visits-chart" class="height-250"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row match-height">
                    <div class="col-lg-4 col-md-6 col-12 text-center">
                        <div class="content-header">
                            <div class="page-heading" id="updated_visitors">
                                <h3>Newly registered
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="row">
                            <div class="col-6">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active consumer_tab" id="all" data-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true">Consumer</a>
                                        <input type="hidden" id="register_tab" value="#consumer-chart">
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link garage_tab" id="bookings" data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false">Garage</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6 m-auto">
                                <div class="datetimepicker-div float-right">
                                    <div class='input-group date datetimepicker'>
                                        <input type='text' class="form-control report-datepicker" id="register_date" data="register_chart" data-id="#consumer-chart">
                                        <span class="input-group-append calendar-btn">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card justify-content-center text-center">
                            <h1 class="text-bold-600" style="font-size: 3rem;">
                                <span>{{$total_registered}}</span>
                            </h1>
                            <p class="text-bold-600"> Users</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div id="consumer-chart" class="height-250"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div id="garage-chart" class="height-250"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row match-height">
                    <div class="col-lg-4 col-md-6 col-12 text-center">
                        <div class="content-header">
                            <div class="page-heading">
                                <h3>Cities</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="row">
                            <div class="col-12 m-auto">
                                <div class="datetimepicker-div float-right">
                                    <div class='input-group date datetimepicker'>
                                        <input type='text' class="form-control">
                                        <span class="input-group-append calendar-btn">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card justify-content-center text-center">
                            <h1 class="text-bold-600" style="font-size: 3rem;">
                                <span>{{$total_garages}}</span>
                            </h1>
                            <p class="text-bold-600"> Garages</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div id="cities-chart" class="height-250"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row match-height">
                    <div class="col-lg-4 col-md-6 col-12 text-center">
                        <div class="content-header">
                            <div class="page-heading">
                                <h3>Advertising</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="row">
                            <div class="col-12 m-auto">
                                <div class="datetimepicker-div float-right">
                                    <div class='input-group date datetimepicker'>
                                        <input type='text' class="form-control report-datepicker" data="ads_chart" data-id="#ads-chart">
                                        <span class="input-group-append calendar-btn">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card justify-content-center text-center">
                            <h1 class="text-bold-600" style="font-size: 3rem;">
                                <span>{{ $advertisement_list->count() }}</span>
                            </h1>
                            <p class="text-bold-600"> Ads</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div id="ads-chart" class="height-250"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
            <!-- Dashboard Ecommerce ends -->
            <!-- Table Hover Animation start -->
            <div class="row" id="basic-datatable">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="dropdown sort-dropdown mb-1 mb-sm-0">
                                    <button class="btn btn-white filter-btn dropdown-toggle border text-dark waves-effect waves-light" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1 - <span class="table_length">10</span> of <span class="table_count"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(118px, 49px, 0px);">
                                        <a class="dropdown-item custom-filter" data-value="10" href="#">10</a>
                                        <a class="dropdown-item custom-filter" data-value="25" href="#">25</a>
                                        <a class="dropdown-item custom-filter" data-value="50" href="#">50</a>
                                        <a class="dropdown-item custom-filter" data-value="100" href="#">100</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table zero-configuration table-hover">
                                        <thead>
                                            <tr>
                                                <th>Date Purchased</th>
                                                <th>Type</th>
                                                <th>Plan</th>
                                                <th>Garage Name</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($advertisement_list as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->created_at->format('d-m-Y') }}
                                                    </td>
                                                    <td>{{ ucfirst($item->plan) }}</td>
                                                    <td>{{ $item->days }} Days plan</td>
                                                    <td>{{ $item->garage->name }}</td>
                                                    <td>{{ ucfirst($item->status) }}</td>
                                                    <td><span>$</span>{{ $item->amount }}</td>
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
            <!-- Table head options end -->
        </div>
    </div>
</div>

{{-- {{dd($json_visitors)}} --}}
@endsection
@section('extra-js')

<script src="{{asset('assets/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
{{-- <script src="{{asset('assets/app-assets/js/scripts/charts/chart-apex.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $('.datetimepicker').datepicker();
        $(".report-datepicker").on('change',function(){
            var chart=$(this).attr('data');
            var target_id=$(this).attr('data-id');
            if(chart=="register_chart"){
                var target_id=$("#register_tab").val();
            }
            var url_target_id = target_id.split("#");
            url_target_id=url_target_id[1];
            var datee=$(this).val();
            $.ajax({
                    type: "GET",
                    url: "{{ route('admin.statistics.selected_date') }}?chart="+chart+"&datee="+datee+"&target_id="+url_target_id,
                    success: function (response) {
                        // alert(response);
                        $(target_id).html(response);
                        }
                });
            });
        });

        $(".garage_tab").on('click',function(){
            $("#register_tab").val("#garage-chart");
            $("#register_date").val("");
        });
        $(".consumer_tab").on('click',function(){
            $("#register_tab").val("#consumer-chart");
            $("#register_date").val("");
        });

</script>
<script>
    // Visitors Chart
    var visitors_lable = [
        <?php for($i = 0;$i < $limit;$i++): ?>
            "<?php echo $month_names[$i]; ?>"
        <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
    ];

    var visitors_vlable=[
        <?php for($i = 0;$i < $limit;$i++): ?>
            <?php echo count($visitors->where('month' , $i)); ?>
        <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
    ];
    showCharts("#visits-chart",250,"Total Website Visits",visitors_lable,visitors_vlable);

    // Newly Registered Consumers Chart
    var consumers_lable = [
        <?php for($i = 0;$i < $limit;$i++): ?>
            "<?php echo $month_names[$i]; ?>"
        <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
    ];

    var consumers_vlable=[
        <?php for($i = 0;$i < $limit;$i++): ?>
            <?php echo count($consumers->where('month' , $i)); ?>
        <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
    ];
    showCharts("#consumer-chart",250,"Total Newly Registered Consumers",consumers_lable,consumers_vlable);

    // Newly Registered Gargages Chart
    var garages_lable = [
        <?php for($i = 0; $i < $limit; $i++): ?>
            "<?php echo $month_names[$i]; ?>"
        <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
    ];

    var garages_vlable=[
        <?php for($i = 0; $i < $limit; $i++): ?>
            <?php echo count($garages->where('month' , $i)); ?>
        <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
    ];

    // Advertisements_Active_Listed_Chart();
    var advertisements_lable = [
        <?php for($i = 0; $i < $limit; $i++): ?>
            "<?php echo $month_names[$i]; ?>"
        <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
    ];

    var advertisements_vlable=[
        <?php for($i = 0; $i < $limit; $i++): ?>
            <?php echo count($advertisements->where('month' , $i)); ?>
        <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
    ];

    
    showCharts("#garage-chart", 250, "Total Newly Registered Garages", garages_lable, garages_vlable);

    showCharts("#ads-chart", 250, "Total Ads Running", advertisements_lable, advertisements_vlable);

    showCitiesChart("#cities-chart", 250, "Cities");

    function showCharts(target_id='',chart_height='',chart_title='',lable='',vlable='') {
        $(document).ready(function() {
            $primary = '#7367F0',
            $success = '#28C76F',
            $danger = '#EA5455',
            $warning = '#FF9F43',
            $info = '#00cfe8',
            $label_color_light = '#dae1e7';

            var themeColors = [$primary, $success, $danger, $warning, $info];

            // RTL Support
            var yaxis_opposite = false;
            if ($('html').data('textdirection') == 'rtl') {
                yaxis_opposite = true;
            }

            var lineChartOptions = {
                chart: {
                    height: chart_height,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                colors: themeColors,
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                series: [{
                    name: "Visits",
                    data: vlable,
                }],
                title: {
                    text: chart_title,
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: lable,
                },
                yaxis: {
                    tickAmount: 5,
                    opposite: yaxis_opposite
                }
            }

            var lineChart = new ApexCharts(
                document.querySelector(target_id),
                    lineChartOptions
            );
            lineChart.render();
        });
    }

    function showCitiesChart(target_id='',chart_height='',chart_title='') {
        var chart_labels = [
            <?php for($i = 0;$i < $limit;$i++): ?>
                "<?php echo $month_names[$i]; ?>"
            <?php if($i < ($limit-1)): ?>, <?php endif;endfor; ?>
        ];

        $primary = '#7367F0',
        $success = '#28C76F',
        $danger = '#EA5455',
        $warning = '#FF9F43',
        $info = '#00cfe8',
        $label_color_light = '#dae1e7';

        var themeColors = [$primary, $success, $danger, $warning, $info];

        // RTL Support
        var yaxis_opposite = false;
        if ($('html').data('textdirection') == 'rtl') {
            yaxis_opposite = true;
        }

        var barChartOptions = {
            chart: {
                height: chart_height,
                type: 'bar',
            },
            colors: themeColors,
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                data: [400, 430, 1100, 1200, 1380]
            }],
            xaxis: {
                categories: ['United Kingdom', 'Netherlands', 'Italy', 'United States', 'China'],
                tickAmount: 5
            },
            yaxis: {
                opposite: yaxis_opposite
            }
        }
        var barChart = new ApexCharts(
        document.querySelector(target_id),
            barChartOptions
        );
        barChart.render();
    }
</script>
@endsection
