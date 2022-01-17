@extends('Admin.layouts.master')
@section('title', 'Details | Booking')
@section('extras-css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/booking.css')}}">
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
<div class="content-header">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="page-heading">
                <h3 class="float-left">Booking Summary</h3>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"> <span class="feather-icon select-none relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home h-5 w-5 mb-1 stroke-current text-primary">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Booking</a>
                        </li>
                        <li class="breadcrumb-item active">{{$booking->id}}</li>
                    </ol>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="content-body">
<div class="row">
        <div class="col-8 m-0 pr-0 pt-0 pb-0">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="users-view-image text-center justify-content-center">
                                    @if(!empty($consumer_profile_info->picture))
                                    <img src="{{ asset($consumer_profile_info->picture) }}" width="160" class="users-avatar-shadow rounded-circle" alt="avatar">
                                    @else
                                    <img src="{{ asset('assets/app-assets/images/portrait/small/avatar-s-12.jpg') }}" width="160" class="users-avatar-shadow rounded-circle" alt="avatar">
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <div class="page-heading">
                                                    <h3>{{$consumer_profile_info->display_name}}</h3>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <p class="mb-0">{{$consumer_profile_info->address}}</p>
                                    </div>
                                
                                    <div class="mt-3"></div>
                                    <div class="col-6 mb-5">
                                        <p class="mb-0"><small>Tel :</small>
                                        </p>
                                        <p>{{$consumer_profile_info->contact_number}}</p>
                                    </div>
                                    
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 m-0 pl-0 pt-0 pb-0">
          
            <div class="mapouter">
                <div class="gmap_canvas">
                    <div id="map" style="width: 100%; height: 100%;"></div>

                </div>
                <style>.mapouter{position:relative;text-align:right;height: 290px;}.gmap_canvas {overflow:hidden;background:none!important; height: 250px}</style>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
    $( document ).ready(function() {
             $('.mingu').richText({
    fonts: false,
     leftAlign: false,
      centerAlign: false,
      rightAlign: false,
      justify: false,
        heading: false,
      fonts: false,
      fontColor: false,
      fontSize: false,
      imageUpload: false,
      fileUpload: false,
       underline: false,
    imageUpload: false,
      fileUpload: false,
       videoEmbed: false,
      removeStyles: false,
      code: false,
      urls: false,
      table: false,
      removeStyles: false,
      code: false,
      youtubeCookies: false
             });
        });
</script>

@endsection
@section('extra-js')
<script>
        var map;

        function initMap() {
            var latitude = {{ $consumer_profile_info->address_lat }}; // YOUR LATITUDE VALUE
            var longitude = {{ $consumer_profile_info->address_long }}; // YOUR LONGITUDE VALUE

            var myLatLng = {lat: latitude, lng: longitude};

            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 14
            });

            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              //title: 'Hello World'

              // setting latitude & longitude as title of the marker
              // title is shown when you hover over the marker
              title: latitude + ', ' + longitude
            });
        }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&callback=initMap"
        async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
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
@endsection