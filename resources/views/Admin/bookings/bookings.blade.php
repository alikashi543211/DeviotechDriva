@extends('Admin.layouts.master')
@section('title', 'Bookings')
@section('extras-css')
<style>
    .bg-yellow 
    {
    background: #FADA5E;
    }
    .bg-grey 
    {
    background: grey;
    }
    .bg-orange 
    {
    background: #FF9F43;
    }
    .bg-blue
    {
        background: #7367F0;
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
                    <div class="col-md-8 col-sm-12 mb-3">
                        <div class="page-heading">
                            <h3>Bookings</h3>
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
                <!-- Zero configuration table -->
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
                                                        <th>Time</th>
                                                        <th>Consumer</th>
                                                        <th>Garage</th>
                                                        <th>Services</th>
                                                        <th>Booking ID</th>
                                                        <th>Status</th>
                                                        <th class="text-right">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($bookings as $data)
                                                    <tr>
                                                        <td>{{ date('d-M-Y', strtotime($data->created_at))}}</td>
                                                        <td>{{ $data->created_at->format('H:i') }}</td>
                                                        <td>{{$data->consumer_profile_info->user->name}}</td>
                                                        <td>{{$data->garage_profile_info->name}}</td>
                                                        <td>
                                                        @foreach($data->booking_services as $s)
                                                            <img src="{{ asset($s->image) }}" width="25" style="z-index:999;" alt="">
                                                        @endforeach
                                                        </td>
                                                        <td>{{$data->id}}</td>
                                                        <td>
                                                        @if($data->status=='pending')
                                                            <div class="chip bg-yellow">
                                                                <div class="chip-body">
                                                                    <div class="chip-text text-white">Pending</div>
                                                                </div>
                                                            </div> 
                                                        @elseif($data->status=='inspection')
                                                            <div class="chip bg-orange">
                                                                <div class="chip-body">
                                                                    <div class="chip-text text-white"><b>Inspection</b></div>
                                                                </div>
                                                            </div> 
                                                        @elseif($data->status=='in_progress')
                                                            <div class="chip bg-blue">
                                                                <div class="chip-body">
                                                                    <div class="chip-text text-white"><b>In Progress</b></div>
                                                                </div>
                                                            </div> 
                                                        @elseif($data->status=='complete')
                                                            <div class="chip bg-success">
                                                                <div class="chip-body">
                                                                    <div class="chip-text text-white">Complete</div>
                                                                </div>
                                                            </div> 
                                                        @elseif($data->status=='cancel')
                                                            <div class="chip bg-grey">
                                                                <div class="chip-body">
                                                                    <div class="chip-text text-white"><b>Cancel</b></div>
                                                                </div>
                                                            </div> 
                                                        @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="dropdown dropleft float-right">
                                                                <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="{{ route('admin.booking.detail',$data->id) }}">
                                                                        <div class="media">
                                                                            <div class="media-left" style="width: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></div>
                                                                            <div class="media-body">View</div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
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
                <!--/ Zero configuration table -->

            </div>
        </div>
    </div>

@endsection

