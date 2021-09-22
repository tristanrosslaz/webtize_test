$(document).ready(function(){

	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	var datefrom1 = $("#datefrom1").val();
	var dateto1 = $("#dateto1").val();

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
			var datefrom = formatDate(date1);
			var dateto = formatDate(date2);

		    $("#datefrom1").val(datefrom);
			$("#dateto1").val(dateto);

		var currUrl = window.location.href;
		var date1 = $("#datefrom1").val();
		var date2 = $("#dateto1").val();
		var datefrom = formatDate(date1);
		var dateto = formatDate(date2);
		window.location.href = base_url+"Main_reports/pcr_report_print/"+datefrom+"/"+dateto;

			
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
