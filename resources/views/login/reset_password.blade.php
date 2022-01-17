<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
<style>
    .label-size{
        font-size:11px !important;
    }
    .tooltip.show div{
            text-align: left !important;
        }
    .tooltip.show ul{
        text-align: left !important;
        padding-top: 0px !important;
        padding-left: 20px !important;
    }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Change password – Driva</title>
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
                                                <h4 class="mb-0">Create new password</h4>
                                            </div>
                                        </div>
                                        <p class="px-2 m-0">Enter your new password and confirm password to reset your account details.</p>
                                        <div class="card-content pb-2 m-0">
                                            <div class="card-body pt-1 pb-0 m-0">
                                                <form action="{{ route('login.change_password') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="email" value="{{base64_decode($email)}}" >
                                                    <fieldset class="form-label-group position-relative p-0">
                                                        <div>
                                                            <label style="color:#c2c3c5;" for="user-password" class="label-size">Password <i rel="txtTooltip"
                                                            title="<p>Your password must contain at least:</p>
                                                            <ul class='padding: 0px;'>
                                                                <li>One uppercase character</li>
                                                                <li>One lowercase character</li>
                                                                <li>One digit</li>
                                                                <li>Six characters</li>
                                                            </ul>"
                                                            data-toggle="tooltip" data-placement="bottom" class="fa fa-info-circle label-size"></i></label>
                                                        </div>
                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative">
                                                        <input type="password" id="user-confirm-password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                                                        @error('password_confirmation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <label for="user-confirm-password" class="label-size">Confirm Password</label>
                                                    </fieldset>
                                                    <div class="mt-2">
                                                <div class="row text-center">
                                                        <div class="col-12">
                                                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
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

            </div>
        </div>
    </div>
    <!-- END: Content-->
<script>
     $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

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

</body>
<!-- END: Body-->

</html>
