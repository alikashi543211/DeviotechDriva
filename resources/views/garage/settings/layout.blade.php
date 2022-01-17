@extends('garage.layouts.master')
@section('title','Profile')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css">
    <style>
        .dtp>.dtp-content>.dtp-date-view>header.dtp-header{
            background: #EA5455;
        }
        .dtp div.dtp-date, .dtp div.dtp-time{
            background: #E87E7F;
        }
        .dtp .p10>a{
            color: #ffffff;
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
            margin-bottom: 1rem;
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
        div.tagsinput{
            width: auto !important;
            height: auto !important;
        }
        div.tagsinput input{
            margin: 0px !important;
            width: 100% !important;
        }
        div.tagsinput span.tag{
            background: #EA5455 !important;
            color: #FFFFFF !important;
            border-color: transparent !important;
            margin-bottom: 0px !important;
        }
        div.tagsinput span.tag a{
            font-size: 13px;
            color: #FFFFFF;
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

.nav-pills .nav-link {
  border-radius : 0;
  color: #000;
}

.nav-pills .nav-link.active, .nav-pills .show > .nav-link {


    color:#EA5455 !important;
    background-color:transparent;


     border-right:3px solid #EA5455;
}



    </style>
@endsection
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-3">
            <div class="page-heading">
                <h3 class="float-left">@yield('page-heading')</h3>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('garage.dashboard') }}">
                                <span class="feather-icon select-none relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home h-5 w-5 mb-1 stroke-current text-primary">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">@yield('page-heading')
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section id="page-account-settings">
        <div class="row">
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                    <li class="nav-item">
                        <a href="{{ route('garage.settings.account') }}" class="nik nav-link d-flex py-75 {{ (request()->is('garage/settings/update-profile')) ? 'active' : '' }}" style="border-radius: 0; color:#000;" >
                            <i class="feather icon-user mr-50 font-medium-3"></i>
                            General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('garage.settings.authentication') }}" class="nik  nav-link d-flex py-75 {{ (request()->is('garage/settings/authentication')) ? 'active' : '' }}" style="border-radius: 0; color:#000;">
                            <i class="feather icon-lock mr-50 font-medium-3"></i>
                            Password
                        </a>
                    </li>
                    <!--<li class="nav-item">
                        <a href="{{ route('garage.settings.company') }}" class="nav-link d-flex py-75 {{ (request()->is('garage/settings/company-profile')) ? 'active' : '' }}">
                            <i class="feather icon-info mr-50 font-medium-3"></i>
                            Company Profile
                        </a>
                    </li>-->
                    @if(auth()->user()->role=="garage")
                    <li class="nav-item">
                        <a href="{{ route('garage.settings.members') }}" class="nik  nav-link d-flex py-75 {{ (request()->is('garage/settings/manage-members')) ? 'active' : '' }}" style="border-radius: 0; color:#000;">
                            <i class="feather icon-users mr-50 font-medium-3"></i>
                            Manage Users
                        </a>
                    </li>
                    @endif

                    @if(auth()->user()->role=="garage")
                    <li class="nav-item">
                        <a href="{{ route('garage.settings.remove_account') }}" class="nik  nav-link d-flex py-75 {{ (request()->is('garage/settings/remove-account')) ? 'active' : '' }}" style="border-radius: 0; color:#000;">
                            <i class="feather icon-trash mr-50 font-medium-3"></i>
                            Remove Account
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @yield('settings-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account setting page end -->

</div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/pages/account-setting.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.datetimepicker').bootstrapMaterialDatePicker({time:false,format: 'DD/MM/Y', });
            // Tags input style
            $(".tagsinput").removeAttr('style');
            $(".tagsinput").addClass('form-control');
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
    @yield('settings-js')
@endsection
