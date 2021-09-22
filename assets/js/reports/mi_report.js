$(document).ready(function(){

	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	$('.bddatediv').show('slow');
	var searchtype = $("#searchtype").val();
	var location = "All";
	    var dateto = formatDate(new Date());
	    $("#datefrom1").val(dateto);
	    $("#date1").html($("#storage1").val())
	    $("#date2").html($("#storage2").val())
	    $("#date3").html($("#storage3").val())
	    $("#date4").html($("#storage4").val())
	    $getdate4 = $("#storage4").val();
	    $getdate3 = $("#storage3").val();
	    $getdate2 = $("#storage2").val();
	    $getdate1 = $("#storage1").val();
	dataTable = $('#table-grid').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax":{
			url:base_url+"Main_reports/mi_report_table", // json datasource
			type: "post",  // method  , by default get
			data:{'searchtype': searchtype,'location':location,'dateto':dateto},
			beforeSend:function(data){
				$.LoadingOverlay("show");	
			},
			complete: function(data)
			{
				var response = $.parseJSON(data.responseText);
				if(response.recordsTotal > 0){	
					$('.printBtn').show('slow');
				}
				else{
					$('.printBtn').hide('slow');
				}
					$.LoadingOverlay("hide"); 
			},
			error: function(){  // error handling
				$(".table-grid-error").html("");
				$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");
			}
		}
	});
	//start
	$('.printBtn').click(function(e){

		var currUrl = window.location.href;
		var date1 = $("#datefrom1").val();
		var date2 = $("#dateto1").val();
		var category = $("#category1").val();
		var location = $("#location1").val();
		var datefrom = formatDate(date1);
		var dateto = formatDate(date2);
		var searchtype = "bddatediv";
		window.location.href = base_url+"Main_reports/mi_report_print/"+searchtype+"/"+datefrom+"/"+dateto+"/"+category+"/"+location;
		$('.printBtn').attr("disabled","true");
		$('.printBtn').attr("title","This document has already been printed.");
	});

	$(".btnSearchSO").click(function(e){
		e.preventDefault();
		var date2 = $("#dateto").val();
		var d = new Date(date2);
		var d1 = new Date(date2);
		var d2 = new Date(date2);
		var d3 = new Date(date2);
    	var n = d.getMonth();
    	var n1 = (d1.getMonth()-1);
    	var n2 = (d2.getMonth()-2);
    	var n3 = (d3.getMonth()-3);
    	if(n1 < 0)
    	{
    		var a1 = n1+12;
    	}
    	else
    	{
    		var a1 = n1;
    	}
    	if(n2 < 0)
    	{
    		var a2 = n2+12;
    	}
    	else
    	{
    		var a2 = n2;
    	}
    	if(n3 < 0)
    	{
    		var a3 = n3+12;
    	}
    	else
    	{
    		var a3 = n3;
    	}

		var date2 = $("#dateto").val();
		var category = $("#category").val();
		var location = $("#location").val();
		var checker=0;
		var searchtype = "bddatediv";
		$("#dateto1").val(date2);
		$("#category1").val(category);
		$("#location1").val(location);
		var dateto1 = $("#dateto1").val();
		var category1 = $("#category1").val();
		var location1 = $("#location1").val();
	    $("#date1").html(GetMonthName(a3))
	    $("#date2").html(GetMonthName(a2))
	    $("#date3").html(GetMonthName(a1))
	    $("#date4").html(GetMonthName(n))
	    $("#storage4").val(GetMonthName(n))
	    $("#storage3").val(GetMonthName(a1))
	    $("#storage2").val(GetMonthName(a2))
	    $("#storage1").val(GetMonthName(a3))
		$('.printBtn').removeAttr('disabled');
		if(searchtype == "none")
		{
			checker=0;
		}
		else if(searchtype == "bddatediv")
		{
			if(date2 == "")
			{
				checker=0;
				$.toast({
				    heading: 'Note:',
				    text: "Please fill End Date field.",
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
					url:base_url+"Main_reports/mi_report_table", // json datasource
					type: "post",  // method  , by default get
					data:{'searchtype': searchtype, 'datefrom': datefrom, 'dateto': dateto, 'category': category1, 'location': location1},
					beforeSend:function(data){
						$.LoadingOverlay("show");	
					},
					complete: function(data)
					{
							$.LoadingOverlay("hide");
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

function GetMonthName(monthNumber) {
	  monthNumber = monthNumber < 0 ? 11 : monthNumber;
	  var months = ['Jan', 'Feb', 'Mar', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	  return months[monthNumber];
	}