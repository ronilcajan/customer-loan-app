
$(document).ready(function() {

	$('div.staff').hide();

	$('.position').on('change', function(){
		$position = $('.position').val();

		if($position == 'Manager' || $position == 'Guest' || $position == 'Admin'  || $position == 'Cashier'){
			$('div.staff').hide();
			$('div.main-staff').show();
		}else{
			$('div.staff').show();
			$('div.main-staff').hide();
		}
	});

});

$(document).on('click','.add_staff', function(){
		var username = $('.username').val();
		var position = $('.position').val();
		var password = $('.password').val();
		var name = $('.name').val();
		var address = $('.address').val();
		var number = $('.number').val();
		var email = $('.email').val();

		if(username.trim() != "" && position.trim() != "" ){

			$.ajax({
				type: "POST",
				url: BASE_URL+"add-staff",
				data: {
					username: username,
					password: password,
					position: position,
					name: name,
					address: address,
					number:number,
					email:email
				},
				dataType: "json",
				cache: false,
				beforeSend: function() {
			        $("#loading-screen").show();
			    },
			    success: function(response) {
			    	$("#loading-screen").hide();

					if (response.success == true) {
						$('#add_staff').modal('hide');
						showNotification(
							response.messages,
							"check_circle",
							"success"
						);
						setTimeout(function() {
							window.location.reload(1);
						}, 3000);
					}else{
						$('.error').show();
					}

				}
			});
		}else{
			showNotification(
							response.messages,
							"check_circle",
							"success"
						);		
		}
		return false;
});

// ======== Complete Staff Profile ==============

$(document).ready(function(){
	$('#btn_create_staff').on('click', function(){
		var formdata 	= new FormData(document.getElementById("create_staff"));
		var email 		= $('.email').val();
		var num 		= $('.num').val();
		var fname 		= $('.fname').val();
		var mname 		= $('.mname').val();
		var lname		= $('.lname').val();
		var address 	= $('.address').val();
		var city 		= $('.city').val();
		var postal		= $('.postal').val();

		if(	email.trim() != '' && 
			num.trim() != '' && 
			fname.trim() != '' && 
			mname.trim() != '' &&
			lname.trim() != '' &&
			address.trim() != '' &&
			city.trim() != '' &&
			postal.trim() != ''
		){
		$.ajax({
			type: "POST",
				url: BASE_URL+"create-staff",
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

						$("#loading-screen").hide();
						
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
		}else{
			showNotification(
				'Please complete your profile details!',
				"info",
				"warning"
			);
		}

		return false;

	});
});

// ==================== Update My Profile ================
$(document).ready(function(){
	$('#update_my_profile').on('click', function(){
		var formdata = new FormData(document.getElementById("update_my_form"));

		$.ajax({
			type: "POST",
				url: BASE_URL+"update-profile",
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
						$("#edit_my_profile").modal('hide');
						$("#loading-screen").hide();
						
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
				

		  //       setTimeout(function() {
				// 	window.location.reload(1);
				// }, 3000);
		    }

		});

		return false;

	});
});
//================== Remove Staff =====================
$(document).on('click', '.remove-staff', function(){
	var username = $(this).attr('id');

	var $button = $('#remove-staff'+username);
	var table = $("#loan_clients_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"remove-staff",
		method: 'POST',
		data:{
			username:username
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
