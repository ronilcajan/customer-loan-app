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
// =========== Loan form toggle for notification ==========
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
  	x.classList.toggle("bz-add");
}

// ============ Check toggle notification for business address ================
$(document).on('click','#c-add', function() {
	var toggle_add = $('#c-add').hasClass('bz-add');
	var c_address = $('.address').val();

	if (toggle_add) {
		if (!c_address) {
			showNotification(
					'No current address found. Please provide client address.',
					"info",
					"warning"
				);
		}else{
			// Add transition for hiding and showing div
			$('.bs').slideUp('1000', function(){
				$(this).hide();
			});
			
			$('.c-add').slideDown('1000', function(){
				$(this).show();
			});
			
		}
		
	}else{
		// Add transition for hiding and showing div
		$('.c-add').slideUp('1000', function(){
				$(this).hide();
			});

		$('.bs').slideDown('1000', function(){
			$(this).show();
		});
	}
});
