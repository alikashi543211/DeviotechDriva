@extends('garage.layouts.master')
@section('title','Dashboard')
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-8 col-sm-12 mb-3">
            <div class="page-heading">
                <h3 class="float-left">Booking Summary</h3>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.booking') }}">Booking</a>
                        </li>
                        <li class="breadcrumb-item active">GB8066587
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a href="#" class="btn btn-light waves-effect waves-light">DECLINE</a>
            <a href="#" class="btn btn-primary waves-effect waves-light">ACCEPT</a>
        </div>
    </div>
</div>
<div class="content-body">

    <div class="content-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="page-heading">
                    <h4>Booking ID : GB8066587</h4>
                </div>
            </div>
        </div>
    </div>
    <section class="mb-5">
        <div class="row match-height">
            <div class="col-sm-3 mr-0 pr-0">
                <div class="card vehicle-img">
                    <img src="{{asset('assets/app-assets/images/portrait/small/avatar-s-16.jpg')}}" alt="Generic placeholder image" class="img-fluid">
                    <div class="vehicle-no"><span>ky68wzm</span></div>
                </div>
            </div>
            <div class="col-sm-9 ml-0 pl-0">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body" style="padding-top: 2.5rem;">
                            <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4"><p>Make</p></div>
                                        <div class="col-md-7"><p class="vehicle-info">Skoda</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-4"><p>Model</p></div>
                                    <div class="col-md-7"><p class="vehicle-info">Kodiaq vrs tdi 4x4 s-a</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-4"><p>Engine Size</p></div>
                                    <div class="col-md-7"><p class="vehicle-info">1968</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-4"><p>Body Type</p></div>
                                    <div class="col-md-7"><p class="vehicle-info">Estate</p></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="vehicle-info float-right">Status</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="vehicle-info float-right">Panding</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-4" style="font-size: 16px">
                                            <i class="fa fa-file-excel-o"></i>
                                            <i class="fa fa-print float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="row">
                                    <div class="col-4"><p class="font-weight-bold">Date/Time:</p></div>
                                    <div class="col-8"><p>{{date('d M')}} {{now()->diffForHumans()}}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-4"><p class="font-weight-bold">Mileage:</p></div>
                                    <div class="col-8"><p>30575mi</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-4"><p class="font-weight-bold">Services:</p></div>
                                    <div class="col-8">
                                        <img src="{{ asset('assets/app-assets/images/svg/Body-Work.svg') }}" width="20" style="z-index:999;" alt="">
                                        <img src="{{ asset('assets/app-assets/images/svg/plug.svg') }}" width="20" style="z-index:999;" alt="">
                                        <img src="{{ asset('assets/app-assets/images/svg/MOT.svg') }}" width="20" style="z-index:999;" alt="">
                                        <img src="{{ asset('assets/app-assets/images/svg/recovery.svg') }}" width="20" style="z-index:999;" alt="">
                                        <img src="{{ asset('assets/app-assets/images/svg/repairs.svg') }}" width="20" style="z-index:999;" alt=""></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="row">
                                    <div class="col-4"><p class="font-weight-bold">Garage:</p></div>
                                    <div class="col-8"><a href="#">Delta Motorworks</a></div>
                                </div>
                                <div class="row">
                                    <div class="col-4"><p class="font-weight-bold"></p></div>
                                    <div class="col-8"><p>Tel. 020 869 0061</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-4"><p class="font-weight-bold"></p></div>
                                    <div class="col-8"><a href="#">deltamotors.co.uk</a></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                               <div class="vehicle-img">
                                    <img height="115" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-16.jpg')}}" alt="Generic placeholder image">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 float-right">
                               <div class="row">
                                    <div class="col-12"><h1 class="font-weight-bold text-right mr-2">$123456</h1></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2 border-top">
                                <p class="mb-0 mt-2">
                                    Bonbon chocolate bar candy canes sugar plum pie gingerbread wafer chupa chups gummi bears. Carrot cake oat cake jujubes cookie. Marzipan topping jelly brownie bear claw. Bonbon gummies fruitcake
                                    liquorice tart sesame snaps.
                                </p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2">
                                <h3>Service Task(s)</h3>
                                <div class="row">
                                    <p class="col-12">1. Engine Tune-up</p>
                                    <p class="col-12">2. Wheels aligned/balanced</p>
                                    <p class="col-12">3. Cooling System Repaire</p>
                                    <p class="col-12">4. Battery Replacement</p>
                                    <p class="col-12">5. Brake Inspection</p>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Items</th>
                                                        <th class="text-right">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Parts</td>
                                                        <td class="text-right">$1875</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Labar</td>
                                                        <td class="text-right">$1900</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total</th>
                                                        <th class="text-right">$3075</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="basic-tabs-components" class="mb-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all" data-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="bookings" data-toggle="tab" href="#left" aria-controls="gallery" role="tab" aria-selected="false">Gallery</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                                    <div class="media mb-1">
                                        <a class="align-self-start media-left mr-2" href="#">
                                            <img class="media-object img-xl rounded-circle" src="{{asset('images/user.png')}}" alt="Generic placeholder image" />
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading">Jake Ellis</h5>
                                            <div class="row" style="margin: 20px 20px 20px  0px">
                                                <p class="mb-0">
                                                    Bonbon chocolate bar candy canes sugar plum pie gingerbread wafer chupa chups gummi bears. Carrot
                                                    cake oat cake jujubes cookie. Marzipan topping jelly brownie bear claw. Bonbon gummies fruitcake
                                                    liquorice tart sesame snaps.
                                                </p>
                                            </div>
                                            <div class="clearfix">
                                            <div class="float-left">
                                                {{date('d M')}}
                                            </div>
                                            <div class="float-right">
                                                {{ now()->diffForHumans() }}
                                            </div>
                                        </div>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="media mb-1">
                                        <a class="align-self-start media-left mr-2" href="#">
                                            <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" />
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading">Jake Ellis</h5>
                                            <div class="row" style="margin: 20px 20px 20px  0px">
                                                <div style="position:relative;">
                                                    <img src="{{asset('assets/app-assets/images/pages/search-result.jpg')}}" alt="Generic placeholder image" height="125" width="200" style="margin: 20px 20px 20px 10px" />
                                                    <a href="#"><span style="position: absolute; bottom: 30px; right: 30px; font-size: 30px;"><i class="fa fa-download" aria-hidden="true"></i></span></a>
                                                </div>
                                                <div style="position:relative;">
                                                    <img src="{{asset('assets/app-assets/images/pages/search-result.jpg')}}" alt="Generic placeholder image" height="125" width="200" style="margin: 20px 20px 20px 10px" />
                                                    <a href="#"><span style="position: absolute; bottom: 30px; right: 30px; font-size: 30px;"><i class="fa fa-download" aria-hidden="true"></i></span></a>
                                                </div>
                                                <div style="position:relative;">
                                                    <img src="{{asset('assets/app-assets/images/pages/search-result.jpg')}}" alt="Generic placeholder image" height="125" width="200" style="margin: 20px 20px 20px 10px" />
                                                    <a href="#"><span style="position: absolute; bottom: 30px; right: 30px; font-size: 30px;"><i class="fa fa-download" aria-hidden="true"></i></span></a>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    {{date('d M')}}
                                                </div>
                                                <div class="float-right">
                                                    {{ now()->diffForHumans() }}
                                                </div>
                                            </div>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="media mb-1">
                                        <a class="align-self-start media-left mr-2" href="#">
                                            <img class="media-object img-xl rounded-circle" src="{{asset('assets/app-assets/images/portrait/small/avatar-s-4.jpg')}}" alt="Generic placeholder image" />
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading">Top Aligned Media</h5>
                                            <div class="row" style="margin: 20px 20px 20px  0px">
                                                <p class="mb-0">
                                                    Bonbon chocolate bar candy canes sugar plum pie gingerbread wafer chupa chups gummi bears. Carrot
                                                    cake oat cake jujubes cookie. Marzipan topping jelly brownie bear claw. Bonbon gummies fruitcake
                                                    liquorice tart sesame snaps.
                                                </p>
                                            </div>
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    {{date('d M')}}
                                                </div>
                                                <div class="float-right">
                                                    {{ now()->diffForHumans() }}
                                                </div>
                                            </div>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea data-length="20" class="form-control char-textarea" id="textarea-counter" placeholder="Counter" style="resize: none;"></textarea>
                                                <label for="textarea-counter"></label>
                                            </fieldset>
                                            <div style="background-color: #ccc; border-radius: 3px;">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <i class="fa fa-paperclip ml-1"></i>
                                                    </div>
                                                    <div class="float-right">
                                                        <small class="counter-value float-right"><span class="char-count">0</span> / 2500 </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary mt-sm-1 mb-1 mb-sm-0 waves-effect waves-light">
                                            Reply
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="left" aria-labelledby="Gallery-tab" role="tabpanel">
                                    <!-- Media Alignment start -->
                                    <section id="media-alignment">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="media-list media-bordered">
                                                                <div class="media">
                                                                    <div class="media-body">
                                                                        <div class="clearfix">
                                                                            <div class="float-left">
                                                                                {{date('d M')}}
                                                                            </div>
                                                                            <div class="float-right">
                                                                                {{ now()->diffForHumans() }}
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="media-heading mt-1">Me</h5>
                                                                        <div class="row">
                                                                            <div style="position:relative;">
                                                                                <img src="{{asset('assets/app-assets/images/pages/search-result.jpg')}}" alt="Generic placeholder image" height="125" width="200" style="margin: 20px 20px 20px 10px" />
                                                                                <a href="#"><span style="position: absolute; bottom: 30px; right: 30px; font-size: 30px;"><i class="fa fa-download" aria-hidden="true"></i></span></a>
                                                                            </div>
                                                                            <div style="position:relative;">
                                                                                <img src="{{asset('assets/app-assets/images/pages/search-result.jpg')}}" alt="Generic placeholder image" height="125" width="200" style="margin: 20px 20px 20px 10px" />
                                                                                <a href="#"><span style="position: absolute; bottom: 30px; right: 30px; font-size: 30px;"><i class="fa fa-download" aria-hidden="true"></i></span></a>
                                                                            </div>
                                                                            <div style="position:relative;">
                                                                                <img src="{{asset('assets/app-assets/images/pages/search-result.jpg')}}" alt="Generic placeholder image" height="125" width="200" style="margin: 20px 20px 20px 10px" />
                                                                                <a href="#"><span style="position: absolute; bottom: 30px; right: 30px; font-size: 30px;"><i class="fa fa-download" aria-hidden="true"></i></span></a>
                                                                            </div>
                                                                            <div style="position:relative;">
                                                                                <img src="{{asset('assets/app-assets/images/pages/search-result.jpg')}}" alt="Generic placeholder image" height="125" width="200" style="margin: 20px 20px 20px 10px" />
                                                                                <a href="#"> <span style="position: absolute; bottom: 30px; right: 30px; font-size: 30px;"><i class="fa fa-download" aria-hidden="true"></i></span></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Media Alignment end -->
                                    <!-- Media Alignment start -->
                                    <section id="media-alignment">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="media-list media-bordered">
                                                                <div class="media">
                                                                    <div class="media-body">
                                                                        <div class="clearfix">
                                                                            <div class="float-left">
                                                                                {{date('d M')}}
                                                                            </div>
                                                                            <div class="float-right">
                                                                                {{ now()->diffForHumans() }}
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="media-heading mt-1">John (Delta Motorworks)</h5>
                                                                        <div class="row">
                                                                            <div style="position:relative;">
                                                                                <img src="{{asset('assets/app-assets/images/pages/search-result.jpg')}}" alt="Generic placeholder image" height="125" width="200" style="margin: 20px 20px 20px 10px" />
                                                                                <a href="#"><span style="position: absolute; bottom: 30px; right: 30px; font-size: 30px;"><i class="fa fa-download" aria-hidden="true"></i></span></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
