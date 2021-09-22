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
	
	function fillDatatable(searchtype, nameSearch, idnosearch) {
		var dataTable = $('#table-grid').DataTable({
			"destroy": true,
			"serverSide": true,
			"columnDefs": [{ targets: 4, orderable: false, "sClass":"text-center" }],
			"ajax":{
				url:base_url+"inventory/Inv_suppinvpricing/inventory_supplier_pricing_table",
				type: "post",  // method  , by default get,
				data:{'searchtype':searchtype,'name':nameSearch,'idno':idnosearch},
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
		var nameSearch = $("#nameSearch").val();
		var idnosearch = $("#idnosearch").val();
		
		if (searchtype == "dividno") {
			if (idnosearch != "") {
				fillDatatable(searchtype, nameSearch, idnosearch);
			}
			else {
				toastMessage('Note', 'No item code to be search. Please fill in data.', 'error');
			}
		}
		else if (searchtype == "divname") {
			if (nameSearch != "") {
				fillDatatable(searchtype, nameSearch, idnosearch);
			}
			else {
				toastMessage('Note', 'No name to be search. Please fill in data.', 'error');
			}
		}
		else if (searchtype == "divall") {
			fillDatatable(searchtype, nameSearch, idnosearch);
		}
	});

	$('#table-grid').delegate(".btnView", "click", function() {
	  	var id = $(this).data('value');

	  	var currUrl = window.location.href;

	  	currUrl = currUrl.replace("inventory_supplier_pricing", "inventory_supplier_pricing_list_prices");
	  	window.location = currUrl+"/"+id;
	});
});