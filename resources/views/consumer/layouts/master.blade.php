<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<title> @yield('title') - Driva</title>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/app-assets/images/logo/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    {{-- Crop image css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">

    <!--Pincode-jQuery-Plugin-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/Pincode-jQuery-Plugin/css/jquery-pincode-autotab.min.css')}}">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/components.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/plugins/tour/tour.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/jquery.tagsinput.min.css')}}">
    <link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v3.0.1/dist/bootstrap-float-label.min.css"/>
    <!-- Wizard CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/plugins/forms/wizard.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap">
    
    <link href="{{asset('assets/css/consumer_master.css')}}" rel="stylesheet">
    <!-- Custom Css -->
    
    @yield('css')
</head>
<!-- END: Head-->


<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- BEGIN: Header-->
@include('consumer.includes.header')
<!-- END: Header-->
<!-- BEGIN: Main Menu-->
@include('consumer.includes.menu')
<!-- END: Main Menu-->


<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
@include('consumer.includes.footer')
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('assets/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/components.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.all.min.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/jquery.tagsinput.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/datatables/datatable.js')}}"></script>
<!--Pincode-jQuery-Plugin-->
<script src="{{asset('assets/app-assets/Pincode-jQuery-Plugin/js/jquery-pincode-autotab.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
{{-- <script src="{{asset('assets/app-assets/js/croppie.min.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
<!-- END: Page JS-->
<!-- GOOGLE LOCATION APIS -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>

    $(window).on('load',function()
    {
        sidebar_height=$('.main-menu-content').height();
        content_height=$('.app-content.content').height();
        if(sidebar_height>content_height)
        {
            $(".app-content.content").height($('.main-menu-content').height()+100);
        }
        $(".main-menu").height($('.app-content.content').height());
        height=$('.app-content.content').height();
    });
    
    // Disable Enter
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    

    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @elseif(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    $(document).ready(function () {
        // Datatable settings
        $('.dataTables_length').css('display','none');
        $('.custom-filter').click(function (e) {
            e.preventDefault();
            $('[name=DataTables_Table_0_length]').val($(this).attr('data-value')).trigger('change');
            $('.table_length').html($(this).attr('data-value'));
        });

        // Tags Input
        $('#keywords').tagsInput();

        $('.profile-boxes').click(function(){
            if(!$(this).hasClass('active')){
                $(this).addClass('active');
            }
            else{
                $(this).removeClass('active');
            }
        });
    });
    
    function loadKeywordList()
    {
        $.ajax({
            type: "GET",
            url: "{{ route('load.keyword.list') }}",
            success: function (response) {
                $('#keywordList').hide();
            }
        });
    }

    $(document).on("click",'.available-status', function()
    {
        var status=$(this).attr("data-value");
        $.ajax({
            type: "GET",
            url: "{{ route('change.consumer.status') }}?s="+status,
            success: function (response) {
                if(response.status=="away"){
                    var available_status='<i class="feather icon-message-square"></i><i class="fa fa-circle text-secondary offline_icon" aria-hidden="true"></i>Available';
                    title="Away";
                    data_value="away";
                    }
                    if(response.status=="available"){
                    available_status='<i class="feather icon-message-square"></i><i class="fa fa-circle text-success online_icon" aria-hidden="true"></i>Away';
                    title="Available";
                    data_value="available";
                    }
                    $(".available-status").html(available_status);
                    $(".user-status").html(title);
                    $(".available-status").attr("data-value",data_value);
                    toastr.success(response.msg);
                    window.location.reload(true);
                }
            });
    });

    // Validation
    
    $(".validate-form").validate(
    {
        rules: {
            keyword: {
                required: true,
            },
            location: {
                required: true,
            },
        },
        unhighlight: function (element) {
            $(element).closest('.input-group .inner_input_group').removeClass("red-stroke");
            $(element).closest('.input-group .inner_input_group').addClass("green-stroke");
        },
        errorPlacement: function(error, element) {
            $(element).closest('.input-group .inner_input_group').addClass("red-stroke");
            $(element).closest('.input-group .inner_input_group').removeClass("green-stroke");
        }
    });


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

    $(document).on('click','.fetch_user_location', function()
    {
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
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            submit_search();
        }
    });

    $(document).on("click","#button_search_id",function() {
        submit_search();
    });
    $(document).on("click","#button_search_id",function()
    {
        submit_search();
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
        }else
        if(key=="location")
        {
            $(".location_input").val(value);
        }
    });

    // Disable Enter Button
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
</script>

<!-- Google API Locations.. -->
<script type="text/javascript">
    function initMap()
    {
        var api_address = '';
        var options = {
            componentRestrictions: {country: "uk"}
        };

        var spoint = document.getElementById('spoint');
        var autocomplete = new google.maps.places.Autocomplete(spoint, options);

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            // console.log(place.adr_address);
            $(".api_details").html(place.adr_address);
            api_locality = $(".api_details").find('.locality').html();
            
            address = $('#spoint').val();
            new_address = address.replace(', UK','');
            if(typeof api_locality !== 'undefined')
            {
                new_address = new_address.replace(api_locality, api_locality+",");
            }
            var lat = place.geometry.location.lat();
            var lon = place.geometry.location.lng();
            $('#address_lat').val(lat);$('#address_long').val(lon);
            new_address = new_address.replace(/,\s*$/, "");
            $("#spoint").val(new_address);
        });
    }

    $(document).ready(function(){
      google.load("maps", "3.exp", {callback: initMap, other_params:'key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&libraries=places,drawing'});
    });
</script>

@yield('js')

</body>
<!-- END: Body-->
</html>
