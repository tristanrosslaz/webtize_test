$(document).ready(function(){

	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	var pulno = $('.pulno').val();

	dataTable = $('#table-grid2').DataTable({
		"processing": true,
		"serverSide": true,		
		"ajax":{
			url:base_url+"Main_reports/package_pullout_table", // json datasource
			type: "post",  // method  , by default get
			data:{"pulno": pulno},
			error: function(){  // error handling
				$(".table-grid-error").html("");
				$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");
			}
		}
	});

});
