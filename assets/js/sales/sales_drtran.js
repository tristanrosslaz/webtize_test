$(function(){
var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	$('.datediv').show('slow');
	$("#table-grid").prop('hidden', false);

	// get the date today
	var d = new Date();
	var date = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();

	$("#searchFilter").change(function() {
		var searchtype = $('#searchFilter').val();

		$("#datefrom").datepicker("setDate", new Date()); //set today
		$('#dateto').datepicker("setDate", new Date()); //set today

	   	if(searchtype == "nodiv") {
			$('.datediv').hide('slow');
			$('.statusdiv').hide('slow');
			$('.nodiv').show('slow');
			$("#searchNo").val("");
			$("#searchStatus").val("").change();
       	}
       	else if(searchtype == "datediv") {
			$('.datediv').show('slow');
			$('.statusdiv').hide('slow');
			$('.nodiv').hide('slow');
			$("#searchNo").val("");
			$("#searchStatus").val("").change();	  
       	}
       	else if(searchtype == "statusdiv") {
			$('.datediv').show('slow');	
			$('.statusdiv').show('slow');
			$('.nodiv').hide('slow');
			$("#searchNo").val("");
			$("#searchStatus").val("").change();
       	}
	});

	fillDatatable('datediv', date, date, '', '');

	//start
	$(".btnSearch").click(function(e){
		e.preventDefault();
		
		var searchtype = $('#searchFilter').val();
		var datefrom = formatDate($("#datefrom").val());
		var dateto = formatDate($("#dateto").val());
		var no = $("#searchNo").val();
		var status = $("#searchStatus").val();

		var checker = 0;
		if(searchtype == "datediv") {
			if(dateto != "" || datefrom != "") {
				checker = 1;
			}
			else {
				checker = 3;
			}
		}
		else if(searchtype == "nodiv") {
			checker = 1;
			// if(no != "") {
			// 	checker = 1;
			// }
			// else {
			// 	$.toast({
			// 	    heading: 'Note',
			// 	    text: "No DR number found. Please fill in data.",
			// 	    icon: 'info',
			// 	    loader: false,   
			// 	    stack: false,
			// 	    position: 'top-center',  
			// 	    bgColor: '#FFA500',
			// 		textColor: 'white',
			// 		allowToastClose: false,
			// 		hideAfter: 4000          
			// 	});
			// 	checker = 0;
			// }
		}
		else if(searchtype == "statusdiv") {
			if(dateto != "" || datefrom != "") {
				checker = 1;
				// if(status != "") {
					
				// }
				// else {
				// 	checker = 0;
				// 	$.toast({
				// 	    heading: 'Note',
				// 	    text: "No status selected. Please select a status.",
				// 	    icon: 'info',
				// 	    loader: false,   
				// 	    stack: false,
				// 	    position: 'top-center',  
				// 	    bgColor: '#FFA500',
				// 		textColor: 'white',
				// 		allowToastClose: false,
				// 		hideAfter: 4000          
				// 	});
				// }
			}
			else {
				checker = 0;
				$.toast({
				    heading: 'Note',
				    text: "No date found. Please choose a date.",
				    icon: 'info',
				    loader: false,   
				    stack: false,
				    position: 'top-center',  
				    bgColor: '#FFA500',
					textColor: 'white',
					allowToastClose: false,
					hideAfter: 4000          
				});
			}
		}

		if(checker == 1) {
			$("#table-grid").prop('hidden',false);
			fillDatatable(searchtype, datefrom, dateto, no, status);
		}
	});
	//end

	function fillDatatable(searchtype, datefrom, dateto, no, status) {
		var dataTable = $('#table-grid').DataTable({
			"destroy": true,
			"serverSide": true,
			"order": [[ 2, "desc" ]],
			"columnDefs": [{ "orderable": true, "targets": [ 5 ], "className": "dt-center" }],
			"ajax":{
				type: "post", 
				url :base_url+"sales/Sales_drhistory/directsales_table_Trans", // json datasource
				data:{'searchtype': searchtype, 'datefrom': datefrom, 'dateto': dateto, 'no': no, 'status': status},
				beforeSend:function(data) {
					$.LoadingOverlay("show"); 
				},
				complete: function() {
					$.LoadingOverlay("hide"); 
				},
				error: function() {  // error handling
					$(".table-grid-error").html("");
					$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid_processing").css("display","none");
				}
			}
		});
	}

	//start
	$('#table-grid').delegate(".btnDRelease1", "click", function(){
	  	var drno_id = $(this).data('value');
		$(".drno_value").val(drno_id);
		$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_sales/display_DR_Details',
	  		data:{'drno_id':drno_id},
	  		success:function(data) {
	  			var res1 = data.result1;
	  			var res2 = data.result2;
	  			var res3 = data.result3;
	  			if (data.success == 1) {
	  	            document.getElementById('uinfo_fullname').innerHTML =
	  	            res2[0].lname.toUpperCase() + ", " + res2[0].fname.toUpperCase() +" "+ res2[0].mname.toUpperCase();
	  	            document.getElementById('uinfo_branch').innerHTML = "Branch Name:  " + res2[0].branchname;
	  	            document.getElementById('uinfo_cont').innerHTML = "Contact No.:  " + res2[0].conno;
	  	            document.getElementById('uinfo_address').innerHTML = "Outlet Address:  " + res2[0].address;
    				document.getElementById('uinfo_sono').innerHTML = "DR #:  " + drno_id;
    				document.getElementById('uinfo_trandate').innerHTML = "Date:  " + res1[0].trandate;		


	  				var dataTable1 = $('#table-grid3').DataTable({
						
						"serverSide": true,
						"ajax":{
							url :base_url+"Main_sales/dr_item_Details", // json datasource
							type: "post",  // method  , by default get
							data:{'drno_id':drno_id},
							error: function() {  // error handling
								$(".table-grid3-error").html("");
								$("#table-grid3").append('<tbody class="table-grid3-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
								$("#table-grid3").css("display","none");
							}
						},
						"initComplete": function(settings, json) {
						  	var subtotal = 0;
						  	var totalval = 0;
						  	var grandtotal = 0;
						  	$(".totalDatatable3").each(function(){
						  		totalval = parseFloat($(this).val());
						  		subtotal = (subtotal*1)+(totalval*1);
						  	});
							freight = parseFloat(res3).toFixed(2);
							subtotal = parseFloat(subtotal).toFixed(2);
							gtotal = parseFloat(subtotal) + parseFloat(res3);
							grandtotal = parseFloat(gtotal).toFixed(2);

						  	$('.usubtotalspan').text(addCommas(subtotal));
							$('.ufreightspan').text(addCommas(freight));							
							$('.ugtotalspan').text(addCommas(grandtotal));
						}
					});
					dataTable1.destroy();
	  			}
	  		}
	  	});
	});
	//end

	//start
	$('#table-grid').delegate(".btnDRpacking", "click", function(){
	  	var drno_id = $(this).data('value');
	  	$("#drno_id").val(drno_id);
	  	$("#dry1").val("");
		$("#dry2").val("");
		$("#per1").val("");
		$("#per2").val("");
		$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_sales/check_dr_packing',
	  		data:{'drno_id':drno_id},
	  		success:function(data) {
	  			var res = data.result;
	  			var hasdata = data.hasdata;
	  			if(data.success == 1) {
	  				if(hasdata > 0) {
	  					$("#dry1").val(res[0].drybox);
		  				$("#dry2").val(res[0].drybag);
		  				$("#per1").val(res[0].pershbox);
		  				$("#per2").val(res[0].pershbag);
	  				}
	  			}
	  			else if(data.success == 2) {
	  				$.toast({
					    heading: 'Note',
					    text: "DR does not existed. Please check your data.",
					    icon: 'error',
					    loader: false,   
					    stack: false,
					    position: 'top-center',  
					    bgColor: '#FFA500',
						textColor: 'white',
						allowToastClose: false,
						hideAfter: 5000          
					});
	  			}
	  			else {
	  				$.toast({
					    heading: 'Note',
					    text: "No record found. Please check your data.",
					    icon: 'error',
					    loader: false,   
					    stack: false,
					    position: 'top-center',  
					    bgColor: '#FFA500',
						textColor: 'white',
						allowToastClose: false,
						hideAfter: 5000          
					});
	  			}
	  		}
	  	});
	});
	//end

	$(".cancelBtn").click(function(e){
		e.preventDefault();
		var itemarray=[];
		var qtyarray=[];
		var dataTable2 = $('#table-grid00').DataTable({
			destroy: true,
			
			"serverSide": true,
			"ajax":{
				url :base_url+"Main_sales/empty_barcodeitem_releaseDetails", // json datasource
				type: "post",  // method  , by default get
				data:{'itemarray': itemarray, 'qtyarray': qtyarray},
				error: function(){  // error handling
					$(".table-grid00-error").html("");
					$("#table-grid00").append('<tbody class="table-grid00-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid00_processing").css("display","none");
				}
			}
		});
		dataTable2.destroy();
	});
	
	$(".printDR").click(function(e){
		e.preventDefault();

		var drno_value = $(".drno_value").val();
		if(drno_value > 0) {
			window.location.href = ''+base_url+'Main_sales/dr_exportPDF/'+drno_value;
		}	
	});

	$(".saveBtnPack").click(function(e){
		e.preventDefault();
		var drno_value = $("#drno_id").val();
		var dry1 = $("#dry1").val();
		var dry2 = $("#dry2").val();
		var per1 = $("#per1").val();
		var per2 = $("#per2").val();
		var token = $("#token").val();
		if(drno_value > 0) {
			$.ajax({
		  		type: 'post',
		  		url: base_url+'Main_sales/save_dr_packing',
		  		data:{'drno_id':drno_value,'dry1':dry1,'dry2':dry2,'per1':per1,'per2':per2},
		  		success:function(data) {
		  			$.toast({
					    heading: 'Success',
					    text: "Packing for DR# " + drno_value +	 "has been successfully saved.",
					    icon: 'success',
					    loader: false,  
					    stack: false,
					    position: 'top-center', 
					    bgColor: '#5cb85c',
						textColor: 'white',
						allowToastClose: false,
						hideAfter: 5000,
					});

		  			window.setTimeout(function(){
                     	window.location.href=base_url+"Main_sales/sales_drtran/" + token;
	              	},500)
		  		}
	  		});
		}
	});

	//allowing numeric with decimal 
    $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
        $(this).val($(this).val().replace(/[^0-9\.]/g,''));
        
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    //allowing numeric without decimal 
    $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
	
});

function dispalyNotif(rowcount) {
	var totalcount = $("#release0").val();
	if(totalcount > 0)
	{
		$('#NotifInvModal').modal({show: true});
	}
	else
	{
		$.toast({
		    heading: 'Note',
		    text: "Note: No record found. Please check your data.",
		    icon: 'error',
		    loader: false,   
		    stack: false,
		    position: 'top-center',  
		    bgColor: '#d9534f',
			textColor: 'white',
			allowToastClose: false,
			hideAfter: 5000          
		});
	}
}


function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
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

function isNumberKeyOnly(evt) {    
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	return true;
}