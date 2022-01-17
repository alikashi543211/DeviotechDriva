@extends('consumer.layouts.master')
@section('title','Dashboard')

@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-1">
            <div class="page-heading">
                <h3>Dashboard</h3>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <div class="container-fluid p-0 mb-2">
        <div class="row">
            @if(auth()->user()->email_status=='not_verified')
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="verify_email_notify">
                        <div class="row alert alert-warning m-0">
                            <div class="col-lg-8 col-8 mb-3 m-0 m-auto">
                                <div class="alert-dismissible fade show" role="alert">
                                    <h5 class="mb-0">
                                        <i class="feather icon-mail text-danger text-justify"></i> <span class="alert_verify_text">Verify your email address</span>
                                    </h5>
                                </div>

                            </div>
                            <div class="col-md-4 col-4 m-0 m-auto text-right p-0">
                                <div class="">
                                    <span class="pr-2"><a href="javascript:void(0);" class="btn btn-primary verify_btn mx-1 alert_red_button"><span class="warning_button_text">Verify</span></a></span>
                                    <button type="button" style="background-color:#fff; opacity:1;" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (count(consumer()->consumer_vehicles) == 0)
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="update_booking_notify">
                        <div class="row alert alert-warning m-0">
                            <div class="col-lg-8 col-8 mb-3 m-0 m-auto">
                                <div class="alert-dismissible fade show" role="alert">
                                    <h5 class="font-weight-medium mb-0">
                                        <i class="feather icon-user text-danger"></i> <span class="alert_verify_text">Update your profile details to make a booking</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-4 col-4 m-0 m-auto text-right p-0">
                                <div class="">
                                    <span class="pr-2"><button data-toggle="modal" data-target="#updateProfileModal" class="btn btn-primary mx-1 alert_red_button"><span class="warning_button_text">Update</span></button></span>
                                    <button type="button" style=" background-color:#fff; opacity:1;" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if($notifications->isNotEmpty())
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

                                    <table class="table @if($show_pagination) zero-configuration @endif table-hover">
                                        <thead>
                                        <tr class="d-none">
                                            <th></th>
                                            <th></th>
                                            <th class="text-right"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($notifications as $data)
                                                <tr class="@if(!isset($data->read_at)) font-weight-bold @endif">
                                                <td style="width: 120px;">{{ date('d-M-Y', strtotime(dateFormat($data->created_at)))}}</td>
                                                    <td>@if(!isset($data->read_at)) <a href="{{route('consumer.booking.pending',['booking'=>$data->data['booking_id'],'notify_id'=>$data->id])}}">{{$data->data['msg']}}</a>@else {{$data->data['msg']}}  @endif</td>
                                                    <td class="text-right">{{ $data->created_at->diffForHumans() }}</td>
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
    @endif
    <!--/ Zero configuration table -->
</div>

<!-- Modal -->
<div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="updateProfileModalTitle">Update your profile details to make a booking</h5>
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
                                                    @if(isset(consumer()->contact_number))
                                                        <li role="tab" class="active first current" aria-disabled="false" aria-selected="true" data-step="search_vehicle">
                                                            <a id="steps-uid-0-t-0" href="#steps-uid-0-h-0" aria-controls="steps-uid-0-p-0">
                                                                <span class="current-info audible">current step: </span>
                                                                <span class="step">1</span>
                                                            </a>
                                                        </li>
                                                        <li data-step="show_vehicle" role="tab" class="disabled" aria-disabled="false" aria-selected="true">
                                                            <a id="steps-uid-0-t-1" href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1">
                                                                <span class="step">2</span>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li data-step="phone_number" role="tab" class="current" aria-disabled="true">
                                                            <a id="steps-uid-0-t-2" href="#steps-uid-0-h-2" aria-controls="steps-uid-0-p-2">
                                                                <span class="step">1</span>
                                                            </a>
                                                        </li>
                                                        <li role="tab" class="disabled" aria-disabled="false" aria-selected="true" data-step="search_vehicle">
                                                            <a id="steps-uid-0-t-0" href="#steps-uid-0-h-0" aria-controls="steps-uid-0-p-0">
                                                                <span class="current-info audible">current step: </span>
                                                                <span class="step">2</span>
                                                            </a>
                                                        </li>
                                                        <li data-step="show_vehicle" role="tab" class="disabled" aria-disabled="false" aria-selected="true">
                                                            <a id="steps-uid-0-t-1" href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1">
                                                                <span class="current-info audible">current step: </span>
                                                                <span class="step">3</span>
                                                            </a>
                                                        </li>
                                                    @endif
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

<!-- Update Email Modal -->
<div class="modal fade" id="updateEmailModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModal" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h5 class="modal-title" id="myModalLabel160">Verify your email address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding:30px 10px;">
            <form class="display_email_update_form" action="{{ route('consumer.resend_verify_email') }}">
                @csrf
                    <div class="row">
                        <div class="col-12">
                            <p class="font-weight-bold">We will resend a verification link to your email address below so you can verify your account</p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <fieldset class="form-label-group mb-0">
                                <input type="email" name="email" class="form-control email_box" placeholder="Email" value="{{auth()->user()->email}}">
                                <label for="textarea-counter"></label>
                            </fieldset>

                        </div>
                    </div>
                    <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
                                <button type="submit" class="btn btn-primary email_update_btn">Resend</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            @if(!$show_pagination)
            $('.sort-dropdown').hide();
            @endif
            $(document).on("keypress", function(e){
                if(e.which == 13){
                    $('.modal-button').click();
                }
            });

            @if(isset(consumer()->contact_number))
                loadSearchVehicleFrom();
            @else
                loadPhoneForm();
            @endif

            $(document).on("click",".circle-tabs-section ul li",function() {
                if ($(this).attr('data-step') == "phone_number") {
                    $(".circle-tabs-section ul li").removeClass('active');
                    $(".circle-tabs-section ul li").removeClass('first');
                    $(".circle-tabs-section ul li").removeClass('current');
                    $(".circle-tabs-section ul li").addClass('disabled');
                    $(".circle-tabs-section ul li").addClass('last');
                    $(this).addClass('active');
                    $(this).addClass('first');
                    $(this).addClass('current');
                    $('.profileModal-body').html("<div class='row'><div class='col-12 text-center m-auto'><div class='lds-ring'><div></div><div></div><div></div><div></div></div></div></div>");
                    loadPhoneForm();
                }
                else if($(this).attr('data-step') == "search_vehicle"){
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

            $(document).on("click",'.phone_submit', function(){
                var contact_number=$("#contact_number").val();
                if(contact_number!='')
                {
                    count_digits=contact_number.replace(/[^0-9]/g,"").length;
                    if(count_digits==11){
                    var form_html = $('.profileModal-body').html();
                    var phone_elm = $('.circle-tabs-section ul').find("[data-step=phone_number]");
                    var search_elm = $('.circle-tabs-section ul').find("[data-step=search_vehicle]");
                    var form = $("#phoneForm").serialize();
                    $('.profileModal-body').html("<div class='row'><div class='col-12 text-center m-auto'><div class='lds-ring'><div></div><div></div><div></div><div></div></div></div></div>");
                    $.ajax({
                                type: "POST",
                                url: "{{ route('save.phone.form') }}",
                                data: form,
                                success: function (response) {
                                    if (response.error) {
                                        toastr.error(response.error);
                                        $('.profileModal-body').html(form_html);
                                    }
                                    else{
                                        toastr.success(response.success);
                                        loadSearchVehicleFrom();
                                        phone_elm.removeClass('active');
                                        phone_elm.removeClass('first');
                                        phone_elm.removeClass('current');
                                        phone_elm.addClass('disabled');
                                        phone_elm.addClass('last');
                                        search_elm.addClass('active');
                                        search_elm.addClass('first');
                                        search_elm.addClass('current');
                                    }
                                }
                            });
                        }else
                        {
                            toastr.error("Check the contact number and try again");
                        }
                }else
                {
                    toastr.error("Add your contact number");
                }

            });

            $(document).on("click",'.reg_search', function(){
                if($("#registration_number").val()!='')
                {
                    var search_elm = $('.circle-tabs-section ul').find("[data-step=search_vehicle]");
                    var show_elm = $('.circle-tabs-section ul').find("[data-step=show_vehicle]");
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
                var search_elm = $('.circle-tabs-section ul').find("[data-step=search_vehicle]");
                var show_elm = $('.circle-tabs-section ul').find("[data-step=show_vehicle]");

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
                         Swal.fire({
                            title: response.title,
                            icon: response.icon,
                            timer: 3000,
                            text: response.msg,
                        });
                         setTimeout(function () { location.reload(true); }, 500);
                        $('.profile_notif').remove();
                    }
                });
            });
        });

        $(document).on("click", ".verify_btn", function(e){
            $("#updateEmailModal").modal('show');
        });

    </script>
    <!-- BEGIN: Page JS-->

    <!-- END: Page JS-->
@endsection
