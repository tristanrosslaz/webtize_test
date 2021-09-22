$(document).ready(function(){
	base_url = $("body").data('base_url');
	currentSelectedItemName = "";
	currenSelectedItemId = "";
	currentSelectedUnit = "";
	TransferDate = "";
	FromLocation = "";
	Type = "";
	TransferEntries = [];

	resetData = function(){
		TransferDate = "";
		FromLocation = "";
		Type = "";
		TransferEntries = [];
		$('#div_2').hide();
		$('#div_1').show();
		$('#lbl_date').html('');
		$('#lbl_from_loc').html('');
		$('#lbl_type').html('');
		$('#add_inventory_entry_modal')[0].reset();
		$('#f1_date').val('');
		$('#f1_from_location').val('');
		$('#f1_type').val('');
	}

	// Step 1 functions

	$('#div_1_submit_button').click(function(event){
		var valid = true;
		var message = "";
		TransferDate = $('#f1_date').val();
		FromLocation = $('#f1_from_location').val();
		Type = $('#f1_type').val();
		if(TransferDate == ""){
			valid = false;
			message += "<label>Transfer Date is required</label>";
		}
		if(FromLocation == ""){
			valid = false;
			message += "<label>Location is required</label>";
		}
		if(Type == ""){
			valid = false;
			message += "<label>Type is required</label>";
		}
		if(valid){
			$('#lbl_date').html('&nbsp;&nbsp;'+TransferDate);
			$('#lbl_from_loc').html('&nbsp;&nbsp;'+$('#f1_from_location option:selected').text());
			$('#lbl_type').html('&nbsp;&nbsp;'+$('#f1_type option:selected').text());
            $('#div_1').css('overflow',"hidden");
            $('#div_1').css('position',"absolute");
            $('#div_1').hide('slide', {direction: 'left'}, 1000);
            $('#div_2').stop().show('slide', {direction: 'right'}, 1000);
			refreshTable();
		}
		else{
			toastMessage('Note', message, 'error');
		}
	});

	// Step 2 functions

	var table = $('#table-grid').DataTable({ //declaring of table
        columnDefs: [{ targets: [4], visible: true, orderable: false, sClass: 'text-center'}]
	});

	// function for binding and refreshing datatable data
    function refreshTable(){
    	table.clear();
    	for(var a = 0; a < TransferEntries.length; a++){
			selectedDataarray = [
                TransferEntries[a].currenSelectedItemId,
                TransferEntries[a].currentSelectedItemName,
                TransferEntries[a].currentSelectedUnit,
                TransferEntries[a].currentItemQuantity,
				"<button class='btn btn-sm btn-danger deletebtn' id = '" + a + "'><i class='fa fa-trash-o'></i> Remove</button>"
            ];// adding selected data to array 

        	table.row.add(selectedDataarray);   
		}        
		table.draw();
		set_handler();
	}

	var options = {
		url: function(phrase) {
			return base_url + 'inventory/Inv_invadjoffset/get_inventory'
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
		if(currentSelectedItemName=="" || currenSelectedItemId==""){
			valid = false;
			message += "<label>Inventory is required</label>";
		}
		if(isNaN($('#f2_quantity').val()) || $('#f2_quantity').val()=="" ){
			valid = false;
			message += "<label>Quantity field is required and only numbers are allowed.</label>";
		}
		if(valid) {
			var entry = {
				currenSelectedItemId: currenSelectedItemId,
				currentSelectedItemName : currentSelectedItemName, 
				currentSelectedUnit: currentSelectedUnit,
				currentItemQuantity: $('#f2_quantity').val()
			}
			if (TransferEntries.length > 0) {
				var existing = false;
				for (var a = 0; a < TransferEntries.length; a++) {
					if( TransferEntries[a].currenSelectedItemId == currenSelectedItemId) {
						existing = true;
						TransferEntries[a].currentItemQuantity = (parseFloat(TransferEntries[a].currentItemQuantity) + parseFloat($('#f2_quantity').val()));
					}
				}
				if (existing == false) {
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
			toastMessage('Note', message, 'error');
		}
	});

	set_handler = function(){
		$('.deletebtn').click(function(e){
			$("#info_desc").text(TransferEntries[e.currentTarget.id].currentSelectedItemName);
			$("#del_item_id").val(e.currentTarget.id);
			$("#deleteItemModal").modal("toggle");
		});
	}

	$("#btnRemove").on("click", function(){
		TransferEntries.splice($("#del_item_id").val(), 1);
		refreshTable();
		$("#deleteItemModal").modal("hide");
	});

	$('#submitbtn').click(function(event){
		var data = {
			'TransferDate': TransferDate,
			'FromLocation': FromLocation,
			'Type': Type,
			'TransferEntries': TransferEntries,
			'Notes': $('#f2_notes').val()
		}
		var hasdata = data["TransferEntries"];
		if (hasdata != "") {
			$.ajax({
				type: 'post',
				url: base_url+'inventory/Inv_invadjoffset/save_inventory_adjustment_offset',
				data:{'data':data},
				success:function(data){
					data = JSON.parse(data);
					if (data.valid==true) {
						toastMessage('Success', data.message, 'success');
						location.reload();
					}
					else {
						toastMessage('Note', data.message, 'error');
					}
				},
				error: function(error) {
					toastMessage('Note', 'Something went wrong. Please try again.', 'error');
				}
			});
		}
		else {
			toastMessage('Note', 'No record found. Please check your data.', 'error');
		}
	});
});
