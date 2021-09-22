$(function () {
    var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
    recordType = "";
    sono = "";
    drno = "";
    sino = "";
    colno = "";
    pono = "";
    rcvno = "";
    apvno = "";
    idno = "";
    cvno = "";
    chkno = "";
    ticketno = "";
    recordType = "";


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

    $("#BtnNextOthers").on("click", function(){
        recordType = $("#recordType").val();
        refno = $("#refno").val();
        reason = $("#reason").val();
        $("#packageBtn").show();
        $("#btnVoid").hide();
        $(".btnConfirmVoid_additional").hide();
        $(".btnConfirmVoid2").hide();

        if (recordType == "" || refno == "" || reason == "") {
            toastMessage("Note: ", "Fill up all required fields", "error", "#f0ad4e");
        }
        else {

            $.ajax({
                url: base_url + 'Main_settings_void/getRelated',
                type: 'post',
                data: {'recordType' : recordType, 'refno' : refno},
                beforeSend: function() {
                    $.LoadingOverlay('show');
                },
                success: function(response) {

                    $("#voidtype").text("Voiding "+ recordType);

                    if (recordType == 'Package Sales') {
                        if(response == 'idno_exist_in_membermain'){
                            $.LoadingOverlay('hide');
                            toastMessage("Note: ", "This ID No. cannot be voided because it has already been encoded or does not exist", "error", "#f0ad4e");  
                        }
                        else if(response){

                            $("#name").text(response.name);
                            $("#idno").text(response.idno);
                            var total = parseFloat(response.packageamount);

                            $("#totalamt").text(accounting.formatMoney(total.toFixed(2)));
                            $("#trandate").text(response.date);
                            $("#classification").text('-');
                            $("#address").text('-');

                            idno = response.idno;

                            makeProgress(33.3,66.6);
                            $('.step1').css('overflow',"hidden");
                            $('.step1').css('position',"absolute");
                            $('.step1').hide('slide', {direction: 'left'}, 1000);
                            $('.step2').stop().show('slide', {direction: 'right'}, 1000);

                            setTimeout(function(){
                                $('.step1').css('overflow',"visible");
                                $('.step1').css('position',"static");
                            }, 2000);
   
                        }
                        else {
                            $.LoadingOverlay('hide');
                            toastMessage("Note: ", "Reference number does not exists.", "error", "#f0ad4e");
                        }
                    }else if(response.chkno){

                        var total = parseFloat(response.amount);

                        $("#name").text(response.name);
                        $("#drno").text(response.chkno);
                        $("#idno").text('-');

                        $("#totalamt").text(accounting.formatMoney(total.toFixed(2)));
                        $("#trandate").text(response.date);
                        $("#classification").text('-');
                        $("#address").text('-');
                        chkno = response.chkno;

                        makeProgress(33.3,66.6);
                        $('.step1').css('overflow',"hidden");
                        $('.step1').css('position',"absolute");
                        $('.step1').hide('slide', {direction: 'left'}, 1000);
                        $('.step2').stop().show('slide', {direction: 'right'}, 1000);

                        setTimeout(function(){
                            $('.step1').css('overflow',"visible");
                            $('.step1').css('position',"static");
                        }, 2000);

                    }else if(response.ticketno){

                        var total = parseFloat(response.amount);

                        $("#name").text(response.name);
                        $("#drno").text(response.ticketno);
                        $("#idno").text(response.idno);

                        $("#totalamt").text('-');
                        $("#trandate").text(response.date);
                        $("#classification").text('-');
                        $("#address").text('-');
                        ticketno = response.ticketno;

                        $("#divreason").show();
                        $("#t_details").text(response.details);

                        makeProgress(33.3,66.6);
                        $('.step1').css('overflow',"hidden");
                        $('.step1').css('position',"absolute");
                        $('.step1').hide('slide', {direction: 'left'}, 1000);
                        $('.step2').stop().show('slide', {direction: 'right'}, 1000);

                        setTimeout(function(){
                            $('.step1').css('overflow',"visible");
                            $('.step1').css('position',"static");
                        }, 2000);
                    }else if(response.cvno){

                        var total = parseFloat(response.amount);

                        $("#name").text(response.name);
                        $("#drno").text(response.cvno);
                        $("#idno").text('-');

                        $("#totalamt").text(accounting.formatMoney(total.toFixed(2)));
                        $("#trandate").text(response.date);
                        $("#classification").text('-');
                        $("#address").text('-');
                        cvno = response.cvno;

                        makeProgress(33.3,66.6);
                        $('.step1').css('overflow',"hidden");
                        $('.step1').css('position',"absolute");
                        $('.step1').hide('slide', {direction: 'left'}, 1000);
                        $('.step2').stop().show('slide', {direction: 'right'}, 1000);

                        setTimeout(function(){
                            $('.step1').css('overflow',"visible");
                            $('.step1').css('position',"static");
                        }, 2000);
                    }else if(response.pono){

                        var total = parseFloat(response.amount);

                        $("#name").text(response.name);
                        $("#drno").text(response.pono);
                        $("#idno").text('-');

                        $("#totalamt").text(accounting.formatMoney(total.toFixed(2)));
                        $("#trandate").text(response.date);
                        $("#classification").text('-');
                        $("#address").text('-');
                        pono = response.pono;

                        makeProgress(33.3,66.6);
                        $('.step1').css('overflow',"hidden");
                        $('.step1').css('position',"absolute");
                        $('.step1').hide('slide', {direction: 'left'}, 1000);
                        $('.step2').stop().show('slide', {direction: 'right'}, 1000);

                        setTimeout(function(){
                            $('.step1').css('overflow',"visible");
                            $('.step1').css('position',"static");
                        }, 2000);
                    }else {
                        $.LoadingOverlay('hide');
                        toastMessage("Note: ", "Reference number does not exists.", "error", "#f0ad4e");
                    }

                    $.LoadingOverlay('hide');
                }
            });
        }
    });

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

    $("#table-apv").delegate("#btnAPVVoid", "click", function(){
        // check if the delivery receipt has been converted to sales invoice
        // if converted, must void sales invoice first
        //if (sino == "") {
            //alert(recordType);
            recordType = "Accounts Payable Voucher";
            $("#txtRecordType").text("Accounts Payable Voucher");
            $("#confirmApvModal").modal("toggle");
        // }
        // else {
        //    toastMessage("Note: ", "Sales Invoice and suceeding record must be voided.", "error", "#f0ad4e");
        //}
    });


    $("#btnConfirmVoid").on("click", function () {
        console.log(recordType)
        reason = $("#reason").val();

        if (recordType == "Package Sales") {
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
                    });
                }
            }
        });
    });

});