@extends('consumer.layouts.master')
@section('title','Profile')
@section('css')
<style>
    .avatar-img
    {
        object-fit:cover;
        height:120px;
        width:120px !important;
    }
    .cover-art
    {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 370px;
        margin: auto;
    }
    .cover-art img
    {
        width: 80px;
    }
    .cover-art h3{
        color: #ffffff;
    }
    .cover-art p{
        color: #ffffff;
    }
</style>
@yield('extra-css')

@endsection
@section('content')

<div class="content-body">    
    <div id="user-profile">
        <div class="row cover-profile">
        	<div class="col-6 justify-content-center text-center">
                <div class="cover-art" style="background-image: url({{ asset('images/cover_art.png') }})">
                    <div class="pt-5"></div>
                    <div class="row">
                        <div class="col-12 justify-content-center text-center">
                            <div>
                                <button type="button" class="btn rounded-circle upload_profile_pic_btn p-0">
                                    <label class="cursor-pointer" for="account-upload">
                                        @if(empty(consumer()->picture))
                                        <img src="{{asset('images/user.png')}}" class="rounded-circle img-border box-shadow-1 avatar-img cursor-pointer" for="account-upload" alt="Card image" id="image-preview">
                                        @else
                                        <img src="{{ asset(consumer()->picture) }}" class="rounded-circle img-border box-shadow-1 avatar-img cursor-pointer" for="account-upload" alt="Card image" id="image-preview">
                                         @endif
                                    </label>
                                    <input accept="image/*" type="file" id="account-upload" class="upload_pic_input" name="picture" hidden>
                                </button>
                                <h3 class="mt-2 display_name">{{ consumer()->display_name }}</h3>
                                <p><strong>Member since:</strong> {{ date('d-M-Y', strtotime(dateFormat(consumer()->created_at)))}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5"></div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <form enctype="multipart/form-data" class="upload_profile_pic_form">
                                @csrf
                                <button  type="button" class="btn btn-icon btn-lg btn-icon rounded-circle upload_profile_pic_btn">
                                    <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload"><i class="fa fa-camera-retro" aria-hidden="true"></i></label>
                                    <input accept="image/*" type="file" id="account-upload" class="upload_pic_input" name="picture" hidden>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 justify-content-center text-center">
                @yield('main-content')
            </div>
        </div>
    </div>
</div>

    <!-- Modal To Crop Image -->
<div class="modal fade" id="cropImageModal" tabindex="-1" role="dialog" aria-labelledby="cropImageModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h5 class="modal-title" id="myModalLabel160">Crop your image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding:30px 10px;">
            <form class="display_email_update_form" action="" enctype="multipart/form-data" id="formValues">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <p class="font-weight-bold">Select the area that will be cropped</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="upload-demo"></div>
                        <img src="" class="pr" alt="">
                    </div>
                </div>
                <div class="mt-3"></div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
                        <button type="button" class="btn btn-primary email_update_btn save_button">Save</button>
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
    $resize = $('#upload-demo').croppie({
        enforceBoundary: true,
        enableExif: false,
        // enableOrientation: true,
        viewport: { // Default { width: 100, height: 100, type: 'square' }
            width: 250,
            height: 250,
            type: 'circle' //square
        },
        boundary: {
            width: 300,
            height: 300
        }
    });
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $resize.croppie('bind', {
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
                $(document).on("click", ".save_button", function(ev) {
                    $(this).prop("disabled",true);
                    $resize.croppie('result', {
                        type: 'blob',
                        size: 'original',
                        format: 'png',
                        backgroundColor:'#fff',
                        circle:true
                    }).then(function (img) {
                        console.log(img);
                        var data = new FormData();
                        data.append("picture", img, "consumer.png");
                        var form = $("#formValues");
                        var other_data = $(form).serializeArray();
                        $.each(other_data,function(key,input){
                            data.append(input.name,input.value);
                        });
                        $.ajax({
                            type: 'POST',
                            data: data,
                            cache: !1,
                            contentType: !1,
                            processData: !1,
                            url: "{{ route('consumer.save_picture') }}",
                            async: true,
                            headers: {
                                "cache-control": "no-cache"
                            },
                            success: function(data) {
                                console.log(data);
                                toastr.success(data.success);
                                window.location.reload();
                            },
                            error: function(response) {
                                alert('Something went Wrong Please try again!');
                                console.log(response);
                                location.reload(true);
                            }
                        });
                    });
                });
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.upload_pic_input').change(function() {
        $img = this;
        $("#cropImageModal").modal('show');
        console.log(this);
        $("#cropImageModal").on("shown.bs.modal", function () {
            // after modal being completely opened, fire the readURL() function
            readURL($img);
        });
    });

</script>
@yield('extra-js')
@endsection


