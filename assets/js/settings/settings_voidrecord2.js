$(function () {
    var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
    recordType = "";

    depno = "";
    glno = "";
    poretno = "";
    adjno = "";
    iltno = "";
    supid = "";
    buildno = "";

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

    $("#BtnNextVoid2").on("click", function(){
        recordType = $("#recordType").val();
        refno = $("#refno").val();
        reason = $("#reason").val();
        
        $("#packageBtn").hide();
        $("#btnVoid").hide();
        $(".btnConfirmVoid_additional").hide();
        $(".btnConfirmVoid2").show();

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
                    
                    if(response == null){
                        $.LoadingOverlay('hide');
                        toastMessage("Note: ", "Reference number does not exists.", "error", "#f0ad4e");
                    }
                    else if(response.depno){

                        var total = parseFloat(response.amount);

                        $("#name").text(response.name);
                        $("#drno").text(response.depno);
                        $("#idno").text('-');

                        $("#totalamt").text(accounting.formatMoney(total.toFixed(2)));
                        $("#trandate").text(response.date);
                        $("#classification").text('-');
                        $("#address").text('-');
                        depno = response.depno;

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

                    else if(response.glno){

                        var total = parseFloat(response.amount);

                        $("#name").text(response.name);
                        $("#drno").text(response.glno);
                        $("#idno").text('-');

                        $("#totalamt").text(accounting.formatMoney(total.toFixed(2)));
                        $("#trandate").text(response.date);
                        $("#classification").text('-');
                        $("#address").text('-');
                        glno = response.glno;

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

                    else if(response.poretno){

                        var total = parseFloat(response.amount);

                        $("#name").text(response.name);
                        $("#drno").text(response.poretno);
                        $("#idno").text('-');

                        $("#totalamt").text(accounting.formatMoney(total.toFixed(2)));
                        $("#trandate").text(response.date);
                        $("#classification").text('-');
                        $("#address").text('-');
                        poretno = response.poretno;

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

                    else if(response.adjno){

                        $("#name").text('-');
                        $("#drno").text(response.adjno);
                        $("#idno").text('-');

                        $("#totalamt").text('-');
                        $("#trandate").text(response.date);
                        $("#classification").text('-');
                        $("#address").text('-');
                        adjno = response.adjno;

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

                    else if(response.iltno){

                        $("#name").text('-');
                        $("#drno").text(response.iltno);
                        $("#idno").text('-');

                        $("#totalamt").text('-');
                        $("#trandate").text(response.date);
                        $("#classification").text('-');
                        $("#address").text('-');
                        iltno = response.iltno;

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

                    else if(response.supid){

                        $("#name").text(response.name);
                        $("#drno").text(response.supid);
                        $("#idno").text('-');

                        $("#totalamt").text('-');
                        $("#trandate").text('-');
                        $("#classification").text('-');
                        $("#address").text('-');
                        supid = response.supid;

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

                    else if(response.buildno){

                        $("#name").text('-');
                        $("#drno").text(response.buildno);
                        $("#idno").text('-');

                        $("#totalamt").text('-');
                        $("#trandate").text(response.date);
                        $("#classification").text('-');
                        $("#address").text('-');
                        buildno = response.buildno;

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

                    else if(response == "cannot_be_voided") {
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

    $("#btnConfirmVoidProceed2").on("click", function () {
        reason = $("#reason").val();

        if(recordType == "Bank Deposit"){
            url = 'Main_settings_void/voidBankDeposit';

        }else if(recordType == "GL Transaction"){
            url = 'Main_settings_void/voidGLTransaction';

        }else if(recordType == "PO Return"){
            url = 'Main_settings_void/voidPOReturn';

        }else if(recordType == "Inventory Adjustment"){
            url = 'Main_settings_void/voidInvAdj';

        }else if(recordType == "Inventory Location Transfer"){
            url = 'Main_settings_void/voidInvLocTrans';

        }else if(recordType == "Supplier"){
            url = 'Main_settings_void/voidSupplier';

        }else if(recordType == "Build Inventory"){
            url = 'Main_settings_void/voidBuildInventory';
        }
        
        $.ajax({
            url: base_url + url,
            type: 'post',
            data: {
                'recordType' : recordType, 
                'reason' : reason, 
                'depno':depno,
                'glno':glno,
                'poretno':poretno,
                'adjno':adjno,
                'iltno':iltno,
                'supid':supid,
                'buildno':buildno

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