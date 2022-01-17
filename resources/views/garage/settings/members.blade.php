@extends('garage.settings.layout')
@section('title','Manage Members')
@section('page-heading','Manage Members')
@section('settings-content')
<div class="row">
    <div class="col-md-7 col-12">
        <div class="content-header users">
            <form>
            <div class="input-group">
                <div class="input-group-append ml-0">
                    <button><i class="fa fa-search"></i></button>
                  </div>
                <input type="text" class="form-control" name="search" id="search" value="@if($req->search) {{$req->search}} @endif" placeholder="Search current members">
            </div>
            </form>
        </div>
    </div>
    <div class="col-md-5 col-12 text-right">
        <button class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light invite-btn" data-toggle="modal" data-target="#invite_user">Invite User</button>
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
                <h4>{{getFirstName($data->name)}} @if($data->email_status=="not_verified")<small>( Pending )</small>@endif</h4>
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
            <form method="GET" action="{{route('garage.settings.remove_user')}}">
                    <input type="hidden" value="" id="remove_id" name="id">
                    <button type="submit" class="btn btn-success" id="sure_del">Sure</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('settings-js')
<script>
    // Profile Pic Preview Funstion
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });
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
                url: "{{route('garage.settings.invite_user')}}",
                headers: {
                "cache-control": "no-cache"
                },
                success: function(response) {
                    toastr.success(response.msg);
                    location.reload(true);
                },
                error: function() {
                    toastr.error("Unknown Error!");
                }
            });
    });

</script>
@endsection
