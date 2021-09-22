$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	//start
	$(".settleCVBtn").click(function(e){
		var cvno = $("#cvno").val();
		var token = $("#token").val();
		var sdate = $("#sdate").val();
		var amount = $("#amt").val();
		var actualamt = $("#actualamt").val();
		var actualwo = $("#actualwo").val();
		var remarks = $("#remarks").val();
		var amt = $("#amt").val();
		var checker = 0;
		totalamt = parseFloat(actualamt)+parseFloat(actualwo);

		if(sdate != "" && actualamt != "" && remarks != "" && actualwo != "") {
			if(parseFloat(totalamt) != parseFloat(amount)) {
				checker = 0;
				toastMessage('Note', 'You have exceeded amount for settle. Please check the amount.', 'error')
			}
			else {
				checker = 1;
			}
		}
		else {
			checker = 0;
			toastMessage('Note', 'Please fill in all required fields.', 'error')
		}

		if(checker == 1) {
			$.ajax({
		  		type: 'post',
		  		url: base_url+'Main_account/update_cashvoucher_settle',
		  		data:{'cvno':cvno,
		  			  'sdate':sdate,
		  			  'actualamt':actualamt,
		  			  'actualwo':actualwo,
		  			  'remarks':remarks,	
		  		},
		  		beforeSend:function(data) {
					$.LoadingOverlay("show"); 
				},
				complete: function() {
					$.LoadingOverlay("hide"); 
				},
		  		success:function(data) {
		  			if(data.success == 1) {
						toastMessage('Success', 'You have successfully settled cash voucher# ' + cvno, 'success')

						window.setTimeout(function(){
							window.location.href=base_url+"Main_account/cashvoucher_transaction/" + token;
						}, 2000)	
		  			}
		  		}
		  	});
		}
	});
});