$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	var username = ""; // wala talagang laman to dapat for officer lang
	var searchtype = $('#sosearchfilter').val(); // id ng dropdown

	$("#sosearchfilter").change(function() {
		
		var currentdate = new Date();
		var searchtype = $('#sosearchfilter').val(); // id ng dropdown
		if(searchtype == "ponodiv")
		{
			$(".searchDateTo").val("");
			$(".searchDateFrom").val("");
			$(".search_status").val("");
			$('.ponodiv').show('slow');	
			$('.podatediv').hide('slow');
			$(".search_customer").val("");	
			$('.searchbyName').hide('slow');
			$('.poshipping').hide('slow');
			$('.ponostatus').hide('slow');
			$('.search_po_btn').show('slow');
			$("#search_shipping").val("");	
		}
	});

	$("#search_order").click(function() {
		var searchDateTo = $('.searchDateTo').val();
		var searchDateFrom = $('.searchDateFrom').val();
		var warehouse = $('.search_warehouse').val();
		if(searchDateTo == "" && searchDateFrom == ""){
			$.toast({
				heading: 'Note',
				text: "No date found. Please choose a date.",
				icon: 'info',
				loader: false,   
				stack: false,
				position: 'top-center',  
				bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 4000          
			});
		}else if(warehouse == "none"){
			$.toast({
				heading: 'Note',
				text: "No data found. Please choose warehouse.",
				icon: 'info',
				loader: false,   
				stack: false,
				position: 'top-center',  
				bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 4000          
			});
		}else{

			$(".table_prep").show();
			$(".BtnSaveSOPrep").show();

			var date1 = formatDate(searchDateFrom);
			var date2 = formatDate(searchDateTo);
			$("#table-grid").prop('hidden',false);

			$("body").LoadingOverlay("hide"); 
			if($("#search_warehouse").val() == "all"){
				$("#checkedAll").prop("hidden", true);
			}else{
				$("#checkedAll").prop("hidden", false);
			}

			var dataTable = $('#table-grid').DataTable({
				
				"serverSide": true,
				"order": [[ 1, "desc" ]],
				"columnDefs": [{ "orderable": false, "targets": [ 4 ], "className": "dt-center" }],
				"ajax":{
				url :base_url+"Main_sales/table_sales_preparation", // json datasource
				type: "post",  // method  , by default get
				data:{'date1':date1, 'date2':date2, 'warehouse':warehouse},
				beforeSend:function(data)
				{
					$("body").LoadingOverlay("show"); 
				},
				error: function(){  // error handling
					$(".table-grid-error").html("");
					$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid_processing").css("display","none");


				},
				complete: function(){
					$("body").LoadingOverlay("hide"); 
					if($("#search_warehouse").val() == "all"){
						$(".prep_check").prop("hidden", true);
					}
				},
			}
		}); 

			dataTable.destroy();
		}
	});

	$("#checkedAll").click(function(){
		$('input:checkbox').not(this).prop('checked', this.checked);

		if ($('input[name="prep_check"]:checked').length > 0) {
			$("#BtnSaveSOPrep").prop("disabled", false);
		}
		else {
			$("#BtnSaveSOPrep").prop("disabled", true);
		}
	});

	$("#table-grid").delegate( ".prep_check", "click", function() {
		if ($('input[name="prep_check"]:checked').length > 0) {
			$("#BtnSaveSOPrep").prop("disabled", false);
		}
		else {
			$("#BtnSaveSOPrep").prop("disabled", true);
		}

		if (($('input[name="prep_check"]:checked').length) == $('input[name="prep_check"]').length) {
			$("#checkedAll").prop("checked", true);
		}
		else {
			$("#checkedAll").prop("checked", false);
		}
	});


	$(".BtnSaveSOPrep").click(function(e){
		e.preventDefault();

		var token = $("#token").val();    
        var count = $("#tdata").val(); // validation    
        
        var checkbox_value = "";
        $("input.prep_check[type=checkbox]").each(function () {
        	var ischecked = $(this).is(":checked");
        	if (ischecked) {
        		checkbox_value +=  $(this).val() + ["|"];
        	}
        });

        $.ajax({
        	type:'post',
        	url:base_url+'Main_sales/table_save_soprep',
        	data:{
        		"checkbox_value":checkbox_value,
        	},
        	beforeSend:function(data)
        	{
        		$("body").LoadingOverlay("show"); 
        		$("#BtnSaveSOPrep").prop("disabled", true);
        	},
        	complete: function(){
        		$("body").LoadingOverlay("hide"); 
        	},
        	success:function(data){
        		if(data.success == 1)
        		{     
        			$.toast({
        				heading: 'Success',
        				text: data.message,
        				icon: 'success',
        				loader: false,  
        				stack: false,
        				position: 'top-center', 
        				bgColor: '#5cb85c',
        				textColor: 'white',
        				allowToastClose: false,
        				hideAfter: 3000
        			});
        			
        		} else{
        			$.toast({
        				heading: 'Note',
        				text: data.message,
        				icon: 'error',
        				loader: false,  
        				stack: false,
        				position: 'top-center', 
        				bgColor: '#f0ad4e',
        				textColor: 'white',
        				allowToastClose: false,
        				hideAfter: 3000
        			});

        		}
        		window.setTimeout(function(){
        			window.location.href=base_url+"Main_sales/sales_order_preparation/" + token;
        		},1000)
        	}   
        });    
    });
	
});

function formatDate(date) {
	var d = new Date(date),
	month = '' + (d.getMonth() + 1),
	day = '' + d.getDate(),
	year = d.getFullYear();

	if (month.length < 2) month = '0' + month;
	if (day.length < 2) day = '0' + day;

	return [year, month, day].join('-');
}