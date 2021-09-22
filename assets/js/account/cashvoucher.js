$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	//start
	$(".saveCVBtn").click(function(e){
		e.preventDefault();
		var date1 = $("#date1").val();
		var date2 = $("#date2").val();
		var cvtype = $("#cvtype").val();
		var payto = $("#payto").val();
		var amt = $("#amt").val();
		var notes = $("#notes").val();
		var checker = 0;

		if(date1 == "" || date2 == "" || cvtype == "none" || payto == "" || amt == "" || notes == "") {
			toastMessage('Note', 'Please fill all required fields.', 'error')
		}
		else {
			var cvdate = formatDate(date1);
			var funddate = formatDate(date2);

			$.ajax({
		  		type: 'post',
		  		url: base_url+'Main_account/save_cashvoucher_details',
		  		data:{'date1':cvdate,
		  			  'date2':funddate,
		  			  'cvtype':cvtype,
		  			  'payto':payto,
		  			  'amt':amt,
		  			  'notes':notes
		  		},
		  		beforeSend: function() {
                	$.LoadingOverlay("show");
	            },
	            complete: function() {
	                $.LoadingOverlay("hide");
	            },
		  		success:function(data) {
		  			if (data.success == 1) {
						toastMessage('Success', 'You have successfully saved cash voucher.', 'success')
					}
					  
					$("#date1").val("");
					$("#date2").val("");
					$("#payto").val("");
					$("#amt").val("");
					$("#notes").val("");
					$('#cvtype').val('none').change();
					$(".saveCVBtn").prop("disabled",false);
		  		}
	  		});
		}
	});
});