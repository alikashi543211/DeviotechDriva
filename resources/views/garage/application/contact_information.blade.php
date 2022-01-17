@extends('garage.application.layout')

@section('title','Garage account application – Driva')

@section('css')
    <style>
        .pac-logo:after
            {
                content: "";
                padding: 1px 1px 1px 0;
                height: 18px;
                box-sizing: border-box;
                text-align: right;
                display: block;
                background-image: none !important;
                background-position: right;
                background-repeat: no-repeat;
                background-size: 120px 14px;
            }
    </style>
@endsection

@section('application-content')
<style type="text/css">
    .btn {
        padding: 0.9rem 4rem;
    }
</style>
    <div class="row mt-2 mb-2">
        <div class="col-12">
            <h6>Please submit your contact information</h6>
        </div>
    </div>

    <form method="post" action="{{ route('garage.application.contact_info') }}" class="validate-form">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-float-label">
                                <div class="controls">
                                    <input type="text" class="form-control @error('garage_name') is-invalid @enderror" id="garage_name" value="{{old('garage_name', garage()->name)}}" placeholder="Garage Name" name="garage_name" autocomplete="off">

                                    <label for="garage_name">Garage Name</label>
                                    <span class="invalid-feedback" role="alert">
                                        @error('garage_name')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-float-label">
                                <div class="controls">
                                    <input type="text" class="form-control searchInput @error('garage_address') is-invalid @enderror" id="spoint" value="{{old('garage_address', garage()->address)}}" placeholder="e.g. Type your garage address..." name="garage_address" autocomplete="off" runat="server">
                                    <div class="d-none api_details"></div>
                                    <label for="garage_address">Garage Address</label>
                                    <span class="invalid-feedback" role="alert">
                                        @error('garage_address')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                                <input type="hidden" id="api_garage_address" name="api_garage_address" value="{{old('api_garage_address', garage()->address)}}">
                                <input type="hidden" id="address_lat" name="address_lat" value="{{ old('address_lat', garage()->address_lat) }}">
                                <input type="hidden" id="address_long" name="address_long" value="{{ old('address_long', garage()->address_long) }}">


                                <div class="error" id="errorMessage"></div>
                                <div id="result"></div>
                                <div class="seperator" id="seperator"></div>
                                <div class="outputArea"><pre id="output" class="bg-white">{!! old('pretty_address', garage()->pretty_address) !!}</pre></div>
                                <input type="hidden" id="pretty_address" name="pretty_address" value="{{ old('pretty_address', garage()->pretty_address) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-float-label">
                                <div class="controls">
                                <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" value="{{old('website', garage()->website)}}" placeholder="e.g. www.website.com" name="website" autocomplete="off">
                                <label for="website">Website (Optional)</label>
                                <span class="invalid-feedback" role="alert">
                                    @error('website')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-float-label">
                                <div class="controls">
                                    <input type="text" class="form-control @error('contact_1') is-invalid @enderror" id="contact_1" value="{{old('contact_1', garage()->contact_1)}}" name="contact_1" autocomplete="off">
                                    <label for="contact_1">Contact Number 1</label>

                                    <span class="invalid-feedback" role="alert">
                                        @error('contact_1')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-float-label">
                                <div class="controls">
                                    <input type="text" class="form-control @error('contact_2') is-invalid @enderror" id="contact_2" value="{{old('contact_2', garage()->contact_2)}}" name="contact_2" autocomplete="off">
                                    <label for="contact_2">Contact Number 2 (Optional)</label>
                                    <span class="invalid-feedback" role="alert">
                                        @error('contact_2')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="custom-control custom-switch custom-switch-danger">
                                <label>Registered Company?</label><br>
                                <div class="mt-1"></div>
                                <input type="checkbox" class="custom-control-input" name="registered_company" {{ old('registration_number') || garage()->registration_number ? 'checked' : '' }} id="registered_company">
                                <label class="custom-control-label" for="registered_company"></label>
                            </div>
                            <div class="mt-1"></div>
                            <div class="form-group has-float-label register-input-div"  style="display: none;">
                                <div class="controls">
                                    <input type="text" class="form-control @error('registration_number') is-invalid @enderror" id="registration_number" value="{{old('registration_number', garage()->registration_number)}}" name="registration_number" placeholder=" " autocomplete="off">
                                    <label for="registration_number">Registered Number</label>
                                    <span class="invalid-feedback" role="alert">
                                        @error('registration_number')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="custom-control custom-switch custom-switch-danger vat-toggle-div" style="display: none;">
                                <label>VAT Registered?</label><br>
                                <div class="mt-1"></div>
                                <input type="checkbox" class="custom-control-input" name="vat_registered" id="vat_registered">
                                <label class="custom-control-label" for="vat_registered"></label>
                            </div>
                            <div class="mt-1"></div>
                            <div class="form-group has-float-label vat-input-div" style="display: none;">
                                <div class="controls">
                                    <input type="text" class="form-control @error('vat_registeration') is-invalid @enderror" id="vat_registeration" value="{{old('vat_registeration', garage()->vat_no)}}" name="vat_registeration" placeholder=" " autocomplete="off">
                                    <label for="vat_registeration">VAT Number</label>
                                    <span class="invalid-feedback" role="alert">
                                        @error('vat_registeration')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </span>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Next</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('application-js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script>
        if($("#registered_company").is(":checked")) {
            $('.register-input-div').slideDown();
            $('.vat-toggle-div').slideDown();
        }
        else{
            $('.register-input-div').slideUp();
            $('.vat-toggle-div').slideUp();
        }

        if($("#vat_registered").is(":checked")) {
            $('.vat-input-div').slideDown();
        }
        else{
            $('.vat-input-div').slideUp();
        }

        $(document).ready(function () {
            $('#registered_company').change(function() {
                if(this.checked) {
                    $('.register-input-div').slideDown();
                    $('.vat-toggle-div').slideDown();
                }
                else{
                    $('.register-input-div').slideUp();
                    $('.vat-toggle-div').slideUp();
                }
            });

            $('#vat_registered').change(function() {
                if(this.checked) {
                    $('.vat-input-div').slideDown();
                }
                else{
                    $('.vat-input-div').slideUp();
                }
            });
        });
    </script>

    <script>
        function showClear() {
            document.getElementById("clearButton").style.display = "block";
        }

        function clearSearch() {
            var input = document.getElementById("searchBox");
            input.value = "";
            document.getElementById("clearButton").style.display = "none";
        }

        function showError(message) {
            var error = document.getElementById("errorMessage");
            error.innerText = message;
            error.style.display = "block";

            setTimeout(function(){
                error.style.display = "none";
            }, 10000)
        }

    </script>

    <script>
        $.validator.addMethod(
            "regex",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);
            }
        );
        $(".validate-form").validate({
            rules: {
                garage_name: {
                    required: true,
                    minlength: 2,
                    maxlength: 25,
                },
                garage_address: {
                    required: true,
                },
                contact_1: {
                    required: true,
                    regex: "^[0-9]( ?[0-9]){10}( ?[0-9])?( ?[0-9])?( ?[0-9])?$",
                },
                contact_2: {
                    regex: "^[0-9]( ?[0-9]){10}( ?[0-9])?( ?[0-9])?( ?[0-9])?$",
                },
                website: {
                    regex: "^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$",
                },
                registration_number: {
                    required: "#registered_company:checked",
                    minlength: 8,
                    maxlength: 8,
                },
                vat_registeration: {
                    required: "#vat_registered:checked",
                    regex: "^[g|G][b|B][0-9]{9}$",
                },
            },
            messages: {
                garage_name: {
                    required: 'Enter the garage name',
                    minlength: 'Enter the valid garage name',
                    maxlength: 'Enter the valid garage name',
                },
                garage_address: {
                    required: 'Enter and select the garage address',
                },
                contact_1: {
                    required: 'Enter the garage contact number',
                    regex: 'Enter a valid contact number',
                },
                contact_2: {
                    regex: 'Enter a valid contact number',
                },
                website: {
                    regex: 'Enter the valid website address',
                },
                registration_number: {
                    required: 'Enter the company registration number',
                    minlength: 'Enter a valid company registration number',
                    maxlength: 'Enter a valid company registration number',
                },
                vat_registeration: {
                    required: 'Enter the VAT number',
                    regex: 'Enter a valid VAT number',
                },
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            errorPlacement: function(error, element) {
                $(element).addClass('is-invalid');
                $(element).closest('.form-group').find('.invalid-feedback').html('<strong>'+error.html()+'</strong>');
            }
        });
    </script>
    <script type="text/javascript">
        function initMap()
        {
            var api_address = '';
            var options = {
                componentRestrictions: {country: "uk"}
            };

            var spoint = document.getElementById('spoint');
            var autocomplete = new google.maps.places.Autocomplete(spoint, options);

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                // console.log(place.adr_address);
                $(".api_details").html(place.adr_address);
                api_locality = $(".api_details").find('.locality').html();
                
                address = $('#spoint').val();
                new_address = address.replace(', UK','');
                if(typeof api_locality !== 'undefined')
                {
                    new_address = new_address.replace(api_locality, api_locality+",");
                }
                var lat = place.geometry.location.lat();
                var lon = place.geometry.location.lng();
                $('#address_lat').val(lat);$('#address_long').val(lon);
                new_address = new_address.replace(/,\s*$/, "");
                $("#spoint").val(new_address);
            });
        }

        $(document).ready(function(){
          google.load("maps", "3.exp", {callback: initMap, other_params:'key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&libraries=places,drawing'});
        });
    </script>
@endsection
