$(document).ready(function(){
	var base_url = $("body").data('base_url'); //base_url come from php functions base_url();
	var token = $('.token').text();

	var data = [];
	franchisee = "";

	function reset() {
		data = [];	
		$("#r_date").val("");
		$("#r_franchisee").val('none').change();
		$("#r_location").val("");
		$('#r_concept').val('none').change();
		$('#r_type').val('none').change();
		$('#r_size').val('none').change();
		$('#r_improvements').val('none').change();
		$('#r_mode').val('none').change();
		$("#r_notes").val("");
		$(".save").prop("disabled",false);
		$("r_location").prop('disabled', true);
	}
	
	// $(".r_date").datepicker({
	// 	minDate: 'today',  
	// });

	

    $('.r_date').datepicker({
		format: 'mm/dd/yyyy',
		startDate: 'today',
		endDate: '+90d'
   // dataTable.columns(i).search(v).draw();
});

	var options = {
		url: function(phrase) {
			return base_url+'Main_cart/get_all_franchisee'
		},
		getValue: function(element) {
			return element.name;
		},
		list: {
			onSelectItemEvent: function() {
				franchisee = $("#r_franchisee").getSelectedItemData().idno;

				if ($("#r_franchisee").getSelectedItemData().address == "") {
					toastMessage('Note:', 'Franchisee have no address. You may manually enter an address.', 'error');
					$("#r_location").prop('disabled', false);
					$("#r_location").val("");
				}
				else {
					$('#r_location').val($("#r_franchisee").getSelectedItemData().address);
					$("#r_location").prop('disabled', true);
				}
			}
		},
		ajaxSettings: {
			dataType: "json",
			method: "POST",
			data: {
				dataType: "json"
			}
		},
		preparePostData: function(data) {
			data.phrase = $("#r_franchisee").val();
			return data;
		},
		requestDelay: 400
	};

	$("#r_franchisee").easyAutocomplete(options);

	$('.save').click(function(e) {
		var date = $("#r_date").val();
		var franchisee = $("#r_franchisee").val();
		var location = $("#r_location").val();
		var concept = $("#r_concept").val();
		var type = $("#r_type").val();
		var size = $("#r_size").val();
		var improvements = $("#r_improvements").val();
		var mode = $("#r_mode").val();
		var date1 = formatDate(date);

		if(date1 == "" || franchisee == "none" || location == "" || concept == "none" || type == "none" || size == "none" || improvements == "none" || mode == "none") {
			toastMessage('Note:', 'Please fill out all required fields.', 'error');
		}
		else {
			if (date1 >= formatDate(date)) {
				$('#m_franchisee').html($("#r_franchisee option:selected").text());
				$('#m_date').html($("#r_date").val());
				$('#confirmModal').modal();
			}
			else {
				toastMessage('Note:', 'Date cannot be earlier than today.', 'error');
			}
		}
	});

	$('#confirmForm').submit(function(event) {
		event.preventDefault();

		var form = $(this);

		var data = {
			'date' : formatDate($("#r_date").val()),
			'franchisee' : franchisee,
			'location' : $("#r_location").val(),
			'concept' : $("#r_concept").val(),
			'type' : $("#r_type").val(),
			'size' : $("#r_size").val(),
			'improvements' : $("#r_improvements").val(),
			'mode' : $("#r_mode").val(),
			'notes' : $("#r_notes").val()
		}

		$.ajax({
	  		url: form.attr('action'),
            type: form.attr('method'),
			data: {'data':data},
	  		beforeSend:function(data){
				$.LoadingOverlay("show");
				$(".save").prop("disabled",true);
			},
	  		success:function(data){
	  			if (data.success == 1) {
				 	window.location.replace(base_url+'Main_cart/rst_history/'+token);
					toastMessage('Success:', 'You have successfully saved the record.', 'success');
				 	setTimeout(function(){
						$.LoadingOverlay("hide");
						$('#confirmModal').modal('hide');
					},500);
	  			}
	  		}
  		});
	});
});