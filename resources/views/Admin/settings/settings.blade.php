@extends('Admin.layouts.master')
@section('title', 'Settings')
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-3">
                    <div class="page-heading">
                        <h3 class="">Settings</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- users edit start -->
            <section class="users-edit">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-tab"
                                       data-toggle="tab" href="#account" aria-controls="account" role="tab"
                                       aria-selected="true">
                                        <i class="feather icon-info mr-25"></i><span
                                            class="d-none d-sm-block">Contact Info</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="password-tab" data-toggle="tab"
                                       href="#password" aria-controls="password" role="tab" aria-selected="false">
                                        <i class="feather icon-lock mr-25"></i><span class="d-none d-sm-block">Password</span>
                                    </a>
                                </li>
                                @if(auth()->user()->role=="admin")
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab"
                                       href="#social" aria-controls="social" role="tab" aria-selected="false">
                                        <i class="feather icon-users mr-25"></i><span
                                            class="d-none d-sm-block">Users</span>
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="advertising-tab" data-toggle="tab"
                                       href="#advertising" aria-controls="advertising" role="tab" aria-selected="false">
                                        <i class="feather icon-lock mr-25"></i><span class="d-none d-sm-block">Advertising</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="plan-pricing-tab" data-toggle="tab"
                                       href="#plan-pricing" aria-controls="plan-pricing" role="tab" aria-selected="false">
                                        <i class="feather icon-lock mr-25"></i><span class="d-none d-sm-block">Plan Pricing</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <form method="post" action="{{route('admin.settings.update_profile')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        <div class="media">
                                            <a href="javascript: void(0);">
                                                @if(isset(Auth::user()->picture))
                                                <img id="image-preview" src="{{asset(Auth::user()->picture)}}" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                @else
                                                <img id="image-preview" src="{{asset('images/user.png')}}" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                @endif
                                            </a>
                                            <div class="media-body mt-75">
                                                <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                    <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                                    <input type="file" name="picture" id="account-upload" hidden>
                                                </div>
                                                <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max size of 800kB</small></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-1">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-firstname">First Name</label>
                                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="account-firstname" placeholder="First Name" value="{{ getFirstName(Auth::user()->name) ?? ''}}" data-validation-required-message="This First Name field is required">
                                                        @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-lastname">Last Name</label>
                                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="account-lastname" placeholder="Last Name" value="{{ getLastName(Auth::user()->name) ?? ''}}" data-validation-required-message="This Last Name field is required">
                                                        @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-e-mail">E-mail</label>
                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="account-e-mail" placeholder="Email" value="{{ Auth::user()->email ?? ''}}" data-validation-required-message="This email field is required">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <p class="mb-0">
                                                        Your email is not confirmed. Please check your inbox.
                                                    </p>
                                                    <a href="javascript: void(0);">Resend confirmation</a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control @error('phone_no') is-invalid @enderror" id="phone" name="phone_no" placeholder="Phone" value="{{ Auth::user()->phone_no ?? '' }}">
                                                    @error('phone_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                    Save changes
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="password" aria-labelledby="password-tab" role="tabpanel">
                                    <!-- users edit Info form start -->
                                    <form action="{{route('admin.settings.update_password')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-old-password">Old Password</label>
                                                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="account-old-password" required placeholder="Old Password" data-validation-required-message="This old password field is required">
                                                        @error('old_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-new-password">New Password</label>
                                                        <input type="password" name="password" id="account-new-password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password" data-validation-required-message="The password field is required" minlength="6">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-retype-new-password">Retype New
                                                            Password</label>
                                                        <input type="password" name="password_confirmation" class="form-control" required id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <div class="custom-control custom-switch custom-switch-danger">
                                                            <label>Set 2-Factor Login Authentication</label><br>
                                                            <input type="checkbox" class="custom-control-input two-factor-box" name="available_status" id="available_status" @if(auth()->user()->two_factor_login==1) checked @else  @endif>
                                                            <label class="custom-control-label" for="available_status"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                    Save changes
                                                </button>
                                                {{-- <button type="button" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                    Set 2-Factor Login Authentication
                                                </button> --}}
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit Info form ends -->
                                </div>
                                <div class="tab-pane" id="social" aria-labelledby="users-tab" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-7 col-12">
                                            <div class="content-header users">
                                                <form>
                                                    <div class="input-group">
                                                        <div class="input-group-append ml-0">
                                                            <button><i class="fa fa-search"></i></button>
                                                        </div>
                                                        <input type="text" class="form-control" name="search" value="@if($request->search) {{$request->search}} @endif" width="100%" id="search" placeholder="Search current members">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-md-5 col-12 text-right">
                                            <button type="button" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light invite-btn">Invite People</button>
                                        </div>
                                    </div>
                                    <div class="mt-3"></div>
                                    @foreach($users as $data)
                                    <div class="row mb-1">
                                        <div class="col-md-9 col-12">
                                            <div class="media">
                                                <div class="media-left">
                                                    @if(isset($data->picture))
                                                    <img class="img-fluid" width="50" src="{{asset($data->picture)}}" alt="Generic placeholder image">
                                                    @else
                                                    <img class="img-fluid" width="50" src="{{asset('images/user.png')}}" alt="Generic placeholder image">
                                                    @endif
                                                </div>
                                                <div class="media-body pl-1">
                                                    <h4>{{getFirstName($data->name)}}@if($data->email_status=="not_verified") <small>( Pending )</small>@endif</h4>
                                                    <p>{{getLastName($data->name)}} <small style="padding-left: 0.5rem;"><i class="fa fa-circle"></i> <span style="padding-left: 0.5rem;">{{$data->email}}</span></small></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="dropdown dropleft float-right">
                                                <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0);">
                                                        <div class="media">
                                                            <div class="media-left" style="width: 25px;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                        <div class="media-body remove-btn" data-id="{{$data->id}}">Remove</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="advertising" aria-labelledby="advertising-tab" role="tabpanel">
                                    <!-- users edit Info form start -->
                                    <form action="{{ route('admin.settings.save') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="city_radius">City Radius</label>
                                                        <input type="text" class="form-control" name="city_radius" id="city_radius" value="{{ setting('city_radius') }}" required placeholder="City Radius">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="district_radius">District Radius</label>
                                                        <input type="text" class="form-control" name="district_radius" id="district_radius" value="{{ setting('district_radius') }}" required placeholder="District Radius">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                    Save changes
                                                </button>
                                                {{-- <button type="button" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                    Set 2-Factor Login Authentication
                                                </button> --}}
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit Info form ends -->
                                </div>
                                <div class="tab-pane" id="plan-pricing" aria-labelledby="plan-pricing-tab" role="tabpanel">
                                    <!-- users edit Info form start -->
                                    <form action="{{ route('admin.settings.save') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="font-weight-bold">1 radius For:</p>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="three_days_price">3 Days Plan</label>
                                                        <input type="text" class="form-control" name="three_days_price" id="three_days_price" value="{{ setting('three_days_price') }}" required placeholder="3 Days Plan">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="five_days_price">5 Days Plan</label>
                                                        <input type="text" class="form-control" name="five_days_price" id="five_days_price" value="{{ setting('five_days_price') }}" required placeholder="5 Days Plan">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="seven_days_price">7 Days Plan</label>
                                                        <input type="text" class="form-control" name="seven_days_price" id="seven_days_price" value="{{ setting('seven_days_price') }}" required placeholder="7 Days Plan">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                    Save changes
                                                </button>
                                                {{-- <button type="button" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                    Set 2-Factor Login Authentication
                                                </button> --}}
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit Info form ends -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
</div>

{{-- Invite User Modal --}}
<!-- Modal -->
<div class="modal fade text-left invite-form" id="user_invitation_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h5 class="modal-title" id="myModalLabel160">Invite user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="invite-form" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="controls">
                                <label for="account-firstname">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="account-firstname" placeholder="First Name" value="" data-validation-required-message="This First Name field is required">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="controls">
                                <label for="account-lastname">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="account-lastname" placeholder="Last Name" value="" data-validation-required-message="This Last Name field is required">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label for="account-e-mail">E-mail</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="account-e-mail" placeholder="Email" value="" data-validation-required-message="This email field is required">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success submit-invite-btn" id="sure_change">Send invitation</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
            </form>
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
                You want to Remove the user!
            </div>
            <div class="modal-footer">
            <form method="GET" action="{{route('admin.settings.remove_user')}}">
                    <input type="hidden" value="" id="remove_id" name="id">
                    <button type="submit" class="btn btn-success" id="sure_del">Sure</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('extra-js')
<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-preview').attr('src', e.target.result);
            $('#image-preview').hide();
            $('#image-preview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#account-upload").change(function() {
    readURL(this);
});

$(document).on("click", ".remove-btn", function(e){
    $("#remove_id").val($(this).attr('data-id'));
    $("#delete_modal").modal('show');
});

$(document).on("click", ".invite-btn", function(e){
    $("#user_invitation_modal").modal('show');
});

$(document).on('click', '.submit-invite-btn', function(event) {
    event.preventDefault();
    $("#user_invitation_modal").modal('hide');
    var data = $(".invite-form").serialize();
    $.ajax({
        type: 'POST',
        data: data,
        url: "{{route('admin.settings.invite_user')}}",
        headers: {
            "cache-control": "no-cache"
        },
        success: function(response) {
            toastr.success(response.msg);
            location.reload(true);
        },
        error: function() {
            toastr.success("Unknown Error!");
        }
    });
});

    $(function()
    {
        var current_url = window.location.href;
        var div_id = current_url.includes('?search');
        if (div_id) {
            $("#social-tab").click();
        }
    });

    $(document).on('change', '.two-factor-box', function(event) {
    event.preventDefault();
    if($(this).prop("checked") == true)
    {
        status=1;
    }
    else if($(this).prop("checked") == false)
    {
        status=0;
    }
    $.ajax({
            type: 'GET',
            url: "{{route('admin.settings.two_factor_login')}}?status="+status,
            headers: {
                "cache-control": "no-cache"
            },
            success: function(response) {
                toastr.success(response.msg);
            },
            error: function() {
                toastr.success("Unknown Error!");
            }
        });
    });
</script>
@endsection

