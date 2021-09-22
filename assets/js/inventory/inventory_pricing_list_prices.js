$(document).ready(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	
	function fillDatatable(pricecat, unit, price) {
		dataTable = $('#table-grid').DataTable({
			destroy: true,
			"serverSide": true,
			"columnDefs": [{ targets: 4, orderable: false, "sClass":"text-center" }],
			"ajax":{
				url:base_url+"inventory/Inv_inventorypricing/inventory_pricing_prices_table", // json datasource
				type: "post",  // method  , by default get
				data:{ 'itemid': $("#itemid").val(), 'pricecat': pricecat, 'unit': unit, 'price': price },
				error: function(){  // error handling
					$(".table-grid-error").html("");
					$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid_processing").css("display","none");
				}
			}
		});
	}

	fillDatatable("", "", "");

	$(".searchBtn").click(function(e){
		e.preventDefault();
		var category	 	= $('#category').val();
		var unit		 	= $("#unit").val();
		var price	 		= $("#price").val();

		fillDatatable(category, unit, price);
	});

	$('#add_item_btn').click(function(e){
		$('#f_price_category').show();
		$('#price_categ_label').show();
		$('#addItemModal').modal();
	});

	$('#table-grid').delegate(".btnView", "click", function(){
	  	var id = $(this).data('value');

	  	$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_inventory/get_item_price',
	  		data:{ 'id': id },
	  		success:function(data) {
	  			data = JSON.parse(data);

	  			$('#f_id').val(data.id);
				$('#f_item_id').val(data.itemid);
				$('#f_price_category').hide();
				$('#price_categ_label').hide();
				$('#f_price').val(data.price);

				$('#addItemModal').modal();
	  		},
	  		error: function(error){
				toastMessage('Note', 'Something went wrong. Please try again.', 'info');
	  		}
	  	});
	});

	$('#add_inventory_price_form').submit(function(event){
		event.preventDefault();

		var form = $(this);

		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
		}).done(function(response) {
			var response = JSON.parse(response);

			if(response.success===false)
			{
				$.toast({
					heading: 'Note',
					text: response.message,
					icon: 'info',
					loader: false,  
					stack: false,
					position: 'top-center', 
					allowToastClose: false,
					bgColor: '#FFA500',
					textColor: 'white'  
				});
			}
			else
			{

				dataTable.draw();


				$("#f_price_category option[value='"+$('#f_price_category').val()+"']").remove();

				$('#addItemModal').modal('hide');
				$('#add_inventory_price_form')[0].reset();

				$.toast({
					heading: 'Success',
					text: response.message,
					icon: 'success',
					loader: false,  
					stack: false,
					position: 'top-center', 
					allowToastClose: false,
					bgColor: '#5cb85c',
					textColor: 'white'  
				});
				
			}

		});
	});

	$('#delete_item_form').submit(function(event){
		event.preventDefault();

		var form = $(this);

		// console.log(form.serialize());

	        $.ajax({
		            url: form.attr('action'),
		            type: form.attr('method'),
					data: form.serialize(),
		        }).done(function(response) {

		            var response = JSON.parse(response);

		            // console.log(response);

		            if(response.success===false)
		            {
		            	$.toast({
						    heading: 'Note',
						    text: response.message,
						    icon: 'info',
						    loader: false,  
						    stack: false,
						    position: 'top-center', 
							allowToastClose: false,
							bgColor: '#FFA500',
							textColor: 'white'  
						});
		            }
		            else
		            {
		            	dataTable.draw();
		            	
		            	$('#deleteItemModal').modal('hide');
		            	$.toast({
						    heading: 'Success',
						    text: response.message,
						    icon: 'success',
						    loader: false,  
						    stack: false,
						    position: 'top-center', 
							allowToastClose: false,
							bgColor: '#5cb85c',
							textColor: 'white'  
						});
						
		            }

		    });
	});


	$('#table-grid').delegate(".btnDelete","click", function(){
		var id = $(this).data('value');

		$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_inventory/get_item_price',
	  		data:{'id':id},
	  		success:function(data){
	  			
	  			data = JSON.parse(data);

	  			$('#del_item_id').val(data.id);
	  			$('#info_desc').html(data.description);
				$('#deleteItemModal').modal();

	  		},
	  		error: function(error){
	  			$.toast({
				    heading: 'Note',
				    text: 'Something went wrong. Please try again.',
				    icon: 'info',
				    loader: false,  
				    stack: false,
				    position: 'top-center', 
					allowToastClose: false,
					bgColor: '#FFA500',
					textColor: 'white'  
				});
	  		}
	  	});

	});

	


});
