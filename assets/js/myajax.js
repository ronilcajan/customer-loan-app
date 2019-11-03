function showNotification(from, align, message) {
	$.notify(
		{
			icon: "error",
			message: message
		},
		{
			type: "danger",
			timer: 4000,
			placement: {
				from: from,
				align: align
			}
		}
	);
}

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
						showNotification("top", "center", response.messages);
						$("i.usr-error-icon").addClass("text-danger");
						$("i.psw-error-icon").addClass("text-danger");
					}
				}
			});
			return false;
		}
	});
});
