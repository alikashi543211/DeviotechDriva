@extends('garage.settings.layout')
@section('title','Account & Profile')
@section('page-heading','Account & Profile')
@section('settings-content')
<form action="{{route('garage.settings.account')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-12">
        <div class="media">
            <a href="javascript: void(0);">
            @if(isset(garage()->picture))
            <img id="image-preview" src="{{asset(garage()->picture)}}" class="rounded mr-75" alt="profile image" height="64" width="64">
            @else
                <img id="image-preview" src="{{asset('images/user.png')}}" class="rounded mr-75" alt="profile image" height="64" width="64">
            @endif
            </a>
            <div class="media-body mt-75">
                <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                    <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                    <input type="file" id="account-upload" name="picture" accept="image/*" hidden>
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
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name', getFirstName(auth()->user()->name))}}" placeholder="First Name" id="first_name" autocomplete="off">
                    <label for="first_name">First Name</label>
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group has-float-label">
                <div class="controls">
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name', getLastName(auth()->user()->name))}}" placeholder="Last Name" id="last_name" autocomplete="off">
                    <label for="last_name">Last Name</label>
                    @error('last_name')
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
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email', auth()->user()->email)}}" placeholder="Email Address" name="email" autocomplete="off">
                    <label for="email">E-mail</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        @if(auth()->user()->role=="garage")
        <div class="col-6">
            <div class="form-group has-float-label">
                <div class="controls">
                    <input type="text" class="form-control @error('contact_1') is-invalid @enderror" name="contact_1" id="contact_no_1" value="{{old('contact_1', garage()->contact_1)}}" placeholder="e.g. 122 3333 444" autocomplete="off">
                    <label for="contact_no_1">Contact Number 1</label>
                    @error('contact_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group has-float-label">
                <div class="controls">
                    <input type="text" class="form-control @error('contact_2') is-invalid @enderror" name="contact_2" id="contact_no_2" value="{{old('contact_2', garage()->contact_2)}}" placeholder="e.g. 122 3333 444" autocomplete="off">
                    <label for="contact_no_2">Contact Number 2</label>
                    @error('contact_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="custom-control custom-switch custom-switch-danger">
                <label>Are you available?</label><br>
                <input type="checkbox" class="custom-control-input @error('available_status') is-invalid @enderror" name="available_status" id="email_marketing" @if(garage()->available_status=='available') checked @endif>
                <label class="custom-control-label" for="email_marketing"></label>
                @error('available_status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @endif
        <!--<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">-->
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save changes</button>
        </div>
    </div>
</form>

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

</script>
@endsection
