$(document).ready(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	
	function fillDatatable(pricecat, unit, price) {
		dataTable = $('#table-grid').DataTable({
			destroy: true,
			"serverSide": true,
			"ajax":{
				url:base_url+"inventory/Inv_supplierpricing/inventory_supplier_pricing_prices_table", // json datasource
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
		$('#f_supplier').show();
		$('#f_supplier_label').show();
		$('#addItemModal').modal();
		$('#add_inventory_supplier_price_form')[0].reset();
	});

	$('#table-grid').delegate(".btnView", "click", function(){
	  	var id = $(this).data('value');
	  	$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_inventory/get_supplier_item_price',
	  		data:{'id':id},
	  		success:function(data) {
	  			data = JSON.parse(data);
				$('#f_id').val(data.id);
				$('#f_item_id').val(data.itemid);
				$('#f_supplier').hide();
				$('#f_supplier_label').hide();
				$('#f_supplier_unit').val(data.uomid);
				$('#f_conversion_by_unit').val(data.qtyuom);
				$('#f_price').val(data.cost);
				$('#addItemModal').modal();
	  		},
	  		error: function(error) { toastMessage('Note', 'Something went wrong. Please try again.', 'error'); }
	  	});
	});

	$('#add_inventory_supplier_price_form').submit(function(event){
		event.preventDefault();
		var form = $(this);
		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
		}).done(function(response) {
			var response = JSON.parse(response);
			if(response.success === false)
				toastMessage('Note', response.message, 'error');
			else {
				dataTable.draw();
				$("#f_supplier option[value='"+$('#f_supplier').val()+"']").remove();
				$('#addItemModal').modal('hide');
				$('#add_inventory_supplier_price_form')[0].reset();
				toastMessage('Note', response.message, 'success');
			}
		});
	});

	$('#delete_item_form').submit(function(event){
		event.preventDefault();
		var form = $(this);
		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
		}).done(function(response) {
			var response = JSON.parse(response);
			if(response.success===false)
				toastMessage('Note', response.message, 'error');
			else {
				dataTable.draw();
				$('#deleteItemModal').modal('hide');
				toastMessage('Note', response.message, 'success');
			}
		});
	});

	$('#table-grid').delegate(".btnDelete","click", function(event){
		var id = $(this).data('value');
		$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_inventory/get_supplier_item_price',
	  		data:{'id':id},
	  		success:function(data){
	  			data = JSON.parse(data);
	  			$('#del_item_id').val(data.id);
	  			$('#info_desc').html(data.suppliername);
				$('#deleteItemModal').modal();
	  		},
	  		error: function(error){
				toastMessage('Note', 'Something went wrong. Please try again.', 'error');
	  		}
	  	});
	});
});
