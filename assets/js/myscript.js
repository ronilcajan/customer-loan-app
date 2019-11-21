//======= image preview before upload =====
var loadFile = function(event) {
	var output = document.getElementById("output");
	output.src = URL.createObjectURL(event.target.files[0]);
};

$(document).ready(function() {
	$(".cancel-create").click(function() {
		$("#form-register")[0].reset();
	});
});

// ====== DataTable for new Clients ===========
$(document).ready(function() {
	$("#new_client_table").DataTable();
	$("#loan_clients_table").DataTable();
	$("#approved_clients_table").DataTable();
	$("#rejected_clients_table").DataTable();
	$("#clients_table").DataTable();
});
