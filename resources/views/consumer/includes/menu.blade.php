<div class="main-menu menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand text-center" href="{{route('front.index')}}">
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
                <li class=" nav-item {{ (request()->is('consumer/dashboard*')) ? 'active' : '' }}"><a href="{{ route('consumer.dashboard') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
            <li class=" nav-item {{ (request()->is('consumer/vehicles*')) ? 'active' : '' }}"><a href="{{ route('consumer.vehicles') }}"><i class="fa fa-car"></i><span class="menu-title" data-i18n="Dashboard">Vehicles</span></a></li>
            {{-- <li class=" nav-item {{ (request()->is('consumer/garages/*')) ? 'active' : '' }}"><a href="{{ route('consumer.garages.garage_list') }}"><span style="padding-right:9px;"><img src="{{asset('images/verify.png')}}" height="22" width="22"></span> <span class="menu-title" data-i18n="Garages"> Garages</span></a></li> --}}
            <li class=" nav-item {{ (request()->is('consumer/booking*')) ? 'active' : '' }}"><a href="{{ route('consumer.booking') }}"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Bookings">Bookings</span></a></li>
            @if (Auth::user()->email_status=='not_verified')
                <li class=" nav-item {{ (request()->is('consumer/not_verified/dashboard*')) ? 'active' : '' }}"><a href="{{ route('consumer.not_verified.dashboard') }}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Profile">Profile</span></a></li>
            @else
            <li class=" nav-item {{ (request()->is('consumer/profile*')) ? 'active' : '' }}"><a href="{{ route('consumer.profile') }}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Profile">Profile</span></a></li>
            @endif

            {{-- <li class="nav-item {{ (request()->is('consumer/support*')) ? 'sidebar-group-active open' : '' }}"><a href="#"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Support">Support</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('consumer/support/tickets*')) ? 'active' : '' }}"><a  href="{{ route('consumer.tickets') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Tickets">My Support Tickets</span></a>
                    </li>
                    <li class="{{ (request()->is('consumer/support/open-ticket*')) ? 'active' : '' }}"><a href="{{ route('consumer.open_ticket') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Open Ticket">Open Ticket</span></a>
                    </li>
                </ul>
            </li> --}}
            <li class=" nav-item {{ (request()->is('consumer/support*')) ? 'active' : '' }}"><a href="{{ route('consumer.tickets') }}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Support">Support</span></a></li>
            <li class=" nav-item {{ (request()->is('consumer/settings*')) ? 'active' : '' }}"><a href="{{ route('consumer.settings.account') }}"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Account Settings">Account Settings</span></a></li>
        </ul>
    </div>
</div>

