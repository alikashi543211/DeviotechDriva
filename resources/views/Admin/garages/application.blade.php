@extends('Admin.layouts.master')
@section('title', 'Applications | Garages')
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
                            <h4>Applications</h4>
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
                                                    <th>Submitted</th>
                                                    <th>Display</th>
                                                    <th>Garage Name</th>
                                                    <th>Details</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($garages as $item)
                                                    <tr>
                                                        <td>{{ date_format($item->updated_at, "d/m/Y") }}</td>
                                                        <td>
                                                            @if ($item->logo == "")
                                                                <img class="media-object img-sm rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-16.jpg')}}" alt="Generic placeholder image" height="64" width="64">
                                                            @else
                                                                <img class="media-object img-sm rounded-circle" src="{{asset($item->logo)}}" alt="Logo" height="64" width="64">
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>
                                                            @if ($item->statu == "in_revision")
                                                                Revision Required
                                                            @else
                                                                New application submitted
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown dropleft float-right">
                                                                <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="{{ route('admin.garage.detail', $item->id) }}">
                                                                        <div class="media">
                                                                            <div class="media-left" style="width: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></div>
                                                                            <div class="media-body">View</div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item approve-btn" data-id="{{ $item->id }}" href="javascript:void(0);">
                                                                        <div class="media">
                                                                            <div class="media-left" style="width: 25px;"><i class="fa fa-check-square-o" aria-hidden="true"></i></div>
                                                                            <div class="media-body">Approve</div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item revision-btn" data-id="{{ $item->id }}" href="javascript:void(0);">
                                                                        <div class="media">
                                                                            <div class="media-left" style="width: 25px;"><i class="fa fa-hourglass-half" aria-hidden="true"></i></div>
                                                                            <div class="media-body">Revision</div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item decline-btn" data-id="{{ $item->id }}" href="javascript:void(0);">
                                                                        <div class="media">
                                                                            <div class="media-left" style="width: 25px;"><i class="fa fa-ban" aria-hidden="true"></i></div>
                                                                            <div class="media-body">Decline</div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item delete-btn" data-id="{{ $item->id }}" href="javascript:void(0);">
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
<!-- Approve Modal -->
<div class="modal fade text-left" id="approve_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h5 class="modal-title" id="myModalLabel160">Are You Sure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You want to approve this application
                <input type="hidden" name="approve_id" id="approve_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="sure_approve">Sure</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Decline Modal -->
<div class="modal fade text-left" id="decline_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h5 class="modal-title" id="myModalLabel160">Are You Sure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You want to decline the application
                <input type="hidden" name="decline_id" id="decline_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="sure_decline">Sure</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
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
                <input type="hidden" name="delete_id" id="delete_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="sure_del">Sure</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Revision Modal -->
<div class="modal fade text-left" id="revision_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.garage.revision') }}" method="POST">
                @csrf
                <div class="modal-header bg-danger white">
                    <h5 class="modal-title" id="revision_modal160">Give a reason for revision</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="revision_id" value="">
                    <div class="form-group">
                        <label for="message_body">Message Body</label>
                        <textarea name="message_body" id="message_body" class="form-control" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Send</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('extra-js')
    <script>
        $(document).ready(function () {
            $(".delete-btn").click(function (e) {
                e.preventDefault();
                $("#delete_id").val($(this).attr("data-id"));
                $("#delete_modal").modal('show');
            });

            $(".approve-btn").click(function (e) {
                e.preventDefault();
                $("#approve_id").val($(this).attr("data-id"));
                $("#approve_modal").modal('show');
            });

            $(".decline-btn").click(function (e) {
                e.preventDefault();
                $("#decline_id").val($(this).attr("data-id"));
                $("#decline_modal").modal('show');
            });

            $(".revision-btn").click(function (e) {
                e.preventDefault();
                $("#revision_id").val($(this).attr("data-id"));
                $("#revision_modal").modal('show');
            });

            $("#sure_del").click(function (e) {
                e.preventDefault();
                var id = $("#delete_id").val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.garage.delete') }}/"+id,
                    success: function (response) {
                        location.href = "{{ route('admin.garage.applications') }}";
                    }
                });
            });

            $("#sure_decline").click(function (e) {
                e.preventDefault();
                var id = $("#decline_id").val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.garage.decline') }}/"+id,
                    success: function (response) {
                        location.href = "{{ route('admin.garage.applications') }}";
                    }
                });
            });

            $("#sure_approve").click(function (e) {
                e.preventDefault();
                var id = $("#approve_id").val();
                $(this).prop('disabled',true);
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.garage.approve') }}/"+id,
                    success: function (response) {
                        // console.log(response);
                        location.href = "{{ route('admin.garage.applications') }}";
                    }
                });
            });
        });
    </script>
@endsection

