@extends('garage.layouts.master')
@section('title','Dashboard')
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-3">
            <div class="page-heading">
                <h3>Dashboard</h3>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
	<section id="basic-tabs-components">
        <div class="row">
            <div class="col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-header">
                        <h4 class="card-title">NOTIFICATIONS</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            {{-- <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all" data-toggle="tab" href="#allTab" aria-controls="all" role="tab" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="bookings" data-toggle="tab" href="#bookingsTab" aria-controls="bookings" role="tab" aria-selected="false">Bookings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account" data-toggle="tab" href="#accountTab" aria-controls="account" role="tab" aria-selected="false">Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="support" data-toggle="tab" href="#supportTab" aria-controls="support" role="tab" aria-selected="false">Support</a>
                                </li>
                            </ul> --}}
                            <div class="tab-content">
                                <div class="tab-pane active" id="allTab" aria-labelledby="all-tab" role="tabpanel">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover table-borderless mb-0">
                                        <tbody>
                                                @foreach($notifications as $data)
                                                <tr class="font-weight-bold">
                                                    <td style="width: 120px;">{{ date('d-M-Y', strtotime(dateFormat($data->created_at)))}}</td>
                                                    <td>{{$data->data['msg']}}</td>
                                                    <td class="text-right">{{ $data->created_at->diffForHumans() }}</td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            <a href="{{ route('garage.notifications') }}">See all</a>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection