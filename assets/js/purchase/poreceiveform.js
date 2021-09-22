$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	var pono = $("#pono_id_sec").data("pono");
    var token = $("#token").val();

    var dataTable = $('#table-grid').DataTable({
      "processing": true,
      "serverSide": true,
      "destroy":true,
      "ajax":{
			url :base_url+"Main_purchase/table_poreceiveform_view", // json datasource
			type: "post",  // method  , by default get
			data: {"pono" : pono},
            beforeSend:function(data)
            {
                $("body").LoadingOverlay("show"); 
            },
            complete: function()
            {
                $("body").LoadingOverlay("hide"); 
            },
			error: function(){  // error handling
				$(".table-grid-error").html("");
				// $("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");
			}
		},
	});

    dataTable.destroy();

	$("#poreceiveform").submit(function(e){
        e.preventDefault();
        form = $(this);
        serializedForm = form.serializeArray();

        serializedForm.push({
            name: "rcvdate", value: $("#rcvdate").val(),
            name: "suprefno", value: $("#suprefno").val(),
            name: "pono", value: $("#pono").val(),
            name: "totalrows", value: $("#totalrows").val(),
            //name: "rcvno", value: $("#rcvno").val(),
            name: "supplierid", value: $("#supplierid").val(),
            name: "warehouseid", value: $("#warehouseid").val(),
        });

        $.ajax({
            type:'post',
            url:base_url+'Main_purchase/tbl_poreceive_save',
            data: serializedForm,
            beforeSend:function(data)
            {
                $("body").LoadingOverlay("show"); 
            },
            complete: function()
            {
                $("body").LoadingOverlay("hide"); 
            }, 
            success:function(data){
                if (data.success == 1) {
                    toastMessage('Success', 'PO Receive has been successfully processed.', 'success')
                    $(".processBtn").prop("disabled",true);
                        window.setTimeout(function(){
                        window.location.href=base_url+"Main_purchase/receive_po/" + token;
                    })
                }
                else {
                    toastMessage('Note', data.message, 'error')
               }    
           }

       });
    });
});

function rcvAllocate(count,qtybalance) {
    var fieldID = 'qtytoreceive'+count;
    var fieldrun = 'qtytoreceive';
    var rcvQty = document.getElementById(fieldID).value;
    var totalrows = document.getElementById("totalrows").value;
    var suprefno = document.getElementById("suprefno").value;
    
    var diff = 0;

    checker = 1;
    if (rcvQty == "") {
        document.getElementById(fieldID).value=0;
    }
    else {
        if(parseFloat(rcvQty) || (rcvQty==0)) {
           if (rcvQty>qtybalance) {
            checker = 3;
            }
        }
        else {
            document.getElementById(fieldID).value=0;
        }
    }

    if (suprefno == "") {
        document.getElementById("suprefno").style.border='1px solid red'; 
        checker = 2;
    }
    else {
        document.getElementById("suprefno").style.border='1px solid #c8c8c8';
    }


    if (checker == 1) {
        var totalamt=0;
        for(var a=1; a<=totalrows; a++) {
            fieldrun = 'qtytoreceive'+a;
            var val = document.getElementById(fieldrun).value;

            if (val == "x") {
                val = 0;
            }
            totalamt = (totalamt*1)+(val*1);
        }

        if (totalamt >= 0) {

            if(totalamt == 0) {
                document.getElementById("processBtn").disabled = true;
            }
            else {
                document.getElementById("processBtn").disabled = false;
            }
        }
        else {
            toastMessage('Note', 'No Qty to Receive has been found.', 'error')
            document.getElementById(fieldID).value=0;
        }
    }
    else if (checker == 3) {
        toastMessage('Note', 'Qty to receive exceeds the unreceived quantity.', 'error')
        document.getElementById(fieldID).value=0;
    }
    else {
        toastMessage('Note', 'Please enter Supplier Reference No.', 'error')
        document.getElementById(fieldID).value=0;
        $( "#suprefno" ).focus();
    }
}