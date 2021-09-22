$(function(){
var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	$("#btnShipping").prop('disabled',true);
	$("#isActive").val(1);
	$("#notes").prop('disabled',true);

	var sono_id = $("#sono_id").val();
	/*var dataTable = $('#table-grid').DataTable({
		"destroy": true,
		"serverSide": true,
		"order": [[ 2, "desc" ]],
		"ajax":{
			type: "post", 
			url :base_url+"sales/Sales_drconvert/so_item_drConvertDetails", // json datasource
			data:{'sono_id':sono_id},
			beforeSend:function(data) {
				$.LoadingOverlay("show"); 
			},
			error: function() {  // error handling
				$(".table-grid-error").html("");
				$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");
			},
			complete: function() {
				var shipamt = $("#shippingamt").val();
				$("#totalamt").val(shipamt);
				if(shipamt == "") {
					shipamt = 0;
				}  
				// document.getElementById('btnGrandtotal').innerText = "Total: " + formatMoney(shipamt,2, ".", ",");
				$(".btnGrandtotal").text("Total : "+formatMoney(shipamt,2, ".", ","));
				$.LoadingOverlay("hide");
			},
		}
	});*/

	drItems = [];
	grandtotal = 0;

	// get all items of the sales order
	// gathered data will be stored in drItems array and the will be used to populate the datatable
	$.ajax({
  		type: 'post',
  		url: base_url + 'sales/Sales_drconvert/getDrItems',
  		data:{ 'sono_id':sono_id },
  		beforeSend:function(data) {
  			$.LoadingOverlay("show"); 
		},
  		success:function(data) {
  			$.each(eval(data), function(key, value){
  				data = {
					itemid: value.itemid,
					itemname: value.itemname,
					qty: value.qty,
					releaseqty: 0,
					diffqty: parseFloat(value.qty) - 0,
					uomid: value.uomid,
					unit: value.unit,
					price: value.price,
					discamt: value.discamt,
					disctype: value.discount_type,
					subtotal: value.total,
					total: parseFloat(value.price) * 0
				}
				
				drItems.push(data);
			});
			populateTable();
			updateTotal();
			$(".btnManualItem").prop('disabled',true);
			$.LoadingOverlay("hide");
  		}
  	});

	// initialize datatable
  	var table = $('#table-grid').DataTable({ //declaring of table
  		destroy: true,
        columnDefs: [{ targets: [12], visible: true, orderable: false, sClass: 'text-center'}],
        columnDefs: [{ targets: [0], sClass: 'td_id'}],
        columnDefs: [{ "targets": [ 0 ], "visible": false, "searchable": false }, { "targets": [ 5 ], "visible": false }, { "targets": [ 9 ], "visible": false }, { "targets": [ 10 ], "visible": false }]
    });//data table

  	// function for binding and refreshing datatable data
    function populateTable(){
    	table.clear();
    	for(var a = 0; a < drItems.length; a++){
    		if (drItems[a].disctype == 2) {
    			discount = drItems[a].discamt + "%";
    		}
    		else {
    			discount = accounting.formatMoney(drItems[a].discamt)
    		}
			selectedDataarray = [
                drItems[a].itemid,
                drItems[a].itemname.toUpperCase(),
                accounting.formatMoney(drItems[a].qty),
                accounting.formatMoney(drItems[a].releaseqty),
                accounting.formatMoney(drItems[a].diffqty),
                drItems[a].uomid,
                drItems[a].unit,
                accounting.formatMoney(drItems[a].price),
                discount,
                drItems[a].disctype,
                accounting.formatMoney(drItems[a].subtotal),
                accounting.formatMoney(drItems[a].total),
                "<center><button class='btn btn-success btnManualItem' data-toggle='modal' data-value='" + a + "' data-backdrop='static' data-keyboard='false' data-target='#editdrModal'>Release</button></center>"
            ];// adding selected data to array 

        	table.row.add(selectedDataarray);   
		}        
        table.draw();
    }

    // function for updating total
    // mostly called when changing the release quantity and shipping amount
    function updateTotal() {
		grandTotal = 0;
		gendiscount = $("#gendiscount").val();
		gendisctype = $("#gendiscounttype").val();
		shippingamt = $("#shippingamt").val();

		$.each(drItems, function(index, value) { 
		    var total = parseFloat(value.total);
	        grandTotal += total;
		});
		$("#totalamt").val(grandTotal);

		if (gendisctype == 2) {
			grandDiscount = parseFloat(grandTotal) * (parseFloat(gendiscount) / 100);
		}
		else {
			grandDiscount = gendiscount;
		}

		discountedGrandTotal = (parseFloat(grandTotal) - parseFloat(grandDiscount)) + parseFloat(shippingamt);

		if (discountedGrandTotal <= 0) {
			discountedGrandTotal = 0;
		}

		if (grandTotal > 0) {
			$(".btnDeliveryComfirm").prop('disabled',false);
		}
		else {
			$(".btnDeliveryComfirm").prop('disabled',true);
		}

		$(".btnGrandtotal").html("TOTAL: " + formatMoney(discountedGrandTotal));
	}

	// manual release of a specific item in the datatable
	$('#table-grid').delegate(".btnManualItem", "click", function(){
		var i = $(this).data('value');
		$( "#releaseqty" ).val(drItems[i].qty);
		$( "#releaseqty" ).attr({"max" : drItems[i].qty});
		$("#invname").val(drItems[i].itemname);
		$("#itemid_value").val(drItems[i].itemid);
	});

	// increasing or decreasing the number of release quantity
	$(".btnManualRelease").click(function(e){
		releaseqty = $( "#releaseqty" ).val();
		itemid = $( "#itemid_value" ).val();
		itemname = $( "#invname" ).val();

		if (releaseqty == "") {
			$.toast({
			    heading: 'Note:',
			    text: "No record found. Please input release quantity.",
			    icon: 'info',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 5000          
			});
		}
		else {
			for(var a = 0; a < drItems.length; a++){
				if (drItems[a].itemid == itemid) {
					diffqty = parseFloat(drItems[a].qty) - parseFloat(releaseqty);
					total = parseFloat(drItems[a].price) * parseFloat(releaseqty);
					discount = 0;

					if (drItems[a].disctype == 2) {
						discount = parseFloat(total) * (parseFloat(drItems[a].discamt) / 100);
					}
					else {
						discount = drItems[a].discamt;
					}

					discountedTotal = parseFloat(total) - parseFloat(discount);

					if (discountedTotal < 0) {
						discountedTotal = 0;
					}

					data = {
						itemid: itemid,
						itemname: itemname,
						qty: drItems[a].qty,
						releaseqty: releaseqty,
						diffqty: diffqty,
						uomid: drItems[a].uomid,
						unit: drItems[a].unit,
						price: drItems[a].price,
						discamt: drItems[a].discamt,
						disctype: drItems[a].disctype,
						subtotal: drItems[a].total,
						total: discountedTotal
					}

					drItems.splice(a, 1);
					drItems.push(data);
				}
			}

			populateTable();
			updateTotal();
		}
	});

	// user cannot input release quantity higher than the SO Quantity or lower than 0
	$('#releaseqty').on('keydown keyup', function(e){
        if ($(this).val() > parseInt($(this).attr('max')) 
            && e.keyCode !== 46 // keycode for delete
            && e.keyCode !== 8 // keycode for backspace
           	) {
           	e.preventDefault();
           	$(this).val($(this).attr('max'));
        }
    });

	// clears the shipping amount input field
	$("#btnShipping").click(function(e){
		$("#shipping").val($("#shippingamt").val());
	});
	
	// update the shipping amount and grand total
	$(".btnassignShip").click(function(e){
		e.preventDefault();

		$('#code-scan').focus();

		var shipamt = $("#shipping").val();

		if(shipamt == "") {
			shipamt = 0;
		}

		$("#shippingamt").val(shipamt);
		$(".btnShipping").text("Shipping : " + formatMoney(shipamt,2, ".", ","));
		updateTotal();
	});
	//end

	$( ".btnConvert" ).click(function(e){
		e.preventDefault();

		if (grandTotal == 0) {
			$.toast({
			    heading: 'Note:',
			    text: "No record found. Atleast one release is needed.",
			    icon: 'info',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 5000          
			});
		}
		else {
			$.ajax({
		  		type: 'post',
		  		url: base_url + 'sales/Sales_drconvert/save_item_releaseDetails',
		  		data:{
		  			'sono_id':sono_id, 
		  			'drItems': drItems,
		  		  	'idno': $("#idno_id").val(),
		  		   	'locid': $("#location_id").val(),
		  		    'shippingid': $("#shipping_id").val(),
		  			'sales_date': formatDate($(".sales_date").val()),
		  			'totalamt': grandTotal,
		  			'notes': $("#notes").val(),
		  			'gendiscount': $("#gendiscount").val(),
					'gendisctype': $("#gendiscounttype").val(),
					'shippingamt': $("#shippingamt").val()
		  		},
		  		beforeSend:function(data) {
					$(".cancelBtn").prop('disabled', true); 
					$(".btnDeliveryComfirm").text("Please wait...");
					$(".btnConvert").prop('disabled', true); 
  					$.LoadingOverlay("show"); 
				},
		  		success:function(data) {
		  			$.LoadingOverlay("hide"); 
		  			if (data.success == 1) {
		  				$(".btnDeliveryComfirm").prop('disabled', true); 
		  				$(".btnDeliveryComfirm").text("Converted DR");
							$.toast({
							    heading: 'Success',
							    text: "DR #"+ data.drno +" successfully added for release.",
							    icon: 'success',
							    loader: false,  
							    stack: false,
							    position: 'top-center', 
							    bgColor: '#5cb85c',
								textColor: 'white',
								allowToastClose: false,
								hideAfter: 10000,
							});
						//dataTable.draw();
						window.setTimeout(function() {
							window.location.href = base_url+"Main_sales/sales_dr/" + $("#token").val();
						},500)
						$(".btnConvert").prop('disabled', true); 
		  			}
		  			else {
		  				$(".btnConvert").prop('disabled', false);
		  			}
		  		}

		  	});
		}
	});

	//start
	/*$(".btnConvert").click(function(e){
		e.preventDefault();

		$('#code-scan').focus();
		var itemarray	= [];
		var qtyarray	= [];
		var pricearray	= [];
		var discarray 	= [];
		var disctypearray 	= [];

		var checker 	= 0;
		itemarray		= [];
		qtyarray		= [];
		pricearray		= [];
		discarray 		= [];
		disctypearray 	= [];

		var sono_id = $("#sono_id").val();
		var totalcount = $("#release0").val();
		var totalcount1 = $("#totaldata0").val();
		var idno = $("#idno_id").val();
		var locid = $("#location_id").val();
		var shippingid = $("#shipping_id").val();
		var totalamt = $("#totalamt").val();
		var sdate = $(".sales_date").val();
		var shippingamt = $("#shippingamt").val();
		var notes = $("#notes").val();
		var token = $("#token").val();
		var release0 = $("#release0").val();
		var gendiscount = $("#gendiscount").val();
		var gendiscounttype = $("#gendiscounttype").val();

		var sales_date =  formatDate(sdate);
		if(totalcount > 0) {
			if(totalamt > 0) {
				for(i = 0; i < totalcount1; i++) {
					var itemid = $("#item"+i).val();
					var barqty = $("#barcodeqty"+i).val();
					var price = $("#price"+i).val();
					var discount = $("#discount"+i).val();
					var discounttype = $("#discounttype"+i).val();

					if(barqty > 0) {
						itemarray.push(itemid);
						qtyarray.push(barqty);
						pricearray.push(price);
						discarray.push(discount);
						disctypearray.push(discounttype);
					}
				}

				$.ajax({
			  		type: 'post',
			  		url: base_url + 'sales/Sales_drconvert/save_item_releaseDetails',
			  		data:{
			  			'sono_id':sono_id, 
			  			'itemarray': itemarray,
			  		 	'qtyarray': qtyarray,
			  		  	'idno': idno,
			  		   	'locid': locid,
			  		    'shippingid': shippingid,
			  			'sales_date': sales_date,
			  			'totalamt': totalamt,
			  			'shippingamt': shippingamt,
			  			'notes': notes,
			  			'discarray': discarray,
			  			'disctypearray': disctypearray,
			  			'pricearray': pricearray,
			  			'gendiscount': gendiscount,
			  			'gendiscounttype': gendiscounttype
			  		},
			  		beforeSend:function(data) {
						$(".cancelBtn").prop('disabled', true); 
						$(".btnDeliveryComfirm").text("Please wait...");
						$(".btnConvert").prop('disabled', true); 
					},
			  		success:function(data) {
			  			if (data.success == 1) {
			  				$(".btnDeliveryComfirm").prop('disabled', true); 
			  				$(".btnDeliveryComfirm").text("Converted DR");
								$.toast({
								    heading: 'Success',
								    text: "DR #"+ data.drno +" successfully added for release.",
								    icon: 'success',
								    loader: false,  
								    stack: false,
								    position: 'top-center', 
								    bgColor: '#5cb85c',
									textColor: 'white',
									allowToastClose: false,
									hideAfter: 10000,
								});
							//dataTable.draw();
							window.setTimeout(function() {
								window.location.href=base_url+"Main_sales/sales_dr/" + token;
							},500)
							$(".btnConvert").prop('disabled', true); 
			  			}
			  			else {
			  				$(".btnConvert").prop('disabled', false);
			  			}
			  		}
			  	});
			}
			else {
				$.toast({
			    heading: 'Note',
			    text: "No item has been release. Please check your data.",
			    icon: 'info',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 7000          
				});
			}

		}
		else {
			$.toast({
			    heading: 'Note',
			    text: "No record found. Please check your data.",
			    icon: 'info',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 5000          
			});
		}
	});*/
	//end

  	$("#releaseqty").each(function () {

        var thisJ = $(this);
        var min = thisJ.attr("min") * 1;
        var intOnly = String(thisJ.attr("intOnly")).toLowerCase() == "true";

        var test = function (str) {
            return str == "" || /* (!intOnly && str == ".") || */
                ($.isNumeric(str)  && str * 1 >= min &&
                (!intOnly || str.indexOf(".") == -1) && str.match(/^0\d/) == null);
                // commented out code would allow entries like ".7"
        };

        thisJ.keydown(function () {
            var str = thisJ.val();
            if (test(str)) thisJ.data("dwnval", str);
        });

        thisJ.keyup(function () {
            var str = thisJ.val();
            if (!test(str)) thisJ.val(thisJ.data("dwnval"));
        })
    });

   	$("#shipping").each(function () {
        var thisJ = $(this);
       // var max = thisJ.attr("max") * 1;
        var min = thisJ.attr("min") * 1;
        var intOnly = String(thisJ.attr("intOnly")).toLowerCase() == "true";

        var test = function (str) {
            return str == "" || /* (!intOnly && str == ".") || */
                ($.isNumeric(str)  && str * 1 >= min &&
                (!intOnly || str.indexOf(".") == -1) && str.match(/^0\d/) == null);
                // commented out code would allow entries like ".7"
        };

        thisJ.keydown(function () {
            var str = thisJ.val();
            if (test(str)) thisJ.data("dwnval", str);
        });

        thisJ.keyup(function () {
            var str = thisJ.val();
            if (!test(str)) thisJ.val(thisJ.data("dwnval"));
        })
    });

	//first
	/*$(".btnManualRelease").click(function(e){
		e.preventDefault();

		var sono_id = $("#sono_value").val();
		var releaseqty = $("#releaseqty").val();
		var actual_qty = $("#actual_qty").val();
		var itemid_value = $("#itemid_value").val();
		var totalcount = $("#totaldata0").val();
		var isActive = $("#isActive").val();
		var disc_qty = $("#disc_qty").val();

		var checker = 0;
	
       	var itemarray=[];
		var qtyarray=[];
		var barqtyarray=[];
		var discqtyarray=[];
		var uomarray=[];
		var pricearray=[];
		var origqtyarray=[]; // for manual
		var discarray=[];
		var disctypearray=[];

		itemarray=[];
		qtyarray=[];
		barqtyarray=[];
		discqtyarray=[];
		uomarray=[];
		pricearray=[];
		origqtyarray=[]; // for manual
		discarray=[];
		disctypearray=[];


		if(releaseqty == "") {
			$.toast({
			    heading: 'Note:',
			    text: "No record found. Please input release quantity.",
			    icon: 'info',
			    loader: false,   
			    stack: false,
			    position: 'top-center',  
			    bgColor: '#FFA500',
				textColor: 'white',
				allowToastClose: false,
				hideAfter: 5000          
			});
		}
		else {
			if(isActive == 0) {
	    		// if(parseFloat(releaseqty) <= parseFloat(disc_qty)) // this code is for continious adding of item
	    		if(parseFloat(releaseqty) <= parseFloat(actual_qty)) {
	    			var totalamount = 0;
					var grandtotalamt = 0;
					var totalbarqty = 0;
					var totaldisc = 0;
					var discount_amt = 0;
					var discount_percent = 0;
					var gtotalamount = 0;

					for( i = 0; i < totalcount; i++ ) {
						var itemid = $("#item"+i).val();
						var qty = $("#qty"+i).val();
						var barqty = $("#barcodeqty"+i).val();
						var itemname = $("#itemname"+i).val();
						var disc = $("#disc"+i).val();
						var uom = $("#uom"+i).val();
						var price = $("#price"+i).val();
						var origqty = $("#origqty"+i).val();
						var discount = $("#discount"+i).val();
						var discounttype = $("#discounttype"+i).val();

						if(discount > 0) {
							if (discounttype == 2) {
								discount_percent = discount / 100;
							}
							else {
								discount_percent = discount;
							}
						}
						else {
							discount_percent = 0;
							discount = 0;
						}

						if(itemid_value == itemid) {
							totaldisc = parseFloat(origqty) - parseFloat(releaseqty);
							itemarray.push(itemid);
							qtyarray.push(qty);
							barqtyarray.push(releaseqty);
							discqtyarray.push(totaldisc);
							uomarray.push(uom);
							pricearray.push(parseFloat(price));
							origqtyarray.push(origqty); // for manual
							discarray.push(discount);
							disctypearray.push(discounttype);
							totalamount = parseFloat(releaseqty) * parseFloat(price);
							if (discounttype == 2) {
								discount_amt = discount_percent * parseFloat(totalamount);
							}
							else {
								discount_amt = discount_percent;
							}
							gtotalamount = totalamount - discount_amt;
    					}
						else {
							itemarray.push(itemid);
							qtyarray.push(qty);
							barqtyarray.push(barqty);
							discqtyarray.push(disc);
							uomarray.push(uom);
							pricearray.push(parseFloat(price));
							origqtyarray.push(origqty); // for manual
							discarray.push(discount);
							disctypearray.push(discounttype);
							totalamount = parseFloat(barqty) * parseFloat(price);
							if (discounttype == 2) {
								discount_amt = discount_percent * parseFloat(totalamount);
							}
							else {
								discount_amt = parseFloat(totalamount) - discount_percent;
							}
							gtotalamount = totalamount - discount_amt;
						}
						grandtotalamt += gtotalamount;
					}
					
					$.ajax({
				  		type: 'post',
				  		url: base_url+'sales/Sales_drconvert/validate_item_releaseDetails',
				  		data:{'sono_id':sono_id},
				  		success:function(data) {
				  			if (data.success == 1) {
				  				var shippingamt = $("#shippingamt").val();
				  				var gendiscounttype = $("#gendiscounttype").val();
				  				var gendiscount = $("#gendiscount").val();
			  					$( "#totalamt" ).val(grandtotalamt);
			  					grandamt = parseFloat(grandtotalamt);

				  				if (gendiscount != 0 || gendiscount != "") {
				  					if ( gendiscounttype == 2 ) {
				  						grandamt = parseFloat(grandamt) - (parseFloat(grandamt) * (parseFloat(gendiscount) / 100));
				  					}
				  					else if ( gendiscount == 1 ) {
				  						grandamt = parseFloat(grandamt) - parseFloat(gendiscount);
				  					}
				  				}

			  					$( "#discountedtotalamt" ).val(grandamt);
				  				var grandamt = parseFloat(grandamt) + parseFloat(shippingamt);
				  				$(".btnGrandtotal").text("Total:  " + formatMoney(grandamt,2, ".", ","));

				  				var dataTable2 = $('#table-grid').DataTable({
				  					"destroy": true,
									"processing": true,
									"serverSide": true,
									"ajax":{
										url :base_url+"sales/Sales_drconvert/display_barcodeitem_releaseDetails", // json datasource
										type: "post",  // method  , by default get
										data:{'itemarray': itemarray, 
										'qtyarray': qtyarray,
										'sono_id':sono_id,
										'totalcount':totalcount, 
										'barqtyarray':barqtyarray,
										'discqtyarray':discqtyarray,
									    'uomarray':uomarray,
										'pricearray':pricearray,
										'origqtyarray' : origqtyarray,
										'discarray' : discarray,
										'disctypearray' : disctypearray,
										'isActive': isActive},
										beforeSend:function(data) {
											$.LoadingOverlay("show"); 
										},
										complete: function() {
											$.LoadingOverlay("hide");
											var totalqtyrelease = 0;
											for(i=0; i < totalcount; i++ ) {
												var qty = $("#barcodeqty"+i).val();
												totalqtyrelease += qty;
											}
											if(totalqtyrelease > 0) {
												$(".btnDeliveryComfirm").prop('disabled',false);
											}
											else {
												$(".btnDeliveryComfirm").prop('disabled',true);
											}

											$.toast({
											    heading: 'Success',
											    text: "Item has been successfully added for release.",
											    icon: 'success',
											    loader: false,  
											    stack: false,
											    position: 'top-center', 
											    bgColor: '#5cb85c',
												textColor: 'white',
												allowToastClose: false,
												hideAfter: 5000,
											});
										},
										error: function(){  // error handling
											$(".table-grid-error").html("");
											$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
											$("#table-grid_processing").css("display","none");
										}
									}
								});

								dataTable2.destroy();
				  			}
				  		}
				  	});
	    		}
	    		else {
	    			$.toast({
						    heading: 'Note:',
						    text: "Quantity exceeded! Please check details.",
						    icon: 'info',
						    loader: false,   
						    stack: false,
						    position: 'top-center',  
						    bgColor: '#FFA500',
							textColor: 'white',
							allowToastClose: false,
							hideAfter: 5000          
						});
	    		}	
			}
			else if(isActive == 1) {
				$.toast({
				    heading: 'Note',
				    text: "Your currently on Barcode input. Please click Manual button to activate manual transaction.",
				    icon: 'info',
				    loader: false,   
				    stack: false,
				    position: 'top-center',  
				    bgColor: '#FFA500',
					textColor: 'white',
					allowToastClose: false,
					hideAfter: 6000          
				});
			}
		}	
	});*/
	//end
	
	var itemcode = "";

	$('#code-scan').codeScanner({
    	onScan: function ($element, code) {
	 		var isActive = $("#isActive").val();
	    	if(isActive == 1) {
				itemcode = code; // return data from the barcode device
		       	var itemarray=[];
				var qtyarray=[];
				var barqtyarray=[];
				var discqtyarray=[];
				var uomarray=[];
				var pricearray=[];
				var origqtyarray=[]; // for manual
				var discarray=[];

				var checker = 0;
				itemarray=[];
				qtyarray=[];
				barqtyarray=[];
				discqtyarray=[];
				uomarray=[];
				pricearray=[];
				origqtyarray=[]; // for manual
				discarray=[];

				var sono_id = $("#sono_id").val();
				var totalcount = $("#totaldata0").val();
				var isMatch = 0;
				$(".btnManualItem").prop('disabled',true); 
			
				var a = 0;
				if(totalcount > 0) {
					for(i=0; i < totalcount; i++ ) {
						var itemid = $("#item"+i).val();
						var qty = $("#qty"+i).val();
						var barqty = $("#barcodeqty"+i).val();
						var itemname = $("#itemname"+i).val();
						var disc = $("#disc"+i).val();
						var barcode = $("#barcode"+i).val();
						var discount = $("#discount"+i).val();

						if(isMatch == 0) {
							if(barcode == itemcode) {
								isMatch = 1;

							 	var value = parseFloat($("#barcodeqty"+i).val());
							 	if(value == "") {
							 		value = 1;
							 	}
							 	else {
							 		value =  value + 1;
							 	}
							 	checker = 1;
							}
						}
					}

					if(isMatch == 0) {
						checker = 2;
						$.toast({
						    heading: 'Note:',
						    text: "No record found. Please check your data.",
						    icon: 'info',
						    loader: false,   
						    stack: false,
						    position: 'top-center',  
						    bgColor: '#FFA500',
							textColor: 'white',
							allowToastClose: false,
							hideAfter: 5000          
						});
					}

				}
				else {
					checker = 2;
					$.toast({
					    heading: 'Note',
					    text: "No record found. Please check your data.",
					    icon: 'info',
					    loader: false,   
					    stack: false,
					    position: 'top-center',  
					    bgColor: '#FFA500',
						textColor: 'white',
						allowToastClose: false,
						hideAfter: 5000          
					});
				}

				if((checker == 1) && (totalcount > 0)) {
					itemarray=[];
					qtyarray=[];
					barqtyarray=[];
					discqtyarray=[];
					uomarray=[];
					pricearray=[];
					origqtyarray=[];
					discarray=[];
					var totaldiscrepancy =0;

					var isExceeded = 1; // if isExceeded is equal to one not exceeded else exceeded.
					var totalamount = 0;
					var grandtotalamt = 0;
					var discount_amt = 0;
					var discount_percent = 0;
					var gtotalamount = 0;

					for(i=0; i < totalcount; i++ ) {
						var zitemid = $("#item"+i).val();
						var zfordisplayqty = $("#qty"+i).val();
						var zqty = $("#barcodeqty"+i).val();
						var zdisc = $("#disc"+i).val();
						var zuom = $("#uom"+i).val();
						var zprice = $("#price"+i).val();
						var origqty = $("#origqty"+i).val(); // for manual
						var zbarcode = $("#barcode"+i).val();
	                    var zdiscount = $("#discount"+i).val();
	                    if(zdiscount > 0) {
							discount_percent = discount / 100;
						}
						else {
							discount_percent = 0;
							zdiscount = 0;
						}

						itemarray.push(zitemid);
						qtyarray.push(zfordisplayqty);
						
						if(itemcode == zbarcode) {
							totaldiscrepancy = parseFloat(zfordisplayqty) - parseFloat(value);

							if(value <= zfordisplayqty) {
								barqtyarray.push(value);
								discqtyarray.push(totaldiscrepancy);
								discarray.push(zdiscount);
								totalamount = parseFloat(value) * parseFloat(zprice);
								discount_amt = discount_percent * parseFloat(totalamount);
								gtotalamount = totalamount - discount_amt;	
								isExceeded=1;
							}
							else {
								isExceeded=0;
							}
						}
						else {
							totalamount = parseFloat(zqty) * parseFloat(zprice);
							discount_amt = discount_percent * parseFloat(totalamount);
							gtotalamount = totalamount - discount_amt;	
							barqtyarray.push(zqty);
							discqtyarray.push(zdisc);
							discarray.push(zdiscount);
						}

						uomarray.push(zuom);
						pricearray.push(zprice);
						origqtyarray.push(origqty); // for manual
						grandtotalamt += gtotalamount;
					}

				}
			
				if(isExceeded > 0) {
					$.ajax({
				  		type: 'post',
				  		url: base_url+'sales/Sales_drconvert/validate_item_releaseDetails',
				  		data:{'sono_id':sono_id},
				  		success:function(data) {
				  			if (data.success == 1) {
				  				$(".btnManualItem").prop('disabled',true);
				  				var shippingamt = $("#shippingamt").val();
				  				var gendiscounttype = $("#gendiscounttype").val();
				  				var gendiscount = $("#gendiscount").val();
			  					$( "#totalamt" ).val(grandtotalamt);
			  					grandamt = parseFloat(grandtotalamt);

				  				if (gendiscount != 0 || gendiscount != "") {
				  					if ( gendiscounttype == 2 ) {
				  						grandamt = parseFloat(grandamt) - (parseFloat(grandamt) * (parseFloat(gendiscount) / 100));
				  					}
				  					else if ( gendiscount == 1 ) {
				  						grandamt = parseFloat(grandamt) - parseFloat(gendiscount);
				  					}
				  				}

			  					$( "#discountedtotalamt" ).val(grandamt);
				  				var grandamt = parseFloat(grandamt) + parseFloat(shippingamt);
				  				$(".btnGrandtotal").text("Total:  " + formatMoney(grandamt,2, ".", ","));

				  				var dataTable2 = $('#table-grid').DataTable({
				  					"destroy": true,
									"processing": true,
									"serverSide": true,
									"ajax":{
										url :base_url+"sales/Sales_drconvert/display_barcodeitem_releaseDetails", // json datasource
										type: "post",  // method  , by default get
										data:{'itemarray': itemarray, 
										'qtyarray': qtyarray,
										'sono_id':sono_id,
										'totalcount':totalcount, 
										'barqtyarray':barqtyarray,
										'discqtyarray':discqtyarray,
									    'uomarray':uomarray,
										'pricearray':pricearray,
										'itemcode' : itemcode, 
										'origqtyarray' : origqtyarray,
										'discarray' : discarray,
										'isActive': isActive},
										beforeSend:function(data) {
											$.LoadingOverlay("show"); 
										},
										complete: function() {
											$.LoadingOverlay("hide");

											var totalqtyrelease = 0;
											for(i=0; i < totalcount; i++ ) {
												var qty = $("#barcodeqty"+i).val();
												totalqtyrelease += qty;
											}
											if(totalqtyrelease > 0) {
												$(".btnDeliveryComfirm").prop('disabled', false);
											}
											else {
												$(".btnDeliveryComfirm").prop('disabled', true);
											}
										},
										error: function(){  // error handling
											$(".table-grid-error").html("");
											$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
											$("#table-grid_processing").css("display","none");
										}
									}
								});

								$.toast({
								    heading: 'Success',
								    text: "Item has been successfully added for release.",
								    icon: 'success',
								    loader: false,  
								    stack: false,
								    position: 'top-center', 
								    bgColor: '#5cb85c',
									textColor: 'white',
									allowToastClose: false,
									hideAfter: 5000,
								});

								dataTable2.destroy();
				  			}
				  		}

					});
				}
				else if(isExceeded == 0) {
			    	$.toast({
					    heading: 'Note',
					    text: "Quantity exceeded! Please check details.",
					    icon: 'info',
					    loader: false,   
					    stack: false,
					    position: 'top-center',  
					    bgColor: '#FFA500',
						textColor: 'white',
						allowToastClose: false,
						hideAfter: 5000          
					});
				}
				else {
			    	$.toast({
					    heading: 'Note',
					    text: "Incorrect use of barcode. Please dont point in remarks area.",
					    icon: 'info',
					    loader: false,   
					    stack: false,
					    position: 'top-center',  
					    bgColor: '#FFA500',
						textColor: 'white',
						allowToastClose: false,
						hideAfter: 5000          
					});
				}							
			}
			else if(isActive == 0) {
				$.toast({
				    heading: 'Note',
				    text: "Your currently on Manual input. Please click Barcode button to activate barcode transaction.",
				    icon: 'info',
				    loader: false,   
				    stack: false,
				    position: 'top-center',  
				    bgColor: '#FFA500',
					textColor: 'white',
					allowToastClose: false,
					hideAfter: 6000          
				});
				setTimeout(function(){
					$('#ShippingModal, #approvalModal, #editdrModal').modal('hide');
				},500);
			}		       	
	  	}
    });

    $('#code-scan').codeScanner();
	
	$(".btnActiveBarcode").click(function(e) {
		e.preventDefault();
		$("#btnShipping").prop('disabled',true); 
		$(".btnManualItem").prop('disabled',true);
		$("#isActive").val(1);
		$("#notes").prop('disabled',true);
		$(".btnManualItem").prop('disabled',true);

		$(".btnActiveBarcode").prop("class","btn btn-success btnActiveBarcode");
		$(".btnActiveManual").prop("class","btn btn-secondary btnActiveManual");
	});

	$(".btnActiveManual").click(function(e) {
		e.preventDefault();
		$("#btnShipping").prop('disabled',false); 
		$(".btnManualItem").prop('disabled',false); 
		$("#isActive").val(0);
		$("#notes").prop('disabled',false);

		$(".btnActiveManual").prop("class","btn btn-success btnActiveManual");
		$(".btnActiveBarcode").prop("class","btn btn-secondary btnActiveBarcode");
	});

	$(".btnDeliveryComfirm").prop('disabled',true);

	/*$(".btnfinalize").click(function(e) {
		e.preventDefault();
		var totalcount = $("#totaldata0").val();
		var isActive = $("#isActive").val();
		var totalqtyrelease = 0;
		for(i=0; i < totalcount; i++ )
		{
			var qty = $("#barcodeqty"+i).val();
			totalqtyrelease += qty;
		}

		if(isActive == 3)
		{
			$("#btnShipping").prop('disabled',false); 
			$(".btnManualItem").prop('disabled',false); 
			$(".btnActiveBarcode").prop('disabled',false); 
			$(".btnActiveManual").prop('disabled',false);
			$(".btnDeliveryComfirm").prop('disabled',true);
			$(".packing").prop('disabled',false);
			$("#isActive").val(0);
			document.getElementById('btnfinalize').innerText = "Closed DR";
		}
		else
		{
			if(totalcount > 0)
			{
				if(totalqtyrelease > 0)
				{
					$("#btnShipping").prop('disabled',true); 
					$(".btnManualItem").prop('disabled',true); 
					$(".btnActiveBarcode").prop('disabled',true); 
					$(".btnActiveManual").prop('disabled',true);
					$(".packing").prop('disabled',true);
					$(".btnDeliveryComfirm").prop('disabled',false);
					$("#isActive").val(3);
					document.getElementById('btnfinalize').innerText = "Open DR";
				}
				else
				{
					$.toast({
					    heading: 'Note',
					    text: "No released record found. Please check your data.",
					    icon: 'info',
					    loader: false,   
					    stack: false,
					    position: 'top-center',  
					    bgColor: '#FFA500',
						textColor: 'white',
						allowToastClose: false,
						hideAfter: 6000          
					});
				}
			}
		}
	});*/

	//allowing numeric with decimal 
    $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
        $(this).val($(this).val().replace(/[^0-9\.]/g,''));
        
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    //allowing numeric without decimal 
    $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

});


function formatMoney(n,c, d, t) {
    c = isNaN(c = Math.abs(c)) ? 2 : c;
    d = d == undefined ? "." : d;
    t = t == undefined ? "," : t; 
    s = n < 0 ? "-" : "";
    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "";
    j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}

function assignShipping() {
	document.getElementById('btnShipping').innerText = "Shipping: " + formatMoney(shippingcharge, 2, ".", ",");
}

function updateShippingSO_r() {
    var shipping = document.getElementById('shippingBtn').innerText;
    shipping = shipping.replace('Shipping: ' ,"");
    shipping=formatCurrency(shipping);
    
    var total = document.getElementById('totalBtn').innerText ;
    total = total.replace('Total: ' ,"");
    total=formatCurrency(total);
    
    var shippingcharge = document.getElementById('shippingcharge').value; shippingcharge=shippingcharge.replace(/#/ig,"").replace(/&/ig,"").replace(/'/ig,"").replace(/"/ig,"");
    var checker=1;
    
    if (shippingcharge == "") {
      	document.getElementById("shippingcharge").style.border='1px solid red';
      	checker=2;
    }
    else {
      	if(parseFloat(shippingcharge) || shippingcharge==0) {
          	document.getElementById("shippingcharge").style.border='1px solid #c8c8c8';
      	}
      	else {
          	document.getElementById("shippingcharge").style.border='1px solid red';
          	checker=2;
      	}
    }
    
    if (checker==1) {
        document.getElementById('shippingcharge').value = "";
        var newtotal = (total*1)-(shipping*1)+(shippingcharge*1);
        document.getElementById('shippingBtn').innerText = "Shipping: " + formatMoney(shippingcharge,2, ".", ",");
        document.getElementById('totalBtn').innerText = "Total: " + formatMoney(newtotal,2, ".", ",");
        document.getElementById('shippingcharge').value = shippingcharge;
    }
    else {
        alert("ERROR: Please make sure all values entered are correct.");
    }
    
    return 1;
}

function ClearFieldsshipping() {
	$("#shipping").val("");
}

function dispalyNotif(rowcount) {
	var totalcount = $("#release0").val();
	if(totalcount > 0) {
		$('#NotifInvModal').modal({show: true});
	}
	else {
		$.toast({
		    heading: 'Note',
		    text: "No record found. Please check your data.",
		    icon: 'error',
		    loader: false,   
		    stack: false,
		    position: 'top-center',  
		    bgColor: '#FFA500',
			textColor: 'white',
			allowToastClose: false,
			hideAfter: 5000          
		});
	}
}

function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}

function isNumberKeyOnly(evt) {    
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	return true;
}