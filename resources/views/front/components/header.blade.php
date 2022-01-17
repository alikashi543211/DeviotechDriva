<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
	<div class="navbar-wrapper">
		<div class="navbar-container content">
			<div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left d-flex align-items-center">
                    <ul class="nav navbar-nav">
						<li class="nav-item mobile-menu d-xl-none mr-auto">
                            @if (Route::currentRouteName() != "front.garage_detail")
                                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                    <i class="ficon feather icon-menu"></i>
                                </a>
                            @endif
                        </li>
					</ul>
                    <a class="navbar-brand d-flex align-items-center" href="{{route('front.index')}}">
                        <div class="brand-logo">
                            <img src="{{ asset('assets/app-assets/images/logo/favicon.png') }}" width="25px" class="img-fluid" alt="">
                        </div>
                        <div style="padding-left: 15px;">
                            <img src="{{ asset('assets/app-assets/images/logo/logo-text.png') }}" class="img-fluid" width="120" alt="">
                        </div>
                    </a>
                </div>
				<div class="mr-auto float-left bookmark-wrapper d-flex align-items-center search_form_div">
					<ul class="nav navbar-nav">
						<li class="nav-item mobile-menu d-xl-none mr-auto">
                            @if (Route::currentRouteName() != "front.garage_detail")
                                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                    <i class="ficon feather icon-menu"></i>
                                </a>
                            @endif
                        </li>
					</ul>
					<form method="GET" action="{{route('front.garage_list')}}" class="validate-form dashboard_search front-garage-search-form" id="front_garage_search_form" data-value="">
						<div class="row m-0 m-auto">
							<div class="input-group col-md-5 search_keyword_group">
								<div class="inner_input_group" id="inner_keyword_group_id">
                                    <div class="input-group-prepend">
                                    	<span class="input-group-text icon_design">
                                    		<i class="fa fa-search font-medium-3 search_icon"></i>
                                    	</span>
                                    </div>
                                    <input type="text" class="form-control form-control-keyword border-0 keyword_input" name="keyword" id="keyword" placeholder="Keyword or garage name" placeholder-value="Keyword or garage name" autocomplete="off" key="keyword" value="{{request()->keyword}}">
                                    <div id="keywordList" class="keywordList keyword-list-result"></div>
                                    <div class="input-group-append">
                                        <span class="input-group-text icon_design cross_icon cursor-pointer"><i class="fa fa-times font-medium-3" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="error_placeholder_box d-none" id="error_keyword_box">
                                    	<i class="fa fa-exclamation-circle"></i> This field is required
                                    </div>
                                    <div class="placeholder_box d-none" id="keyword_placeholder_id">Keyword or garage name</div>
                                    <div class="suggested_keyword_group d-none" id="search_keyword_list">
                                    </div>
                                </div>
							</div>
							<div class="input-group col-md-4 pr-0 search_keyword_group">
								<div class="inner_input_group" id="inner_location_group_id">
                                    <div class="input-group-prepend group_prepend">
                                        <span class="input-group-text icon_design icon_design_one"><i class="fa fa-map-marker font-medium-3" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-0 location_search location_box location_input" value="{{request()->location}}" name="location" id="spoint" placeholder="UK, town or postcode" placeholder-value="UK, town or postcode" key="location" autocomplete="off">
                                    <div class="d-none api_details"></div>
                                    <div id="keywordList" class="keywordList keyword-list-result"></div>
                                    <div class="input-group-append group_append">
                                        <span class="input-group-text icon_design icon_design_two fetch_user_location cursor-pointer"><i class="fa fa-crosshairs font-medium-3" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="hidden" id="address_lat" name="address_lat" value="{{request()->address_lat}}">
                                    <input type="hidden" id="address_long" name="address_long" value="{{request()->address_long}}">
                                    <div class="error_placeholder_box d-none" id="error_location_box"><i class="fa fa-exclamation-circle"></i> This field is required</div>
                                    <div class="placeholder_box d-none" id="location_placeholder_id">UK, town or postcode</div>
                                    {{-- <div class="suggested_location_group d-none" id="search_keyword_list">
                                    </div> --}}
                                </div>
							</div>
							<div class="col-md-2 pl-0 search_btn_col">
								<button type="button" id="button_search_id" class="btn btn-primary btn-block search_button_box"><i class="fa fa-search"></i>  <span>Search</span></button>
							</div>
						</div>
					</form>
				</div>
				<ul class="nav navbar-nav float-right login_button_header">
					<li class="dropdown dropdown-user nav-item">
						<a class="login_link" href="{{route('login.login')}}">
							<i class="fa fa-sign-in text-primary"></i> Login
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
<ul class="main-search-list-defaultlist d-none">
		<li class="d-flex align-items-center">
			<a class="pb-25" href="#">
				<h6 class="text-primary mb-0">Files</h6>
			</a>
		</li>
		<li class="auto-suggestion d-flex align-items-center cursor-pointer">
			<a class="d-flex align-items-center justify-content-between w-100" href="#">
				<div class="d-flex">
					<div class="mr-50">
						<img src="{{asset('/assets/app-assets/images/icons/xls.png')}}" alt="png" height="32">
					</div>
					<div class="search-data">
						<p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
					</div>
				</div>
				<small class="search-data-size mr-50 text-muted">&apos;17kb</small>
			</a>
		</li>

		<li class="auto-suggestion d-flex align-items-center cursor-pointer">
			<a class="d-flex align-items-center justify-content-between w-100" href="#">
				<div class="d-flex">
					<div class="mr-50"><img src="{{asset('/assets/app-assets/images/icons/jpg.png')}}" alt="png" height="32"></div>
					<div class="search-data">
						<p class="search-data-title mb-0">52 JPG file Generated</p>
						<small class="text-muted">FontEnd Developer</small>
					</div>
				</div>
				<small class="search-data-size mr-50 text-muted">&apos;11kb</small>
			</a>
		</li>
		<li class="auto-suggestion d-flex align-items-center cursor-pointer">
			<a class="d-flex align-items-center justify-content-between w-100" href="#">
				<div class="d-flex">
					<div class="mr-50"><img src="{{asset('/assets/app-assets/images/icons/pdf.png')}}" alt="png" height="32"></div>
					<div class="search-data">
							<p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
					</div>
				</div>
				<small class="search-data-size mr-50 text-muted">&apos;150kb</small>
			</a>
		</li>
		<li class="auto-suggestion d-flex align-items-center cursor-pointer">
			<a class="d-flex align-items-center justify-content-between w-100" href="#">
				<div class="d-flex">
					<div class="mr-50">
						<img src="{{asset('/assets/app-assets/images/icons/doc.png')}}" alt="png" height="32">
					</div>
					<div class="search-data">
							<p class="search-data-title mb-0">Anna_Strong.doc</p>
							<small class="text-muted">Web Designer</small>
					</div>
				</div>
				<small class="search-data-size mr-50 text-muted">&apos;256kb</small>
			</a>
		</li>
		<li class="d-flex align-items-center">
			<a class="pb-25" href="#">
				<h6 class="text-primary mb-0">Members</h6>
			</a>
		</li>
		<li class="auto-suggestion d-flex align-items-center cursor-pointer">
			<a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
				<div class="d-flex align-items-center">
					<div class="avatar mr-50">
						<img src="{{asset('/assets/app-assets/images/portrait/small/avatar-s-8.jpg')}}" alt="png" height="32">
					</div>
					<div class="search-data">
						<p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
					</div>
				</div>
			</a>
		</li>
		<li class="auto-suggestion d-flex align-items-center cursor-pointer">
			<a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
				<div class="d-flex align-items-center">
					<div class="avatar mr-50">
						<img src="{{asset('/assets/app-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="png" height="32">
					</div>
					<div class="search-data">
							<p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
					</div>
				</div>
			</a>
		</li>
		<li class="auto-suggestion d-flex align-items-center cursor-pointer">
			<a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
				<div class="d-flex align-items-center">
					<div class="avatar mr-50"><img src="{{asset('/assets/app-assets/images/portrait/small/avatar-s-14.jpg')}}" alt="png" height="32"></div>
					<div class="search-data">
						<p class="search-data-title mb-0">Milena Gibson</p>
						<small class="text-muted">Digital Marketing Manager</small>
					</div>
				</div>
			</a>
		</li>
		<li class="auto-suggestion d-flex align-items-center cursor-pointer">
			<a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
				<div class="d-flex align-items-center">
					<div class="avatar mr-50">
						<img src="{{asset('/assets/app-assets/images/portrait/small/avatar-s-6.jpg')}}" alt="png" height="32">
					</div>
					<div class="search-data">
						<p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
					</div>
				</div>
			</a>
		</li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
	<li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer">
		<a class="d-flex align-items-center justify-content-between w-100 py-50">
			<div class="d-flex justify-content-start">
				<span class="mr-75 feather icon-alert-circle"></span>
				<span>No results found.</span>
			</div>
		</a>
	</li>
</ul>
