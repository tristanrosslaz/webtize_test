$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	function fillDatatable(id, name, type) {
		var dataTable = $('#table-grid').DataTable({
			"destroy": true,
			"serverSide": true,
			"columnDefs": [
				{ targets: 4, orderable: false, "sClass":"text-center"}
			],
			"ajax":{
				url:base_url+"Main_settings/employee_table", // json datasource
				type: "post",  // method  , by default get
				data: { "id" : id, "name" : name, "type" : type },
				beforeSend:function(data) {
					$.LoadingOverlay("show"); 
				},
				complete: function() {
					$.LoadingOverlay("hide"); 
				},
				error: function(){  // error handling
					$(".table-grid-error").html("");
					$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="5">No data found in the server</th></tr></tbody>');
					$("#table-grid_processing").css("display","none");
				}
			}
		});
	}

	fillDatatable("", "", "");

	$(".btnSearch").on("click", function() {
		id = $(".searchID").val();
		name = $(".searchName").val();
		type = $(".searchType").val();

		fillDatatable(id, name, type);
	});

	$(".btnClickAddEmployee").click(function(e){
		var thiss = $('#add_employee-form'); // target form
		$(thiss).find('input').val(""); // clean fields 
		$(thiss).find("input:checkbox").prop("checked", false); //unchecked checkbox
		$(thiss).find("select").val("").change();
	});

	$(".saveBtnEmployee").click(function(e){
		e.preventDefault();

		var thiss = $("#add_employee-form");

		var serial = thiss.serialize();

		$.ajax({
			type:'post',
			url: base_url+'Main_settings/insert_employee',
			data: serial,
			beforeSend:function(data){
				$(".cancelBtn, .saveBtnEmployee").prop('disabled', true); 
				$(".saveBtnEmployee").text("Please wait...");	
			},
			success:function(data){
				$(".cancelBtn, .saveBtnEmployee").prop('disabled', false);
				$(".saveBtnEmployee").text("Add Employee");
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
					fillDatatable("", "", ""); //refresh table
					$('#addEmployeeModal').modal('toggle'); //close modal
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
	  		url: base_url+'Main_settings/get_employee',
			data:{'id':id},
			success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
	  				$(".info_id").val(id);
	  				$(".info_empid").val(res[0].empid);
	  				$(".info_fname").val(res[0].fname);
	  				$(".info_mname").val(res[0].mname);
	  				$(".info_lname").val(res[0].lname);
	  				$(".info_type").val(res[0].emptypeid).trigger('change');
	  			}
	  			else {
	  				$(".info_empid").val('');
	  				$(".info_fname").val('');
	  				$(".info_mname").val('');
	  				$(".info_lname").val('');
	  				$(".info_type").val('').trigger('change');
	  			}
				
					$.LoadingOverlay("hide");
					$("#viewEmployeeModal").modal("show");
	  		}
	  	});
	});

	$("#update_employee-form").submit(function(e){
		e.preventDefault();
		var serial = $(this).serialize();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/update_employee',
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
					fillDatatable("", "", ""); //refresh table
					$('#viewEmployeeModal').modal('toggle'); //close modal
				}else{
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
	  		url: base_url+'Main_settings/get_employee',
	  		data:{'id':id},
	  		success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
  					$(".del_id").val(id);
					$(".fullname_del").text(res[0].fname+' '+res[0].lname);
	  			}
				$.LoadingOverlay("hide"); 
				$('#deleteEmployeeModal').modal('show');
	  		}
	  	});
	});

	$('.deleteEmployeeBtn').click(function(e){
		e.preventDefault();

		var del_id = $(".del_id").val();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/delete_employee',
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
					fillDatatable("", "", ""); //refresh table
					$('#deleteEmployeeModal').modal('toggle'); //close modal
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