@extends('garage.application.layout')

@section('title','Garage account application – Driva')
@section('application-content')
<style type="text/css">
    .grey-bg{
      background-color: #727070 !important;
    color: #FFFFFF !important;
    padding: 0.9rem 3rem;
    }
    .grey-bg:hover {
    border-color: #727070 !important;
    color: #FFFFFF !important;
    box-shadow: 0 8px 25px -8px #727070;
}
 .btn-save {

    padding: 0.9rem 4rem;

}
</style>
    <div class="row mt-2 mb-2">
        <div class="col-12">
            <h6>Please review your garage summary</h6>
        </div>
    </div>
    @if ($garage->status == "submitted")
    <div class="row mt-2 mb-2">
        <div class="col-12">
            <div class="alert alert-warning">Please Wait! Your application is pending approval</div>
        </div>
    </div>
    @elseif($garage->status == "in_revision")
    <div class="row mt-2 mb-2">
        <div class="col-12">
            <div class="alert alert-danger"><strong>DECLINED!</strong> Your Profile need revisions.</div>
        </div>
    </div>
    @endif
    <div class="row mt-4">
        <div class="col-12 mb-1">
            <h5>GARAGE SUMMARY</h5>
        </div>
    </div>
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
                                        <div class="page-heading">
                                            <h3>{{ $garage->name }}</h3>
                                        </div>
                                        <p class="mb-0">{{ $garage->address }}</p>
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
    
    <form action="{{ route('garage.application.submit') }}" method="POST">
        @csrf
        <div class="row mt-3 mb-2">
            <div class="col-12 text-center">
                <a href="{{ route('garage.application.gallery') }}" class="btn btn-light grey-bg">Previous</a>
                <input type="hidden" name="status" value="submitted">
                @if(garage_is_approved(garage()) || garage_is_submitted(garage()))
                @else
                <button type="submit" class="btn btn-save btn-primary">Submit</button>
                @endif
            </div>
        </div>
    </form>
    
    <!--Modal-->
    <div class="modal fade" id="verificationModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header bg-white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding:30px 10px;">
              <form role="form" action="{{ route('garage.application.verify') }}" method="POST">
                  @csrf
                <div class="form-group text-center">
                    <div class="col-12">
                        <h4>YOUR GARAGE HAS BEEN APPROVED</h4>
                        <span>Please enter 8 digit verification code sent via letter to your physical address</span>
                    </div>
                </div>
                <div class="form-group verification col-12">
                    <div class="row justify-content-center">
                        <input type="tel" class="form-control col-1" name="code[]" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" name="code[]" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" name="code[]" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" name="code[]" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" name="code[]" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" name="code[]" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" name="code[]" maxlength="1">
                        <span class="span-padding">-</span>
                        <input type="tel" class="form-control col-1" name="code[]" maxlength="1">
                    </div>
                </div>
                  <button type="submit" class="btn btn-success btn-block">Submit</button>
              </form>
            </div>
          </div>
        </div>
    </div>
@endsection
@section('application-js')
    <script type="text/javascript">
        $("#map").height($('.garage_profile_card').height());
        $(".gmap_canvas").height($('.garage_profile_card').height());
        $(document).ready(function() {
            $(".verification input").jqueryPincodeAutotab();
        });

        $("#verificationBtn").click(function(){
            $("#verificationModal").modal();
        });
    </script>
    @if(garage()->status=='approved' && garage()->is_verified == 0)
    <script type="text/javascript">
        $(document).ready(function() {
            $("#verificationModal").modal('show');
        });
    </script>
    @endif

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
