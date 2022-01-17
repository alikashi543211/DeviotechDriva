@extends('consumer.layouts.master')
@section('title','Invoice')
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-8 col-sm-12 mb-3">
            <div class="page-heading">
                <h3 class="float-left">Invoice</h3>
                {{-- <div class="breadcrumb-wrapper col-12">
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.booking') }}">Booking</a>
                        </li>
                        <li class="breadcrumb-item active">Invoice
                        </li>
                    </ol>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section class="invoice-print mb-1">
        <div class="row">

            <fieldset class="col-12 col-md-5 mb-1 mb-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Email" aria-describedby="button-addon2">
                    <div class="input-group-append" id="button-addon2">
                        <button class="btn btn-outline-primary" type="button">Send Invoice</button>
                    </div>
                </div>
            </fieldset>
            <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
                <button class="btn btn-primary btn-print mb-1 mb-md-0"> <i class="feather icon-file-text"></i> Print</button>
                <button class="btn btn-outline-primary  ml-0 ml-md-1"> <i class="feather icon-download"></i> Download</button>
            </div>
        </div>
    </section>
    <section class="card invoice-page">
        <div id="invoice-template" class="card-body">
            <!-- Invoice Company Details -->
            <div id="invoice-company-details" class="row">
                <div class="col-sm-6 col-12 text-left pt-1">
                    <div class="media pt-1">
                        <img src="{{ asset('assets/app-assets/images/logo/driva-logo.png') }}" width="160" alt="">
                    </div>
                </div>
                <div class="col-sm-6 col-12 text-right">
                    <h1>Invoice</h1>
                    <div class="invoice-details mt-2">
                        <h6>INVOICE NO.</h6>
                        <p>001/2019</p>
                        <h6 class="mt-2">INVOICE DATE</h6>
                        <p>10 Dec 2018</p>
                    </div>
                </div>
            </div>
            <!--/ Invoice Company Details -->

            <!-- Invoice Recipient Details -->
            <div id="invoice-customer-details" class="row pt-2">
                <div class="col-sm-6 col-12 text-left">
                    <h5>Recipient</h5>
                    <div class="recipient-info my-2">
                        <p>Peter Stark</p>
                        <p>8577 West West Drive</p>
                        <p>Holbrook, NY</p>
                        <p>90001</p>
                    </div>
                    <div class="recipient-contact pb-2">
                        <p>
                            <i class="feather icon-mail"></i>
                            peter@mail.com
                        </p>
                        <p>
                            <i class="feather icon-phone"></i>
                            +91 988 888 8888
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-12 text-right">
                    <h5>Microsion Technologies Pvt. Ltd.</h5>
                    <div class="company-info my-2">
                        <p>9 N. Sherwood Court</p>
                        <p>Elyria, OH</p>
                        <p>94203</p>
                    </div>
                    <div class="company-contact">
                        <p>
                            <i class="feather icon-mail"></i>
                            hello@pixinvent.net
                        </p>
                        <p>
                            <i class="feather icon-phone"></i>
                            +91 999 999 9999
                        </p>
                    </div>
                </div>
            </div>
            <!--/ Invoice Recipient Details -->

            <!-- Invoice Items Details -->
            <div id="invoice-items-details" class="pt-1 invoice-items-table">
                <div class="row">
                    <div class="table-responsive col-12">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>TASK DESCRIPTION</th>
                                    <th>HOURS</th>
                                    <th>RATE</th>
                                    <th>AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Website Redesign</td>
                                    <td>60</td>
                                    <td>15 USD</td>
                                    <td>90000 USD</td>
                                </tr>
                                <tr>
                                    <td>Newsletter template design</td>
                                    <td>20</td>
                                    <td>12 USD</td>
                                    <td>24000 USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="invoice-total-details" class="invoice-total-table">
                <div class="row">
                    <div class="col-7 offset-5">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>SUBTOTAL</th>
                                        <td>114000 USD</td>
                                    </tr>
                                    <tr>
                                        <th>DISCOUNT (5%)</th>
                                        <td>5700 USD</td>
                                    </tr>
                                    <tr>
                                        <th>TOTAL</th>
                                        <td>108300 USD</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoice Footer -->
            <div id="invoice-footer" class="text-right pt-3">
                <p>Transfer the amounts to the business amount below. Please include invoice number on your check.
                    <p class="bank-details mb-0">
                        <span class="mr-4">BANK: <strong>FTSBUS33</strong></span>
                        <span>IBAN: <strong>G882-1111-2222-3333</strong></span>
                    </p>
            </div>
            <!--/ Invoice Footer -->

        </div>
    </section>
</div>
@endsection
