$(document).ready(function() {
	$('.search_loan').click(function(){
		var loan_no = $('.loan-search').val();

		if(loan_no){
			$.ajax({
				type: "POST",
				url: BASE_URL+"search-loan",
				data: {
					loan_no:loan_no
				},
				dataType: "json",
				cache: false,
				beforeSend: function() {
			        $("#loading-screen").show();
			    },
				success: function(response) {
					if (response.success == true) {

						var html_code = "";
						html_code += "<tr>";
						html_code += "<td>"+response.loan.loan_no+"</td>";
						html_code += "<td>"+response.loan.name+"</td>";
						html_code += "<td>"+response.loan.amount+"</td>";
						html_code += "<td>"+response.loan.date+"</td>";
						html_code += '<td><a type="button" rel="tooltip" title="View Loan Details" class="btn btn-info btn-sm mr-2" href='+BASE_URL+'payments/loan-details/'+response.loan.loan_no+'>View Loan</a></td>';
						html_code += "</tr>";
						$('#search_result').append(html_code);
						$('.search_loan').attr('disabled',true);
						$('.table-result').slideDown('1000', function(){
							$(this).show();
						});
					}else{
						showNotification(
							response.loan,
							"error",
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
					}, 2000);
			    }

			});
			return false
		}else{
			alert('empty');
		}
	});
});


// ==================== Payments ================

$(document).on('click', '.pay', function(){
	var daily_payment = $('.daily_payment').val();
	var loan_no = $('.loan_no').val();

	$.ajax({
		type: "POST",
		url: BASE_URL+"pay-loan",
		data: {
			daily_payment: daily_payment,
			loan_no: loan_no
		},
		dataType: "json",
		cache: false,
		beforeSend: function() {
	        $("#loading-screen").show();
	    },
		success: function(response) {
			if (response.success == true) {

				showNotification(
					response.message,
						"check_circle",
						"success"
				);
				$('#payment-modal').modal('hide');
				setTimeout(function() {
					window.location.reload(1);
				}, 3000);
				
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
		}, 2000);
    }

	});
	return false;
});

$(document).on('click', '.pay-penalty', function(){
	var total_pay = $('.total_pay').val();
	var loan_no = $('.loan_no').val();

	$.ajax({
		type: "POST",
		url: BASE_URL+"pay-loan",
		data: {
			total_pay: total_pay,
			loan_no: loan_no
		},
		dataType: "json",
		cache: false,
		beforeSend: function() {
	        $("#loading-screen").show();
	    },
		success: function(response) {
			if (response.success == true) {

				showNotification(
					response.message,
						"check_circle",
						"success"
				);
				$('#payment-modal').modal('hide');
				setTimeout(function() {
					window.location.reload(1);
				}, 3000);
				
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
});