<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<title>Driva Consumer - @yield('title')</title>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/app-assets/images/logo/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <!--Pincode-jQuery-Plugin-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/Pincode-jQuery-Plugin/css/jquery-pincode-autotab.min.css')}}">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/components.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/plugins/tour/tour.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/jquery.tagsinput.min.css')}}">
    <link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v3.0.1/dist/bootstrap-float-label.min.css"/>
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/extensions/toastr.min.css')}}">

    <style>
        .bg-yellow{
            background: #FADA5E;
        }
        .bg-grey{
            background: #828282;
        }
        .bg-orange{
            background: #FF9F43;
        }
        .bg-blue{
            background: #7367F0;
        }
        .tbl-vrm{
            background-color: #FFD400;
            text-align: center;
            border: 1px solid #000;
            border-radius: 3px;
        }
        .tbl-vrm span{
            text-transform: uppercase;
            color: #000000;
            font-size: 15px;
            font-weight: 600;
        }
        .span-padding{
            padding: 0.55rem 0.1rem !important;
        }
        .rounded{
            border-radius: 50% !important;
        }
        .filter-btn{
            border-radius: 20px !important;
        }
        .nav-tabs li:first-child{
            margin-left: 0px !important;
        }
        .nav-tabs li{
            margin-left: 1.3rem !important;
        }
        .profile-update-img img{
            width: 120px;
            border-radius: 100%;
        }
        .page-heading h3{
            text-transform: uppercase !important;
            font-weight: 600;
            padding-top: 0.4rem;
            margin-right: 1rem;
        }
        .page-heading h4{
            text-transform: uppercase !important;
            font-weight: 600;
        }
        .content-header .input-group button{
            background-color:transparent !important;
            border: none !important;
            border-radius: 20px;
            color: #5F5F5F !important;
        }
        .content-header .input-group input{
            border: none !important;
            border-radius: 20px;
        }
        .content-header .input-group input::placeholder{
            color: #5F5F5F !important;
        }
        .content-header .input-group{
            border: 1px solid #D9D9D9 !important;
            border-radius: 20px;
            background-color: #ffffff;
        }
        .users .input-group{
            border-radius: 0px !important;
        }
        .content-header .input-group:focus {
            color: #4E5154 !important;
            background-color: #FFFFFF !important;
            border-color: #EA5455 !important;
            outline: 0 !important;
            box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.15) !important;
        }
        .brand-logo{
            padding-left: 7px;
        }
        .vehicle-img img{
            position: relative;
            object-fit:cover !important;
        }
        .vehicle-no{
            position: absolute;
            background-color: #FFD400;
            bottom: 5px;
            right: 18%;
            width: 60%;
            text-align: center;
            padding: 5px 0;
            margin: 0px 7px;
            border: 1px solid #000;
            border-radius: 3px;
        }
        .vehicle-no span{
            text-transform: uppercase;
            color: #000000;
            font-size: 15px;
            font-weight: 600;
        }
        .vehicle-info{
            text-transform: uppercase;
            font-weight: 600;
        }
        .profile-part{
            background-color: #cccccc;
            text-align: center;
            height: 100%;
        }
        .profile-part img{
            width: 120px;
            margin-top: 2.2rem;
        }
        .small-text{
            font-size: 9px;
        }
        .f1{
            z-index: 999;
            margin: 0px !important;
            box-shadow: none !important;
        }
        .datetimepicker-div{
            padding: 0px !important;
            width: 100px;
        }
        .datetimepicker-div input{
            padding: 2px 5px 2px 5px !important;
            margin-right: 0.5rem !important;
            border-radius: 0px !important;
            font-size: 10px !important;
        }
        .datetimepicker-div .fa{
            font-size: 16px !important;
        }
        .tabs-section{
            text-align: center;
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
            height: 40px;
            width: 145px;
            line-height: 40px;
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
        .profile-boxes:hover,.profile-boxes.active{
            border: 1px solid;
            border-color: #EA5455;
            transition: all 0.5s ease;
        }
        .profile-boxes.active{
            box-shadow: 0px 0px 10px #eee;
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
        .add-img, .remove-img, .delete-img{
            font-size: 18px;
            position: absolute;
            top: 0;
            cursor: pointer;
            z-index: 999;
        }
        .add-img{
            color: #30B9ED;
            right: 18px;
        }
        .remove-img{
            color: #EA5455;
            right: 38px;
        }
        .remove-img.last{
            right: 18px;
        }
        .delete-img{
            color: #EA5455;
            left: 20px;
        }
        .bold{
            font-weight: bold !important;
        }
        .bg-light-grey{
            background: #f9f9f9;
        }
        .copyright-area{
            background: #F8F8F8;
        }
        .social-links{
            padding: 0px !important;
            margin: 0px !important;
            list-style: none !important;
        }
        .social-links li{
            display: inline-block;
        }
        .social-links li a{
            background-color: #2C2C2C !important;
            color: #ffffff !important;
            display: block;
            text-align: center;
            border-radius: 3px;
            margin-right: 2px;
            height: 30px;
            width: 30px;
            line-height: 30px;
        }
        .social-links li a i{
            font-size: 14px;
        }
        .has-float-label .form-control:placeholder-shown:not(:focus)+*{
            font-size: 100%;
            opacity: .5;
            top: 0.8em;
            font-weight: 400;
        }
        .lds-ring {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }
        .lds-ring div {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 64px;
            height: 64px;
            margin: 8px;
            border: 8px solid #EA5455;
            border-radius: 50%;
            animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: #EA5455 transparent transparent transparent;
        }
        .lds-ring div:nth-child(1) {
            animation-delay: -0.45s;
        }
        .lds-ring div:nth-child(2) {
            animation-delay: -0.3s;
        }
        .lds-ring div:nth-child(3) {
            animation-delay: -0.15s;
        }
        @keyframes lds-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        .toast-info {
  background-color: green;
}
#toast-container > .toast-success {
    opacity: 1 !important;
}
#toast-container > .toast-error {
    opacity: 1 !important;
}
    </style>
    @yield('css')
</head>
<!-- END: Head-->


<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- BEGIN: Header-->
@include('consumer.not_verified.includes.header')
<!-- END: Header-->
<!-- BEGIN: Main Menu-->
@include('consumer.not_verified.includes.menu')
<!-- END: Main Menu-->


<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
@include('consumer.includes.footer')
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('assets/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/components.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.all.min.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/jquery.tagsinput.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/datatables/datatable.js')}}"></script>
<!--Pincode-jQuery-Plugin-->
<script src="{{asset('assets/app-assets/Pincode-jQuery-Plugin/js/jquery-pincode-autotab.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<!-- END: Page JS-->
<script>
    $(window).scroll(function() {
        $(".main-menu").height($('.app-content.content').height());
    });
    $(window).on('resize', function(){
          $(".main-menu").height($('.app-content.content').height());
    });
    @if(session('success'))
	toastr.success("{{ session('success') }}");
	@elseif(session('error'))
	toastr.error("{{ session('error') }}");
	@endif
</script>

<script>
    $(document).ready(function () {
        // Datatable settings
        $('.dataTables_length').css('display','none');
        $('.custom-filter').click(function (e) {
            e.preventDefault();
            $('[name=DataTables_Table_0_length]').val($(this).attr('data-value')).trigger('change');
            $('.table_length').html($(this).attr('data-value'));
        });

        // Tags Input
        $('#keywords').tagsInput();

        $('.profile-boxes').click(function(){
            if(!$(this).hasClass('active')){
                $(this).addClass('active');
            }
            else{
                $(this).removeClass('active');
            }
        });
    });
</script>
@yield('js')
</body>
<!-- END: Body-->
</html>
