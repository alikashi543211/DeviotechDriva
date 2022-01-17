@extends('consumer.settings.layout')
@section('title','Account Settings')
@section('page-heading','Account Settings')
@section('settings-content')
<form action="{{route('consumer.settings.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="media">
                @if(empty($consumer->consumer_profile->picture))
                <a href="javascript: void(0);">
                    <img id="image-preview" src="{{asset('images/user.png')}}" class="rounded mr-75" alt="profile image" height="64" width="64">
                </a>
                @else
                <a href="javascript: void(0);">
                    <img id="image-preview" src="{{asset($consumer->consumer_profile->picture)}}" class="rounded mr-75" alt="profile image" height="64" width="64">
                </a>
                @endif
                <div class="media-body mt-75">
                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                        <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                        <input accept="image/*" type="file" id="account-upload" name="picture" hidden>
                    </div>
                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max size of 800kB</small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2"></div>

    <div class="row">
        <div class="col-6">
            <div class="form-group has-float-label">
                <div class="controls">
                <input type="text" class="form-control required @error('first_name') is-invalid @enderror" name="first_name" value="{{$first_name}}" placeholder="First Name" id="first-name" autocomplete="off">
                @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
                <label for="first_name">First Name</label>
            </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group has-float-label">
                 <div class="controls">
                <input type="text" class="form-control required @error('last_name') is-invalid @enderror" name="last_name" value="{{$last_name}}" placeholder="Last Name" id="last-name" autocomplete="off">
                @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
                <label for="last_name">Last Name</label>
            </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group has-float-label">
                 <div class="controls">
                <input type="email" class="form-control required @error('email') is-invalid @enderror" id="email" value="{{$consumer->email}}" placeholder="Email Address" name="email" autocomplete="off">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="email">E-mail</label>
            </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group has-float-label">
                <div class="controls">
                <input type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" id="contact_no_1" value="{{$consumer->consumer_profile->contact_number}}" placeholder="e.g. 122 3333 444" autocomplete="off">

                <label for="contact_no_1">Contact Number</label>
                @error('contact_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            </div>
        </div>
        <div class="col-6">
            <div class="custom-control custom-switch custom-switch-danger">
                <label>Status</label><br>
                <input type="checkbox" class="custom-control-input available-status-checkbox" name="available_status" id="available_status" @if(consumer()->available_status=='available') checked @endif>
                <label class="custom-control-label" for="available_status"></label>
            </div>
        </div>
        <!--<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">-->
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save changes</button>
        </div>
    </div>
</form>
@endsection
@section('settings-js')
<script>
    $(document).ready(function () {
        $('#first-name').keyup(function (e){
            var last = $('#last-name').val();
            var first = $(this).val();
            $('#display-name').val(first+' '+last);
        });
        $('#last-name').keyup(function (e) {
            var first = $('#first-name').val();
            var last = $(this).val();
            $('#display-name').val(first+' '+last);
        });
    });
    $(document).on('change', '.available-status-checkbox', function(event) {
        event.preventDefault();
        if($(this).prop("checked") == true)
        {
            status="available";
        }
        else if($(this).prop("checked") == false)
        {
            status="away";
        }
        $.ajax({
                type: 'GET',
                url: "{{route('consumer.settings.update_status')}}?status="+status,
                headers: {
                    "cache-control": "no-cache"
                },
                success: function(response) {
                    toastr.success(response.msg);
                    window.location.reload(true);
                },
                error: function() {
                    toastr.error("Unknown Error!");
                }
            });
    });
</script>
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

</script>
<script>
    function showClear() {
        document.getElementById("clearButton").style.display = "block";
    }

    function clearSearch() {
        var input = document.getElementById("searchBox");
        input.value = "";
        document.getElementById("clearButton").style.display = "none";
    }

    function showError(message) {
        var error = document.getElementById("errorMessage");
        error.innerText = message;
        error.style.display = "block";

        setTimeout(function(){
            error.style.display = "none";
        }, 10000)
    }

    function getEventTarget(e) {
        e = e || window.event;
        return e.target || e.srcElement;
    }


</script>
@endsection
