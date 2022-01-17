@extends('consumer.layouts.master')

@section('title','Garage Detail')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/plugins/forms/wizard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.cs">
<style>
  .tabs-section ul li.disabled a{
      cursor: not-allowed;
  }
  .tabs-section ul li.disabled a:hover{
      background-color: #fff !important;
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
  .grey-bg
  {
    background-color: #727070 !important;
    color: #FFFFFF !important;
    padding: 0.9rem 3rem;
  }
  .grey-bg:hover 
  {
    border-color: #727070 !important;
    color: #FFFFFF !important;
    box-shadow: 0 8px 25px -8px #727070;
  }
  .btn-save 
  {
    padding: 0.9rem 4rem;
  }
</style>
@endsection

@section('content')
    {{-- <div class="row mt-4">
        <div class="col-6 mb-1">
            <h3 class="font-weight-bold"></h3>
        </div>
        <div class="col-6 mb-1 text-right">
        <a href="{{route('consumer.garages.book_garage',$garage->id)}}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"> Book Now</a>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-6 m-0 pr-0 pt-0 pb-0">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="users-view-image text-center justify-content-center">
                                    @if(isset($garage->logo))
                                    <img src="{{ asset($garage->logo) }}" width="160" class="users-avatar-shadow rounded-circle" alt="avatar">
                                    @else
                                    <img src="{{ asset('images/user.png') }}" width="160" class="users-avatar-shadow rounded-circle" alt="avatar">
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-heading">
                                            <h3>{{ $garage->name }}</h3>
                                        </div>
                                        <p class="mb-0">{{ $garage->address }}</p>
                                    </div>
                                    <div class="col-12">
                                        <span class="font-medium-1">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </span>
                                        <a href="#" class="pl-1">15 Reviews</a>
                                    </div>
                                    <div class="mt-3"></div>
                                    <div class="col-6">
                                        <p class="mb-0"><small>Tel 1:</small></p>
                                        <p>{{ $garage->contact_1 }}</p>
                                    </div>
                                    <div class="col-6">
                                        @if ($garage->contact_2)
                                        <p class="mb-0"><small>Tel 2:</small></p>
                                        <p>{{ $garage->contact_2 }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <a href="https://{{ $garage->website }}" target="_blank" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-globe"></i> Website</a>
                                        <a href="{{route('consumer.garages.book_garage',$garage->id)}}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-calendar"></i> Book Now</a>
                                    </div>
                                    <div class="col-6">
                                        <p>
                                            @if ($garage->registration_number)
                                                <small>Reg: {{ $garage->registration_number }}</small>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <p>
                                            @if ($garage->vat_registration)
                                                <small>VAT: {{ $garage->vat_registration }}</small>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 m-0 pl-0 pt-0 pb-0">
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
                        <h6 class="font-weight-bold">Work Schedule</h6>
                        @foreach ($garage->working_hours as $wh)
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
        <div class="col-sm-12 col-md-9 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <h6 class="font-weight-bold">Services</h6>
                                <div class="mt-1"></div>
                                @foreach ($garage->garage_services as $gs)
                                    <span><img src="{{ asset($gs->service->image) }}" width="25" alt="{{ $gs->service->name }}"></span>
                                @endforeach
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <h6 class="font-weight-bold">Customer Facilities</h6>
                                <div class="mt-1"></div>
                                @foreach ($garage->garage_customer_facilities as $gcs)
                                    <span><img src="{{ asset($gcs->customer_facility->image) }}" width="25" alt="{{ $gcs->customer_facility->name }}"></span>
                                @endforeach
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <h6 class="font-weight-bold">Accepted Payments</h6>
                                <div class="mt-1"></div>
                                @foreach ($garage->garage_payment_types as $gpt)
                                    <span><img src="{{ asset($gpt->payment_type->image) }}" width="25" alt="{{ $gpt->payment_type->name }}"></span>
                                @endforeach
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 mb-1">
                                <h6 class="font-weight-bold">Description</h6>
                            </div>
                            <div class="col-12">
                                <p>{{ $garage->description }}</p>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 mb-1">
                                <h6 class="font-weight-bold">Gallery</h6>
                            </div>
                            <div class="col-12">
                                <div class="owl-carousel owl-theme">
                                    @foreach ($garage->garage_images as $gi)
                                        <div class="item">
                                            <img src="{{ asset($gi->image) }}" class="img-fluid" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 mb-1">
                                <h6 class="font-weight-bold">Keywords</h6>
                            </div>
                            <div class="col-12">
                                @foreach ($garage->garage_keywords as $gk)
                                    <div class="chip chip-primary mr-1">
                                        <div class="chip-body">
                                            <span class="chip-text">{{ $gk->keyword }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal-->
    <div class="modal fade" id="verificationModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header bg-white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding:30px 10px;">
              <form role="form">
                <div class="form-group text-center">
                    <div class="col-12">
                        <h4>YOUR GARAGE HAS BEEN APPROVED</h4>
                        <span>Please enter 8 digit verification code sent via letter to your physical address</span>
                    </div>
                </div>
                <div class="form-group verification col-12">
                    <div class="row justify-content-center">
                        <input type="tel" class="form-control col-1" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" maxlength="1">
                    </div>
                </div>
                  <button type="submit" class="btn btn-success btn-block">Submit</button>
              </form>
            </div>
          </div>
        </div>
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

<script type="text/javascript">
    $(document).ready(function() {
        $(".verification input").jqueryPincodeAutotab();
    });

    $("#verificationBtn").click(function(){
        $("#verificationModal").modal();
    });
</script>

<script>
        var map;

        function initMap() {
            var latitude = {{ $garage->address_lat }}; // YOUR LATITUDE VALUE
            var longitude = {{ $garage->address_long }}; // YOUR LONGITUDE VALUE

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
@endsection
