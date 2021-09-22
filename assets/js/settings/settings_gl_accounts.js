$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	function fillDatatable(account, type) {
		var dataTable = $('#table-grid').DataTable({
			"destroy": true,
			"serverSide": true,
			"columnDefs": [
				{ targets: 4, orderable: false, "sClass":"text-center"}
			],
			"ajax":{
				url:base_url+"Main_settings/gl_accounts_table", // json datasource
				type: "post",  // method  , by default get
				data: { "account" : account, "type" : type },
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

	fillDatatable("", "");

	$(".btnSearch").on("click", function(){
		account = $(".searchAccount").val();
		type = $(".type").val();

		fillDatatable(account, type);
	})

	$(".btnClickAddGLAccounts").click(function(e){
		var thiss = $('#add_gl_accounts-form'); // target form
		$(thiss).find('input').val(""); // clean fields 
		$(thiss).find("input:checkbox").prop("checked", false); //unchecked checkbox
	});

	$(".saveBtnGLAccounts").click(function(e){
		
		e.preventDefault();

		var thiss = $("#add_gl_accounts-form");

		var serial = thiss.serialize();

		$.ajax({
			type:'post',
			url: base_url+'Main_settings/insert_gl_accounts',
			data: serial,
			beforeSend:function(data){
				$(".cancelBtn, .saveBtnGLAccounts").prop('disabled', true); 
				$(".saveBtnGLAccounts").text("Please wait...");
				
			},
			success:function(data){
				$(".cancelBtn, .saveBtnGLAccounts").prop('disabled', false);
				$(".saveBtnGLAccounts").text("Add GL Accounts");
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
					fillDatatable("", ""); //refresh table
					$('#addGLAccountsModal').modal('toggle'); //close modal
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
	  		url: base_url+'Main_settings/get_gl_accounts',
	  		data:{'id':id},
	  		success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
	  				$(".info_id").val(id);
	  				$(".info_desc").val(res[0].description);
	  				$(".info_type").val(res[0].acttype);
	  				$(".accountcode").val(res[0].accountcode);
	  			}
	  			else {
	  				$(".info_desc").val('');
	  				$(".info_type").val('');
	  				$(".accountcode").val('');
	  			}
				$.LoadingOverlay("hide"); 
				$("#viewGLAccountsModal").modal("show");
	  		}
	  	});
	});

	$("#update_gl_accounts-form").submit(function(e){
		e.preventDefault();
		var serial = $(this).serialize();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/update_gl_accounts',
			data:serial,
			beforeSend:function(data){
				$(".cancelBtn, .updateBtnGLAccounts").prop('disabled', true); 
				$(".updateBtnGLAccounts").text("Please wait...");
				
			},
			success:function(data){
				$(".cancelBtn, .updateBtnGLAccounts").prop('disabled', false);
				$(".updateBtnGLAccounts").text("Save Changes");
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
					fillDatatable("", ""); //refresh table
					$('#viewGLAccountsModal').modal('toggle'); //close modal
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
	  		url: base_url+'Main_settings/get_gl_accounts',
	  		data:{'id':id},
	  		success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
  					$(".del_id").val(id);
					$(".info_desc").text(res[0].description);
	  			}
				$.LoadingOverlay("hide");
				$('#deleteGLAccountsModal').modal('show');
	  		}
	  	});

	});

	$('.deleteGLAccountsBtn').click(function(e){
		e.preventDefault();

		var del_id = $(".del_id").val();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/delete_gl_accounts',
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
					fillDatatable("", ""); //refresh table
					$('#deleteGLAccountsModal').modal('toggle'); //close modal
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