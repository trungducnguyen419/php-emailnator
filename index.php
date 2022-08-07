<?php
require_once 'function.php';
setHeaderJson();
$type = strtolower(getDataFromGetPost('type'));
if ($type === 'create-mail') {
	$domain = strtolower(getDataFromGetPost('domain'));
	$plusgmail = strtolower(getDataFromGetPost('plusgmail'));
	$dotgmail = strtolower(getDataFromGetPost('dotgmail'));
	if ($domain === 'false' && $plusgmail === 'false' && $dotgmail === 'false') printJson(array('statusCode' => 400, 'message' => 'Please select at least one option!'));
	else if (!validBool($domain) || !validBool($plusgmail) || !validBool($dotgmail)) printJson(array('statusCode' => 400, 'message' => 'Not valid boolean!'));
	if (strlen($domain) < 1 && falseOrEmpty($plusgmail) && falseOrEmpty($dotgmail)) $domain = 'true';
	else if (strlen($plusgmail) < 1 && falseOrEmpty($domain) && falseOrEmpty($dotgmail)) $plusgmail = 'true';
	else if (strlen($dotgmail) < 1 && falseOrEmpty($domain) && falseOrEmpty($plusgmail)) $dotgmail = 'true';
	if (strlen($domain) < 1) $domain = 'false';
	if (strlen($plusgmail) < 1) $plusgmail = 'false';
	if (strlen($dotgmail) < 1) $dotgmail = 'false';
	$data_email = getDataEmail();
	getEmailAddress($data_email, $domain, $plusgmail, $dotgmail);
} else if ($type === 'recovery-mail') {
	$email = strtolower(getDataFromGetPost('email'));
	if (strlen($email) < 1) printJson(array('statusCode' => 400, 'message' => 'Empty email.'));
	else if (!isValidEmail($email)) printJson(array('statusCode' => 400, 'message' => 'Not valid email.'));
	$data_email = getDataEmail();
	recoveryEmail($data_email, $email);
} else if ($type === 'get-list-mail') {
	$email = strtolower(getDataFromGetPost('email'));
	$token = getDataFromGetPost('token');
	if (strlen($email) < 1) printJson(array('statusCode' => 400, 'message' => 'Empty email.'));
	else if (strlen($token) < 1) printJson(array('statusCode' => 400, 'message' => 'Empty token.'));
	else if (!isValidEmail($email)) printJson(array('statusCode' => 400, 'message' => 'Not valid email.'));
	else if (!isValidBase64($token)) printJson(array('statusCode' => 400, 'message' => 'Not valid token.'));
	$token = base64_decode($token);
	if (!IsJson($token)) printJson(array('statusCode' => 400, 'message' => 'Not valid token.'));
	$json_token = json_decode($token, true);
	if ($json_token['cookies'] === null || $json_token['token'] === null) printJson(array('statusCode' => 400, 'message' => 'Not valid token.'));
	getListMail($json_token, $email);
} else if ($type === 'read-mail') {
	$email = strtolower(getDataFromGetPost('email'));
	$token = getDataFromGetPost('token');
	$message_id = getDataFromGetPost('message_id');
	if (strlen($email) < 1) printJson(array('statusCode' => 400, 'message' => 'Empty email.'));
	else if (strlen($token) < 1) printJson(array('statusCode' => 400, 'message' => 'Empty token.'));
	else if (strlen($message_id) < 1) printJson(array('statusCode' => 400, 'message' => 'Empty message_id.'));
	else if (!isValidEmail($email)) printJson(array('statusCode' => 400, 'message' => 'Not valid email.'));
	else if (!isValidBase64($token)) printJson(array('statusCode' => 400, 'message' => 'Not valid token.'));
	$token = base64_decode($token);
	if (!IsJson($token)) printJson(array('statusCode' => 400, 'message' => 'Not valid token.'));
	$json_token = json_decode($token, true);
	if ($json_token['cookies'] === null || $json_token['token'] === null) printJson(array('statusCode' => 400, 'message' => 'Not valid token.'));
	readMail($json_token, $email, $message_id);
}
printJson(array('statusCode' => 400, 'message' => 'Bad request'));
?>