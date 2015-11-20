<?php

include('./httpful.phar'); // HTTPful library

function MVwriteRecord($uri) {
	global $username, $password, $json_record;
	$response = \Httpful\Request::put($uri) // PUT for creating/editing
	->sendsJson() // JSON
    ->authenticateWith($username, $password)
    ->body($json_record) 
    ->send();
    return $response;
}

function MVgetRecord($uri) {
	global $username, $password;
	$response = \Httpful\Request::get($uri) // GET for retrieving
    	->authenticateWith($username, $password)
    	->send();
	return $response;
}

?>
