<div class="main-menu menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand text-center" href="">
                    <div class="brand-logo"><img src="{{ asset('assets/app-assets/images/logo/favicon.png') }}" class="img-fluid" alt=""></div>
                    <div style="padding-left: 25px;"><img src="{{ asset('assets/app-assets/images/logo/logo-text.png') }}" class="img-fluid" width="120" alt=""></div>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ (request()->is('consumer/not_verified/dashboard*')) ? 'active' : '' }}"><a href="{{ route('consumer.not_verified.dashboard') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
            
        </ul>
    </div>
</div>

