<style>
    .vehicle-number
    {
        text-align: center;
    }
    /*.form-group-phone
    {
        width: 60%;
        margin:auto;
        text-align: center;
    }*/
</style>
<form action="" method="get" id="searchFrom">
    @csrf
    <div class="row">
        <div class="col-12 text-center">
            <p class="font-weight-bold">Enter your vehicle registration number</p>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="form-group form-group-phone has-float-label">
                <input type="text" class="form-control required vehicle-number" id="registration_number" value="" name="registration_number" autocomplete="off">
                <label for="registration_number">Vehicle Registration Number</label>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-12 text-center pt-1">
            <button type="button" class="btn btn-primary modal-button reg_search">Search</button>
        </div>
    </div>
</form>
