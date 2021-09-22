$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	var username = ""; // wala talagang laman to dapat for officer lang

	// get the date today
	var d = new Date();
	var date = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();

	$("#searchfilter").change(function() {
		var searchtype = $('#searchfilter').val(); // id ng dropdown
		var currentdate = new Date();

	   	if(searchtype == "nodiv") {
			$('.nodiv').show('slow');
			$('.datediv').hide('slow');
			$('.statusdiv').hide('slow');
			$(".searchStatus").val("").change();
			$(".searchNo").val("");
	   	}
	   	if(searchtype == "datediv") {	
			$('.datediv').show('slow');
			$('.nodiv').hide('slow');
			$('.statusdiv').hide('slow');
			$(".searchStatus").val("").change();
			$(".searchNo").val("");
	   	}
	   	if(searchtype == "statusdiv") {	
			$('.statusdiv').show('slow');
			$('.nodiv').hide('slow');
			$('.datediv').hide('slow');
			$(".searchStatus").val("").change();
			$(".searchNo").val("");
	   	}
	});

	function fillDatatable(searchtype, datefrom, dateto, drretno, status) {
		var dataTable = $('#table-grid').DataTable({
			destroy: true,
			"serverSide": true,
			"order": [[ 1, "desc" ]],
			//"columnDefs": [{ "orderable": false, "targets": [ 6 ], "className": "dt-center" }, {"orderable": false, "targets": [ 4 ]}],
			"columnDefs": [{"orderable": false, "targets": [ 4 ]}, {"targets": [3,4], "className": "dt-body-right"}],
			"ajax":{
				url :base_url + "sales/Sales_salesreturn_history/table_salesreturn_summary", // json datasource
				type: "post",  // method  , by default get
				data:{'searchtype':searchtype, 'datefrom':datefrom, 'dateto':dateto, 'drretno':drretno, 'status':status},
				beforeSend:function(data) {
					$("body").LoadingOverlay("show"); 
				},
				complete: function() {
					$("body").LoadingOverlay("hide"); 
				},
				error: function() {  // error handling
					$(".table-grid-error").html("");
					// $("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#table-grid_processing").css("display","none");
				}
			}
		});
	}

	fillDatatable("datediv", date, date, "", "");

	$("#btnSearch").click(function() {
		var checker=0;
		var searchtype = $('#searchfilter').val();
		var dateto =  formatDate($('.dateTo').val());
		var datefrom =  formatDate($('.dateFrom').val());
		var no =  $('#searchNo').val();
		var status =  $('#searchStatus').val();

		if (searchtype == "datediv") {
			if (dateto == "" || datefrom == "") {
				$.toast({
					heading: 'Note:',
					text: 'Please fill in date field.',
					icon: 'info',
					loader: false,  
					stack: false,
					position: 'top-center', 
					allowToastClose: false,
					bgColor: '#FFA500',
					textColor: 'white'  
				});
				checker = 0;
			}
			else {
				checker = 1;
			}
		}
		else if (searchtype == "nodiv") {
			if(no == "") {
				$.toast({
					heading: 'Note:',
					text: "No DR Return number found. Please fill in data.",
					icon: 'info',
					loader: false,  
					stack: false,
					position: 'top-center', 
					allowToastClose: false,
					bgColor: '#FFA500',
					textColor: 'white'  
				});
				checker = 0;
			}
			else {
				checker = 1;
			}
		}
		else if (searchtype == "statusdiv") {
			if(status == "") {
				$.toast({
					heading: 'Note:',
					text: "No status selected. Please select a status.",
					icon: 'info',
					loader: false,  
					stack: false,
					position: 'top-center', 
					allowToastClose: false,
					bgColor: '#FFA500',
					textColor: 'white'  
				});
				checker = 0;
			}
			else {
				checker = 1;
			}
		}

		if (checker == 1) {
			fillDatatable(searchtype, datefrom, dateto, no, status);
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

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}

function tofixed(x){
	return numberWithCommas(parseFloat(x).toFixed(2));
}

function numberWithCommas(x){
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}