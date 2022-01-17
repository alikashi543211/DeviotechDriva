@extends('garage.settings.layout')
@section('title','Company Profile')
@section('page-heading','Company Profile')
@section('settings-content')
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="contact_info" data-toggle="tab" href="#contact_infoTab" aria-controls="contact_info" role="tab" aria-selected="true">Contact Info</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="availablity_hours" data-toggle="tab" href="#availablity_hoursTab" aria-controls="availablity_hours" role="tab" aria-selected="false">Availablity Hours</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="business_profile" data-toggle="tab" href="#business_profileTab" aria-controls="business_profile" role="tab" aria-selected="false">Business Profile</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="contact_infoTab" aria-labelledby="contact_info-tab" role="tabpanel">
       <form action="" method="">
           @csrf
            <div class="row">
                <div class="col-12">
                    <div class="media">
                        <a href="javascript: void(0);">
                            <img id="image-preview" src="{{asset('/assets/app-assets/images/portrait/small/avatar-s-12.jpg')}}" class="rounded mr-75" alt="profile image" height="64" width="64">
                        </a>
                        <div class="media-body mt-75">
                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                <input type="file" id="account-upload" name="file" hidden>
                            </div>
                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max size of 800kB</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="garage_name">
                            Garage Name
                        </label>
                        <input type="text" class="form-control required" id="garage_name" value="a" name="garage_name">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact_number_1">
                            Contact Number 1
                        </label>
                        <input type="text" class="form-control required" id="contact_number_1" value="v" name="contact_number_1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact_number_2">
                            Contact Number 2 (Optional)
                        </label>
                        <input type="text" class="form-control required" id="contact_number_2" value="e" name="contact_number_2">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="uk_postcode">
                            UK Postcode
                        </label>
                        <input type="text" class="form-control required" id="uk_postcode" value="v" name="uk_postcode">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="website">
                            Website (Optional)
                        </label>
                        <input type="text" class="form-control" id="website" name="website">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="custom-control custom-switch custom-switch-danger">
                        <label>Registered Company?</label><br>
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="registered_company">
                        <label class="custom-control-label" for="registered_company"></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="registered_number">
                            Registered Number
                        </label>
                        <input type="text" class="form-control" id="registered_number" name="registered_number">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="custom-control custom-switch custom-switch-danger">
                        <label>VAT Registered?</label><br>
                        <input type="checkbox" class="custom-control-input" name="vat_registered" id="vat_registered">
                        <label class="custom-control-label" for="vat_registered"></label>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Save Changes</button>
                </div>
            </div>
       </form>
    </div>
    <div class="tab-pane" id="availablity_hoursTab" aria-labelledby="availablity_hours-tab" role="tabpanel">
       <form action="" method="">
           @csrf
            <div class="row">
                <div class="col-3">
                    <div style="margin-bottom: 2rem;"></div>
                    <div style="margin-bottom:2.3rem;"><p>Monday</p></div>
                    <div style="margin-bottom:2.3rem;"><p>Tuesday</p></div>
                    <div style="margin-bottom:2.3rem;"><p>Wednesday</p></div>
                    <div style="margin-bottom:2.3rem;"><p>Thursday</p></div>
                    <div style="margin-bottom:2.3rem;"><p>Friday</p></div>
                    <div style="margin-bottom:2.3rem;"><p>Saturday</p></div>
                    <div style="margin-bottom:2.3rem;"><p>Sunday</p></div>
                </div>
                <div class="col-3 text-center">
                    <div class="mb-1"><h6>Closed/Opened</h6></div>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="is_closed_monday">
                        <label class="custom-control-label" for="is_closed_monday"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="is_closed_tuesday">
                        <label class="custom-control-label" for="is_closed_tuesday"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="is_closed_wednesday">
                        <label class="custom-control-label" for="is_closed_wednesday"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="is_closed_thursday">
                        <label class="custom-control-label" for="is_closed_thursday"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="is_closed_friday">
                        <label class="custom-control-label" for="is_closed_friday"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="is_closed_saturday">
                        <label class="custom-control-label" for="is_closed_saturday"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="is_closed_sunday">
                        <label class="custom-control-label" for="is_closed_sunday"></label>
                    </div>
                </div>
                <div class="col-2 text-center">
                    <div class="mb-1"><h6>24h</h6></div>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="24h_monday">
                        <label class="custom-control-label" for="24h_monday"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="24h_tuesday">
                        <label class="custom-control-label" for="24h_tuesday"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="24h_wednesday">
                        <label class="custom-control-label" for="24h_wednesday"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="24h_thursday">
                        <label class="custom-control-label" for="24h_thursday"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="24h_friday">
                        <label class="custom-control-label" for="24h_friday"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="24h_saturday">
                        <label class="custom-control-label" for="24h_saturday"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                        <input type="checkbox" class="custom-control-input" name="registered_company" id="24h_sunday">
                        <label class="custom-control-label" for="24h_sunday"></label>
                    </div>
                </div>
                <div class="col-2 text-center">
                    <div class="mb-1"><h6>From</h6></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="from" value=""></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="from" value=""></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="from" value=""></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="from" value=""></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="from" value=""></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="from" value=""></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="from" value=""></div>
                </div>
                <div class="col-2 text-center">
                    <div class="mb-1"><h6>To</h6></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="to" value=""></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="to" value=""></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="to" value=""></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="to" value=""></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="to" value=""></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="to" value=""></div>
                    <div class="mb-1"><input type='text' class="form-control datetimepicker" name="to" value=""></div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Save Changes</button>
                </div>
            </div>
       </form>
    </div>
    <div class="tab-pane" id="business_profileTab" role="tabpanel" aria-labelledby="business_profile-tab" aria-expanded="false">
        <div class="row">
            <div class="col-12 mb-1">
                <h5>SERVICES</h5>
            </div>
            <div class="col-12">
                <label for="mot" class="profile-boxes services text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/MOT.svg') }}" class="img-fluid" alt="MOT">
                        <h6>MOT</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="mot">
    
                <label for="servicing" class="profile-boxes services text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/Servicing.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Servicing</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="servicing">
    
                <label for="repairs" class="profile-boxes services text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/repairs.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Repairs</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="repairs">
    
                <label for="tyres" class="profile-boxes services text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/tyre.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Tyres</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="tyres">
    
                <label for="body_work" class="profile-boxes services text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/Body-Work.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Bodywork</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="body_work">
    
                <label for="electrical" class="profile-boxes services text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/plug.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Electrical</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="electrical">
    
                <label for="recovery" class="profile-boxes services text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/recovery.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Recovery</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="recovery">
            </div>
        </div>
        <div class="mt-3"></div>
        <div class="row">
            <div class="col-12 mb-1">
                <h5>DESCRIPTION</h5>
            </div>
            <div class="col-12">
                <textarea data-length="20" class="form-control char-textarea" id="textarea-counter" rows="5" name="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni aliquid suscipit cupiditate assumenda facere reprehenderit! Voluptatem explicabo atque reprehenderit sit magni ipsa dolor minima possimus nemo, eos voluptate maiores nobis?</textarea>
                <label for="textarea-counter"></label>
                <small class="counter-value float-right"><span class="char-count">0</span> / 2500 </small>
            </div>
        </div>
        <div class="mt-3"></div>
        <div class="row">
            <div class="col-12 mb-1">
                <h5>CUSTOMER FACILITIES</h5>
            </div>
            <div class="col-12">
                <label for="waiting_area" class="profile-boxes customer-facilities text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/wating-area.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Waiting Area</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="waiting_area">
    
                <label for="viewing_area" class="profile-boxes customer-facilities text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/viewing-area.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Viewing Area</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="viewing_area">
    
                <label for="wifi" class="profile-boxes customer-facilities text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/WIFI.svg') }}" class="img-fluid" alt="MOT">
                        <h6>WiFi</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="wifi">
    
                <label for="restrooms" class="profile-boxes customer-facilities text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/restroom.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Restrooms</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="restrooms">
    
                <label for="refreshments" class="profile-boxes customer-facilities text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/refreshment.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Refreshments</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="refreshments">
            </div>
        </div>
        <div class="mt-3"></div>
        <div class="row">
            <div class="col-12 mb-1">
                <h5>KEYWORDS</h5>
            </div>
            <div class="col-12">
                <fieldset class="form-label-group form-group position-relative has-icon-left">
                    <input type="text" class="form-control required" value="foo,bar,baz" name="keywords" id="keywords">
                    <div class="form-control-position">
                        <i class="feather icon-tag"></i>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="mt-3"></div>
        <div class="row">
            <div class="col-12 mb-1">
                <h5>ACCEPTED PAYMENTS</h5>
            </div>
            <div class="col-12">
                <label for="cash" class="profile-boxes customer-facilities text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/cash.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Cash</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="cash">
    
                <label for="credit_card" class="profile-boxes customer-facilities text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/credit-card.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Credit Card</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="credit_card">
    
                <label for="bacs" class="profile-boxes customer-facilities text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/BACS.svg') }}" class="img-fluid" alt="MOT">
                        <h6>BACS</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="bacs">
    
                <label for="other" class="profile-boxes customer-facilities text-center">
                    <div class="inner-profile-boxes">
                        <img src="{{ asset('assets/app-assets/images/svg/other.svg') }}" class="img-fluid" alt="MOT">
                        <h6>Other</h6>
                    </div>
                </label>
                <input type="checkbox" name="service_id" class="profile-boxes-check" value="" id="other">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Save Changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('settings-js')
<script>
    // Profile Pic Preview Funstion
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview').hide();
                $('#image-preview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#account-upload").change(function() {
        readURL(this);
    });

</script>
@endsection