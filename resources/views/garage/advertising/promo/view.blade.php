@extends('garage.advertising.layout')
@section('title','Promo View')
@section('css')
    <style>
        .cent{
            border-right: 1px solid #ea5455;
        }
        .dec-btn{
            color:;
            font-weight: 600;
        }
        .fill{
            color: #FF9F43;
        }
        .web{
            padding: 12.6px 16px;
        }
        .pl-1{
            font-weight: 700;
        }
        .booking-card{
            border:1px solid #000;
        }
        .feature{
            position: absolute;
            top: 0;
            right: 0;
            font-size:14px;
            padding-left: 31px;
            border-top-left-radius: 15px;

        }
        .badge.badge-warning {
            background-color: red;
        }
        div.inside:before {
            content: '';
            position: absolute;
            top: -4px;
            left: -2px;
            border-top: 36px solid #fff;
            border-right: 41px solid transparent;
            width: 0;
            z-index: 2;
        }
        .str{
            text-align: right;
            font-size: 18px;
        }
        .font-feather{
            font-size: 20px;
        }
        .btn-save{
            padding: 0.9rem 3rem;
        }
    </style>
@endsection
@section('advertising-content')

<div class="row mt-4">
    <div class="col-12 mb-1">
        <h5>FEATURED Ad </h5>
    </div>
    <div class="col-12">
        <p class="font-weight-bold">You have {{ Carbon\Carbon::parse($promo->end_date)->diffInDays(Carbon\Carbon::now()) }} days left in "{{ $promo->days }} days {{ $promo->plan }}" plan</p>
    </div>
</div>
<div class="row">
    <div class="col-1 m-0 pr-0 pt-0 pb-0"></div>
    <div class="col-10 m-0 pr-0 pt-0 pb-0">
        <div class="card booking-card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                            <div class="users-view-image text-center justify-content-center">
                                <img src="{{ asset($garage->logo ?? 'images/user.png') }}" width="160" class="users-avatar-shadow rounded-circle" alt="avatar">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8 col-lg-6 cent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-heading">
                                        <h3>{{ $garage->name }}</h3>
                                    </div>
                                    <p class="mb-0">{{ $garage->address }}</p>
                                </div>
                                <div class="mt-3"></div>
                                <div class="col-12">
                                    <a href="{{ $garage->website }}" target="_blank" class="btn btn-primary mr-1 mt-2 waves-effect waves-light"><i class="fa fa-globe"></i> Website</a>
                                </div>
                                <div class="col-12 mt-1">
                                    <small>{{ Str::limit($garage->description, 100, '...') }}</small>
                                </div>

                                <div class="badge badge-square badge-warning mb-1 feature " style="">
                                    <div class="inside">
                                          <span>Featured</span>
                                    </div>
                                 </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-12 str"  >
                            <div class="col-lg-12 col-md-12 col-sm-4">
                                    <span class="font-feather">
                                        <i class="feather icon-star text-warningc fill"></i>
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-secondary"></i>
                                    </span>
                            </div>
                            <div class="col-lg-12 col-md-3 col-md-12 col-sm-4">
                                    <a href="#" class="pl-1">15 Reviews</a>
                            </div>
                            <div class="col-lg-12 col-md-3 col-sm-4">
                                 <a href="https://www.deltamotorwork.co.uk" target="_blank" class="btn btn-primary mt-5 waves-effect waves-light web"><i class="fa fa-eye" aria-hidden="true"></i>  View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1 m-0 pr-0 pt-0 pb-0"></div>
</div>
@endsection
