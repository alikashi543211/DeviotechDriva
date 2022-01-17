@extends("front.layout.master")
@section('title',"Local Garages Near You")
@section('css')
	<style>
		#front_garage_search_form .input-group-prepend,
		#front_garage_search_form .input-group-append
		{
			height: 42px !important;
		}
		#front_garage_search_form .inner_input_group
		{
			/*height:44px !important;*/
		}
		.address_card
		{
			margin-bottom:-12px !important;
		}
	</style>
@endsection
@section('content')

    <!-- Featured Garages -->
	<section class="sptb bg-white">
		<div class="container">
			<div class="section-title center-block text-center">
				<h1>Featured Garages</h1>
				<p>View garages that may provide the services you require</p>
			</div>
			<div id="myCarousel2" class="owl-carousel owl-carousel-icons2 featured_garages">
				<!-- Wrapper for carousel items -->
				@foreach($list as $item)
					<div class="item">
						<div class="card mb-0" style="height: 360px;">
							<a href="{{route('front.garage_detail',str_slug($item->slug))}}" class="text-dark hover_garage">
								<div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">featured</span></div>
							</a>
							<div class="item-card7-imgs" style="height: 180px;">
								<a href="{{route('front.garage_detail',str_slug($item->slug))}}"></a>
								<img src="{{get_first_garage_image($item)}}" alt="img" class="featured_garages_card_img">
							</div>
							<div class="card-body" style="height: 180px;">
								<div class="item-card7-desc">
									<div class="item-card7-text address_card" style="height: 100px;">
										<a href="{{route('front.garage_detail',str_slug($item->slug))}}" class="text-dark hover_garage"><h4 class="text-capitalize" title="{{ $item->name }}">{{$item->name}}</h4></a>
										<p class="text-capitalize">{{ $item->address }}</p>
									</div>
									
									<div class="d-inline-flex">
										<div class="">
											<span class="font-medium-1">
	                                          	@for($i=1;$i<=5; $i++)
	                                              	<i class="fa fa-star @if($i<=garage_stars($item)) text-star-warning @endif"></i>
	                                          	@endfor
	                                        </span>
										</div>
									</div>
									<p class="mb-0">{{ garage_reviews($item) }} reviews</p>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- /featured garages -->
		
	<!--Services-->
	<section class="sptb">
		<div class="container">
			<div class="section-title center-block text-center">
				<h1>Browse the motor services available</h1>
			</div>
			<div id="small-categories" class="owl-carousel owl-carousel-icons2-motor-services">
				@foreach($service_list as $item)
					<div class="item service_card" data="{{$item->name}}">
						<div class="card mb-0">
							<div class="card-body">
								<div class="cat-item text-center">
									<a href="javascript:void(0);"></a>
									<div class="cat-img">
										<img src="{{asset($item->image)}}" alt="img">
									</div>
									<div class="cat-desc">
										<h5 class="mb-0">{{$item->name}} </h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!--/Services-->

	<!-- how service work section -->
	<section class="sptb bg-white serial_number_section">	
 			<div class="container">
 				<div class="section-title center-block text-center">
					<h1>How our service works</h1>
				</div>
				<div class="row justify-content-center align-items-center">
					<div class="col-12 col-md-3 col-lg-3 col-xl-3 serial-column">
						<p class="serial-number">1</p>
						<div class="description-serial">
							<h3 class="service-works-title-YcZmR">Get a quote</h3>
							<p>Tell us what you need</p>
						</div>
					</div>
					<div class="col-12 col-md-3 col-lg-3 col-xl-3 serial-column">
						<p class="serial-number">2</p>
						<div class="description-serial">
							<h3 class="service-works-title-YcZmR">Get a quote</h3>
							<p>Tell us what you need</p>
						</div>
					</div>
					<div class="col-12 col-md-3 col-lg-3 col-xl-3 serial-column">
						<p class="serial-number">3</p>
						<div class="description-serial">
							<h3 class="service-works-title-YcZmR">Get a quote</h3>
							<p>Tell us what you need</p>
						</div>
					</div>
					<div class="col-12 col-md-3 col-lg-3 col-xl-3 serial-column">
						<p class="serial-number">4</p>
						<div class="description-serial">
							<h3 class="service-works-title-YcZmR">Get a quote</h3>
							<p>Tell us what you need</p>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- /how service work section -->

	<!-- Recent news section -->
	<section class="sptb">
		<div class="container">
			<div class="section-title center-block text-center">
				<h1>Recent News</h1>
				<p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>
			</div>
			<div id="defaultCarousel" class="owl-carousel Card-owlcarousel owl-carousel-icons">	

				@for($i=0;$i<=6;$i++)
				<div class="item">
					<div class="card mb-0">
						<div class="item7-card-img">
							<a href="javascript:void(0);"></a>
							<img class="featured_garages_card_img" src="http://demo.deviotech.com/driva/public/garage-logos/kashif-garage/1603710952-300px-AviaPark_Moscow_01-2016_img3.jpg">
						</div>
						<div class="card-body p-4">
							<div class="item7-card-desc d-flex mb-2">
								<a href="#"><i class="fa fa-calendar-o text-muted mr-2"></i>Dec-03-2018</a>
								<div class="ml-auto">
								</div>
							</div>
							<a href="javascript:void(0);" class="text-dark"><h4 class="font-weight-semibold">Excepteur occaecat cupidatat</h4></a>
							<p>Ut enim ad minima veniam, quis exercitationem, enim ad minima veniam, quis nostrum exercitationem </p>
							<div class="d-flex align-items-center pt-2 mt-auto">
								<img src="{{asset('images/user.png')}}" class="avatar brround avatar-md mr-3" alt="avatar-img">
								<div>
									<a href="javascript:void(0);" class="text-default">Royal Hamblin</a>
									<small class="d-block text-muted">10 days ago</small>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endfor
			</div>
		</div>
	</section>
	<!-- /Recent news section -->

	<!-- Search Garage Modal -->
	<div id="searchServiceModal" class="modal fade show" aria-modal="true" style="padding-right: 17px; display: none;">
		<div class="modal-dialog" role="document">
			<div class="modal-content ">
				<div class="modal-header front-modal-header service_modal_header">
					<h3 class="modal-title text-capitalize" id="exampleModalLabel"><span class="service_title"></span><br><p class="small-detail">Find A Garage That Provides The Services You Require </p></h3>
					<button type="button" class="close modal_close_btn" data-dismiss="modal" aria-label="Close">
		            	<span aria-hidden="true">&times;</span>
		          	</button>
				</div>
				<div class="modal-body">
					<form action="{{route('front.garage_list')}}" id="search_service_modal_form">
						<div class="row">
							<div class="col-3">
								
							</div>
							<div class="col-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="UK, town or postcode" name="location" autocomplete="off" required id="spoint_two">
									<div class="d-none api_details"></div>
									<input type="hidden" name="filter" value="filter">
									<input type="hidden" name="services[]" value="" class="service_name">
				                    <input type="hidden" id="address_lat_two" name="address_lat" value="{{request()->lat}}">
                                    <input type="hidden" id="address_long_two" name="address_long" value="{{request()->long}}">
								</div>
							</div>
							<div class="col-3">
								
							</div>
						</div>
						<div class="row">
							<div class="col-3">
								
							</div>
							<div class="col-6 text-center">
									<button type="submit" class="btn btn-secondary search-font button_search">Search</button>
							</div>
							<div class="col-3">
								
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Search Garage Modal -->
@endsection
@section('js')
	<script>
		$(document).on("click",".service_card",function()
		{
			$("#searchServiceModal").modal("show");
			var service = $(this).attr("data");
			$(".service_name").val(service);
			$(".service_title").text(service);
		});
		function initMapModel() 
		{

            var latlon1 = null;
            var spoint = document.getElementById('spoint_two');
            var autocomplete = new google.maps.places.Autocomplete(spoint, options);

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                var lat = place.geometry.location.lat();
                var lon = place.geometry.location.lng();
                $('#address_lat_two').val(lat);$('#address_long_two').val(lon);
                latlon1 = new google.maps.LatLng(lat,lon);
            });
    	}
</script>
@endsection



	