$(document).ready(function(){


	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	$('.bddatediv').show('slow');
	var searchtype = "none";
	var location = "All";

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
		$("#location1").val(location)
		var datefrom1 = $("#datefrom1").val();
		var dateto1 = $("#dateto1").val();
		var category1 = $("#category1").val();
		var location1 = $("#location1").val();

		if(date1 == "" && date2 == "" && category == "none" && location == "none")
		{
			checker=0;
			$.toast({
			    heading: 'Note:',
			    text: "Please fill date range field, select Status and Search Type.",
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
			    text: "Please select Status and Search Type.",
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
			    text: "Please select Status.",
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
			    text: "Please fill date range field and select Status.",
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
			$('.table').show('slow');
			$('.printBtn').show('slow');
			var datefrom = formatDate(datefrom1);
			var dateto = formatDate(dateto1);
			dataTable = $('#table-grid').DataTable({
				destroy: true,
				"processing": true,
				"serverSide": true,
				"ajax":{
					url:base_url+"Main_reports/drlbc_report_table", // json datasource
					type: "post",  // method  , by default get
					data:{'searchtype': searchtype, 'datefrom': datefrom, 'dateto': dateto, 'category': category1, 'location': location1},
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
							$("#table-grid").find(".tfoot").remove();
							var list = "";
							list += "<tfoot class='tfoot'> <tr> ";
							list += "<th colspan='3' class='text-right'>Total</th>";
							list += "<th class='th_total_amount text-left'>"+ response.total +"</th>";
							list += "<th colspan='4' class='text-right'></th>";
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
