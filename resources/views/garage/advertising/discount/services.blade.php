@extends('garage.advertising.layout')
@section('title','Discount Services')
@section('advertising-navigation')
    <div class="row">
        <div class="col-12">
            <div class="tabs-section">
                <ul>
                    <li class="active"><a href="{{ route('garage.advertising.discount.services') }}">Select Services</a></li>
                    <li><a href="{{ route('garage.advertising.discount.detail') }}">Discount Detail</a></li>
                    <li><a href="{{ route('garage.advertising.discount.overview') }}">Overview</a></li>
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

<div class="row mt-4">
    <div class="col-12 mb-1">
        <h5>SERVICES</h5>
    </div>
</div>
<form action="{{ route('garage.advertising.discount.detail') }}" method="GET">
    <div class="card">
        <div class="card-body">
            <div class="card-content">
                <div class="row">
                    <div class="col-12">
                        @foreach ($garage->garage_services as $item)
                            <label for="{{ $item->service->name }}" class="profile-boxes services text-center">
                                <div class="inner-profile-boxes">
                                    <img src="{{ asset($item->service->image) }}" class="img-fluid" alt="{{ $item->service->name }}">
                                    <h6>{{ $item->service->name }}</h6>
                                </div>
                            </label>
                            <input type="checkbox" name="service_id[]" class="profile-boxes-check" value="{{ $item->service->id }}" id="{{ $item->service->name }}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary bold">
                Continue <i class="fa fa-chevron-right"></i>
            </button>
        </div>
    </div>
</form>
@endsection
