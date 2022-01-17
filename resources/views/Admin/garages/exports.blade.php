@extends('Admin.layouts.master')
@section('title', 'Export | Garages')
@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="row">
                    <div class="col-md-8 col-sm-12 mb-3">
                        <div class="page-heading">
                            <h3 class="mb-1">Garages</h3>
                            <h4>Exports</h4>
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
                                                <a class="nav-link active" id="all" data-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true">Approved</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="bookings" data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false">Archived</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">

                                                <!-- Column selectors with Export Options and print table -->
                                                <section id="column-selectors">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                </div>
                                                                <div class="card-content">
                                                                    <div class="card-body card-dashboard">
                                                                        <div class="dropdown sort-dropdown mb-1 mb-sm-0">
                                                                            <button class="btn btn-white filter-btn dropdown-toggle border text-dark waves-effect waves-light" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1 - <span class="table_length">10</span> of <span class="setting_table_count"></span></button>
                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(118px, 49px, 0px);">
                                                                                <a class="dropdown-item custom-filter" data-value="10" href="#">10</a>
                                                                                <a class="dropdown-item custom-filter" data-value="25" href="#">25</a>
                                                                                <a class="dropdown-item custom-filter" data-value="50" href="#">50</a>
                                                                                <a class="dropdown-item custom-filter" data-value="100" href="#">100</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped dataex-html5-selectors table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Date of approval</th>
                                                                                        <th>Garage Name</th>
                                                                                        <th>Address</th>
                                                                                        <th>Verification Code</th>
                                                                                        <th class="text-right">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($garages as $item)
                                                                                    <tr>
                                                                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                                                                        <td>{{ $item->name }}</td>
                                                                                        <td>{{ $item->address }}</td>
                                                                                        <td>{{ $item->verification_code }}</td>
                                                                                        <td class="text-center">
                                                                                            <div class="dropdown dropleft float-right">
                                                                                                <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="{{ route('admin.garage.gen.code', $item->id) }}"><i class="fa fa-key" aria-hidden="true"></i>Generate new code</a>
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
                                                <!-- Column selectors with Export Options and print table -->

                                            </div>
                                            <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                                                <!-- Column selectors with Export Options and print table -->
                                                <section id="column-selectors">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                </div>
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
                                                                            <table class="table table-striped dataex-html5-selectors table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Date of approval</th>
                                                                                        <th>Garage Name</th>
                                                                                        <th>Address</th>
                                                                                        <th>Verification Code</th>
                                                                                        <th class="text-right">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>{{date('d M')}}</td>
                                                                                        <td>John's Garage</td>
                                                                                        <td>29 Davids Lane, STUDHOLME, CA5 5FJ</td>
                                                                                        <td>57437689</td>
                                                                                        <td class="text-center">
                                                                                            <div class="dropdown dropleft float-right">
                                                                                                <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#"><i class="fa fa-key" aria-hidden="true"></i>Generate new code</a>

                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>{{date('d M')}}</td>
                                                                                        <td>John's Garage</td>
                                                                                        <td>29 Davids Lane, STUDHOLME, CA5 5FJ</td>
                                                                                        <td>57437689</td>
                                                                                        <td class="text-center">
                                                                                            <div class="dropdown dropleft float-right">
                                                                                                <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#"><i class="fa fa-key" aria-hidden="true"></i>Generate new code</a>

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
                                                <!-- Column selectors with Export Options and print table -->
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

