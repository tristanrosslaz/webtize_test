$(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	var username = ""; // wala talagang laman to dapat for officer lang

	$("#searchfilter").change(function() {
		var searchtype = $('#searchfilter').val(); // id ng dropdown
		var currentdate = new Date();
		$("#date_from").datepicker("setDate", new Date()); //set today
		$('#date_to').datepicker("setDate", new Date()); //set today

		if(searchtype == "colnodiv"){
			
			$('.colnodiv').show('slow');	
			$('.statusdiv').hide('slow');
			$('.datediv').hide('slow');
			$(".search_status").val("");
			$(".search_colno").val("");
			$('.search_po_btn').show('slow');
			$('.searchbyName').hide('slow');
			$(".search_customer").val("");
			$(".searchCustomerID").val("");
			$('.searchbyAmount').hide('slow');
			$(".amount").val("");	
		}
		
		if(searchtype == "datediv"){
			$('.colnodiv').hide('slow');	
			$('.statusdiv').hide('slow');
			$('.datediv').show('slow');
			$('.searchbyName').hide('slow');
			$(".searchCustomerID").val("");	
			$(".search_status").val("");
			$(".search_colno").val("");
			$('.searchbyAmount').hide('slow');
			$(".amount").val("");
			$('.search_po_btn').show('slow');
		}

		if(searchtype == "statusdiv"){
			$('.colnodiv').hide('slow');	
			$('.statusdiv').show('slow');
			$('.datediv').show('slow');
			$(".search_colno").val("");
			$('.search_po_btn').show('slow');
			$('.searchbyName').hide('slow');
			$(".search_customer").val("");	
			$('.searchbyAmount').hide('slow');
			$(".amount").val("");
			$(".searchCustomerID").val("");	

		}
		else if(searchtype == "searchbyName")
		{
			$('.colnodiv').hide('slow');	
			$('.statusdiv').hide('slow');
			$('.datediv').show('slow');
			$(".search_colno").val("");
			$('.search_po_btn').show('slow');			
			$('.searchbyName').show('slow');
			$(".search_customer").val("");	
			$('.searchbyAmount').hide('slow');
			$(".amount").val("");	
			$(".searchCustomerID").val("");	
		}
		else if(searchtype == "searchbyAmount")
		{
			$('.colnodiv').hide('slow');	
			$('.statusdiv').hide('slow');
			$('.datediv').show('slow');
			// $(".date_to").val("");
			// $(".date_from").val("");
			$(".search_colno").val("");
			$('.search_po_btn').show('slow');			
			$('.searchbyName').hide('slow');
			$(".search_customer").val("");	
			$('.searchbyAmount').show('slow');
			$(".amount").val("");	
			$(".searchCustomerID").val("");	
		}
	});

	var table = $('#example').DataTable();

	var dataTable = $('#table-grid').DataTable({
		
		"serverSide": true,
		"order": [[ 1, "desc" ]],
		"columnDefs": [{ "orderable": false, "targets": [ 5 ] }, { "orderable": false, "targets": [ 7 ], "className": "dt-center" }, {'className': 'dt-body-right', 'targets': [4,5]}],
		"destroy": true,
		"ajax":{
			url :base_url+"Main_sales/tbl_collection_summary_j", // json datasource
			type: "post",  // method  , by default get
			beforeSend:function(data){
				$.LoadingOverlay("show"); 
			},
			error: function(){  // error handling
				$(".table-grid-error").html("");
				$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");
				$("#btn_export_excel").prop('hidden',true);
			},
			complete: function(data)
			{
				$.LoadingOverlay("hide"); 
			}
		},
        "fnDrawCallback": function(){
	        var api = this.api()
	        var json = api.ajax.json();
	        // console.log(json);
	    }
	});

	// #column3_search is a <input type="text"> element
	$('#search_sono').on( 'keyup', function () {
		table
			.columns( 1 )
			.search( this.value )
			.draw();
	} );

	$("#search_order").click(function(){

		var i1 =$('#date_from').attr('data-column');  // getting column index
		var v1 =$('#date_from').val();  // getting search input value
		var i2 =$('#date_to').attr('data-column');  // getting column index
		var v2 =$('#date_to').val();  // getting search input value
		var i3 =$('#search_colno').attr('data-column');  // getting column index
		var v3 =$('#search_colno').val();  // getting search input value
		var i4 =$('#search_status').attr('data-column');  // getting column index
		var v4 =$('#search_status').val();  // getting search input value
		var i5 =$('#searchCustomerID').attr('data-column');  // getting column index
		var v5 =$('#searchCustomerID').val();  // getting search input value
		var i6 =$('#amount').attr('data-column');  // getting column index
		var v6 =$('#amount').val();  // getting search input value

        dataTable.columns(i1).search(v1)
                 .columns(i2).search(v2)
                 .columns(i3).search(v3)
                 .columns(i4).search(v4)
                 .columns(i5).search(v5)
                 .columns(i6).search(v6)
                 .draw();
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
		$("#searchCustomer").keyup(function(){
			$("#searchCustomerID").val("");

			if ($("#searchCustomerID").val() == "") { //for remove loading
				$(this).css("cssText", "background-image: url('');");
			}
		});
		// to remove when the id is empty
		$("#searchCustomer").focusout(function(){

			if ($("#searchCustomerID").val() == "") { 
				$(this).val("");
				$(this).css("cssText", "background-image: url('');"); //for remove loading
			}
		});

		// An obbject/map for search term/results tracking
		var vendorCache = {};

		// Keep track of the current AJAX request
		var vendorXhr;

		//autocomplete plugin with ajax 
		$("#searchCustomer").autocomplete({
			source: function(request, response){
				var typing = $("#searchCustomer").val();

				//ajax to fetch data in autocomplete

				// Check if we already searched and map the existing results
				// into the proper autocomplete format
				if (request.term in vendorCache) {
					$("#searchCustomer").css("cssText", "background-image: url('"+base_url+"assets/img/autocomplete_loading.gif');");
					response($.map(vendorCache[request.term], function (m) {
						return { 
							label: concatenateName(m.fname, m.mname, m.lname, m.branchname), //name = key of array for label
							id: m.idno, // for id
						};
					}));
					setTimeout(function(){
						$("#searchCustomer").css("cssText", "background-image: url('');");
					},500);
					
					return;

				}

				// search term wasn't cached, let's get new results
				vendorXhr = $.ajax({
					type: "POST",
					url: base_url+'Main_sales/autocomplete_membermain',
					dataType: "json",
					data:{'texttyped':typing},
					beforeSend:function(data){
						$("#searchCustomer").css("cssText", "background-image: url('"+base_url+"assets/img/autocomplete_loading.gif');");
					},
					success: function (data, status, xhr){    
						$("#searchCustomer").css("cssText", "background-image: url('');");
						// cache the results
						vendorCache[request.term] = data.result;

						// if this is the same request, return the results
						if (xhr === vendorXhr) {
							// data is an array of objects and must be transformed for autocomplete to use
							var array = $.map(data.result, function(m) {
								return {
									label: concatenateName(m.fname, m.mname, m.lname, m.branchname), //name = key of array for label
									id: m.idno, // for id
								};
							});

							response(array);
						}                                             
					}
				});
			},

			select: function (event, ui) { //to get id of an item
				$("#searchCustomerID").val(ui.item.id);
				//get_discount(ui.item.id);
			}
		}).data("ui-autocomplete")._renderItem = function(ul, item){ // create highlighted 
			var $div = $("<div></div>").text(item.label);
			highlightText(this.term, $div);
			return $("<li></li>").append($div).appendTo(ul);
		};  
	});
	
});