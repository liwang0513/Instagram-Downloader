<?php

set_time_limit(0);
ini_set('default_socket_timeout', 300);
session_start();

/*-------------------Instagram API Keys---------------------*/

define('clientID', '36d3a0a743b14cfc96d7a9bb55c0f2d3');
define('clientSecret', '9b4b51da80004ac1b74d5e3acaa6e2e6');
define('redirectURL', 'https://github.com/liwang0513');
define('imageDirectory', 'pics/');

?>

<!doctype html>
<html>
<body>
	<a href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURL; ?>&response_type=code">Login</a>
</body>

</html>