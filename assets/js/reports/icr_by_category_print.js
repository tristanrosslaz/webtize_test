$(document).ready(function(){


	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	$('.bddatediv').show('slow');
	var searchtype = "a";
		var date1 = $("#datefrom").val();
		var date2 = $("#dateto").val();
		var category = $("#category").val();
		var location = $("#location").val();
			var datefrom = formatDate(date1);
			var dateto = formatDate(date2);
	dataTable = $('#table-grid').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax":{
			url:base_url+"Main_reports/icr_by_category_table", // json datasource
			type: "post",  // method  , by default get
			data:{'searchtype': searchtype, 'datefrom': datefrom, 'dateto': dateto, 'category': category, 'location': location},
			beforeSend:function(data){
				$('#Modalloadingbar').modal('show');	
			},
			complete: function()
			{
				setTimeout(function(){
					$('#Modalloadingbar').modal('hide');
				},500); 
			},
			error: function(){  // error handling
				$(".table-grid-error").html("");
				$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");
			}
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
