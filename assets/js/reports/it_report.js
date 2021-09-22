$(document).ready(function(){


	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	$('.bddatediv').show('slow');
	// var searchtype = "none";
	// var location = "All";
	// dataTable = $('#table-grid').DataTable({
	// 	"processing": true,
	// 	"serverSide": true,
	// 	"ajax":{
	// 		url:base_url+"Main_reports/it_report_table", // json datasource
	// 		type: "post",  // method  , by default get
	// 		data:{'searchtype': searchtype,'location':location},
	// 		beforeSend:function(data){
	// 			$('#Modalloadingbar').modal('show');	
	// 		},
	// 		complete: function()
	// 		{
	// 			setTimeout(function(){
	// 				$('#Modalloadingbar').modal('hide');
	// 			},500); 
	// 		},
	// 		error: function(){  // error handling
	// 			$(".table-grid-error").html("");
	// 			$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
	// 			$("#table-grid_processing").css("display","none");
	// 		}
	// 	}
	// });
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
		window.location.href = base_url+"Main_reports/it_report_print/"+datefrom+"/"+dateto+"/"+category+"/"+location;
		$('.printBtn').attr("disabled","true");
		$('.printBtn').attr("title","This document has already been printed.");
	});

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
		if(searchtype == "none")
		{
			checker=0;
		}
		else if(searchtype == "bddatediv")
		{
			if(date1 == "" && date2 == "" && category == "none")
			{
				checker=0;
				$.toast({
				    heading: 'Note:',
				    text: "Please fill date range field and please select inventory.",
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
			else if(date1 != "" && date2 != "" && category == "none")
			{
				checker=0;
				$.toast({
				    heading: 'Note:',
				    text: "Please select inventory.",
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
			else if(date1 == "" && date2 == "" && category != "none")
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
			$('.table').show('slow');
			var datefrom = formatDate(datefrom1);
			var dateto = formatDate(dateto1);
			dataTable = $('#table-grid').DataTable({
				destroy: true,
				"processing": true,
				"serverSide": true,
				"ajax":{
					url:base_url+"Main_reports/it_report_table", // json datasource
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
							list += "<th colspan='2' class='text-right'>Total</th>";
							list += "<th class='th_total_amount text-left'>"+ response.in +"</th>";
							list += "<th class='th_total_amount text-left'>"+ response.out +"</th>";
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

	$('#table-grid').delegate(".btnView", "click", function(){
    
        $('#viewIngredientlistModal').modal('show');
        
        addno = this.id;
        var dataTable = $('#table-ingredients-view').DataTable({
            "processing": true,
            "serverSide": true,
            "destroy": true,
            "order": [[ 0, "asc" ]],
            "ajax":{
                url :base_url+"Main_manufacturing/ingredientslist_view_modal", // json datasource
                type: "post",  // method  , by default get
                data:{"addno":addno},
                error: function(){  // error handling
                    $(".table-grid-error").html("");
                    // $("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#table-grid_processing").css("display","none");
                }
            },
            "fnDrawCallback": function() {
                var api = this.api()
                var json = api.ajax.json();
                console.log(json);

                $(".lblAddno").text("Ingredients Addition" + " #" + json.lblAddno);
                $(".lblPrep").text(json.lblPrepdate);
                $(".lblprepDate").text(json.lblPrepdate);
                $(".lblbuildDate").text(json.lblBuilddate);
                $(".lblingLocation").text(json.lblInglocation);
                $(".lblbuildLocation").text(json.lblBuildlocation);
                $(".lblencoder").text(json.lblEncoder);
                $("#notes").text(json.lblNotes);

            }
        });//data table

    });

	$('#table-grid').delegate(".btnView", "click", function(){
		$('#viewBuildlistModal').modal('show');
		$('.btnPrintWin').css('display','block');
		buildNo = this.id;

		var dataTable = $('#table-build-view').DataTable({
			"processing": true,
			"destroy": true,
			"serverSide": true,
			"ajax":{
			url :base_url+"Main_manufacturing/build_view_modal", // json datasource
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
			        console.log(json);

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

	$(".printWin").click(function(e){

        window.location.href=''+base_url+'Main_manufacturing/printBuildlist/'+buildNo;

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
