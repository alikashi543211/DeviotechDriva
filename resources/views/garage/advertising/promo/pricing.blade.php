@extends('garage.advertising.layout')
@section('title','Promotion Plan Pricing')
@section('advertising-navigation')
    <div class="row">
        <div class="col-12">
            <div class="tabs-section">
                <ul>
                    <li><a href="{{ route('garage.advertising.promo.plans') }}">Select Plan</a></li>
                    <li class="active"><a href="{{ route('garage.advertising.promo.pricing') }}">Select Pricing</a></li>
                    <li class="disabled"><a href="{{ route('garage.advertising.promo.overview') }}">Overview</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('advertising-content')
<div class="row mt-4">
    <div class="col-12 mb-1">
        <h5>CHOOSE PRICING FOR <b class="text-primary">CITY PLAN</b></h5>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-header mx-auto pb-0">
                <div class="row m-0">
                    <div class="col-sm-12 text-center">
                        <h2>3 Days Plan</h2>
                    </div>
                    <div class="col-sm-12 mt-2 text-center">
                        <h4>${{ $three_days }}</h4>
                        <p>Maximum savings<br>Long serving packag</p>
                    </div>
                </div>
            </div>
            <div class="card-content text-center">
                <div class="card-body text-center mx-auto">
                    <a href="{{ route('garage.advertising.promo.overview') }}?p={{ base64_encode('district') }}&d={{ base64_encode('3') }}&a={{ base64_encode($three_days) }}" class="btn btn-primary btn-block ">BUY NOW</a>
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
                        <h4>${{ $five_days }}</h4>
                        <p>Maximum savings<br>Long serving packag</p>
                    </div>
                </div>
            </div>
            <div class="card-content text-center">
                <div class="card-body text-center mx-auto">
                    <a href="{{ route('garage.advertising.promo.overview') }}?p={{ base64_encode('district') }}&d={{ base64_encode('5') }}&a={{ base64_encode($five_days) }}" class="btn btn-primary btn-block ">BUY NOW</a>
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
                        <h4>${{ $seven_days }}</h4>
                        <p>Maximum savings<br>Long serving packag</p>
                    </div>
                </div>
            </div>
            <div class="card-content text-center">
                <div class="card-body text-center mx-auto">
                    <a href="{{ route('garage.advertising.promo.overview') }}?p={{ base64_encode('district') }}&d={{ base64_encode('7') }}&a={{ base64_encode($seven_days) }}" class="btn btn-primary btn-block ">BUY NOW</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
