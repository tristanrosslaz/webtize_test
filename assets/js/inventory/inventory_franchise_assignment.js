$(document).ready(function(){
	$('#submitbtn').hide();
	currenSelectedItemId = "";
	currentSelectedItemName = "";
	currentSelectedUnit  = "";
	base_url = $("body").data('base_url');
	Entries = [];

	resetData = function(){
		Entries = [];
	}

	$('#select_all_toggle').click(function(e){
		var eleval = $('#select_all_toggle').prop("checked");
		var checkboxes = document.getElementsByTagName('input');
		if (eleval) {
			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i].type == 'checkbox') {
					checkboxes[i].checked = true;
				}
			}
		}
		else {
			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i].type == 'checkbox') {
					checkboxes[i].checked = false;
				}
			}
		}
	});

	function checkAll(ele) {
		var checkboxes = document.getElementsByTagName('input');
		if (ele.checked) {
			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i].type == 'checkbox') {
					checkboxes[i].checked = true;
				}
			}
		}
		else {
			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i].type == 'checkbox') {
					checkboxes[i].checked = false;
				}
			}
		}
	}

	var options = {
		url: function(phrase) {
			return base_url+'Main_inventory/get_inventory'
		},
		getValue: function(element) {
			return element.itemname;
		},
		list: {
			onSelectItemEvent: function() {
				currenSelectedItemId = $("#searchbar").getSelectedItemData().id;
				currentSelectedItemName = $("#searchbar").getSelectedItemData().itemname;
				currentSelectedUnit = $("#searchbar").getSelectedItemData().unit;
			}
		},
		ajaxSettings: {
			dataType: "json",
			method: "POST",
			data: {
			dataType: "json"
			}
		},
		preparePostData: function(data) {
			data.phrase = $("#searchbar").val();
			return data;
		},
		requestDelay: 400
	};

	$("#searchbar").easyAutocomplete(options);
	$('.easy-autocomplete').css('width','100%');
	$('#searchbar').css('width', '100%');
	$('#searchbar').css('height', '40px');

	refreshTable = function(){
		var tableBody = "";
		for(var a = 0; a<Entries.length; a++){
			var tableRow = "<tr>"+
								"<td><input type='checkbox' class='assignment_checkbox' id='"+Entries[a].id+"'";
				
				if(parseInt(Entries[a].assignment_count)>0){
					tableRow += " checked ";
				}

				tableRow +=   "></td>"+
								"<td>"+Entries[a].description+"</td>"
								"<td>"+
									"<button class='btn btn-sm btn-secondary deletebtn' id='"+a+"'><i class='fa fa-trash'></i></button>"+
								"</td>"+
							"</tr>";
			tableBody+= tableRow;
		}
		
		$('#t_body').html(tableBody);
	}

	$('#searchtrigger').click(function(){
		$.ajax({
			type: 'post',
			url: base_url + 'Main_inventory/get_franchise_assignments',
			data:{'id': currenSelectedItemId },
			success:function(data){
				Entries = [];
				data = JSON.parse(data);

				for(var a = 0; a<data.length; a++){
					var entry ={
						'id': data[a].id,
						'description':data[a].description,
						'assignment_count': data[a].assignment_count
					}

					Entries.push(entry);
				}
				refreshTable();
				$('#submitbtn').show();

			},
			error: function(error) {
				toastMessage('Note', 'Something went wrong. Please try again.', 'error');
			}
		});
	});

	$('#submitbtn').click(function(){
		var boxes = [];
		$('.assignment_checkbox').each(function() {
			var box = {
				'id': $(this).prop('id'),
				'checked': $(this).prop('checked')
			}
			boxes.push(box);
		});

		$.ajax({
			type: 'post',
			url: base_url+'Main_inventory/save_franchise_assignments',
			data:{'currenSelectedItemId': currenSelectedItemId, 'boxes': boxes },
			success:function(data){
				data = JSON.parse(data);
				if (data.valid == true) {
					toastMessage('Success', data.message, 'success');
				}
				else {
					toastMessage('Success', 'Something went wrong. Please try again.', 'error');
				}
			},
			error: function(error) {
				toastMessage('Note', 'Something went wrong. Please try again.', 'error');
			}
		});
	})
});
