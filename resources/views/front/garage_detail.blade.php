@extends('front.layout.master2')

@section('title')
{{$garage->name}},{{ $garage_postal_town ?? '' }}
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/plugins/forms/wizard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css">
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/fs-gal.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/garage_detail.css">
    <style>
        
    </style>
@endsection


@section('content')
    <section id="garage-detail-title-map-section">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12 mb-2">
                    @if($back_url == route('front.garage_list'))
                        <a href="{{ url()->previous() }}">
                            <h4><i class="fa fa-arrow-left"></i> Search results</h4>
                        </a>
                    @endif
                </div>
                <div id="header-right-info" class="col-lg-7 col-md-12 col-12 m-md-0 pr-md-0 pt-md-0 pb-md-0 garage-detail-header">
                    <div class="card garage_profile_card garage_detail_header">
                        <a href="javascript:void(0);" class="save_garage">
                            <div class="feature_icons">
                              @if(saved_garage($garage->id))
                              <i class="fa fa-star bookmark_img bookmark_img_golden" width="30"></i>
                              @else
                                <a href="javascript:void(0);" class="save_garage">
                                    <i class="fa fa-star-o bookmark_img bookmark_img_grey book_mark_icon @if(!Auth::check()) not_logged_in @endif" width="30"></i>
                                </a>
                              @endif
                          </div>
                        </a>
                        <div class="card-body">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="users-view-image text-center justify-content-center">
                                            @if(isset($garage->logo))
                                              <img src="{{ asset($garage->logo) }}" class="users-avatar-shadow garage-list-image" alt="avatar">
                                            @else
                                              <img src="{{ asset('images/user.png') }}" class="users-avatar-shadow garage-list-image" alt="avatar">
                                            @endif
                                        </div>
                                        <div class="opening_status text-center justify-content-center mt-2">
                                            @if(is_24Hours($garage->id))

                                                <p class="mb-0">
                                                    <i class="fa fa-clock-o"></i> <span class="font-weight-bold">Open 24 Hours</span>
                                                </p>
                                            @elseif(isOpen($garage->id))
                                                <p class="mb-0">
                                                    Open today
                                                </p>
                                                <p>
                                                    {{ getOpeningTime($garage->id) }}
                                                </p>
                                            @else
                                                <p class="mb-0">
                                                    <i class="fa fa-clock-o"></i> <span class="font-weight-bold">Now closed</span>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                        <div class="row ml-1">
                                            <div class="col-12">
                                                <div class="page-heading garage_title">
                                                    <h3>{{ $garage->name }}</h3>
                                                </div>
                                                <p class="mb-0">{{ $garage->address }}</p>
                                            </div>
                                            <div class="col-12">
                                                <span class="font-medium-1">
                                                  @for($i=1;$i<=5; $i++)
                                                      <i class="fa fa-star @if($i<=$garage->reviews->avg('rating')) text-star-warning @endif"></i>
                                                  @endfor
                                                </span>
                                                <a href="#reviews_section" data-target="#reviews_section" class="pl-1">{{ garage_reviews($garage) }} {{ garage_reviews($garage) > 1 || garage_reviews($garage) == 0 ? 'Reviews' : 'Review' }}</a>
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
                                                <a href="{{ $garage->website }}" target="_blank" class="btn btn-primary mr-1 mb-1 waves-effect waves-light website_btn"><i class="fa fa-globe"></i> Website</a>
                                                <a href="@if(Auth::check() && auth()->user()->role=='consumer') @if(auth()->user()->consumer_vehicles==0) {{$redirect_booking=route('consumer.garages.book_garage',$garage->id)}} @else {{$redirect_booking=route('consumer.vehicles',['b'=>base64_encode($garage->id)])}} @endif @else {{$redirect_booking=route('login.login',['b'=>base64_encode($garage->id)])}} @endif" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-calendar"></i> Book Now</a>
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
                <div id="header-right-map" class="col-lg-5 col-md-12 col-12 m-md-0 pl-md-0 pt-md-0 pb-md-0 garage-detail-header">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <div id="map" style="width: 100%;"></div>
                        </div>
                        <style>.mapouter{position:relative;text-align:right;height: 290px;}.gmap_canvas {overflow:hidden;background:none!important; height: 290px}</style>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <section id="garage-detail-schedule-description-section">
        <div class="container-fluid p-0">
            <div class="row">
                <div id="working-schedule-left" class="col-sm-12 col-md-12 col-lg-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-content">
                                <h5 class="font-weight-bold">Work Schedule</h5>
                                @foreach ($garage->working_hours as $wh)
                                    <div class="row mt-2">
                                        @if(\Carbon\Carbon::now()->format('l') == $wh->day)
                                            <div class="col-6"><p class="text-primary">{{ $wh->day }}</p></div>
                                            @if ($wh->is_closed == 1)
                                                <div class="col-6 text-primary"><p>Closed</p></div>
                                            @elseif($wh->is_24 == 1)
                                                <div class="col-6 text-primary"><p>Open 24h</p></div>
                                            @else
                                                <div class="col-6 text-primary"><p>{{ $wh->opening_time }} - {{ $wh->closing_time }}</p></div>
                                            @endif
                                        @else
                                            <div class="col-6"><p>{{ $wh->day }}</p></div>
                                            @if ($wh->is_closed == 1)
                                                <div class="col-6"><p>Closed</p></div>
                                            @elseif($wh->is_24 == 1)
                                                <div class="col-6"><p>Open 24h</p></div>
                                            @else
                                                <div class="col-6"><p>{{ $wh->opening_time }} - {{ $wh->closing_time }}</p></div>
                                            @endif
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9 col-12 services-col">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-12 services-images">
                                        <h5 class="font-weight-bold">Services</h5>
                                        <div class="mt-1"></div>
                                        @foreach ($garage->garage_services as $gs)
                                            <span><img src="{{ asset($gs->service->image) }}" width="25" alt="{{ $gs->service->name }}" data-toggle="tooltip" data-html="true" title="{{ $gs->service->name }}"></span>
                                        @endforeach
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-12 facilities">
                                        <h5 class="font-weight-bold">Customer Facilities</h5>
                                        <div class="mt-1"></div>
                                        @foreach ($garage->garage_customer_facilities as $gcs)
                                            <span><img src="{{ asset($gcs->customer_facility->image) }}" width="25" alt="{{ $gcs->customer_facility->name }}" data-toggle="tooltip" data-html="true" title="{{ $gcs->customer_facility->name }}"></span>
                                        @endforeach
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-12 payments-part">
                                        <h5 class="font-weight-bold">Accepted Payments</h5>
                                        <div class="mt-1"></div>
                                        @foreach ($garage->garage_payment_types as $gpt)
                                            <span><img src="{{ asset($gpt->payment_type->image) }}" width="25" alt="{{ $gpt->payment_type->name }}" data-toggle="tooltip" data-html="true" title="{{ $gpt->payment_type->name }}"></span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 mb-1">
                                        <h5 class="font-weight-bold mt-2">Description</h5>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $garage->description }}</p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 mb-1">
                                        <h5 class="font-weight-bold">Gallery</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="owl-carousel owl-theme">
                                            @foreach ($garage->garage_images as $gi)
                                                <div class="item">
                                                    <img  src="{{ asset($gi->image) }}" class="img-fluid fs-gal" alt="Garage Images" data-url="{{ asset($gi->image) }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 mb-1">
                                        <h5 class="font-weight-bold">Keywords</h5>
                                    </div>
                                    <div class="col-12">
                                        @foreach ($garage->garage_keywords as $gk)
                                          @if(empty($gk->keyword))
                                            @continue
                                          @endif
                                          <div class="chip chip-primary mr-1 g_keywords">
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
    </section>

    <!--Modal-->
  
    <div class="fs-gal-view">
        <img class="fs-gal-prev fs-gal-nav" src="{{asset('front')}}/assets/images/prev.svg" alt="Previous picture" title="Previous picture" />
        <img class="fs-gal-next fs-gal-nav" src="{{asset('front')}}/assets/images/next.svg" alt="Next picture" title="Next picture" />
        <img class="fs-gal-close" src="{{asset('front')}}/assets/images/close.svg" alt="Close gallery" title="Close gallery" />
        <img class="fs-gal-main" src="" alt="">
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/app-assets/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/forms/wizard-steps.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>
    <script src="{{asset('front')}}/assets/js/fs-gal.js"></script>
    <script>
        $("#map").height($('.garage_profile_card').height());
        $(".gmap_canvas").height($('.garage_profile_card').height());
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
                autoplayTimeout:5000,
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
  $(document).on("click",".save_garage",function(e)
  {
    e.preventDefault();
    if($('.book_mark_icon').hasClass("not_logged_in"))
    {
      window.location.href="{{route('login.login')}}?r={{base64_encode($garage->id)}}";
    }else
    {
      $.ajax({
              type: "GET",
              url: "{{ route('front.save_garage') }}?garage_id={{$garage->id}}",
              success: function (response) {
                  toastr.success(response.msg);
                  window.location.reload(true);
              }
          });
    }
    });
    $(document).ready(function() {
        $(".verification input").jqueryPincodeAutotab();
    });

    $("#verificationBtn").click(function(){
        $("#verificationModal").modal();
    });

    // Bootstrap Tooltip
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
<script>
        var map;

        function initMapGarage() {
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&callback=initMapGarage"
            async defer></script>


@endsection
