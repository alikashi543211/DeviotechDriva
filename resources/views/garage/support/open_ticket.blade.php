@extends('garage.layouts.master')
@section('title','Support')
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="page-heading">
                <h3 class="float-left">Support</h3>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('garage.dashboard') }}">
                                <span class="feather-icon select-none relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home h-5 w-5 mb-1 stroke-current text-primary">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Open Ticket
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <div class="row">
        <div class="col-12">
            <h5>Open Ticket</h5>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-content">
                <form action="{{ route('garage.save_ticket') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-float-label">
                                <div class="controls">
                                    <select id="enquiry_type_id" class="form-control" name="enquiry_type_id" required>
                                        <option value="" selected disabled>Select Enquiry Type</option>
                                        @foreach ($enquiry_types as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="enquiry_type_id">Enquiry Type</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-float-label">
                                <input type="text" class="form-control required" id="subject" value="" placeholder="e.g. Oil/oil filter change" name="subject" autocomplete="off">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-float-label">
                                <div class="controls">
                                    <select id="priority" class="form-control" name="priority" required>
                                        <option value="" selected disabled>Select Priority</option>
                                        <option value="high">High</option>
                                        <option value="medium">Medium</option>
                                        <option value="low">Low</option>
                                    </select>
                                    <label for="priority">Priority</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <textarea data-length="20" class="form-control char-textarea" placeholder="Description" id="textarea-counter" rows="5" name="description"></textarea>
                            <label for="textarea-counter"></label>
                            <small class="counter-value float-right"><span class="char-count">0</span> / 2500 </small>
                        </div>
                    </div>
                    <div class="mt-4"></div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
