                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    {{-- <div class="row mt-1 mr-1">
                                        <div class="col-md-12 text-right">
                                            <a class="btn btn-primary" href="{{ route('consumer.open_ticket') }}">Open a ticket</a>
                                        </div>
                                    </div> --}}
                                    <div class="card-body card-dashboard">
                                        <div class="dropdown sort-dropdown mb-1 mb-sm-0">
                                            <button class="btn btn-white filter-btn dropdown-toggle border text-dark waves-effect waves-light" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1 - <span class="table_length">10</span> of <span class="table_count"></span></button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(118px, 49px, 0px);">
                                                <a class="dropdown-item custom-filter" data-value="10" href="#">10</a>
                                                <a class="dropdown-item custom-filter" data-value="25" href="#">25</a>
                                                <a class="dropdown-item custom-filter" data-value="50" href="#">50</a>
                                                <a class="dropdown-item custom-filter" data-value="100" href="#">100</a>
                                            </div>
                                        </div>
                                        <div class="table-responsive tickets_table">
                                            @if($tickets->isNotEmpty())
                                            <table class="table zero-configuration table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Enquiry Type</th>
                                                        <th>Subject</th>
                                                        <th>Status</th>
                                                        <th>Last Updated</th>
                                                        <th class="text-right">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tickets as $item)
                                                    <tr>
                                                        <td>{{ $item->enquiry_type->name }}</td>
                                                        <td><span class="font-weight-bold">#{{ $item->ticket_id }}</span> {{ $item->subject }}</td>
                                                        <td>
                                                            @if ($item->status == "open")
                                                            <div class="chip chip-success">
                                                                <div class="chip-body">
                                                                    <div class="chip-text text-white font-weight-bold">open</div>
                                                                </div>
                                                            </div>
                                                            @else
                                                            <div class="chip bg-grey">
                                                                <div class="chip-body">
                                                                    <div class="chip-text text-white font-weight-bold">closed</div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>
                                                            <div class="dropdown dropleft float-right">
                                                                <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item ticket_view_btn" href="javascript:void(0);" data-value="{{$item->ticket_id}}">
                                                                        <div class="media">
                                                                            <div class="media-left" style="width: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></div>
                                                                            <div class="media-body">View</div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                             <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 mb-3 m-0 m-auto text-center">
                                                            <div class="alert-dismissible fade show" role="alert">
                                                                <h5 class="font-weight-bold mb-0">
                                                                    <i class="feather icon-mail font-large-2"></i>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-3"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 mb-3 m-0 m-auto text-center">
                                                            <div class="alert-dismissible fade show" role="alert">
                                                                <h5 class="font-weight-bold mb-0">
                                                                    <p class="mt-1">There are no support tickets to display
                                                                    </p>
                                                                   
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-3"></div>
                                                    </div>
                                                </div>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

    <script type="text/javascript"> 

        @if(!$show_pagination)
            $('.sort-dropdown').hide();
        @endif   

        $(".detail_sidebar").hide();
        $(".ticket_view_btn").on("click",function(){
            ticket_id=$(this).attr("data-value");
            $.ajax({
                    type: "GET",
                    url: "{{ route('consumer.tickets.detail_view') }}?ticket_id="+ticket_id,
                    success: function (response) {
                        $('.main-content-area').html(response);
                    }
            });
            $.ajax({
                    type: "GET",
                    url: "{{ route('consumer.tickets.ticket_view_sidebar') }}?ticket_id="+ticket_id,
                    success: function (response) {
                        $('.sidebar_cards').prepend(response);
                    }
            });
        });

    </script>