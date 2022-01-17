@extends('garage.advertising.layout')
@section('title','Discount Detail')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('advertising-navigation')
    <div class="row">
        <div class="col-12">
            <div class="tabs-section">
                <ul>
                    <li><a href="{{ route('garage.advertising.discount.services') }}">Select Services</a></li>
                    <li class="active"><a href="{{ route('garage.advertising.discount.detail') }}">Discount Detail</a></li>
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
        <h5>DISCOUNT DETAIL</h5>
    </div>
</div>
<form action="{{ route('garage.advertising.discount.overview') }}" method="GET">
    <div class="card">
        <div class="card-body">
            <div class="card-content">
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
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <p><b>Enter your discount message and the date that the offer expires below</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="detail">Discount Message </label>
                            <textarea data-length="20"  maxlength="100" minlength="10" data-bv-stringlength-message="The full name must be more than 10 and less than 40 characters" class="form-control char-textarea" id="textarea-counter" rows="1" name="message"></textarea>
                            <label for="textarea-counter"></label>
                            <small class="counter-value float-right"><span class="char-count">0</span> / 100 </small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="detail">
                                Offer Expiry Date
                            </label>
                            <input type="text" class="form-control required datetimepicker" id="expiry_date" placeholder="Offer expiry date" name="expiry_date">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2 mb-4">
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary bold">
                Continue <i class="fa fa-chevron-right"></i>
            </button>
        </div>
    </div>
</form>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.datetimepicker').bootstrapMaterialDatePicker({ time: false,format : 'DD-MM-yyyy',
                minDate:new Date() });
        });
    </script>
@endsection
