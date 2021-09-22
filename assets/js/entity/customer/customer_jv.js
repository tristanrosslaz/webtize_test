$(function(){

	var base_url = $("body").data('base_url');

	$('.dividno').show('slow');
	var searchtype ="none";

	var dataTable = $('#table-grid').DataTable({
		"serverSide": true,
		"ajax":{
			url :base_url+"Main_entity/get_customer_data", // json datasource
			type: "post",  // method  , by default get
			beforeSend:function(data) {
				$.LoadingOverlay("show"); 
			},
			complete: function() {
				$.LoadingOverlay("hide"); 
			},
			error: function(){  // error handling
				$(".table-grid-error").html("");
				$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="6" style = "text-align: center;">No data found in the server</th></tr></tbody>');
				$("#table-grid_processing").css("display","none");
			}
		}
	});

	$("#divsearchfilter").change(function() {
		var searchtype = $('#divsearchfilter').val();

		if(searchtype == "dividno") {
			$('.dividno').show('slow');
			$('.divname').hide('slow');
			$('.divarea').hide('slow');	
			$('.divcredit').hide('slow');	
			$("#nameSearch").val("");
			$("#accountSearch").val("");
			$("#idno").val("");	  
		}
		else if(searchtype == "divname") {
			$('.divname').show('slow');
			$('.dividno').hide('slow');
			$('.divarea').hide('slow');	
			$('.divcredit').hide('slow');	
			$("#accountSearch").val("");
			$("#idno").val("");
		}
		else if(searchtype == "divarea") {
			$('.divname').hide('slow');
			$('.dividno').hide('slow');
			$('.divarea').show('slow');	
			$('.divcredit').hide('slow');	
			$("#nameSearch").val("");
			$("#idno").val("");
		}
		else if(searchtype == "divcredit") {
			$('.divname').hide('slow');
			$('.dividno').hide('slow');
			$('.divarea').hide('slow');	
			$('.divcredit').show('slow');	
			$("#nameSearch").val("");
			$("#idno").val("");
		}
	     
	});

	$('#select-data-info').change(function(){
		var data_info = $('#select-data-info').val();

		if (data_info == "1") {
			$('.company-information-div').hide('slow');
			$('.personal-information-div').show('slow');
		}
		else {
			$('.company-information-div').show('slow');
			$('.personal-information-div').hide('slow');
		}
	});

	$("#searchBtn").click(function(){
		$(".loader").show();
		$("#table_salesorder").hide();
		
		var i1 =$('#idno').attr('data-column');  // getting column index
		var v1 =$('#idno').val();  // getting search input value
		var i2 =$('#nameSearch').attr('data-column');  // getting column index
		var v2 =$('#nameSearch').val();  // getting search input value
		var i3 =$('#areaSearch').attr('data-column');  // getting column index
		var v3 =$('#areaSearch').val();  // getting search input value
		var i4 =$('#creditSearch').attr('data-column');  // getting column index
		var v4 =$('#creditSearch').val();  // getting search input value

        dataTable.column(i1).search(v1)
                 .column(i2).search(v2)
                 .column(i3).search(v3)
                 .column(i4).search(v4)
                 .draw();
	});

    // checking email format
    $("#cust_email, #ucust_email").on("keypress keyup blur",function () {
        if (!isEmail($(this).val())) {
			$(this).addClass("error");
		}
		else {
			$(this).removeClass("error");
		}
	});

	// checking zip length
    $("#cust_zip, #ucust_zip").on("keypress keyup blur",function (event) {
		if (lengthIsEqual($(this).val(), 6)) {
            event.preventDefault();
		}

		if (lengthIsLower($(this).val(), 4)) {
			$(this).addClass("error");
		}
		else {
			$(this).removeClass("error");
		}
	});

	$(".saveCustomer").click(function(e){
		entryType 	 = $("#select-data-info").val();
		street 		 = $("#cust_street").val();
		barangay 	 = $("#cust_barangay").val();
		city 		 = $("#cust_city").val();
		zip 		 = $("#cust_zip").val();
		home_add 	 = street + ", " + barangay + ", " + city + ", " + zip;
		conno 		 = $("#cust_conno").val();
		email_add 	 = $("#cust_email").val();
		agent 		 = $("#cust_agent").val();
		credit 		 = $("#cust_credit_term").val();
		area 		 = $("#cust_area").val();
		pricecat 	 = $("#cust_pricecat").val();
		company_code = $("#cust_company_code").val();
		checker 	 = 0;

		if (entryType == "1") {
			fname  = $("#cust_fname").val();
			mname  = $("#cust_mname").val();
			lname  = $("#cust_lname").val();
			bday   = formatDate($("#cust_bday").val());
			gender = $("#cust_gender").val();
			branch = "";

			if (fname == "" || lname == "" || gender == "" || conno == "" || email_add == "" || barangay == "" || city == "" || bday == "" || agent == "" || pricecat == "") {
				toastMessage('Note', 'Please fill up all required fields', 'error');
				checker = 0;
			}
			else {
				$("#customer_info").each(function(){
					if ($(this).find('.error').length > 0) {
						toastMessage('Note', 'You have entered an invalid input.', 'error');
						checker = 0;
					}
					else {
						checker = 1;
					}
				});
			}
		}
		else if (entryType == "2") {
			fname  = $("#cust_companyname").val();
			branch = $("#cust_branch").val();
			mname  = "";
			lname  = "";
			bday   = "";
			gender = "";

			if (fname == "" || conno == "" || email_add == "" || barangay == "" || city == "" || agent == "" || pricecat == "") {
				toastMessage('Note', 'Please fill up all required fields', 'error');
				checker = 0;
			}
			else {
				$("#customer_info").each(function(){
					if ($(this).find('.error').length > 0) {
						toastMessage('Note', 'You have entered an invalid input.', 'error');
						checker = 0;
					}
					else {
						checker = 1;
					}
				});
			}
		}
		
		if(checker > 0) {
			$.ajax({
		  		type: 'post',
		  		url: base_url+'Main_entity/add_customer1',
		  		data:{
					'fname': fname,
					'mname': mname, 
					'lname': lname,
					'bday': bday, 
					'gender': gender, 
					'conno': conno, 
					'email_add': email_add, 
					'home_add': home_add,
					'credit': credit, 
					'area': area,
					'agent': agent,
					'branch': branch,
					'pricecat': pricecat,
					'company_code': company_code
				},
		  		beforeSend:function(data) {
					$.LoadingOverlay("show"); 
				},
				complete: function() {
					$.LoadingOverlay("hide"); 
				},
		  		success:function(data) {
		  			if (data.success == 1){
						toastMessage('Success', data.message, 'success');
						clearFields();
						$(".saveCustomer").prop("disabled",false);
		  			}
		  			else {
						toastMessage('Note', data.message, 'error');
		  			}
					dataTable.draw();
		  		}
	  		});
		}
    });

	$('#table-grid').delegate(".btnView", "click", function(){
	  	var idno = $(this).data('value');

	  	$.ajax({
			type: 'post',
			url: base_url+'Main_entity/get_customer',
			data: {'idno':idno},
			beforeSend:function(data) {
				$.LoadingOverlay("show");
			},
			complete: function() {
				$.LoadingOverlay("hide");
			},
			success:function(data){
				if(data.success == 1) {
					$("#ucust_idno").val(data.customer_info.idno);

					if(data.customer_info.lname){
						$("#ucust_record_type").val("1").change();
						$(".upersonal-information-div").show();
						$(".ucompany-information-div").hide();

						$("#ucust_fname").val(data.customer_info.fname);
						$("#ucust_mname").val(data.customer_info.mname);
						$("#ucust_lname").val(data.customer_info.lname);
						$("#ucust_gender").val(data.customer_info.gender);
						$('#ucust_bday').datepicker({ dateFormat: 'yyyy-mm-dd'}).datepicker("setDate", new Date(data.customer_info.bday));// set Birth date
					}
					else {
						$("#ucust_record_type").val("2").change();
						$(".upersonal-information-div").hide();
						$(".ucompany-information-div").show();

						$("#ucust_companyname").val(data.customer_info.fname);
						$("#ucust_branch").val(data.customer_info.branchname);
					}

					$("#uacc_no").val(data.customer_info.acctno);
					$("#ucust_conno").val(data.customer_info.conno);
					$("#ucust_email").val(data.customer_info.email);
					$("#ucust_email_orig").val(data.customer_info.email);	
					$("#ucust_agent").val(data.customer_info.empid).change();

					$("#ucust_credit_term").val(data.customer_info.termcredit).change();
					$("#ucust_area").val(data.customer_info.areaid).change();
					$("#ucust_pricecat").val(data.customer_info.pricecat).change();
					$("#ucust_company_code").val(data.customer_info.company_code);


					var addressArray = data.customer_info.address.split(',');

					$("#ucust_street").val($.trim(addressArray[0]));
					$("#ucust_barangay").val($.trim(addressArray[1]));
					$("#ucust_city").val($.trim(addressArray[2]));
					$("#ucust_zip").val($.trim(addressArray[3]));

					$("#ucust_record_type").attr("disabled", true);
				}
			}
    	}); 	
	});

    $(".updatesaveCustomer").click(function(e){
		e.preventDefault();
		
		entryType 	 = $("#ucust_record_type").val();
		idno 		 = $("#ucust_idno").val();
		street 		 = $("#ucust_street").val();
		barangay 	 = $("#ucust_barangay").val();
		city 		 = $("#ucust_city").val();
		zip 		 = $("#ucust_zip").val();
		home_add 	 = street + ", " + barangay + ", " + city + ", " + zip;
		conno 		 = $("#ucust_conno").val();
		email_add    = $("#ucust_email").val();
		agent 		 = $("#ucust_agent").val();
		credit 		 = $("#ucust_credit_term").val();
		area 		 = $("#ucust_area").val();
		pricecat 	 = $("#ucust_pricecat").val();
		company_code = $("#ucust_company_code").val();

		checker = 0;

		if (entryType == "1") {
			fname  = $("#ucust_fname").val();
			mname  = $("#ucust_mname").val();
			lname  = $("#ucust_lname").val();
			bday   = formatDate($("#ucust_bday").val());
			gender = $("#ucust_gender").val();
			branch = "";

			if (fname == "" || lname == "" || gender == "" || conno == "" || email_add == "" || barangay == "" || city == "" || bday == "" || agent == "" || pricecat == "") {
				toastMessage('Note', 'Please fill up all required fields', 'error');
				checker = 0;
			}
			else {
				$("#customer_info").each(function(){
					if ($(this).find('.error').length > 0) {
						toastMessage('Note', 'You have entered an invalid input.', 'error');
						checker = 0;
					}
					else {
						checker = 1;
					}
				});
			}
		}
		else if (entryType == "2") {
			fname  = $("#ucust_companyname").val();
			branch = $("#ucust_branch").val();
			mname  = "";
			lname  = "";
			bday   = "";
			gender = "";

			if (fname == "" || conno == "" || email_add == "" || barangay == "" || city == "" || agent == "" || pricecat == "") {
				toastMessage('Note', 'Please fill up all required fields', 'error');
				checker = 0;
			}
			else {
				$("#customer_info").each(function(){
					if ($(this).find('.error').length > 0) {
						toastMessage('Note', 'You have entered an invalid input.', 'error');
						checker = 0;
					}
					else {
						checker = 1;
					}
				});
			}
		}


		if(checker > 0) {
			$.ajax({
		  		type: 'post',
		  		url: base_url+'Main_entity/update_customer1',
		  		data: {
					'fname': fname,
					'mname': mname, 
					'lname': lname,
					'bday': bday, 
					'gender': gender, 
					'conno': conno, 
					'email_add': email_add, 
					'home_add': home_add,
					'credit': credit, 
					'area': area,
					'agent': agent,
					'branch': branch,
					'pricecat': pricecat,
					'company_code': company_code,
					'idno': idno
				},
		  		beforeSend:function(data){
					$(".updatesaveCustomer").prop("disabled",true);
				},
		  		success:function(data) {
		  			if (data.success == 1){
						toastMessage('Success', data.message, 'success');
						dataTable.draw();
						$("#updateItemModal").modal('toggle');
		  			}
		  			else {
						toastMessage('Note', data.message, 'error');
		  			}

		  			$(".updatesaveCustomer").prop("disabled",false);
		  		}
	  		});

		}
    });
});

function clearFields(){
    $("#cust_fname").val("");
    $("#cust_mname").val("");
	$("#cust_lname").val("");
	$("#cust_bday").val("");
	$("#cust_gender").val("");
	$("#cust_conno").val("");
	$("#cust_email").val("");
	$("#cust_street").val("");
	$("#cust_barangay").val("");
	$("#cust_city").val("");
	$("#cust_zip").val("");
	$("#cust_credit_term").val("").change();
	$("#cust_area").val("").change();
	$("#cust_pricecat").val("").change();
	$("#cust_agent").val("").change();
	$("#cust_ship").val("").change();
}