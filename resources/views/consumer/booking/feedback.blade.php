@extends('consumer.layouts.master')
@section('title', 'Feedback')
@section('css')  
    <style>
        .invalid_error
        {
            font-size: smaller;
            color: #EA5455;
            font-weight: bolder;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/star_rating.css')}}">
@endsection
@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-6 col-sm-6 mb-3">
            <div class="page-heading">
                <h3>Feedback To Garage</h3>
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
                            <form action="{{route('consumer.booking.save_feedback')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="consumer_profile_id" value="{{consumer()->id}}">
                                <input type="hidden" name="garage_profile_id" value="{{$booking->garage_profile_info->id}}">
                                <input type="hidden" name="booking_id" value="{{request()->booking}}">
                                <div class="row">
                                    <div class="col-12 pl-0">
                                        <div class="rate @error('rating') is-invalid @enderror">
                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rating" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div><br>
                                        
                                    </div>
                                    <div class="col-12">
                                        @if($errors->has('rating'))
                                            <div class="invalid_error">{{ $errors->first('rating') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-12 pt-1">
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

