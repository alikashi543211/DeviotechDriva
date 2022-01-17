@extends('Admin.layouts.master')
@section('title', 'Recent Order Activities')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="row">
                    <div class="col-md-8 col-sm-12 mb-3">
                        <div class="page-heading">
                            <h3>Recent Order Activities</h3>
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
                                                    <th>Display</th>
                                                    <th>Name</th>
                                                    <th>Activity</th>
                                                    <th class="text-right">Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ date('d M') }}</td>
                                                        <td><img class="media-object img-sm rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-16.jpg')}}" alt="Generic placeholder image" height="64" width="64"></td>
                                                        <td>John Doe</td>
                                                        <td>John Doe has posted 4 images to booking <a href="#">GB1265843</a></td>
                                                        <td class="text-right">{{ now()->diffForHumans() }}</td>
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

            </div>
        </div>
    </div>
@endsection
@section('extra-js')

@endsection

