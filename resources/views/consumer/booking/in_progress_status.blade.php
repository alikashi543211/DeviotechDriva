@extends('consumer.layouts.master')
@section('title','In Progress')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/js/scripts/richtext/richtext.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/booking.css')}}">
@endsection
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="page-heading">
                <h3 class="float-left">Booking Summary</h3>
                {{-- <div class="breadcrumb-wrapper col-12">
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
                </div> --}}

            </div>
        </div>
        <div class="col-md-4 ">
            <div class="dropdown dropleft float-right" style="font-size: 30px;padding-right: 9px;">
                <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" data-toggle="modal" data-target="#declineBookingModal" href="javascript:void(0);">
                        <div class="media">
                            <div class="media-body">Cancel</div>
                        </div>
                    </a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#reportModal" href="javascript:void(0);">
                        <div class="media">
                            <div class="media-body">Report</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!--Progress Notes-->
    <section class="descript">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Make:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="vehicle-info">{{$vehicle_info->make}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Model:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="vehicle-info">{{$vehicle_info->model}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Engine Size:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="vehicle-info">{{$vehicle_info->engine_size}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Body Type:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="vehicle-info">{{$vehicle_info->body_type}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Colour:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="vehicle-info">{{$vehicle_info->colour}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Booking ID:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="vehicle-info">{{$booking->id}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Submitted:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="vehicle-info">{{$booking_date}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <p>Services:</p>
                                    </div>
                                    <div class="col-8">
                                        @foreach($booking_services as $s)
                                        <img src="{{ asset($s->image) }}" width="20" style="z-index:999;" alt="">
                                        @endforeach
                                        <!-- <img src="{{ asset('assets/app-assets/images/icons/electrical.svg') }}" width="20" style="z-index:999;" alt="">
                                        <img src="{{ asset('assets/app-assets/images/icons/mot.svg') }}" width="20" style="z-index:999;" alt="">
                                        <img src="{{ asset('assets/app-assets/images/icons/recovery.svg') }}" width="20" style="z-index:999;" alt="">
                                        <img src="{{ asset('assets/app-assets/images/icons/repairs.svg') }}" width="20" style="z-index:999;" alt=""> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row status-1">
                                    <div class="col-md-12">
                                        <p>Status</p>
                                        <p><span class="progres">In Progress</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 pt30">
                                <img class="status-img" src="{{asset($vehicle_info->image_url)}}" alt="Generic placeholder image" class="img-fluid">
                            </div>
                            <div class="vehicle-no1"><span>{{ $vehicle_info->vrm }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--In-Progress-->
    <!--In-Progress-->
    <!--Progress Notes-->
      <section class="descript">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1>Progress  <img src="{{asset('assets/app-assets/images/Loading/Spin-1s.gif')}}"></h1>
                                    </div>
                                    <div class="col-md-6 dura">
                                        <p>Duration Left: <span class="duration">{{$duration}}</span> days</p>
                                    </div>
                                </div>
                            </div>
                            @if($booking->extension_status=='pending')
                            <div class="col-md-4 butn-ext extend_btn_div">
                                <label><b>Garage wants to extend date updto {{$booking->extend_date}}</b></label>
                                <button class="btn btn-success extend_btn accept_btn" data-id="{{$booking->id}}">Accept</button>
                                <button class="btn btn-danger extend_btn decline_btn" data-id="{{$booking->id}}">Decline</button>
                            </div>
                            @elseif($booking->extension_status=='accepted')
                            <div class="col-md-4 butn-ext extend_btn_div">
                                <button class="btn btn-success extend_btn">Extension Request Accepted</button>
                            </div>
                            @elseif($booking->extension_status=='declined')
                            <div class="col-md-4 butn-ext extend_btn_div">
                                <button class="btn btn-danger extend_btn">Extension Request Declined</button>
                            </div>
                            @else
                            @endif
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 p15">
                                <p>@if(!empty($booking->inspection_description)) {!! $booking->progress_description !!} @else 'N/A' @endif</p>
                            </div>
                            <div class="col-md-12">
                                <h4><span class="fw400">Completed Date  :<span><b class="vehicle-info"> @if(!empty($booking->completion_time)) {{$booking->completion_time}} @else 'N/A' @endif</b></span></span></h4>
                            </div>
                             <hr>
                              @if(sizeof($booking->in_progress_images)>0)
                        <div class="row desc-images ">
                            <div class="col-md-12">
                                @foreach ($booking->in_progress_images as $gs)
                                                                   <a href="javascript:void(0);">
                                    <img src="{{asset($gs->image)}}">
                                </a>
                                @endforeach


                            </div>
                            <hr>
                        </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

       <section class="descript">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Inspection  <i class="fa fa-check desc-i"></i></h1>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Description</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 desc-text">
                                <p>@if(!empty($booking->inspection_description)){!! $booking->inspection_description !!} @else N/A @endif</p>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-6" style="text-align: right;">
                                        <p>Mileag:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="vehicle-info inspection_mileag_p">@if(!empty($booking->inspection_mileag)) {{$booking->inspection_mileag}} @else N/A @endif
                                           </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6" style="text-align: right;">
                                        <p>Est. Completion:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="vehicle-info completion_time_p">@if(!empty($booking->completion_time)) {{$booking->completion_time}} @else N/A @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6" style="text-align: right;">
                                        <p>Quotation:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="vehicle-info inspection_quotation_p">@if(!empty($booking->inspection_quotation)) £{{$booking->inspection_quotation}}  @else N/A @endif

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @if(sizeof($booking->inspection_images)>0)
                        <div class="row desc-images ">
                            <div class="col-md-12">
                                @foreach ($booking->inspection_images as $gs)
                                                                   <a href="javascript:void(0);">
                                    <img src="{{asset($gs->image)}}">
                                </a>
                                @endforeach


                            </div>
                            <hr>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="descript">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Pending  <i class="fa fa-check desc-i"></i></h1>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Description</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 desc-text">
                                <p>{{$booking->description}}</p>
                                <div class="row pt15">
                                    <div class="col-3">
                                        <p>Booking Date:</p>
                                    </div>
                                    <div class="col-9">
                                        <p class=""><b>{{$booking_date}}</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <p>Estimate:</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="vehicle-info"><b> £{{$booking->price}} </b>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="row text-center">
                                    <div class="col-md-12 mb-1">
                                        @if(!empty($consumer_profile_info->picture))
                                        <img class="pro-img" src="{{asset($consumer_profile_info->picture)}}" alt="Generic placeholder image" class="img-fluid">
                                        @else
                                        <img class="pro-img" src="{{asset('images/user.png')}}" alt="Generic placeholder image" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <p class="mb-0"><b> {{$consumer_info->name}}</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <p class="mb-1"><b> {{$consumer_profile_info->contact_number}} </b>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center"> <a href="{{ route('consumer.profile') }}" class="btn btn-primary waves-effect waves-light">View Profile</a>
                                    </div>
                                </div>
                               </div>
                        </div>
                        <hr>
                        <div class="row desc-images">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Inspection-->

    <!--Description-->

     <div class="col-12 text-center" style="padding-bottom: 50px;"> {{-- <a href="{{route('garage.booking.cancel',['booking'=>$booking->id])}}" class="btn btn-light waves-effect waves-light">DECLINE</a>
        <a href="{{route('garage.booking.complete',['booking'=>$booking->id])}}" class="btn btn-primary waves-effect waves-light">COMPLETE</a> --}}
         <button class="btn btn-light decline_booking_btn" data-toggle="modal" data-target="#declineBookingModal">DECLINE</button>
    </div>

</div>
<!-- Modal -->
<!--Modal-->
<div class="modal fade" id="declineBookingModal" tabindex="-1" role="dialog" aria-labelledby="declineBookingModal" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding:30px 10px;">
                <form action="{{route('consumer.booking.next_to_cancel')}}" method="GET">
                  <input type="hidden" name="booking" value="{{$booking->id}}">
                    <div class="row">
                        <div class="col-12">
                            <p class="font-weight-bold">You've declining the booking {{$booking->id}}</p>
                            <p>You can specify the reason for the decline (OPTIONAL)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <fieldset class="form-label-group mb-0">
                                <textarea name="decline_reason" data-length="20" class="form-control char-textarea" id="textarea-counter" rows="3" placeholder="Reason For Decline Here..."></textarea>
                                <label for="textarea-counter"></label>
                            </fieldset>
                            <div style="background-color: #ccc; border-radius: 3px;">
                                <div class="clearfix">
                                    <div class="float-left"> <i class="fa fa-paperclip ml-1"></i>
                                    </div>
                                    <div class="float-right"> <small class="counter-value float-right"><span class="char-count">0</span> / 2500 </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3"></div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
                            <button type="submit" class="btn btn-primary">Decline</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal-->
<div class="modal fade" id="declineModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding:30px 10px;">
                <form action="" method="">
                    <div class="row">
                        <div class="col-12">
                            <p class="font-weight-bold">You've declining the booking GB123456789</p>
                            <p>You can specify the reason for the decline (OPTIONAL)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <fieldset class="form-label-group mb-0">
                                <textarea data-length="20" class="form-control char-textarea" id="textarea-counter" rows="3" placeholder="Counter"></textarea>
                                <label for="textarea-counter"></label>
                            </fieldset>
                            <div style="background-color: #ccc; border-radius: 3px;">
                                <div class="clearfix">
                                    <div class="float-left"> <i class="fa fa-paperclip ml-1"></i>
                                    </div>
                                    <div class="float-right"> <small class="counter-value float-right"><span class="char-count">0</span> / 2500 </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3"></div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
                            <button type="submit" class="btn btn-primary">Decline</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="acceptModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding:30px 10px;">
                <form action="" method="">
                    <div class="row">
                        <div class="col-12">
                            <p class="font-weight-bold">You are going to accept the booking GB123456789</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-float-label">
                                <input type="text" class="form-control required" id="estimated_price" value="" placeholder="e.g $50 - $100" name="estimated_price" autocomplete="off">
                                <label for="estimated_price">Estimated Price</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group has-float-label">
                                <input type="text" class="form-control required" id="short_desc" value="" placeholder="e.g Short Description (optional)" name="short_desc" autocomplete="off">
                                <label for="short_desc">Short Description (optional)</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3"></div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
                            <button type="submit" class="btn btn-primary">Accept</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModal" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding:30px 10px;">
                <form action="{{route('consumer.booking.save_report')}}" method="GET">

                  <input type="hidden" name="booking" value="{{$booking->id}}">
                    <div class="row">
                        <div class="col-12">
                            <p class="font-weight-bold">You are reporting the booking {{$booking->id}}</p>
                            <p>You can specify the description for reporting (REQUIRED)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <fieldset class="form-label-group mb-0">
                                <textarea name="description" data-length="20" class="form-control char-textarea" id="textarea-counter" rows="3" placeholder="Description here....." required></textarea>
                                <label for="textarea-counter"></label>
                            </fieldset>
                            <div style="background-color: #ccc; border-radius: 3px;">
                                <div class="clearfix">
                                    <div class="float-left"> <i class="fa fa-paperclip ml-1"></i>
                                    </div>
                                    <div class="float-right"> <small class="counter-value float-right"><span class="char-count">0</span> / 2500 </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3"></div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
                            <button type="submit" class="btn btn-primary">Report</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('assets/app-assets/js/scripts/richtext/jquery.richtext.min.js')}}"></script>
<script type="text/javascript">
    $(document).on("click", '.accept_btn', function(){
        var id = $(this).attr("data-id");

                $.ajax({
                    type: "GET",
                    url: "{{route('consumer.booking.accept_extension')}}/"+id,
                    success: function (response) {
                       btn_html='<button class="btn btn-success extend_btn">Extension Request Accepted</button>';
                            $('.extend_btn_div').html(btn_html)
                            $('.duration').html(response.duration)
                            // toastr.success(response.success);
                    }
                });
            });
    $(document).on("click", '.decline_btn', function(){
        var id = $(this).attr("data-id");
                $.ajax({
                    type: "GET",
                    url: "{{route('consumer.booking.decline_extension')}}/"+id,
                    success: function (response) {
                        btn_html='<button class="btn btn-danger extend_btn">Extension Request Declined</button>';
                            $('.extend_btn_div').html(btn_html)
                            // toastr.success(response.success);
                    }
                });
            });


</script>
<script type="text/javascript">
    $( document ).ready(function() {
             $('.rich-text').richText({
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
