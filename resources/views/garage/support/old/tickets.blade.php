@extends('garage.layouts.master')
@section('title', 'Tickets')
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="page-heading">
                <h3 class="float-left">Tickets</h3>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('garage.dashboard') }}">
                                <span class="feather-icon select-none relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home h-5 w-5 mb-1 stroke-current text-primary">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Tickets
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section id="basic-tabs-components">
        <div class="row">
            <div class="col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body">
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
                                                                    <th>Ticket Type</th>
                                                                    <th>Subject</th>
                                                                    <th>Ticket ID</th>
                                                                    <th class="text-right">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{date('d M')}}</td>
                                                                    <td>Garage: Banrock Station</td>
                                                                    <td>Oil/oil filter change</td>
                                                                    <td>001288</td>
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
                                                                    <td>Garage: Harriet & Morgan</td>
                                                                    <td>Cooling System Repairs</td>
                                                                    <td>001288</td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

