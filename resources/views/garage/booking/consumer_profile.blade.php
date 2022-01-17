@extends('garage.layouts.master')
 
 @section('title','Consumer Profile') 

 @section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<style>
    .rotate {
    
      transform: rotate(-90deg);
    
    
      /* Legacy vendor prefixes that you probably don't need... */
    
      /* Safari */
      -webkit-transform: rotate(-90deg);
    
      /* Firefox */
      -moz-transform: rotate(-90deg);
    
      /* IE */
      -ms-transform: rotate(-90deg);
    
      /* Opera */
      -o-transform: rotate(-90deg);
    
      /* Internet Explorer */
      filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    
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
            .r1{
                padding-right:14px;
                padding-left: 14px;
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
</style>@endsection @section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="page-heading">
                <h3 class="float-left">Profile</h3>
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
                        <li class="breadcrumb-item active">Consumer Profile</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-3 text-right"> 
           
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
 
</div>@endsection @section('js')
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