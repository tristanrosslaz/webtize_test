$(document).ready(function(){


	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	$('.bddatediv').show('slow');
	var searchtype = "none";
	dataTable = $('#table-grid').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax":{
			url:base_url+"Main_reports/ilt_listing_table", // json datasource
			type: "post",  // method  , by default get
			data:{'searchtype': searchtype},
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


	$('#table-grid').delegate(".View", "click", function(){
 		var iltno = $(this).data('iltno');
 		var trandate = $(this).data('trandate');
 		var itemlocid1 = $(this).data('itemlocid1');
 		var itemlocid2 = $(this).data('itemlocid2');
 		var notes = $(this).data('notes');
 		$('#iltno').text(iltno);
 		$('#notes').text(notes);
 		$('#itemlocid1').text(itemlocid1);
 		$('#itemlocid2').text(itemlocid2);
 		$('#trandate').text(trandate);

		dataTable2 = $('#table-grid1').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax":{
				url:base_url+"Main_reports/ilt_listing_view_table", // json datasource
				type: "post",  // method  , by default get
				data:{"iltno": iltno},
				error: function(){  // error handling
					$(".table-grid-error").html("");
					$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid_processing").css("display","none");
				}
			}
		});

		$('#poReceiveModal').modal('show');
		dataTable2.destroy();
	});


	//start
	$(".btnSearchSO").click(function(e){
		e.preventDefault();
		var date1 = $("#datefrom").val();
		var date2 = $("#dateto").val();
		var checker=0;
		var searchtype = "bddatediv";

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
			dataTable = $('#table-grid').DataTable({
				destroy: true,
				"processing": true,
				"serverSide": true,
				"ajax":{
					url:base_url+"Main_reports/ilt_listing_table", // json datasource
					type: "post",  // method  , by default get
					data:{'searchtype': searchtype, 'datefrom': datefrom, 'dateto': dateto},
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
		}

	});
	//end

	//start
	$('#table-grid').delegate(".btnbdview", "click", function(){
	  	var depno = $(this).data('value');
	  	
	  	$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_reports/display_bankdeposit_Details',
	  		data:{'depno':depno},
	  		success:function(data)
	  		{
	  			var res1 = data.result1;
	  			if (data.success == 1) 
	  			{
	  	            document.getElementById('info_fullname').innerHTML = "Encoded By: "+
	  	            res1[0].encodedby.toUpperCase();
	  	            document.getElementById('info_notes').innerHTML = "Notes: "+ res1[0].notes;
	  	            document.getElementById('info_depno').innerHTML = "Dep #: "+ res1[0].depno;
	  	            document.getElementById('info_trandate').innerHTML = res1[0].depdate;



	  	            var dataTable1 = $('#table-grid1').DataTable({
						"processing": true,
						"serverSide": true,
						"ajax":{
							url :base_url+"Main_reports/view_bankdepo_Details", // json datasource
							type: "post",  // method  , by default get
							data:{'depno':depno},
							error: function(){  // error handling
								$(".table-grid1-error").html("");
								$("#table-grid1").append('<tbody class="table-grid1-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
								$("#table-grid1_processing").css("display","none");
							}
						}
					});

					
	  	        }
	  		}
	  	});

	});
	//end  

	// $(".iltExport").click(function(e){
	// 	e.preventDefault();		
	// 	var date1 = $("#datefrom").val();
	// 	var date2 = $("#dateto").val();
	// 	$.ajax({
	// 		  	type: 'post',
	// 		  	url: base_url+'Main_reports/ilt_listing_export',
	// 		  	data:{},
	// 		  	success:function(data){

	// 		  	},
	// 		});


	// });
	// //end  
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
