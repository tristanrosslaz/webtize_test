$(document).ready(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

    $("#divsearchfilter").change(function() {
        var searchtype = $('#divsearchfilter').val();

		if(searchtype == "dividno") {
			$('.dividno').show('slow');
			$('.divname').hide('slow');
			$("#nameSearch").val("");
			$("#idnosearch").val("");      
		}
		else if(searchtype == "divname") {
			$('.divname').show('slow');
			$('.dividno').hide('slow');    
			$("#nameSearch").val("");
			$("#idnosearch").val("");
		}
		else if(searchtype == "divall") {
			$('.divname').hide('slow');
			$('.dividno').hide('slow');    
			$("#nameSearch").val("");
			$("#idnosearch").val("");
		}
	});

	function disableForm(status){
		$("#update_inventory_name").attr("disabled", status);
		$("#update_inventory_category").attr("disabled", status);
		$("#update_unit").attr("disabled", status);
	}
	
	function fillDatatable(searchtype, nameSearch, idnosearch) {
		var dataTable = $('#table-grid').DataTable({
			"destroy": true,
			"serverSide": true,
			"columnDefs": [{ targets: 4, orderable: false, "sClass":"text-center" }],
			"ajax":{
				url:base_url+"inventory/Inv_invstatusupdate/inventory_table", // json datasource
				type: "post",  // method  , by default get,
				data:{'searchtype':searchtype, 'name':nameSearch, 'idno':idnosearch},
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

	fillDatatable("divall", "", "");

	$(".searchBtn").click(function(e){
		e.preventDefault();
		var searchtype = $('#divsearchfilter').val();
		var idnosearch = $("#idnosearch").val();
		var nameSearch = $("#nameSearch").val();
		
		if(searchtype == "dividno") {
			if (idnosearch != "") {
				fillDatatable(searchtype, nameSearch, idnosearch);
			}
			else {
				toastMessage('Note', 'No id number to be search. Please fill in data.', 'error');
			}
		}
		else if(searchtype == "divname") {
			if(nameSearch != "") {
				fillDatatable(searchtype, nameSearch, idnosearch);
			}
			else {
				toastMessage('Note', 'No name to be search. Please fill in data.', 'error');
			}
		}
		else if(searchtype == "divall") {
			fillDatatable(searchtype, nameSearch, idnosearch);
		}
	});

	$('#add_item_btn').click(function(e){
		$('#addItemModal').modal();
		$('#add_inventory_form')[0].reset();
		disableForm(false);
	});

	$('#table-grid').delegate(".btnView", "click", function(){
	  	var id = $(this).data('value');

	  	$.ajax({
	  		type: 'post',
	  		url: base_url+'inventory/Inv_invstatusupdate/get_item',
	  		data:{'id':id},
	  		success:function(data){
	  			data = JSON.parse(data);
				$('#add_inventory_form')[0].reset();
	  			$('#update_inventory_name').val(data.itemname);
				$('#update_item_code').val(data.id);
				$('#update_inventory_category').val(data.catid).change();
				$('#update_unit').val(data.uomid).change();
				if (data.isforsale == "1") { $('#update_is_for_sale').prop("checked", true); }
				if (data.webforsale == "1") { $('#update_web_for_sale').prop("checked", true); }
				if (data.trackinventorycount == "1") { $('#update_track_inventory_count').prop("checked", true); }
				if (data.isportal == "1") { $('#update_is_portal_for_sale').prop("checked", true); }
				if (data.isarchive == "1") { $('#update_is_archive').prop("checked", true); }
				disableForm(true);
				$('#addItemModal').modal();
	  		},
	  		error: function(error){
				toastMessage('Note', 'Something went wrong. Please try again.', 'error');
	  		}
	  	});
	});

	$('#add_inventory_form').submit(function(event){
		event.preventDefault();

		var form = $(this);
		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
		}).done(function(response) {
			var response = JSON.parse(response);

			if (!response.success) {
				toastMessage('Note', response.message, 'error');
			}
			else {
				fillDatatable($('#divsearchfilter').val(), $("#nameSearch").val(), $("#idnosearch").val());
				$('#addItemModal').modal('hide');
				toastMessage('Success', response.message, 'success');
			}
		});
	});
});

