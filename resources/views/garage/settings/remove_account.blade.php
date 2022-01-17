@extends('garage.settings.layout')
@section('title','Account & Profile')
@section('page-heading','Account & Profile')
@section('settings-content')

<div class="mt-2"></div>
<div class="row">
    <div class="col-6">
        <button type="submit" class="btn btn-outline-primary mr-sm-1 mb-1 mb-sm-0 del-garage-btn btn-block" data-type="1">Delete Profile</button>
    </div>
    <div class="col-6">
        <button type="submit" class="btn btn-outline-primary mr-sm-1 mb-1 mb-sm-0 del-garage-btn btn-block" data-type="2">Delete Account</button>
    </div>
</div>

<!-- Delete confirmation modal -->
<div class="modal fade text-left" id="del_garage_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h5 class="modal-title" id="myModalLabel160">Are You Sure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You want to delete your profile
                <input type="hidden" name="id" id="del_garage_id" value="">
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-success sure_button" id="sure_approve">Sure</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
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

    $(".del-garage-btn").click(function (e) {
        e.preventDefault();
        var type=$(this).attr("data-type");
        var url="{{route('garage.settings.delete_profile')}}?type="+type;
        $(".sure_button").attr("href",url);
        $("#del_garage_modal").modal('show');
    });

</script>
@endsection
