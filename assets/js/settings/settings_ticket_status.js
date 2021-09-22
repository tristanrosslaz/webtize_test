$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	function fillDatatable(status) {
		var dataTable = $('#table-grid').DataTable({
			"destroy": true,
			"serverSide": true,
			"columnDefs": [
				{ targets: 2, orderable: false, "sClass":"text-center"}
			],
			"ajax":{
				url:base_url+"Main_settings/ticket_status_table", // json datasource
				type: "post",  // method  , by default get
				data: { "status" : status },
				beforeSend:function(data) {
					$.LoadingOverlay("show"); 
				},
				complete: function() {
					$.LoadingOverlay("hide"); 
				},
				error: function() {  // error handling
					$(".table-grid-error").html("");
					$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid_processing").css("display","none");
				}
			}
		});
	}

	fillDatatable("");

	$(".btnSearch").on("click", function(){
		status = $(".searchStatus").val();
		
		fillDatatable(status);
	});

	$(".btnClickAddTicketStatus").click(function(e){
		var thiss = $('#add_ticket_status-form'); // target form
		$(thiss).find('input').val(""); // clean fields 
		$(thiss).find("input:checkbox").prop("checked", false); //unchecked checkbox
	});

	$(".saveBtnTicketStatus").click(function(e){
		e.preventDefault();

		var thiss = $("#add_ticket_status-form");

		var serial = thiss.serialize();

		$.ajax({
			type:'post',
			url: base_url+'Main_settings/insert_ticket_status',
			data: serial,
			beforeSend:function(data){
				$(".cancelBtn, .saveBtnTicketStatus").prop('disabled', true); 
				$(".saveBtnTicketStatus").text("Please wait...");
				
			},
			success:function(data){
				$(".cancelBtn, .saveBtnTicketStatus").prop('disabled', false);
				$(".saveBtnTicketStatus").text("Add Ticket Status");
				if (data.success == 1) {
					fillDatatable(""); //refresh datatable
					$(thiss).find('input').val(""); // clean fields

					$.toast({
					    heading: 'Success',
					    text: data.message,
					    icon: 'success',
					    loader: false,  
					    stack: false,
					    position: 'top-center', 
					    bgColor: '#5cb85c',
						textColor: 'white',
						allowToastClose: false,
						hideAfter: 10000
					});
				}else{
					$.toast({
					    heading: 'Warning',
					    text: data.message,
					    icon: 'info',
					    loader: false,   
					    stack: false,
					    position: 'top-center',  
					    bgColor: '#FFA500',
						textColor: 'white'        
					});
				}
			}
		});
	});

	$('#table-grid').delegate(".btnView", "click", function(){
		$.LoadingOverlay("show");
	  	var id = $(this).data('value');

	  	$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_settings/get_ticket_status',
	  		data:{'id':id},
	  		success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
	  				$(".info_id").val(id);
	  				$(".info_desc").val(res[0].description);
	  			}
	  			else {
	  				$(".info_desc").val('');
	  			}
				$.LoadingOverlay("hide");
				$('#viewTicketStatusModal').modal('show');
	  		}
	  	});
	});

	$("#update_ticket_status-form").submit(function(e){
		e.preventDefault();
		var serial = $(this).serialize();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/update_ticket_status',
			data:serial,
			success:function(data){
				if (data.success == 1) {
					$.toast({
					    heading: 'Success',
					    text: data.message,
					    icon: 'success',
					    loader: false,  
					    stack: false,
					    position: 'top-center', 
					    bgColor: '#5cb85c',
						textColor: 'white',
						allowToastClose: false,
						hideAfter: 4000
					});
					fillDatatable(""); //refresh table
					$('#viewTicketStatusModal').modal('toggle'); //close modal
				}else{
					$.toast({
					    heading: 'Error',
					    text: data.message,
					    icon: 'error',
					    loader: false,   
					    stack: false,
					    position: 'top-center',  
					    bgColor: '#d9534f',
						textColor: 'white'        
					});
				}
			}
		});
	});
	
	$('#table-grid').delegate(".btnDelete","click", function(){
		$.LoadingOverlay("show");
		var id = $(this).data('value');

		$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_settings/get_ticket_status',
	  		data:{'id':id},
	  		success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
  					$(".del_id").val(id);
					$(".info_desc").text(res[0].description);
	  			}
				$.LoadingOverlay("hide");
				$('#deleteTicketStatusModal').modal('show');
	  		}
	  	});
	});

	$('.deleteTicketStatusBtn').click(function(e){
		e.preventDefault();

		var del_id = $(".del_id").val();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/delete_ticket_status',
			data:{'del_id':del_id},
			success:function(data){
				if (data.success == 1) {
					$.toast({
					    heading: 'Success',
					    text: data.message,
					    icon: 'success',
					    loader: false,  
					    stack: false,
					    position: 'top-center', 
					    bgColor: '#5cb85c',
						textColor: 'white',
						allowToastClose: false,
						hideAfter: 4000
					});
					fillDatatable(""); //refresh table
					$('#deleteTicketStatusModal').modal('toggle'); //close modal
				}else{
					$.toast({
					    heading: 'Error',
					    text: data.message,
					    icon: 'error',
					    loader: false,   
					    stack: false,
					    position: 'top-center',  
					    bgColor: '#d9534f',
						textColor: 'white'        
					});
				}
			}
		});

	});
	
});