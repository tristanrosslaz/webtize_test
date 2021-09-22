$(document).ready(function(){


	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	$('.bddatediv').show('slow');
	var searchtype = "none";
	var category = $("#category").val();
	//start

	

	$(".btnSearchSO").click(function(e){
		e.preventDefault();
		var date1 = $("#datefrom").val();
		var date2 = $("#dateto").val();
		var category = $("#category").val();
		var location = $("#location").val();
		var checker=0;
		var searchtype = "bddatediv";
		$("#datefrom1").val(date1)
		$("#dateto1").val(date2)
		$("#category1").val(category)
		var datefrom1 = $("#datefrom1").val();
		var dateto1 = $("#dateto1").val();
		var category1 = $("#category1").val();

		if(date1 == "" && date2 == "" && category == "none" && location == "none")
		{
			checker=0;
			$.toast({
			    heading: 'Note:',
			    text: "Please fill date range field, select Supplier and Search Type.",
			    icon: 'info',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		}
		else if(date1 != "" && date2 != "" && category == "none" && location == "none")
		{
			$('.printBtn').hide('slow');
			checker=0;
			$.toast({
			    heading: 'Note:',
			    text: "Please select Supplier and Search Type.",
			    icon: 'info',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		}
		else if(date1 != "" && date2 != "" && category != "none" && location == "none")
		{
			$('.printBtn').hide('slow');
			checker=0;
			$.toast({
			    heading: 'Note:',
			    text: "Please select Search Type.",
			    icon: 'info',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		}
		else if(date1 != "" && date2 != "" && category == "none" && location != "none")
		{
			$('.printBtn').hide('slow');
			checker=0;
			$.toast({
			    heading: 'Note:',
			    text: "Please select Supplier.",
			    icon: 'info',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		}
		else if(date1 == "" && date2 == "" && category != "none" && location != "none")
		{
			checker=0;
			$.toast({
			    heading: 'Note:',
			    text: "Please fill date range field.",
			    icon: 'info',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		}
		else if(date1 == "" && date2 == "" && category == "none" && location != "none")
		{
			checker=0;
			$.toast({
			    heading: 'Note:',
			    text: "Please fill date range field and select Supplier.",
			    icon: 'info',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		}
		else
		{
			checker=1;
		}
		
		
		if(checker == 1)
		{
			var datefrom = formatDate(datefrom1);
			var dateto = formatDate(dateto1);

			if(location == "ListItem") {
				$('.lbi').show('slow');
				$('.lbd').hide('slow');
				$(".printBtn").prop("disabled",false);
				$('.printBtn').click(function(e){

					var currUrl = window.location.href;
					var date1 = $("#datefrom1").val();
					var date2 = $("#dateto1").val();
					var category = $("#category1").val();
					var location = $("#location").val();
					var datefrom = formatDate(datefrom1);
					var dateto = formatDate(dateto1);
					var searchtype = "bddatediv";
					window.location.href = base_url+"Main_reports/ris_report_print/"+datefrom+"/"+dateto+"/"+category+"/"+location;

					$('.printBtn').attr("disabled","true");
					$('.printBtn').attr("title","This document has already been printed.");
				});
				dataTable = $('#table-grid').DataTable({
					destroy: true,
					"processing": true,
					"serverSide": true,
					"ajax":{
						url:base_url+"Main_reports/ris_report_table", // json datasource
						type: "post",  // method  , by default get
						data:{'searchtype': searchtype, 'datefrom': datefrom, 'dateto': dateto, 'category': category1, 'location': location},
						beforeSend:function(data){
							$.LoadingOverlay("show");	
						},
						complete: function(data)
						{
							setTimeout(function(){
								$.LoadingOverlay("hide");
							},500); 

							var response = $.parseJSON(data.responseText);
							if(response.recordsTotal > 0){	
								$('.printBtn').show('slow');
							}
							else{
								$('.printBtn').hide('slow');
							}
						},
						error: function(){  // error handling
							$(".table-grid-error").html("");
							$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#table-grid_processing").css("display","none");
						}
					}
				});		

	       	}
			else if(location == "ListDate") {
				$('.lbd').show('slow');
				$('.lbi').hide('slow');
				$(".printBtn").prop("disabled",false);
				$('.printBtn').click(function(e){

					var currUrl = window.location.href;
					var date1 = $("#datefrom1").val();
					var date2 = $("#dateto1").val();
					var category = $("#category1").val();
					var location = $("#location").val();
					var datefrom = formatDate(datefrom1);
					var dateto = formatDate(dateto1);
					var searchtype = "bddatediv";
					window.location.href = base_url+"Main_reports/ris_report_print/"+datefrom+"/"+dateto+"/"+category+"/"+location;

					$('.printBtn').attr("disabled","true");
					$('.printBtn').attr("title","This document has already been printed.");
				});
				dataTable2 = $('#table-grid2').DataTable({
					destroy: true,
					"processing": true,
					"serverSide": true,
					"ajax":{
						url:base_url+"Main_reports/ris_report_table", // json datasource
						type: "post",  // method  , by default get
						data:{'searchtype': searchtype, 'datefrom': datefrom, 'dateto': dateto, 'category': category1, 'location': location},
						beforeSend:function(data){
							$("#table-grid2").LoadingOverlay("show");	
						},
						complete: function(data)
						{
							setTimeout(function(){
								$("#table-grid2").LoadingOverlay("hide");
							},500); 
							var response = $.parseJSON(data.responseText);
							if(response.recordsTotal > 0){	
								$('.printBtn').show('slow');
							}
							else{
								$('.printBtn').hide('slow');
							}
						},
						error: function(){  // error handling
							$(".table-grid2-error").html("");
							$("#table-grid2").append('<tbody class="table-grid2-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#table-grid2_processing").css("display","none");
						}
					}
				});	
			}
		}

	});


	$('#table-grid').delegate(".btnViewRcv", "click", function(){
 		var pono = $(this).data('pono');
 		var rcvno = $(this).data('value');
 		var printed = $(this).data('printed');
 		var suprefno = $(this).data('suprefno');
 		var potrandate = $(this).data('potrandate');
 		var itemtrandate = $(this).data('itemtrandate');
 		var suppliername = $(this).data('suppliername');
 		$('.m_pono').text(pono);
 		$('.m_rcvno').text(rcvno);
 		$('.m_suprefno').text(suprefno);
 		$('.m_potrandate').text(potrandate);
 		$('.m_itemtrandate').text(itemtrandate);
 		$('.suppliername').text(suppliername);

 		if (printed > 0){
 			$("#printedText").show();
 			$(".printBtn").hide();
 		}
 		else {
 			$("#printedText").hide();
 			$(".printBtn").show();
 		}

		dataTable3 = $('#table-grid3').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax":{
				url:base_url+"Main_reports/por_form", // json datasource
				type: "post",  // method  , by default get
				data:{"rcvno": rcvno},
				error: function(){  // error handling
					$(".table-grid3-error").html("");
					$("#table-grid3").append('<tbody class="table-grid3-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid3_processing").css("display","none");
				}
			}
		});

		$('#poReceiveModal').modal('show');
		dataTable3.destroy();
	});

	$('#table-grid2').delegate(".btnViewRcv", "click", function(){
 		var pono = $(this).data('pono');
 		var rcvno = $(this).data('value');
 		var printed = $(this).data('printed');
 		var suprefno = $(this).data('suprefno');
 		var potrandate = $(this).data('potrandate');
 		var itemtrandate = $(this).data('itemtrandate');
 		var suppliername = $(this).data('suppliername');
 		$('.m_pono').text(pono);
 		$('.m_rcvno').text(rcvno);
 		$('.m_suprefno').text(suprefno);
 		$('.m_potrandate').text(potrandate);
 		$('.m_itemtrandate').text(itemtrandate);
 		$('.suppliername').text(suppliername);

 		if (printed > 0){
 			$("#printedText").show();
 			$(".printBtn").hide();
 		}
 		else {
 			$("#printedText").hide();
 			$(".printBtn").show();
 		}

		dataTable3 = $('#table-grid3').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax":{
				url:base_url+"Main_reports/por_form", // json datasource
				type: "post",  // method  , by default get
				data:{"rcvno": rcvno},
				error: function(){  // error handling
					$(".table-grid3-error").html("");
					$("#table-grid3").append('<tbody class="table-grid3-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid3_processing").css("display","none");
				}
			}
		});

		$('#poReceiveModal').modal('show');
		dataTable3.destroy();
	});
	//end

	//start
	
});

function isNumberKeyOnly(evt)   
{    
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
          return true;
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}	
