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
                                        <p class="vehicle-info">{{date('d-M-Y',strtotime($booking->created_at))}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <p>Services:</p>
                                    </div>
                                    <div class="col-8">
                                    	@foreach($booking->booking_services as $s)
                                        <img src="{{ asset($s->image) }}" width="20" style="z-index:999;" alt="">
                                        @endforeach
                                        
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Inspection -->
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

    <!-- Pending -->
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
                                        <p class=""><b>{{date('d-M-Y',strtotime($booking->created_at))}}</b>
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
                                        @if(!empty($booking->consumer_profile_info->picture))
                                        <img class="pro-img" src="{{asset($booking->consumer_profile_info->picture)}}" alt="Generic placeholder image" class="img-fluid">
                                        @else
                                        <img class="pro-img" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <p class="mb-0"><b> {{$booking->consumer_profile_info->user->name}}</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <p class="mb-1"><b> {{$booking->consumer_profile_info->contact_number}} </b>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center"> <a href="{{ route('admin.booking.consumer_profile',$booking->id) }}" class="btn btn-primary waves-effect waves-light">View Profile</a>
                                    </div>
                                </div>
                               </div>
                        </div>
                        <hr>
                        <div class="row desc-images">
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
