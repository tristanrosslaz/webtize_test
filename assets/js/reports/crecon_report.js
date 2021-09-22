$(document).ready(function(){

	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();



	$('#searchBtn').click(function(e){
		var statfilter = $("#statfilter").val();
		var date1 = $("#date1").val();
		var date2 = $("#date2").val();
		var checker = 0;
		var searchtype = "search";
		
		if(date1 == "" && date2 == "" && statfilter == "none")
		{
			checker = 0;
			$.toast({
			    heading: 'Note:',
			    text: "No date and account selected.",
			    icon: 'error',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#ffc107',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		}
		else if (date1 != "" && date2 != "" && statfilter == "none")
		{
			checker = 0;
			$.toast({
			    heading: 'Note:',
			    text: "No account selected.",
			    icon: 'error',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#ffc107',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		}
		else if (date1 == "" && date2 == "" && statfilter != "none")
		{
			checker = 0;
			$.toast({
			    heading: 'Note:',
			    text: "No date selected.",
			    icon: 'error',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#ffc107',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 3000          
			});
		}
		else
		{
			checker = 1;
		}
		if(checker == 1){
			var datefrom = formatDate(date1);
			var dateto = formatDate(date2);
			var searchtype = "search";
			dataTable = $('#table-grid').DataTable({
				destroy: true,
				"processing": true,
				"serverSide": true,
				"ajax":{
					url:base_url+"Main_reports/crecon_table", // json datasource
					type: "post",  // method  , by default get
					data:{"statfilter": statfilter, "date1": datefrom, "date2":dateto, "searchtype": searchtype},
					beforeSend:function(data){
						$('#Modalloadingbar').modal('show');	
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
			$("#table-grid").prop('hidden', false);
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
