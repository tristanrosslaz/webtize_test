$(document).ready(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
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
			"columnDefs": [{ targets: 5, orderable: false, "sClass": "text-center" }],
			"ajax":{
				url:base_url+"inventory/Inv_iltreceive/inventory_ilt_receive_tables", // json datasource
				type: "post",  // method  , by default get,
				data:{'searchtype': searchtype,'datefrom': datefrom, 'dateto': dateto, 'idno': idnosearch},
				beforeSend:function(data) {
					$("#table-grid").LoadingOverlay("show"); 
				},
				complete: function() {
					$("#table-grid").LoadingOverlay("hide"); 
				},
				error: function() {  // error handling
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

		if (searchtype == "dividno") {
			if(idnosearch != "") {
				fillDatatable(searchtype, datefrom, dateto, idnosearch);
			}
			else {
				toastMessage('Note', 'No ILT number to be search. Please fill in data.', 'error');
			}
		}
		else if (searchtype == "divdate") {
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
	  	var tranqty = $(this).data('tranqty');
		$('#receiveForm')[0].reset();

		if (id > 0) {
			$("#iltno").val(id);
			$("#totalqty").val(accounting.formatMoney(tranqty));
			$("#iltqty").attr({"max" : tranqty});
		}
	});

	$(".saveILTbtn").click(function(e){
		e.preventDefault();
		var iltno = $('#iltno').val();
		var iltqty = $('#iltqty').val();
		var totalqty = $('#totalqty').val();

		if(iltqty > 0) {
			$.ajax({
				type: 'post',
				url: base_url+'Main_inventory/save_inventory_ilt_receive',
				data:{ 'iltno': iltno },
				beforeSend:function(data) {
					$(".saveILTbtn").prop("disabled",true);
				},
				success:function(data) {
					if (data.success == 1) {
						toastMessage('Success', 'You have successfully received inventory location transfer.', 'success');
					}
					$(".saveILTbtn").prop("disabled",false);
					$('#receiveForm')[0].reset();
					fillDatatable($('#divsearchfilter').val(), formatDate($("#datefrom").val()), formatDate($("#dateto").val()), "");
				}
			});

			setTimeout(function(){
				$('#receiveItemModal').modal('hide');
			},500);
		}	
		else {
			toastMessage('Note', 'No quantity found. Please check your data.', 'error');
		}
	});

	// user cannot input release quantity higher than the ITL Quantity or lower than 0
	$('#iltqty').on('keydown keyup', function(e){
        if ($(this).val() > parseInt($(this).attr('max')) 
            && e.keyCode !== 46 // keycode for delete
            && e.keyCode !== 8 // keycode for backspace
           	) {
           	e.preventDefault();
           	$(this).val($(this).attr('max'));
        }
    });
});