@extends('garage.advertising.layout')
@section('title','Advertising')
@section('advertising-content')
    <!-- Zero configuration table -->
    <div class="row">
        <div class="col-6">
            <h4>Discounts List</h4>
        </div>
        <div class="col-6">
        	<div class="row">
        		<div class="col-md-6 col-12">
                    @if ($promos > 0)
                        <a href="{{ route('garage.advertising.promo.view') }}" class="btn btn-promo bold btn-block  mb-2">View Promotion</a>
                    @else
                        <a href="{{ route('garage.advertising.promo.plans') }}" class="btn btn-promo bold btn-block  mb-2">Set Promotion</a>
                    @endif

        		</div>
        		<div class="col-md-6 col-12">
        			<a href="{{ route('garage.advertising.discount.services') }}" class=" mb-2 btn btn-disc bold btn-block">Set Discounts</a>
        		</div>
        	</div>
        </div>
    </div>
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
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Message</th>
                                            <th class="text-center">Services</th>
                                            <th class="text-center">Expiry Date</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($discounts as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->created_at->format('d-m-Y') }}</td>
                                                <td class="text-center">{{ $item->message }}</td>
                                                <td class="text-center">
                                                    @foreach (explode(",",$item->services) as $s)
                                                        <img src="{{ asset(getService($s)->image) }}" width="25" style="z-index:999;" alt="">
                                                    @endforeach
                                                </td>
                                                <td class="text-center">{{ \Carbon\Carbon::parse($item->expiry_date)->format('d-m-Y') }}</td>
                                                <td class="text-center">
                                                    @if ($item->status == "active")
                                                        <div class="chip bg-success">
                                                            <div class="chip-body">
                                                                <div class="chip-text text-white"><b>Active</b></div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="chip bg-success">
                                                            <div class="chip-body">
                                                                <div class="chip-text text-white"><b>In active</b></div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
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
@endsection
