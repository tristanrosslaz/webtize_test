$(function () {
    var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
    recordType = "";
    reason = "";
    trandate = "";
    sono = "";
    drno = "";
    sino = "";
    colno = "";
    pono = "";
    rcvno = "";

    $("#divReference").hide();
    setTimeout(function(){
        $("#divReference").attr("hidden", false);
    }, 1000);

	// reuseable toast call function for easeness and shorter code
	function toastMessage(heading, text, icon, bgcolor) {
		// #5cb85c success
		// #f0ad4e error
		$.toast({
			heading: heading,
			text: text,
			icon: icon,
			loader: false,  
			stack: false,
			position: 'top-center', 
			allowToastClose: false,
			bgColor: bgcolor,
			textColor: 'white'  
		});
    }

    function makeProgress(from, to){ //increase
        if(from < to){
            from = from + .20;
            $(".progress-bar").css("width", from + "%");    
        }
    }

    function makeRollback(from, to){ //decrease
        if(from > to){
            from = from - .20;
            $(".progress-bar").css("width", from + "%");
        }
        // Wait for sometime before running this script again
        setTimeout(function(){
            makeRollback(from, to);
        }, 1);
    }

    $("#recordType").on("change", function(){
        recordType = $("#recordType").val();

        if (recordType != "") {
            $("#divReference").show("slow");
            $("#refno").val("");

            if (recordType == "Sales Order") {
                $("#refno").attr("placeholder", "SO #");
                $('.BtnNext').show();
                $('#BtnNextVoid').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid2').hide();
            }
            else if (recordType == "Delivery Receipt") {
                $("#refno").attr("placeholder", "DR #");
                $('.BtnNext').show();
                $('#BtnNextVoid').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid2').hide();
            }
            else if (recordType == "Collection") {
                $("#refno").attr("placeholder", "Collection #");
                $('.BtnNext').show();
                $('#BtnNextVoid').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid2').hide();
            }
            else if (recordType == "Sales Return") {
                $("#refno").attr("placeholder", "SR #");
                $('.BtnNext').show();
                $('#BtnNextVoid').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid2').hide();
            }
            else if (recordType == "Credit Memo") {
                $("#refno").attr("placeholder", "Credit Memo #");
                $('.BtnNext').show();
                $('#BtnNextVoid').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid2').hide();
            }
            else if (recordType == "Purchase Order") {
                $("#refno").attr("placeholder", "Purchase Order Number");
                $('.BtnNext').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextOthers').show();
                $('#BtnNextVoid2').hide();
            }
            else if (recordType == "Package Sales") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextOthers').show();
                $('#BtnNextVoid2').hide();
            }
            else if (recordType == "Check") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextOthers').show();
                $('#BtnNextVoid2').hide();
            }
            else if (recordType == "Cash Voucher") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextOthers').show();
                $('#BtnNextVoid2').hide();
            }
            else if (recordType == "Customer Ticket") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextOthers').show();
                $('#BtnNextVoid2').hide();
            }
            else if (recordType == "Accounts Payable Voucher") {
                $("#refno").attr("placeholder", "APV Number");
                $('.BtnNext').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid').show();
                $('#BtnNextVoid2').hide();
            }
            else if (recordType == "Receive Purchase Order") {
                $("#refno").attr("placeholder", "PO Receive Number");
                $('.BtnNext').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid').show();
                $('#BtnNextVoid2').hide();
            }
            else if (recordType == "Bank Deposit") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextVoid2').show();
            }
            else if (recordType == "GL Transaction") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextVoid2').show();
            }
            else if (recordType == "PO Return") {
                $("#refno").attr("placeholder", "PO Return Number");
                $('.BtnNext').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextVoid2').show();
            }
            else if (recordType == "Inventory Adjustment") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextVoid2').show();
            }else if (recordType == "Inventory Adjustment") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextVoid2').show();
            }
            else if (recordType == "Inventory Location Transfer") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextVoid2').show();
            }
            else if (recordType == "Customer Ticket") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextVoid2').show();
            }
            else if (recordType == "Supplier") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextVoid2').show();
            }
            else if (recordType == "Build Inventory") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextVoid2').show();
            }
            else if (recordType == "Sales Return") {
                $("#refno").attr("placeholder", "Reference Number");
                $('.BtnNext').hide();
                $('#BtnNextOthers').hide();
                $('#BtnNextVoid').hide();
                $('#BtnNextVoid2').show();
            }
        }
        else {
            $("#divReference").hide("slow");
        }
    });

    $(".BtnNext").on("click", function(){
        recordType = $("#recordType").val();
        refno = $("#refno").val();
        reason = $("#reason").val();
    
        $("#packageBtn").hide();
        $("#btnVoid").show();
        $(".btnConfirmVoid_additional").hide();
        $(".btnConfirmVoid2").hide();
        
        if (recordType == "" || refno == "" || reason == "") {
            toastMessage("Note: ", "Fill up all required fields", "error", "#f0ad4e");
        }
        else {
            // filling of datatables

            $.ajax({
			    url: base_url + 'setting/Settings_voidrecord/getRelated',
			    type: 'post',
			    data: {'recordType' : recordType, 'refno' : refno},
			    beforeSend: function() {
			    	$.LoadingOverlay('show');
			    },
			    success: function(data) {
			        if(data.success == 1){
                        var res = data.result;

                        $.LoadingOverlay('hide');
                        
                        if (recordType == 'Sales Order') {
                            $("#drno").text(res.sono);
                        }
                        else if (recordType == 'Delivery Receipt') {
                            $("#drno").text(res.drno);
                        }
                        else if (recordType == 'Collection') {
                            $("#drno").text(res.colno);
                        }
                        else if (recordType == 'Sales Return') {
                            $("#drno").text(res.drretno);
                        }
                        else if (recordType == 'Credit Memo') {
                            $("#drno").text(res.cmno);
                        }
                        
                        $("#voidtype").text("Voiding " + recordType);
                        $("#name").text(res.name);
                        $("#idno").text(res.idno);
                        $("#address").text(res.address);
                        $("#trandate").text(res.trandate);
                        trandate = res.trandate;
                        $("#classification").text("-");
                        var totalamt = parseFloat(res.totalamt) + parseFloat(res.freight);      
                        $("#totalamt").text(accounting.formatMoney(totalamt));

                        // change visible step
                        makeProgress(33.3,66.6);
                        $('.step1').css('overflow',"hidden");
                        $('.step1').css('position',"absolute");
                        $('.step1').hide('slide', {direction: 'left'}, 1000);
                        $('.step2').stop().show('slide', {direction: 'right'}, 1000);

                        setTimeout(function(){
                            $('.step1').css('overflow',"visible");
                            $('.step1').css('position',"static");
                        }, 2000);
                    }else{
                        $.LoadingOverlay('hide');
                        toastMessage("Note: ", "Reference number does not exists.", "error", "#f0ad4e");
                    }
                }
            });
        }
    });

    $("#btnVoid").on('click', function(e){
        e.preventDefault();

        console.log(recordType)
        console.log(refno)
        console.log(trandate)
        console.log(reason)
        $.ajax({
            type:'post',
            url: base_url + 'setting/Settings_voidrecord/void_record',
            data:{'recordtype':recordType, 'refno':refno, 'trandate':trandate, 'reason':reason},
            beforeSend:function(data){
                $.LoadingOverlay('show');
            },
            success:function(data){

                if (data.success == 1) {

                    $.toast({
                        heading: 'Note',
                        text: data.message,
                        icon: 'success',
                        loader: false,  
                        stack: false,
                        position: 'top-center', 
                        bgColor: '#5cb85c',
                        textColor: 'white',
                        allowToastClose: false,
                        hideAfter: 5000,
                    });

                    setTimeout(function(){
                        location.reload();
                        $.LoadingOverlay('hide');
                    });
                }else{
                    $.toast({
                        heading: 'Note',
                        text: data.message,
                        icon: 'error',
                        loader: false,   
                        stack: false,
                        position: 'top-center',  
                        bgColor: '#FFA500',
                        textColor: 'white',
                        allowToastClose: false,
                        hideAfter: 5000          
                    });

                    $.LoadingOverlay('hide');
                }  
            },
            error: function(request, status, error){
                alert(request.responseText);
            }

        });
    });
    
    $("#btnBack").click(function(){
        makeRollback(66.6, 33.3);

        $('.step1').css('position',"block");
        $('.step2').hide('slide', {direction: 'right'}, 1000);
        $('.step1').stop().show('slide', {direction: 'left'}, 1000);

        $(".card-body").css("height","315px");
        setTimeout(function(){
            $(".card-body").css("height","auto");
        },1000);

        sum_of_amount = 0; //set to 0 the amount to prevent bubbles
        $(".summary_totalamt").val(sum_of_amount);
    });

    // handles button functions for voiding a record

    $("#table-so").delegate("#btnSOVoid", "click", function(){
        // check if the sales order has been received
        // if received, must void delivery receipt first
        if (drno == "") {
            recordType = "SO";
            $("#txtRecordType").text("Sales Order");
            $("#confirmApvModal").modal("toggle");
        }
        else {
            toastMessage("Note: ", "Delivery Receipt and suceeding record must be voided.", "error", "#f0ad4e");
        }
    });

    $("#table-dr").delegate("#btnDRVoid", "click", function(){
        // check if the delivery receipt has been converted to sales invoice
        // if converted, must void sales invoice first
        if (sino == "") {
            recordType = "DR";
            $("#txtRecordType").text("Delivery Receipt");
            $("#confirmApvModal").modal("toggle");
        }
        else {
            toastMessage("Note: ", "Sales Invoice and suceeding record must be voided.", "error", "#f0ad4e");
        }
    });

    $("#table-si").delegate("#btnSIVoid", "click", function(){
        recordType = "SI";
        $("#txtRecordType").text("Sales Invoice");
        $("#confirmApvModal").modal("toggle");
    });

    $('#table-col').delegate("#btnColVoid", "click", function(){
        recordType = "COLLECTION";
        $("#txtRecordType").text("Collection");
        $("#confirmApvModal").modal("toggle");
    });

    $("#table-po").delegate("#btnPOVoid", "click", function(){
        // check if the purchase order has been received
        // if received, must void po receive first
        if (rcvno == "") {
            recordType = "PO";
            $("#txtRecordType").text($("#recordType").val());
            $("#confirmApvModal").modal("toggle");
        }
        else {
            toastMessage("Note: ", "PO Receive and suceeding record must be voided.", "error", "#f0ad4e");
        }
    });

    $("#table-po").delegate("#btnPOVoidApproval", "click", function(){
        // check if the purchase order has been received
        // if received, must void po receive first
        if (rcvno == "") {
            recordType = "PO Approval";
            $("#txtRecordType").text("Purchase Order Approval");
            $("#confirmApvModal").modal("toggle");
        }
        else {
            toastMessage("Note: ", "PO Receive and suceeding record must be voided.", "error", "#f0ad4e");
        }
    });

    $("#table-rcv").delegate("#btnRCVVoid", "click", function(){
        recordType = "PO RECEIVE";
        $("#txtRecordType").text("Receive Purchase Order");
        $("#confirmApvModal").modal("toggle");
    });

    $("#btnConfirmVoid").on("click", function () {
        reason = $("#reason").val();
        
        if (recordType == "SO") {
            url = 'setting/Settings_voidrecord/voidSalesOrder';
        }
        else if (recordType == "DR") {
            url = 'setting/Settings_voidrecord/voidDeliveryReceipt';
        }
        else if (recordType == "SI") {
            url = 'setting/Settings_voidrecord/voidSalesInvoice';
        }
        else if (recordType == "COLLECTION") {
            url = 'setting/Settings_voidrecord/voidCollection';
        }
        else if (recordType == "PO") {
            url = 'setting/Settings_voidrecord/voidPurchaseOrder';
        }
        else if (recordType == "PO Approval") {
            url = 'setting/Settings_voidrecord/voidPOApproval';
        }
        else if (recordType == "PO RECEIVE") {
            url = 'setting/Settings_voidrecord/voidReceivePO';
        }
        else if (recordType == "Package Sales") {
            url = 'Main_settings_void/voidPackageSales';
        }else if(recordType == "Check"){
            url = 'Main_settings_void/voidCheck';
        }else if(recordType == "Cash Voucher"){
            url = 'Main_settings_void/voidCashvoucher';
        }else if(recordType == "Customer Ticket"){
            url = 'Main_settings_void/voidCustomerTicket';
        }
        else if (recordType == "Purchase Order") {
            url = 'Main_settings_void/voidPurchaseOrder';
        }

        $.ajax({
            url: base_url + url,
            type: 'post',
            data: {
                'recordType' : recordType, 
                'reason' : reason, 
                'sono': sono, 
                'drno' : drno, 
                'sino' : sino, 
                'colno' : colno, 
                'pono' : pono, 
                'rcvno' : rcvno,
                'apvno': apvno,
                'idno': idno,
                'chkno': chkno,
                'cvno' : cvno,
                'ticketno':ticketno
            },
            beforeSend: function() {
                $.LoadingOverlay('show');
            },
            success: function(response) {
                $.LoadingOverlay('hide');
                if (response.success) {
                    toastMessage("Success: ", "Record has been voided.", "success", "#5cb85c");

                    setTimeout(function(){
                        location.reload();
                    }, 1000);
                }
            }
        });
    })
})