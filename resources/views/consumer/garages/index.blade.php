@extends('consumer.layouts.master')
@section('title','Garages')
@section('content')
<style type="text/css">
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
    .keywordList{
        position:absolute;
        width:95%;
    }
    .locationList{
        position:absolute;
        width:95%;
    }
    .keyword-list-ul{
        padding:8px;
    }
    .keyword-list-ul li{
        padding-left:10px;
        padding-right:10px;
        padding-top:3px;
        padding-bottom:3px;
    }
</style>
<div class="content-header">
    <div class="row">
        <div class="col-md-6 col-sm-6 mb-3">
            <div class="page-heading">
                <h3>Garages</h3>
            </div>
        </div>

    </div>
</div>
<div class="content-body">

    <section id="basic-datatable">
    	{{-- <form method="GET">
    	    <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="text" name="keyword" id="keyword" placeholder="Enter a search term" class="form-control" value="{{$request->keyword ?? ''}}" autocomplete="off" required>
                        <div id="keywordList" class="keywordList"></div>
                        {{ csrf_field() }}
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <input type="text" name="location" id="location" placeholder="UK, town or postcode" class="form-control" value="{{$request->location ?? ''}}" autocomplete="off" required>
                        <div id="locationList" class="locationList"></div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" target="_blank" class="btn btn-primary btn-block btn-sm waves-effect waves-light web"><i class="fa fa-search" aria-hidden="true"></i>  Search</button>
                </div>
    		</div>
    	</form> --}}
@if($garages->isNotEmpty())
@foreach($garages as $data)
<div class="row">
    <div class="col-1 m-0 pr-0 pt-0 pb-0"></div>
    <div class="col-10 m-0 pr-0 pt-0 pb-0">
        <div class="card booking-card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-4 col-lg-3">

                            <div class="users-view-image text-center justify-content-center">
                                @if(isset($data->logo))
                                    <img src="{{ asset($data->logo) }}" width="160" class="users-avatar-shadow rounded-circle" alt="avatar">
                                @else
                                <img src="{{ asset('images/user.png') }}" width="160" class="users-avatar-shadow rounded-circle" alt="avatar">
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8 col-lg-6 cent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-heading">
                                        <h3>{{$data->name}}</h3>
                                    </div>
                                    <p class="mb-0">{{$data->address}}</p>

                                </div>
                                <div class="mt-3"></div>


                                <div class="col-12">

                                    <a href="{{$data->website}}" target="_blank" class="btn btn-primary mr-1 mt-2 waves-effect waves-light"><i class="fa fa-globe"></i> Website</a>
                                </div>
                                <div class="col-12 mt-1">
                                    <small>{{substr($data->description,0,130)}}</small>
                                </div>

                                 {{-- <div class="badge badge-square badge-warning mb-1 feature " style="">
                                   <div class="inside">
                                          <span>Featured</span>
                                    </div>
                                 </div> --}}


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
                                 <a href="{{route('consumer.garages.garage_detail',$data->id)}}" class="btn btn-primary mt-5 waves-effect waves-light web"><i class="fa fa-eye" aria-hidden="true"></i>  View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="col-1 m-0 pr-0 pt-0 pb-0"></div>

  </div>
  @endforeach
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
                        <p class="mt-1">Your search doesn't match to our record!<br>
                            <small>Try to search with another keyword</small>

                        </p>
                    </h5>
                </div>
            </div>
            <div class="col-md-3 col-3"></div>
        </div>
    </div>
  @endif
</div>
</section>


@endsection
@section('js')
<script>
$(document).ready(function(){

    $('#keyword').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('keywordlist.fetch') }}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                    $('#keywordList').fadeIn();
                    $('#keywordList').html(data);
                }
            });
        }
        else{
            $('#keywordList').fadeOut();
        }
    });

    $('#location').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('locationlist.fetch') }}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                    $('#locationList').fadeIn();
                    $('#locationList').html(data);
                }
            });
        }
        else{
            $('#locationList').fadeOut();
        }
    });

});
function loadKeywordList()
{
    $.ajax({
        type: "GET",
        url: "{{ route('load.keyword.list') }}",
        success: function (response) {
            $('#keywordList').html(response);
        }
    });
}
</script>
@endsection
