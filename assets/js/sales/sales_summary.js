$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	var username = ""; // wala talagang laman to dapat for officer lang
	var searchtype = $('#sosearchfilter').val(); // id ng dropdown

	$("#sosearchfilter").change(function() {
		
		var searchtype = $('#sosearchfilter').val(); // id ng dropdown

		$("#date_to").datepicker("setDate", new Date());
		$("#date_from").datepicker("setDate", new Date());
		
		if(searchtype == "ponodiv")
		{
			$('.podatediv').hide('slow');
			$('.search_po_btn').show('slow');
			$('.ponodiv').show('slow');	
			$('.searchbyName').hide('slow');
			$('.poshipping').hide('slow');
			$('.ponostatus').hide('slow');

			$("#search_status").val("");
			$("#search_customer").val("");	
			$("#search_shipping").val("");	
		}
		if(searchtype == "podatediv")
		{
			$('.ponodiv').hide('slow');
			$('.podatediv').show('slow');
			$('.poshipping').hide('slow');
			$('.searchbyName').hide('slow');
			$('.ponostatus').hide('slow');
			$('.search_po_btn').show('slow');

			$("#search_shipping").val("");	
			$("#search_customer").val("");	
			$("#search_status").val("");	
			$("#search_sono").val("");	
		}
		if(searchtype == "ponostatus")
		{
			$('.podatediv').show('slow');
			$('.ponostatus').show('slow');
			$('.ponodiv').hide('slow');
			$('.searchbyName').hide('slow');
			$('.poshipping').hide('slow');
			$('.search_po_btn').show('slow');

			$("#search_shipping").val("");	
			$("#search_sono").val("");	
			$("#search_customer").val("");	
		}
		if(searchtype == "searchbyName")
		{
			$('.ponodiv').hide('slow');
			
			$('.podatediv').show('slow');
			$('.ponostatus').hide('slow');
			
			$('.search_po_btn').show('slow');
			$('.poshipping').hide('slow');
			$('.searchbyName').show('slow');

			$("#search_sono").val("");	
			$("#search_shipping").val("");	
			$("#search_status").val("");
		}
		if(searchtype == "poshipping")
		{
			$('.ponodiv').hide('slow');	
			$('.podatediv').show('slow');
			$('.searchbyName').hide('slow');
			$('.ponostatus').hide('slow');
			$('.poshipping').show('slow');
			$('.search_po_btn').show('slow');

			$("#search_sono").val("");	
			$(".search_status").val("");
			$(".search_customer").val("");	
		}
	});

	// 081518 - josh

	var dataTable = $('#table-grid').DataTable({
		
		"serverSide": true,
		"order": [[ 1, "desc" ]],
		"columnDefs": [{ "orderable": false, "targets": [ 6 ], "className": "dt-center" }],
		"destroy": true,
		"ajax":{
			url :base_url+"Main_sales/table_sales_summary_j", // json datasource
			type: "post",
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
	    }
	});



	$("#searchBtn").click(function(){
		$(".loader").show();
		$("#table_salesorder").hide();

		var i1 =$('#date_from').attr('data-column');  // getting column index
		var v1 =$('#date_from').val();  // getting search input value
		var i2 =$('#date_to').attr('data-column');  // getting column index
		var v2 =$('#date_to').val();  // getting search input value
		var i3 =$('#search_sono').attr('data-column');  // getting column index
		var v3 =$('#search_sono').val();  // getting search input value
		var i4 =$('#search_status').attr('data-column');  // getting column index
		var v4 =$('#search_status').val();  // getting search input value
		var i5 =$('#search_customer').attr('data-column');  // getting column index
		var v5 =$('#search_customer').val();  // getting search input value
		var i6 =$('#search_shipping').attr('data-column');  // getting column index
		var v6 =$('#search_shipping').val();  // getting search input value

        dataTable.columns(i1).search(v1)
                 .columns(i2).search(v2)
                 .columns(i3).search(v3)
                 .columns(i4).search(v4)
                 .columns(i5).search(v5)
                 .columns(i6).search(v6)
                 // .columns(i7).search(v7)
                 .draw();
	});

});