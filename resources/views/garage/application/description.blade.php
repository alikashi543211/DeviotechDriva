@extends('garage.application.layout')

@section('title','Garage account application – Driva')

@section('application-content')

<style type="text/css">
    .grey-bg{
      background-color: #727070 !important;
        color: #FFFFFF !important;
        padding: 0.9rem 3rem;
    }
    .grey-bg:hover {
        border-color: #727070 !important;
        color: #FFFFFF !important;
        box-shadow: 0 8px 25px -8px #727070;
    }
    .btn-save {
        padding: 0.9rem 4rem;
    }
    .desheading:after {
        content:url(images/quotemarks.png);
    }
    .info-icon{
        font-size: 1rem;
        cursor: pointer;
    }
</style>

    <div class="row mt-2 mb-2">
        <div class="col-12">
            <h6>Please describe your garage business</h6>
        </div>
    </div>

    <form method="post" action="{{ route('garage.application.description') }}" class="validate-form">
        @csrf
        <div class="row mt-4">
            <div class="col-12 mb-1">
                <h5>SERVICES
                    <label class="info-icon" rel="txtTooltip" title="Select the motor services that the garage provides"
                    data-toggle="tooltip" data-placement="bottom"><i class="fa fa-info-circle"></i></label>
                </h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-12 mb-2">
                            @foreach ($services as $key => $s)
                                <label for="{{ str_slug($s->name) }}" class="profile-boxes services text-center {{ count($selected_service) > 0 ? in_array($s->id, $selected_service) ? 'active' : '' : '' }}">
                                    <div class="inner-profile-boxes">
                                        <img src="{{ asset($s->image) }}" class="img-fluid" alt="{{ $s->name }}">
                                        <h6>{{ $s->name }}</h6>
                                    </div>
                                </label>
                                <input type="checkbox" name="services[]" class="profile-boxes-check"
                                    value="{{ $s->id }}"
                                    id="{{ str_slug($s->name) }}"
                                    {{ count($selected_service) > 0 ? in_array($s->id, $selected_service) ? 'checked' : '' : '' }}>
                            @endforeach

                        </div>
                        <div class="error-div col-12">
                            @error('services')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 mb-1">
                <h5>DESCRIPTION
                    <label class="info-icon" rel="txtTooltip" title="Enter a description that applies to the services and the garage"
                    data-toggle="tooltip" data-placement="bottom"><i class="fa fa-info-circle"></i></label>
                </h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-12">
                            <textarea data-length="20" class="form-control char-textarea" id="textarea-counter" rows="5" name="description">{{ garage()->description ?? '' }}</textarea>
                            <label for="textarea-counter"></label>
                            <small class="counter-value float-right"><span class="char-count">{{ garage()->description ? strlen(garage()->description) : 0 }}</span> / 2500 </small>
                        </div>
                        <div class="error-div col-12">
                            @error('description')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 mb-1">
                <h5>CUSTOMER FACILITIES
                    <label class="info-icon" rel="txtTooltip" title="Make potential customers aware of the customer facilities available "
                    data-toggle="tooltip" data-placement="bottom"><i class="fa fa-info-circle"></i></label>
                </h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-12 mb-2">
                            @foreach ($customer_facilities as $cf)
                                <label for="{{ str_slug($cf->name) }}" class="profile-boxes customer-facilities text-center {{ count($selected_facilities) > 0 ? in_array($cf->id, $selected_facilities) ? 'active' : '' : '' }}">
                                    <div class="inner-profile-boxes">
                                        <img src="{{ asset($cf->image) }}" class="img-fluid" alt="{{ $cf->name }}">
                                        <h6>{{ $cf->name }}</h6>
                                    </div>
                                </label>
                                <input type="checkbox" name="customer_facilities[]" class="profile-boxes-check"
                                    value="{{ $cf->id }}"
                                    id="{{ str_slug($cf->name) }}"
                                    {{ count($selected_facilities) > 0 ? in_array($cf->id, $selected_facilities) ? 'checked' : '' : '' }}>
                            @endforeach
                        </div>
                        <div class="error-div col-12">
                            @error('customer_facilities')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 mb-1">
                <h5>KEYWORDS
                    <label class="info-icon" rel="txtTooltip" title="Make your profile searchable with keywords relevant to the garage. Type a keyword and hit Enter to add a keyword"
                    data-toggle="tooltip" data-placement="bottom"><i class="fa fa-info-circle"></i></label>
                </h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-12">
                            <fieldset class="form-label-group form-group position-relative has-icon-left">
                                <input type="text" class="form-control required"
                                    value="{{ count($selected_keywords) > 0 ? implode(",", $selected_keywords) : '' }}"
                                    name="keywords" style="width: auto !important; height: auto !important; padding-left: 2.5rem;" id="keywords">
                                <div class="form-control-position">
                                    <i class="feather icon-tag"></i>
                                </div>
                            </fieldset>
                        </div>
                        <div class="error-div col-12">
                            @error('keywords')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 mb-1">
                <h5>ACCEPTED PAYMENTS
                    <label class="info-icon" rel="txtTooltip" title="Make potential customers aware of the accepted payments available"
                    data-toggle="tooltip" data-placement="bottom"><i class="fa fa-info-circle"></i></label>
                </h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-12 mb-2">
                            @foreach ($payment_types as $pt)
                                <label for="{{ str_slug($pt->name) }}" class="profile-boxes customer-facilities text-center {{ count($selected_payment) > 0 ? in_array($pt->id, $selected_payment) ? 'active' : '' : '' }}">
                                    <div class="inner-profile-boxes">
                                        <img src="{{ asset($pt->image) }}" class="img-fluid" alt="{{ $pt->name }}">
                                        <h6>{{ $pt->name }}</h6>
                                    </div>
                                </label>
                                <input type="checkbox" name="payment_types[]" class="profile-boxes-check"
                                    value="{{ $pt->id }}"
                                    id="{{ str_slug($pt->name) }}"
                                    {{ count($selected_payment) > 0 ? in_array($pt->id, $selected_payment) ? 'checked' : '' : '' }}>
                            @endforeach
                        </div>
                        <div class="error-div col-12">
                            @error('payment_types')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <a href="{{ route('garage.application.contact_info') }}" class="btn btn-light grey-bg mr-1 mb-1 waves-effect waves-light">Previous</a>
                <button type="submit" class="btn btn-save btn-primary mr-1 mb-1 waves-effect waves-light">Next</button>
            </div>
        </div>
    </form>
@endsection
@section('js')
<script>
    function checkChecked(name) {
        var anyBoxesChecked = false;
        $('[name="'+name+'[]"]').each(function() {
            if ($(this).is(":checked")) {
                anyBoxesChecked = true;
            }
        });

        if (anyBoxesChecked == false) {
            return false;
        }
    }
    var valid = false;

    $(".validate-form").validate({
        ignore: [],
        rules: {
            'services[]': {
                required: true
            },
            'customer_facilities[]': {
                required: true
            },
            'payment_types[]': {
                required: true
            },
            description: {
                required: true,
                minlength: 100,
            },
            keywords: {
                required: true,
            },
        },
        messages: {
            'services[]': {
                required: 'Select the services the garage provides',
            },
            'customer_facilities[]': {
                required: 'Select the customer facilities available at the garage',
            },
            'payment_types[]': {
                required: 'Select the accepted payments',
            },
            description: {
                required: 'Enter a description of the garage',
                minlength: 'Description must be at least 100 characters.'
            },
            keywords: {
                required: 'Enter searchable keywords that relate to your garage',
            },
        },
        unhighlight: function (element) {
            $(element).closest('.row').find('.error-div').html('');
        },
        errorPlacement: function(error, element) {
            console.log(error);
            // $(element).addClass('is-invalid');
            $(element).closest('.row').find('.error-div').html('<strong class="text-danger">'+error.html()+'</strong>');
        }
    });
</script>
@endsection
