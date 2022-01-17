@extends('garage.advertising.layout')
@section('title','Promotion Plans')
@section('advertising-navigation')
    <div class="row">
        <div class="col-12">
            <div class="tabs-section">
                <ul>
                    <li class="active"><a href="{{ route('garage.advertising.promo.plans') }}">Select Plan</a></li>
                    <li class="disabled"><a href="{{ route('garage.advertising.promo.pricing') }}">Select Pricing</a></li>
                    <li class="disabled"><a href="{{ route('garage.advertising.promo.overview') }}">Overview</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('advertising-content')
<style type="text/css">
    .feature{
        position:absolute;
        top:82%;
        left:44%;
    }
</style>
<div class="row mt-4">
    <div class="col-6 mb-1 text-center">


        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="users-view-image text-center justify-content-center">
                                 <h5>FEATURED CITY PLAN</h5>
                                <img src="{{ asset('assets/app-assets/images/portrait/small/avatar-s-12.jpg') }}" width="150" class="users-avatar-shadow rounded-circle" alt="avatar">
                                 <div class="badge badge-square badge-warning mb-1 feature ">
                                    <div class="inside">
                                        <span>Featured</span>
                                    </div>
                                 </div>
                            </div>

                        </div>
                        <div class="col-12 text-center mt-3">
                            <h6><b> Maximum Exposure </b></h6>
                            <p> Featured Advertising in London </p>
                            <a href="{{ route('garage.advertising.promo.pricing') }}?p={{ base64_encode('city') }}" class="btn btn-primary bold">CHOOSE PLAN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 mb-1 text-center" >


        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="users-view-image text-center justify-content-center">
                                  <h5>FEATURED DISTRICT PLAN</h5>
                                <img src="{{ asset('assets/app-assets/images/portrait/small/avatar-s-12.jpg') }}" width="150" class="users-avatar-shadow rounded-circle" alt="avatar">
                                 <div class="badge badge-square badge-warning mb-1 feature ">
                                    <div class="inside">
                                          <span>Featured</span>
                                    </div>
                                 </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3">
                            <h6><b> Increase Your Exposure </b></h6>
                            <p> Featured Adverting in Camden Town </p>
                            <a href="{{ route('garage.advertising.promo.pricing') }}?p={{ base64_encode('district') }}" class="btn btn-success bold">CHOOSE PLAN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
