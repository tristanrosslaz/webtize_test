$(document).ready(function(){


	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	$('.bddatediv').show('slow');
	var searchtype = "none";
	
	//start
	$('.printBtn').click(function(e){

		var currUrl = window.location.href;
		var date1 = $("#datefrom1").val();
		
		var datefrom = formatDate(date1);
		
		var searchtype = "bddatediv";
		window.location.href = base_url+"Main_reports/pcrep_report_print/"+datefrom;

			

		$('.printBtn').attr("disabled","false");
		// $('.printBtn').attr("title","This document has already been printed.");
	});

	$(".btnSearchSO").click(function(e){
		e.preventDefault();
		var date1 = $("#datefrom").val();
		var checker=0;
		var searchtype = "bddatediv";
		$("#datefrom1").val(date1)
		
		var datefrom1 = $("#datefrom1").val();
		

		if(searchtype == "none")
		{
			checker=0;
		}
		else if(searchtype == "bddatediv")
		{
			if(date1 == "" )
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

			var currUrl = window.location.href;
		var date1 = $("#datefrom1").val();
		
		var datefrom = formatDate(date1);
		
		var searchtype = "bddatediv";
		window.location.href = base_url+"Main_reports/pcrep_report_print/"+datefrom;

			

		// $('.printBtn').attr("disabled","false");
			// var datefrom = formatDate(datefrom1);
			
			// dataTable = $('#table-grid').DataTable({
			// 	destroy: true,
			// 	"processing": true,
			// 	"serverSide": true,
			// 	"ajax":{
			// 		url:base_url+"Main_reports/pcr_report_print", // json datasource
			// 		type: "post",  // method  , by default get
			// 		data:{'searchtype': searchtype, 'datefrom': datefrom},
			// 		beforeSend:function(data){
			// 			$("#table-grid").LoadingOverlay("show");	
			// 		},
			// 		complete: function(data)
			// 		{
			// 			var response = $.parseJSON(data.responseText);
			// 			if(response.recordsTotal > 0){	
			// 				$('.printBtn').show('slow');
			// 			}
			// 			else{
			// 				$('.printBtn').hide('slow');
			// 			}
			// 			setTimeout(function(){
			// 				$("#table-grid").LoadingOverlay("hide");
			// 			},500); 
			// 		},
			// 		error: function(){  // error handling
			// 			$(".table-grid-error").html("");
			// 			$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
			// 			$("#table-grid_processing").css("display","none");
			// 		}
			// 	}
			// });
			// $("#table-grid").prop('hidden', false);
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
