@extends('garage.layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/plugins/forms/wizard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css">
    <style>

        .dtp>.dtp-content>.dtp-date-view>header.dtp-header{
            background: #EA5455;
        }
        .dtp div.dtp-date, .dtp div.dtp-time{
            background: #E87E7F;
        }
        .profile-boxes{
            box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.15);
            background-color: #FFFFFF;
            border-radius: 5px;
            border: 1px solid;
            border-color: transparent;
            margin-right: 1rem;
            cursor: pointer;
            transition: all 0.5s ease;
        }
        .services{
            width: 120px;
            height: 120px;
            padding-top: 1.5rem;
        }
        .customer-facilities{
            width: 130px;
            height: 120px;
            padding-top: 1.5rem;
        }
        .payments{
            width: 130px;
            height: 120px;
            padding-top: 1.5rem;
        }
        .profile-boxes-check{
            display: none;
        }
        .profile-boxes .inner-profile-boxes{
        }
        .profile-boxes img{
            width: 50px !important;
        }
        .profile-boxes:hover{
            border: 1px solid;
            border-color: #EA5455;
            transition: all 0.5s ease;
        }
        .form-control-position{
            top: 5px !important;
        }
        .app-content .wizard > .content > .body{
            padding: 0px !important;
        }
        .img-uploader{
            position: relative;
        }
        .add-img{
            color: #EA5455;
            font-size: 18px;
            position: absolute;
            top: 0;
            right: 18px;
            cursor: pointer;
            z-index: 999;
        }
        .tabs-section ul{
            padding: 0px !important;
            margin: 0px !important;
        }
        .tabs-section ul li{
            display: inline-block;
            list-style: none !important;
            text-align: center;
        }
        .tabs-section ul li a{
            display: block;
            height: 50px;
            width: 200px;
            line-height: 50px;
            background-color: #fff;
            box-shadow: 0 3px 10px 0 rgba(8, 8, 8, 0.15);
            color: #000000;
            font-weight: 600;
            transition: all 0.5s ease;
        }
        .tabs-section ul li a:hover{
            background-color: #EA5455;
            color: #ffffff;
            transition: all 0.5s ease;
        }
        .tabs-section ul li.active a{
            background-color: #EA5455;
            color: #ffffff;
            transition: all 0.5s ease;
        }
    </style>
    @yield('application-css')
@endsection
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-3">
            <div class="page-heading">
                <h3>
                    @if(!garage_is_approved(garage())) Application for Garage Account
                    @else
                        Edit Garage Profile
                    @endif
                </h3>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <div class="row">
        <div class="col-12">
            <div class="tabs-section">
                <ul>
                    <li class="{{ (request()->is('garage/application/contact-information')) ? 'active' : '' }}"><a href="{{ route('garage.application.contact_info') }}">Contact Information</a></li>

                    @if (garage()->registration_step == "garage_profile")
                        <li class="disabled"><a>Description</a></li>
                    @else
                        <li class="{{ (request()->is('garage/application/description')) ? 'active' : '' }}"><a href="{{ route('garage.application.description') }}">Description</a></li>
                    @endif

                    @if (garage()->registration_step == "garage_profile" || garage()->registration_step == "services_and_facilities")
                        <li class="disabled"><a>Working Hours</a></li>
                    @else
                        <li class="{{ (request()->is('garage/application/working-hours')) ? 'active' : '' }}"><a href="{{ route('garage.application.working_hours') }}">Working Hours</a></li>
                    @endif

                    @if (garage()->registration_step == "garage_profile" || garage()->registration_step == "services_and_facilities" || garage()->registration_step == "working_hours")
                        <li class="disabled"><a>Gallery</a></li>
                    @else
                        <li class="{{ (request()->is('garage/application/gallery')) ? 'active' : '' }}"><a href="{{ route('garage.application.gallery') }}">Gallery</a></li>
                    @endif

                    @if (garage()->registration_step == "garage_profile" || garage()->registration_step == "services_and_facilities" || garage()->registration_step == "working_hours" || garage()->registration_step == "gallery")
                        <li class="disabled"><a>Overview</a></li>
                    @else
                        <li class="{{ (request()->is('garage/application/overview')) ? 'active' : '' }}"><a href="{{ route('garage.application.overview') }}">Overview</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    @yield('application-content')
</div>
@endsection
@section('js')
    <script src="{{ asset('assets/app-assets/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/forms/wizard-steps.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();

            $('.datetimepicker').bootstrapMaterialDatePicker({ date: false,format: 'HH:mm', });

            // Tags input style
            $(".tagsinput").removeAttr('style');
            $(".tagsinput").addClass('form-control');
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
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                dots:false,
                autoplay:true,
                autoplayTimeout:1500,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            });
        });
    </script>
@yield('application-js')
@endsection
