@extends('consumer.profile.layout.master')
@section('main-content')
<div class="content-body">
    <div id="user-profile">
        <div class="row cover-profile">

        </div>
        <div class="container-fluid">
            <div class="row alert alert-warning profile_verify_email_notify">
                <div class="col-lg-10 col-10 mb-3 m-0 m-auto">
                    <div class="alert-dismissible fade show" role="alert">
                        <h5 class="font-weight-bold mb-0 text-left">
                            <i class="feather icon-mail text-danger text-justify"></i> <span class="alert_verify_text">Verify your email address</span>
                        </h5>
                    </div>

                </div>
                <div class="col-md-2 col-2 m-0 m-auto text-right p-0">
                    <div class="">
                        <span class="pr-2"><a href="javascript:void(0);" class="btn btn-primary verify_btn mx-1 alert_red_button"><span class="warning_button_text text-white">Verify</span></a></span>
                        <button style="margin-top:9px; background-color:#fff; opacity:1;" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row alert alert-warning profile_display_name_notify">
                <div class="col-lg-10 col-10 mb-3 m-0 m-auto text-left">
                    <div class="alert-dismissible fade show" role="alert">
                        <h5 class="font-weight-bold mb-0">
                            <i class="feather icon-user text-danger"></i> <span class="alert_verify_text">Update your display name (optional)</span>
                        </h5>
                    </div>

                </div>
                <div class="col-md-2 col-2 m-0 m-auto text-right p-0">
                    <div class="">
                        <span class="pr-2"><button data-toggle="modal" data-target="#updateProfileModal" class="btn btn-primary mx-1 alert_red_button"><span class="warning_button_text text-white">Update</span></button></span>
                        <button style="margin-top:9px; background-color:#fff; opacity:1;" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
 <div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModal" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h5 class="modal-title" id="myModalLabel160">Update your display name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding:30px 10px;">
                <form class="display_name_update_form">
                @csrf
                    <div class="row">
                        <div class="col-12">
                            <p class="font-weight-bold">You can update your display name below with another display name if it is available</p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <fieldset class="form-label-group mb-0">
                                <input type="text" name="display_name" class="form-control display_name_box" placeholder="Display Name" value="{{consumer()->display_name}}">
                                <label for="textarea-counter"></label>
                            </fieldset>

                        </div>
                    </div>
                    <div class="mt-3"></div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
                            <button type="submit" class="btn btn-primary display_name_update_btn">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
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

@section('extra-js')
<script>
    $(document).on("click", ".verify_btn", function(e){
        $("#updateEmailModal").modal('show');
    });
    $(document).on("submit", '.display_name_update_form', function(e){
        e.preventDefault();
        var form = $('.display_name_update_form').serialize();
        $.ajax({
            type: "POST",
            url: "{{ route('consumer.update.display_name') }}",
            data: form,
            success: function (response) {
                $("#updateProfileModal").modal('hide');
                if(response.result=="success"){
                    toastr.success(response.msg);
                    $(".display_name_box").val(response.display_name);
                    $(".display_name").text(response.display_name);
                    setTimeout(function () { location.reload(true); }, 500);
                }else{
                    toastr.error(response.msg);
                }

            }
        });
    });
</script>

@endsection


