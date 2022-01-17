@extends('garage.layouts.master') @section('title','Complete') @section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-8 col-sm-12 ">
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
        <div class="col-md-4 ">
            <div class="dropdown dropleft float-right" style="font-size: 30px;padding-right: 9px;">
                <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                <div class="dropdown-menu">
                    <!-- <a class="dropdown-item" href="">
                        <div class="media">
                            <div class="media-body">Cancel</div>
                        </div>
                    </a> -->
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
                                        <p><span class="comp">Complete</span>
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
    <!--Progress Notes-->
    <section class="descript">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1>Progress  <i class="fa fa-check desc-i"></i></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 p15">
                                <p>{!! $booking->progress_description !!}</p>
                            </div>
                            <div class="col-md-12">
                                <h4><span class="fw400">Completed Date  :<span><b class="vehicle-info"> @if(!empty($booking->completed_date)) {!! dateFormat($booking->completed_date) !!} @else {{'N/A'}} @endif</b></span></span></h4>
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
    <!--Inspection-->
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
                                <p>{!! $booking->inspection_description !!}</p>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-6" style="text-align: right;">
                                        <p>Mileag:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="vehicle-info inspection_mileag_p">{{$booking->inspection_mileag}}
                                           </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6" style="text-align: right;">
                                        <p>Est. Completion:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="vehicle-info completion_time_p">{{$booking->completion_time}}
                                       </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6" style="text-align: right;">
                                        <p>Quotation:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="vehicle-info inspection_quotation_p">£{{$booking->inspection_quotation}}
                                            <a href="javascript:void(0);"></a>

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
    <!--Description-->
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
                                            <!-- <a href="#" class="float-right">
                                                <button class="btn-icon btn btn-primary btn-round btn-sm waves-effect waves-light" type="button"><i class="feather icon-edit-2"></i>
                                                </button>
                                            </a> -->
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
                                    <div class="col-md-12 text-center"> <a href="{{ route('garage.booking.consumer_profile',['booking'=>$booking->id]) }}" class="btn btn-primary waves-effect waves-light">View Profile</a>
                                    </div>
                                </div>
                                <!--<div class="row">
                                    <div class="col-5"><p>Contact Number:</p></div>
                                    <div class="col-7"><p class="font-weight-bold">079 1232 4897</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><p>Email:</p></div>
                                    <div class="col-7"><p class="font-weight-bold">johndoe@gmail.com</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><p>Membership:</p></div>
                                    <div class="col-7"><p class="font-weight-bold">Hours</p></div>
                                </div>--></div>
                        </div>
                        <hr>
                        <div class="row desc-images">
                            <!-- <div class="col-md-12">
                                <a href="#">
                                    <img src="{{asset('assets/app-assets/images/profile/user-uploads/user-01.jpg')}}">
                                </a>
                                <a href="#">
                                    <img src="{{asset('assets/app-assets/images/profile/user-uploads/user-02.jpg')}}">
                                </a>
                                <a href="#">
                                    <img src="{{asset('assets/app-assets/images/profile/user-uploads/user-03.jpg')}}">
                                </a>
                                <a href="#">
                                    <img src="{{asset('assets/app-assets/images/profile/user-uploads/user-04.jpg')}}">
                                </a>
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="col-12 text-center" style="padding-bottom: 50px;">
        <a href="javascript:void(0);" class="btn btn-light waves-effect waves-light">RESEND INVOICE</a>
        <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light">RECEIVED PAYMENT</a>
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
                <form action="{{route('garage.booking.save_report')}}" method="GET">

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

@endsection
