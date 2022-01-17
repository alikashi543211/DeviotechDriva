@extends('Admin.layouts.master') @section('title', 'Overview | Garages') @section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="row">
                <div class="col-md-8 col-sm-12 mb-3">
                    <div class="page-heading">
                        <h3 class="mb-1">Garages</h3>
                        <h4>Overview</h4>
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
                                                    <th>Garage Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($garage_profiles as $data)
                                                <tr>
                                                    <td>
                                                        @if(isset($data->logo))
                                                        <img class="media-object img-sm rounded-circle" src="{{asset($data->logo)}}" alt="Generic placeholder image" height="64" width="64"></td>
                                                    @else
                                                    <img class="media-object img-sm rounded-circle" src="{{asset('images/user.png')}}" alt="Generic placeholder image" height="64" width="64"></td>
                                                    @endif
                                                    <td>
                                                        {{$data->name}} <br>
                                                        <small class="small-text">{{$data->address}}</small>
                                                    </td>
                                                    <td>{{$data->user->email ?? 'N/A'}}</td>
                                                    <td>{{$data->contact_1 ?? 'N/A'}}</td>
                                                    <td>
                                                        <div class="chip chip-danger">
                                                            <div class="chip-body">
                                                                <div class="chip-text">{{$data->status}}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown dropleft float-right">
                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ route('admin.garage.profile',$data->id) }}">
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
                                                                <a class="dropdown-item suspend-btn" data-href="{{$data->id}}" href="javascript:void(0);">
                                                                    <div class="media">
                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-pause-circle-o" aria-hidden="true"></i></div>
                                                                        <div class="media-body">Suspend</div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item del-btn" data-href="{{$data->id}}" href="javascript:voide(0);">
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

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="status_permission_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h5 class="modal-title" id="myModalLabel160">Are You Sure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You want to change the status
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.garage.suspend')}}" method="GET">
                    <input type="hidden" value="" id="suspend_id" name="id">
                    <button type="submit" class="btn btn-success" id="sure_change">Sure</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
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
                <form method="GET" action="{{route('admin.garage.delete_overview')}}">
                    <input type="hidden" value="" id="delete_id" name="id">
                    <button type="submit" class="btn btn-success" id="sure_del">Sure</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection @section('extra-js')
<script>
    $(document).on("click", ".suspend-btn", function(e) {
        $("#suspend_id").val($(this).attr("data-href"));
        $("#status_permission_modal").modal('show');
    });

    $(document).on("click", ".del-btn", function(e) {
        $("#delete_id").val($(this).attr("data-href"));
        $("#delete_modal").modal('show');
    });
</script>
@endsection
