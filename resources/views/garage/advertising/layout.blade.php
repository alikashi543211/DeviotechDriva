@extends('garage.layouts.master')
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-3">
            <div class="page-heading">
                <h3 class="float-left">Garage Advertising</h3>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <span class="feather-icon select-none relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home h-5 w-5 mb-1 stroke-current text-primary">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        @if (request()->is('garage/advertising'))
                            <li class="breadcrumb-item active">Garage Advertising</li>
                        @else
                            <li class="breadcrumb-item"><a href="#">Garage Advertising</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        @endif
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    @yield('advertising-navigation')
    @yield('advertising-content')
</div>
@endsection
