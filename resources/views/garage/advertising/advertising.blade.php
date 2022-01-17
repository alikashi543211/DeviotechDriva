@extends('garage.layouts.master')
@section('title','Garage Advertising')
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-3">
            <div class="page-heading">
                <h3 class="float-left">Garage Advertising</h3>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <span class="feather-icon select-none relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home h-5 w-5 mb-1 stroke-current text-primary">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Garage Advertising
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <div class="row">
        <div class="col-12 mb-1">
            <h5>FEATURED DISTRICT PLAN</h5>
            <p>Appear on the top of search results and increase the exposure of your garage profile by feature advertising in Netherpark Crescent</p>
        </div>
    </div>
	<div class="card">
        <div class="card-body">
            <div class="card-content">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="users-view-image text-center justify-content-center">
                            <img src="{{ asset('assets/app-assets/images/portrait/small/avatar-s-12.jpg') }}" width="160" class="users-avatar-shadow rounded-circle" alt="avatar">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                        <div class="row mb-1">
                            <div class="col-12">
                                <h6><b>DELTA MOTORWORKS</b></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <p>37 Netherpark Cresent, City of London, London, EC4A 2ND</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 mb-1">
            <h5>CHOOSE YOUR PLAN</h5>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header mx-auto pb-0">
                    <div class="row m-0">
                        <div class="col-sm-12 text-center">
                            <h2>3 Days Plan</h2>
                        </div>
                        <div class="col-sm-12 mt-2 text-center">
                            <h4>$3.95</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content text-center">
                    <div class="card-body text-center mx-auto">
                        <a href="" class="btn btn-primary btn-block mt-2">BUY NOW</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header mx-auto pb-0">
                    <div class="row m-0">
                        <div class="col-sm-12 text-center">
                            <h2>5 Days Plan</h2>
                        </div>
                        <div class="col-sm-12 mt-2 text-center">
                            <h4>$3.95</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content text-center">
                    <div class="card-body text-center mx-auto">
                        <a href="" class="btn btn-primary btn-block mt-2">BUY NOW</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header mx-auto pb-0">
                    <div class="row m-0">
                        <div class="col-sm-12 text-center">
                            <h2>7 Days Plan</h2>
                        </div>
                        <div class="col-sm-12 mt-2 text-center">
                            <h4>$3.95</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content text-center">
                    <div class="card-body text-center mx-auto">
                        <a href="" class="btn btn-primary btn-block mt-2">BUY NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 mb-1">
            <h5>FEATURED CITY PLAN</h5>
            <p>Appear on the top of search results and increase the exposure of your garage profile by feature advertising in London</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-content">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="users-view-image text-center justify-content-center">
                            <img src="{{ asset('assets/app-assets/images/portrait/small/avatar-s-12.jpg') }}" width="160" class="users-avatar-shadow rounded-circle" alt="avatar">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                        <div class="row">
                            <div class="col-3">
                                <p class="font-weight-bold">Heading Text:</p>
                            </div>
                            <div class="col-9">
                                <p>DELTA MOTORWORKS</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p class="font-weight-bold">Main Text:</p>
                            </div>
                            <div class="col-9">
                                <p>We have full SSD diagnostic equipment connected directly to Land Rover UK</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p class="font-weight-bold">Button Text:</p>
                            </div>
                            <div class="col-9">
                                <p>BOOK NOW</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 mb-1">
            <h5>CHOOSE YOUR PLAN</h5>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header mx-auto pb-0">
                    <div class="row m-0">
                        <div class="col-sm-12 text-center">
                            <h2>3 Days Plan</h2>
                        </div>
                        <div class="col-sm-12 mt-2 text-center">
                            <h4>$11.95</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content text-center">
                    <div class="card-body text-center mx-auto">
                        <a href="" class="btn btn-primary btn-block mt-2">BUY NOW</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header mx-auto pb-0">
                    <div class="row m-0">
                        <div class="col-sm-12 text-center">
                            <h2>5 Days Plan</h2>
                        </div>
                        <div class="col-sm-12 mt-2 text-center">
                            <h4>$11.95</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content text-center">
                    <div class="card-body text-center mx-auto">
                        <a href="" class="btn btn-primary btn-block mt-2">BUY NOW</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header mx-auto pb-0">
                    <div class="row m-0">
                        <div class="col-sm-12 text-center">
                            <h2>7 Days Plan</h2>
                        </div>
                        <div class="col-sm-12 mt-2 text-center">
                            <h4>$11.95</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content text-center">
                    <div class="card-body text-center mx-auto">
                        <a href="" class="btn btn-primary btn-block mt-2">BUY NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
