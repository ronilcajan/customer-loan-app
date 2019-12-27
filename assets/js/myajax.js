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
				url: BASE_URL+"login-submit",
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
				url: BASE_URL+"register-clients",
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
		}else{
			showNotification(
				'Please fill the form completely',
				"info",
				"warning"
			);
		}
	});
});

// =============== Delete Clients ================
$(document).on('click', '.delete', function(){
	var id = $(this).attr('id');

	var $button = $('#remove-button'+id);
	var table = $("#new_client_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"delete-clients",
		method: 'POST',
		data:{
			id:id
		},
		beforeSend: function() {
			$("#loading-screen").show();
		},
		success: function(data){
			if(data!="False"){

				$('.modal').modal('hide');
				$("#loading-screen").hide();

				table.row( $button.parents('tr')).remove().draw();
				showNotification(
					data,
					"check_circle",
					"success"
				);
			}else{
				$("#loading-screen").hide();
			}
			
		}
	});
}); 

// ============== Account no.query ==============
$(document).on('blur','.accnt_no',function(){
	var account_no = $('.accnt_no').val();

	$.ajax({
		url: BASE_URL+'account-query',
		type: 'POST',
		dataType: "json",
		data: {
			account_no : account_no
		},
		success:function(response){
			if(response.success == true){
				$(".acc_no").addClass("has-success");
				$(".fa-search").addClass("text-success");
				$('.full_name').val(response.name);
				$('.address').val(response.address);
				$('.email').val(response.email);
				$('.sim1').val(response.sim1);
				$('.sim2').val(response.sim2);
				$(".acc_no").removeClass("has-danger");
				$(".fa-search").removeClass("text-danager");


				$('.fas').click();
			}else{
				showNotification(
					'User not found!',
					"info",
					"danger"
				);

				$('.full_name').val('');
				$('.address').val('');
				$('.email').val('');
				$('.sim1').val('');
				$('.sim2').val('');
				$(".acc_no").removeClass("has-success");
				$(".fa-search").removeClass("text-success");
				$(".acc_no").addClass("has-danger");
				$(".fa-search").addClass("text-danger");
			}
		}
	});
	return false;
});

// =========== Insert Loan Details ================

$(document).on('click', '.create-loan', function(){

	var loan_no = $('.loan_no').val();
	var area = $('.area').val();
	var account_no = $('.accnt_no').val();
	var loan_amount = $('.amount').val();
	var collector = $('.collector').val();
	var full_name = $('.full_name').val();
	var email = $('.email').val();

	var email_toggle = $('#email-toggle').hasClass('email');
	var sim1_toggle = $('#sim1-toggle').hasClass('sim1');
	var sim2_toggle = $('#sim2-toggle').hasClass('sim2');

	var email_notif = false;
	var sim1_notif = false;
	var sim2_notif = false;

	if(email_toggle){
		var email_notif = true;
	}
	if(sim1_toggle){
		var sim1_notif = true;
	}
	if(sim2_toggle){
		var sim2_notif = true;
	}

	var b_name = $('.b_name').val();
	var b_address = $('#c_address').val();
	
	if(!b_address){
		var b_address = 'Purok '+$('.purok_no').val()+','+$('.barangay').val()+','+$('.city').val()+','+$('.province')+','+$('.postal').val(); 
	}

	var co_maker_name = [];
	var cedula = [];
	var date_issued = [];
	var adrs_issued = [];

	$('.comaker-name').each(function(){
		co_maker_name.push($(this).val());
	});
	$('.cedula').each(function(){
		cedula.push($(this).val());
	});
	$('.date_issued').each(function(){
		date_issued.push($(this).val());
	});
	$('.where_issued').each(function(){
		adrs_issued.push($(this).val());
	});

	if(account_no && loan_amount && co_maker_name && cedula && date_issued && adrs_issued && b_address && b_name){
		$.ajax({
			type: "POST",
			url: "create-loan",
			dataType: "json",
			data: {
				loan_no : loan_no,
				area : area,
				account_no : account_no,
				loan_amount : loan_amount,
				collector : collector,
				full_name : full_name,
				email : email,
				email_notif : email_notif,
				sim1_notif : sim1_notif,
				sim2_notif : sim2_notif,
				b_name : b_name,
				b_address : b_address, 
				co_maker_name : co_maker_name,
				cedula : cedula,
				date_issued : date_issued,
				adrs_issued : adrs_issued
			},
			cache: false,
			beforeSend: function() {
				$("#loading-screen").show();
			},
			
			success: function(response){
				if(response.success == true){
					showNotification(
						response.messages,
						"check_circle",
						"success"
					);
					setTimeout(function() {
								window.location.reload(1);
					}, 3000);
					$("#loading-screen").hide();
				}else{

					$("#loading-screen").hide();
		
					showNotification(
						response.messages,
						"info",
						"danger"
					);
				}
			},
			error: function (jqXHR, exception) {
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"danger"
					);
		    },
		
		});
	}else{
		showNotification(
			'Please fill the form completely',
			"info",
			"warning"
		);
	}

	
	return false;
});