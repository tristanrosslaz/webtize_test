$(document).ready(function(){
	base_url = $("body").data('base_url');
	currentSelectedItemName = "";
	currenSelectedItemId = "";
	currentSelectedUnit = "";
	TransferDate = "";
	FromLocation = "";
	ToLocation = "";
	TransferEntries = [];
	iltno = $('#iltnumberli').val();
	
	var table = $('#table-grid').DataTable({ //declaring of table
		columnDefs: [{ targets: [4], visible: true, orderable: false, sClass: 'text-center'}]
	});

	// get all items of the ITL
	// gathered data will be stored in TransferEntries array and the will be used to populate the datatable
	$.ajax({
		type: 'post',
		url: base_url + 'inventory/Inv_ilthistory/get_location_transfer_items',
		data:{'data': iltno },
		beforeSend:function(data) {
			$.LoadingOverlay("show"); 
	  	},
		success:function(data) {
			$.each(eval(data), function(key, value){
				TransferDate = value.trandate;
				FromLocation = value.itemlocid1;
				ToLocation = value.itemlocid2;
				$("#lbl_from_loc").text(value.locfrom);
				$("#lbl_to_loc").text(value.locto);
				$("#f2_notes").val(value.notes);

				data = {
					currenSelectedItemId: value.itemid,
					currentSelectedItemName: value.itemname, 
					currentSelectedUnit: value.description,
					currentItemQuantity: value.tranqty
			  	}
			  
				TransferEntries.push(data);
			});
			$("#lbl_date").text(TransferDate);
			refreshTable();
			$.LoadingOverlay("hide");
		}
	});

	// function for binding and refreshing datatable data
    function refreshTable(){
    	table.clear();
    	for(var a = 0; a < TransferEntries.length; a++){
			selectedDataarray = [
                TransferEntries[a].currenSelectedItemId,
                TransferEntries[a].currentSelectedItemName,
                TransferEntries[a].currentSelectedUnit,
                accounting.formatMoney(TransferEntries[a].currentItemQuantity),
				"<button class='btn btn-sm btn-danger deletebtn' id = '" + a + "'><i class='fa fa-trash-o'></i> Remove</button>"
            ];// adding selected data to array 

        	table.row.add(selectedDataarray);   
		}        
		table.draw();
		set_handler();
	}

	resetData = function() {
		TransferEntries = [];
		$('#add_inventory_entry_modal')[0].reset();
	}

	$('.printBtn').click(function(e){
		var currUrl = window.location.href;
		currUrl = currUrl.replace("inventory_location_transfer_transaction_history_items", "inventory_location_transfer_transaction_history_items_print");
		window.open (currUrl, '_blank');
	})

	var options = {
		url: function(phrase) {
			return base_url+'Main_inventory/get_inventory'
		},
		getValue: function(element) {
			return element.itemname;
		},
		list: {
			onSelectItemEvent: function() {
				currenSelectedItemId = $("#f2_inventory").getSelectedItemData().id;
				currentSelectedItemName = $("#f2_inventory").getSelectedItemData().itemname;
				currentSelectedUnit = $("#f2_inventory").getSelectedItemData().unit;
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
			data.phrase = $("#f2_inventory").val();
			return data;
		},
		requestDelay: 400
	};

	$("#f2_inventory").easyAutocomplete(options);
	$('.easy-autocomplete').css('width', '100%');

	$('#add_inventory_entry_modal').submit(function(event){
		event.preventDefault();

		var valid = true;
		var message = "";

		if (currentSelectedItemName == "" || currenSelectedItemId == "") {
			valid = false;
			message += "<label>Inventory is required</label>";
		}

		if(isNaN($('#f2_quantity').val()) || $('#f2_quantity').val()=="" ){
			valid = false;
			message += "<label>Quantity field is required and only numbers are allowed.</label>";
		}

		if(valid){
			var entry = {
				currenSelectedItemId: currenSelectedItemId,
				currentSelectedItemName : currentSelectedItemName, 
				currentSelectedUnit: currentSelectedUnit,
				currentItemQuantity: $('#f2_quantity').val()
			}

			if(TransferEntries.length>0){
				var existing = false;

				for(var a=0; a<TransferEntries.length; a++){
					if(TransferEntries[a].currenSelectedItemId==currenSelectedItemId){
						existing = true;
						TransferEntries[a].currentItemQuantity = (parseFloat(TransferEntries[a].currentItemQuantity)+parseFloat($('#f2_quantity').val()));
					}
				}

				if(existing==false){
					TransferEntries.push(entry);
				}
			}
			else {
				TransferEntries.push(entry);
			}

			refreshTable();

			$('#add_inventory_entry_modal')[0].reset();
			$('#addItemModal').modal('hide');

		}
		else {
			toastMessage('Note', message, 'error')
		}
	});

	set_handler = function(){
		$('.deletebtn').click(function(e) {
			TransferEntries.splice(e, 1);
			refreshTable();
		});
	}

	$('#submitbtn').click(function(event){
		var data = {
			'TransferDate': TransferDate,
			'FromLocation': FromLocation,
			'ToLocation': ToLocation,
			'TransferEntries': TransferEntries,
			'Notes': $('#f2_notes').val(),
			'ILTNo': iltno
		}

		$.ajax({
			type: 'post',
			url: base_url+'inventory/Inv_ilthistory/save_inventory_trasnfer_location_edit',
			data:{'data':data},
			beforeSend:function(){
				$.LoadingOverlay("show"); 
			},
			complete:function(){
				$.LoadingOverlay("hide"); 
			},
			success:function(data){
				data = JSON.parse(data);
				if(data.valid==false){
					toastMessage('Note', data.message, 'error');
				}
				else {
					toastMessage('Success', data.message, 'success');
					location.reload();
				}
			},
			error: function(error){
				toastMessage('Note', 'Something went wrong. Please try again.', 'error');
			}
		});
	});
});
