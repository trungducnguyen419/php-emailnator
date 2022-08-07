<?php
error_reporting(E_ERROR);
function String_Contains($haystack, $needle) {
    if (strpos($haystack, $needle) !== false) return true;
    return false;
}
function setHeaderJson() {
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; charset=utf-8');
}
function isValidEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function getDataEmail() {
	$response_data_email = requestGet('https://www.emailnator.com/', null, true);
	preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $response_data_email, $matches);
	$cookies = '';
	$XSRFTOKEN = '';
	foreach($matches[1] as $item) {
		if (!String_Contains($cookies, explode('=', $item)[0])) {
			if (explode('=', $item)[0] === 'XSRF-TOKEN') $XSRFTOKEN = explode('=', $item)[1];
			$cookies .= $item . ';';
		}
	}
	if (strlen($cookies) < 10) printJson(array('statusCode' => 500, 'message' => 'Error server!'));
	return array('cookies' => $cookies, 'token' => urldecode($XSRFTOKEN));
}
function validBool($str) {
	return $str === 'true' || $str === 'false' || strlen($str) < 1;
}
function falseOrEmpty($str) {
	return strlen($str) < 1 || $str === 'false';
}
function recoveryEmail($data_email, $email) {
	$response_recovery_email = requestPost('https://www.emailnator.com/message-list', '{"email":"'.$email.'"}', $data_email);
	if (!IsJson($response_recovery_email) && String_Contains($response_recovery_email, 'Page Expired')) printJson(array('statusCode' => 400, 'message' => 'Email expired!'));
	$json_recovery_email = json_decode($response_recovery_email, true);
	if ($json_recovery_email['messageData'] === null) printJson(array('statusCode' => 400, 'message' => 'Wrong email!'));
	else if ($json_recovery_email['message'] !== null) printJson(array('statusCode' => 400, 'message' => 'Email expired!'));
	printJson(array('statusCode' => 200, 'token' => base64_encode(json_encode($data_email)), 'email' => $email, 'message' => 'OK'));
}
function getEmailAddress($data_email, $domain = 'true', $plusgmail = 'false', $dotgmail = 'false') {
	$array_email_domain = array();
	if ($domain === 'true') array_push($array_email_domain, 'domain');
	if ($plusgmail === 'true') array_push($array_email_domain, 'plusGmail');
	if ($dotgmail === 'true') array_push($array_email_domain, 'dotGmail');
	$data_post_email_domain = json_encode(array('email' => $array_email_domain));
	$response_get_email_address = requestPost('https://www.emailnator.com/generate-email', $data_post_email_domain, $data_email);
	if (!IsJson($response_get_email_address) && String_Contains($response_get_email_address, 'Page Expired')) printJson(array('statusCode' => 400, 'message' => 'Email expired!'));
	else if (!IsJson($response_get_email_address)) printJson(array('statusCode' => 500, 'message' => 'Error server!'));
	$json_email_address = json_decode($response_get_email_address, true);
	if ($response_get_email_address['message'] !== null) printJson(array('statusCode' => 400, 'message' => 'Email expired!'));
	$email_address = $json_email_address['email'][0];
	printJson(array('statusCode' => 200, 'token' => base64_encode(json_encode($data_email)), 'email' => $email_address, 'message' => 'OK'));
}
function getListMail($data_email, $email) {
	$response_get_list_mail = requestPost('https://www.emailnator.com/message-list', '{"email":"'.$email.'"}', $data_email);
	if (!IsJson($response_get_list_mail) && String_Contains($response_get_list_mail, 'Page Expired')) printJson(array('statusCode' => 400, 'message' => 'Email expired!'));
	else if (!IsJson($response_get_list_mail)) printJson(array('statusCode' => 500, 'message' => 'Error server!'));
	$json_list_mail = json_decode($response_get_list_mail, true);
	if ($json_list_mail['message'] !== null) printJson(array('statusCode' => 400, 'message' => 'Email expired!'));
	printJson(array('statusCode' => 200, 'list_mail' => $json_list_mail['messageData'], 'message' => 'OK'));
}
function readMail($data_email, $email, $messageID) {
	$response_mail = requestPost('https://www.emailnator.com/message-list', '{"email":"'.$email.'","messageID":"'.$messageID.'"}', $data_email);
	if (String_Contains($response_mail, 'Page Expired')) printJson(array('statusCode' => 400, 'message' => 'Email expired!'));
	else if (!String_Contains($response_mail, 'id="subject-header"')) printJson(array('statusCode' => 500, 'message' => 'Error server!'));
	printJson(array('statusCode' => 200, 'body' => $response_mail, 'message' => 'OK'));
}
function IsJson($string) {
   json_decode($string);
   return json_last_error() === JSON_ERROR_NONE;
}
function requestGet($url, $data_email = null, $get_response = false) {
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	if ($data_email !== null) {
		$headers = array(
		   'X-Requested-With: XMLHttpRequest',
		   'X-XSRF-TOKEN: ' . $data_email['token'],
		   'Cookie: ' . $data_email['cookies'],
		);
	} else {
		$headers = array(
		   'X-Requested-With: XMLHttpRequest',
		);
	}
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	if ($get_response) curl_setopt($curl, CURLOPT_HEADER, 1);
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36');
	$resp = curl_exec($curl);
	curl_close($curl);
	return $resp;
}
function isNumber($value) {
	return preg_match('~[0-9]+~', $value);
}
function isValidBase64($s) {
	return (bool)preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s);
}
function requestPost($url, $data, $data_email = null) {
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	if ($data_email !== null) {
		$headers = array(
		   'X-Requested-With: XMLHttpRequest',
		   'X-XSRF-TOKEN: ' . $data_email['token'],
		   'Cookie: ' . $data_email['cookies'],
		   'Content-Type: application/json',
		);
	} else {
		$headers = array(
		   'X-Requested-With: XMLHttpRequest',
		   'Content-Type: application/json',
		);
	}
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36');
	$resp = curl_exec($curl);
	curl_close($curl);
	return $resp;
}
function printJson($arr) {
	echo json_encode($arr, JSON_UNESCAPED_UNICODE);
	exit;
}
function getDataFromGetPost($name) {
	$str = $_GET[$name];
	if (empty($str)) $str = $_POST[$name];
	return urldecode($str);
}
?>