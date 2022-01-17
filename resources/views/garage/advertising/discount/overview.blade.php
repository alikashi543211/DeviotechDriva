@extends('garage.advertising.layout')
@section('title','Discount Overview')
@section('advertising-navigation')
    <div class="row">
        <div class="col-12">
            <div class="tabs-section">
                <ul>
                    <li><a href="{{ route('garage.advertising.discount.services') }}">Select Services</a></li>
                    <li><a href="{{ route('garage.advertising.discount.detail') }}">Discount Detail</a></li>
                    <li class="active"><a href="{{ route('garage.advertising.discount.overview') }}">Overview</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('advertising-content')
<style type="text/css">
    .btn {
    padding: 0.9rem 4rem;
}
</style>

<form action="{{ route('garage.advertising.discount.submit') }}" method="POST">
    @csrf
    <input type="hidden" name="message" value="{{ $req->message }}">
    <input type="hidden" name="expiry_date" value="{{ $req->expiry_date }}">
    <div class="card mt-4">
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        @foreach ($services as $item)
                            <label for="{{ $item->name }}" class="profile-boxes services text-center active">
                                <div class="inner-profile-boxes">
                                    <img src="{{ asset($item->image) }}" class="img-fluid" alt="{{ $item->name }}">
                                    <h6>{{ $item->name }}</h6>
                                </div>
                            </label>
                            <input type="checkbox" name="service_id[]" value="{{ $item->id }}" class="profile-boxes-check" checked value="" id="{{ $item->name }}">
                        @endforeach
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-8">
                        <div class="content-header">
                            <div class="page-heading">
                                <div class="clearfix">
                                    <h4>Message:</h4>
                                </div>
                            </div>
                        </div>
                        <p>
                            "{{ $req->message }}"
                        </p>
                    </div>
                    <div class="col-4 text-center">
                         <div class="content-header">
                            <div class="page-heading">
                                <div class="clearfix">
                                    <h4>Expires On</h4>
                                </div>
                            </div>
                        </div>
                        <p> {{ $req->expiry_date }}.</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">

                        <p><b>
                            Your discount message will be sent to {{ garageFollowers(garage()->id) }} users that follow your garage profile.</b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('js')
<script src="{{asset('assets/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/charts/chart-apex.js')}}"></script>
@endsection
