$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	var username = ""; // wala talagang laman to dapat for officer lang

$("#sosearchfilter").change(function() {
var searchtype = $('#sosearchfilter').val(); // id ng dropdown
var currentdate = new Date();

   if(searchtype == "podatediv")
   {
	 $('.podatediv').show('slow');
	 $('.poshipping').hide('slow');
	 $('.search_po_btn').show('slow');
	 $("#search_shipping").val("");
   }
   if(searchtype == "poshipping")
   {
	 $('.podatediv').show('slow');
	 $('.poshipping').show('slow');
	 $('.search_po_btn').show('slow');
   }
});


searchToday();
function searchToday(){ //for date today search first
var dataTable = $('#table-grid').DataTable({
	
	"serverSide": true,
	"order": [[ 1, "desc" ]],
	"columnDefs": [{ targets: [3], orderable: false, "className": "dt-center"}, { targets: [2], orderable: false, "className": "dt-center"}],
	"ajax":{
		url :base_url+"Main_sales/tble_itinerary_summary", // json datasource
		type: "post",  // method  , by default get
		data:{'username':username},
		beforeSend:function(data)
		{
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
var search_shipping =  $('#search_shipping').val();
var dateto =  $('.search-input-select1').val();
var datefrom =  $('.search-input-select2').val();

var searchtype = $('#sosearchfilter').val();

if(searchtype == "podatediv"){
	if(dateto == "" || datefrom == ""){
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
	else{
		checker=1;
	}
}

else if(searchtype == "poshipping")
{
	if(search_shipping == ""){
		$.toast({
			heading: 'Note:',
			text: "No Truck selected. Please select a Truck.",
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
	else{
		checker=1;
	}
}

if(checker == 1){
	oTable.fnFilter( $(".search-input-select1").val(), '0' );
	oTable.fnFilter( $(".search-input-select2").val(), '1' );
	oTable.fnFilter( $("#search_shipping").val(), '3' );

}

});
	
});