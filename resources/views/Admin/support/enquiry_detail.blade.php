@extends('Admin.layouts.master')
@section('title', 'Enquiries | Support')
@section('extras-css')
<style type="text/css">
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
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="row">
                    <div class="col-md-8 col-sm-12 mb-3">
                        <div class="page-heading">
                            <h3 class="mb-1">Support</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" id="search" placeholder="Search name, email, phone etc">
                            <div class="input-group-append">
                              <button type="button"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="basic-tabs-components">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-content">
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <p class="head1"><b>Ticket Information</b></p>
                                                <p>#{{ $ticket->ticket_id }} - {{ $ticket->subject }}</p>
                                                @if ($ticket->status == "open")
                                                <div class="chip chip-success mb-2">
                                                    <div class="chip-body">
                                                        <div class="chip-text text-white"><b>Open</b></div>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="chip bg-grey mb-2">
                                                    <div class="chip-body">
                                                        <div class="chip-text text-white"><b>Cancel</b></div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-12 ">
                                                <p class="head1"><b>Department</b></p>
                                                <p>Support</p>
                                            </div>
                                            <div class="col-md-12 ">
                                                <p class="head1"><b>Submitted</b></p>
                                                <p>{{ $ticket->created_at }}</p>
                                            </div>
                                            <div class="col-md-12 ">
                                                <p class="head1"><b>Last Updated</b></p>
                                                <p>{{ $ticket->updated_at }}</p>
                                            </div>
                                            <div class="col-md-12 ">
                                                <p class="head1"><b>Priority</b></p>
                                                <p>{{ $ticket->priority }}</p>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <a href="{{ route('admin.support.close_enquriy', $ticket->id) }}"><button type="button" class="btn btn-danger btn-sm waves-effect waves-light"><i class="fa fa-times"></i> Close</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2>{{ $ticket->subject }}</h2>
                                                @if ($ticket->status == "closed")
                                                <p>This ticket is closed</p>
                                                @endif
                                            </div>
                                    @foreach($ticket->ticket_attachments as $at)
                                        @if($at->type=='new_ticket')
                                        <div class="container-fluid">
                                            <div class="row alert alert-warning mt-1">
                                                <div class="col-lg-6 col-6 mb-3 m-0 m-auto">
                                                    <div class="alert-dismissible fade show" role="alert">
                                                        <h5 class="font-weight-bold mb-0">
                                                            <i class="fa fa-attachment text-danger mr-1"></i> Attachment
                                                        </h5>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 col-6 m-0 m-auto text-right p-0">
                                                    <div class="">
                                                        <a href="{{asset($at->file)}}" target="_blank" class="btn btn-primary mx-1">View</a>
                                                        <button style="margin-top:9px;" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            @continue
                                        @endif
                                    @endforeach
                                            <div class="col-12 mt-3">
                                                <p>{{ $ticket->description }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="accordion" id="accordionExample" data-toggle-hover="true">
                                                    <div class="collapse-margin">
                                                        <div class="card-header collapsed" id="headingOne" data-toggle="collapse" role="button" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                            <span class="lead collapse-title">
                                                                <i class="fa fa-pencil"></i> <strong>Reply Now</strong>
                                                            </span>
                                                        </div>

                                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                                <form action="{{ route('admin.support.save_comment') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="ticket_id" id="ticket_id" value="{{ $ticket->id }}">
                                                                    <textarea data-length="20" class="form-control char-textarea" id="textarea-counter" rows="5" name="comment"></textarea>
                                                                    <label for="textarea-counter"></label>
                                                                    <small class="counter-value float-right"><span class="char-count"></span> / 2500 </small>
                                                                    <br><input type="file" class="" name="images[]" multiple>
                                                                    <div class="row">
                                                                        <div class="col-12 text-center">
                                                                            <button type="submit" class="btn btn-save btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (count($ticket->comments)>0)
                                                @foreach ($ticket->comments as $item)
                                                    @if ($item->user_id == auth()->user()->id)
                                                        <div class="col-12">
                                                            <div class="card blue-bg">
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-6 m-auto">
                                                                                <p>{{ $item->created_at }}</p>
                                                                            </div>
                                                                            <div class="col-6 text-right">
                                                                                <div class="media">
                                                                                    <div class="media-body">
                                                                                        <p class="mb-0">{{ $item->user->name }}</p>
                                                                                        <p class="mb-0"><strong>{{ $item->user->role }}</strong></p>
                                                                                    </div>
                                                                                    <div class="media-right ml-2">
                                                                                        <img src="{{asset('assets/app-assets/images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="45" width="45">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                             @foreach($ticket->ticket_attachments as $rep)
                                                                @if($rep->type=='comment' && $rep->comment_id==$item->id)
                                                                <div class="container-fluid">
                                                                    <div class="row alert alert-warning mt-1">
                                                                        <div class="col-lg-6 col-6 mb-3 m-0 m-auto">
                                                                            <div class="alert-dismissible fade show" role="alert">
                                                                                <h5 class="font-weight-bold mb-0">
                                                                                    <i class="fa fa-attachment text-danger mr-1"></i> Attachment
                                                                                </h5>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6 col-6 m-0 m-auto text-right p-0">
                                                                            <div class="">
                                                                                <a href="{{asset($rep->file)}}" target="_blank" class="btn btn-primary mx-1">View</a>
                                                                                <button style="margin-top:9px;" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                    <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                    @continue
                                                                @endif
                                                            @endforeach
                                                                        </div>
                                                                        <div class="mt-2"></div>
                                                                        <p>{!! nl2br(e($item->comment)) !!}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-12">
                                                            <div class="card blue-bg">
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="media">
                                                                                    <div class="media-left mr-2">
                                                                                        <img src="{{asset('assets/app-assets/images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="45" width="45">
                                                                                    </div>
                                                                                    <div class="media-body">
                                                                                        <p class="mb-0">{{ $item->user->name }}</p>
                                                                                        <p class="mb-0"><strong>{{ $item->user->role }}</strong></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 text-right">
                                                                                <p>{{ $item->created_at }}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-2"></div>
                                                                        <p>{!! nl2br(e($item->comment)) !!}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection

