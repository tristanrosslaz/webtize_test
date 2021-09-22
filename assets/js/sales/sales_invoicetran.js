$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	var username = ""; // wala talagang laman to dapat for officer lang
	var searchtype = $('#sosearchfilter').val(); // id ng dropdown
	var token = $("#hdnToken").val();

	$("#sisearchfilter").change(function() {
		
		var searchtype = $('#sisearchfilter').val(); // id ng dropdown

		$("#date_to").datepicker("setDate", new Date());
		$("#date_from").datepicker("setDate", new Date());

		if(searchtype == "sinodiv")
		{
			$('.sinodiv').show('slow');
			$('.sidatediv').hide('slow');
			$('.sistatus').hide('slow');
			$('.searchbyName').hide('slow');
			$("#search_status").val("");
			$("#search_customer").val("");	
		}
		if(searchtype == "sidatediv")
		{
			$('.sinodiv').hide('slow');
			$('.sidatediv').show('slow');
			$('.sistatus').hide('slow');
			$('.searchbyName').hide('slow');
			$("#search_status").val("");
			$("#search_customer").val("");
			$("#search_sino").val("");
		}
		if(searchtype == "sistatus")
		{
			$('.sinodiv').hide('slow');
			$('.sidatediv').show('slow');
			$('.sistatus').show('slow');
			$('.searchbyName').hide('slow');
			$("#search_sino").val("");	
			$("#search_customer").val("");
		}
		if(searchtype == "searchbyName")
		{
			$('.sinodiv').hide('slow');
			$('.sidatediv').show('slow');
			$('.sistatus').hide('slow');
			$('.searchbyName').show('slow');
			$("#search_sino").val("");	
			$("#search_status").val("");
			
		}
	});

	// 081518 - josh

	var dataTable = $('#table-grid').DataTable({
		
		"serverSide": true,
		"order": [[ 1, "desc" ]],
		"columnDefs": [{ "orderable": false, "targets": [ 2 ], "className": "dt-center" }, { "orderable": false, "targets": [ 3 ], "className": "dt-body-right" }],
		"destroy": true,
		"ajax":{
			url :base_url+"Main_sales/salesinvoice_table_Trans_j", // json datasource
			type: "post",
			beforeSend:function(data){
				$.LoadingOverlay("show"); 
			},
			error: function(){  // error handling
				$(".table-grid-error").html("");
				$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");
				$("#btn_export_excel").prop('hidden',true);
			},
			complete: function(data)
			{
				$.LoadingOverlay("hide"); 
			}
		},
        "fnDrawCallback": function(){
	        var api = this.api()
	        var json = api.ajax.json();
	        // console.log(json);
	        $(".loader").hide();
	        $("#table_salesorder").show();
	    }
	});


	$("#table-grid").delegate( "#btnEmail", "click", function() {
		var sino = $(this).data("sino");


		if(sino != "" || sino == null){
			$.LoadingOverlay("show");
			$("#sino").val(sino);
			$("#emailModal").modal("show");
			$.LoadingOverlay("hide");
		} else {
			toastMessage('Note', 'Error!.', 'error');
			
		}

		
	});
	

	$("#btnSendEmail").on('click', function(){
		sino = $("#sino").val();

		if (sino == "") {
			toastMessage('Note', 'SI No. not found.', 'error');
		}
		else {
			$.ajax({
				url: base_url+"Main_automated_bill/resend_bill",
				type: 'post',
				data: { 'sino': sino },
				beforeSend: function() {
					$.LoadingOverlay("show");
				},
				success: function(data) {
					$.LoadingOverlay("hide");
					if (data.success == 1) {
						toastMessage('Success', 'Bill has been sent to ' + data.email, 'success');
						$("#emailModal").modal("hide");
					}
					else {
						toastMessage('Note', 'Email sending failed.', 'error');
					}
				}
			});
		}
	});



	$("#searchBtn").click(function(){
		if( $('#sisearchfilter').val() == "sidatediv" && $('#date_from').val() == "" && $('#date_to').val() == "" ) {
			$.toast({
				heading: 'Note:',
				text: "Date field is required.",
				icon: 'info',
				loader: false,   
				stack: false,
				position: 'top-center',  
				bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		} else if($('#sisearchfilter').val() == "sinodiv" && $('#search_sino').val() == "") {
			$.toast({
				heading: 'Note:',
				text: "SI No. field is required.",
				icon: 'info',
				loader: false,   
				stack: false,
				position: 'top-center',  
				bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		} else if($('#sisearchfilter').val() == "sistatus" && $('#search_status').val() == "") {
			$.toast({
				heading: 'Note:',
				text: "Payment Status field is required.",
				icon: 'info',
				loader: false,   
				stack: false,
				position: 'top-center',  
				bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		} else if($('#sisearchfilter').val() == "searchbyName" && $('#search_customer').val() == ""){
			$.toast({
				heading: 'Note:',
				text: "Name field is required.",
				icon: 'info',
				loader: false,   
				stack: false,
				position: 'top-center',  
				bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		} else {
			$(".loader").show();
			$("#table_salesorder").hide();

			var i1 =$('#date_from').attr('data-column');  // getting column index
			var v1 =$('#date_from').val();  // getting search input value
			var i2 =$('#date_to').attr('data-column');  // getting column index
			var v2 =$('#date_to').val();  // getting search input value
			var i3 =$('#search_sino').attr('data-column');  // getting column index
			var v3 =$('#search_sino').val();  // getting search input value
			var i4 =$('#search_status').attr('data-column');  // getting column index
			var v4 =$('#search_status').val();  // getting search input value
			var i5 =$('#search_customer').attr('data-column');  // getting column index
			var v5 =$('#search_customer').val();  // getting search input value

			dataTable.columns(i1).search(v1)
					.columns(i2).search(v2)
					.columns(i3).search(v3)
					.columns(i4).search(v4)
					.columns(i5).search(v5)
					.draw();
		}
	});

	$('.btnAddSales').click(function(e) {
		window.open(base_url+"sales/Sales_invoice_form/salesinvoice_form/"+token, '_self');
	});

});