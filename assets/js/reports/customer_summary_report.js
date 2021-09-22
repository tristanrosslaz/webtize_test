$(document).ready(function(){

	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	//var statfilter = "all";
	


	$('#searchBtn').click(function(e){
		var statfilter = $("#statfilter").val();
		var name = $("#search_customer").val();
		var address = $("#search_address").val();
		//alert(address);

		var checker = 0;


		if(statfilter == "none")
		{
			checker=0;
		}
		else if(statfilter == "namediv"){
			if(name == "")
			{
				checker=0;
				$.toast({
				    heading: 'Note:',
				    text: "Please fill name field.",
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
		}else if(statfilter == "addressdiv"){
			if(address == "")
			{
				checker=0;
				$.toast({
				    heading: 'Note:',
				    text: "Please fill address field.",
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
		}else{
			checker=1;
		}

		
		
		if(checker == 1){
			//alert(address);
			dataTable = $('#table-grid').DataTable({
				destroy: true,
				"processing": true,
				"serverSide": true,
				"ajax":{
					url:base_url+"Main_reports/get_customers", // json datasource
					type: "post",  // method  , by default get
					data:{"statfilter": statfilter, "name":name, "address":address},
					beforeSend:function(data){
						$('#printBtn').show();
						$("body").LoadingOverlay("show"); 	
					},
					complete: function(data)
					{
						$.LoadingOverlay("hide"); 
					},
					error: function(){  // error handling
						$(".table-grid-error").html("");
						$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
						$("#table-grid_processing").css("display","none");
					}
				}
			});
			$("#table-grid").prop('hidden', false);
		}
	});

	$("#statfilter").change(function() {


		
		var searchtype = $('#statfilter').val(); // id ng dropdown
		
		if(searchtype == "namediv")
		{
			$('.namediv').show('slow');
			$('.addressdiv').hide('slow');
			//$('#search_customer').val("");
			$('#search_address').val("");
		}else if(searchtype == "all"){
			$('.namediv').hide('slow');
			$('.addressdiv').hide('slow');
			$('#search_customer').val("");
			$('#search_address').val("");
		}else{
			$('.namediv').hide('slow');
			$('.addressdiv').show('slow');
			$('#search_customer').val("");
			//$('#search_address').val("");
		}

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
