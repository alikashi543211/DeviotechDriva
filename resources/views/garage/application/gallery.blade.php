@extends('garage.application.layout')

@section('title','Garage account application – Driva')

@section('application-content')
<style type="text/css">
    .grey-bg{
      background-color: #727070 !important;
    color: #FFFFFF !important;
     padding: 0.9rem 3rem;
    }
    .grey-bg:hover {
    border-color: #727070 !important;
    color: #FFFFFF !important;
    box-shadow: 0 8px 25px -8px #727070;
}
.btn-save {

    padding: 0.9rem 4rem;

}
</style>
    <div class="row mt-2 mb-2">
        <div class="col-12">
            <h6>Please add images to your garage profile</h6>
        </div>
    </div>
    <form method="post" action="{{ route('garage.application.gallery') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mt-4">
            <div class="col-12 mb-1">
                <h5>UPLOAD GARAGE LOGO</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="media">
                                <a href="javascript: void(0);">
                                    @if (garage()->logo)
                                        <img id="image-preview" src="{{asset(garage()->logo)}}" class="rounded mr-75" alt="profile image" height="100" width="100">
                                    @else
                                        <img id="image-preview" src="{{asset('images/user.png')}}" class="rounded mr-75" alt="profile image" height="100" width="100">
                                    @endif

                                </a>
                                <div class="media-body mt-75">
                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                        <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                        <input type="file" id="account-upload" name="logo" hidden>
                                    </div>
                                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max size of 800kB</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 mb-1">
                <h5>UPLOAD GALLERY PHOTOS</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-muted mb-2"><small>Maximum 8 images allowed</small></p>
                        </div>
                    </div>
                    <div class="row">
                        @if (count(garage()->garage_images) > 0)
                            @foreach (garage()->garage_images as $gi)
                                <div class="col-3 mb-2 image-box">
                                    <img src="{{asset($gi->image)}}" class="img-fluid">
                                    <span data-id = "{{ $gi->id }}" data-image = "{{ $gi->image }}" class="delete-img"><i class="fa fa-trash"></i></span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row" id="gallery-container">
                        <div class="col-2 mb-2">
                            <div class="img-uploader"><input type="file" name="images[]" class="dropify" data-height="100"></div>
                            <span class="add-img"><i class="fa fa-plus-square"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <a href="{{ route('garage.application.working_hours') }}" class="btn btn-light grey-bg mr-1 mb-1 waves-effect waves-light">Previous</a>
                <button type="submit" class="btn btn-save btn-primary mr-1 mb-1 waves-effect waves-light">Next</button>
            </div>
        </div>
    </form>
@endsection
@section('application-js')
<script>
    @foreach($errors->all() as $error)
        toastr.error("{{ $error }}");
    @endforeach
</script>
<script type="text/javascript">
    var img_count = {{ count(garage()->garage_images) > 0 ? count(garage()->garage_images)+1 : 1 }};
    $(document).on('click', '.add-img', function(){
        if(img_count < 7)
        {
            $('#gallery-container').append(
                '<div class="col-2 mb-2">\
                    <div class="img-uploader"><input type="file" name="images[]" class="dropify" data-height="100"></div>\
                    <span class="add-img"><i class="fa fa-plus-square"></i></span>\
                    <span class="remove-img"><i class="fa fa-trash"></i></span>\
                </div>'
            );

            img_count++;
        }
        else if(img_count == 7)
        {
            $('#gallery-container').append(
                '<div class="col-2 mb-2">\
                    <div class="img-uploader"><input type="file" name="images[]" class="dropify" data-height="100"></div>\
                    <span class="remove-img last"><i class="fa fa-trash"></i></span>\
                </div>'
            );

            img_count++;
        }
        $('.dropify').dropify();
    });
    $(document).on('click', '.remove-img', function(){
        $(this).closest('.col-2').remove();
        img_count--;
    });

    $(document).on('click', '.delete-img', function(){
        var elm = $(this);
        var id = $(this).attr('data-id');
        var image = $(this).attr('data-image');
        $.ajax({
            type: "POST",
            url: "{{ route('garage.application.del.gallery') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                image: image,
            },
            success: function (response) {
                if (response.success) {
                    toastr.success(response.success);
                    $(elm).closest('.image-box').remove();
                    img_count--;
                } else {
                    toastr.error(response.error);
                }
            }
        });
    });
</script>
@endsection
