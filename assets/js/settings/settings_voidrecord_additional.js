$(function () {
    var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
    recordType = "";

    apvno = "";
    rcvno = "";
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

    $("#BtnNextVoid").on("click", function(){
        recordType = $("#recordType").val();
        refno = $("#refno").val();
        reason = $("#reason").val();
        
        $("#packageBtn").hide();
        $("#btnVoid").hide();
        $(".btnConfirmVoid_additional").show();
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

                    if(response.apvno){

                        var total = parseFloat(response.amount);

                        $("#name").text(response.name);
                        $("#drno").text(response.apvno);
                        $("#idno").text('-');

                        $("#totalamt").text(accounting.formatMoney(total.toFixed(2)));
                        $("#trandate").text(response.date);
                        $("#classification").text('-');
                        $("#address").text('-');
                        apvno = response.apvno;

                        makeProgress(33.3,66.6);
                        $('.step1').css('overflow',"hidden");
                        $('.step1').css('position',"absolute");
                        $('.step1').hide('slide', {direction: 'left'}, 1000);
                        $('.step2').stop().show('slide', {direction: 'right'}, 1000);

                        setTimeout(function(){
                            $('.step1').css('overflow',"visible");
                            $('.step1').css('position',"static");
                        }, 2000);

                    }else if(response.rcvno){

                        var total = parseFloat(response.amount);

                        $("#name").text(response.name);
                        $("#drno").text(response.rcvno);
                        $("#idno").text('-');

                        $("#totalamt").text('-');
                        $("#trandate").text(response.date);
                        $("#classification").text('-');
                        $("#address").text('-');
                        rcvno = response.rcvno;

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

                    }else if(response == "cannot_be_voided") {
                        $.LoadingOverlay('hide');
                        toastMessage("Note: ", "This cannot be voided.", "error", "#f0ad4e");
                    }else {
                        $.LoadingOverlay('hide');
                        toastMessage("Note: ", "Reference number does not exists.", "error", "#f0ad4e");
                    }

                    $.LoadingOverlay('hide');
                }
            });
        }
    });

    $("#btnConfirmVoidProceed").on("click", function () {
        reason = $("#reason").val();

        if(recordType == "Accounts Payable Voucher"){
            url = 'Main_settings_void/voidAccountsPayableVoucher';

        }else if(recordType == "Receive Purchase Order"){
            url = 'Main_settings_void/voidReceivePurchaseOrder';

        }else if(recordType == "Purchase Order"){
            url = 'Main_settings_void/voidPurchaseOrder';
        }

        $.ajax({
            url: base_url + url,
            type: 'post',
            data: {
                'recordType' : recordType, 
                'reason' : reason, 
                'apvno': apvno,
                'pono':pono,
                'rcvno':rcvno
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