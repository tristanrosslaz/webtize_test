$(document).ready(function(){


	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	//start
	$(".btnSearchSO").click(function(e){
		e.preventDefault();
		var buildno = $("#buildno").val();
		var searchtype = "bddatediv";

		if(searchtype == "none")
		{
			checker=0;
		}
		else if(searchtype == "bddatediv")
		{
			if(buildno == "")
			{
				checker=0;
				$.toast({
				    heading: 'Note:',
				    text: "Please fill Build No. field.",
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
			$('.table').show('slow');
			dataTable = $('#table-grid').DataTable({
				destroy: true,
				"processing": true,
				"serverSide": true,
				"ajax":{
					url:base_url+"Main_reports/reschedule_report_table", // json datasource
					type: "post",  // method  , by default get
					data:{'buildno': buildno},
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
		}

	});
	//end

	//start

	$('#table-grid').delegate(".btnView", "click", function(){
		$('#viewBuildlistModal').modal('show');
		$('.btnPrintWin').css('display','block');
		buildNo = this.id;

		var dataTable = $('#table-build-view').DataTable({
			"processing": true,
			"destroy": true,
			"serverSide": true,
			"ajax":{
			url :base_url+"Main_reports/build_view_modal", // json datasource
			type: "post",  // method  , by default get
			data:{buildNo},
				error: function(){  // error handling
					$(".table-grid-error").html("");
					// $("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid_processing").css("display","none");
				}
			},
		        "fnDrawCallback": function() {
			        var api = this.api()
			        var json = api.ajax.json();
			        
                    $(".buildNo").text("Build Inventory" + " #" + json.lblbuildNo);
                    $(".tranDate").text(json.lbltranDate);
                    $(".lblprepDate").text(json.lblprepDate);
                    $(".lblbuildDate").text(json.lbltranDate);
                    $(".lblQty").text(json.lblqty);
                    $(".lblUnit").text(json.lblunit);
                    $(".lblItem").text(json.lblitemname);
                    $(".lbllocation").text(json.lbllocation);

			    }
		});//data table

	});
	
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
