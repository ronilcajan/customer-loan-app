function showNotification(from, align) {
	$.notify(
		{
			icon: "error",
			message: "Username or Password did not match. Please try again."
		},
		{
			type: "warning",
			timer: 4000,
			placement: {
				from: from,
				align: align
			}
		}
	);
}
showNotification("top", "center");
