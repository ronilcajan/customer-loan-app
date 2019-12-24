// ======= Notification ========
function showNotification(message, icon, color) {
	$.notify(
		{
			icon: icon,
			message: message
		},
		{
			type: color,
			timer: 3000,
			placement: {
				from: "top",
				align: "right"
			}
		}
	);
}

// ==== login ajax =====
$(document).ready(function() {
	$(".login-submit").click(function() {
		var username = $(".username").val();
		var password = $(".password").val();

		if(username.trim() == ""){
			showNotification(
							"Please enter username",
							"error",
							"warning"
						);
		}
		if(password.trim() == ""){
			showNotification(
							"Please enter your password",
							"error",
							"warning"
						);
		}

		if (username && password) {
			$.ajax({
				type: "POST",
				url: "login-submit",
				data: {
					username: username,
					password: password
				},
				dataType: "json",
				cache: false,
				beforeSend: function() {
			        $("#loading-screen").show();
			    },
				success: function(response) {
					if (response.success == true) {
						
						window.location = response.messages;
					} else {
						$("#loading-screen").hide();
						
						showNotification(
							response.messages,
							"error",
							"danger"
						);
						$("i.usr-error-icon").addClass("text-danger");
						$("i.psw-error-icon").addClass("text-danger");

					}
				}
			});
			return false;
		}
	});
});

// =============== saving clients info ================
$(document).ready(function() {
	$(".client-save").click(function() {
		var formdata = new FormData(document.getElementById("form-register"));
		var lname = $(".lname").val();
		var gname = $(".gname").val();
		var mname = $(".mname").val();
		var email = $(".email").val();
		var number1 = $(".number1").val();
		var purok_no = $(".purok_no").val();
		var barangay = $(".barangay").val();
		var city = $(".city").val();
		var province = $(".province").val();
		var postal_code = $(".postal_code").val();
		var image = $(".inputFileVisible").val();

		if (
			lname &&
			gname &&
			mname &&
			email &&
			number1 &&
			purok_no &&
			barangay &&
			city &&
			province &&
			postal_code &&
			image
		) {
			$.ajax({
				type: "POST",
				url: "register-clients",
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
						$("#form-register")[0].reset();
						$("#loading-screen").hide();
						
						showNotification(
							response.messages,
							"check_circle",
							"success"
						);

						setTimeout(function() {
							window.location.reload(1);
						}, 3000);

						
					} else {
						$("#loading-screen").hide();
						showNotification(
							response.messages,
							"info",
							"warning"
						);
					}
				}
			});
			return false;
		}
	});
});
