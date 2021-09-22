$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	var username = ""; // wala talagang laman to dapat for officer lang
	
	$("#sosearchfilter").change(function() {
	var searchtype = $('#sosearchfilter').val(); // id ng dropdown
	var currentdate = new Date();

	   if(searchtype == "ponodiv")
       {
		 $('.ponodiv').show('slow');	
		 $('.podatediv').hide('slow');		
		 $('.search_po_btn').show('slow');

		 $(".searchDateFrom").val("");
		 $(".searchDateTo").val("");

	   }
	   if(searchtype == "podatediv")
       {
		 $('.ponodiv').hide('slow');	
		 $(".search_pono").val("");	 
		 $('.podatediv').show('slow');
		 $('.search_po_btn').show('slow');
	   }
});

searchToday();
function searchToday(){ //for date today search first
	var dataTable = $('#table-grid').DataTable({
		
		"serverSide": true,
		"order": [[ 2, "desc" ]],
		"columnDefs": [{ "orderable": false, "targets": [ 7 ], "className": "dt-center" }, {"orderable": false, "targets": [ 9 ],"className": "dt-center" },
		{ "orderable": false, "targets": [ 4 ], "className": "dt-center" }, { "orderable": false, "targets": [ 5 ], "className": "dt-center" },
		{ "orderable": false, "targets": [ 6 ], "className": "dt-center" }, { "orderable": false, "targets": [ 3 ], "className": "dt-center" }],
		"ajax":{
			url :base_url+"Main_sales/table_sales_itinerary", // json datasource
			type: "post",  // method  , by default get
			data:{'username':username},
			beforeSend:function(data){
                $("body").LoadingOverlay("show"); 
            },
			error: function(){  // error handling
				$(".table-grid-error").html("");
				// $("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");
			},
			complete: function()
			{
				$("body").LoadingOverlay("hide"); 
			},
		}

	});
}

var oTable = $('#table-grid').dataTable();

	$("#search_order").click(function() {

	var checker=0;
	var search_pono =  $('.search_pono').val();
	var dateto =  $('.search-input-select1').val();
	var datefrom =  $('.search-input-select2').val();
	
	var searchtype = $('#sosearchfilter').val();

	if(searchtype == "podatediv")
	{
		if(dateto == "" || datefrom == "")
		{
			$.toast({
				heading: 'Note:',
				text: "No date found. Please choose a date.",
				icon: 'info',
				loader: false,  
				stack: false,
				position: 'top-center', 
				allowToastClose: false,
				bgColor: '#FFA500',
				textColor: 'white'  
			});
			checker=0;
		}
		else
		{
			checker=1;
		}

	}

	else if(searchtype == "ponodiv")
	{
		if(search_pono == "")
		{
			$.toast({
				heading: 'Note:',
				text: "No sales order number found. Please fill in data.",
				icon: 'info',
				loader: false,  
				stack: false,
				position: 'top-center', 
				allowToastClose: false,
				bgColor: '#FFA500',
				textColor: 'white'  
			});
			checker=0;
		}
		else
		{
			checker=1;
		}

	}

	if(checker == 1){
		oTable.fnFilter( $(".search-input-select1").val(), '0' );
		oTable.fnFilter( $(".search-input-select2").val(), '1' );
		oTable.fnFilter( $(".search_pono").val(), '2' );
		//oTable.fnFilter( $("#input3").val(), '4' );
	}

});


$(".BtnSaveItinerary").click(function(e){
e.preventDefault();

var token = $("#token").val();    
var count = $("#tdata").val(); // validation    

var sonoarray=[];
var truckarray=[];
var datearray=[];
var userarray=[];
var idnoarray=[];
var areaarray=[];

sonoarray = [];
truckarray = [];
datearray = [];
userarray = [];
idnoarray = [];
areaarray = [];

	for(i=0; i < count; i++ )
{
	var sono = $('#sono'+i).val(); 
	var truck = $('#valplateno'+i).val(); 
	var trandate = $('#trandate'+i).val(); 
	var username = $('#uname'+i).val(); 
	var idno = $('#idno'+i).val(); 
	var area = $('#area'+i).val(); 

	if (truck != "" || truck != 0)
    {  
          sonoarray.push(sono);
		  truckarray.push(truck);
		  datearray.push(trandate);
		  userarray.push(username);
		  idnoarray.push(idno);
		  areaarray.push(area);
         }		
	}

            $.ajax({
                type:'post',
                url:base_url+'Main_sales/r_salesorderitineraryadd',
                data:{
                "sonoarray": sonoarray,
                "truckarray": truckarray,
                "datearray": datearray,
                "userarray": userarray,
                "idnoarray": idnoarray,
                "areaarray": areaarray,
                },
                success:function(data){
                if(data.success == 1)
                    {     
					$.toast({
                        heading: 'Success',
                        text: 'You have successfully save Sales Order Itinerary.',
                        icon: 'success',
                        loader: false,  
                        stack: false,
                        position: 'top-center', 
                        bgColor: '#5cb85c',
                        textColor: 'white',
                        allowToastClose: false,
                        hideAfter: 3000
                    });
                   	window.setTimeout(function(){
	                     window.location.href=base_url+"Main_sales/salesorder_itinerary/" + token;
	             	 },500)
                    } else{
                        $.toast({
                            heading: 'Note',
                            text: 'No record found.',
                            icon: 'error',
                            loader: false,  
                            stack: false,
                            position: 'top-center', 
                            bgColor: '#f0ad4e',
                            textColor: 'white',
                            allowToastClose: false,
                            hideAfter: 3000
                        });

                    	}
                       
                }   
            });    
		});


});

function SetTruckvalue(count)
{
	var plateno = $('#plateno'+count).val();
	$('#valplateno'+count).val(plateno);
}

function isNumberKeyOnly(evt)   
{    
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
          return true;
}

$('.searchDateFrom').datepicker({
	todayBtn: "linked",
	endDate:'+0d'
});	