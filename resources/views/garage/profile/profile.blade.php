@extends('garage.layouts.master')
@section('title','Profile') @section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="{{asset('front')}}/assets/css/fs-gal.css">
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
    .text-star-warning {
        color: #efd143;
    }
    .garage_title
    {
        text-transform: capitalize !important;
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
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-3 text-right">  {{-- <span style="font-size: 16px; padding: 5px;vertical-align: top;">Status:</span>
            <span class="badge" style="font-size: 16px;background-color:  #28C76F; color:#fff; padding: 5px;vertical-align: top;margin-right: 7px;">Active</span>
            <span class="badge" style="font-size: 16px;background-color: #0062cc; color:#fff; padding: 5px;vertical-align: top;display: none;margin-right: 7px;">Inactivective</span>
            <span class="badge" style="font-size: 16px;background-color:  #f9e636; color:#fff; padding: 5px;vertical-align: top;display: none;margin-right: 7px;">Pending</span>
            <span class="badge" style="font-size: 16px;background-color: #dd0000; color:#fff; padding: 5px;vertical-align: top;display: none;margin-right: 7px;">Declined</span> --}}
            <a href="{{ route('garage.application.contact_info') }}" class="btn btn-primary waves-effect waves-light" style="">Edit Profile</a>
        </div> 
    </div>
</div>
<div class="content-body">
    <div class="row">
        <div class="col-7 m-0 pr-0 pt-0 pb-0">
            <div class="card garage_profile_card">
                <div class="card-body">
                    <div class="card-content">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="users-view-image text-center justify-content-center">
                                    <img src="{{ asset(garage()->logo) }}" width="160" class="users-avatar-shadow rounded-circle" alt="avatar">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="row ml-1">
                                    <div class="col-12">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <div class="page-heading">
                                                    <h3>{{garage()->name}}</h3>
                                                </div>
                                            </div>
                                            <div class="float-right">
                                                <a href="{{route('garage.application.contact_info')}}">
                                                    <button class="btn-icon btn btn-primary btn-round btn-sm waves-effect waves-light" type="button"><i class="feather icon-edit-2"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="mb-0">{{garage()->address}}</p>
                                    </div>
                                    <div class="col-12"> 
                                        <span class="font-medium-1">
                                            @for($i=1;$i<=5; $i++)
                                                <i class="fa fa-star @if($i<=garage()->reviews->avg('rating')) text-star-warning @endif"></i>
                                            @endfor
                                        </span>
                                        <a href="#reviews_section" data-target="#reviews_section" class="pl-1"> {{ garage()->reviews->count() ?? '0' }} reviews</a>
                                    </div>
                                    <div class="mt-3"></div>
                                    <div class="col-6">
                                        <p class="mb-0"><small>Tel 1:</small>
                                        </p>
                                        <p>{{garage()->contact_1}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0"><small>Tel 2:</small>
                                        </p>
                                        <p>{{garage()->contact_2 ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-12"> <a href="{{garage()->website}}" target="_blank" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-globe"></i> Website</a>
                                    </div>
                                    <div class="col-6">
                                        <p><small style="font-weight: 600;">Reg: {{garage()->registration_number ?? 'N/A'}}</small>
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <p><small style="font-weight: 600;">VAT: {{garage()->vat_registration ?? 'N/A'}}</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 m-0 pl-0 pt-0 pb-0">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <div id="map" style="width: 100%; height: 100%;"></div>

                </div>
                <style>.mapouter{position:relative;text-align:right;height: 290px;}.gmap_canvas {overflow:hidden;background:none!important; height: 290px}</style>
            </div>
        </div>
    </div>
    <div class="row">
         <div class="col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="font-weight-bold">Work Schedule</h6>
                            </div>
                            <div class="col-3">
                                <a href="{{route('garage.application.working_hours')}}" class="float-right">
                                    <button class="btn-icon btn btn-primary btn-round btn-sm waves-effect waves-light" type="button"><i class="feather icon-edit-2"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
    
                        @foreach (garage()->working_hours as $wh)
                            <div class="row mt-2">
                                <div class="col-6"><p><small>{{ $wh->day }}</small></p></div>
                                @if ($wh->is_closed == 1)
                                    <div class="col-6"><p><small>Closed</small></p></div>
                                @elseif($wh->is_24 == 1)
                                    <div class="col-6"><p><small>Open 24h</small></p></div>
                                @else
                                    <div class="col-6"><p><small>{{ $wh->opening_time }} - {{ $wh->closing_time }}</small></p></div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="font-weight-bold">Opening Hours</h6>
                            </div>
                            <div class="col-3">
                                <a href="#" class="float-right">
                                    <button class="btn-icon btn btn-primary btn-round btn-sm waves-effect waves-light" type="button"><i class="feather icon-edit-2"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <p><small>Monday</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p><small>10:00 - 19:00</small>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <p><small>Tuesday</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p><small>Open 24h</small>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <p><small>Wednesday</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p><small>Open 24h</small>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <p><small>Thursday</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p><small>Open 24h</small>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <p><small>Friday</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p><small>Open 24h</small>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <p><small>Saturday</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p><small>09:00 - 16:00</small>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <p><small>Sunday</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p><small>Closed</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-sm-12 col-md-9 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <div class="row mt-3">
                            <div class="col-md-7 ">
                                <div class="col-12 mb-1">
                                    <div class="row">
                                        <div class="col-8">
                                            <h6 class="font-weight-bold">Description</h6>
                                        </div>
                                        <div class="col-4">
                                            <a href="{{route('garage.application.description')}}" class="float-right">
                                                <button class="btn-icon btn btn-primary btn-round btn-sm waves-effect waves-light" type="button"><i class="feather icon-edit-2"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p>{{garage()->description}}</p>
                                </div>
                            </div>
                            <div class="col-md-5 ">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="row pl-1 pr-1">
                                        <div class="col-9 p-0">
                                            <h6 class="font-weight-bold">Services</h6>
                                        </div>
                                        <div class="col-3 p-0">
                                            <a href="{{route('garage.application.description')}}" class="float-right">
                                                <button class="btn-icon btn btn-primary btn-round btn-sm waves-effect waves-light" type="button"><i class="feather icon-edit-2"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    @foreach (garage()->garage_services as $gs) 
                                   <span><img src="{{ asset($gs->service->image) }}" width="25" alt="{{ $gs->service->name }}"></span>
                                        @endforeach
                                    <!-- -->
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                                    <div class="row pl-1 pr-1">
                                        <div class="col-9 p-0">
                                            <h6 class="font-weight-bold">Customer Facilities</h6>
                                        </div>
                                        <div class="col-3 p-0">
                                            <a href="{{route('garage.application.description')}}" class="float-right">
                                                <button class="btn-icon btn btn-primary btn-round btn-sm waves-effect waves-light" type="button"><i class="feather icon-edit-2"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div style="margin-top: 8px;"></div>
                                     @foreach (garage()->garage_customer_facilities as $gcs)
                                    <span><img src="{{ asset($gcs->customer_facility->image) }}" width="25" alt="{{ $gcs->customer_facility->name }}"></span>
                                @endforeach
                                    
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                                    <div class="row pl-1 pr-1">
                                        <div class="col-9 p-0">
                                            <h6 class="font-weight-bold">Accepted Payments</h6>
                                        </div>
                                        <div class="col-3 p-0">
                                            <a href="{{route('garage.application.description')}}" class="float-right">
                                                <button class="btn-icon btn btn-primary btn-round btn-sm waves-effect waves-light" type="button"><i class="feather icon-edit-2"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div style="margin-top: 8px;"></div> @foreach (garage()->garage_payment_types as $gpt)
                                    <span><img src="{{ asset($gpt->payment_type->image) }}" width="25" alt="{{ $gpt->payment_type->name }}"></span>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 r1">
                            <div class="col-12 mb-1">
                                <div class="row ">
                                    <div class="col-8">
                                        <h6 class="font-weight-bold">Gallery</h6>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{route('garage.application.gallery')}}" class="float-right">
                                            <button class="btn-icon btn btn-primary btn-round btn-sm waves-effect waves-light" type="button"><i class="feather icon-edit-2"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="owl-carousel owl-theme">
                                    @foreach (garage()->garage_images as $gi)
                                        <div class="item">
                                            <img src="{{ asset($gi->image) }}" class="img-fluid fs-gal" alt="Garage Images" data-url="{{ asset($gi->image) }}">
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 r1">
                            <div class="col-12 mb-1">
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class="font-weight-bold">Keywords</h6>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{route('garage.application.description')}}" class="float-right">
                                            <button class="btn-icon btn btn-primary btn-round btn-sm waves-effect waves-light" type="button"><i class="feather icon-edit-2"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                @foreach (garage()->garage_keywords as $gk)
                                    <div class="chip chip-primary mr-1">
                                        <div class="chip-body">
                                            <span class="chip-text">{{ $gk->keyword }}</span>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                        @if($reviews_list->count()>0)
                            <div class="row mt-3" id="reviews_section">
                                <div class="col-12 mb-1">
                                    <h5 class="font-weight-bold">Reviews</h5>
                                </div>
                                <div class="col-12">
                                    @foreach($reviews_list as $review)
                                        <div class="media">
                                            
                                            <a class="align-self-start media-left @if($review->user->role=='consumer') mr-2 @else mr-4 @endif" href="#">
                                                <img class="media-object img-xl rounded-circle @if($review->user->role=='consumer') d-block @else d-none @endif" src="{{asset('images/user.png')}}" alt="Generic placeholder image" />
                                            </a>
                                            <div class="media-body">
                                                @if($review->user->role=='consumer')
                                                    <div class="clearfix">
                                                        <div class="float-left">
                                                            <span class="font-weight-bold mb-0">{{$review->user->name}}</span> <span class="font-weight-bold text-star-warning mb-0"><i class="fa fa-star text-star-warning"></i> {{ $review->rating ?? '' }} </span>
                                                        </div>
                                                        <div class="float-right">
                                                            @foreach($review->booking->booking_services as $s)
                                                                <span><img src="{{asset($s->image)}}" width="16" alt="{{$s->name}}"></span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin: 10px 20px 10px  0px">
                                                        <p class="text-dark feedback-msg mb-0">
                                                            Booking ID: {{$review->booking_id}}
                                                        </p>
                                                    </div>
                                                    <div class="row" style="margin: 10px 20px 10px  0px">
                                                        <p class="text-dark feedback-msg mb-0">
                                                            {{$review->review ?? ''}}
                                                        </p>
                                                    </div>
                                                    <div class="row" style="margin: 10px 20px 10px  0px">
                                                        <p class="mt-0">
                                                            <small>{{$review->created_at->diffForHumans()}}</small>
                                                        </p>
                                                    </div>
                                                @else
                                                    <div class="media">
                                                        <a class="align-self-start media-left mr-2" href="#">
                                                            <img class="media-object img-xl rounded-circle" src="{{asset('images/user.png')}}" alt="Generic placeholder image" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="clearfix">
                                                                <div class="float-left">
                                                                    <span class="font-weight-bold">{{$review->booking->garage_profile_info->name}}'s Response</span> 
                                                                </div>
                                                                <div class="float-right">
                                                                    @foreach($review->booking->booking_services as $s)
                                                                        <span><img src="{{asset($s->image)}}" width="16" alt="{{$s->name}}"></span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin: 10px 20px 10px  0px">
                                                                <p class="text-dark feedback-msg mb-0">
                                                                    Booking ID: {{$review->booking_id}}
                                                                </p>
                                                            </div>
                                                            <div class="row" style="margin: 10px 20px 10px  0px">
                                                                <p class="text-dark feedback-msg mb-0">
                                                                    {{$review->review ?? ''}}
                                                                </p>
                                                            </div>
                                                            <div class="row" style="margin: 10px 20px 10px  0px">
                                                                <p class="mt-0">
                                                                    <small>{{$review->created_at->diffForHumans()}}</small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    @if($show_all)
                                        <div>
                                            <form>
                                                <input type="hidden" name="show" value="true" >
                                                <button class="btn btn-primary pull-right">Show All</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal-->

<div class="fs-gal-view">
    <img class="fs-gal-prev fs-gal-nav" src="{{asset('front')}}/assets/images/prev.svg" alt="Previous picture" title="Previous picture" />
    <img class="fs-gal-next fs-gal-nav" src="{{asset('front')}}/assets/images/next.svg" alt="Next picture" title="Next picture" />
    <img class="fs-gal-close" src="{{asset('front')}}/assets/images/close.svg" alt="Close gallery" title="Close gallery" />
    <img class="fs-gal-main" src="" alt="">
</div>
@endsection 
@section('js')
    <script>
        $("#map").height($('.garage_profile_card').height());
        $(".gmap_canvas").height($('.garage_profile_card').height());
        var map;

        function initMap() {
            var latitude = {{ garage()->address_lat }}; // YOUR LATITUDE VALUE
            var longitude = {{ garage()->address_long }}; // YOUR LONGITUDE VALUE

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
    <script src="{{asset('front')}}/assets/js/fs-gal.js"></script>
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