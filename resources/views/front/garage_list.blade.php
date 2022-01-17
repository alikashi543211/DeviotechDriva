@extends('front.layout.master2')
@section('title','Search Results')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/price_range_style.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/garage_list.css">
    <style>
        .ml_9
        {
            margin-left: 6rem !important;
        }
        .pagination
        {
            justify-content:center;
        }
        .services-row .card-body{
            padding: 18px !important;
        }
        .price_collapse{
            padding-left: 13px !important;
            padding-right: 13px !important;
        }
        .price_collapse span{
            margin-left: -10px;
        }
    </style>
@endsection


@section('content')

<div class="content-header garage-list-header">
    <div class="row">
        <div class="col-md-1 col-1"></div>
        <div class="col-md-6 col-sm-6 mb-3">
            <div class="page-heading">
                <h3>{{$total_garages}} {{ $total_garages > 1 || $total_garages == 0 ? 'results' : 'result' }} found for {{request()->keyword}} in <span>{{ explode( ",", request()->location )[0]}}</span></h3>
            </div>
        </div>

    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
        @if($garages->isNotEmpty())
            @foreach($garages->where('is_featured',1) as $data)
                <div class="row">
                    <div class="col-1 m-0 pr-0 pt-0 pb-0"></div>
                    <div class="col-11 m-0 pt-0 pb-0">
                        <div class="card booking-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-3">

                                            <div class="users-view-image text-center justify-content-center">
                                                @if(isset($data->logo))
                                                    <img src="{{ asset($data->logo) }}" width="160" class="users-avatar-shadow garage-list-image" alt="avatar">
                                                @else
                                                <img src="{{ asset('images/user.png') }}" width="160" class="users-avatar-shadow garage-list-image" alt="avatar">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-8 col-lg-6 cent">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="page-heading garage_title">
                                                        <a href="{{route('front.garage_detail',$data->slug)}}">
                                                            <h3>{{$data->name}}</h3>
                                                        </a>
                                                    </div>
                                                    <p class="mb-0">{{$data->address}}</p>

                                                </div>
                                                <div class="mt-3"></div>


                                                <div class="col-12">

                                                    <a href="{{$data->website}}" target="_blank" class="btn btn-primary mr-1 mt-2 waves-effect waves-light"><i class="fa fa-globe"></i> Website</a>
                                                    <a href="javascript:void(0);" data-id="#telephone-{{ $data->id }}" data-contact-one="{{ $data->contact_1 }}" class="btn btn-primary mr-1 mt-2 waves-effect waves-light call_button"><i class="fa fa-phone mr-1"></i> Call</a>
                                                </div>
                                                <div class="col-12" id="telephone-{{ $data->id }}" style="display: none;">
                                                    <div class="telephone mt-1 px-1">
                                                        <p class="mb-0 font-weight-bold">Tel:</p>
                                                        <p class="contact_one"></p>
                                                        <span class="wrong-icon">×</span>
                                                    </div>
                                                </div>
                                                <div class="col-6 mt-1">
                                                    @if($data->garage_keywords->count() > 0)
                                                        <ul class="m-0 p-1">
                                                            @foreach($data->garage_keywords as $keyword)
                                                                @if( $loop->iteration <= 3 )
                                                                    <li>{{ $keyword->keyword }}</li>
                                                                @else
                                                                    @php
                                                                        $key_words[] = $keyword->keyword;
                                                                    @endphp
                                                                    @continue
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                                <div class="col-6 mt-1">
                                                    @if(isset($key_words))
                                                        <ul class="m-0 p-1">
                                                            @foreach($key_words as $key_word)
                                                                @if( $loop->iteration <= 3 )
                                                                    <li>{{ $key_word }}</li>
                                                                @else
                                                                    @continue
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                                <div class="badge badge-square badge-warning mb-1 feature " style="">
                                                <div class="inside">
                                                        <span>Featured</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-12 str details_btn_box">
                                            <div class="col-lg-12 col-md-12 col-sm-4 text-center">
                                                <span class="font-feather">
                                                    @for($i=1;$i<=5; $i++)
                                                        <i class="fa fa-star @if($i<=garage_stars($data)) text-star-warning @endif"></i>
                                                    @endfor
                                                </span>
                                            </div>
                                            <div class="col-lg-12 col-md-3 col-md-12 col-sm-4 text-center">
                                                <a href="javascript:void(0);" class="pl-1 text-danger"><span>{{ garage_stars($data) }}</span> <span style="font-size:14px;">({{ garage_reviews($data) }} {{ garage_reviews($data) > 1 || garage_reviews($data) == 0 ? 'reviews' : 'review' }})</span></a>
                                            </div>
                                            <a href="{{route('front.garage_detail',$data->slug)}}" class="btn btn-primary mt-5 waves-effect waves-light web details_btn">  Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 m-0 pr-0 pt-0 pb-0"></div>
                </div>
            @endforeach
            @foreach($garages->where('is_featured',0) as $data)
                <div class="row">
                    <div class="col-1 m-0 pr-0 pt-0 pb-0"></div>
                    <div class="col-11 m-0 pt-0 pb-0">
                        <div class="card booking-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-3">

                                            <div class="users-view-image text-center justify-content-center">
                                                @if(isset($data->logo))
                                                    <img src="{{ asset($data->logo) }}" class="users-avatar-shadow  garage-list-image" alt="avatar">
                                                @else
                                                <img src="{{ asset('images/user.png') }}" class="users-avatar-shadow garage-list-image" alt="avatar">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-8 col-lg-6 cent">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="page-heading garage_title">
                                                        <a href="{{route('front.garage_detail',$data->slug)}}">
                                                            <h3>{{$data->name}}</h3>
                                                        </a>
                                                    </div>
                                                    <p class="mb-0">{{$data->address}}</p>

                                                </div>
                                                <div class="mt-3"></div>


                                                <div class="col-12">

                                                    <a href="{{$data->website}}" target="_blank" class="btn btn-primary mr-1 mt-2 waves-effect waves-light"><i class="fa fa-globe"></i> Website</a>
                                                    <a href="javascript:void(0);" data-id="#telephone-{{ $data->id }}" data-contact-one="{{ $data->contact_1 }}" class="btn btn-primary mr-1 mt-2 waves-effect waves-light call_button"><i class="fa fa-phone mr-1"></i> Call</a>
                                                </div>
                                                <div class="col-12" id="telephone-{{ $data->id }}" style="display: none;">
                                                    <div class="telephone mt-1 px-1">
                                                        <p class="mb-0 font-weight-bold">Tel:</p>
                                                        <p class="contact_one"></p>
                                                        <span class="wrong-icon">×</span>
                                                    </div>
                                                </div>
                                                <div class="col-6 mt-1">
                                                    @if($data->garage_keywords->count() > 0)
                                                        <ul class="m-0 p-1">
                                                            @foreach($data->garage_keywords as $keyword)
                                                                @if( $loop->iteration <= 3 )
                                                                    <li>{{ $keyword->keyword }}</li>
                                                                @else
                                                                    @php
                                                                        $key_words[] = $keyword->keyword;
                                                                    @endphp
                                                                    @continue
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                                <div class="col-6 mt-1">
                                                    @if(isset($key_words))
                                                        <ul class="m-0 p-1">
                                                            @foreach($key_words as $key_word)
                                                                @if( $loop->iteration <= 3 )
                                                                    <li>{{ $key_word }}</li>
                                                                @else
                                                                    @continue
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                                {{-- <div class="badge badge-square badge-warning mb-1 feature " style="">
                                                <div class="inside">
                                                        <span>Featured</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-12 str details_btn_box">
                                            <div class="col-lg-12 col-md-12 col-sm-4 text-center">
                                                <span class="font-feather">
                                                    @for($i=1;$i<=5; $i++)
                                                        <i class="fa fa-star @if($i<=garage_stars($data)) text-star-warning @endif"></i>
                                                    @endfor
                                                </span>
                                            </div>
                                            <div class="col-lg-12 col-md-3 col-md-12 col-sm-4 text-center">
                                                <a href="javascript:void(0);" class="pl-1 text-danger"><span>{{ garage_stars($data) }}</span> <span style="font-size:14px;">({{ garage_reviews($data) }} {{ garage_reviews($data) > 1 || garage_reviews($data) == 0 ? 'reviews' : 'review' }})</span></a>
                                            </div>
                                            <a href="{{route('front.garage_detail',$data->slug)}}" class="btn btn-primary mt-5 waves-effect waves-light web details_btn">  Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 m-0 pr-0 pt-0 pb-0"></div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    {{ $garages->withQueryString()->links() }}
                </div>
            </div>
        @else
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12 mb-3 m-0 m-auto text-center">
                        <div class="alert-dismissible fade show" role="alert">
                            <h5 class="font-weight-bold mb-0">
                                <i class="fa fa-exclamation-triangle font-large-2" aria-hidden="true"></i>
                            </h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-3"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12 mb-3 m-0 m-auto text-center">
                        <div class="alert-dismissible fade show" role="alert">
                            <h5 class="font-weight-bold mb-0">
                                <p class="mt-1">Your search doesn’t match up with any garage ad!<br>
                                    <small>Try to search with another keyword</small>
                                </p>
                            </h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-3"></div>
                </div>
            </div>
        @endif
    </section>
</div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <script>
        $(document).on("click", ".call_button", function(){
            data_id = $(this).attr("data-id");
            contact_one = $(this).attr("data-contact-one");
            console.log(data_id);
            console.log(contact_one);
            $(data_id).find('.contact_one').html(contact_one);
            $(data_id).slideDown();
        });

        $(document).on("click", ".wrong-icon", function(){
            wrong_icon = $(this);
            $(wrong_icon).closest('.col-12').slideUp();
        });

        $(document).on("change", ".services-checkboxes", function(){
            $(this).closest(".col-md-4").find(".card").toggleClass("icon-selected");
        });
    </script>
@endsection
