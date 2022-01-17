@extends('Admin.layouts.master')
@section('title', 'Enquiries | Support')
@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="row">
                    <div class="col-md-8 col-sm-12 mb-3">
                        <div class="page-heading">
                            <h3 class="mb-1">Support</h3>
                            <h4>Enquiries</h4>
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
                <section id="basic-tabs-components">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="all" data-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true">Open</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="bookings" data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false">Closed</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
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
                                                                                        <th>Name</th>
                                                                                        <th>From</th>
                                                                                        <th>Subject</th>
                                                                                        <th>Last Updated</th>
                                                                                        <th class="text-right">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($open_tickets as $ot)
                                                                                        <tr>
                                                                                            <td>{{ $ot->name }}</td>
                                                                                            <td>{{ $ot->email }}</td>
                                                                                            <td><span class="font-weight-bold">#{{ $ot->ticket_id }}</span> {{ $ot->subject }}</td>
                                                                                            <td>{{ $ot->updated_at }}</td>
                                                                                            <td>
                                                                                                <div class="dropdown dropleft float-right">
                                                                                                    <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                                                    <div class="dropdown-menu">
                                                                                                        <a class="dropdown-item" href="{{ route('admin.support.enquiry_detail', $ot->ticket_id) }}">
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
                                            </div>
                                            <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
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
                                                                                        <th>Name</th>
                                                                                        <th>From</th>
                                                                                        <th>Subject</th>
                                                                                        <th>Ticket ID</th>
                                                                                        <th class="text-right">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($close_tickets as $ct)
                                                                                        <tr>
                                                                                            <td>{{ $ct->name }}</td>
                                                                                            <td>{{ $ct->user->email }}</td>
                                                                                            <td><span class="font-weight-bold">#{{ $ct->ticket_id }}</span> {{ $ct->subject }}</td>
                                                                                            <td>{{ $ct->updated_at }}</td>
                                                                                            <td>
                                                                                                <div class="dropdown dropleft float-right">
                                                                                                    <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                                                    <div class="dropdown-menu">
                                                                                                        <a class="dropdown-item" href="{{ route('admin.support.enquiry_detail', $ct->ticket_id) }}">
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

