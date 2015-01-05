<?php

set_time_limit(0);
ini_set('default_socket_timeout', 300);
session_start();

/*-------------------Instagram API Keys---------------------*/

define('clientID', '36d3a0a743b14cfc96d7a9bb55c0f2d3');
define('clientSecret', '9b4b51da80004ac1b74d5e3acaa6e2e6');
define('redirectURI', 'http://localhost/Instagram-Downloader/index.php');
define('imageDirectory', 'pics/');

if (isset($_GET['code'])) {
	$code = $_GET['code'];
	$url = "https://api.instagram.com/oauth/access_token";
	$access_token_settings = array(
		'client_id'  	 =>     clientID      ,
		'client_secret'  =>		clientSecret  ,
		'grant_type'	 =>		'authorization_code',
		'redirect_uri'	 =>		redirectURI	  ,
		'code'			 => 	$code		  
	);
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $access_token_settings);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	
	$result = curl_exec($curl);
	curl_close($curl);
	
	$results = json_decode($result, true);
	echo $userName = $results['user']['username'];
} else { ?>
	
	<!doctype html>
	<html>
	<body>
		<a href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">Login</a>
	</body>

	</html>

<?php

}	
	
?>
