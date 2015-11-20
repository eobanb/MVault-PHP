<?php 
/* 
MVault-PHP 0.1
Eoban Binder
this simple interface authenticates to the MVault (or QA) environment and gets/edits membership records.
*/

//config
$endpoint = 'https://mvault-qa.services.pbs.org/api/'; // endpoint (mvault or mvault-qa)
$callsign = 'wkrp'; // not case-sensitive
$username = 'abcdef123'; // put your key here
$password = 'abcdef123'; // put your secret here

include('./mvphp-functions.php');

//example queries (must have a trailing slash)
//$api_query = '/memberships/0000000001/'; // get/edit a specific record
//$api_query = '/memberships/filter/deleted/'; // get all deleted
//$api_query = '/memberships/filter/active/'; // get active
$api_query = '/memberships/filter/email/example@example.com/'; // get by email

$json_record = '{
  "first_name":"Joe",
  "last_name":"Schmoe",
  "offer":"WKRP_PASSPORT",
  "start_date":"2014-06-20T12:57:59Z",
  "expire_date":"2014-07-20T12:57:59Z",
  "email":"example@example.com",
  "notes":"just a test"
}'; // data to fill in for a new/modified record

$uri = $endpoint . $callsign . $api_query;

$output = MVgetRecord($uri);			// GET a record
//$output = MVwriteRecord($uri); 		// CREATE or EDIT a record
    
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MVault-PHP</title>
		<style>
			body {font-family:sans-serif;padding: 10px 30px;}
		</style>
		<script>
			var outputjson = JSON.stringify(<?php echo $output; ?>, null, 2); // spacing level 2
		</script>
	</head>
	<body>
		<h1>MVault-PHP</h1>
		<h4>0.1</h4>
		<h5>A simple PHP interface for the PBS Membership Vault (Passport) RESTful API v1</h5>
		<hr />
		<pre>
<script>document.write(outputjson);</script>
		</pre>
		<hr />
		<h3>Debug</h3>
		<p>API query: <em><?php echo $uri; ?></em></p>
	</body>
</html>

