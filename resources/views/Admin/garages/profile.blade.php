@extends('Admin.layouts.master')
@section('title', $garage->name.' | Garages')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="row">
                <div class="col-md-8 col-sm-12 mb-3">
                    <div class="page-heading">
                        <h3 class="float-left">Garages</h3>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.garage.overview') }}">Overview</a>
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
                    <div class="col-8 m-0 pr-0 pt-0 pb-0">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                            <div class="users-view-image text-center justify-content-center">
                                                @if ($garage->logo == "")
                                                    <img src="{{ asset('assets/app-assets/images/portrait/small/avatar-s-12.jpg') }}" width="160" class="users-avatar-shadow rounded-circle" alt="avatar">
                                                @else
                                                    <img src="{{ asset($garage->logo) }}" width="160" class="users-avatar-shadow rounded-circle" alt="avatar">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="page-heading">
                                                        <h3>{{ $garage->name }}</h3>
                                                    </div>
                                                    <p class="mb-0">{{ $garage->address }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <span class="font-medium-1">
                                                        <i class="feather icon-star text-warning"></i>
                                                        <i class="feather icon-star text-warning"></i>
                                                        <i class="feather icon-star text-warning"></i>
                                                        <i class="feather icon-star text-warning"></i>
                                                        <i class="feather icon-star text-secondary"></i>
                                                    </span>
                                                    <a href="#" class="pl-1">15 Reviews</a>
                                                </div>
                                                <div class="mt-3"></div>
                                                <div class="col-6">
                                                    <p class="mb-0"><small>Tel 1:</small></p>
                                                    <p>{{ $garage->contact_1 }}</p>
                                                </div>
                                                <div class="col-6">
                                                    @if ($garage->contact_2)
                                                    <p class="mb-0"><small>Tel 2:</small></p>
                                                    <p>{{ $garage->contact_2 }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    <a href="https://{{ $garage->website }}" target="_blank" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-globe"></i> Website</a>
                                                </div>
                                                <div class="col-6">
                                                    <p>
                                                        @if ($garage->registration_number)
                                                            <small>Reg: {{ $garage->registration_number }}</small>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <p>
                                                        @if ($garage->vat_registration)
                                                            <small>VAT: {{ $garage->vat_registration }}</small>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 m-0 pl-0 pt-0 pb-0">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <div id="map" style="width: 100%; height: 100%;"></div>

                            </div>
                            <style>.mapouter{position:relative;text-align:right;height: 290px;}.gmap_canvas {overflow:hidden;background:none!important; height: 290px}</style>
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
                                                <th>Time</th>
                                                <th>Make</th>
                                                <th>VRM</th>
                                                <th>Services</th>
                                                <th>Client</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{date('d M')}}</td>
                                                    <td>13:45</td>
                                                    <td>Skoda</td>
                                                    <td>KY68WZM</td>
                                                    <td>
                                                        <img src="{{ asset('assets/app-assets/images/svg/Body-Work.svg') }}" width="25" style="z-index:999;" alt="">
                                                        <img src="{{ asset('assets/app-assets/images/svg/plug.svg') }}" width="25" style="z-index:999;" alt="">
                                                        <img src="{{ asset('assets/app-assets/images/svg/MOT.svg') }}" width="25" style="z-index:999;" alt="">
                                                        <img src="{{ asset('assets/app-assets/images/svg/recovery.svg') }}" width="25" style="z-index:999;" alt="">
                                                        <img src="{{ asset('assets/app-assets/images/svg/repairs.svg') }}" width="25" style="z-index:999;" alt="">
                                                    </td>
                                                    <td>John Doe</td>
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
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{date('d M')}}</td>
                                                    <td>13:45</td>
                                                    <td>Skoda</td>
                                                    <td>KY68WZM</td>
                                                    <td>
                                                        <img src="{{ asset('assets/app-assets/images/svg/Body-Work.svg') }}" width="25" style="z-index:999;" alt="">
                                                    </td>
                                                    <td>John Doe</td>
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
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{date('d M')}}</td>
                                                    <td>13:45</td>
                                                    <td>Skoda</td>
                                                    <td>KY68WZM</td>
                                                    <td>
                                                        <img src="{{ asset('assets/app-assets/images/svg/recovery.svg') }}" width="25" style="z-index:999;" alt="">
                                                        <img src="{{ asset('assets/app-assets/images/svg/repairs.svg') }}" width="25" style="z-index:999;" alt="">
                                                    </td>
                                                    <td>John Doe</td>
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
                            <h3>Promotion Packages</h3>
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
                                                <th>Type</th>
                                                <th>Plan</th>
                                                <th></th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{date('d M')}}</td>
                                                    <td>FEATURED DISTRICT PLAN</td>
                                                    <td>3 Days Plan</td>
                                                    <td></td>
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
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{date('d M')}}</td>
                                                    <td>FEATURED DISTRICT PLAN</td>
                                                    <td>3 Days Plan</td>
                                                    <td></td>
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
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{date('d M')}}</td>
                                                    <td>FEATURED DISTRICT PLAN</td>
                                                    <td>3 Days Plan</td>
                                                    <td></td>
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
@section('extra-js')
<script>
    var map;

    function initMap() {
        var latitude = {{ $garage->address_lat }}; // YOUR LATITUDE VALUE
        var longitude = {{ $garage->address_long }}; // YOUR LONGITUDE VALUE

        var myLatLng = {lat: latitude, lng: longitude};

        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 14
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          //title: 'Hello World'

          // setting latitude & longitude as title of the marker
          // title is shown when you hover over the marker
          title: latitude + ', ' + longitude
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&callback=initMap" async defer></script>
@endsection
