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
// =========== Loan form toggle notification ==========
function email(x) {
  	x.classList.toggle("fa-toggle-on");
  	x.classList.toggle("email");
}
function sim1(x) {
  	x.classList.toggle("fa-toggle-on");
  	x.classList.toggle("sim1");
}
function sim2(x) {
  	x.classList.toggle("fa-toggle-on");
  	x.classList.toggle("sim2");
}
function business_add(x) {
  	x.classList.toggle("fa-toggle-on");
  	x.classList.toggle("business");
}