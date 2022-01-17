@extends('consumer.layouts.master')
@section('title', 'Support')
@section('content')
<style type="text/css">
    .list-group-item
    {
        border:0px !important;
    }
    .text-center{
        text-align: center;
    }
    .text-right{
        text-align: right;
    }
    .green-btn{
        background-color: #5cb85c;
        color:#fff;
        padding:5px 10px;
        border-radius: 5px;
    }
    .red-btn {
        background-color: #ea5455;
        color:#fff;
        padding:5px 6px;
        border-radius: 5px;
    }
    .blue-bg{
        background-color: #daeef7;
    }
    .useo i{
        font-size:38px;
    }
    .pt-2{
        padding-top:20px;
    }
    .pt-1{
        padding-top:10px;
    }
    .p20{
        padding:20px;
    }
    .p10{
        padding:10px;
    }
    .no-m{
        margin:0;
    }
    .sec-box{
        margin-top:10px;
        background-color: #f2f9ff;


    }
    .sec-box p{
        margin-bottom:0;

    }
    .star{
        text-align: right;

    }
    .border-bl{
        padding-top: 10px;

        border:3px solid #f2f9ff;
    }
    .star i{
        color: #f3dd87;
        font-size:24px;
        padding-right: 2px;
    }
    .head1{
        margin-bottom: 10px;
    }
</style>
<div class="content-header">
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="page-heading">
                <h3 class="float-left">Support</h3>
                
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section id="basic-tabs-components">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 sidebar_cards">
                <div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <div class="row ">
                                <div class="col-md-12 p-0">
                                    <p class="head1 font-medium-1 ml-1"><i class="fa fa-filter text-primary font-medium-1"></i> <b>View</b></p>
                                    <!-- Single line list with Badge-->
                                    <ul class="list-group pmd-list pmd-card-list p-0 m-0">
                                        <label for="open">
                                            <li class="list-group-item d-flex align-items-center" data-value="open">
                                                <input type="radio" name="filter_key" value="open" id="open" class="filter_key" @if(isset($req->type) && $req->type=="open") checked @endif>
                                                <div class="media-body ml-1">
                                                    Open
                                                </div>
                                                <span class="badge badge-primary badge-pill">{{ $open_tickets_count }}</span>

                                            </li>
                                        </label>
                                        <label for="close">
                                            <li class="list-group-item d-flex align-items-center" data-value="closed">
                                                <input type="radio" value="closed" name="filter_key" id="close" class="filter_key" @if(isset($req->type) && $req->type=="closed") checked @endif>
                                                <div class="media-body ml-1">
                                                    Closed
                                                </div>
                                                <span class="badge badge-primary badge-pill">{{ $closed_tickets_count }}</span>
                                            </li>
                                        </label>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <div class="row ">
                                <div class="col-md-12 p-0">
                                    <p class="head1 font-medium-1 ml-1"><i class="feather icon-mail text-primary font-medium-1"></i> <b>Support</b></p>
                                    <!-- Single line list with Badge-->
                                    <ul class="list-group pmd-list pmd-card-list p-0 m-0">

                                        <li class="list-group-item d-flex align-items-center">

                                            <a href="{{ route('consumer.tickets') }}" class="text-dark">
                                                <div class="media-body">
                                                    My Support Tickets
                                                </div>
                                            </a>

                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <a href="javascript:void(0);" class="text-dark open_ticket_btn">
                                                <div class="media-body">
                                                    Knowledgebase
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <a href="{{route('consumer.open_ticket')}}" class="text-dark open_ticket_btn">
                                                <div class="media-body">
                                                    Open a Ticket
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @if(sizeof($recent_tickets)>=2)
                    <div class="card">
                        <div class="card-body">
                            <div class="card-content">
                                <div class="row ">
                                    <div class="col-md-12 mb-1">
                                        <p class="head1"><i class="fa fa-comments text-primary font-medium-1"></i><b> Recent Tickets</b></p>
                                    </div>
                                    @foreach($recent_tickets as $item)
                                        <div class="col-md-12">
                                            <p class="head1"><b>#{{$item->ticket_id}}</b> - {{$item->subject}}</p>
                                        </div>
                                        <div class="col-md-12 ">
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="head1">{{$item->status}}</p>        
                                                </div>
                                                <div class="col-8 text-right">
                                                    <small>{{$item->created_at->diffForHumans()}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <div class="col-sm-12 col-md-9 col-lg-9 main-content-area">
            	@yield("main-content")
            </div>
        </div>
    </section>
</div>
@endsection

@section("js")

<script>
// Delayed Stat
            
        $(".filter_key").on("click",function(){
            var f=$(this).val();
            window.location.href="{{route('consumer.tickets')}}?type="+f;
        });
        
</script>
@yield("extra-js")
@endsection

