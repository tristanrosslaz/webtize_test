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
			url:base_url+"Main_reports/cb_report_table", // json datasource
			type: "post",  // method  , by default get
			data:{'datefrom': datefrom1, 'dateto': dateto1},
			beforeSend:function(data){
				$.LoadingOverlay("show");
			},
			complete: function(data)
			{
				var response = $.parseJSON(data.responseText);
				if(response.recordsTotal > 0){	
					$('.printBtn').show('slow');
					$("#table-grid").find(".tfoot").remove();
					var list = "";
					list += "<tfoot class='tfoot'> <tr> ";
					list += "<th colspan='4' class='text-right'>Total</th>";
					list += "<th class='th_total_amount text-left'>"+ response.total +"</th>";
					list += "<th colspan='3' class='text-right'></th>";
					list += " </tr></tfoot>";
					$("#table-grid").append(list);
				}
				else{
					$("#table-grid").find(".tfoot").remove();
					$('.printBtn').hide('slow');
				}
				setTimeout(function(){
					$.LoadingOverlay("hide");
				},500); 
			},
			error: function(){  // error handling
				$(".table-grid-error").html("");
				$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");
			}
		}
	});
	
	//start
	$(".btnSearchSO").click(function(e){
		e.preventDefault();
		var date1 = $("#datefrom").val();
		var date2 = $("#dateto").val();
		var checker=0;
		var searchtype = "bddatediv";
		$("#datefrom1").val(date1)
		$("#dateto1").val(date2)
		var datefrom1 = $("#datefrom1").val();
		var dateto1 = $("#dateto1").val();

		if(searchtype == "none")
		{
			checker=0;
		}
		else if(searchtype == "bddatediv")
		{
			if(date1 == "" && date2 == "")
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
			var datefrom = formatDate(datefrom1);
			var dateto = formatDate(dateto1);
			dataTable = $('#table-grid').DataTable({
				destroy: true,
				"processing": true,
				"serverSide": true,
				"ajax":{
					url:base_url+"Main_reports/cb_report_table", // json datasource
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
						if(response.recordsTotal > 0){	
							$('.printBtn').show('slow');
							$("#table-grid").find(".tfoot").remove();
							var list = "";
							list += "<tfoot class='tfoot'> <tr> ";
							list += "<th colspan='4' class='text-right'>Total</th>";
							list += "<th class='th_total_amount text-left'>"+ response.total +"</th>";
							list += "<th colspan='3' class='text-right'></th>";
							list += " </tr></tfoot>";
							$("#table-grid").append(list);
						}
						else{
							$("#table-grid").find(".tfoot").remove();
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
