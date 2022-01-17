@extends('Admin.layouts.master')
@section('title', 'Add Payment Type')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-3">
                    <div class="page-heading">
                        <h3 class="">Add Payment Type</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="users-edit">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">
                            Add Payment Type
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.paymentTypes.save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="name">Enter Type Name</label>
                                                <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="name">Type Image</label>
                                                <input type="file" class="form-control" name="image" id="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                            Save changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
