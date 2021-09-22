$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	function fillDatatable(plateno) {
		var dataTable = $('#table-grid').DataTable({
			"destroy": true,
			"serverSide": true,
			"columnDefs": [
				{ targets: 2, orderable: false, "sClass":"text-center"}
			],
			"ajax":{
				url:base_url+"Main_settings/delivery_vehicle_table", // json datasource
				type: "post",  // method  , by default get
				data: { "plateno" : plateno },
				beforeSend:function(data) {
					$.LoadingOverlay("show"); 
				},
				complete: function() {
					$.LoadingOverlay("hide"); 
				},
				error: function(){  // error handling
					$(".table-grid-error").html("");
					$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid_processing").css("display","none");
				}
			}
		});
	}

	fillDatatable("");

	$(".btnSearch").on("click", function(){
		searchPlateNo = $(".searchPlateNo").val();

		fillDatatable(searchPlateNo);
	});

	$(".btnClickAddDeliveryVehicle").click(function(e){
		var thiss = $('#add_delivery_vehicle-form'); // target form
		$(thiss).find('input').val(""); // clean fields 
		$(thiss).find("input:checkbox").prop("checked", false); //unchecked checkbox

	});

	$(".saveBtnDeliveryVehicle").click(function(e){
		e.preventDefault();

		var thiss = $("#add_delivery_vehicle-form");

		var serial = thiss.serialize();

		$.ajax({
			type:'post',
			url: base_url+'Main_settings/insert_delivery_vehicle',
			data: serial,
			beforeSend:function(data){
				$(".cancelBtn, .saveBtnDeliveryVehicle").prop('disabled', true); 
				$(".saveBtnDeliveryVehicle").text("Please wait...");
				
			},
			success:function(data){
				$(".cancelBtn, .saveBtnDeliveryVehicle").prop('disabled', false);
				$(".saveBtnDeliveryVehicle").text("Add Delivery Vehicle");
				if (data.success == 1) {
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
					fillDatatable(""); //refresh table
					$('#addDeliveryVehicleModal').modal('toggle'); //close modal
				}else{
					$.toast({
					    heading: 'Note',
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
	  		url: base_url+'Main_settings/get_delivery_vehicle',
	  		data:{'id':id},
	  		success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
	  				$(".info_id").val(id);
	  				$(".info_desc").val(res[0].plateno);
	  			}
	  			else {
	  				$(".info_desc").val('');
	  			}
				$.LoadingOverlay("hide");
				$("#viewDeliveryVehicleModal").modal("show");
	  		}
	  	});
	});

	$("#update_delivery_vehicle-form").submit(function(e){
		e.preventDefault();
		var serial = $(this).serialize();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/update_delivery_vehicle',
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
					$('#viewDeliveryVehicleModal').modal('toggle'); //close modal
				} else if(JSON.parse(data).success == 2) {
					$.toast({
					    heading: 'Note',
					    text: JSON.parse(data).message,
					    icon: 'error',
					    loader: false,  
					    stack: false,
					    position: 'top-center', 
					    bgColor: '#FFA500',
						textColor: 'white',
						allowToastClose: false,
						hideAfter: 4000
					});
				} else {
					$.toast({
					    heading: 'Note',
					    text: data.message,
					    icon: 'error',
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
	
	$('#table-grid').delegate(".btnDelete","click", function(){
		$.LoadingOverlay("show"); 
		var id = $(this).data('value');

		$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_settings/get_delivery_vehicle',
	  		data:{'id':id},
	  		success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
  					$(".del_id").val(id);
					$(".info_desc").text(res[0].plateno);
	  			}
				$.LoadingOverlay("hide");
				$('#deleteDeliveryVehicleModal').modal('show');
	  		}
	  	});

	});

	$('.deleteDeliveryVehicleBtn').click(function(e){
		e.preventDefault();

		var del_id = $(".del_id").val();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/delete_delivery_vehicle',
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
					$('#deleteDeliveryVehicleModal').modal('toggle'); //close modal
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