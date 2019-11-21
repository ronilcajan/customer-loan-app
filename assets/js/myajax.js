// ======= Notification ========
function showNotification(from, align, message, icon, color) {
	$.notify(
		{
			icon: icon,
			message: message
		},
		{
			type: color,
			timer: 4000,
			placement: {
				from: from,
				align: align
			}
		}
	);
}

// ==== login ajax =====
$(document).ready(function() {
	$(".login-submit").click(function() {
		var username = $(".username").val();
		var password = $(".password").val();
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
				success: function(response) {
					if (response.success == true) {
						window.location = response.messages;
					} else {
						showNotification(
							"top",
							"center",
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
				success: function(response) {
					if (response.success == true) {
						$("#form-register")[0].reset();

						setTimeout(function() {
							window.location.reload(1);
						}, 3000);

						showNotification(
							"top",
							"right",
							response.messages,
							"check_circle",
							"success"
						);
					} else {
						showNotification(
							"top",
							"right",
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
