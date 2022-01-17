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
</style>
    <div class="row mt-2 mb-2">
        <div class="col-12">
            <h6>Please specify your working hours</h6>
        </div>
    </div>
    <form method="post" action="{{ route('garage.application.working_hours') }}">
        @csrf
        <div class="row mt-4">
            <div class="col-12 mb-1">
                <h5>7-DAY WEEK SCHEDULE</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col-4">
                            <div style="margin-bottom: 2rem;"></div>
                            <div style="margin-bottom:2.3rem;"><p>Monday</p></div>
                            <div style="margin-bottom:2.3rem;"><p>Tuesday</p></div>
                            <div style="margin-bottom:2.3rem;"><p>Wednesday</p></div>
                            <div style="margin-bottom:2.3rem;"><p>Thursday</p></div>
                            <div style="margin-bottom:2.3rem;"><p>Friday</p></div>
                            <div style="margin-bottom:2.3rem;"><p>Saturday</p></div>
                            <div style="margin-bottom:2.3rem;"><p>Sunday</p></div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="mb-1"><h6>Opened/Closed</h6></div>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                                <input type="checkbox" class="custom-control-input" value="1" name="is_closed[0]" id="is_closed_monday" {{ count($is_closed) > 0 ? $is_closed[0] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="is_closed_monday"></label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                                <input type="checkbox" class="custom-control-input" value="1" name="is_closed[1]" id="is_closed_tuesday" {{ count($is_closed) > 0 ? $is_closed[1] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="is_closed_tuesday"></label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                                <input type="checkbox" class="custom-control-input" value="1" name="is_closed[2]" id="is_closed_wednesday" {{ count($is_closed) > 0 ? $is_closed[2] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="is_closed_wednesday"></label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                                <input type="checkbox" class="custom-control-input" value="1" name="is_closed[3]" id="is_closed_thursday" {{ count($is_closed) > 0 ? $is_closed[3] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="is_closed_thursday"></label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                                <input type="checkbox" class="custom-control-input" value="1" name="is_closed[4]" id="is_closed_friday" {{ count($is_closed) > 0 ? $is_closed[4] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="is_closed_friday"></label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                                <input type="checkbox" class="custom-control-input" value="1" name="is_closed[5]" id="is_closed_saturday" {{ count($is_closed) > 0 ? $is_closed[5] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="is_closed_saturday"></label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                                <input type="checkbox" class="custom-control-input" value="1" name="is_closed[6]" id="is_closed_sunday" {{ count($is_closed) > 0 ? $is_closed[6] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="is_closed_sunday"></label>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="mb-1"><h6>24h</h6></div>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;">
                                <input type="checkbox" class="custom-control-input" name="is_24[0]" value="1" id="24h_monday" {{ count($is_24h) > 0 ? $is_24h[0] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="24h_monday"></label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;" >
                                <input type="checkbox" class="custom-control-input" name="is_24[1]" value="1" id="24h_tuesday" {{ count($is_24h) > 0 ? $is_24h[1] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="24h_tuesday"></label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;" >
                                <input type="checkbox" class="custom-control-input" name="is_24[2]" value="1" id="24h_wednesday" {{ count($is_24h) > 0 ? $is_24h[2] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="24h_wednesday"></label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;" >
                                <input type="checkbox" class="custom-control-input" name="is_24[3]" value="1" id="24h_thursday" {{ count($is_24h) > 0 ? $is_24h[3] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="24h_thursday"></label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;" >
                                <input type="checkbox" class="custom-control-input" name="is_24[4]" value="1" id="24h_friday" {{ count($is_24h) > 0 ? $is_24h[4] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="24h_friday"></label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;" >
                                <input type="checkbox" class="custom-control-input" name="is_24[5]" value="1" id="24h_saturday" {{ count($is_24h) > 0 ? $is_24h[5] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="24h_saturday"></label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch custom-switch-danger" style="margin-bottom: 10px;" >
                                <input type="checkbox" class="custom-control-input" name="is_24[6]" value="1" id="24h_sunday" {{ count($is_24h) > 0 ? $is_24h[6] == 1 ? 'checked' : '' : '' }}>
                                <label class="custom-control-label" for="24h_sunday"></label>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="mb-1"><h6>From</h6></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="opening_time[0]" value="{{ count($opening_time) > 0 ? $opening_time[0] : '' }}"></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="opening_time[1]" value="{{ count($opening_time) > 0 ? $opening_time[1] : '' }}"></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="opening_time[2]" value="{{ count($opening_time) > 0 ? $opening_time[2] : '' }}"></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="opening_time[3]" value="{{ count($opening_time) > 0 ? $opening_time[3] : '' }}"></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="opening_time[4]" value="{{ count($opening_time) > 0 ? $opening_time[4] : '' }}"></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="opening_time[5]" value="{{ count($opening_time) > 0 ? $opening_time[5] : '' }}"></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="opening_time[6]" value="{{ count($opening_time) > 0 ? $opening_time[6] : '' }}"></div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="mb-1"><h6>To</h6></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="closing_time[0]" value="{{ count($closing_time) > 0 ? $closing_time[0] : '' }}"></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="closing_time[1]" value="{{ count($closing_time) > 0 ? $closing_time[1] : '' }}"></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="closing_time[2]" value="{{ count($closing_time) > 0 ? $closing_time[2] : '' }}"></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="closing_time[3]" value="{{ count($closing_time) > 0 ? $closing_time[3] : '' }}"></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="closing_time[4]" value="{{ count($closing_time) > 0 ? $closing_time[4] : '' }}"></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="closing_time[5]" value="{{ count($closing_time) > 0 ? $closing_time[5] : '' }}"></div>
                            <div class="mb-1"><input type='text' class="form-control datetimepicker text-center" name="closing_time[6]" value="{{ count($closing_time) > 0 ? $closing_time[6] : '' }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 text-center">
                <a href="{{ route('garage.application.description') }}" class="btn btn-light grey-bg mr-1 mb-1 waves-effect waves-light">Previous</a>
                <button type="submit" class="btn btn-save btn-primary mr-1 mb-1 waves-effect waves-light">Next</button>
            </div>
        </div>
    </form>
@endsection
