$(document).ready(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url()
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
			"columnDefs": [{ targets: 4, orderable: false, "sClass":"text-center" }],
			"ajax":{
				url:base_url+"inventory/Inv_ilthistory/ilt_transaction_history_records", // json datasource
				type: "post",  // method  , by default get,
				data:{ 'searchtype': searchtype, 'datefrom': datefrom, 'dateto': dateto, 'idno': idnosearch},
				beforeSend:function(data) {
					$("#table-grid").LoadingOverlay("show"); 
				},
				complete: function() {
					$("#table-grid").LoadingOverlay("hide"); 
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
				toastMessage('Note', 'No ILT number to be search. Please fill in data.', 'error');
			}
		}
		else if(searchtype == "divdate") {
			if(datefrom != "" && dateto != "") {
				fillDatatable(searchtype, datefrom, dateto, idnosearch);
			}
			else {
				toastMessage('Note', 'No name to be search. Please fill in data.', 'error');
			}
		}
	});

	$('#table-grid').delegate(".btnView", "click", function(){
	  	var id = $(this).data('value');
	  	var currUrl = window.location.href;

	  	currUrl = currUrl.replace("inventory_location_transfer_transaction_history", "inventory_location_transfer_transaction_history_items");
	  	window.location = currUrl+"/"+id;
	});
});