<div class="card detail_sidebar">
    <div class="card-body">
        <div class="card-content">
            <div class="row ">
                <div class="col-md-12">
                    <p class="head1"><b>Ticket Information</b></p>
                    <p>#{{$ticket->ticket_id}}</p>
                                                        <div class="chip chip-success mb-2">
                        <div class="chip-body">
                            <div class="chip-text text-white"><b>Open</b></div>
                        </div>
                    </div>
                                                    </div>
                <div class="col-md-12 ">
                    <p class="head1"><b>Department</b></p>
                    <p>Support</p>
                </div>
                <div class="col-md-12 ">
                    <p class="head1"><b>Submitted</b></p>
                    <p>{{date('d-m-Y',strtotime(dateFormat($ticket->created_at)))}}</p>
                </div>
                <div class="col-md-12 ">
                    <p class="head1"><b>Last Updated</b></p>
                    <p>{{date('d-m-Y',strtotime(dateFormat($ticket->updated_at)))}}</p>
                </div>
                <div class="col-md-12 ">
                    <p class="head1"><b>Priority</b></p>
                    <p>{{ucfirst($ticket->priority)}}</p>
                </div>
                <div class="col-md-12 text-center">
                    <a href="{{route('consumer.close_ticket',$ticket->id)}}"><button type="button" class="btn btn-danger btn-sm waves-effect waves-light"><i class="fa fa-times"></i> Close</button></a>
                </div>
            </div>
        </div>
    </div>
</div>