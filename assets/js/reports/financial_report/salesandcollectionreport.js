$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();

	//code for small nav
	// $(".side-navbar").addClass('shrinked');
	// $("#pageActive").addClass('active');
	// $(".brand-big").css('display','none');
	// $(".brand-small").css('display','block');
	// $("#toggle-btn").click(function(){
	// 	$(".brand-big").toggle();
	// 	$(".brand-small").toggle();
	// });
	//code for small nav

	accounting.settings = {
		currency: {
			symbol : "",   // default currency symbol is '$'
			format: "%s%v", // controls output: %s = symbol, %v = value/number (can be object: see below)
			decimal : ".",  // decimal point separator
			thousand: ",",  // thousands separator
			precision : 2   // decimal places
		},
		number: {
			precision : 0,  // default precision on numbers is 0
			thousand: ",",
			decimal : "."
		}
	}

	//var total_collection = 0; //total collection amount
	var total_collection_cash = 0;
	var total_collection_check = 0;
	var total_collection_online = 0;
	var count = 0; //count for removing th

	$("#searchBtn").click(function(){
		$(".loader").show();
		var filter_report = $(".filter_report").val();
		//alert($(".loader").text());
		if (filter_report == 1) { //with details

			var i = $(".searchDate").attr('data-column'); 
			var v = $(".searchDate").val();
			// 
			count++;
			$.ajax({
				type:'post',
				url:base_url+'Main_reports/bankrecon_report_getshowtd',
				data:{'v':v},
				beforeSend:function(data){
					$('.btnExportRecon').prop('disabled',true);
					$(".dynamic_card").hide();
					
					var countminus = parseInt(count)-1;
					var a = ".dyna_th"+countminus;
					$(a).remove();
					$('#table-grid').DataTable().destroy();
					$('#table-grid').find("tbody").text("");
					$("#searchBtn").prop('disabled',true);
					$("#searchBtn").text('Please Wait...');
					$(".searchDate").prop('disabled',true);
					$(".filter_report").prop('disabled',true);
					$("#table-grid_processing").css("display","block");
					$("#table-grid").prop('hidden',true);
					$("#table-grid2").prop('hidden',true);
					$("#table-grid2_wrapper").prop('hidden',true);
				},
				success:function(data){
					if (data.success == 1) {
						$('.btnExportRecon').prop('disabled',false);
						
						// $(".loader").hide();
						//alert('done');
						$("#searchBtn").prop('disabled',false);
						$("#table-grid_processing").css("display","none");
						var res = data.result.sort();
						var reslen = res.length;
						var list = "";

						for(var x = 0; x < reslen; x++){
							//alert(res[x]);
							list += "<th class='dyna_th"+count+"'>"+res[x]+"</th>";
						}
						list += "<th class='dyna_th"+count+"'>Discrepancy</th>";

						$("#table-grid>thead>tr").append(list);
						
						table_bank(i,v, filter_report);
						// $(".dynamic_card").show();
						
						$("#table-grid").prop('hidden',false);
						$("#table-grid2").prop('hidden',false);
						$("#table-grid2_wrapper").prop('hidden',false);
						$("#searchBtn").text('Search');
						$(".searchDate").prop('disabled',false);
						$(".filter_report").prop('disabled',false);
					}else{
						$.toast({
						    heading: 'Error',
						    text: 'No data found in the server',
						    icon: 'error',
						    loader: false,   
						    stack: false,
						    position: 'top-center',  
						    bgColor: '#d9534f',
							textColor: 'white'        
						});
						$("#searchBtn").text('Search');
						$(".searchDate").prop('disabled',false);
						$(".filter_report").prop('disabled',false);
						$("#searchBtn").prop('disabled',false);
					}
					$(".loader").hide();
				},
				error: function (data) {
			    	$.toast({
					    heading: 'Error',
					    text: 'Error Loading, Please refresh the browser and try again.',
					    icon: 'error',
					    loader: false,   
					    stack: false,
					    position: 'top-center',  
					    bgColor: '#d9534f',
						textColor: 'white'        
					});
			    }
			});
		}else if (filter_report == 2) { // summary only
			var i = $(".searchDate").attr('data-column'); 
			var v = $(".searchDate").val();
			// 
			count++;
			$.ajax({
				type:'post',
				url:base_url+'Main_reports/bankrecon_report_getshowtd',
				data:{'v':v},
				beforeSend:function(data){
					$('.btnExportRecon').prop('disabled',true);
					$(".dynamic_card").hide();
					// $(".loader").show();
					var countminus = parseInt(count)-1;
					var a = ".dyna_th"+countminus;
					$(a).remove();
					$('#table-grid').DataTable().destroy();
					$('#table-grid').find("tbody").text("");
					$("#searchBtn").prop('disabled',true);
					$("#searchBtn").text('Please Wait...');
					$(".searchDate").prop('disabled',true);
					$(".filter_report").prop('disabled',true);
					$("#table-grid_processing").css("display","block");
					$("#table-grid").prop('hidden',true);
					$("#table-grid2").prop('hidden',true);
					$("#table-grid2_wrapper").prop('hidden',true);
				},
				success:function(data){
					if (data.success == 1) {
						$('.btnExportRecon').prop('disabled',false);
						
						// $(".loader").hide();
						//alert('done');
						$("#searchBtn").prop('disabled',false);
						$("#table-grid_processing").css("display","none");
						var res = data.result.sort();
						var reslen = res.length;
						var list = "";

						for(var x = 0; x < reslen; x++){
							//alert(res[x]);
							list += "<th class='dyna_th"+count+"'>"+res[x]+"</th>";
						}
						list += "<th class='dyna_th"+count+"'>Discrepancy</th>";

						$("#table-grid>thead>tr").append(list);
						
						table_bank(i,v, filter_report);
						// $(".dynamic_card").show();
						
						$("#table-grid").prop('hidden',false);
						$("#table-grid2").prop('hidden',false);
						$("#table-grid2_wrapper").prop('hidden',false);
						$("#searchBtn").text('Search');
						$(".searchDate").prop('disabled',false);
						$(".filter_report").prop('disabled',false);
					}else{
						$.toast({
						    heading: 'Error',
						    text: 'No data found in the server',
						    icon: 'error',
						    loader: false,   
						    stack: false,
						    position: 'top-center',  
						    bgColor: '#d9534f',
							textColor: 'white'        
						});
						$("#searchBtn").text('Search');
						$(".searchDate").prop('disabled',false);
						$(".filter_report").prop('disabled',false);
						$("#searchBtn").prop('disabled',false);
					}
					$(".loader").hide();
				},
				error: function (data) {
			    	$.toast({
					    heading: 'Error',
					    text: 'Error Loading, Please refresh the browser and try again.',
					    icon: 'error',
					    loader: false,   
					    stack: false,
					    position: 'top-center',  
					    bgColor: '#d9534f',
						textColor: 'white'        
					});
			    }
			});
		}
	});
	
	function table_bank(i,v, filter_report){

		if (filter_report == 1) { //with details
			var dataTable = $('#table-grid').DataTable({
				"pageLength": 25,
				"processing": true,
				"serverSide": true,
				"columnDefs": [
					{ targets: [2], orderable: true},
				    { targets: [0, 1], orderable: true, "sClass":"leftalign"},
	        		{ targets: '_all', orderable: false, "sClass":"text-right" }
				],
				"destroy": true,
				"ajax":{
					url :base_url+"Main_reports/bankrecon_report_table", // json datasource
					type: "post",  // method  , by default get
					error: function(){  // error handling
						$(".table-grid-error").html("");
						$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
						$("#table-grid_processing").css("display","none");
					}
				},
		        "fnDrawCallback": function() {
			        var api = this.api()
			        var json = api.ajax.json();
			        console.log(json);

			        //alert(json.totalSum);
			        //$(".th_total_amount").text(json.totalSum);

			        var res = json.breakDownSumArr;
					var reslen = res.length;
					var list = "";
					var totalSum = json.totalSum.replace(new RegExp(',', 'g'),"");
					var totalbreakdown = 0;


					//total_collection = json.total_collection_amt;
					$("#table-grid").find(".tfoot").remove();


					list += "<tfoot class='tfoot'> <tr> ";
					list += "<th colspan='2'>Grand Total</th>";
					list += "<th class='th_total_amount text-right'>"+json.totalSum+"</th>";
					
					for(var x = 0; x < reslen; x++){
						if (res[x].description !== null && res[x].description != "" && res[x].description != "null") {
							list += "<th class='dynabreackdownsummary text-right'>"+accounting.formatMoney(res[x].payamt)+"</th>";	
							
							totalbreakdown += parseFloat(res[x].payamt);
							console.log(totalbreakdown);
						}

						if (res[x].description == 'Cash'){
							total_collection_cash = res[x].payamt;
						}
						if (res[x].description == 'Check'){
							total_collection_check = res[x].payamt;
						}
						if (res[x].description == 'Online/Bank Deposit'){
							total_collection_online = res[x].payamt;
						}
					}
					//alert(totalSum +' - '+ totalbreakdown)
					var totalDiscrepancy = totalSum - totalbreakdown;
					list += "<th class='dynabreackdownsummary text-right'>"+accounting.formatMoney(totalDiscrepancy)+"</th>";
					// $(".append_dynamic_th").append(list);
					// $("#table-grid>tfoot>tr").append(list);
					list += " </tr></tfoot>";
					$("#table-grid").append(list);

			        gettableHeader(v, filter_report); //trigger 2nd and 3rd table
			        $('#table-grid tbody').show();
			        $('#table-grid_info').show();
			        $('#table-grid_paginate').show();
			        $('#table-grid_length').show();

			        if (json.draw > 1) {
			        	$(".dynamic_card").show();
			        }
			    }
			});

			setTimeout(function(){
				dataTable.columns(i).search(v).draw();	

			},200);
			
		}else if(filter_report == 2){ //summary only
			var dataTable = $('#table-grid').DataTable({
				"pageLength": 25,
				"processing": true,
				"serverSide": true,
				"columnDefs": [
					{ targets: [2], orderable: true},
				    { targets: [0, 1], orderable: true, "sClass":"leftalign"},
	        		{ targets: '_all', orderable: false, "sClass":"text-right" }
				],
				"destroy": true,
				"ajax":{
					url :base_url+"Main_reports/bankrecon_report_table", // json datasource
					type: "post",  // method  , by default get
					error: function(){  // error handling
						$(".table-grid-error").html("");
						$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
						$("#table-grid_processing").css("display","none");
					}
				},
		        "fnDrawCallback": function() {
			        var api = this.api()
			        var json = api.ajax.json();
			        console.log(json);
			        //alert(json.totalSum);
			        //$(".th_total_amount").text(json.totalSum);

			        var res = json.breakDownSumArr;
					var reslen = res.length;
					var list = "";
					var totalSum = json.totalSum.replace(new RegExp(',', 'g'),"");
					var totalbreakdown = 0;


					//total_collection = json.total_collection_amt;
					$("#table-grid").find(".tfoot").remove();


					list += "<tfoot class='tfoot'> <tr> ";
					list += "<th colspan='2'>Grand Total</th>";
					list += "<th class='th_total_amount text-right'>"+json.totalSum+"</th>";
					
					for(var x = 0; x < reslen; x++){
						if (res[x].description !== null && res[x].description != "" && res[x].description != "null") {
							list += "<th class='dynabreackdownsummary text-right'>"+accounting.formatMoney(res[x].payamt)+"</th>";	
							
							totalbreakdown += parseFloat(res[x].payamt);
							console.log(totalbreakdown);
						}

						if (res[x].description == 'Cash'){
							total_collection_cash = res[x].payamt;
						}
						if (res[x].description == 'Check'){
							total_collection_check = res[x].payamt;
						}
						if (res[x].description == 'Online/Bank Deposit'){
							total_collection_online = res[x].payamt;
						}
					}
					//alert(totalSum +' - '+ totalbreakdown)
					var totalDiscrepancy = totalSum - totalbreakdown;
					list += "<th class='dynabreackdownsummary text-right'>"+accounting.formatMoney(totalDiscrepancy)+"</th>";
					// $(".append_dynamic_th").append(list);
					// $("#table-grid>tfoot>tr").append(list);
					list += " </tr></tfoot>";
					$("#table-grid").append(list);

			        gettableHeader(v, filter_report); //trigger 2nd and 3rd table

			        $('#table-grid tbody').hide();
			        $('#table-grid_info').hide();
			        $('#table-grid_paginate').hide();
			        $('#table-grid_length').hide();

			        if (json.draw > 1) {
			        	$(".dynamic_card").show();
			        }
			    }

			});

			setTimeout(function(){
				dataTable.columns(i).search(v).draw();	
				
			},200);
		}
	}

	function gettableHeader(trandate, filter_report){
		if (filter_report == 1) { //with details
			var total_deposit = 0;
			var grand_discrepancy = 0;
			$.ajax({
				type:'post',
				url:base_url+'Main_reports/getRecontableHeader',
				data:{'trandate':trandate},
				success:function(data){
					if (data.success == 1) {
						var res = data.result;
						var reslen = res.length;

						var list = '';
						if (reslen > 0) {
							for(var x = 0; x < reslen; x++){
								var ressecondhead = data.querySecondHead[x];
								var ressecondheadlen = ressecondhead.length;
								var resbody = data.queryBodyLast[x];
								var resbodylen = resbody.length;
								for(var y = 0; y < ressecondheadlen; y++){
									list += '<div class="card" style="margin-bottom: 0px;">';
			                        	list += '<div class="">';
				                            list += '<div class="card-header d-flex align-items-center">';

				                                list += '<div class="col-lg-12">';
				                                    list += '<div class="row">';
				                                    list += '<h3>'+ressecondhead[y].accountin+' - '+res[x].description+' - ('+ressecondhead[y].deptype+') '+'</h3>';
				                                    list += '</div>';
				                                list += '</div>';
				                            list += '</div>';
				                        list += '</div>';
				                       list += ' <div class="card-body">';
				                            list += '<div class="table-responsive">';
				                                list += '<table class="table table-striped table-hover table-bordered table_dynamic table_dynamicdetails" cellpadding="0" cellspacing="0" border="0" width="100%">';
				                                    list += '<thead>';
				                                        list += '<tr>';
				                                            list += '<th>Sales Date</th>';
				                                         	list += '<th>Deposit Date</th>';
				                                            list += '<th>Amount</th>';
				                                        list += '</tr>';
				                                    list += '</thead>';
				                                    list += '<tbody>';
				                                    
				                                    //alert(resbodylen);
				                                    for(var i = 0; i < resbodylen; i++){
				                                    	var resbody2 = resbody[i];
				                                    	var resbodylen2 = resbody2.length;
				                                    	// alert(resbodylen2);
				                                    	for(var c = 0; c < resbodylen2; c++){
				                                    		var resbody3 = resbody2[c];
				                                    		var resbodylen3 = resbody3.length;
				                                    		// alert(resbodylen3);
				                                    		// var resbody3 = resbody2[c];
				                                    		if (resbody2[c].deptype == ressecondhead[y].deptype) {
						                                    	list += '<tr>';
					                                        		list += '<td>'+resbody2[c].salesdate+'</td>';
					                                        		list += '<td>'+resbody2[c].depdate+'</td>';
					                                        		list += '<td class="text-right">'+accounting.formatMoney(resbody2[c].depamount)+'</td>';
				                                        		list += '</tr>';
			                                        		}
		                                        		}
				                                    }
				                                    list += '</tbody>';
				                                    list += '<tfoot>';
				                                        list += '<tr>';
				                                            list += '<th colspan="2">Total Amount</th>';
				                                            list += '<th class="text-right">'+accounting.formatMoney(ressecondhead[y].total_amount)+'</th>';
				                                        list += '</tr>';
				                                    list += '</tfoot>';
				                                list += '</table>';
				                            list += '</div>';
				                        list += '</div>';
				                    list += '</div>';
								}
								

			                    total_deposit += parseFloat(res[x].total_amount);
							}

							var total_collection = parseFloat(total_collection_cash) + parseFloat(total_collection_check) + parseFloat(total_collection_online);
							grand_discrepancy = parseFloat(total_collection) - parseFloat(total_deposit) 

							list += '<div class="card" style="margin-top: 40px;">';
		                    	list += '<div class="">';
		                            list += '<div class="card-header d-flex align-items-center">';

		                                list += '<div class="col-lg-12">';
		                                    list += '<div class="row">';
		                                    list += '<h3>Summary</h3>';
		                                    list += '</div>';
		                                list += '</div>';
		                            list += '</div>';
		                        list += '</div>';
		                       list += ' <div class="card-body">';
		                            list += '<div class="table-responsive">';
		                                list += '<table class="table table-striped table-hover table-bordered table_dynamic" id="table_summ" cellpadding="0" cellspacing="0" border="0" width="100%">';
			                                list += '<tr>'
			                                	list += '<td>'+'Total Collection (Cash)'+'</td>';
			                                	list += '<td class="text-right">'+accounting.formatMoney(total_collection_cash)+'</td>';
			                                list += '</tr>';

			                                list += '<tr>'
			                                	list += '<td>'+'Total Collection (Check)'+'</td>';
			                                	list += '<td class="text-right">'+accounting.formatMoney(total_collection_check)+'</td>';
			                                list += '</tr>';

			                                list += '<tr>'
			                                	list += '<td>'+'Total Collection (Online/Bank Deposit)'+'</td>';
			                                	list += '<td class="text-right">'+accounting.formatMoney(total_collection_online)+'</td>';
			                                list += '</tr>';

			                                list += '<tr>'
			                                	list += '<td>'+'Total Deposit'+'</td>';
			                                	list += '<td class="text-right">'+accounting.formatMoney(total_deposit)+'</td>';
			                                list += '</tr>';
			                                list += '<tr>'
			                                	list += '<td>'+'Discrepancy'+'</td>';
			                                	list += '<td class="text-right" style="font-weight:bold;">'+accounting.formatMoney(grand_discrepancy)+'</td>';
			                                list += '</tr>';
		                                list += '</table>';
		                            list += '</div>';
		                        list += '</div>';
		                    list += '</div>';
							
							$(".dynamic_card").html(list);
						}
					}else{
						var list = '';
						list += '<div class="card" style="margin-top: 40px;">';
	                    	list += '<div class="">';
	                            list += '<div class="card-header d-flex align-items-center">';

	                                list += '<div class="col-lg-12">';
	                                    list += '<div class="row">';
	                                    list += '<h3>No Deposit</h3>';
	                                    list += '</div>';
	                                list += '</div>';
	                            list += '</div>';
	                        list += '</div>';
	                    list += '</div>';

						$(".dynamic_card").html(list);	
					}
				}
			}).done(function() {
			  	$('.table_dynamicdetails').DataTable({});
			});
		}else if (filter_report == 2) { // only summary
			var total_deposit = 0;
			var grand_discrepancy = 0;
			$.ajax({
				type:'post',
				url:base_url+'Main_reports/getRecontableHeader',
				data:{'trandate':trandate},
				success:function(data){
					if (data.success == 1) {
						var res = data.result;
						var reslen = res.length;

						var list = '';
						if (reslen > 0) {
							for(var x = 0; x < reslen; x++){
								var ressecondhead = data.querySecondHead[x];
								var ressecondheadlen = ressecondhead.length;
								var resbody = data.queryBodyLast[x];
								var resbodylen = resbody.length;
								for(var y = 0; y < ressecondheadlen; y++){
									list += '<div class="card" style="margin-bottom: 0px;">';
			                        	list += '<div class="">';
				                            list += '<div class="card-header d-flex align-items-center">';

				                                list += '<div class="col-lg-12">';
				                                    list += '<div class="row">';
				                                    list += '<h3>'+ressecondhead[y].accountin+' - '+res[x].description+' - ('+ressecondhead[y].deptype+') '+'</h3>';
				                                    list += '</div>';
				                                list += '</div>';
				                            list += '</div>';
				                        list += '</div>';
				                       list += ' <div class="card-body">';
				                            list += '<div class="table-responsive">';
				                                list += '<table class="table table-striped table-hover table-bordered table_dynamic" cellpadding="0" cellspacing="0" border="0" width="100%">';
				                                    // list += '<thead>';
				                                    //     list += '<tr>';
				                                    //         list += '<th>Sales Date</th>';
				                                    //      	list += '<th>Deposit Date</th>';
				                                    //         list += '<th>Amount</th>';
				                                    //     list += '</tr>';
				                                    // list += '</thead>';
				                                    // list += '<tbody>';
				                                    
				                                    //alert(resbodylen);
				                                    // for(var i = 0; i < resbodylen; i++){
				                                    // 	var resbody2 = resbody[i];
				                                    // 	var resbodylen2 = resbody2.length;
				                                    // 	// alert(resbodylen2);
				                                    // 	for(var c = 0; c < resbodylen2; c++){
				                                    // 		var resbody3 = resbody2[c];
				                                    // 		var resbodylen3 = resbody3.length;
				                                    // 		// alert(resbodylen3);
				                                    // 		// var resbody3 = resbody2[c];
				                                    // 		if (resbody2[c].deptype == ressecondhead[y].deptype) {
						                                  //   	list += '<tr>';
					                                   //      		list += '<td>'+resbody2[c].deptype+'</td>';
					                                   //      		list += '<td>'+resbody2[c].depdate+'</td>';
					                                   //      		list += '<td class="text-right">'+accounting.formatMoney(resbody2[c].depamount)+'</td>';
				                                    //     		list += '</tr>';
			                                     //    		}
		                                      //   		}
				                                    // }
				                                    // list += '</tbody>';
				                                    list += '<tfoot>';
				                                        list += '<tr>';
				                                            list += '<th colspan="2">Total Amount</th>';
				                                            list += '<th class="text-right">'+accounting.formatMoney(ressecondhead[y].total_amount)+'</th>';
				                                        list += '</tr>';
				                                    list += '</tfoot>';
				                                list += '</table>';
				                            list += '</div>';
				                        list += '</div>';
				                    list += '</div>';
								}
								

			                    total_deposit += parseFloat(res[x].total_amount);
							}

							var total_collection = parseFloat(total_collection_cash) + parseFloat(total_collection_check) + parseFloat(total_collection_online);
							grand_discrepancy = parseFloat(total_collection) - parseFloat(total_deposit) 

							list += '<div class="card" style="margin-top: 40px;">';
		                    	list += '<div class="">';
		                            list += '<div class="card-header d-flex align-items-center">';

		                                list += '<div class="col-lg-12">';
		                                    list += '<div class="row">';
		                                    list += '<h3>Summary</h3>';
		                                    list += '</div>';
		                                list += '</div>';
		                            list += '</div>';
		                        list += '</div>';
		                       list += ' <div class="card-body">';
		                            list += '<div class="table-responsive">';
		                                list += '<table class="table table-striped table-hover table-bordered table_dynamic" id="table_summ" cellpadding="0" cellspacing="0" border="0" width="100%">';
			                                list += '<tr>'
			                                	list += '<td>'+'Total Collection (Cash)'+'</td>';
			                                	list += '<td class="text-right">'+accounting.formatMoney(total_collection_cash)+'</td>';
			                                list += '</tr>';

			                                list += '<tr>'
			                                	list += '<td>'+'Total Collection (Check)'+'</td>';
			                                	list += '<td class="text-right">'+accounting.formatMoney(total_collection_check)+'</td>';
			                                list += '</tr>';

			                                list += '<tr>'
			                                	list += '<td>'+'Total Collection (Online/Bank Deposit)'+'</td>';
			                                	list += '<td class="text-right">'+accounting.formatMoney(total_collection_online)+'</td>';
			                                list += '</tr>';

			                                list += '<tr>'
			                                	list += '<td>'+'Total Deposit'+'</td>';
			                                	list += '<td class="text-right">'+accounting.formatMoney(total_deposit)+'</td>';
			                                list += '</tr>';
			                                list += '<tr>'
			                                	list += '<td>'+'Discrepancy'+'</td>';
			                                	list += '<td class="text-right" style="font-weight:bold;">'+accounting.formatMoney(grand_discrepancy)+'</td>';
			                                list += '</tr>';
		                                list += '</table>';
		                            list += '</div>';
		                        list += '</div>';
		                    list += '</div>';
							
							$(".dynamic_card").html(list);
						}
					}else{
						var list = '';
						list += '<div class="card" style="margin-top: 40px;">';
	                    	list += '<div class="">';
	                            list += '<div class="card-header d-flex align-items-center">';

	                                list += '<div class="col-lg-12">';
	                                    list += '<div class="row">';
	                                    list += '<h3>No Deposit</h3>';
	                                    list += '</div>';
	                                list += '</div>';
	                            list += '</div>';
	                        list += '</div>';
	                    list += '</div>';

						$(".dynamic_card").html(list);	
					}
				}
			}).done(function() {
			  	$('.table_dynamicdetails').DataTable({});
			});
		}
		

		// setTimeout(function(){
			
		// },5000);
		
	}

	// $('.search-input-text').on('keyup click', function(){   // for text boxes
	// 	var i =$(this).attr('data-column');  // getting column index
	// 	var v =$(this).val();  // getting search input value
	// 	dataTable.columns(i).search(v).draw();
	// });

	// $('.search-input-select').on('change', function(){   // for select box
	// 	var i =$(this).attr('data-column');  
	// 	var v =$(this).val();  
	// 	dataTable.columns(i).search(v).draw();
	// });

});