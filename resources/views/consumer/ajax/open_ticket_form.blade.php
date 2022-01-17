    <div class="card">
        <div class="card-header">
            <h5 class="ml-1">Open Ticket</h5>
        </div>
        <div class="card-body">
            <div class="card-content">
                <form action="{{ route('consumer.save_ticket') }}" method="POST">
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