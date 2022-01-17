<div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>{{$ticket->subject}}</h2>
                                                                    </div>
                                <div class="col-12 mt-3">
                                    <p>{{$ticket->description}}</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="accordion" id="accordionExample" data-toggle-hover="true">
                                        <div class="collapse-margin">
                                            <div class="card-header collapsed" id="headingOne" data-toggle="collapse" role="button" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                <span class="lead collapse-title">
                                                    <i class="fa fa-pencil"></i> <strong>Reply Now</strong>
                                                </span>
                                            </div>

                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                <div class="card-body">
                                                    <form action="http://localhost:8000/consumer/support/save-comment" method="POST">
                                                        <input type="hidden" name="_token" value="4VPE5woq89fhlMIEfwWkEnnq7BML6Rfhis7jjfdz">                                                        <input type="hidden" name="ticket_id" id="ticket_id" value="52">
                                                        <textarea data-length="20" class="form-control char-textarea" id="textarea-counter" rows="5" name="comment"></textarea>
                                                        <label for="textarea-counter"></label>
                                                        <small class="counter-value float-right"><span class="char-count"></span> / 2500 </small>

                                                        <div class="row">
                                                            <div class="col-12 text-center">
                                                                <button type="submit" class="btn btn-save btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                            </div>
                        </div>
                    </div>
                </div>