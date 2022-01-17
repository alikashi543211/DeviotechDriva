@extends('consumer.layouts.master')

@section('title','Book Garage')
@section('css')
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
</style>
@endsection

@section('content')


<form method="post" action="{{ route('consumer.garages.save_booking') }}">
        @csrf
    <div class="row mt-2 mb-2">
        <div class="col-12">
            <div class="card collapse-icon accordion-icon-rotate">
                <div class="card-body">
                    <div class="accordion" id="accordionExample" data-toggle-hover="true">
                        <div class="collapse-margin">
                            <div class="card-header collapsed" id="headingOne" data-toggle="collapse" role="button" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span class="lead collapse-title">
                                    <strong>Select Vehicles</strong>
                                </span>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                <div class="card-body">
                                    @foreach($vehicles as $cv)
                                    <div class="row match-height my-2 select-vehicle">
                                        <div class="col-sm-3 mr-0 pr-0">
                                            <div class="card vehicle-img">
                                                <img src="{{asset($cv->image_url)}}" alt="Generic placeholder image" class="img-fluid">
                                                <div class="vehicle-no"><span>{{ $cv->vrm }}</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 ml-0 pl-0">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="row parent-row">
                                                            <div class="col-md-9">
                                                                <div class="row">
                                                                    <div class="col-md-1"></div>
                                                                    <div class="col-md-3"><p>Make </p></div>
                                                                    <div class="col-md-8"><p class="vehicle-info">{{$cv->make}}</p></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-1"></div>
                                                                    <div class="col-md-3"><p>Model</p></div>
                                                                    <div class="col-md-8"><p class="vehicle-info">{{$cv->model}}</p></div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-1"></div>
                                                                    <div class="col-md-3"><p>Engine Size</p></div>
                                                                    <div class="col-md-8"><p class="vehicle-info">{{$cv->engine_size}}</p></div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-1"></div>
                                                                    <div class="col-md-3"><p>Body Type</p></div>
                                                                    <div class="col-md-8"><p class="vehicle-info">{{$cv->body_type}}</p></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 m-auto">
                                                                <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light select-vehicle-btn" data-id="{{$cv->id}}"> Select</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="selected_vehicle_div">
            </div>
        </div>
    </div>


        <div class="row mt-4">
            <div class="col-12 mb-1">
                <h5>SERVICES</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-12">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 mb-1">
                <h5>DESCRIPTION</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-12">
                            <textarea data-length="20" class="form-control char-textarea" id="textarea-counter" rows="5" name="description"></textarea>
                            <label for="textarea-counter"></label>
                            <small class="counter-value float-right"><span class="char-count"></span> / 2500 </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" class="consumer-vehicle-id" name="consumer_vehicle_id" value="">
        <input type="hidden" name="garage_profile_id" value="{{$garage_id}}">
        <input type="hidden" name="consumer_profile_id" value="{{consumer()->id}}">
        <div class="row mt-4">
            <div class="col-5 mb-1"> </div>
            <div class="col-2 mb-1 text-center">
                <button type="submit" class="btn btn-primary btn-block mr-1 mb-1 waves-effect waves-light"> Book</button>
            </div>
            <div class="col-5 mb-1"> </div>
        </div>
    </form>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $(".select-vehicle-btn").click(function (e) {
            e.preventDefault();
            $(".select-vehicle-btn").text('Select');
            $(".select-vehicle-btn").prop("disabled", false);
            $(this).text("Selected");
            $(this).prop("disabled", true);
            $(".consumer-vehicle-id").val($(this).attr("data-id"));
            $("#headingOne").click();
            var elm = $(this).closest('.select-vehicle').clone();
            $(".selected_vehicle_div").html(elm);
        });
    });
</script>
@endsection
