$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	function fillDatatable(description) {
		var dataTable = $('#table-grid').DataTable({
			"destroy": true,
			"processing": false,
			"serverSide": true,
			"columnDefs": [
				{ targets: 2, orderable: false, "sClass":"text-center"}
			],
			"ajax":{
				url:base_url+"Main_settings/price_category_table", // json datasource
				type: "post",  // method  , by default get
				data: { "description" : description },
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
		category = $(".searchCategory").val();

		fillDatatable(category);
	});

	$(".btnClickAddPriceCategory").click(function(e){
		var thiss = $('#add_price_category-form'); // target form
		$(thiss).find('input').val(""); // clean fields 
		$(thiss).find("input:checkbox").prop("checked", false); //unchecked checkbox
	});

	$(".saveBtnPriceCategory").click(function(e){
		e.preventDefault();

		var thiss = $("#add_price_category-form");

		var serial = thiss.serialize();

		$.ajax({
			type:'post',
			url: base_url+'Main_settings/insert_price_category',
			data: serial,
			beforeSend:function(data){
				$(".cancelBtn, .saveBtnPriceCategory").prop('disabled', true); 
				$(".saveBtnPriceCategory").text("Please wait...");
				
			},
			success:function(data){
				$(".cancelBtn, .saveBtnPriceCategory").prop('disabled', false);
				$(".saveBtnPriceCategory").text("Add Price Category");
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
					$('#addPriceCategoryModal').modal('toggle'); //close modal
				}
				else{
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
	  		url: base_url+'Main_settings/get_price_category',
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
				$('#viewPriceCategoryModal').modal('show');
	  		}
	  	});
	});

	$("#update_price_category-form").submit(function(e){
		e.preventDefault();
		var serial = $(this).serialize();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/update_price_category',
			data:serial,
			beforeSend:function(data){
				$(".cancelBtn, .updateBtnPriceCategory").prop('disabled', true); 
				$(".updateBtnPriceCategory").text("Please wait...");
				
			},
			success:function(data){
				$(".cancelBtn, .updateBtnPriceCategory").prop('disabled', false);
				$(".updateBtnPriceCategory").text("Save Changes");
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
					$('#viewPriceCategoryModal').modal('toggle'); //close modal
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
	  		url: base_url+'Main_settings/get_price_category',
	  		data:{'id':id},
	  		success:function(data){
	  			var res = data.result;
	  			if (data.success == 1) {
  					$(".del_id").val(id);
					$(".info_desc").text(res[0].description);
	  			}
				$.LoadingOverlay("hide"); 
				$('#deletePriceCategoryModal').modal('show');
	  		}
	  	});

	});

	$('.deletePriceCategoryBtn').click(function(e){
		e.preventDefault();

		var del_id = $(".del_id").val();

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/delete_price_category',
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
					$('#deletePriceCategoryModal').modal('toggle'); //close modal
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
	
});