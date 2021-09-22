// get the date today
var d = new Date();
var date = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();

function formatDate(date) {
	var d = new Date(date),
		month = '' + (d.getMonth() + 1),
		day = '' + d.getDate(),
		year = d.getFullYear();

	if (month.length < 2) month = '0' + month;
	if (day.length < 2) day = '0' + day;

	return [year, month, day].join('-');
}

function removeFormatDate(date) {
	var d = new Date(date),
		month = '' + (d.getMonth() + 1),
		day = '' + d.getDate(),
		year = d.getFullYear();

	if (month.length < 2) month = '0' + month;
	if (day.length < 2) day = '0' + day;

	return [month, day, year].join('/');
}

toastBgColor = {
	info: "#5cb85c",
	error: "#f0ad4e"
}

// reuseable toast call function for easeness and shorter code
function toastMessage(heading, text, icon) {

	$.toast({
		heading: heading,
		text: text,
		icon: icon,
		loader: false,  
		stack: false,
		position: 'top-center', 
		allowToastClose: false,
		bgColor: toastBgColor[icon],
		textColor: 'white'  
	});
}

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
	
// // hiding datepicker after date selection
$('*[class*=datepicker]').datepicker({
	format: 'mm/dd/yyyy',
}).on('changeDate', function(e){
	$(this).datepicker('hide');
});

function lengthIsHigher(element, length) {
	if (element.length > length) {
		return true;
	}
	else {
		return false;
	}
}

function lengthIsLower(element, length) {
	if (element.length < length) {
		return true;
	}
	else {
		return false;
	}
}

function lengthIsEqual(element, length) {
	if (element.length == length) {
		return true;
	}
	else {
		return false;
	}
}

function isEmail(email) {
	var regex = /^([ña-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

// Read image in input file and display to an img element
function readURL(input, selector) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			selector.attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
	else {
		selector.attr('src', "");
	}
}

function concatenateName(fname, mname, lname, supplement) {
	name = "";

	if (lname != "") {
		name += lname + ", ";
	}

	if (fname != "") {
		name += fname + " ";
	}

	if (mname != "") {
		name += mname;
	}

	if (supplement != "" && supplement != "none") {
		name += " (" + supplement + ")";
	}

	return name.toUpperCase();
}

function format_address(address) {
	result = $.trim(address.replace(/\,/g, ''));
	return result;
}

$(document).on({
	ajaxStart: function () { $.LoadingOverlay("show"); },
	ajaxStop: function () { $.LoadingOverlay("hide"); }
});