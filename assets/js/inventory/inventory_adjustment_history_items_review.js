$(document).ready(function(){
	base_url = $("body").data('base_url');
	adjno = $("#adjno").val();

	$('#table-grid').DataTable({
		"destroy": true,
		"serverSide": true,
		"columnDefs": [{ targets: [1,2,3], orderable: false}],
		"ajax":{
			url:base_url + "inventory/Inv_invadjhistory/get_adjustment_items", // json datasource
			type: "post",  // method  , by default get,
			data:{'adjno':adjno},
			beforeSend:function(data) {
				$.LoadingOverlay("show"); 
			},
			complete: function(data) {
				$.LoadingOverlay("hide");
				$('#lbl_date').html(data.responseJSON.trandate);
				$('#lbl_loc').html(data.responseJSON.itemloc);

				if(data.responseJSON.adjtype == "plus"){
					$('#lbl_type').html('Positive Adjustment');
				}
				else{
					$('#lbl_type').html('Negative Adjustment');
				}
				
				$('#lbl_class').html(data.responseJSON.classification);
				$('#f2_notes').val(data.responseJSON.notes);
			},
			error: function(){  // error handling
				$(".table-grid-error").html("");
				$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");
			}
		}
	});

	$('.printBtn').click(function(e){
		var currUrl = window.location.href;
		currUrl = currUrl.replace("inventory_adjustment_history_items_review", "inventory_adjustment_history_items_review_print");
		window.open (currUrl, '_blank');
	});
});
