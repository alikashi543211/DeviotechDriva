@extends('consumer.layouts.master')
@section('title','Bookings')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style type="text/css">
        #scheduleTable th, #scheduleTable td{
            border: 1px solid #FF9F43 !important;
            color: #fff;
            padding: 10px 4px;
        }
        .heading{
            background: #ea5455 !important;
        }
    </style>
@endsection
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-lg-5 col-md-4 col-md-3 col-sm-12 mb-3">
            <div class="page-heading">
                <h3 class="float-left">Bookings</h3>
                {{-- <div class="breadcrumb-wrapper col-12">
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
                        <li class="breadcrumb-item active">Bookings
                        </li>
                    </ol>
                </div> --}}
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4">
            {{-- <a href="#" class="btn btn-primary waves-effect waves-light" id="schedule">SCHEDULE</a> --}}
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12 mb-3">
            {{-- <div class="input-group">
                <input type="text" class="form-control" name="search" id="search" placeholder="Search name, email, phone etc">
                <div class="input-group-append">
                  <button type="button"><i class="fa fa-search"></i></button>
                </div>
            </div> --}}
        </div>
        {{-- <div class="col-1 p-0">
            <a href="javascript:void(0);" class="btn btn-sm btn-primary p-1 waves-effect waves-light apply-filter"><i class="fa fa-filter"></i></a>
        </div> --}}
    </div>
</div>
{{-- <div class="content-body">
    <div class="row filters" style="display: none;">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="row">
                            <div class="col-12">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <h4>Status</h4>
                                <div class="vs-checkbox-con vs-checkbox-primary mt-1">
                                    <input type="checkbox" value="Pending">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Pending</span>
                                </div>
                                <div class="vs-checkbox-con vs-checkbox-primary mt-1">
                                    <input type="checkbox" value="Inspecting">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Inspecting</span>
                                </div>
                                <div class="vs-checkbox-con vs-checkbox-primary mt-1">
                                    <input type="checkbox" value="In Progress">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">In Progress</span>
                                </div>
                                <div class="vs-checkbox-con vs-checkbox-primary mt-1">
                                    <input type="checkbox" value="Complete">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Complete</span>
                                </div>
                                <div class="vs-checkbox-con vs-checkbox-primary mt-1">
                                    <input type="checkbox" value="Cancelled">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Cancelled</span>
                                </div>
                            </div>
                            <div class="col-3">
                                <h4>Service</h4>
                                <div class="vs-checkbox-con vs-checkbox-primary mt-1">
                                    <input type="checkbox" value="Service 1">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Service 1</span>
                                </div>
                                <div class="vs-checkbox-con vs-checkbox-primary mt-1">
                                    <input type="checkbox" value="Service 2">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Service 2</span>
                                </div>
                                <div class="vs-checkbox-con vs-checkbox-primary mt-1">
                                    <input type="checkbox" value="Service 3">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Service 3</span>
                                </div>
                                <div class="vs-checkbox-con vs-checkbox-primary mt-1">
                                    <input type="checkbox" value="Service 4">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Service 4</span>
                                </div>
                                <div class="vs-checkbox-con vs-checkbox-primary mt-1">
                                    <input type="checkbox" value="Service 5">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Service 5</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <h4>Date</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-bold-400 mb-1">
                                            From
                                        </div>
                                        <fieldset class="form-group position-relative">
                                            <input type="text" class="form-control datetimepicker" id="iconLeft2" placeholder="">
                                            <div class="form-control-position">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-bold-400 mb-1">
                                            To
                                        </div>
                                        <fieldset class="form-group position-relative">
                                            <input type="text" class="form-control datetimepicker" id="iconLeft2" placeholder="Icon Right, Default Input">
                                            <div class="form-control-position">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-right mt-3">
                                        <a href="#" class="btn btn-primary waves-effect waves-light">Apply Filter</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Zero configuration table -->

    <div class="row">
        <div class="col-12">
            {{-- <h4>Booking List</h4> --}}
        </div>
    </div>
    @if($bookings->isNotEmpty())
    <section id="basic-datatable">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
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
                                            <th>Date</th>
                                            <th>Booking ID</th>
                                            <th>Make</th>
                                            <th>VRM</th>
                                            <th>Services</th>
                                            <th>Garage</th>
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{dateFormat($booking->created_at)}}</td>
                                            <td>{{$booking->id}}</td>
                                            <td>{{ $booking->consumer_vehicle->make }}</td>
                                            <td><div class="tbl-vrm"><span>{{ $booking->consumer_vehicle->vrm }}</span></div></td>
                                            <td>
                                                @foreach($booking->booking_services as $s)
                                                <img src="{{ asset($s->image) }}" width="25" style="z-index:999;" alt="">
                                                @endforeach

                                            </td>
                                            <td>{{$booking->garage_profile_info->name}}</td>
                                            @if($booking->status=='pending')
                                            <td>
                                                <div class="chip bg-yellow">
                                                    <div class="chip-body">
                                                        <div class="chip-text text-white"><b>Pending</b></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown dropleft float-right">
                                                    <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('consumer.booking.pending',['booking'=>$booking->id]) }}">
                                                            <div class="media">
                                                                <div class="media-left" style="width: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></div>
                                                                <div class="media-body">View</div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            @endif
                                            @if($booking->status=='cancel')
                                            <td>
                                                <div class="chip bg-grey">
                                                    <div class="chip-body">
                                                        <div class="chip-text text-white"><b>Cancel</b></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown dropleft float-right">
                                                    <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('consumer.booking.cancel',['booking'=>$booking->id]) }}">
                                                            <div class="media">
                                                                <div class="media-left" style="width: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></div>
                                                                <div class="media-body">View</div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            @endif
                                            @if($booking->status=="inspection")
                                            <td>
                                                <div class="chip bg-orange">
                                                    <div class="chip-body">
                                                        <div class="chip-text text-white"><b>Inspection</b></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown dropleft float-right">
                                                    <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('consumer.booking.inspection',['booking'=>$booking->id]) }}">
                                                            <div class="media">
                                                                <div class="media-left" style="width: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></div>
                                                                <div class="media-body">View</div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            @endif
                                             @if($booking->status=="complete")
                                           <td>
                                                <div class="chip bg-success">
                                                    <div class="chip-body">
                                                        <div class="chip-text text-white"><b>Complete</b></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown dropleft float-right">
                                                    <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('consumer.booking.complete',['booking'=>$booking->id]) }}">
                                                            <div class="media">
                                                                <div class="media-left" style="width: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></div>
                                                                <div class="media-body">View</div>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item" href="{{ route('consumer.booking.invoice',['booking'=>$booking->id]) }}">
                                                            <div class="media">
                                                                <div class="media-left" style="width: 25px;"><i class="feather icon-file-text" aria-hidden="true"></i></div>
                                                                <div class="media-body">Invoice</div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            @endif

                                            @if($booking->status=="in_progress")
                                            <td>
                                                <div class="chip bg-blue">
                                                    <div class="chip-body">
                                                        <div class="chip-text text-white"><b>In Progress</b></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown dropleft float-right">
                                                    <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('consumer.booking.in_progress',['booking'=>$booking->id]) }}">
                                                            <div class="media">
                                                                <div class="media-left" style="width: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></div>
                                                                <div class="media-body">View</div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            @endif
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
    @else
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12 mb-3 m-0 m-auto text-center">
                <div class="alert-dismissible fade show" role="alert">
                    <h5 class="font-weight-bold mb-0">
                        <i class="feather icon-calendar font-large-2"></i>
                    </h5>
                </div>
            </div>
            <div class="col-md-3 col-3"></div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12 mb-3 m-0 m-auto text-center">
                <div class="alert-dismissible fade show" role="alert">
                    <h5 class="font-weight-bold mb-0">
                        <p class="mt-1">You have not made a booking yet!<br>
                            <small><a href="{{route('front.index')}}">Search</a> for a garage to get started</small>
                        </p>
                        <p class="p-0">
                            <a href="{{route('front.index')}}"><button data-toggle="modal" data-target="#updateProfileModal" class="btn btn-danger px-3 waves-effect waves-light" role="menuitem"><i class="feather icon-calendar"></i> Book</button></a>
                        </p>
                    </h5>
                </div>
            </div>
            <div class="col-md-3 col-3"></div>
        </div>
    </div>
    @endif
    <!--/ Zero configuration table -->
</div>
<!--Modal-->
<div class="modal fade" id="scheduleModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-white">
            <h4>SCHEDULE</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:30px 10px;">
          <form role="form">
            <div class="col-12">
                <div class="form-group float-left">
                    <i class="feather icon-chevron-left mr-2"></i><span>20 Apr - 26 Apr</span><i class="feather icon-chevron-right ml-2"></i>
                </div>
                <div class="form-group float-right">
                    <i class="fa fa-stop mr-2 ml-1 text-grey border border-primary"></i><span>Closed</span>
                    <i class="fa fa-stop mr-2 ml-1 text-white border border-primary"></i><span>Free</span>
                    <i class="fa fa-stop mr-2 ml-1 text-primary border border-primary"></i><span>Booked</span>
                </div>
            </div>
            <div class="col-12">
                <table style="font-size: x-small; border-collapse: separate;" class="table text-center" id="scheduleTable">
                    <thead>
                        <tr>
                            <th class="heading"><span>Days/Time</span></th>
                            @foreach(getTimes() as $time)
                            <th class="heading"><span>{{ $time }}</span></th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                    @foreach(getDays() as $day)
                        <tr>
                            <td class="heading"><span>{{ $day }}"</span></td>
                            @for($j=0; $j < 24 ; $j++)
                            <td class="border-warning rounded-sm"><span></span></td>
                            @endfor
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <div class="form-group float-right">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
                <div class="form-group float-right mr-1">
                    <button class="btn btn-primary btn-block">Canncel</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.apply-filter').click(function (e) {
                e.preventDefault();
                $('.filters').slideToggle();
            });
        });

        $("#schedule").click(function(){
            $("#scheduleModal").modal();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.datetimepicker').datepicker();
        });
    </script>
@endsection
