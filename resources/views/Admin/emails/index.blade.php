@extends('Admin.layouts.master')
@section('title', 'Emails')
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="row">
                <div class="col-md-8 col-sm-12 mb-3">
                    <div class="page-heading">
                        <h3>Emails</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Search name, email, phone etc">
                        <div class="input-group-append">
                          <button type="button"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-tabs-components">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card overflow-hidden">
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" aria-controls="all" role="tab" aria-selected="true">All</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="consumers-tab" data-toggle="tab" href="#consumers" aria-controls="consumers" role="tab" aria-selected="false">Consumers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="garages-tab" data-toggle="tab" href="#garages" aria-controls="garages" role="tab" aria-selected="false">Garages</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="all" aria-labelledby="all-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body card-dashboard">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-12">
                                                                        <h5>Another Email subject</h5>
                                                                        <small class="small-text">Edited On: 01 May, 2020 by Admin</small>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="dropdown dropleft float-right">
                                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <div class="media">
                                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                                        <div class="media-body">Edit</div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body card-dashboard">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-12">
                                                                        <h5>Another Email subject</h5>
                                                                        <small class="small-text">Edited On: 01 May, 2020 by Admin</small>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="dropdown dropleft float-right">
                                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <div class="media">
                                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                                        <div class="media-body">Edit</div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="consumers" aria-labelledby="consumers-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body card-dashboard">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-12">
                                                                        <h5>Another Email subject</h5>
                                                                        <small class="small-text">Edited On: 01 May, 2020 by Admin</small>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="dropdown dropleft float-right">
                                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <div class="media">
                                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                                        <div class="media-body">Edit</div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body card-dashboard">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-12">
                                                                        <h5>Another Email subject</h5>
                                                                        <small class="small-text">Edited On: 01 May, 2020 by Admin</small>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="dropdown dropleft float-right">
                                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <div class="media">
                                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                                        <div class="media-body">Edit</div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body card-dashboard">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-12">
                                                                        <h5>Another Email subject</h5>
                                                                        <small class="small-text">Edited On: 01 May, 2020 by Admin</small>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="dropdown dropleft float-right">
                                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <div class="media">
                                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                                        <div class="media-body">Edit</div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="garages" aria-labelledby="garages-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body card-dashboard">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-12">
                                                                        <h5>Another Email subject</h5>
                                                                        <small class="small-text">Edited On: 01 May, 2020 by Admin</small>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="dropdown dropleft float-right">
                                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <div class="media">
                                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                                        <div class="media-body">Edit</div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body card-dashboard">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-12">
                                                                        <h5>Another Email subject</h5>
                                                                        <small class="small-text">Edited On: 01 May, 2020 by Admin</small>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="dropdown dropleft float-right">
                                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <div class="media">
                                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                                        <div class="media-body">Edit</div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body card-dashboard">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-12">
                                                                        <h5>Another Email subject</h5>
                                                                        <small class="small-text">Edited On: 01 May, 2020 by Admin</small>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="dropdown dropleft float-right">
                                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <div class="media">
                                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                                        <div class="media-body">Edit</div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body card-dashboard">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-12">
                                                                        <h5>Another Email subject</h5>
                                                                        <small class="small-text">Edited On: 01 May, 2020 by Admin</small>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="dropdown dropleft float-right">
                                                                            <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <div class="media">
                                                                                        <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                                        <div class="media-body">Edit</div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

@endsection

