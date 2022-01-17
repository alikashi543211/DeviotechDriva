
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
            <li class=" nav-item {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>
            <li class=" nav-item {{ (request()->is('admin/consumer*')) ? 'active' : '' }}"><a href="{{ route('admin.consumer') }}"><i class="fa fa-users"></i><span class="menu-title" data-i18n="Consumers">Consumers</span></a>
            </li>

            <li class=" nav-item {{ (request()->is('admin/garage*')) ? 'sidebar-group-active open' : '' }}"><a href="#"><i class="fa fa-car"></i><span class="menu-title" data-i18n="Garages">Garages</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/garage/overview*')) ? 'active' : '' }}"><a href="{{ route('admin.garage.overview') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Overview">Overview</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/garage/applications*')) ? 'active' : '' }}"><a href="{{ route('admin.garage.applications') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Applications">Applications</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/garage/exports*')) ? 'active' : '' }}"><a href="{{ route('admin.garage.exports') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Exports">Exports</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ (request()->is('admin/bookings*')) ? 'active' : '' }}">
                <a href="{{ route('admin.booking') }}"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Bookings">Bookings</span></a>
            </li>
            <li class="nav-item {{ (request()->is('admin/support*')) ? 'sidebar-group-active open' : '' }}"><a href="#"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Support">Support</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/support/enquiries*')) ? 'active' : '' }}"><a href="{{ route('admin.support.enquiries') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Enquiries</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/support/reports*')) ? 'active' : '' }}"><a  href="{{ route('admin.support.reports') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">Reports</span></a>
                    </li>
                </ul>
            </li>
            @if(auth()->user()->role=="admin")
            <li class="nav-item {{ (request()->is('admin/statistics*')) ? 'active' : '' }}"><a href="{{ route('admin.statistics') }}"><i class="feather icon-bar-chart-2"></i><span class="menu-title" data-i18n="Chat">Statistics</span></a>
            </li>

            <li class="nav-item {{ (request()->is('admin/emails*')) ? 'active' : '' }}"><a href="{{ route('admin.emails') }}"><i class="feather icon-layout"></i><span class="menu-title" data-i18n="Emails">Emails</span></a>
            </li>
            <li class="nav-item {{ (request()->is('admin/marketing*')) ? 'sidebar-group-active open' : '' }}"><a href="#"><i class="fa fa-bullhorn"></i><span class="menu-title" data-i18n="Marketing">Marketing</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/marketing/consumer*')) ? 'active' : '' }}"><a href="{{ route('admin.marketing.consumer') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Enquiries">Consumers</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/marketing/garage*')) ? 'active' : '' }}"><a href="{{ route('admin.marketing.garage') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Garages">Garages</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ (request()->is('admin/services*')) ? 'sidebar-group-active open' : '' }}"><a href="#"><i class="fa fa-wrench"></i><span class="menu-title" data-i18n="Services">Services</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/services/list*')) ? 'active' : '' }}"><a href="{{ route('admin.services.list') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Services List">List</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/marketing/add*')) ? 'active' : '' }}"><a href="{{ route('admin.services.add') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Services Add">Add</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ (request()->is('admin/customer-facilities*')) ? 'sidebar-group-active open' : '' }}"><a href="#"><i class="feather icon-plus-square"></i><span class="menu-title" data-i18n="Customer Facilities">Customer Facilities</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/customer-facilities/list*')) ? 'active' : '' }}"><a href="{{ route('admin.customerFacilities.list') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Customer Facilities List">List</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/customer-facilities/add*')) ? 'active' : '' }}"><a href="{{ route('admin.customerFacilities.add') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Customer Facilities Add">Add</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ (request()->is('admin/payment-types*')) ? 'sidebar-group-active open' : '' }}"><a href="#"><i class="feather icon-credit-card"></i><span class="menu-title" data-i18n="Payment Types">Payment Types</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/payment-types/list*')) ? 'active' : '' }}"><a href="{{ route('admin.paymentTypes.list') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Payment Types List">List</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/payment-types/add*')) ? 'active' : '' }}"><a href="{{ route('admin.paymentTypes.add') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Payment Types Add">Add</span></a>
                    </li>
                </ul>
            </li>
            @endif
            <li class=" nav-item {{ (request()->is('admin/settings*')) ? 'active' : '' }}"><a href="{{ route('admin.settings') }}"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Todo">Settings</span></a>
            </li>
        </ul>
    </div>

