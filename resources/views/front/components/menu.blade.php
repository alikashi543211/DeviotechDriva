@if (Route::currentRouteName() == "front.garage_detail")
<div class="main-menu menu-light menu-accordion menu-shadow position-relative" style="height: 100% !important;box-shadow: #f3eeee 5px 10px 18px !important;" data-scroll-to-active="true">
@else
<div class="main-menu menu-light menu-accordion menu-shadow" style="height: 1400px !important;margin-left:-2rem;width:340px;box-shadow: #f3eeee 5px 10px 18px !important;" data-scroll-to-active="true">
@endif

    <div class="shadow-bottom"></div>
    <form action="{{route('front.garage_list')}}" class="filter-form" method="GET">
        <div class="main-menu-content">
            <input type="hidden" name="filter" value="applied">
            <input type="hidden" name="keyword" value="{{request()->keyword}}">
            <input type="hidden" name="location" value="{{request()->location}}">
            <input type="hidden" name="address_lat" value="{{request()->address_lat}}">
            <input type="hidden" name="address_long" value="{{request()->address_long}}">
            @if(request()->is('list*'))
                <ul class="navigation navigation-main sidebar_filters" id="main-menu-navigation" data-menu="menu-navigation">
                    <div class="filter-boxes" style="height:auto;overflow-y:unset;border-radius:0px;">
                        <div class="filter-section">
                            <h5 class="mb-3 padding-15">
                                <span class="search-section-title">Radius</span>
                                <span class="pull-right" data-toggle="collapse" data-target="#radius_item" aria-expanded="{{ request()->radius ? 'true' : 'false' }}">
                                    <i class="fa fa-plus fa_circle text-danger" aria-hidden="true"></i>
                                </span>
                                
                            </h5>
                            
                            <div class="price_collapse collapse {{ request()->radius ? 'show' : 'show' }}" id="radius_item">
                                <li class=" nav-item menu_item radius_item">
                                    <div id="slider-range" class="price-filter-range side_checkbox" name="rangeInput">
                                        <input type="hidden" id="min_radius" name="min_radius" value="{{ request()->min_radius ?? '0' }}">
                                        <input type="hidden" id="max_radius" name="max_radius" value="{{ request()->max_radius ?? '100' }}">
                                    </div>
                                    <div>
                                        <span id="min_label" class="range_labels">{{ request()->min_radius ?? '0' }}</span>
                                        <span class="range_labels">-</span>
                                        <span class="range_labels" id="max_label">{{ request()->max_radius ?? '100' }}</span> Miles
                                    </div>
                                </li>
                            </div>
                            <hr>
                        </div>
                        <div class="filter-section">
                            <h5 class="my-3 padding-15 filter-item-heading">
                                <span class="search-section-title">Opening Times</span>
                                <span class="pull-right" data-toggle="collapse" data-target="#opening_times_item" aria-expanded="{{ request()->availabilities ? 'true' : 'false' }}">
                                    <i class="fa fa-plus fa_circle text-danger" aria-hidden="true"></i>
                                </span>
                            </h5>
                            
                            <div class="collapse {{ request()->availabilities ? 'show' : 'show' }}" id="opening_times_item">
                                <li class=" nav-item">
                                    <a href="javascript:void(0);">
                                        <div class="custom-checkbox pull-left">
                                            <label class="" for="available-now"><span class="menu-title" data-i18n="Profile">Open Now</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox pull-right">
                                            <input type="checkbox" class="custom-control-input side_checkbox" value="available" name="availabilities[]" id="available-now" @if(isset(request()->availabilities) && in_array('available', request()->availabilities)) checked @endif>
                                            <label class="custom-control-label" for="available-now"><span class="menu-title" data-i18n="Profile"></span></label>
                                        </div>
                                    </a>
                                </li>
                                <li class=" nav-item">
                                    <a href="javascript:void(0);">
                                        <div class="custom-checkbox pull-left">
                                            <label class="" for="closed"> <span class="menu-title" data-i18n="Profile">Closed</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox pull-right">
                                            <input type="checkbox" class="custom-control-input side_checkbox" value="away" name="availabilities[]" id="closed" @if(isset(request()->availabilities) && in_array('away', request()->availabilities)) checked @endif>
                                            <label class="custom-control-label" for="closed"> <span class="menu-title" data-i18n="Profile"></span></label>
                                        </div>
                                    </a>
                                </li>
                            </div>
                            <hr>
                        </div>
                        <div class="filter-section">
                            <h5 class="my-3 padding-15 filter-item-heading">
                                <span class="search-section-title">Services</span>
                                <span class="pull-right" data-toggle="collapse" data-target="#services_item" aria-expanded="{{ request()->services ? 'true' : 'false' }}">
                                    <i class="fa fa-plus fa_circle text-danger" aria-hidden="true"></i>
                                </span>
                            </h5>
                            <div class="collapse {{ request()->services ? 'show' : 'show' }}" id="services_item">
                                <li class=" nav-item">
                                    <div class="row services-row">
                                        @foreach($service_list as $item)
                                            <div class="col-md-4 text-center custom-p">
                                                <div class="card custom-m @if(isset(request()->services) && in_array($item->name, request()->services)) icon-selected @endif" data-toggle="tooltip" data-html="true" title="{{ $item->name }}">
                                                    <label for="{{ 'service-'.$item->name }}" class="label_card">
                                                        <div class="card-body text-center">
                                                            <img class="filter_icons" src="{{asset($item->image)}}" width="25"> 
                                                        </div>
                                                    </label>
                                                    <input type="checkbox" name="services[]" class="services-checkboxes side_checkbox" value="{{ $item->name }}" id="{{ 'service-'.$item->name }}" @if(isset(request()->services) && in_array($item->name, request()->services)) checked @endif >
                                                </div>
                                            </div>
                                        @endforeach
                                        <input type="hidden" name="">
                                    </div>
                                </li>
                                
                            </div>
                            <hr>
                        </div>
                        <div class="filter-section">
                            <h5 class="my-3 padding-15 filter-item-heading">
                                <span class="search-section-title">Facilities</span>
                                <span class="pull-right" data-toggle="collapse" data-target="#facility_item" aria-expanded="{{ request()->facilities ? 'true' : 'false' }}">
                                    <i class="fa fa-plus fa_circle text-danger" aria-hidden="true"></i>
                                </span>
                            </h5>
                            <div class="collapse {{ request()->facilities ? 'show' : 'show' }}" id="facility_item">
                                <li class="nav-item">
                                    <div class="row services-row">
                                        @foreach($facility_list as $item)
                                            <div class="col-md-4 text-center custom-p">
                                                <div class="card custom-m @if(isset(request()->facilities) && in_array($item->name, request()->facilities)) icon-selected @endif" data-toggle="tooltip" data-html="true" title="{{ $item->name }}">
                                                    <label for="{{ 'facility-'.$item->name }}" class="label_card">
                                                        <div class="card-body text-center">
                                                            <img class="filter_icons" src="{{asset($item->image)}}" width="25"> 
                                                        </div>
                                                    </label>
                                                    <input type="checkbox" name="facilities[]" class="services-checkboxes side_checkbox" value="{{ $item->name }}" id="{{ 'facility-'.$item->name }}" @if(isset(request()->facilities) && in_array($item->name, request()->facilities)) checked @endif>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                            </div>
                            <hr>
                        </div>
                        

                        <div class="filter-section">
                            <h5 class="my-3 padding-15 filter-item-heading">
                                <span class="search-section-title">Payments</span>
                                <span class="pull-right" data-toggle="collapse" data-target="#payment_item" aria-expanded="{{ request()->payments ? 'true' : 'false' }}">
                                    <i class="fa fa-plus fa_circle text-danger" aria-hidden="true"></i>
                                </span>
                            </h5>
                            <div class="collapse {{ request()->payments ? 'show' : 'show' }}" id="payment_item">
                                <li class=" nav-item">
                                    <div class="row services-row">
                                        @foreach($payment_list as $item)
                                            <div class="col-md-4 text-center custom-p">
                                                <div class="card custom-m payment_card @if(isset(request()->payments) && in_array($item->name, request()->payments)) icon-selected @endif" data-toggle="tooltip" data-html="true" title="{{ $item->name }}">
                                                    <label for="{{ 'payment-'.$item->name }}" class="label_card">
                                                        <div class="card-body text-center">
                                                            <img class="filter_icons" src="{{asset($item->image)}}" width="25"> 
                                                        </div>
                                                    </label>
                                                    <input type="checkbox" name="payments[]" class="services-checkboxes side_checkbox" value="{{ $item->name }}" id="{{ 'payment-'.$item->name }}" @if(isset(request()->payments) && in_array($item->name, request()->payments)) checked @endif>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                </ul>
            @endif
        </div>
    </form>
</div>
