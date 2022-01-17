@extends('Admin.layouts.master')
@section('title', 'Jake Elis | Consumer')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="row">
                <div class="col-md-8 col-sm-12 mb-3">
                    <div class="page-heading">
                        <h3 class="float-left">Consumers</h3>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.consumer') }}">Consumers</a>
                                </li>
                                <li class="breadcrumb-item active">Profile
                                </li>
                            </ol>
                        </div>
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
            <section class="mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="vehicle-info">{{ $consumer->user->name }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                                        <div class="users-view-image">
                                            @if ($consumer->picture == "")
                                                <img src="{{ asset('assets/app-assets/images/portrait/small/avatar-s-12.jpg') }}" class="users-avatar-shadow w-100 mb-2 rounded-circle" alt="avatar">
                                            @else
                                                <img src="{{ asset($consumer->picture) }}" class="users-avatar-shadow w-100 mb-2 rounded-circle" alt="avatar">
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="row">
                                                    <div class="col-4"><p class="font-weight-bold">Last Login:</p></div>
                                                    <div class="col-8"><p>2 days ago</p></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="row">
                                                    <div class="col-3"><p class="font-weight-bold">Status:</p></div>
                                                    <div class="col-9">
                                                        <div class="chip chip-danger">
                                                            <div class="chip-body">
                                                                <div class="chip-text">status</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="row">
                                                    <div class="col-4"><p class="font-weight-bold">Member Since:</p></div>
                                                    <div class="col-8"><p>{{ date('d M Y', strtotime($consumer->created_at)) }}</p></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="row">
                                                    <div class="col-3"><p class="font-weight-bold">Email:</p></div>
                                                    <div class="col-9"><p>{{ $consumer->user->email }}</p></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2"><p class="font-weight-bold">Address:</p></div>
                                            <div class="col-10"><p>{{ $consumer->address }}</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="row">
                                                    <div class="col-4"><p class="font-weight-bold">Reports:</p></div>
                                                    <div class="col-8"><p> <a href="">1</a> received / <a href="">2</a> made</p></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="row">
                                                    <div class="col-3"><p class="font-weight-bold">Phone:</p></div>
                                                    <div class="col-9"><p>{{ $consumer->contact_number }}</p></div>
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

            <div class="content-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="page-heading">
                            <h3>Bookings</h3>
                        </div>
                    </div>
                </div>
            </div>
            <section id="basic-datatable" class="mb-5">
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
                                    <div class="table">
                                        <table class="table zero-configuration table-hover">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Garage</th>
                                                <th></th>
                                                <th>Booking ID</th>
                                                <th>Service</th>
                                                <th>Quotation</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{date('d M')}}</td>
                                                    <td><img class="media-object img-sm rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-16.jpg')}}" alt="Generic placeholder image" height="64" width="64"></td>
                                                    <td>Tom's Garage</td>
                                                    <td>GB12363541</td>
                                                    <td>
                                                        <img src="{{ asset('assets/app-assets/images/svg/tyre.svg') }}" width="25" style="z-index:999;" alt="">
                                                        <img src="{{ asset('assets/app-assets/images/svg/plug.svg') }}" width="25" style="z-index:999;" alt="">
                                                        <img src="{{ asset('assets/app-assets/images/svg/MOT.svg') }}" width="25" style="z-index:999;" alt="">
                                                    </td>
                                                    <td>$3,075.00</td>
                                                    <td>Pending</td>
                                                    <td>
                                                        <div class="dropdown dropleft float-right">
                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></div>
                                                                        <div class="media-body">View</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Edit</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-commenting-o" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Message</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-pause-circle-o" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Suspend</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Delete</div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{date('d M')}}</td>
                                                    <td><img class="media-object img-sm rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-16.jpg')}}" alt="Generic placeholder image" height="64" width="64"></td>
                                                    <td>Tom's Garage</td>
                                                    <td>GB12363541</td>
                                                    <td>
                                                        <img src="{{ asset('assets/app-assets/images/svg/tyre.svg') }}" width="25" style="z-index:999;" alt="">
                                                        <img src="{{ asset('assets/app-assets/images/svg/plug.svg') }}" width="25" style="z-index:999;" alt="">
                                                        <img src="{{ asset('assets/app-assets/images/svg/MOT.svg') }}" width="25" style="z-index:999;" alt="">
                                                        <img src="{{ asset('assets/app-assets/images/svg/recovery.svg') }}" width="25" style="z-index:999;" alt="">
                                                        <img src="{{ asset('assets/app-assets/images/svg/repairs.svg') }}" width="25" style="z-index:999;" alt="">
                                                    </td>
                                                    <td>$3,075.00</td>
                                                    <td>Pending</td>
                                                    <td>
                                                        <div class="dropdown dropleft float-right">
                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></div>
                                                                        <div class="media-body">View</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Edit</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-commenting-o" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Message</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-pause-circle-o" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Suspend</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Delete</div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{date('d M')}}</td>
                                                    <td><img class="media-object img-sm rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-16.jpg')}}" alt="Generic placeholder image" height="64" width="64"></td>
                                                    <td>Tom's Garage</td>
                                                    <td>GB12363541</td>
                                                    <td>
                                                        <img src="{{ asset('assets/app-assets/images/svg/plug.svg') }}" width="25" style="z-index:999;" alt="">
                                                        <img src="{{ asset('assets/app-assets/images/svg/MOT.svg') }}" width="25" style="z-index:999;" alt="">
                                                    </td>
                                                    <td>$3,075.00</td>
                                                    <td>Pending</td>
                                                    <td>
                                                        <div class="dropdown dropleft float-right">
                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></div>
                                                                        <div class="media-body">View</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Edit</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-commenting-o" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Message</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-pause-circle-o" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Suspend</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Delete</div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
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

            <div class="content-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="page-heading">
                            <h3>Vehicles</h3>
                        </div>
                    </div>
                </div>
            </div>
            <section class="mb-5">
                <div class="row match-height">
                    <div class="col-sm-3 mr-0 pr-0">
                        <div class="card vehicle-img">
                            <img src="{{asset('assets/app-assets/images/portrait/small/avatar-s-16.jpg')}}" alt="Generic placeholder image" class="img-fluid">
                            <div class="vehicle-no"><span>ky68wzm</span></div>
                        </div>
                    </div>
                    <div class="col-sm-9 ml-0 pl-0">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body" style="padding-top: 2.5rem;">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3"><p>Make</p></div>
                                        <div class="col-md-8"><p class="vehicle-info">Skoda</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3"><p>Model</p></div>
                                        <div class="col-md-8"><p class="vehicle-info">Kodiaq vrs tdi 4x4 s-a</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3"><p>Engine Size</p></div>
                                        <div class="col-md-8"><p class="vehicle-info">1968</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3"><p>Body Type</p></div>
                                        <div class="col-md-8"><p class="vehicle-info">Estate</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="content-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="page-heading">
                            <h3>Feedback</h3>
                        </div>
                    </div>
                </div>
            </div>

            <section id="basic-tabs-components" class="mb-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card overflow-hidden">
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="all" data-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true">All</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="bookings" data-toggle="tab" href="#left" aria-controls="profile" role="tab" aria-selected="false">Left</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="consumers" data-toggle="tab" href="#received" aria-controls="about" role="tab" aria-selected="false">Received</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                                            <div class="media mb-1">
                                                <a class="align-self-start media-left mr-2" href="#">
                                                    <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" />
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Jake Ellis</h5>
                                                    <div class="row" style="margin: 20px 20px 10px  0px">
                                                        <p class="mb-0">
                                                            Bonbon chocolate bar candy canes sugar plum pie gingerbread wafer chupa chups gummi bears. Carrot
                                                            cake oat cake jujubes cookie. Marzipan topping jelly brownie bear claw. Bonbon gummies fruitcake
                                                            liquorice tart sesame snaps.
                                                        </p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <span class="float-left font-medium-3">
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-secondary"></i>
                                                        </span>
                                                    </div>
                                                    <div class="mt-1"></div>
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
                                            <div class="media mb-1">
                                                <a class="align-self-start media-left mr-2" href="#">
                                                    <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" />
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Top Aligned Media</h5>
                                                    <div class="row" style="margin: 20px 20px 10px  0px">
                                                        <p class="mb-0">
                                                            Bonbon chocolate bar candy canes sugar plum pie gingerbread wafer chupa chups gummi bears. Carrot
                                                            cake oat cake jujubes cookie. Marzipan topping jelly brownie bear claw. Bonbon gummies fruitcake
                                                            liquorice tart sesame snaps.
                                                        </p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <span class="float-left font-medium-3">
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-secondary"></i>
                                                        </span>
                                                    </div>
                                                    <div class="mt-1"></div>
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
                                        </div>
                                        <div class="tab-pane" id="left" aria-labelledby="profile-tab" role="tabpanel">
                                            <div class="media mb-1">
                                                <a class="align-self-start media-left mr-2" href="#">
                                                    <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" />
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Top Aligned Media</h5>
                                                    <div class="row" style="margin: 20px 20px 10px  0px">
                                                        <p class="mb-0">
                                                            Bonbon chocolate bar candy canes sugar plum pie gingerbread wafer chupa chups gummi bears. Carrot
                                                            cake oat cake jujubes cookie. Marzipan topping jelly brownie bear claw. Bonbon gummies fruitcake
                                                            liquorice tart sesame snaps.
                                                        </p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <span class="float-left font-medium-3">
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-secondary"></i>
                                                        </span>
                                                    </div>
                                                    <div class="mt-1"></div>
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
                                            <div class="media mb-1">
                                                <a class="align-self-start media-left mr-2" href="#">
                                                    <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" />
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Top Aligned Media</h5>
                                                    <div class="row" style="margin: 20px 20px 10px  0px">
                                                        <p class="mb-0">
                                                            Bonbon chocolate bar candy canes sugar plum pie gingerbread wafer chupa chups gummi bears. Carrot
                                                            cake oat cake jujubes cookie. Marzipan topping jelly brownie bear claw. Bonbon gummies fruitcake
                                                            liquorice tart sesame snaps.
                                                        </p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <span class="float-left font-medium-3">
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-secondary"></i>
                                                        </span>
                                                    </div>
                                                    <div class="mt-1"></div>
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
                                            <div class="media mb-1">
                                                <a class="align-self-start media-left mr-2" href="#">
                                                    <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" />
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Top Aligned Media</h5>
                                                    <div class="row" style="margin: 20px 20px 10px  0px">
                                                        <p class="mb-0">
                                                            Bonbon chocolate bar candy canes sugar plum pie gingerbread wafer chupa chups gummi bears. Carrot
                                                            cake oat cake jujubes cookie. Marzipan topping jelly brownie bear claw. Bonbon gummies fruitcake
                                                            liquorice tart sesame snaps.
                                                        </p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <span class="float-left font-medium-3">
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-secondary"></i>
                                                        </span>
                                                    </div>
                                                    <div class="mt-1"></div>
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
                                        </div>
                                        <div class="tab-pane" id="received" role="tabpanel" aria-labelledby="dropdown31-tab" aria-expanded="false">
                                            <div class="media mb-1">
                                                <a class="align-self-start media-left mr-2" href="#">
                                                    <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" />
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Delta Motors</h5>
                                                    <div class="row" style="margin: 20px 20px 10px  0px">
                                                        <p class="mb-0">
                                                            Bonbon chocolate bar candy canes sugar plum pie gingerbread wafer chupa chups gummi bears. Carrot
                                                            cake oat cake jujubes cookie. Marzipan topping jelly brownie bear claw. Bonbon gummies fruitcake
                                                            liquorice tart sesame snaps.
                                                        </p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <span class="float-left font-medium-3">
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-secondary"></i>
                                                        </span>
                                                    </div>
                                                    <div class="mt-1"></div>
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
                                            <div class="media mb-1">
                                                <a class="align-self-start media-left mr-2" href="#">
                                                    <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" />
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Top Aligned Media</h5>
                                                    <div class="row" style="margin: 20px 20px 10px  0px">
                                                        <p class="mb-0">
                                                            Bonbon chocolate bar candy canes sugar plum pie gingerbread wafer chupa chups gummi bears. Carrot
                                                            cake oat cake jujubes cookie. Marzipan topping jelly brownie bear claw. Bonbon gummies fruitcake
                                                            liquorice tart sesame snaps.
                                                        </p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <span class="float-left font-medium-3">
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-secondary"></i>
                                                        </span>
                                                    </div>
                                                    <div class="mt-1"></div>
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
                                            <div class="media mb-1">
                                                <a class="align-self-start media-left mr-2" href="#">
                                                    <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" />
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Top Aligned Media</h5>
                                                    <div class="row" style="margin: 20px 20px 10px  0px">
                                                        <p class="mb-0">
                                                            Bonbon chocolate bar candy canes sugar plum pie gingerbread wafer chupa chups gummi bears. Carrot
                                                            cake oat cake jujubes cookie. Marzipan topping jelly brownie bear claw. Bonbon gummies fruitcake
                                                            liquorice tart sesame snaps.
                                                        </p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <span class="float-left font-medium-3">
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-secondary"></i>
                                                        </span>
                                                    </div>
                                                    <div class="mt-1"></div>
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
                                            <div class="media mb-1">
                                                <a class="align-self-start media-left mr-2" href="#">
                                                    <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" />
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Top Aligned Media</h5>
                                                    <div class="row" style="margin: 20px 20px 10px  0px">
                                                        <p class="mb-0">
                                                            Bonbon chocolate bar candy canes sugar plum pie gingerbread wafer chupa chups gummi bears. Carrot
                                                            cake oat cake jujubes cookie. Marzipan topping jelly brownie bear claw. Bonbon gummies fruitcake
                                                            liquorice tart sesame snaps.
                                                        </p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <span class="float-left font-medium-3">
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-warning"></i>
                                                            <i class="feather icon-star text-secondary"></i>
                                                        </span>
                                                    </div>
                                                    <div class="mt-1"></div>
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
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
