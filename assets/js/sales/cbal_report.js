$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	var username = ""; // wala talagang laman to dapat for officer lang
	var searchtype = $('#sosearchfilter').val(); // id ng dropdown
	var token = $("#hdnToken").val();

	function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
	}
	
	function fillDatatable(cx_search) {
		var dataTable = $('#table-grid').DataTable({
			"serverSide": true,
			"order": [[ 3, "desc" ]],
			"columnDefs": [
				{ "targets": [ 1, 2, 3, ], "className": "dt-right" },
				{ "orderable": false, "targets": [ 4 ], "className": "dt-center" },
			],
			"destroy": true,
			"ajax":{
				url :base_url+"Main_reports/si_table", // json datasource
				type: "post",
				data: {'cx_search' : cx_search},
				beforeSend:function(data){
					$.LoadingOverlay("show"); 
				},
				error: function(){  // error handling
					$(".table-grid-error").html("");
					$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid_processing").css("display","none");
					$("#btn_export_excel").prop('hidden',true);
				},
				complete: function(data)
				{
					$.LoadingOverlay("hide");
				}
			},
			"fnDrawCallback": function(){
				var api = this.api()
				var json = api.ajax.json();
				// console.log(json);
				$(".loader").hide();
				$("#table_salesorder").show();
				$("#total_si").html(`<strong>${json.total_si}</strong>`)
				$("#total_pd").html(`<strong>${json.total_pd}</strong>`)
				$("#total_bal").html(`<strong>${json.total_bal}</strong>`)
			},
		});
	}

	fillDatatable('')

	$(document).on('click', '.searchBtn', function(){
		const cx_search = $('#cx_search').val()
		
		fillDatatable(cx_search)
	})
});