$(document).ready(function() {
	var base_url = $("body").data('base_url');
	currenSelectedItemId = "";
	currentSelectedItemName = "";
	currentSelectedUnit  = "";

	$('.divdate').show('slow');
    $("#divsearchfilter").change(function() {
        var searchtype = $('#divsearchfilter').val();

		if(searchtype == "dividno") {
			$('.dividno').show('slow');
			$('.divdate').hide('slow');
			$("#idnosearch").val("");      
		}
		else if(searchtype == "divdate") {
			$('.divdate').show('slow');
			$('.dividno').hide('slow');    
			$("#idnosearch").val("");
		}
	});
	
	function fillDatatable(searchtype, datefrom, dateto, idnosearch) {
		var dataTable = $('#table-grid').DataTable({
			"destroy": true,
			"serverSide": true,
			"columnDefs": [{ targets: 5, orderable: false, "sClass":"text-center" }],
			"ajax":{
				url:base_url+"inventory/Inv_invlimitpurchases/inventory_limit_purchases_list", // json datasource
				type: "post",  // method  , by default get,
				data:{'searchtype': searchtype, 'datefrom': datefrom, 'dateto': dateto, 'idno': idnosearch},
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

	fillDatatable($('#divsearchfilter').val(), formatDate($("#datefrom").val()), formatDate($("#dateto").val()), "");

	$(".searchBtn").click(function(e){
		e.preventDefault();
		var searchtype = $('#divsearchfilter').val();
		var idnosearch = $("#idnosearch").val();
		var datefrom = formatDate($("#datefrom").val());
		var dateto = formatDate($("#dateto").val());

		if(searchtype == "dividno") {
			if(idnosearch != "") {
				fillDatatable(searchtype, datefrom, dateto, idnosearch);
			}
			else {
				toastMessage('Note', 'No name to be search. Please fill in data.', 'error');
			}
		}
		else if(searchtype == "divdate") {
			if(datefrom != "" && dateto != "") {
				fillDatatable(searchtype, datefrom, dateto, idnosearch);
			}
			else {
				toastMessage('Note', 'No date to be search. Please fill in date range.', 'error');
			}
		}
	});

	var options = {
		url: function(phrase) {
			return base_url+'inventory/Inv_invlimitpurchases/get_inventory'
		},
		getValue: function(element) {
			return element.itemname;
		},
		list: {
			onSelectItemEvent: function() {
				currenSelectedItemId = $("#f_itemname").getSelectedItemData().id;
				currentSelectedItemName = $("#f_itemname").getSelectedItemData().itemname;
				currentSelectedUnit = $("#f_itemname").getSelectedItemData().unit;
			},
		},
		ajaxSettings: {
			dataType: "json",
			method: "POST",
			data: {
				dataType: "json"
			}
		},
		preparePostData: function(data) {
			data.phrase = $("#f_itemname").val();
			return data;
		},
		requestDelay: 400
	};

	$("#f_itemname").easyAutocomplete(options);
	$('.easy-autocomplete').css('width','100%');
	$('#f_itemname').css('width', '100%');
	$('#f_itemname').css('height', '40px');

	$('#add_item_btn').click(function(){
		$('#addItemModal').modal();
		$('#f_itemname').prop("readonly", false);
		$('#f_id').prop("readonly", false);
		$('#add_purchase_limit_form')[0].reset();
		$('#f_start_date').datepicker("setDate", removeFormatDate(date));
		$('#f_end_date').datepicker("setDate", removeFormatDate(date));
	});

	$('#table-grid').delegate(".btnUpdate", "click", function(){
	  	var id = $(this).data('value');

	  	$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_inventory/get_purchase_limit',
	  		data:{'id':id},
	  		success:function(data){
	  			data = JSON.parse(data);
	  			$('#f_itemname').val(data.itemname);
				$('#f_itemname').prop("readonly", true);
	  			$('#f_id').val(data.id);
				$('#f_start_date').datepicker("setDate", removeFormatDate(data.startdate));
				$('#f_end_date').datepicker("setDate", removeFormatDate(data.enddate));
				$('#f_quantity').val(data.quantity);
	  			$('#addItemModal').modal();
	  		},
	  		error: function(error) {
				toastMessage('Note', 'Something went wrong. Please try again.', 'error');
	  		}
	  	});
	});

	$('#add_purchase_limit_form').submit(function(event){
		event.preventDefault();

		var form = $(this);

		form.append();	
		if($("#f_id").val() != "" || currenSelectedItemId != "") {
			formdata = form.serializeArray();
			formdata.push({name: "currenSelectedItemId", value: currenSelectedItemId});

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: formdata,
			}).done(function(response) {
				var response = JSON.parse(response);
				if(!response.valid) {
					toastMessage('Note', response.message, 'error');
				}
				else {
					toastMessage('Success', response.message, 'success');
					fillDatatable($('#divsearchfilter').val(), formatDate($("#datefrom").val()), formatDate($("#dateto").val()), "");
					$('#addItemModal').modal('hide');
				}
			});
		}
		else {
			toastMessage('Note', 'Item does not existed in the database. Please check your data.', 'error');
		}
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
			if(!response.success) {
				toastMessage('Note', response.message, 'error');
			}
			else {
				toastMessage('Success', response.message, 'success');
				fillDatatable($('#divsearchfilter').val(), formatDate($("#datefrom").val()), formatDate($("#dateto").val()), "");
				$('#deleteItemModal').modal('hide');
			}
		});
	});

	$('#table-grid').delegate(".btnDelete","click", function(){
		var id = $(this).data('value');

		$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_inventory/get_purchase_limit',
	  		data:{'id':id},
	  		success:function(data){
	  			data = JSON.parse(data);
	  			$('#del_item_id').val(data.id);
	  			$('#info_desc').html(data.itemname);
				$('#deleteItemModal').modal();
	  		},
	  		error: function(error){
				toastMessage('Success', 'Something went wrong. Please try again.', 'success');
	  		}
	  	});
	});
});