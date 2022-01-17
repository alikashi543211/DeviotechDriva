@extends('garage.settings.layout')
@section('title','Authentication')
@section('page-heading','Authentication')
@section('settings-content')

<form action="{{route('garage.settings.authentication')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="form-group has-float-label">
                <div class="controls">
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="account-old-password" placeholder="Old Password" data-validation-message="This old password field is">
                    <label for="account-old-password">Old Password</label>
                    @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group has-float-label">
                <div class="controls">
                    <input type="password" name="password" id="account-new-password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password" data-validation-message="The password field is" minlength="6">
                    <label for="account-new-password">New Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group has-float-label">
                <div class="controls">
                    <input type="password" name="password_confirmation" class="form-control" id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-message="The Confirm password field is" minlength="6">
                    <label for="account-retype-new-password">Retype New Password</label>
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
        <!--<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">-->
        <div class="col-12 text-center">
{{--
            <button type="button" id="authentication" class="btn btn-outline-primary mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light">
                Set 2-Factor Login Authentication
            </button> --}}
            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                Save changes
            </button>
        </div>
    </div>
</form>
<!--Modal-->
<div class="modal fade" id="authenticationModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-white">
            <h4>2-Factor Login Authentication</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:30px 10px;">
          <form role="form">
            <p>Enter email address to active 2 step verificaiton.</p>
            <div class="form-group has-float-label">
                <input type="text" class="form-control" id="email" placeholder="Email Address" name="email" autocomplete="off">
                <label for="email">Email Address</label>
            </div>
            <div class="col-12">
                <div class="form-group float-right">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
                <div class="form-group float-right mr-1">
                    <button class="btn btn-primary btn-block">Canncel</button>
                </div>
            </div>
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
    $("#authentication").click(function(){
        $("#authenticationModal").modal();
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
            url: "{{route('garage.settings.two_factor_login')}}?status="+status,
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

