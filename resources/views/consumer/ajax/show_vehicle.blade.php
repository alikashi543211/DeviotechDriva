<div class="row">
    <div class="col-12 text-center">
        <p class="font-weight-bold">Please confirm your vehicle</p>
    </div>
</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4 mb-1 text-center">
        <div class="tbl-vrm"><span>{{ $vrm }}</span></div>
    </div>
    <div class="col-4"></div>
</div>
<div class="row">
    <div class="col-6">
        <div class="row">
            <div class="col-6"><p>Make:</p></div>
            <div class="col-6"><p class="font-weight-bold">{{ $data['make'] }}</p></div>
        </div>
        <div class="row">
            <div class="col-6"><p>Model:</p></div>
            <div class="col-6"><p class="font-weight-bold">{{ $data['model'] }}</p></div>
        </div>
        <div class="row">
            <div class="col-6"><p>Engine Size:</p></div>
            <div class="col-6"><p class="font-weight-bold">{{ $data['engine_size'] }}</p></div>
        </div>
        <div class="row">
            <div class="col-6"><p>Body Type:</p></div>
            <div class="col-6"><p class="font-weight-bold">{{ $data['body_type'] }}</p></div>
        </div>
        <div class="row">
            <div class="col-6"><p>Colour:</p></div>
            <div class="col-6"><p class="font-weight-bold">{{ $data['colour'] }}</p></div>
        </div>
    </div>
    <div class="col-6">
        <div class="row">
            <div class="col-12">
            <img src="{{ $data['image_url'] }}" alt="" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <small>The colour of the vehicle image above may not be the colour of your vehicle</small>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 text-center mt-1">
        <p>Is this your vehicle?</p>
    </div>
</div>
<div class="row">
    <div class="col-6 text-right">
        <button class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light back_search">No</button>
    </div>
    <div class="col-6 text-left">
        <form action="" method="POST" id="saveVehicleForm">
            @csrf
            <input type="hidden" name="vrm" id="vrm" value="{{ $data['vrm'] }}">
            <input type="hidden" name="make" id="make" value="{{ $data['make'] }}">
            <input type="hidden" name="model" id="model" value="{{ $data['model'] }}">
            <input type="hidden" name="engine_size" id="engine_size" value="{{ $data['engine_size'] }}">
            <input type="hidden" name="body_type" id="body_type" value="{{ $data['body_type'] }}">
            <input type="hidden" name="image_url" id="image_url" value="{{ $data['image_url'] }}">
            <input type="hidden" name="colour" id="colour" value="{{ $data['colour'] }}">
            <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light save_vehicle">Yes</button>
        </form>
    </div>
</div>
