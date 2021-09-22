$(document).ready(function(){

	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	var apvno = $('#apvno').val();
	
	var itemid = $(".update").data('value');

	dataTable = $('#table-grid2').DataTable({
		"processing": true,
		"serverSide": true,		
		"ajax":{
			url:base_url+"Main_reports/get_popayable_log", // json datasource
			type: "post",  // method  , by default get
			data:{"apvno": apvno},
			complete: function(data)
			{
				var response = $.parseJSON(data.responseText);
				if(response.recordsTotal > 0){	
					$('.printBtn').show('slow');
					$("#table-grid2").find(".tfoot").remove();
					var list = "";
					list += "<tfoot class='tfoot'> <tr> ";
					list += "<th class='text-left'>Credit</th>";
					list += "<th  class='text-left'>Accounts Payable - Liabilities</th>";
					list += "<th class='text-left'>-</th>";
					list += "<th class='text-left'>-</th>";
					list += "<th class='th_total_amount text-left'>"+ response.total +"</th>";
					
					list += " </tr></tfoot>";
					$("#table-grid2").append(list);
				}
				else{
					$("#table-grid2").find(".tfoot").remove();
					$('.printBtn').hide('slow');
				}
				setTimeout(function(){
					$.LoadingOverlay("hide");
				},500); 
			},

			error: function(){  // error handling
				$(".table-grid2-error").html("");
				$("#table-grid2").append('<tbody class="table-grid2-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid2_processing").css("display","none");
			}
		}
	});
		dataTable.destroy();

	$('#table-grid2').delegate(".itemid", "click", function(){
	  	var itemid = $(this).data('value');

	  	dataTable2 = $('#table-grid').DataTable({
	  		destroy: true,
			"processing": true,
			"serverSide": true,		
			"ajax":{
				url:base_url+"Main_reports/get_popayable_breakdown", // json datasource
				type: "post",  // method  , by default get
				data:{"apvno": apvno, "itemid": itemid},
				error: function(){  // error handling
					$(".table-grid-error").html("");
					$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid_processing").css("display","none");
				}
			}
		});

		dataTable2.destroy();
	});

});
