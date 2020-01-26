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
				},
				error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 5000);
		    }

			});
			return false;
		}
	});
});
// =============== saving borrowers info ================
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
			postal_code
		) {
			$.ajax({
				type: "POST",
				url: BASE_URL+"register-borrowers",
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
						
						if(response.email){
							showNotification(
								response.email,
								"info",
								"warning"
							);
						}
						showNotification(
							response.messages,
							"check_circle",
							"success"
						);
						
					} else {
						$("#loading-screen").hide();
						showNotification(
							response.messages,
							"info",
							"warning"
						);
					}
					
					setTimeout(function() {
							window.location.reload(1);
						}, 3000);

				},
				error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
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
// =============== Approved Loan ================
$(document).on('click', '.approve', function(){
	var id = $(this).attr('id');
	var amount = $('#amount'+id).text();

	var $button = $('.approve'+id);
	var table = $("#loan_clients_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"approve-loan",
		method: 'POST',
		data:{
			id:id,
			amount:amount
		},
		dataType: "json",
		beforeSend: function() {
			$("#loading-screen").show();
		},
		success: function(data){
			if(data.success){

				if(data.email){
					showNotification(
						"Email sent successfully!",
						"check_circle",
						"success"
					);
				}else{
					showNotification(
						"Email not sent!",
						"check_circle",
						"success"
					);
				}

				showNotification(
					data.sim1,
					"check_circle",
					"info"
				);

				showNotification(
					data.sim2,
					"check_circle",
					"info"
				);


			}else{
				$("#loading-screen").hide();

				showNotification(
					"Something went wrong!",
					"check_circle",
					"success"
				);
			}
			
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {

		            msg = 'Email notification did not send.';

		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		    }
	});
}); 
// =============== Delete Borrowers ================
$(document).on('click', '.delete', function(){
	var id = $(this).attr('id');

	var $button = $('#remove-loan'+id);
	var table = $("#new_client_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"delete-borrowers",
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

				showNotification(
					data,
					"check_circle",
					"success"
				);

				
			}else{
				$("#loading-screen").hide();
			}
	        setTimeout(function() {
				window.location.reload(1);
			}, 1000);
			
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		    }
	});
}); 
// =============== Reject loan ================
$(document).on('click', '.reject', function(){

	var id = $(this).attr('id');

	var reason = $('.reason').val();

	var $button = $('#reject-button'+id);
	var table = $("#loan_clients_table").DataTable();

	$.ajax({
		url: BASE_URL+"reject-loan",
		method: 'POST',
		data:{
			id:id,
			reason:reason
		},
		beforeSend: function() {
			$("#loading-screen").show();
		},
		success: function(data){
			if(data!="False"){

				$('.modal').modal('hide');
				$("#loading-screen").hide();
				
				showNotification(
					data,
					"info",
					"warning"
				);
				setTimeout(function() {
					window.location.reload(1);
				}, 1000);

			}else{
				$("#loading-screen").hide();
			}
			
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		    }
	});
});

// =============== Loan Re-Apply ================
$(document).on('click', '.re-apply', function(){
	var id = $(this).attr('id');

	var $button = $('#reapply-loan'+id);
	var table = $("#rejected_clients_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"reapply-loan",
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

				showNotification(
					data,
					"check_circle",
					"success"
				);

			}else{
				$("#loading-screen").hide();
			}

			setTimeout(function() {
					window.location.reload(1);
				}, 3000);
			
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		    }
	});
}); 
// =============== Loan Remove ================
$(document).on('click', '.remove', function(){
	var id = $(this).attr('id');

	var $button = $('#remove-loan'+id);
	var table = $("#loan_clients_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"remove-loan",
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

				showNotification(
					data,
					"check_circle",
					"success"
				);

				
			}else{
				$("#loading-screen").hide();
			}
			setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		    }
	});
}); 

// =============== Remove rejected loan ================
$(document).on('click', '.remove-rejected', function(){
	var id = $(this).attr('id');

	var $button = $('#remove-rejected-loan'+id);
	var table = $("#rejected_clients_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"remove-loan",
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

				showNotification(
					data,
					"check_circle",
					"success"
				);

				
			}else{
				$("#loading-screen").hide();
			}

			setTimeout(function() {
					window.location.reload(1);
				}, 3000);
			
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		    }
	});
});
// =============== Cash release ================
$(document).on('click', '.cash-release', function(){
	var id = $(this).attr('id');

	var $button = $('#cash-release'+id);
	var table = $("#approved_clients_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"cash-receive",
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

				showNotification(
					data,
					"check_circle",
					"success"
				);

				
			}else{
				$("#loading-screen").hide();
			}

			
				 setTimeout(function() {
					window.location.reload(1);
				}, 3000);
			
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
		    }
	});
});
// ========= Function to check internet connection =============
function checkconnection(){
	var status = navigator.onLine;

	if(status){
		showNotification(
			"Connected to internet. You can send email notification.",
			"wifi",
			"success"
		);
	}else{
		showNotification(
			"No internet connection. You can't send email notification.",
			"wifi_off",
			"warning"
		);
	}
}


// ============== Account no.query ==============
$(document).on('click','.search_account',function(){
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
				
				checkconnection();

			}else{
				showNotification(
					'Borrowers data not found!',
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
$(document).ready(function() {
	$(".create-loan").click(function(e) {
		e.preventDefault();

	var loan_no = $('.loan_no').val();
	var area = $('.area').val();
	var account_no = $('.accnt_no').val();
	var loan_amount = $('.amount').val();
	var collector = $('.collector').val();
	var full_name = $('.full_name').val();
	var email = $('.email').val();
	var verifier = $('.verifier').val();

	var email_toggle = $('#email-toggle').hasClass('email');
	var sim1_toggle = $('#sim1-toggle').hasClass('sim1');
	var sim2_toggle = $('#sim2-toggle').hasClass('sim2');

	var email_notif = '';
	var sim1_notif = '';
	var sim2_notif = '';

	if(email_toggle){
		var email_notif = 'yes';
	}
	if(sim1_toggle){
		var sim1_notif = 'yes';
	}
	if(sim2_toggle){
		var sim2_notif = 'yes';
	}

	var b_name = $('.b_name').val();
	var b_address = $('#c_address').val();

	if(!b_address){
		var b_address = 'Purok'+$('.purok_no1').val()+','+$('.barangay1').val()+','+$('.city').val()+','+$('.province1').val()+'.'+$('postal1').val();;
	}
	
	if(!b_address){
		var b_address = 'Purok '+$('.purok_no').val()+','+$('.barangay').val()+','+$('.city').val()+','+$('.province')+','+$('.postal').val(); 
	}
	var co_mkr = $('.comaker-name').val();
	var cdula = $('.cedula').val();
	var dt = $('.date_issued').val();
	var wdt = $('.where_issued').val();

	var co_maker_name = [];
	var cedula = [];
	var date_issued = [];
	var adrs_issued = [];

	if(co_mkr.trim() != ''){
		$('.comaker-name').each(function(){
			co_maker_name.push($(this).val());
		});
	}
	if(cdula.trim() != ''){
		$('.cedula').each(function(){
			cedula.push($(this).val());
		});
	}
	if(dt.trim() != ''){
		$('.date_issued').each(function(){
			date_issued.push($(this).val());
		});
	}
	if(wdt.trim() != ''){
		$('.where_issued').each(function(){
			adrs_issued.push($(this).val());
		});
	}

	if(collector!=null && verifier!=null && account_no.trim() && loan_amount.trim() && co_mkr && cdula && dt && wdt && b_address.trim() && b_name.trim()){
		$.ajax({
			type: "POST",
			url: BASE_URL+"insert-loan",
			dataType: "json",
			data: {
				loan_no : loan_no,
				area : area,
				account_no : account_no,
				loan_amount : loan_amount,
				collector : collector,
				verifier: verifier,
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
					
					$("#loading-screen").hide();

					if(response.email == false){
						showNotification(
							'Loan successfully added, Email did not sent!',
							"check_circle",
							"success"
						);
					}else{
						showNotification(
							response.messages,
							"check_circle",
							"success"
						);
					}
					
					$("#loan-form")[0].reset();

					setTimeout(function() {
					window.location.reload(1);
				}, 2000);


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
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'Email notification did not send.';

		           showNotification(
						'Loan application successfully added.',
						"check_circle",
						"success"
					);

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
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 5000);
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
});

