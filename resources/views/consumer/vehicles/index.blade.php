@extends('consumer.layouts.master')
@section('title', 'Vehicles')
@section('content')

<div class="content-header">
    <div class="row">
        <div class="col-md-6 col-sm-6 mb-3">
            <div class="page-heading">
                <h3>Vehicles</h3>
            </div>
        </div>

    </div>
</div>
<div class="content-body">
@if($consumer_vehicles->isNotEmpty())
    <section id="basic-datatable">
        <div class="row">

            <div class="col-12">

                <div class="card">
                        {{-- <h4 class="card-title">VEHICLES</h4> --}}
                        <div class="row mt-1 mx-2">
                            <div class="col-md-12 text-right">
                                <button data-toggle="modal" data-target="#updateProfileModal" class="btn btn-primary">Add</button>
                            </div>
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
                                {{-- zero-configuration --}}
                                <table class="table zero-configuration table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>VRM </th>
                                            <th>Make</th>
                                            <th>Model</th>
                                            <th>Engine Size</th>
                                            <th>Body Type</th>
                                            <th>Colour</th>
                                            <th>Image</th>
                                            <th>Added</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="vehicles-table-body">
                                        @foreach($consumer_vehicles as $data)
                                        <tr>
                                            <td class="serial_no">{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="tbl-vrm"><span>{{ $data->vrm }}</span></div>
                                            </td>
                                            <td>{{ $data->make }}</td>
                                            <td>{{ $data->model }}</td>
                                            <td>{{ $data->engine_size }}</td>
                                            <td>{{ $data->body_type ?? 'N/A' }}</td>
                                            <td>{{ $data->colour ?? 'N/A' }}</td>
                                            <td><img src="{{ asset($data->image_url) }}" width="80" class="img-fluid"></td>
                                            <td>{{ date('d-M-Y', strtotime(dateFormat($data->created_at)))}}</td>
                                            <td class="text-center">
                                                <div class="dropdown dropleft float-right">
                                                    <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('consumer.booking.history',["vehicle"=>$data->id])}}">
                                                            <div class="media">
                                                                <div class="media-left" style="width: 25px;"><i class="fa fa-history" aria-hidden="true"></i></div>
                                                                <div class="media-body">Previous History</div>
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
    @else
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12 mb-3 m-0 m-auto text-center">
                <div class="alert-dismissible fade show" role="alert">
                    <h5 class="font-weight-bold mb-0">
                        <i class="fa fa-car font-large-2"></i>
                    </h5>
                </div>
            </div>
            <div class="col-md-3 col-3"></div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12 mb-3 m-0 m-auto text-center">
                <div class="alert-dismissible fade show" role="alert">
                    <h5 class="font-weight-bold mb-0">
                        <p class="mt-1">You do not have a vehicle saved on your account yet!<br>
                            <small>Get <a href="javascript:void(0);" data-toggle="modal" data-target="#updateProfileModal">started</a> by adding your vehicle</small>

                        </p>
                        <p class="p-0">
                            <button data-toggle="modal" data-target="#updateProfileModal" class="btn btn-danger px-3 waves-effect waves-light" role="menuitem"><i class="fa fa-plus"></i> Add</button>
                        </p>
                    </h5>
                </div>
            </div>
            <div class="col-md-3 col-3"></div>
        </div>
    </div>
    @endif

</div>

<div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                 <h5 class="modal-title" id="updateProfileModalTitle">Add your vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card bg-white">
                                <div class="card-header">
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-0">
                                        <form action="#" class="number-tab-steps wizard-circle wizard clearfix" role="application" id="steps-uid-1">
                                            <div class="steps clearfix circle-tabs-section">
                                                <ul role="tablist" class="tablist">
                                                        <li role="tab" class="active first current" aria-disabled="false" aria-selected="true" data-step="search_vehicle">
                                                            <a id="steps-uid-0-t-0" href="javascript:void(0);" aria-controls="steps-uid-0-p-0">
                                                                <span class="current-info audible">current step: </span>
                                                                <span class="step">1</span>
                                                            </a>
                                                        </li>
                                                        <li data-step="show_vehicle" role="tab" class="disabled" aria-disabled="false" aria-selected="true">
                                                            <a id="steps-uid-0-t-1" href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1">
                                                                <span class="step">2</span>
                                                            </a>
                                                        </li>
                                                </ul>
                                            </div>
                                            <div class="content clearfix">
                                            <!-- Step 1 -->
                                            <h6 id="steps-uid-0-h-0" tabindex="-1" class="title current" data-step="search_vehicle">Step 1</h6>
                                            <fieldset id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                                              
                                            </fieldset>

                                            <!-- Step 2 -->
                                            
                                        </div>
                                    </form>
                                    <div class="profileModal-body">

                                    </div>
                                    </div>
                                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $(document).on("keypress", function(e){
                if(e.which == 13){
                    $('.modal-button').click();
                }
            });

            loadSearchVehicleFrom();

            $(document).on("click",".circle-tabs-section ul li",function() {
                if($(this).attr('data-step') == "search_vehicle"){
                    $(".circle-tabs-section ul li").removeClass('active');
                    $(".circle-tabs-section ul li").removeClass('first');
                    $(".circle-tabs-section ul li").removeClass('current');
                    $(".circle-tabs-section ul li").addClass('disabled');
                    $(".circle-tabs-section ul li").addClass('last');
                    $(this).addClass('active');
                    $(this).addClass('first');
                    $(this).addClass('current');
                    $('.profileModal-body').html("<div class='row'><div class='col-12 text-center m-auto'><div class='lds-ring'><div></div><div></div><div></div><div></div></div></div></div>");
                    loadSearchVehicleFrom();
                }
            });

            function loadPhoneForm()
            {
                $.ajax({
                    type: "GET",
                    url: "{{ route('load.phone.form') }}",
                    success: function (response) {
                        $('.profileModal-body').html(response);
                    }
                });
            }

            function loadSearchVehicleFrom()
            {
                $.ajax({
                    type: "GET",
                    url: "{{ route('load.search.vehicle.form') }}",
                    success: function (response) {
                        $('.profileModal-body').html(response);
                    }
                });
            }


            $(document).on("click",'.reg_search', function(){
                if($("#registration_number").val()!='')
                {
                    var search_elm = $('.circle-tabs-section').find("[data-step=search_vehicle]");
                    var show_elm = $('.circle-tabs-section').find("[data-step=show_vehicle]");
                    var form = $("#registration_number").val();$('.profileModal-body').html("<div class='row'><div class='col-12 text-center m-auto'><div class='lds-ring'><div></div><div></div><div></div><div></div></div></div></div>");
                    $.ajax({
                            type: "GET",
                            url: "{{ url('/') }}/consumer/search-vehicle/"+form,
                            success: function (response) {
                                console.log(response);
                                if (response.error) {
                                    toastr.error(response.error);
                                    loadSearchVehicleFrom();
                                }
                                else{
                                    console.log(response);
                                    $('.profileModal-body').html(response);
                                    search_elm.removeClass('active');
                                    search_elm.removeClass('first');
                                    search_elm.removeClass('current');
                                    search_elm.addClass('disabled');
                                    search_elm.addClass('last');
                                    show_elm.addClass('active');
                                    show_elm.addClass('first');
                                    show_elm.addClass('current');
                                }
                            },
                        });
                }else
                {
                    toastr.error("Add your vehicle registration number");
                }
            });

            $(document).on("click",'.back_search', function(){
                $('.profileModal-body').html("<div class='row'><div class='col-12 text-center m-auto'><div class='lds-ring'><div></div><div></div><div></div><div></div></div></div></div>");
                var search_elm = $('.circle-tabs-section').find("[data-step=search_vehicle]");
                var show_elm = $('.circle-tabs-section').find("[data-step=show_vehicle]");
                loadSearchVehicleFrom();
                show_elm.removeClass('active');
                show_elm.removeClass('first');
                show_elm.removeClass('current');
                show_elm.addClass('disabled');
                show_elm.addClass('last');
                search_elm.addClass('active');
                search_elm.addClass('first');
                search_elm.addClass('current');
                });

            $(document).on("click", '.save_vehicle', function(){
                $(this).prop('disabled', true);
                var form = $('#saveVehicleForm').serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('save.vehicle') }}",
                    data: form,
                    success: function (response) {
                        $('#updateProfileModal').modal('hide');
                        if(response.icon=='success'){
                            response.msg="Your vehicle has been added";
                        }
                        Swal.fire({
                            title: response.title,
                            icon: response.icon,
                            timer: 3000,
                            text: response.msg,
                        });
                        $('.profile_notif').remove();
                        setTimeout(function () 
                            { 
                                if(response.icon=='success')
                                {
                                    @if(isset(request()->b))
                                        window.location.href="{{route('consumer.garages.book_garage',base64_decode(request()->b))}}";
                                    @endif
                                }       
                            },
                             500);
                        location.reload(true); 
                    }
                });
                });
            });
            @if(isset(request()->b))
                toastr.error("Add at least one vehicle to book garage");
            @endif
    </script>
@endsection

