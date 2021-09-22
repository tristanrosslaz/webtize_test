$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	function fillDatatable(franchise) {
		var dataTable = $('#table-grid').DataTable({
			"destroy": true,
			"serverSide": true,
			"columnDefs": [
				{ targets: 5, orderable: false, "sClass":"text-center"}
			],
			"ajax":{
				url:base_url+"Main_settings/franchise_table", // json datasource
				type: "post",  // method  , by default get
				data: { "franchise" : franchise},
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
		franchise = $(".searchFranchise").val();

		fillDatatable(franchise);
	});

	accounting.settings = {
		currency: {
			symbol : "",   // default currency symbol is '$'
			format: "%s%v", // controls output: %s = symbol, %v = value/number (can be object: see below)
			decimal : ".",  // decimal point separator
			thousand: "",  // thousands separator
			precision : 2   // decimal places
		},
		number: {
			precision : 0,  // default precision on numbers is 0
			thousand: "",
			decimal : "."
		}
	}

	$(".btnClickAddFranchise").click(function(e){
		var thiss = $('#add_franchise-form'); // target form
		$(thiss).find('input').val(""); // clean fields 
		$(thiss).find("input:checkbox").prop("checked", false); //unchecked checkbox
	});

	$(".saveBtnFranchise").click(function(e){
		
		e.preventDefault();

		var thiss = $("#add_franchise-form");

		var serial = thiss.serialize();

		$.ajax({
			type:'post',
			url: base_url+'Main_settings/insert_franchise',
			data: serial,
			beforeSend:function(data){
				$(".cancelBtn, .saveBtnFranchise").prop('disabled', true); 
				$(".saveBtnFranchise").text("Please wait...");
				
			},
			success:function(data){
				$(".cancelBtn, .saveBtnFranchise").prop('disabled', false);
				$(".saveBtnFranchise").text("Add Franchise");
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
					$('#addFranchiseModal').modal('toggle'); //close modal
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
	  		url: base_url+'Main_settings/get_franchise',
	  		data:{'id':id},
	  		success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
	  				$(".info_id").val(id);
	  				$(".info_desc").val(res[0].description);
	  				$(".info_fee").val(res[0].franchisefee);
	  				$(".info_cashbond").val(res[0].cashbond);
	  				$(".info_commission").val(res[0].commission);
	  			}
	  			else {
	  				$(".info_desc").val('');
	  				$(".info_fee").val('');
	  				$(".info_cashbond").val('');
	  				$(".info_commission").val('');
				}
				  
				$.LoadingOverlay("hide");
				$("#viewFranchiseModal").modal("show");
	  		}
	  	});
	});

	$("#update_franchise-form").submit(function(e){
		e.preventDefault();
		var serial = $(this).serialize();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/update_franchise',
			data:serial,
			beforeSend:function(data){
				$(".cancelBtn, .updateBtnFranchise").prop('disabled', true); 
				$(".updateBtnFranchise").text("Please wait...");
				
			},
			success:function(data){
				$(".cancelBtn, .updateBtnFranchise").prop('disabled', false);
				$(".updateBtnFranchise").text("Save Changes");
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
					$('#viewFranchiseModal').modal('toggle'); //close modal
				}else if(data.success == 2) {
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

		$(this).modal('hide');

	});
	
	$('#table-grid').delegate(".btnDelete","click", function(){
		$.LoadingOverlay("show"); 
		var id = $(this).data('value');

		$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_settings/get_franchise',
	  		data:{'id':id},
	  		success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
  					$(".del_id").val(id);
					$(".info_desc").text(res[0].description);
	  			}
				$.LoadingOverlay("hide"); 
				$('#deleteFranchiseModal').modal('show');
	  		}
	  	});

	});

	$('.deleteFranchiseBtn').click(function(e){
		e.preventDefault();

		var del_id = $(".del_id").val();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/delete_franchise',
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
					$('#deleteFranchiseModal').modal('toggle'); //close modal
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

function isNumberKeyOnly(evt)   
{    
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
          return true;
}
