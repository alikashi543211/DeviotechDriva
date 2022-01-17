<style>
    .phone-input
    {
        text-align: center;
    }
    /*.form-group-phone
    {
        width: 60%;
        margin: auto;
        text-align: center;
    }*/
</style>
<form action="" method="post" id="phoneForm">
    @csrf
    <div class="row">
        <div class="col-12 text-center">
            <p class="font-weight-bold">Enter your contact number</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="form-group form-group-phone has-float-label">
                <input type="text" class="form-control required phone-input" min="11" maxlength="11" id="contact_number" value="{{ $consumer->contact_number ?? '' }}" name="contact_number" autocomplete="off">
                <input type="hidden" id="#digits_count" name="">
                <label for="contact_number">Contact Number</label>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-12 pt-1 text-center">
            <button type="button" class="btn btn-primary modal-button phone_submit">Next</button>
        </div>
    </div>
</form>

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

function getEventTarget(e) {
    e = e || window.event;
    return e.target || e.srcElement;
}

</script>
