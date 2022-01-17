@extends('consumer.layouts.master')
@section('title', 'Notifications')
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-8 col-sm-12 mb-3">
            <div class="page-heading">
                <h3>Notifications</h3>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
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
                            <div class="table-responsive">

                                <table class="table zero-configuration table-hover">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Notification</th>
                                        <th class="text-right">Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($notifications as $data)
                                                <tr>
                                                    <td style="width: 120px;">{{ date('d-M-Y', strtotime(dateFormat($data->created_at)))}}</td>
                                                    <td>{{$data->data['msg']}}</td>
                                                    <td class="text-right">{{ $data->created_at->diffForHumans() }}</td>
                                                </tr>
                                               @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->

</div>
@endsection

