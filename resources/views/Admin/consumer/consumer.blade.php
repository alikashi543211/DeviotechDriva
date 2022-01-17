@extends('Admin.layouts.master')
@section('title', 'Consumers')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="row">
                    <div class="col-md-8 col-sm-12 mb-3">
                        <div class="page-heading">
                            <h3>Consumers</h3>
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
                                                    <th>Display</th>
                                                    <th>Name</th>
                                                    <th>Display Name</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($consumers as $item)
                                                        <tr>
                                                            <td>
                                                                
                                                                @if (!isset($item->consumer_profile->picture))
                                                                    <img class="media-object img-sm rounded-circle" src="{{asset($item->consumer_profile->picture)}}" alt="Image not found" height="64" width="64">
                                                                @else
                                                                    <img class="media-object img-sm rounded-circle" src="{{ asset('images/user.png') }}" alt="{{ $item->name }}" height="64" width="64">
                                                                @endif
                                                            </td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->consumer_profile->display_name }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td>
                                                                <div class="chip chip-danger">
                                                                    <div class="chip-body">
                                                                        <div class="chip-text">status</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown dropleft float-right">
                                                                    <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="{{ route('admin.consumer.profile', $item->consumer_profile->id) }}">
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
<!-- Delete Modal -->
<div class="modal fade text-left" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h5 class="modal-title" id="myModalLabel160">Are You Sure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You want to Delete the garage!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="sure_del">Sure</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-js')

@endsection

