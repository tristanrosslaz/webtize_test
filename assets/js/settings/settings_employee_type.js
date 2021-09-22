$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	function fillDatatable(empType) {
		var dataTable = $('#table-grid').DataTable({
			"destroy": true,
			"serverSide": true,
			"columnDefs": [
				{ targets: 2, orderable: false, "sClass":"text-center"}
			],
			"ajax":{
				url:base_url+"Main_settings/employee_type_table", // json datasource
				type: "post",  // method  , by default get
				data: { "empType" : empType },
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
		empType = $(".searchEmpType").val();

		fillDatatable(empType);
	});

	$(".btnClickAddEmployeeType").click(function(e){
		var thiss = $('#add_employee_type-form'); // target form
		$(thiss).find('input').val(""); // clean fields 
		$(thiss).find("input:checkbox").prop("checked", false); //unchecked checkbox
	});

	$(".saveBtnEmployeeType").click(function(e){
		
		e.preventDefault();

		var thiss = $("#add_employee_type-form");

		var serial = thiss.serialize();

		$.ajax({
			type:'post',
			url: base_url+'Main_settings/insert_employee_type',
			data: serial,
			beforeSend:function(data){
				$(".cancelBtn, .saveBtnEmployeeType").prop('disabled', true); 
				$(".saveBtnEmployeeType").text("Please wait...");
				
			},
			success:function(data){
				$(".cancelBtn, .saveBtnEmployeeType").prop('disabled', false);
				$(".saveBtnEmployeeType").text("Add Employee Type");
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
					$('#addEmployeeTypeModal').modal('toggle'); //close modal
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
	  		url: base_url+'Main_settings/get_employee_type',
	  		data:{'id':id},
	  		success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
	  				$(".info_id").val(id);
	  				$(".info_desc").val(res[0].description);
	  				$(".info_desc1").val(res[0].description);

	  			}
	  			else {
	  				$(".info_desc").val('');
	  				$(".info_desc1").val('');
				}
				
				$.LoadingOverlay("hide"); 
				$("#viewEmployeeTypeModal").modal("show");
	  		}
	  	});
	});

	$("#update_employee_type-form").submit(function(e){
		e.preventDefault();
		var serial = $(this).serialize();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/update_employee_type',
			data:serial,
			beforeSend:function(data){
				$(".cancelBtn, .updateBtnEmployeeType").prop('disabled', true); 
				$(".updateBtnEmployeeType").text("Please wait...");
				
			},
			success:function(data){
				$(".cancelBtn, .updateBtnEmployeeType").prop('disabled', false);
				$(".updateBtnEmployeeType").text("Save Changes");
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
					$('#viewEmployeeTypeModal').modal('toggle'); //close modal
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
	
	$('#table-grid').delegate(".btnDelete","click", function(){
		$.LoadingOverlay("show"); 
		var id = $(this).data('value');

		$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_settings/get_employee_type',
	  		data:{'id':id},
	  		success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
  					$(".del_id").val(id);
					$(".info_desc").text(res[0].description);
				  }
				  
				$.LoadingOverlay("hide"); 
				$('#deleteEmployeeTypeModal').modal('show');
	  		}
	  	});

	});

	$('.deleteEmployeeTypeBtn').click(function(e){
		e.preventDefault();

		var del_id = $(".del_id").val();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/delete_employee_type',
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
					$('#deleteEmployeeTypeModal').modal('toggle'); //close modal
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
	
});