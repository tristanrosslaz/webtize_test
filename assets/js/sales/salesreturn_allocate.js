$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	var drretno = $("#drretno_id_sec").data("drretno");

	var dataTable = $('#table-grid').DataTable({
		// 
		// "serverSide": true,
        "bServerSide": true,
        "bProcessing": true,
		"destroy":true,
		"ajax":{
			url :base_url+"Main_sales/table_salesreturn_allocate", // json datasource
			type: "post",  // method  , by default get
			data: {"drretno" : drretno},
            beforeSend : function(){
                // $("#table-grid").append("<center style=\"width: 100%; margin-left:200px;margin-top: 100px;\"><img src='"+base_url+"assets/img/loader.gif' style=\"width: 60%;\"></center>");
                $("#table-grid").LoadingOverlay("show");
               
            },
            complete: function(){
               // $("#table-grid").append("");
               $("#table-grid").LoadingOverlay("hide");

               
            },
			error: function(){  // error handling
				$(".table-grid-error").html("");
				// $("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");

			}
		},
        afterSend : function(){
                      $("#table-grid").append("");
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

	$("#form1").submit(function(){
        //e.preventDefault();
        form = $(this);
        serializedForm = form.serializeArray();

        serializedForm.push({
            name: "grandtotal", value: $("#grandtotal").val(),
            name: "retbalance", value: $("#retbalance").val(),
            name: "todaydate", value: $("#todaydate").val(),
            name: "drretno", value: $("#drretno").val(),
        });

         $.ajax({
                type:'post',
                url:base_url+'Main_sales/tbl_salesreturnallocate_save',
                data: serializedForm,
                beforeSend:function(data){
                       // $(".cancelBtn, .saveBtnViolation").prop('disabled', true); 
                        $("#allocateBtn").text("Please wait...");
                        $('#allocateBtn').prop('disabled', true);
                    },
                success:function(data){
                if(data.success == 1)
                    {        
                        $.toast({
                            heading: 'Success',
                            text: 'Sales Return Allocation has been successfully updated.',
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
                                 window.location.href=base_url+"Main_sales/salesreturn_allocate/" + token+'/'+drretno+'/'+idno;
                          }, 500);
                    }else{

                    }


                    
                }
            });
    });
});


function amountAllocate(count,unpaidamount)
{
    var fieldID = 'dr'+count;
    var fieldrun = 'dr';
    var retbalance = document.getElementById("retbalance").value;
    var grandtotal = document.getElementById("grandtotal").value;
    var recAmount = document.getElementById(fieldID).value;
    var diff=0;

    checker=1;
    if (recAmount == "")
    {
        document.getElementById(fieldID).value=0;
    }
    else
    {
        if(parseFloat(recAmount) || (recAmount==0))
        {
           if (recAmount>unpaidamount)
           {
                checker = 3;
           }
        }
        else
        {
            document.getElementById(fieldID).value=0;
        }
    }
   
    if (checker==1)
    {
        var totalamt=0;
        for(var a=1; a<=grandtotal; a++)
        {
            fieldrun = 'dr'+a;
            var val = document.getElementById(fieldrun).value;
            totalamt = (totalamt*1)+(val*1);
        }
        diff = (retbalance*1)-(totalamt*1);
        if (diff>=0)
        {
            if(totalamt==0)
            {
                document.getElementById("allocateBtn").disabled = true;
            }
            else
            {
                document.getElementById("allocateBtn").disabled = false;
            }
            
            totalamt = formatMoney(totalamt); 
            setText('allocLabel',totalamt);
        }
        else
        {
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
    else if (checker==3) 
    {
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
    else
    {

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
function setText(id, txt)
{
 var elem;
   
 if( document.getElementById  && (elem=document.getElementById(id)) )
 {
  if( !elem.firstChild )
   elem.appendChild( document.createTextNode( txt ) );
  else
   elem.firstChild.data = txt;
 }
 
 return false;
}
