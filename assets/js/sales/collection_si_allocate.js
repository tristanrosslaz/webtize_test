$(function(){
var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
var collectionid = $("#collection_id_sec").data("collectionid");
var idno = $("#idno").val();
var dataTable = $('#table-grid').DataTable({
	"serverSide": true,	
    "order": [[ 1, "desc" ]],
    "columnDefs": [{'targets': [2,3], 'className': 'dt-body-right'}],
    "destroy":true,
	"ajax":{
		url :base_url+"Main_sales/table_si_collection_allocate", // json datasource
		type: "post",  // method  , by default get
		data: {"collectionid" : collectionid},
        beforeSend:function(data){
            $.LoadingOverlay("show"); 
        },
        complete: function(){
           // $("#table-grid").append("");
           $("#loadingImg").prop("hidden", true);
        },
		error: function(){  // error handling
			$(".table-grid-error").html("");
			// $("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
			$("#table-grid_processing").css("display","none");
		},
        complete: function(data){
            $.LoadingOverlay("hide"); 
        }
	},

});

dataTable.destroy();

$('.search-input-text').on('keyup click', function(){   // for text boxes
var i =$(this).attr('data-column');  // getting column index
var v =$(this).val();  // getting search input value
dataTable.columns(i).search(v).draw();
});

$('.search-input-select').on('change', function(){   // for select box
var i =$(this).attr('data-column');  
var v =$(this).val();  
dataTable.columns(i).search(v).draw();
});

$(".printSalesOrder").click(function(e){
e.preventDefault();
var sono = $(".sono_id_sec").val();

window.location.href = ''+base_url+'Main/salesorder_exportPDF/'+sono;
});

$("#form1").submit(function(e){
e.preventDefault();
form = $(this);
serializedForm = form.serializeArray();
var token = $("#token").val();

serializedForm.push({
    name: "grandtotal", value: $("#grandtotal").val(),
    name: "drpaybalance", value: $("#drpaybalance").val(),
    name: "todaydate", value: $("#todaydate").val(),
    name: "collectionid", value: $("#collectionid").val(),
});

 $.ajax({
        type:'post',
        url:base_url+'Main_sales/tbl_si_collectionallocate_save',
        data: serializedForm,
        beforeSend: function() {
            $.LoadingOverlay("show");
        },
        success:function(data){

        $.LoadingOverlay("hide");
        if(data.success == 1){      
                window.setTimeout(function(){
                         window.location.href=base_url+"Main_sales/collection_summary/" + token;
                  },500);
                    $.toast({
                        heading: 'Success',
                        text: 'Collection Allocation has been successfully updated.',
                        icon: 'success',
                        loader: false,  
                        stack: false,
                        position: 'top-center', 
                        bgColor: '#5cb85c',
                        textColor: 'white',
                        allowToastClose: false,
                     });
                }else{
                    $.toast({
                        heading: 'Note',
                        text: 'Please fill required fields.',
                        icon: 'error',
                        loader: false,  
                        stack: false,
                        position: 'top-center', 
                        bgColor: '#f0ad4e',
                        textColor: 'white',
                        allowToastClose: false,
                   });
                }   
            }
        });
    });
});


function amountAllocateCollection(count,unpaidamount)
{  
    var fieldID = 'dr'+count;
    var fieldrun = 'dr';
    var drpaybalance = $("#drpaybalance").val();
    var grandtotal = $("#grandtotal").val();
    var recAmount = document.getElementById(fieldID).value;
    var diff=0;
  
    checker=1;
    if (recAmount == ""){
        document.getElementById(fieldID).value=0;
    }
    else{
        if(parseFloat(recAmount) || (recAmount==0)){
           if (recAmount>unpaidamount){
                checker = 3;
           }
        }
        else{
            document.getElementById(fieldID).value=0;
        }
    }
  
    if (checker==1){      
        var totalamt=0;
        for(var a=1; a<=grandtotal; a++){
            fieldrun = 'dr'+a;
            var val = document.getElementById(fieldrun).value;
            totalamt = (totalamt*1)+(val*1);
        }
        
        diff = (drpaybalance*1)-(totalamt*1);
        
        if (diff>=0){
            if(totalamt==0){
                document.getElementById("allocateBtn").disabled = true;
            }
            else{
                document.getElementById("allocateBtn").disabled = false;
            }
            
            totalamt = formatMoney(totalamt); 
            setText('allocLabel',totalamt);
        }
        else{
            $.toast({
                heading: 'Note',
                text: 'You have insufficient balance for allocation.',
                icon: 'error',
                loader: false,  
                stack: false,
                position: 'top-center', 
                bgColor: '#f0ad4e',
                textColor: 'white',
                allowToastClose: false,
                hideAfter: 3000
             });
            document.getElementById(fieldID).value=0;
        }
    }
    else if (checker==3){
        $.toast({
                heading: 'Note',
                text: 'Allocated amount is exceeds the unpaid amount.',
                icon: 'error',
                loader: false,  
                stack: false,
                position: 'top-center', 
                bgColor: '#f0ad4e',
                textColor: 'white',
                allowToastClose: false,
                hideAfter: 3000
            });
        document.getElementById(fieldID).value=0;
    }
    else{
            $.toast({
                heading: 'Note',
                text: 'Please make sure all values entered are correct.',
                icon: 'error',
                loader: false,  
                stack: false,
                position: 'top-center', 
                bgColor: '#f0ad4e',
                textColor: 'white',
                allowToastClose: false,
                hideAfter: 3000
            });
        document.getElementById(fieldID).value=0;
    }
    
}

//set label text
function setText(id, txt){
 var elem;
   
 if( document.getElementById  && (elem=document.getElementById(id))){
  if( !elem.firstChild )
   elem.appendChild( document.createTextNode( txt ) );
  else
   elem.firstChild.data = txt;
 }
 
 return false;
}
