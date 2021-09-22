<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function sanitize($in) {
	return addslashes(htmlspecialchars(strip_tags(trim($in))));
}

function generate_json($data) {
	header("access-control-allow-origin: *");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Content-type: application/json');
	echo json_encode($data);
}

function today() {
	date_default_timezone_set('Asia/Manila');
	return date("Y-m-d");
}

function today_text() {
	date_default_timezone_set('Asia/Manila');
	return date("m/d/Y");
}

function today_date() {
	date_default_timezone_set('Asia/Manila');
	return date("m/d/Y");
}

function time_only() {
	date_default_timezone_set('Asia/Manila');
	return date("G:i");
}

function year_only() {
	date_default_timezone_set('Asia/Manila');
	return date("Y");
}

function fulldate() {
	date_default_timezone_set('Asia/Manila');
	return date("M d, Y");
}

function todaytime() {
	date_default_timezone_set('Asia/Manila');
	return date("Y-m-d G:i:s");
}

function en_dec($action, $string){ //used for token
	$output = false;

	$encrypt_method = "AES-256-CBC";
	$secret_key = 'CloudPandaPHInc';
	$secret_iv = 'TheDarkHorseRule';

	// hash
	$key = hash('sha256', $secret_key);

	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	$iv = substr(hash('sha256', $secret_iv), 0, 16);

	if( $action == 'en' ) 
	{
	  $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	  $output = base64_encode($output);
	}
	else if( $action == 'dec' )
	{
	  $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	}

	return $output;
}

function Generate_random_password() {
    $alphabet = "abcdefghijklmnopqrstuwxyz";
    $alphabetUpper = "ABCDEFGHIJKLMNOPQRSTUWXYZ";
    $alphabetNumber = "0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabetNumber) - 1; //put the length -1 in cache
    for ($i = 0; $i < 3; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n].$alphabetUpper[$n].$alphabetNumber[$n];
    }
    return implode($pass); //turn the array into a string
}

function generate_player_no(){
	$letters = array("A","B","C","D","E",
					 "F","G","H","I","J",
					 "K","L","M","N","O",
					 "P","Q","R","S","T",
					 "U","V","W","X","Y",
					 "Z");

	$numbers = array("1","2","3","4","5",
					 "6","7","8","9","0");

	$generated_key = array();
	for($x=0; $x < 11; $x++){	 
		if (count($generated_key) < 4) {
			$get_val = array_rand($letters, 1);

			array_push($generated_key, $letters[$get_val]);
		}else{
			$get_val = array_rand($numbers, 1);
			array_push($generated_key, $numbers[$get_val]);
		}
	}
	$generated_key = implode("",$generated_key);

	return $generated_key;
}


function selec_discount_type($price, $qty, $discamt, $disctype){
	if($disctype == 1){
		return number_format($discamt,2);
	}else if($disctype == 2){
		return number_format($discamt).'%';
	}else{
		return ""; 
	}
}

function discounted_total($price, $qty, $discamt, $disctype) {
	$subtotal = $price * $qty;
	if ($disctype == "2") {
		$discamt = $subtotal * ($discamt / 100);
	}

	return number_format($subtotal - $discamt, 2, ".", ",");
}

function general_discounted_total($total, $freight, $discamt, $disctype) {
	$subtotal = $total ;
	if ($disctype == "2") {
		$discamt = $subtotal * ($discamt / 100);
	}

	$total = $subtotal - $discamt;

	return number_format($total + $freight, 2, ".", ",");
}

function remove_format($text){
	$text = str_replace(",", "", $text);
	$unformatted = explode('.', $text);
    return $unformatted[0];
}

function concatenate_name($fname, $mname, $lname, $supplement = "", $reverse = true, $capitalization = true) {
	$name = ($reverse ? ($lname ? $lname . ', ' : '') . ($fname ? $fname . ' ' : ' ') . $mname . ($supplement && $supplement != "none" ? ' (' . $supplement . ')' : '') 
						: $name = $fname . ($mname ? ' ' . $mname . ' ' : ' ') . $lname . ($supplement && $supplement != "none" ? ' (' . $supplement . ')' : ''));

	$name = ($capitalization ? strtoupper($name) : $name);

	return $name;
}

function format_address($address) {
	$result = preg_replace('/[ ,]+/', ' ', trim($address));
	return $result;
}

function echo_memory_usage() { 
	$mem_usage = memory_get_usage(true); 
	
	if ($mem_usage < 1024) 
		return $mem_usage." bytes"; 
	elseif ($mem_usage < 1048576) 
		return round($mem_usage/1024,2)." kilobytes"; 
	else 
		return round($mem_usage/1048576,2)." megabytes"; 
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function check_recipient($chkno) {
	$ci=& get_instance();
	$ci->load->database(); 
	$ci->load->model('model_sql');

	$supid = $ci->model_sql->get_check_details($chkno)->supid;

	if ($supid == "-5") {
		$name = $ci->model_sql->get_customer_details($chkno)->checkname;
	}
	else {
		$name = $ci->model_sql->get_supplier_details($supid)->suppliername;
	}

	return $name;
}

function check_name($idno) {
	$ci=& get_instance();
	$ci->load->database(); 
	$ci->load->model('model_sql');
	
	$name = $ci->model_sql->get_8_membermain_details($idno)->name;
	

	return $name;
}

function check_address($idno) {
	$ci=& get_instance();
	$ci->load->database(); 
	$ci->load->model('model_sql');
	
	$address = $ci->model_sql->get_8_membermain_details($idno)->homeaddress;
	

	return $address;
}

function get_name_by_username($username) {
	$ci=& get_instance();
	$ci->load->database(); 
	$ci->load->model('model_sql');

	$query = $ci->model_sql->get_name_by_username($username)->row();

	return concatenate_name($query->user_fname, $query->user_mname, $query->user_lname, "", false, false);
}

function generate_statement_date($billDate) {
	$statement_date = date('Y-m-d H:i:s', strtotime($billDate . ' -1 week'));

	return DATE('d M Y', strtotime($statement_date));
}

function generate_text_date($billDate) {
	$statement_date = date('Y-m-d H:i:s', strtotime($billDate));

	return DATE('d M Y', strtotime($statement_date));
}

function generate_due_date($billDate) {
	if ($billDate != "-") {
		$billDate = date('Y-m-d H:i:s', strtotime($billDate . ' +15 day'));
		$billDate = date('d M Y', strtotime($billDate));
	}

	return $billDate;
}

function bcc_email() {
	switch (ENVIRONMENT) {
    case 'development':
			return 'nromero.cloudpanda@gmail.com';
    break;
    case 'testing':
			return 'nromero.cloudpanda@gmail.com';
    break;
    case 'uat':
			return 'bicoreonebilling@gmail.com';
    break;
    case 'production':
			return 'bicoreonebilling@gmail.com';
    break;
	}

}

function get_total_needs($needs_id){
	$ci=& get_instance();
	$ci->load->database(); 
	$ci->load->model('model');
	
	$total = $ci->model->get_total_needs($needs_id)->num_rows();
	

	return $total;
}