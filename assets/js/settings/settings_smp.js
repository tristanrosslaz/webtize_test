$(function(){
	base_url = $("body").data('base_url') //base_url come from php functions base_url();

	function fillDatatable(name) {
		var dataTable = $('#table-grid').DataTable({
			"destroy": true,
			"serverSide": true,
			"columnDefs": [
                { targets: 3, orderable: false, "sClass":"text-center"},
			],
			"ajax":{
				url:base_url+"Main_settings/software_monthly_pay_table", // json datasource
				type: "post",  // method  , by default get
				data: { "name" : name },
				error: function() {  // error handling
					$(".table-grid-error").html("")
					$("#table-grid").append('<tbody class="table-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>')
					$("#table-grid_processing").css("display","none")
				}
			}
		})
	}

	fillDatatable("")

	$("#search_form").on("submit", function(e){
        e.preventDefault()

		search_name = $("#search_name").val()
		fillDatatable(search_name)
	})

	$("#software_monthly_pay_modal_btn").click(function(e){
		var thiss = $('#software_monthly_pay_form')
        $(thiss).find('input').val("")
        $("#software_monthly_pay_modal_label").text('Add Software Monthly Pay')
        $("#cu_save_btn").text('Save')
    })

	$('#table-grid').delegate(".btnUpdate", "click", function(){
	  	var code = $(this).data('code');

	  	$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_settings/get_software_monthly_pay',
	  		data:{ 'code':code },
	  		success:function(data){
	  			var result = data.result
                var form = $('#software_monthly_pay_form')
                $(form).find('input').val("")

	  			if (data.success == 1) {
	  				$("#cu_code").val(result[0].code)
	  				$("#cu_client_name").val(result[0].client_name)
	  				$("#cu_monthly_pay").val(result[0].msf)
                    $('#software_monthly_pay_modal').modal('show')
                    $("#software_monthly_pay_modal_label").text('Update Software Monthly Pay')
                    $("#cu_save_btn").text('Update')
                    toastMessage('Success', data.message, 'success')
	  			}
	  			else {
                    toastMessage('Note', data.result, 'error')
	  			}
	  		}
	  	})
	})
    
    $("#software_monthly_pay_form").on('submit', function(e){
        e.preventDefault()

        if ($('#cu_code').val() == "") {
            url = base_url+'Main_settings/save_software_monthly_pay'
        }
        else {
            url = base_url+'Main_settings/update_software_monthly_pay'
        }

        $.ajax({
			type:'post',
			url: url,
			data: $(this).serialize(),
			success:function(data){
				if (data.success == 1) {
					fillDatatable("")
                    $(this).find('input').val("")
                    
                    toastMessage('Success', data.message, 'success')
                    $('#software_monthly_pay_modal').modal('hide')
                }
                else {
                    toastMessage('Note', data.message, 'error')
				}
			}
		})
    })
	
	$('#table-grid').delegate(".btnDelete","click", function(){
		var code = $(this).data('code');

		$.ajax({
	  		type: 'post',
	  		url: base_url+'Main_settings/get_software_monthly_pay',
	  		data:{'code':code},
	  		success:function(data){
	  			var result = data.result
	  			if (data.success == 1) {
                    $("#d_code").val(result[0].code)
                    $("#d_client_name").text(result[0].client_name)
                    $("#d_msf").text(accounting.formatMoney(result[0].msf))
                    $('#delete_modal').modal('show')
                    toastMessage('Success', data.message, 'success')
                }
                else {
                    toastMessage('Note', data.result, 'error')
                }
	  		}
	  	});
	});

	$("#delete_form").on('submit', function(e){
		e.preventDefault()

		var d_code = $("#d_code").val()

		$.ajax({
			type:'post',
			url:base_url+'Main_settings/delete_software_monthly_pay',
			data:{'d_code':d_code},
			success:function(data){
				if (data.success == 1) {
                    toastMessage('Success', data.message, 'success')
					fillDatatable("")
					$('#delete_modal').modal('hide')
                }
                else {
                    toastMessage('Note', data.message, 'error')
				}
			}
		});

	});
	
});