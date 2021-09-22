$(function(){
	var base_url = $("body").data('base_url'); //url
	var datas = $("body").data('datas'); // data for query
    var search_label = $("body").data('label'); //label search
    var passCustomerLink = $(".passCustomerLink").val();

    returnEntries = [];
    shipping = 0;
	total = 0;
    
    // reuseable toast call function for easeness and shorter code
	function toastMessage(heading, text, icon) {
        if (icon == "success") {
            bgcolor = "#5cb85c";
        }
        else if (icon == "error") {
            bgcolor = "#f0ad4e";
        }

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
    
    var table = $('#table-grid').DataTable({ //declaring of table
        columnDefs: [{ targets: [6], visible: true, orderable: false, sClass: 'text-center'}, {targets: [3, 4, 5], sClass: 'dt-body-right'}]
    });//data table
    
    // function for binding and refreshing datatable data
    function refreshTable(){
    	table.clear();
    	for(var a = 0; a < returnEntries.length; a++){
            if (returnEntries[a].disctype == "2") {
                discount = accounting.formatMoney(returnEntries[a].disc_percent) + "%";
            }
            else {
                discount = accounting.formatMoney(returnEntries[a].disc_amt);
            }

			selectedDataarray = [
                returnEntries[a].itemname,
                accounting.formatMoney(returnEntries[a].qty),
                returnEntries[a].unit,
                accounting.formatMoney(returnEntries[a].price),
                discount,
                accounting.formatMoney(returnEntries[a].itemtotal),
				//"<center><button class='btn btn-danger btnDelete btnTable' data-value='" + a + "'><i class='fa fa-trash-o'></i> Delete</button></center>",
				"<button class='btn btn-sm btn-danger deletebtn' id='"+a+"'><i class='fa fa-trash-o'></i> Delete</button>"
            ];// adding selected data to array 

        	table.row.add(selectedDataarray);
		}        
        table.draw();
        updateTotal();
		set_handler();
    }
    
    function updateTotal() {
        total = 0;
        shipping = $("#ship_hide").val();
        gen_disctype = $("#hdnGenDiscountType").val();
        gen_discamt = $("#hdnGenDiscount").val();

        for(var a = 0; a < returnEntries.length; a++){
            total += returnEntries[a].itemtotal;
		}

        if (gen_disctype == "2") {
            gen_discount = accounting.formatMoney(gen_discamt) + "%";
            gen_discamt = total * (parseFloat(gen_discamt) / 100);
        }
        else if (gen_disctype == "1") {
            gen_discount = accounting.formatMoney(gen_discamt);
        }
        else if (gen_disctype == "") {
            gen_discount = accounting.formatMoney(0);
            gen_discamt = 0;
        }

        if (shipping == "") {
            shipping = 0;
        }

        grandTotal = (total - parseFloat(gen_discamt)) + parseFloat(shipping);

        $(".btnGenDiscount").text("Discount: " + accounting.formatMoney(gen_discount));
        $(".btnShipping").text("Shipping: " + accounting.formatMoney(shipping));
        $(".grand_total").text("Total: " + accounting.formatMoney(grandTotal));
    }

	set_handler = function(){
		$('.deletebtn').click(function(e){
			returnEntries.splice(e.currentTarget.id, 1);
			refreshTable();
		});
	}

	function makeProgress(from, to){ //increase
		if (from < to) {
			from = from + .20;
			$(".progress-bar").css("width", from + "%");
        }
        
		// Wait for sometime before running this script again
		setTimeout(function(){
			makeProgress(from, to);
		}, 1);
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

    $('.sales_date').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-2d',
        endDate: '+60d'
    });

    //show hide descount input
    // choose discount type select hide show the field
    $(".discount_type_select").change(function(){
        var val = $(this).val();

        if (val == 1) {
            $(".amount_div").show();
            $("#disc_amt").val(0);
            $(".percentage_div").hide();

        }else if (val == 2) {
            $(".percentage_div").show();
            $("#disc_percent").val(0);
            $(".amount_div").hide();

        }else{
            $(".amount_div").hide();
            $("#disc_amt").val(0);
            $("#disc_percent").val(0);
            $(".percentage_div").hide();
        }
    });

    $(function (){
        // choose discount type select hide show the field
        $(".discount_gen_type_select").change(function(){
            var val = $(this).val();

            if (val == 1) {
                $(".amount_div").show();
                $("#disc_gen_amt").val("");
                $(".percentage_div").hide();

            }else if (val == 2) {
                $(".percentage_div").show();
                $("#disc_gen_percent").val("");
                $(".amount_div").hide();

            }else{
                $(".amount_div").hide();
                $("#disc_gen_amt").val("");
                $("#disc_gen_percent").val("");
                $(".percentage_div").hide();
            }
        });
    });

    //validation of required fields, add another code for validation if necessary
    function checkInputs(formname){

        $(formname).find('.required_fields').each(function(){ //loop all input field then validate
            if ($(this).val() == ""){
                $(this).css("border-color", "#d9534f"); //change all empty to color red
            }else{
                $(this).css("border-color", "#eee");  //rollback when not empty
                errorFound = false;
            }
        });

        $(formname).find('.required_fields').each(function(){ //loop all input field then validate
            if ($(this).val() == ""){ // if empty show error
                flag = false; //update error to 1
                // $(this).css("border-color","#d9534f");
                $(this).css("border-color", "#d9534f"); //change all empty to color red
                $(this).focus();

                $.toast({
                heading: 'Note',
                text: 'Please fill out this field',
                icon: 'error',
                loader: false,   
                stack: false,
                position: 'top-center',     
                bgColor: '#f0ad4e;',
                textColor: 'white'
                });
                errorFound = true;
                return false; //focus first empty fields
            }else{
                errorFound = false;
                flag = true;
            }
        });

        if(errorFound == false){
            $(formname).find('.qty').each(function(){ //loop all input field then validate
                if (($(this).val() <= 0) || ($(this).val() == '.')){ // if empty show error
                    flag = false; //update error to 1
                    
                    $(this).css("border-color", "#d9534f"); //change all empty to color red
                    $(this).focus();

                    $.toast({
                    heading: 'Note',
                    text: 'Quantity must not be less than zero',
                    icon: 'error',
                    loader: false,   
                    stack: false,
                    position: 'top-center',     
                    bgColor: '#f0ad4e;',
                    textColor: 'white'
                    });

                    return false; //focus first empty fields

                }else{
                    flag = true;
                    $(this).css("border-color", "#eee");  //rollback when not empty
                }
            }); 
        }
    }

    //clear all form function, please add/change other input to clear if needed
    function clearAddform(){
        $("#qty").css("border-color", "#eee");  //rollback when not empty
        $("#qty").val('');
        $("#searchSalesorder").val('');
        $("#disc_amt").val("");
        $("#disc_percent").val("");
        $("#discount_type_select").val("");
        $(".percentage_div").hide();
        $(".amount_div").hide();
        $(".discount_gen_type_select").val("");
        $(".disc_gen_percent").val("");
        $(".disc_gen_amt").val("");
    }

    function deleteMatch(itemid) {
        for(var a = 0; a < returnEntries.length; a++){
            if (returnEntries[a].item == itemid) {
                returnEntries.splice(a, 1);
            }
        }
    }

    // end of reuseable functions

    $("#searchCustomer").on("change", function(){
        value = $("#searchCustomer").val();
        var parts = value.split('|', 2);
        var idno = parts[0]; 

        if (idno != "") {
            $.ajax({
                type:'post',
                url: base_url + 'sales/Sales_salesreturn/getCustomerDetails',
                data:{"idno": idno},
                beforeSend:function(data) {
                    $.LoadingOverlay("show"); 
                },
                complete: function() {
                    $.LoadingOverlay("hide"); 
                },
                success:function(data) {
                    var obj = JSON.parse(data);
    
                    if (obj[0].ishold == "3") {
                        toastMessage('Warning!', obj[0].membername + ' account is on hold. <a href=" ' + passCustomerLink + '" target="_blank"> View details here</a>.', 'error');
                        $("#searchCustomer").val("").change();
                        $("#address").val("");
                        $("#contact_no").val("");
                        $("#idno").val("");
                        $("#branchname").val("");
                        $("#term_credit").val("");
                        $("#mode_payment").val("");
                        $("#pricecat").val("");
                    }
                    else {
                        $("#address").val(obj[0].address);
                        $("#contact_no").val(obj[0].conno);
                        $("#idno").val(obj[0].idno);
                        $("#branchname").val(obj[0].branchname);
                        $("#term_credit").val(obj[0].description);
                        $("#mode_payment").val(obj[0].termcredit);
                        $("#pricecat").val(obj[0].pricecat);
    
                        $("#membername").text(obj[0].membername);
                        $("#txtDeliveryDate").text($('#sales_date').val());
                        $("#txtBranch").text(obj[0].branchname);
                        $("#txtMop").text(obj[0].description);
                        $("#txtContact").text(obj[0].conno);
                        $("#txtAddress").text(obj[0].address);
                    }
                }
            });
        }
    });
        
	$("#btnNext").click(function(e){
		e.preventDefault();
		var value = $(".searchCustomer").val();
        var parts = value.split('|', 2);
        var searchCustomer = parts[0]; 
        var shipping_id = $(".shipping_id").val();
        var sales_date = $(".sales_date").val();
        var location_id = $(".location_id").val();
        var ishold = $(".ishold").val();
        var name_only = $(".name_only").val();

        if (searchCustomer == "" || shipping_id == "" || location_id == "" || sales_date == "") {
            toastMessage('Warning!', 'Please fill out required fields', 'error');
        }
        else {
            makeProgress(33.3,66.6);
            $('.step1').css('overflow',"hidden");
            $('.step1').css('position',"absolute");
            $('.step1').hide('slide', {direction: 'left'}, 1000);
            $('.step2').stop().show('slide', {direction: 'right'}, 1000);

            // $(".BtnNext").prop("disabled",true);
            setTimeout(function(){
                $('.step1').css('overflow',"visible");
                $('.step1').css('position',"static");
            },2000);
		}
	});
	
	$("#btnBack").click(function(e){
		e.preventDefault();

		makeRollback(66.6, 33.3);

		$('.step_label').text('Step 1'); //step 1
        $('.required_fields').text('Required fields'); //step 1
		$('.step2').hide('slide', {direction: 'right'}, 1000);
		$('.step1').stop().show('slide', {direction: 'left'}, 1000);

		$(".card-body").css("height","315px");
		setTimeout(function(){
			$(".card-body").css("height","auto");
		},1000);

		sum_of_amount = 0; //set to 0 the amount to prevent bubbles

		$(".summary_totalamt").val(sum_of_amount);
	});
    
    // add item inside modal
    $(".add_inventory_modal").click(function(e){
        //checkInputs('#addRow');
        var quantity = $("#qty").val();
        var item = $("#searchSalesorderCode_id").val();
        var itemname = $("#searchSalesorder").val();
        var price = $("#price").val();
        var unit = $("#unit").val();
        var unitid = $("#unitid").val();
        var disc_percent = $("#disc_percent").val();
        var disc_amt = $("#disc_amt").val();
        var disctype = $("#discount_type_select").val();

        if (itemname == ""  || item == "" || unit == "") {
            toastMessage('Note', 'Please fill out required fields', 'error');
        }
        else if (price == 0) {
            toastMessage('Note', 'No Price. Please proceed to Inventory->Inventory Price List', 'error');
        }
        else {
            deleteMatch(item);
            subtotal = parseFloat(price) * parseFloat(quantity);

            if (disctype == "2") {
                total = subtotal - (subtotal * (parseFloat(disc_percent) / 100));
                discount = disc_percent;
            }
            else {
                total = subtotal - parseFloat(disc_amt);
                discount = disc_amt;
            }

            var entry = {
				item: item,
				itemname: itemname,
				price: price,
				qty: quantity,
				unit: unit,
				unitid: unitid,
				discount:discount,
                disctype: disctype,
                itemtotal: total
			}

			returnEntries.push(entry);

            refreshTable();
            console.log(returnEntries);

			//TransTotal = TransTotal+parseFloat($('#t_amount').val());

			//$('#total_label').html(tofixed(TransTotal));

			$('#addRow')[0].reset();
            $('#addAOrderItemModal').modal('hide');
            
            clearAddform(); //clear all forms
        }
    });

    $(".cancelBtn").click(function(e){ //clear forms 
        clearAddform(); 
    });

    // adding shipping amount
    $(".btnassignShip").click(function(e){
        var shipping = $("#shipping").val();
        $(".ship_hide").val(shipping);
        updateTotal();
    });

    // adding general discount
    $(".btnGeneralDiscount").click(function(e){
        var disc_gen_percent = $("#disc_gen_percent").val();
        var disc_gen_amt = $("#disc_gen_amt").val();
        var discount_gen_type_select = $("#discount_gen_type_select").val();

        if(discount_gen_type_select == 2){ //if percentage
            $("#hdnGenDiscount").val(disc_gen_percent);
            $("#hdnGenDiscountType").val(discount_gen_type_select);

        }
        else if(discount_gen_type_select == 1) { //if whole number 
            $("#hdnGenDiscount").val(disc_gen_amt);
            $("#hdnGenDiscountType").val(discount_gen_type_select);
        }
        else { //if no discount
            $("#hdnGenDiscount").val("");
            $("#hdnGenDiscountType").val("");
        }

        updateTotal();
    });

    // saving
	$('#btnSave').click(function(event){
        event.preventDefault();

		if (returnEntries != "") {
			$("#confirmationModal").modal("toggle");
		}
		else {
			toastMessage('Note', 'No record to save.', 'error');
		}
    });
    
    $('#btnConfirm').click(function(){
        value = $("#searchCustomer").val();
        var parts = value.split('|', 2);
        var idno = parts[0]; 

		$.ajax({
            url: base_url+"sales/Sales_salesreturn/saveSalesReturn",
            type: 'post',
            data: { 
                'returnEntries' : returnEntries, 
                'returnTotal'   : total, 
                'freight'       : shipping,
                'idno'          : idno,
                'itemlocid'     : $("#location_id").val(),
                'shipping_id'   : $("#shipping_id").val(),
                'gen_discount'  : $("#hdnGenDiscount").val(),
                'gen_disctype'  : $("#hdnGenDiscountType").val(),
                'sales_date'    : $("#sales_date").val(),
                'notes'         : $("#notes").val()
            },
            beforeSend: function() {
                $.LoadingOverlay("show");
            },
            success: function(data) {
                $.LoadingOverlay("hide");
                if (data.success == 1) {
                    $('.step_label').text(''); //step 5
                    makeProgress(66.6,100);

                    $('.step2').css('overflow',"hidden");
                    $('.step2').css('position',"absolute");
                    $('.step2').hide('slide', {direction: 'left'}, 1000);
                    $('.step3').stop().show('slide', {direction: 'right'}, 1000);

                    // $(".BtnNext").prop("disabled",true);
                    setTimeout(function(){
                        $('.step2').css('overflow',"visible");
                        $('.step2').css('position',"static");
                    }, 2000);
                    // $(".required_fields").prop("hidden",true);
                    // $(".BtnNext").prop("hidden",true);
                    // $(".BtnBack2").prop("hidden",true);
                    // $(".BtnForm1").prop("hidden",true);
                    // $(".BtnForm2").prop("hidden",true);
                    // $(".BtnSaveProceed").prop("hidden",true);

                    $.toast({
                        heading: 'Success',
                        text: 'Sales Return has been successfully saved.',
                        icon: 'success',
                        loader: false,  
                        stack: false,
                        position: 'top-center', 
                        bgColor: '#5cb85c',
                        textColor: 'white',
                        allowToastClose: false,
                        hideAfter: 3000
                    });
                }
                else {
                    $.toast({
                        heading: 'Note',
                        text: 'Sales Return has not been saved.',
                        icon: 'error',
                        loader: false,  
                        stack: false,
                        position: 'top-center', 
                        allowToastClose: true,
                        bgColor: '#f0ad4e',
                        textColor: 'white' 
                    });
                }
                
			    $("#confirmationModal").modal("hide");
            }
        });
	});

});

// 08/14/18 for autocomplete -josh
$(function(){
    var base_url = $("body").data('base_url'); //url

    //function to hightlight the text matched in autocomplete
    function highlightText(text, $node){ 
        var searchText = $.trim(text).toLowerCase(), currentNode = $node.get(0).firstChild, matchIndex, newTextNode, newSpanNode;
        while ((matchIndex = currentNode.data.toLowerCase().indexOf(searchText)) >= 0) {
            newTextNode = currentNode.splitText(matchIndex);
            currentNode = newTextNode.splitText(searchText.length);
            newSpanNode = document.createElement("span");
            newSpanNode.className = "highlight";
            currentNode.parentNode.insertBefore(newSpanNode, currentNode);
            newSpanNode.appendChild(newTextNode);
        }
    }

    //to remove when the input doesn't select in the autocomplete
    $("#searchSalesorder").keyup(function(){
        $("#searchSalesorderCode_id").val("");
        $("#price").val("");

        if ($("#searchSalesorderCode_id").val() == "" && $("#price").val() == "") { //for remove loading
            $(this).css("cssText", "background-image: url('');");
        }
    });
    // to remove when the id is empty
    $("#searchSalesorder").focusout(function(){

        if ($("#searchSalesorderCode_id").val() == "" && $("#price").val() == "") { 
            $(this).val("");
            $(this).css("cssText", "background-image: url('');"); //for remove loading
        }
    });

    // An obbject/map for search term/results tracking
    var vendorCache = {};

    // Keep track of the current AJAX request
    var vendorXhr;

    //autocomplete plugin with ajax 
    $("#searchSalesorder").autocomplete({
        source: function(request, response){
            var typing = $("#searchSalesorder").val();
            var pricecat = $("#pricecat").val();
            var francid = $("#searchCustomer").val();
            var parts = francid.split('|', 2);
            var franchise_id = parts[1]; 

            //ajax to fetch data in autocomplete

            // Check if we already searched and map the existing results
            // into the proper autocomplete format
            if (request.term in vendorCache) {
                $("#searchSalesorder").css("cssText", "background-image: url('"+base_url+"assets/img/autocomplete_loading.gif');");
                response($.map(vendorCache[request.term], function (m) {
                    return { 
                        label: m.name, //name = key of array for label
                        id: m.code, // for id
                        price: m.price, // for price
                        unit: m.unit, // for unit
                        unitid: m.unitid // for unit
                    };
                }));
                setTimeout(function(){
                    $("#searchSalesorder").css("cssText", "background-image: url('');");
                },500);
                
                return;

            }

            // search term wasn't cached, let's get new results
            vendorXhr = $.ajax({
                type: "POST",
                url: base_url+'Main_sales/autocomplete_sales',
                dataType: "json",
                data:{'texttyped':typing, franchise_id: franchise_id, 'pricecat': pricecat},
                beforeSend:function(data){
                    $("#searchSalesorder").css("cssText", "background-image: url('"+base_url+"assets/img/autocomplete_loading.gif');");
                },
                success: function (data, status, xhr){    
                    $("#searchSalesorder").css("cssText", "background-image: url('');");
                    // cache the results
                    vendorCache[request.term] = data.result;

                    // if this is the same request, return the results
                    if (xhr === vendorXhr) {
                        // data is an array of objects and must be transformed for autocomplete to use
                        var array = $.map(data.result, function(m) {
                            return {
                                label: m.name, //name = key of array for label
                                id: m.code, // for id
                                price: m.price, // for price
                                unit: m.unit, // for unit
                                unitid: m.unitid // for unit
                            };
                        });

                        response(array);
                    }                                             
                }
            });
        },

        select: function (event, ui) { //to get id of an item
            $("#searchSalesorderCode_id").val(ui.item.id);
            $("#price").val(ui.item.price);
            $("#unit").val(ui.item.unit);
            $("#unitid").val(ui.item.unitid);
            get_discount(ui.item.id);
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item){ // create highlighted 
        var $div = $("<div></div>").text(item.label);
        highlightText(this.term, $div);
        return $("<li></li>").append($div).appendTo(ul);
    };  

    //allowing numeric with decimal 
    $(".allownumericwithdecimal").on("keypress keyup blur",function (event){
        $(this).val($(this).val().replace(/[^0-9\.]/g,''));
        
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    //allowing numeric without decimal 
    $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event){    
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
});
//08/14/18 for autocomplete -josh

var bse_url = $("body").data('base_url'); //url
function get_discount(val){
    var itemid = val;  
    var idno = $("#idno").val();
    if (itemid != "") 
    {
        $.ajax({
            type:'post',
            url: bse_url+'Main_sales/get_customer_discount',
            data:{"itemid": itemid, "idno": idno},
            beforeSend:function(data){
                $(".select_disc").LoadingOverlay("show"); 
            },
            complete: function(){
                $(".select_disc").LoadingOverlay("hide"); 
            },
            success:function(data){
                if (data.success == 1){
                    var res = data.result;
                    var disctype = data.disctype;

                    //show discount
                    if (disctype == 1) {
                        $(".amount_div").show();
                        $("#disc_amt").val(res);
                        $("#discount_type_select").val(1);
                        $(".percentage_div").hide();

                    }else if (disctype == 2) {
                        $(".percentage_div").show();
                        $("#disc_percent").val();
                        $("#disc_percent").val(res);
                        $("#discount_type_select").val(2);
                        $(".amount_div").hide();

                    }else{
                        $(".amount_div").hide();
                        $("#disc_amt").val();
                        $("#disc_percent").val();
                        $(".percentage_div").hide();
                    }    
                }
            }
        });
    }
}