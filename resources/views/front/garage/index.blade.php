@extends("front.layout.master")
@section('title','your search')
@section('content')
<section class="sptb">
			<div class="container">
				<div class="row">
										<!--Right Side Content-->
					<div class="col-xl-3 col-lg-4 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="input-group">
									<input type="text" class="form-control br-tl-7 br-bl-7" placeholder="Search">
									<div class="input-group-append ">
										<button type="button" class="btn btn-primary br-tr-7 br-br-7">
											Search
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Categories</h3>
							</div>
							<div class="card-body">
								<div class="closed" id="container" style="height: 200px; overflow: hidden;">
									<div class="filter-product-checkboxs">
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox1" value="option1">
											<span class="custom-control-label">
												<a href="#" class="text-dark">Spain<span class="label label-secondary float-right">14</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox2" value="option2">
											<span class="custom-control-label">
												<a href="#" class="text-dark">Los Angels<span class="label label-secondary float-right">22</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox3" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">London<span class="label label-secondary float-right">78</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox4" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">Japan<span class="label label-secondary float-right">35</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox5" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">India<span class="label label-secondary float-right">23</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox6" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">Germany<span class="label label-secondary float-right">14</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">Chicago<span class="label label-secondary float-right">45</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">Australia<span class="label label-secondary float-right">34</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">China<span class="label label-secondary float-right">12</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">Italy<span class="label label-secondary float-right">18</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">Mexico<span class="label label-secondary float-right">02</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">Thailand<span class="label label-secondary float-right">15</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">Malaysia<span class="label label-secondary float-right">32</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">United Kingdom<span class="label label-secondary float-right">23</span></a>
											</span>
										</label>
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
											<span class="custom-control-label">
												<a href="#" class="text-dark">United States<span class="label label-secondary float-right">19</span></a>
											</span>
										</label>
									</div>

								</div><div class="showmore-button"><div class="showmore-button-inner more">Show more</div></div>
							</div>
							<div class="card-header border-top">
								<h3 class="card-title">Price Range</h3>
							</div>
							<div class="card-body">
								<h6>
								   <label for="price">Price Range:</label>
								   <input type="text" id="price">
								</h6>
								<div id="mySlider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 19.2113%; width: 30.3337%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 19.2113%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 49.545%;"></span></div>
							</div>
							<div class="card-header border-top">
								<h3 class="card-title">Posted By</h3>
							</div>
							<div class="card-body">
								<div class="filter-product-checkboxs">
									<label class="custom-control custom-checkbox mb-2">
										<input type="checkbox" class="custom-control-input" name="checkbox1" value="option1">
										<span class="custom-control-label">
											Traveler
										</span>
									</label>
									<label class="custom-control custom-checkbox mb-2">
										<input type="checkbox" class="custom-control-input" name="checkbox2" value="option2">
										<span class="custom-control-label">
											Government
										</span>
									</label>
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="checkbox2" value="option2">
										<span class="custom-control-label">
											Individual
										</span>
									</label>
								</div>
							</div>
							<div class="card-footer">
								<a href="#" class="btn btn-secondary btn-block">Apply Filter</a>
							</div>
						</div>
						<div class="card mb-0">
							<div class="card-header">
								<h3 class="card-title">Shares</h3>
							</div>
							<div class="card-body product-filter-desc">
								<div class="product-filter-icons text-center">
									<a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
									<a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
									<a href="#" class="google-bg"><i class="fa fa-google"></i></a>
									<a href="#" class="dribbble-bg"><i class="fa fa-dribbble"></i></a>
									<a href="#" class="pinterest-bg"><i class="fa fa-pinterest"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!--Right Side Content-->
					<div class="col-xl-9 col-lg-8 col-md-12">
						<!--Add lists-->
						<div class="card mb-lg-0">
							<div class="card-body">
								<div class="item2-gl ">
									<div class="item2-gl-nav d-flex">
										<h6 class="mb-0 mt-2">Showing 1 to 10 of 30 entries</h6>
										<ul class="nav item2-gl-menu ml-auto">
											<li class=""><a href="#tab-11" class="active show" data-toggle="tab" title="List style"><i class="fa fa-list"></i></a></li>
											<li><a href="#tab-12" data-toggle="tab" class="" title="Grid"><i class="fa fa-th"></i></a></li>
										</ul>
										<div class="d-flex">
											<label class="mr-2 mt-1 mb-sm-1">Sort By:</label>
											<select name="item" class="form-control select-sm w-70">
												<option value="1">Latest</option>
												<option value="2">Oldest</option>
												<option value="3">Price:Low-to-High</option>
												<option value="5">Price:Hight-to-Low</option>
											</select>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="tab-11">
											<div class="card overflow-hidden">
												<div class="d-md-flex">
													<div class="item-card9-img">
														<div class="arrow-ribbon bg-primary">New</div>
														<div class="item-card9-imgs">
															<a href="travel.html"></a>
															<img src="../assets/images/locations/spain.jpg" alt="img" class="cover-image">
														</div>
														<div class="item-card9-icons">
															<a href="#" class="item-card9-icons1 wishlist"> <i class="fa fa fa-heart-o"></i></a>
														</div>
													</div>
													<div class="card mb-0 border-0">
														<div class="card-body ">
															<div class="item-card9">
																<a href="travel.html">Spain</a>
																<a href="travel.html" class="text-dark"><h4 class="font-weight-bold mt-1">Spain Beautiful Places</h4></a>
																<p class="mb-0 leading-tight">5 days, 4 Nights Total Trip Starts From $200</p>
															</div>
														</div>
														<div class="card-footer pt-4 pb-4">
															<div class="item-card9-footer d-flex">
																<div class="item-card9-cost">
																	<h4 class="text-dark font-weight-semibold mb-0 mt-0">$263.99</h4>
																</div>
																<div class="ml-auto">
																	<div class="rating-stars block">
																		<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																		<div class="rating-stars-container">
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card overflow-hidden">
												<div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">featured</span></div>
												<div class="d-md-flex">
													<div class="item-card9-img">
														<div class="item-card9-imgs">
															<a href="travel.html"></a>
															<img src="../assets/images/locations/losangels.jpg" alt="img" class="cover-image">
														</div>
														<div class="item-card9-icons">
															<a href="#" class="item-card9-icons1 wishlist active"> <i class="fa fa fa-heart-o"></i></a>
														</div>
													</div>
													<div class="card border-0 mb-0">
														<div class="card-body ">
															<div class="item-card9">
																<a href="travel.html">Los Angels</a>
																<a href="travel.html" class="text-dark"><h4 class="font-weight-bold mt-1">Los Angels Beautiful Places</h4></a>
																<p class="mb-0 leading-tight">5 days, 4 Nights Total Trip Starts From $200</p>
															</div>
														</div>
														<div class="card-footer pt-4 pb-4">
															<div class="item-card9-footer d-flex">
																<div class="item-card9-cost">
																	<h4 class="text-dark font-weight-semibold mb-0 mt-0">$745.00</h4>
																</div>
																<div class="ml-auto">
																	<div class="rating-stars block">
																		<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																		<div class="rating-stars-container">
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card overflow-hidden">
												<div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">featured</span></div>
												<div class="d-md-flex">
													<div class="item-card9-img">
														<div class="item-card9-imgs">
															<a href="#"></a>
															<img src="../assets/images/locations/london.jpg" alt="img" class="cover-image">
														</div>
														<div class="item-card9-icons">
															<a href="#" class="item-card9-icons1 wishlist"> <i class="fa fa fa-heart-o"></i></a>
														</div>
													</div>
													<div class="card border-0 mb-0">
														<div class="card-body ">
															<div class="item-card9">
																<a href="travel.html">London</a>
																<a href="travel.html" class="text-dark"><h4 class="font-weight-bold mt-1">London Beautiful Places</h4></a>
																<p class="mb-0 leading-tight">5 days, 4 Nights Total Trip Starts From $200</p>
															</div>
														</div>
														<div class="card-footer pt-4 pb-4">
															<div class="item-card9-footer d-flex">
																<div class="item-card9-cost">
																	<h4 class="text-dark font-weight-semibold mb-0 mt-0">$349.00</h4>
																</div>
																<div class="ml-auto">
																	<div class="rating-stars block">
																		<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																		<div class="rating-stars-container">
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card overflow-hidden">
												<div class="d-md-flex">
													<div class="item-card9-img">
														<div class="item-card2-img ">
															<div class="arrow-ribbon bg-primary">$280</div>
															<img src="../assets/images/locations/japan.jpg" alt="img" class="cover-image">
														</div>
														<div class="item-card2-icons">
															<a href="#" class="item-card9-icons1 wishlist active"> <i class="fa fa fa-heart-o"></i></a>
														</div>
													</div>
													<div class="card border-0 mb-0">
														<div class="card-body ">
															<div class="item-card2">
																<div class="item-card2-desc">
																	<a href="travel.html">Japan</a>
																	<a href="travel.html" class="text-dark mt-2"><h4 class="font-weight-bold mt-1">Japan Beautiful Places</h4></a>
																	<p class="mb-0 leading-tight">5 days, 4 Nights Total Trip Starts From $200</p>
																</div>
															</div>
														</div>
														<div class="card-footer pt-4 pb-4">
															<div class="item-card2-footer d-sm-flex">
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																	<div class="rating-stars-container">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (145reviews)
																</div>
																<div class="ml-auto">
																	<a href="#" class="location"><i class="fa fa-map-marker text-muted mr-1"></i> Los Angles</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card overflow-hidden">
												<div class="d-md-flex">
													<div class="item-card9-img">
														<div class="item-card2-img ">
															<div class="arrow-ribbon bg-primary">$242</div>
															<a href="travel.html"></a>
															<img src="../assets/images/locations/india.jpg" alt="img" class="cover-image">
														</div>
														<div class="item-card2-icons">
															<a href="#" class="item-card9-icons1 wishlist"> <i class="fa fa fa-heart-o"></i></a>
														</div>
													</div>
													<div class="card border-0 mb-0">
														<div class="card-body ">
															<div class="item-card2">
																<div class="item-card2-desc">
																	<a href="travel.html">India</a>
																	<a href="travel.html" class="text-dark mt-2"><h4 class="font-weight-bold mt-1">India Beautiful Places </h4></a>
																	<p class="mb-0 leading-tight">5 days, 4 Nights Total Trip Starts From $200</p>
																</div>
															</div>
														</div>
														<div class="card-footer pt-4 pb-4">
															<div class="item-card2-footer d-sm-flex">
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																	<div class="rating-stars-container">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (145reviews)
																</div>
																<div class="ml-auto">
																	<a href="#" class="location"><i class="fa fa-map-marker text-muted mr-1"></i> Los Angles</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card overflow-hidden">
												<div class="d-md-flex">
													<div class="item-card9-img">
														<div class="item-card2-img ">
															<div class="arrow-ribbon bg-primary">$500</div>
															<a href="#"></a>
															<img src="../assets/images/locations/germany.jpg" alt="img" class="cover-image">
														</div>
														<div class="item-card2-icons">
															<a href="#" class="item-card9-icons1 wishlist"> <i class="fa fa fa-heart-o"></i></a>
														</div>
													</div>
													<div class="card border-0 mb-0">
														<div class="card-body ">
															<div class="item-card2">
																<div class="item-card2-desc">
																	<a href="travel.html" class="">Germany</a>
																	<a href="travel.html" class="text-dark mt-2"><h4 class="font-weight-bold mt-1">Germany Beautiful Places</h4></a>
																	<p class="mb-0 leading-tight">5 days, 4 Nights Total Trip Starts From $200</p>
																</div>
															</div>
														</div>
														<div class="card-footer pt-4 pb-4">
															<div class="item-card2-footer d-sm-flex">
																<div class="item-card2-rating">
																	<div class="rating-stars d-inline-flex">
																		<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																		<div class="rating-stars-container">
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																		</div> (46 reviews)
																	</div>
																</div>
																<div class="ml-auto">
																	<a href="#" class="location"><i class="fa fa-map-marker text-muted mr-1"></i> San Francisco</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab-12">
											<div class="row">
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden">
														<div class="item-card9-img">
															<div class="arrow-ribbon bg-primary">New</div>
															<div class="item-card9-imgs">
																<a href="travel.html"></a>
																<img src="../assets/images/locations/spain.jpg" alt="img" class="cover-image">
															</div>
															<div class="item-card9-icons">
																<a href="#" class="item-card9-icons1 wishlist"> <i class="fa fa fa-heart-o"></i></a>
															</div>
														</div>
														<div class="card-body">
															<div class="item-card9">
																<a href="travel.html">Spain</a>
																<a href="travel.html" class="text-dark mt-2"><h4 class="font-weight-bold mt-1">Spain Beautiful Places</h4></a>
																<p>5 days, 4 Nights Total Trip Starts From $200</p>
																<div class="item-card9-desc">
																	<a href="#" class="mr-4"><span class=""><i class="fa fa-map-marker text-muted mr-1"></i> USA</span></a>
																	<a href="#" class=""><span class=""><i class="fa fa-calendar-o text-muted mr-1"></i> Nov-15-2018</span></a>
																</div>
															</div>
														</div>
														<div class="card-footer">
															<div class="item-card9-footer d-flex">
																<div class="item-card9-cost">
																	<h4 class="text-dark font-weight-semibold mb-0 mt-0">$263.99</h4>
																</div>
																<div class="ml-auto">
																	<div class="rating-stars block">
																		<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																		<div class="rating-stars-container">
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden">
														<div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">featured</span></div>
														<div class="item-card9-img">
															<div class="item-card9-imgs">
																<a href="travel.html"></a>
																<img src="../assets/images/locations/losangels.jpg" alt="img" class="cover-image">
															</div>
															<div class="item-card9-icons">
																<a href="#" class="item-card9-icons1 wishlist active"> <i class="fa fa fa-heart-o"></i></a>
															</div>
														</div>
														<div class="card-body">
															<div class="item-card9">
																<a href="travel.html">Los Angles</a>
																<a href="travel.html" class="text-dark mt-2"><h4 class="font-weight-bold mt-1">Los Angles Beautiful Places</h4></a>
																<p>5 days, 4 Nights Total Trip Starts From $200</p>
																<div class="item-card9-desc">
																	<a href="#" class="mr-4"><span class=""><i class="fa fa-map-marker text-muted mr-1"></i> UK</span></a>
																	<a href="#" class=""><span class=""><i class="fa fa-calendar-o text-muted mr-1"></i> Dec-05-2018</span></a>
																</div>
															</div>
														</div>
														<div class="card-footer">
															<div class="item-card9-footer d-flex">
																<div class="item-card9-cost">
																	<h4 class="text-dark font-weight-semibold mb-0 mt-0">$745.00</h4>
																</div>
																<div class="ml-auto">
																	<div class="rating-stars block">
																		<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="2">
																		<div class="rating-stars-container">
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden">
														<div class="ribbon ribbon-top-left text-primary"><span class="bg-primary">featured</span></div>
														<div class="item-card9-img">
															<div class="item-card9-imgs">
																<a href="travel.html"></a>
																<img src="../assets/images/locations/london.jpg" alt="img" class="cover-image">
															</div>
															<div class="item-card9-icons">
																<a href="#" class="item-card9-icons1 wishlist"> <i class="fa fa fa-heart-o"></i></a>
															</div>
														</div>
														<div class="card-body">
															<div class="item-card9">
																<a href="travel.html">London</a>
																<a href="travel.html" class="text-dark mt-2"><h4 class="font-weight-bold mt-1">London Beautiful Places</h4></a>
																<p>5 days, 4 Nights Total Trip Starts From $200</p>
																<div class="item-card9-desc">
																	<a href="#" class="mr-4"><span class=""><i class="fa fa-map-marker text-muted mr-1"></i> UK</span></a>
																	<a href="#" class=""><span class=""><i class="fa fa-calendar-o text-muted mr-1"></i> Nov-25-2019</span></a>
																</div>
															</div>
														</div>
														<div class="card-footer">
															<div class="item-card9-footer d-flex">
																<div class="item-card9-cost">
																	<h4 class="text-dark font-weight-semibold mb-0 mt-0">$349.00</h4>
																</div>
																<div class="ml-auto">
																	<div class="rating-stars block">
																		<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																		<div class="rating-stars-container">
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm is--active">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																			<div class="rating-star sm">
																				<i class="fa fa-star"></i>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden">
														<div class="item-card2-img">
															<div class="arrow-ribbon bg-primary">$280</div>
															<a href="travel.html"></a>
															<img src="../assets/images/locations/japan.jpg" alt="img" class="cover-image">
														</div>
														<div class="item-card2-icons">
															<a href="#" class="item-card9-icons1 wishlist active"> <i class="fa fa fa-heart-o"></i></a>
														</div>
														<div class="card-body">
															<div class="item-card2">
																<div class="item-card2-desc">
																	<a href="travel.html">Japan</a>
																	<a href="travel.html" class="text-dark mt-2"><h4 class="font-weight-bold mt-1">Japan Beautiful Places</h4></a>
																	<p class="mb-0">5 days, 4 Nights Total Trip Starts From $200</p>
																</div>
															</div>
														</div>
														<div class="card-footer">
															<div class="item-card2-footer">
																<a href="#" class="location"><i class="fa fa-map-marker text-muted mr-1"></i> Los Angles</a>
																<div class="rating-stars item-card2-rating d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																	<div class="rating-stars-container">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div>(145 reviews)
																</div>

															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden">
														<div class="item-card2-img">
															<div class="arrow-ribbon bg-primary">$242</div>
															<a href="travel.html"></a>
															<img src="../assets/images/locations/india.jpg" alt="img" class="cover-image">
														</div>
														<div class="item-card2-icons">
															<a href="#" class="item-card9-icons1 wishlist"> <i class="fa fa fa-heart-o"></i></a>
														</div>
														<div class="card-body">
															<div class="item-card2">
																<div class="item-card2-desc">
																	<a href="travel.html">India</a>
																	<a href="travel.html" class="text-dark mt-2"><h4 class="font-weight-bold mt-1">India Beautiful Places</h4></a>
																	<p class="mb-0">5 days, 4 Nights Total Trip Starts From $200</p>
																</div>
															</div>
														</div>
														<div class="card-footer">
															<div class="item-card2-footer">
																<a href="#" class="location"><i class="fa fa-map-marker text-muted mr-1"></i> Los Angles</a>
																<div class="rating-stars item-card2-rating d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																	<div class="rating-stars-container">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div>(145 reviews)
																</div>

															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden">
														<div class="item-card2-img">
															<div class="arrow-ribbon bg-primary">$500</div>
															<a href="#"></a>
															<img src="../assets/images/locations/germany.jpg" alt="img" class="cover-image">
														</div>
														<div class="item-card2-icons">
															<a href="#" class="item-card9-icons1 wishlist"> <i class="fa fa fa-heart-o"></i></a>
														</div>
														<div class="card-body">
															<div class="item-card2">
																<div class="item-card2-desc">
																	<a href="#">Germany</a>
																	<a href="#" class="text-dark mt-2"><h4 class="font-weight-bold mt-1">Germany Beautiful Places</h4></a>
																	<p class="mb-0">5 days, 4 Nights Total Trip Starts From $200</p>
																</div>
															</div>
														</div>
														<div class="card-footer">
															<div class="item-card2-footer">
																<a href="#" class="location"><i class="fa fa-map-marker text-muted mr-1"></i> San Francisco</a>
																<div class="rating-stars item-card2-rating d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																	<div class="rating-stars-container">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div>(46 reviews)
																</div>

															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="center-block text-center">
									<ul class="pagination mb-0">
										<li class="page-item page-prev disabled">
											<a class="page-link" href="#" tabindex="-1">Prev</a>
										</li>
										<li class="page-item active"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item page-next">
											<a class="page-link" href="#">Next</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!--Add lists-->
					</div>
				</div>
			</div>
		</section>
@endsection