
$(document).ready(function() {
	$('.add_staff').on('click', function(){
		var username = $('.username').val();
		var position = $('.position').val();
		var password = $('.password').val();

		if(username.trim() != "" && position.trim() != "" && password.trim() != "" ){

			$.ajax({
				type: "POST",
				url: BASE_URL+"add-staff",
				data: {
					username: username,
					password: password,
					position: position
				},
				dataType: "json",
				cache: false,
				beforeSend: function() {
			        $("#loading-screen").show();
			    },
			    success: function(response) {
			    	$("#loading-screen").hide();

					if (response.success == true) {
						$('#add_staff').modal('hide');
						showNotification(
							response.messages,
							"check_circle",
							"success"
						);
						setTimeout(function() {
							window.location.reload(1);
						}, 3000);
					}else{
						$('.error').show();
					}

				}
			});
		}
		return false;
	});
});

// ======== Complete Staff Profile ==============

$(document).ready(function(){
	$('#btn_create_staff').on('click', function(){
		var formdata = new FormData(document.getElementById("create_staff"));

		$.ajax({
			type: "POST",
				url: BASE_URL+"create-staff",
				dataType: "json",
				data: formdata,
				processData: false,
				contentType: false,
				cache: false,
				beforeSend: function() {
			        $("#loading-screen").show();
			    },
				success: function(response) {
					if (response.success == true) {

						$("#loading-screen").hide();
						
						showNotification(
							response.messages,
							"check_circle",
							"success"
						);
						
					} else {
						$("#loading-screen").hide();
						showNotification(
							response.messages,
							"info",
							"warning"
						);
					}
					setTimeout(function() {
						window.location.reload(1);
					}, 3000);
				},
				error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		  //       setTimeout(function() {
				// 	window.location.reload(1);
				// }, 3000);
		    }

		});

		return false;

	});
});