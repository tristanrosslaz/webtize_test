$(document).ready(function(){

	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	$('.bddatediv').show('slow');
	$('.search').show('slow');
	var datefrom1 = $("#datefrom1").val();
	var dateto1 = $("#dateto1").val();
	dataTable = $('#table-grid').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax":{
			url:base_url+"Main_reports/pcto_report_table", // json datasource
			type: "post",  // method  , by default get
			data:{'datefrom': datefrom1, 'dateto': dateto1},
			beforeSend:function(data){
				$("#table-grid").LoadingOverlay("show");	
			},
			complete: function(data)
			{
				var response = $.parseJSON(data.responseText);
				if(response.draw > 0){	
						$('.dataTables_empty').hide();
					$('.printBtn').show('slow');
					$("#table-grid").find(".tfoot").remove();
					var list = "";
					list += "<tfoot class='tfoot'> <tr> ";
					list += "<th class='text-left'>Beginning Cash On Hand</th>";
					list += "<th class='th_total_amount text-left'>"+ response.begcoh +"</th>";
					list += " </tr>";
					list += "<tr> ";
					list += "<th class='text-left'>Cash Returned</th>";
					list += "<th class='th_total_amount text-left'>"+ response.cashreturned +"</th>";
					list += " </tr>";
					list += "<tr> ";
					list += "<th class='text-left'>Encashment Amount</th>";
					list += "<th class='th_total_amount text-left'>"+ response.encashment +"</th>";
					list += " </tr>";
					list += "<tr> ";
					list += "<th class='text-left'>Total</th>";
					list += "<th class='th_total_amount text-left'>"+ response.totalcash +"</th>";
					list += " </tr>";
					list += "<tr> ";
					list += "<th class='text-left'>Less: Cash Realeased</th>";
					list += "<th class='th_total_amount text-left'>"+ response.cashreleased +"</th>";
					list += " </tr>";
					list += "<tr> ";
					list += "<th class='text-left'>Total Cash On Hand</th>";
					list += "<th class='th_total_amount text-left'>"+ response.cohending +"</th>";
					list += " </tr></tfoot>";
					$("#table-grid").append(list);
					$("#datefrom1").val(moment().format("YYYY-MM-DD"));
					$("#dateto1").val(moment().format("YYYY-MM-DD"));
				}
				else{
					$("#table-grid").find(".tfoot").remove();
					$('.printBtn').hide('slow');
				}
				setTimeout(function(){
					$("#table-grid").LoadingOverlay("hide");
				},500); 
			}
		}
	});

	dataTable2 = $('#table-grid2').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax":{
			url:base_url+"Main_reports/pcto_report_table2", // json datasource
			type: "post",  // method  , by default get
			data:{'datefrom': datefrom1, 'dateto': dateto1},
			beforeSend:function(data){
				$.LoadingOverlay("show");	
			},
			complete: function(data)
			{
				setTimeout(function(){
					$.LoadingOverlay("hide");
				},500); 
			}
		}
	});

	dataTable3 = $('#table-grid3').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax":{
			url:base_url+"Main_reports/pcto_report_table3", // json datasource
			type: "post",  // method  , by default get
			data:{'datefrom': datefrom1, 'dateto': dateto1},
			beforeSend:function(data){
				$("#table-grid3").LoadingOverlay("show");	
			},
			complete: function(data)
			{
				setTimeout(function(){
					$("#table-grid3").LoadingOverlay("hide");
				},500); 
			}
		}
	});

	$('.printBtn').click(function(e){

		var currUrl = window.location.href;
		var date1 = $("#datefrom1").val();
		var date2 = $("#dateto1").val();
		var datefrom = formatDate(date1);
		var dateto = formatDate(date2);
		window.location.href = base_url+"Main_reports/pcto_report_print/"+datefrom+"/"+dateto;

		$('.printBtn').attr("disabled","true");
		$('.printBtn').attr("title","This document has already been printed.");
	});
	
	//start
	$(".btnSearchSO").click(function(e){
		e.preventDefault();
		var date1 = $("#datefrom").val();
		var date2 = $("#dateto").val();


		var checker=0;
		var searchtype = "bddatediv";
		
		var datefrom1 = $("#datefrom1").val();
		var dateto1 = $("#dateto1").val();

		if(searchtype == "none")
		{
			checker=0;
		}
		else if(searchtype == "bddatediv")
		{
			if(date1 == "")
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
			else
			{
				checker=1;
			}
		}
		
		if(checker == 1)
		{
			var datefrom = formatDate(date1);
			var dateto = formatDate(date2);
	    	$("#date1").html(datefrom)

		    $("#datefrom1").val(datefrom);
			$("#dateto1").val(dateto);


			dataTable = $('#table-grid').DataTable({
				destroy: true,
				"processing": true,
				"serverSide": true,
				"ajax":{
					url:base_url+"Main_reports/pcto_report_table", // json datasource
					type: "post",  // method  , by default get
					data:{'datefrom': datefrom, 'dateto': dateto},
					beforeSend:function(data){
						$("#table-grid").LoadingOverlay("show");	
					},
					complete: function(data)
					{
						setTimeout(function(){
							$("#table-grid").LoadingOverlay("hide");
						},500); 

						var response = $.parseJSON(data.responseText);
						if(response.draw > 0){	
						$('.dataTables_empty').hide();
							$('.printBtn').show('slow');
							$("#table-grid").find(".tfoot").remove();
							var list = "";
							list += "<tfoot class='tfoot'> <tr> ";
							list += "<th class='text-left'>Beginning Cash On Hand</th>";
							list += "<th class='th_total_amount text-left'>"+ response.begcoh +"</th>";
							list += " </tr>";
							list += "<tr> ";
							list += "<th class='text-left'>Cash Returned</th>";
							list += "<th class='th_total_amount text-left'>"+ response.cashreturned +"</th>";
							list += " </tr>";
							list += "<tr> ";
							list += "<th class='text-left'>Encashment Amount</th>";
							list += "<th class='th_total_amount text-left'>"+ response.encashment +"</th>";
							list += " </tr>";
							list += "<tr> ";
							list += "<th class='text-left'>Total</th>";
							list += "<th class='th_total_amount text-left'>"+ response.totalcash +"</th>";
							list += " </tr>";
							list += "<tr> ";
							list += "<th class='text-left'>Less: Cash Realeased</th>";
							list += "<th class='th_total_amount text-left'>"+ response.cashreleased +"</th>";
							list += " </tr>";
							list += "<tr> ";
							list += "<th class='text-left'>Total Cash On Hand</th>";
							list += "<th class='th_total_amount text-left'>"+ response.cohending +"</th>";
							list += " </tr></tfoot>";
							$("#table-grid").append(list);
						}
						else{
							$("#table-grid").find(".tfoot").remove();
							$('.printBtn').hide('slow');
						}

					}
				}
			});

			dataTable2 = $('#table-grid2').DataTable({
				"destroy": true,
				"processing": true,
				"serverSide": true,
				"ajax":{
					url:base_url+"Main_reports/pcto_report_table2", // json datasource
					type: "post",  // method  , by default get
					data:{'datefrom': datefrom, 'dateto': dateto},
					beforeSend:function(data){
						$("#table-grid2").LoadingOverlay("show");	
					},
					complete: function(data)
					{
						setTimeout(function(){
							$("#table-grid2").LoadingOverlay("hide");
						},500); 
					}
				}
			});

			dataTable3 = $('#table-grid3').DataTable({
				"destroy": true,
				"processing": true,
				"serverSide": true,
				"ajax":{
					url:base_url+"Main_reports/pcto_report_table3", // json datasource
					type: "post",  // method  , by default get
					data:{'datefrom': datefrom, 'dateto': dateto},
					beforeSend:function(data){
						$("#table-grid3").LoadingOverlay("show");	
					},
					complete: function(data)
					{
						setTimeout(function(){
							$("#table-grid3").LoadingOverlay("hide");
						},500); 
					}
				}
			});
		}
		dataTable.destroy();
		dataTable2.destroy();

	});
	//end
		dataTable.destroy();
		dataTable2.destroy();

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
