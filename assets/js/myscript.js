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
// ========== Adding another co-maker section ===========
var count = 1;
$(document).on('click', '#add_co-maker', function(){
	count += 1;

	var html_code = '';
	html_code += 	'<div class="row to-remove'+count+'"><div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Fullname</label>';
    html_code += 	'<input type="text" id="c-name'+count+'" class="form-control comaker-name" name="comaker-name" required></div></div>';
    html_code +=	'<div class="col-md-6">';
    html_code += 	'<button type="button" class="btn btn-social btn-just-icon btn-round btn-danger remove_co-maker" id="'+count+'" rel="tooltip" title="Remove co-maker">';
    html_code +=    '<i class="fa fa-minus"></i></button></div></div>';
    html_code += 	'<div class="row to-remove'+count+'"><div class="col-md-4"><div class="form-group"><label class="bmd-label-floating">Residence Certificate No</label>';
    html_code +=    '<input type="text" class="form-control cedula" name="cedula" id="cedula'+count+'" required></div></div>';                                           
    html_code +=    '<div class="col-md-4"><div class="form-group"><label class="bmd-label-floating">Date issued</label>';                                                
    html_code +=    '<input type="date" class="form-control date_issued" name="date_issued" id="c-date'+count+'" required></div></div>'                                                   
    html_code +=    '<div class="col-md-4"><div class="form-group"><label class="bmd-label-floating">Where issued</label>';                                                  
    html_code +=	'<input type="text" class="form-control where_issued" name="where_issued" id="c-place'+count+'" required></div></div></div>';                                                       
 
    $('.co-maker-section').append(html_code);

});

//  ============= Removing co-maker section =============
$(document).on('click', '.remove_co-maker', function(){
	var div_id = $(this).attr('id');
	$('.to-remove'+div_id).slideUp('1000', function(){
    	$(this).remove();
	});
});