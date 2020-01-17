
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