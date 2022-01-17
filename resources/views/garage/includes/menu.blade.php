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
        @if(garage()->status!='approved' || garage()->is_verified == 0)
            <li class=" nav-item active {{ (request()->is('garage/application*')) ? 'active' : '' }}"><a href="{{ route('garage.application.redirection') }}"><i class="fa fa-list-alt"></i><span class="menu-title" data-i18n="Application">Application</span></a></li>
           @else
            <li class=" nav-item {{ (request()->is('garage/dashboard*')) ? 'active' : '' }}"><a href="{{ route('garage.dashboard') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
            @if(auth()->user()->role=="garage")
            <li class=" nav-item {{ (request()->is('garage/advertising*')) ? 'active' : '' }}"><a href="{{ route('garage.advertising.list') }}"><i class="fa fa-buysellads"></i><span class="menu-title" data-i18n="Advertising">Advertising</span></a></li>

            <li class=" nav-item {{ (request()->is('garage/profile*') || request()->is('garage/application*')) ? 'active' : '' }}"><a href="{{ route('garage.profile') }}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Profile">Profile</span></a></li>
            @endif
            <li class=" nav-item {{ (request()->is('garage/booking*')) ? 'active' : '' }}"><a href="{{ route('garage.booking') }}"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Bookings">Bookings</span></a></li>
            <li class=" nav-item {{ (request()->is('garage/settings*')) ? 'active' : '' }}"><a href="{{ route('garage.settings.account') }}"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Account Settings">Account Settings</span></a></li>
            @if(auth()->user()->role=="garage")
            <li class=" nav-item {{ (request()->is('garage/statistics*')) ? 'active' : '' }}"><a href="{{ route('garage.statistics') }}"><i class="feather icon-bar-chart-2"></i><span class="menu-title" data-i18n="Statistics">Statistics</span></a></li>
            <li class="nav-item {{ (request()->is('garage/support*')) ? 'sidebar-group-active open' : '' }}"><a href="#"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Support">Support</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('garage/support/tickets*')) ? 'active' : '' }}"><a  href="{{ route('garage.tickets') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Tickets">My Support Tickets</span></a>
                    </li>
                    <li class="{{ (request()->is('garage/support/open-ticket*')) ? 'active' : '' }}"><a href="{{ route('garage.open_ticket') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Open Ticket">Open Ticket</span></a>
                    </li>
                    <li class="{{ (request()->is('garage/support/faq*')) ? 'active' : '' }}"><a  href="{{ route('garage.faq') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="FAQ">FAQ</span></a>
                    </li>
                </ul>
            </li>
            @endif
            @endif
        </ul>
    </div>
</div>
