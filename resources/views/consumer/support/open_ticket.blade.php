@extends("consumer.support.layout.master")
@section("main-content")
<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h5>Open a Ticket</h5>
        </div>
        <div class="card-body">
            <div class="card-content">
                <form action="{{ route('consumer.save_ticket') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                       {{-- <div class="col-6">
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
                        </div> --}}
                        <div class="col-6">
                            <div class="form-group has-float-label">
                                <input type="text" class="form-control required @error('name') is-invalid @enderror" id="name" value="{{auth()->user()->name}}" placeholder="e.g. Oil/oil filter change" name="name" autocomplete="off" readonly>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="name">Full Name</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-float-label">
                                <input type="email" class="form-control required @error('email') is-invalid @enderror" id="email" value="{{auth()->user()->email}}" placeholder="e.g. Oil/oil filter change" name="email" autocomplete="off" readonly>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="email">Email Address</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group has-float-label">
                                <input type="text" class="form-control required @error('subject') is-invalid @enderror" id="subject" value="" name="subject" autocomplete="off">
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="subject">Subject</label>

                            </div>
                        </div>                        
                        <div class="col-12">
                            <textarea data-length="20" class="form-control char-textarea" placeholder="Message" id="textarea-counter" rows="5" name="description"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="textarea-counter"></label>
                            <small class="counter-value float-right"><span class="char-count">0</span> / 2500 </small>
                        </div>

                        <div class="col-12">
                            <div class="form-group has-float-label">
                                <input type="file" class="form-control required" id="images" value="" placeholder="e.g. Oil/oil filter change" name="images[]" autocomplete="off" multiple>
                                <label for="images">Attachments</label>
                            </div>
                        </div>

                        <div class="col-12">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}

                            <input type="hidden" id="g-recaptcha-response" class="form-control @error('g-recaptcha-response') is-invalid @enderror" name="">
                            @error('g-recaptcha-response')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
@endsection
