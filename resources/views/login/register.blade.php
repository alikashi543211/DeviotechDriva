<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <style>
    .label-size{
        font-size:11px !important;
    }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Account Registration – Driva</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/app-assets/images/logo/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/pages/authentication.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="{{ asset('assets/app-assets/images/logo/driva-logo.png') }}" class="img-fluid" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Sign up to your account</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Manage your vehicle services with Driva</p>
                                        <div class="card-content pb-2">
                                            <div class="card-body pt-1">
                                                <form action="{{ route('consumer.register.save') }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <fieldset class="form-label-group form-group position-relative">
                                                                <input type="text" id="first-name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>
                                                                @error('first_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                
                                                                <label for="first-name" class="label-size">First Name</label>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-6">
                                                            <fieldset class="form-label-group form-group position-relative">
                                                                <input type="text" id="last-name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>
                                                                @error('last_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                               
                                                                <label for="last-name" class="label-size">Last Name</label>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <fieldset class="form-label-group form-group position-relative d-none">
                                                        <input type="text" id="display-name" class="form-control @error('display_name') is-invalid @enderror" name="display_name" value="{{ old('display_name') }}" autocomplete="display_name" readonly>
                                                        @error('display_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <label data-toggle="tooltip" title="Display Name" for="display-name">Display Name <i class="fa fa-info-circle"></i></label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group form-group position-relative">
                                                        <input type="email" id="user-name" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <label for="user-name" class="label-size">Email</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative">
                                                        <input type="password" rel="txtTooltip" title="Your password must contain at least Six characters( One upper case, One Lower case, One digit )" data-toggle="tooltip" data-placement="bottom" id="user-password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                        
                                                        <label for="user-password" class="label-size">Password <i class="fa fa-info-circle label-size" rel="txtTooltip" title="Your password must contain at least Six characters( One upper case, One Lower case, One digit )" data-toggle="tooltip" data-placement="bottom"></i></label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative">
                                                        <input type="password" id="user-confirm-password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="current-password">
                                                        @error('password_confirmation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <label for="user-confirm-password" class="label-size">Confirm Password</label>
                                                    </fieldset>
                                                    
                                                    <div class="row">
                                                        <div class="col-12">
                                                            
                                                            <small class="small-text">By signing up, you confirm that you agree to our <a href="">Terms of Services</a> and <a href="">Privacy Policy</a></small>
                                                        </div>
                                                    </div>
                                                    
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {!! NoCaptcha::renderJs() !!}
                                                        {!! NoCaptcha::display() !!}
                                                        
                                                            <input type="hidden" id="g-recaptcha-response" class="form-control @error('g-recaptcha-response') is-invalid @enderror" name=""  autocomplete="current-password">
                                                            @error('g-recaptcha-response')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            
                                                        
                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="mt-2"></div>
                                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                                    <div class="mt-2"></div>
                                                    <div class="row text-center">
                                                        <div class="col-12">
                                                            <small>Already have an account? <a href="{{ route('consumer.login') }}">Login</a></small>
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

            </div>
        </div>
    </div>
    <!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('assets/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/components.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

<script>
   $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
    $(document).ready(function () {
        $('#first-name').keyup(function (e) {
            var last = $('#last-name').val();
            var first = $(this).val();
            if(first.length>=2 && last.length>=2){
                last = last.replace(/\s/g, '');
                first = first.replace(/\s/g, '');
                last=last.toLowerCase();
                first=first.toLowerCase();
                number=Math.floor(Math.random()*(999-100+1)+100)
              $('#display-name').val(first+last+number);  
            }  
        });
        $('#last-name').keyup(function (e) {
            var first = $('#first-name').val();
            var last = $(this).val();
            first=first.toLowerCase()
            last=last.toLowerCase()
            if(first.length>=2 && last.length>=2){
               last = last.replace(/\s/g, '');
                first = first.replace(/\s/g, '');
                number=Math.floor(Math.random()*(999-100+1)+100)
                last=last.toLowerCase();
                first=first.toLowerCase();
              $('#display-name').val(first+last+number);  
            }      
        });
    });
</script>

</body>
<!-- END: Body-->

</html>
