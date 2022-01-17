<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<title>Driva Admin - @yield('title')</title>
<head>
    @include('Admin.includes.head')
    @yield('extras-css')
    <style>
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
            z-index: 99999;
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
        .f1{
            z-index: 99999;
            margin: 0px !important;
            box-shadow: none !important;
        }
        .dropleft .dropdown-menu .dropdown-item{
            padding: 0.5rem 1rem;
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
</head>
<!-- END: Head-->


<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">
<!-- BEGIN: Header-->
@include('Admin.includes.header')
<!-- END: Header-->
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    @include('Admin.includes.menu')
</div>
<!-- END: Main Menu-->


<!-- BEGIN: Content-->
@yield('content')
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
{{-- <footer class="footer footer-light card f1">
    @include('Admin.includes.footer')
</footer> --}}
<!-- END: Footer-->




<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('assets/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/extensions/tether.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('assets/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/components.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
<!-- END: Page JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/app-assets/js/scripts/cards/card-statistics.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/ui/prism.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script src="{{asset('assets/app-assets/js/scripts/datatables/datatable.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<!-- END: Page JS-->
<script>
    $(window).scroll(function() {
        $(".main-menu").height($(document).height());
    });
    @if(session('success'))
	    toastr.success("{{ session('success') }}");
	@elseif(session('error'))
	    toastr.error("{{ session('error') }}");
	@endif
    console.log($('a[href="'+window.location.href+'"]').parent('li').addClass("active"))
</script>

<script>
    $(document).ready(function () {
        $('.dataTables_length').css('display','none');
        $('.custom-filter').click(function (e) {
            e.preventDefault();
            $('[name=DataTables_Table_0_length]').val($(this).attr('data-value')).trigger('change');
            $('.table_length').html($(this).attr('data-value'));
        });
    });
</script>
@yield('extra-js')
</body>
<!-- END: Body-->
</html>
