$(document).ready(function(){
	
	$('#price-range-submit').hide();

	$("#min_radius,#max_radius").on('change', function () {

	  $('#price-range-submit').show();

	  var min_radius_range = parseInt($("#min_radius").val());

	  var max_radius_range = parseInt($("#max_radius").val());

	  if (min_radius_range > max_radius_range) {
		$('#max_radius').val(min_radius_range);
	  }

	  $("#slider-range").slider({
		values: [min_radius_range, max_radius_range]
	  });
	  
	});


	$("#min_radius,#max_radius").on("paste keyup", function () {                                        

	  $('#price-range-submit').show();

	  var min_radius_range = parseInt($("#min_radius").val());

	  var max_radius_range = parseInt($("#max_radius").val());
	  
	  // if(min_radius_range == max_radius_range){

			// max_radius_range = min_radius_range + 100;
			
			// $("#min_radius").val(min_radius_range);		
			// $("#max_radius").val(max_radius_range);
	  // }

	  $("#slider-range").slider({
		values: [min_radius_range, max_radius_range]
	  });

	});




	$("#slider-range,#price-range-submit").click(function () {

	  var min_radius = $('#min_radius').val();
	  var max_radius = $('#max_radius').val();

	  $("#searchResults").text("Here List of products will be shown which are cost between " + min_radius  +" "+ "and" + " "+ max_radius + ".");
	});

});