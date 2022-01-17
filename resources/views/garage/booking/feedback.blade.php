@extends('garage.layouts.master')
@section('title', 'Feedback')
@section('css')
    <style>
        .invalid_error
        {
            font-size: smaller;
            color: #EA5455;
            font-weight: bolder;
        }
        .rating-stars {
    border: none;
    float: left;
}

.rating-stars > input {
    display: none;
}
.rating-stars > label:before {
    margin: 5px;
    font-size: 1.75em;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005";
}

.rating-stars > .half:before {
    content: "\f089";
    position: absolute;
}

.rating-stars > label {
    color: #ddd;
    float: right;
    padding-left: 0px;
    cursor: pointer;
}

.rating-stars > input:checked ~ label, /* show gold star when clicked */
.rating-stars:not(:checked) > label:hover, /* hover current star */
.rating-stars:not(:checked) > label:hover ~ label {
    color: #FFD700;
} /* hover previous stars in list */

.rating-stars > input:checked + label:hover, /* hover current star when changing rating */
.rating-stars > input:checked ~ label:hover,
.rating-stars > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating-stars > input:checked ~ label:hover ~ label {
    color: #FFED85;
}
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/star_rating.css')}}">
@endsection
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-6 col-sm-6 mb-3">
            <div class="page-heading">
                <h3>Feedback To Consumer</h3>
            </div>
        </div>

    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
        <div class="row">

            <div class="col-12">

                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <form action="{{route('garage.booking.save_feedback')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="consumer_profile_id" value="{{$booking->consumer_profile_info->id}}">
                                <input type="hidden" name="garage_profile_id" value="{{garage()->id}}">
                                <input type="hidden" name="booking_id" value="{{request()->booking}}">
                                <div class="row">
                                    <div class="col-12 pt-1">
                                        <div class="clearfix">
                                            <div class="form-group rating-stars">
                                                <input type="radio" id="star5" name="rating" value="5"/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                <input type="radio" id="star4half" name="rating" value="4.5"/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                <input type="radio" id="star4" name="rating" value="4"/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                <input type="radio" id="star3half" name="rating" value="3.5"/><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                <input type="radio" id="star3" name="rating" value="3"/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                <input type="radio" id="star2half" name="rating" value="2.5"/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                <input type="radio" id="star2" name="rating" value="2"/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                <input type="radio" id="star1half" name="rating" value="1.5"/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                <input type="radio" id="star1" name="rating" value="1"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                            </div>
                                        </div>

                                        <div class="form-group has-float-label">
                                            <div class="controls">
                                                <textarea class="form-control required @error('review') is-invalid @enderror" name="review" value="" placeholder="Leave your review here.." id="first-name" autocomplete="off"></textarea>
                                                <label for="first_name">Review</label>
                                                @error('review')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@section('js')

@endsection

