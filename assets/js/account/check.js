$(document).ready(function(){

	$('#petty_dates_div').hide();
	$('#details_div').hide();
	$('.step3').hide();
	base_url = $("body").data('base_url');

	function tofixed(x){
		return numberWithCommas(parseFloat(x).toFixed(2));
	}

	function numberWithCommas(x){
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	function valid_checknum(checknum)
	{
		regex = /^(\d|\w)+$/

		return regex.test(checknum) ? true : false
	}

	CheckClassification = "";

	CheckEntries = [];
	PettyDates = [];
	CheckTotal = 0;
	CheckInfoDate = "";
	CheckInfoType = "";
	CheckInfoSupplier = "";
	CheckInfoReference = "";
	CheckName = ""
	CheckIdno = ""

	$('#total_label').html(tofixed(CheckTotal));

	resetData = function(){
		CheckClassification = "";

		CheckEntries = [];
		PettyDates = [];
		CheckTotal = 0;
		CheckInfoDate = "";
		CheckInfoType = "";
		CheckInfoSupplier = "";
		CheckInfoReference = "";

		$('#total_label').html(tofixed(CheckTotal));

		$('#details_div').hide();
		$('#petty_dates_div').hide();
		$('#classification_div').hide();
		$('.step3').show();

		$('#t_body').html('');

		$('#f_date').val('');
		$('#f_type').val('');
		$('#f_supplier').val('');
		$('#f_reference').val('');
	}

	$("#f_type").change(function() {

		var ftype = $('#f_type').val(); // id ng dropdown
		if(ftype == "Commission" || ftype == "Refund to Customer"){
			$('#f_supplier').hide();
			$('#f_idno').show();
			$('.div_cur').show();
			$('#f_supplier').val();

			$('#f_currency').val("");
			$('#f_idno').val("");
			$('#f_supplier').val("");
			//$('#f_currency').html("");
		}
		else{
			$('#f_supplier').show();
			$('#f_idno').hide();
			$('.div_cur').hide();
			$('#f_currency').val("PHP");
			$('#f_idno').val("");
			$('#f_supplier').val("");
			//$('#f_currency').html("");
		}
		
	});

	$('#classification_submit_btn').click(function(event){
		if ($('#f_classification').val()=="") {
			toastMessage('Note', 'Please select a classification', 'error');
		}
		else {
			CheckClassification = $('#f_classification').val();
			$('#classification_div').hide();

			if(CheckClassification == "Petty Cash Encashment"){
				$('#petty_dates_div').show();

			}else if(CheckClassification == "Commission"){
				//$('#petty_dates_div').show();
				var select = new Option("Commission", "Commission");
					/// jquerify the DOM object 'o' so we can use the html method
					$(select).html("Commission");
					$("#f_type").append(select);

					$('#details_div').show();
			}
			else {
				if (CheckClassification == "Refundable Bond/Deposit") {
					var select = new Option("Refund to Customer", "Refund to Customer");
					/// jquerify the DOM object 'o' so we can use the html method
					$(select).html("Refund to Customer");
					$("#f_type").append(select);
				}
				else {
					$("#f_type option[value='Refund to Customer']").remove();
				}

				$('#details_div').show();
				
			}

			options = {
					url: function(phrase) {
						return base_url + 'Main_account/autocomplete_supplier'
					},
					getValue: function(element) {
						return element.suppliername;
					},
					list: {
						onChooseEvent: function() {
							selector = $("#f_supplier").getSelectedItemData()
							CheckInfoSupplier = selector.id;
							CheckName = selector.suppliername
							CheckIdno = ""
						},
					},
					ajaxSettings: {
						dataType: "json",
						method: "POST",
						data:{ dataType: "json" },
					},
					preparePostData: function(data) {
						data.texttyped = $("#f_supplier").val();
						return data;
					},
					requestDelay: 400
				}

				$("#f_supplier").attr("placeholder", "Supplier Name")
				$("#f_supplier").easyAutocomplete(options)
				$('.easy-autocomplete').css('width','100%')
		}
	});

	$('#f_type').on('change', function(e) {
		if (CheckClassification == "Refundable Bond/Deposit") {
			CheckInfoSupplier = ""
			CheckName = ""
			CheckIdno = ""
			$("#f_supplier").val("")
			
			if ($(this).val() == "Refund to Customer") {
				options = {
					url: function(phrase) {
						return base_url + 'Main_account/autocomplete_customer'
					},
					getValue: function(element) {
						return concatenateName(element.fname, element.mname, element.lname, element.branchname);
					},
					list: {
						onChooseEvent: function() {
							selector = $("#f_supplier").getSelectedItemData()
							CheckInfoSupplier = "-5"
							CheckName = concatenateName(selector.fname, selector.mname, selector.lname, selector.branchname)
							CheckIdno = selector.idno
						},
					},
					ajaxSettings: {
						dataType: "json",
						method: "POST",
						data:{ dataType: "json" },
					},
					preparePostData: function(data) {
						data.texttyped = $("#f_supplier").val();
						return data;
					},
					requestDelay: 400
				};

				$("#f_supplier").attr("placeholder", "Customer Name")
			}
			else {
				options = {
					url: function(phrase) {
						return base_url + 'Main_account/autocomplete_supplier'
					},
					getValue: function(element) {
						return element.suppliername;
					},
					list: {
						onChooseEvent: function() {
							selector = $("#f_supplier").getSelectedItemData()
							CheckInfoSupplier = selector.id;
							CheckName = selector.suppliername
							CheckIdno = ""
						},
					},
					ajaxSettings: {
						dataType: "json",
						method: "POST",
						data:{ dataType: "json" },
					},
					preparePostData: function(data) {
						data.texttyped = $("#f_supplier").val();
						return data;
					},
					requestDelay: 400
				}

				$("#f_supplier").attr("placeholder", "Supplier Name")
			}

			$("#f_supplier").easyAutocomplete(options);
			$('.easy-autocomplete').css('width','100%');
		}
	})

	refreshTable = function(){
		var tableBody = "";
		for(var a = 0; a<CheckEntries.length; a++){
			var tableRow = "<tr>"+
								"<td>"+CheckEntries[a].date+"</td>"+
								"<td>"+CheckEntries[a].description+"</td>"+
								"<td>"+tofixed(CheckEntries[a].amount)+"</td>"+
								"<td>"+CheckEntries[a].gl_account+"</td>"+
								"<td hidden>"+CheckEntries[a].gl_id+"</td>"+
								"<td>"+
									"<button class='btn btn-sm btn-danger deletebtn' id='"+a+"'><i class='fa fa-trash'></i> Delete</button>"+
								"</td>"+
							"</tr>";
			tableBody+= tableRow;
		}

		$('#t_body').html(tableBody);
		set_handler();
	}

	refreshTable2 = function(){
		var tableBody = "";
		for(var a = 0; a<PettyDates.length; a++){
			var tableRow = "<tr>"+
								"<td>"+PettyDates[a].date+"</td>"+
								"<td>"+
									"<button class='btn btn-sm btn-secondary deletebtnpetty' id='"+a+"'><i class='fa fa-trash'></i></button>"+
								"</td>"+
							"</tr>";
			tableBody+= tableRow;
		}
		
		$('#t_body_petty').html(tableBody);
		set_handler2();
	}

	$('#add_check_entry_form').submit(function(event){
		event.preventDefault();

		var valid = true;

		if($('#ff_date').val()==""){
			valid = false;
		}
		if($('#ff_gl_account').val()==""){
			valid = false;
		}
		if($('#ff_description').val()==""){
			valid = false;
		}
		if($('#ff_amount').val()==""){
			valid = false;
		}

		if(valid==true){
			var entry = {
				date: $('#ff_date').val() ,
				description: $('#ff_description').val() ,
				amount: $('#ff_amount').val() ,
				gl_account: $("#ff_gl_account option:selected").text() ,
				gl_id :  $('#ff_gl_account').val()
			}

			CheckEntries.push(entry);

			refreshTable();

			CheckTotal = CheckTotal+parseFloat($('#ff_amount').val());

			$('#total_label').html(tofixed(CheckTotal));

			$('#add_check_entry_form')[0].reset();
			$('#addItemModal').modal('hide');
		}
		else {
			toastMessage('Note', 'Please fill out all required fields', 'error')
		}
	});

	$('#add_petty_date_form').submit(function(event){
		event.preventDefault();

		var entry = {
			date: $('#petty_date').val()
		}

		if ($('#petty_date').val()=="") {
			toastMessage('Note', 'Date is required', 'error')

		}
		else {
			//check if date already exists
			if(PettyDates.length>0){
				var existing = false;

				for(var a=0; a<PettyDates.length; a++){

					if(PettyDates[a].date==$('#petty_date').val()){

						existing = true;
					}
				}

				if (existing==false) {
					PettyDates.push(entry);
					refreshTable2();
				}
				else {
					toastMessage('Note', 'Date already exists in the list', 'error')
				}
			}
			else {
				PettyDates.push(entry);
				refreshTable2();
			}

			$('#add_petty_date_form')[0].reset();
			$('#addItemModal2').modal('hide');
		}
	})

	$('#submitpettydates').click(function(e){
		if (CheckClassification=="Petty Cash Encashment") {
			if (PettyDates.length==0) {
				toastMessage('Note', 'At least 1 date is required', 'error')
			}
			else {
				$('#petty_dates_div').hide();
				$('#details_div').show();
			}
		}
		else {
			$('#petty_dates_div').hide();
			$('#details_div').show();
		}
	})

	set_handler = function(){
		$('.deletebtn').click(function(e){
			CheckTotal = CheckTotal-parseFloat(CheckEntries[e.currentTarget.id].amount);
			$('#total_label').html(tofixed(CheckTotal));

			CheckEntries.splice(e.currentTarget.id, 1);
			refreshTable();
		});
	}

	set_handler2 = function(){
		$('.deletebtnpetty').click(function(e){
			PettyDates.splice(e, 1);
			refreshTable2();
		});
	}

	$('#submitcheckbtn').click(function(event){
		//CheckTotal
		CheckInfoDate = $('#f_date').val();
		CheckInfoType = $('#f_type').val();
		//CheckInfoSupplier = $('#f_supplier').val();
		CheckInfoReference = $('#f_reference').val();
		CheckInfoNote = $('#f_notes').val();
		idno = $('#f_idno').val();
		currency = $('#f_currency').val();

		fclass = $('#f_type').val();

		checker = 0;



		if(valid_checknum(CheckInfoReference))
		{
			if(fclass == "Commission" || fclass == "Refund to Customer"){
				if (CheckInfoDate =="" || CheckInfoType == "" || idno == ""|| CheckInfoReference == "" || currency == "") {
					//toastMessage('Note', 'Please make sure you have completed all check information.', 'error')
					// CheckInfoSupplier = 0;
					checker = 0;
				}else{
					checker=1;
					CheckInfoSupplier = 'none';
				}
			}else{
				if (CheckInfoDate =="" || CheckInfoType == "" || CheckInfoSupplier == ""|| CheckInfoReference == "") {
	
					checker = 0;
				}else{
					checker=1;
					idno='none';
				}
			}
	
			if (checker == 0) {
				toastMessage('Note', 'Please make sure you have completed all check information.', 'error')
			}
			else {
				var data = {
					'CheckClassification': CheckClassification,
					'CheckEntries': CheckEntries,
					'CheckTotal': CheckTotal,
					'CheckInfoDate': CheckInfoDate,
					'CheckInfoType': CheckInfoType,
					'CheckInfoSupplier': CheckInfoSupplier,
					'CheckInfoReference': CheckInfoReference,
					'CheckInfoNote': CheckInfoNote,
					'CheckPettyDates': PettyDates,
					'CheckName': CheckName,
					'CheckIdno': CheckIdno,
					'idno':idno,
					'currency':currency,
					'f_type':fclass,
	
				}
	
				$.ajax({
					type: 'post',
					url: base_url+'Main_account/save_check',
					data:{'data':data},
					beforeSend:function(data) {
						$("body").LoadingOverlay("show"); 
					},
					complete: function() {
						$("body").LoadingOverlay("hide"); 
					},
					success:function(data) {
						data = JSON.parse(data);
	
						if (data.valid==false) {
							toastMessage('Note', data.message, 'error')
							$('#submitcheckbtn').prop('disabled', false);
							$("#submitcheckbtn").text("Save Check");
						}
						else{
							$("#submitcheckbtn").text("Save Check");
							toastMessage('Success', data.message, 'success')
							resetData();
						}
					},
					error: function(error){
						data = JSON.parse(error);
					}
				});
			}
		}
		else 
		{
			toastMessage('Note', 'Check reference must not contain any special characters or whitespaces.', 'error')
			return false
		}
	})

});

function isNumberKeyOnly(evt) {    
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	return true;
}
