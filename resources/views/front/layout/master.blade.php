<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="msapplication-TileColor" content="#0f75ff">
        <meta name="theme-color" content="#2ddcd3">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="description" content="Pinlist – Directory, Classifieds and Jobs Multipurpose Bootstrap4 HTML5 Listing Template">
        <meta name="author" content="sprukotechnologies">
        <meta name="keywords" content="classifieds,real estate,education online classess,jobs,business directory,coupons,cars,e-commerce,market place,auctions,tours & travels,domain marketPlace,books listing,doctors listing,rating & reviews,iCO list,wedding,knowledge base,softwares,video listing,booking html template,bootstrap 4 html template,buy templates,directory listing html template,html and css website templates,html app template,html5 web templates,modern html templates,premium bootstrap templates,responsive ui,html template,html5 template,ecommerce html template,directory listing html template,html css js templates,search html template,best ui kits,bootstrap 4 ui kit,bootstrap kit,css ui kit,flat ui kit,html ui kit,kit ui,multipurpose website ui kit,ui kit template,uikit css,web ui kit,website ui kit,wireframe kit,wireframe ui kit,bootstrap ui kit,dashboard ui kit,flat ui,flat ui design,uikit">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/app-assets/images/logo/favicon.png')}}">

        <!-- Title -->
        <title>@yield('title') - Driva</title>

        <!-- Bootstrap Css -->
        <link href="{{asset('front/assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Dashboard Css -->
        <link href="{{asset('front/assets/css/style.css')}}" rel="stylesheet" />

        <!-- Font-awesome  Css -->
        <link rel="stylesheet" href="{{asset('front/assets/fonts/fonts/font-awesome.min.css')}}">

        <!--Horizontal Menu-->
        <link href="{{asset('front/assets/plugins/Horizontal2/Horizontal-menu/dropdown-effects/fade-down.css')}}" rel="stylesheet" />
        <link href="{{asset('front/assets/plugins/Horizontal2/Horizontal-menu/color-skins/color.css')}}" rel="stylesheet" />

        <!--Select2 Plugin -->
        <link href="{{asset('front/assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

        <!-- Cookie css -->
        <link href="{{asset('front/assets/plugins/cookie/cookie.css')}}" rel="stylesheet">

        <!-- Owl Theme css-->
        <link href="{{asset('front/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

        <!-- Custom scroll bar css-->
        <link href="{{asset('front/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

        <!--Font icons-->
        <link href="{{asset('front/assets/plugins/iconfonts/plugin.css')}}" rel="stylesheet">
        <link href="{{asset('front/assets/plugins/iconfonts/icons.css')}}" rel="stylesheet">

        <link href="{{asset('assets/css/master.css')}}" rel="stylesheet">
        <!-- Custom Css -->
        <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
        @yield('css')
        <style type="text/css">
            div.pac-container{
                z-index: 99999999 !important;
            }
        </style>
    </head>
    <body>
        <!--Loader-->
        <div id="global-loader">
            <img src="{{asset('front/assets/images/svg/driva-loader.svg')}}" class="loader-img floating" alt="">
        </div>

        <!--Top Header Baar-->
        <div class="header-main">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-sm-4 col-7">
                            <div class="top-bar-left d-flex">
                                <div class="clearfix">
                                    <ul class="socials">
                                        <li>
                                            <a class="social-icon text-dark" href="http://www.facebook.com/DrivaGroup" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a class="social-icon text-dark" href="https://twitter.com/DrivaGroup" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix">
                                    <ul class="contact border-left">
                                        <li class="mr-5 d-lg-none">
                                            <a href="#" class="callnumber text-dark"><span><i class="fa fa-phone mr-1"></i>: +425 345 8765</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-sm-8 col-5">
                            <div class="top-bar-right">
                                <ul class="custom">
                                    <li>
                                        <a href="{{route('consumer.register')}}" class="text-dark"><i class="fa fa-user mr-1"></i> <span>Register</span></a>
                                    </li>
                                    <li>
                                        <a href="{{route('login.login')}}" class="text-dark"><i class="fa fa-sign-in mr-1"></i> <span>Login</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Header -->
            <div class="sticky">
                <div class="horizontal-header clearfix ">
                    <div class="container">
                        <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                        <span class="smllogo"><img src="{{ asset('assets/app-assets/images/logo/driva-logo.png') }}" width="120" alt=""/></span>
                        <a href="tel:245-6325-3256" class="callusbtn"><i class="fa fa-phone" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Mobile Header -->
            <div>
                <div class="horizontal-main clearfix">
                    <div class="horizontal-mainwrapper container clearfix">
                        <div class="desktoplogo">
                            <a href="{{route('front.index')}}"><img style="width: 220px;" src="{{ asset('assets/app-assets/images/logo/driva-logo.png') }}" alt="" class="img-responsive"></a>
                        </div>

                        <!--Nav-->
                        <nav class="horizontalMenu clearfix d-md-flex">
                            <ul class="horizontalMenu-list">
                                <li aria-haspopup="true"><a href="javascript:void(0);">Home </a></li>
                                <li aria-haspopup="true"><a href="javascript:void(0);">About</a></li>
                                <li aria-haspopup="true"><a href="javascript:void(0);">FAQ</a></li>
                                <li aria-haspopup="true"><a href="javascript:void(0);">News</a></li>
                                <li aria-haspopup="true"><a href="javascript:void(0);">Contact</a></li>
                                <li aria-haspopup="true" class="d-lg-none mt-5 pb-5 mt-lg-0">
                                    <span><a class="btn btn-outline-primary" href="{{route('consumer.register')}}">Trade Sign Up</a></span>
                                </li>
                            </ul>
                            <ul class="mb-0">
                                <li aria-haspopup="true" class="mt-5 d-none d-lg-block ">
                                    <span><a class="btn btn-outline-primary" href="{{route('garage.register')}}">Garage Sign Up</a></span>
                                </li>
                            </ul>
                        </nav>
                        <!--Nav-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /Top Header Bar -->

        <!-- Search Banner -->
        <section>
            <div class="banner-1 cover-image sptb-2 sptb-tab bg-background2" data-image-src="{{asset('front/assets/images/banners/banner.png')}}">
                <div class="header-text mb-0">
                    <div class="container">
                        <div class="text-center text-white">
                            <h1 class="mb-1">Find The Garage For Your Services</h1>
                            <p>Maintain the best service for your vehicle</p>
                        </div>
                        <div class="row">
                            <div class="col-xl-11 col-lg-12 col-md-12 d-block mx-auto">
                                <div class="item-search-tabs classifieds-content">
                                    <div class="tab-content">
                                        <form class="front-garage-search-form" id="front_garage_search_form" action="{{route('front.garage_list')}}" data-value="">
                                            <div class="tab-pane active" id="tab1">
                                                <div class="form row">
                                                    <div class="input-group col-xl-6 col-lg-6 col-md-12 mb-0 search_keyword_group">
                                                        <div class="inner_input_group" id="inner_keyword_group_id">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text icon_design"><i class="fa fa-search font-medium-3 search_icon"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-keyword border-0 keyword_input" name="keyword" id="keyword" placeholder="Keyword or garage name" placeholder-value="Keyword or garage name" autocomplete="off" key="keyword" value="{{request()->keyword}}">
                                                            <div id="keywordList" class="keywordList keyword-list-result"></div>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text icon_design cross_icon cursor-pointer"><i class="fa fa-times font-medium-3" aria-hidden="true"></i></span>
                                                            </div>
                                                            <div class="error_placeholder_box d-none" id="error_keyword_box"><i class="fa fa-exclamation-circle"></i> This field is required</div>
                                                            <div class="placeholder_box d-none" id="keyword_placeholder_id">Keyword or garage name</div>
                                                            <div class="suggested_keyword_group d-none" id="search_keyword_list">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group col-xl-4 col-lg-4 col-md-12 mb-0 location_input_group pr-0">
                                                        <div class="inner_input_group" id="inner_location_group_id">
                                                            <div class="input-group-prepend group_prepend">
                                                                <span class="input-group-text icon_design icon_design_one"><i class="fa fa-map-marker font-medium-3" aria-hidden="true"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control border-0 location_search location_box location_input spoint" value="" name="location" id="spoint" placeholder="UK, town or postcode" placeholder-value="UK, town or postcode" key="location" autocomplete="off">
                                                            <div class="d-none api_details">
                                                                
                                                            </div>
                                                            <div id="keywordList" class="keywordList keyword-list-result"></div>
                                                            <div class="input-group-append group_append" style="position: absolute;right: 0;">
                                                                <span class="input-group-text icon_design icon_design_two fetch_user_location cursor-pointer"><i class="fa fa-crosshairs font-medium-3" aria-hidden="true"></i></span>

                                                            </div>
                                                            <!-- API GET INFO -->
                                                            <input type="hidden" id="address_lat" name="address_lat" value="{{request()->address_lat}}">
                                                            <input type="hidden" id="address_long" name="address_long" value="{{request()->address_long}}">

                                                            <div class="error" id="errorMessage"></div>
                                                            <div id="result"></div>
                                                            <div class="seperator" id="seperator"></div>
                                                            <div class="outputArea"><pre id="output" class="bg-white"></pre></div>
                                                            
                                                            <div class="error_placeholder_box d-none" id="error_location_box"><i class="fa fa-exclamation-circle"></i> This field is required</div>
                                                            <div class="placeholder_box d-none" id="location_placeholder_id">UK, town or postcode</div>
                                                            <!-- <div class="suggested_location_group d-none" id="search_keyword_list">
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                     <div class="col-xl-2 col-lg-2 col-md-12 mb-0 search_button_box pl-0 pb-0">
                                                        <button type="button" id="button_search_id" class="btn btn-block btn-secondary button_height"><i class="fa fa-search"></i>  Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Search Banner -->
        @yield('content')
              <!-- Newsletter-->
        <section class="sptb bg-white border-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-xl-6 col-md-12">
                        <div class="sub-newsletter">
                            <h3 class="mb-2"><i class="fa fa-paper-plane-o mr-2"></i> Subscribe To Our Newsletter</h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-6 col-md-12">
                        <div class="input-group sub-input mt-1">
                            <input type="text" class="form-control input-lg " placeholder="Enter your Email">
                            <div class="input-group-append ">
                                <button type="button" class="btn btn-secondary btn-lg br-tr-7 br-br-7">
                                    Subscribe
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/Newsletter-->
        <!--Footer Section-->
        <section>
            <footer class="bg-light text-dark footer-tag">
                <div class="footer-main">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <h6>Business Directory</h6>
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Colleges</a></li>
                                    <li><a href="#">Hospital</a></li>
                                    <li><a href="#">Factories</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <h6>Classifieds</h6>
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#">Real Estate</a></li>
                                    <li><a href="#">Computer</a></li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Jobs</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <h6>Resources</h6>
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                    <li><a href="#">Contact Details</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <h6>Popular Ads</h6>
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#">Educational college Ads</a></li>
                                    <li><a href="#">Free Lancer for Web Developer</a></li>
                                    <li><a href="#">2BHK Flat In Hyderabad</a></li>
                                    <li><a href="#">BPO Jobs In Bangalore</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-lg-8 col-sm-12  mt-2 mb-2 text-left ">
                            Copyright © 2021 <a href="{{route('front.index')}}" class="fs-14 text-driva-secondary">Driva Group Ltd</a>. All rights reserved.
                        </div>
                        <div class="col-lg-2 col-sm-12 ml-auto mb-2 mt-2 social-list">
                            <ul class="social mb-0">
                                <li>
                                    <a class="social-icon" target="_blank" href="http://www.facebook.com/DrivaGroup"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="social-icon" target="_blank" href="https://twitter.com/DrivaGroup"><i class="fa fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2">
                    
                        </div>
                    </div>
                </div>
                
            </footer>
        </section>
        <!--Footer Section-->

        <!-- Back to top -->
        <a href="#top" style="background:#ea5455;" id="back-to-top"><i class="fa fa-rocket"></i></a>

        <!-- JQuery js-->
        <script src="{{asset('front/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>

        <!-- Bootstrap js -->
        <script src="{{asset('front/assets/plugins/bootstrap-4.1.3/popper.min.js')}}"></script>
        <script src="{{asset('front/assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js')}}"></script>

        <!--JQuery Sparkline Js-->
        <script src="{{asset('front/assets/js/vendors/jquery.sparkline.min.js')}}"></script>

        <!-- Circle Progress Js-->
        <script src="{{asset('front/assets/js/vendors/circle-progress.min.js')}}"></script>

        <!-- Star Rating Js-->
        <script src="{{asset('front/assets/plugins/rating/jquery.rating-stars.js')}}"></script>

        <!--Owl Carousel js -->
        <script src="{{asset('front/assets/plugins/owl-carousel/owl.carousel.js')}}"></script>
        <!-- slick library -->
        <!--Horizontal Menu-->
        <script src="{{asset('front/assets/plugins/Horizontal2/Horizontal-menu/horizontal.js')}}"></script>

        <!--JQuery TouchSwipe js-->
        <script src="{{asset('front/assets/js/jquery.touchSwipe.min.js')}}"></script>

        <!--Select2 js -->
        <script src="{{asset('front/assets/plugins/select2/select2.full.min.js')}}"></script>
        <script src="{{asset('front/assets/js/select2.js')}}"></script>

        <!-- Cookie js -->
        <script src="{{asset('front/assets/plugins/cookie/jquery.ihavecookies.js')}}"></script>
        <script src="{{asset('front/assets/plugins/cookie/cookie.js')}}"></script>

        <!-- Custom scroll bar Js-->
        <script src="{{asset('front/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

        <!-- sticky Js-->
        <script src="{{asset('front/assets/js/sticky.js')}}"></script>
        <script src="{{asset('front/assets/js/custom-sticky.js')}}"></script>


        <!-- Swipe Js-->
        <script src="{{asset('front/assets/js/swipe.js')}}"></script>

        <!-- Custom Js-->
        <script src="{{asset('front/assets/js/custom.js')}}"></script>
        <script src="{{asset('front/assets/js/custom2.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
        <!-- Google Location APIs -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script>

            $(window).on("load", function(e) {
                $("#loading").fadeOut("slow");
            });
            width_location  = $("#inner_location_group_id").width();
            console.log(width_location);
            $("#inner_location_group_id").find(".pac-container").width(width_location);
            pac_width = $("#inner_location_group_id").find(".pac-container").width();
            console.log(pac_width);

            $(document).on("click",'.cross_icon', function()
            {
                $("#keyword").val("");
                $("#front_garage_search_form").attr("data-value","button_clicked");
                $("#keyword_placeholder_id").removeClass("d-block");
                $("#keyword_placeholder_id").addClass("d-none");
                $('#inner_keyword_group_id').removeClass("green-stroke");
                $('#inner_keyword_group_id').addClass("red-stroke");
                $("#error_keyword_box").removeClass("d-none");
                $("#error_keyword_box").addClass("d-block");
            });
            $(window).resize(function()
            {
                if ($(window).width() < 992) 
                {
                    $(".search_button_box").removeClass("pb-0");
                    $(".search_button_box").removeClass("pl-0");
                    $(".location_input_group").removeClass("pr-0");
                }else
                {
                    $(".search_button_box").addClass("pb-0");
                    $(".search_button_box").addClass("pl-0");
                    $(".location_input_group").addClass("pr-0");
                }
            });
            $(document).on("click", "#button_search_id",function()
            {
                submit_search();
            });

            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    submit_search();
                }
            });

            function submit_search()
            {
                var keyword_input=$(".keyword_input").val();
                var location_input=$(".location_input").val();
                var lat=$("input[name=address_lat]").val();
                var long=$("input[name=address_long]").val();
                if(keyword_input=='' && location_input=='')
                {
                    $("#error_keyword_box").removeClass("d-none");
                    $("#error_keyword_box").addClass("d-block");
                    $("#error_location_box").removeClass("d-none");
                    $("#error_location_box").addClass("d-block");
                    $("#front_garage_search_form").attr("data-value","button_clicked");
                    $('.input-group .inner_input_group').removeClass("green-stroke");
                    $('.input-group .inner_input_group').addClass("red-stroke");
                }else
                if(keyword_input=='')
                {
                    $("#error_keyword_box").removeClass("d-none");
                    $("#error_keyword_box").addClass("d-block");
                    $("#front_garage_search_form").attr("data-value","button_clicked");
                    $('#inner_keyword_group_id').removeClass("green-stroke");
                    $('#inner_keyword_group_id').addClass("red-stroke");
                    $('#inner_location_group_id').removeClass("red-stroke");
                    $('#inner_location_group_id').addClass("green-stroke");
                    
                }else
                if(location_input=='')
                {
                    $("#error_location_box").removeClass("d-none");
                    $("#error_location_box").addClass("d-block");
                    $("#front_garage_search_form").attr("data-value","button_clicked");
                    $('#inner_keyword_group_id').removeClass("red-stroke");
                    $('#inner_keyword_group_id').addClass("green-stroke");
                    $('#inner_location_group_id').removeClass("green-stroke");
                    $('#inner_location_group_id').addClass("red-stroke");
                }else
                {
                    $('.input-group .inner_input_group').removeClass("red-stroke");
                    $('.input-group .inner_input_group').addClass("green-stroke");
                    // window.location.href="{{route('front.garage_list')}}?keyword="+keyword_input+"&location="+location_input+"&lat="+lat+"&long="+long;
                    $("#front_garage_search_form").submit();

                }
            }

            $(document).on("keyup",".keyword_input",function(event)
            {
                event.preventDefault();
                var keyword=$(this).val();
                if($(this).val()!='')
                {
                    $.ajax({
                      type: "GET",
                      url: "{{ route('front.ajax.load_keyword') }}?keyword="+keyword,
                      success: function (response) 
                      {
                        if(response.result)
                        {
                            $(".suggested_keyword_group").html(response.items);
                            $(".suggested_keyword_group").removeClass("d-none");
                            $(".suggested_keyword_group").addClass("d-block");
                            $("#keyword_placeholder_id").removeClass("d-block");
                            $("#keyword_placeholder_id").addClass("d-none");
                        }else
                        {
                            $(".suggested_keyword_group").removeClass("d-block");
                            $(".suggested_keyword_group").addClass("d-none");
                            $("#keyword_placeholder_id").removeClass("d-none");
                            $("#keyword_placeholder_id").addClass("d-block");
                        }
                      },
                    });
                }else
                {
                    $(".suggested_keyword_group").removeClass("d-block");
                    $(".suggested_keyword_group").addClass("d-none");
                    $("#keyword_placeholder_id").removeClass("d-none");
                    $("#keyword_placeholder_id").addClass("d-block");
                }
            });
            $(document).on("keyup",".location_input",function()
            {
                if($(this).val()!='')
                {
                    // findAddress();
                    $(".suggested_location_group").removeClass("d-none");
                    $(".suggested_location_group").addClass("d-block");
                    $("#location_placeholder_id").removeClass("d-block");
                    $("#location_placeholder_id").addClass("d-none");
                }else
                {
                    $(".suggested_location_group").removeClass("d-block");
                    $(".suggested_location_group").addClass("d-none");
                    $("#location_placeholder_id").removeClass("d-none");
                    $("#location_placeholder_id").addClass("d-block");
                }
            });
            $(document).on("focus",".front-garage-search-form .form-control",function()
            {
                $(this).attr("placeholder","");
                var btn_clicked=$("#front_garage_search_form").attr("data-value");
                var key=$(this).attr("key");
                var keyword_input=$(".keyword_input").val();
                var location_input=$(".location_input").val();
                if(key=="keyword")
                {
                    if(btn_clicked!='')
                    {
                        $("#error_keyword_box").removeClass("d-block");
                        $("#error_keyword_box").addClass("d-none");
                    }
                  $('#inner_keyword_group_id').removeClass("green-stroke");
                  $('#inner_keyword_group_id').removeClass("red-stroke");
                  if(keyword_input!='')
                  {
                    $(".suggested_keyword_group").removeClass("d-none");
                    $(".suggested_keyword_group").addClass("d-block");
                  }else
                  {
                    $("#keyword_placeholder_id").addClass("d-block");
                    $("#keyword_placeholder_id").removeClass("d-none");
                  }
                }
                if(key=="location")
                {
                    if(btn_clicked!='')
                    {
                        $("#error_location_box").removeClass("d-block");
                        $("#error_location_box").addClass("d-none");
                    }
                    $('#inner_location_group_id').removeClass("red-stroke");
                    $('#inner_location_group_id').removeClass("green-stroke");
                    if(location_input!='')
                    {
                        $(".suggested_location_group").removeClass("d-none");
                        $(".suggested_location_group").addClass("d-block");
                    }else
                    {
                        $("#location_placeholder_id").addClass("d-block");
                        $("#location_placeholder_id").removeClass("d-none");
                    }
                }
            });

            $(document).on("focusout",".front-garage-search-form .form-control",function()
            {
                var value=$(this).attr("placeholder-value");
                $(this).attr("placeholder",value);
                var key=$(this).attr("key");
                var btn_clicked=$("#front_garage_search_form").attr("data-value");
                var keyword_input=$(".keyword_input").val();
                var location_input=$(".location_input").val();
                if(key=="keyword")
                {
                    $("#keyword_placeholder_id").removeClass("d-block");
                    $("#keyword_placeholder_id").addClass("d-none");
                    if(btn_clicked!='' && keyword_input=='')
                    {
                        $("#error_keyword_box").removeClass("d-none");
                        $("#error_keyword_box").addClass("d-block");
                        $('#inner_keyword_group_id').removeClass("green-stroke");
                        $('#inner_keyword_group_id').addClass("red-stroke");
                    }
                    if(keyword_input!='')
                    {
                        $('#inner_keyword_group_id').removeClass("red-stroke");
                        $('#inner_keyword_group_id').addClass("green-stroke");
                    }else
                    {
                        $('#inner_keyword_group_id').removeClass("green-stroke");
                    }
                    if($(".suggested_keyword_group").hasClass('d-block'))
                    {
                        $(".suggested_keyword_group").removeClass("d-block");
                        $(".suggested_keyword_group").addClass("d-none");
                    }
                }
                if(key=="location")
                {
                    // $("#button_search_id").addClass("button_height");
                    $("#location_placeholder_id").removeClass("d-block");
                    $("#location_placeholder_id").addClass("d-none");
                    if(btn_clicked!='' && location_input=='')
                    {
                        $("#error_location_box").removeClass("d-none");
                        $("#error_location_box").addClass("d-block");
                        $('#inner_location_group_id').removeClass("green-stroke");
                        $('#inner_location_group_id').addClass("red-stroke");
                    }
                    if(location_input!='')
                    {
                        $('#inner_location_group_id').removeClass("red-stroke");
                        $('#inner_location_group_id').addClass("green-stroke");
                    }else
                    {
                        $('#inner_location_group_id').removeClass("green-stroke");
                    }
                    if($(".suggested_location_group").hasClass('d-block'))
                    {
                        $(".suggested_location_group").removeClass("d-block");
                        $(".suggested_location_group").addClass("d-none");
                    }
                }
            });
        
            $(document).on("mousedown",".suggested_keyword_group .item,.suggested_location_group .item",function()
            {
                var key=$(this).attr("key");
                var value=$(this).text();
                if(key=="keyword")
                {
                    $(".keyword_input").val(value);
                    $(".keyword_input").addClass('text_capitalize');
                }else
                if(key=="location")
                {
                    $(".location_input").val(value);
                }
            });
            
            $(document).on('click','.fetch_user_location', function(){
                $.get(
                        "https://ipinfo.io?token=d130d784ecb044",
                        function (response) {
                            var uk_postcode=response.postal;
                            var location=response.loc.split(",");
                            var address_lat=location[0];
                            var address_long=location[1];
                            $("#uk_postcode").val(uk_postcode);
                            $("#address_lat").val(address_lat);
                            $("#address_long").val(address_long);
                            $(".location_box").val(response.city);
                        },
                        "jsonp"
                    );
            });

            // Disable Enter
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
            
        </script>
        <script type="text/javascript">
            $(document).on("click", "#spoint", function(){
                changeWidth();
            });
            $(document).on("keyup", "#spoint", function(){
                changeWidth();
            });
            function changeWidth()
            {
                width_location  = $("#inner_location_group_id").width();
                console.log(width_location);
                $(".pac-container:first").width(width_location);
                $('.pac-container:first').css('left')
                pac_width = $(".pac-container:first").width();
                console.log(width_location);
            }

            function initMap(field = 'spoint', address_lat = 'address_lat', address_long = 'address_long')
            {

                var api_address = '';
                var options = {
                    componentRestrictions: {country: "uk"}
                };

                var spoint = document.getElementById(field);
                var autocomplete = new google.maps.places.Autocomplete(spoint, options);

                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var place = autocomplete.getPlace();
                    console.log(place.adr_address);
                    $(".api_details").html(place.adr_address);
                    api_locality = $(".api_details").find('.locality').html();
                    
                    address = $('#'+field).val();

                    new_address = address.replace(', UK','');
                    if(typeof api_locality !== 'undefined')
                    {
                        new_address = new_address.replace(api_locality, api_locality+",");
                    }
                    var lat = place.geometry.location.lat();
                    var lon = place.geometry.location.lng();
                    $('#'+address_lat).val(lat);$('#'+address_long).val(lon);
                    new_address = new_address.replace(/,\s*$/, "");
                    $("#"+field).val(new_address);
                });
                if($('#spoint_two').length && field == 'spoint')
                    initMap('spoint_two', 'address_lat_two', 'address_long_two');
            }

            $(document).ready(function(){
              google.load("maps", "3.exp", {callback: initMap, other_params:'key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&libraries=places,drawing'});
            });
        </script>
        @yield('js')
    </body>
</html>