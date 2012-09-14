<?php
	require_once( 'fb/facebook.php' );
    require_once( 'fb/config.php' );
	try{
	    $user = $facebook->getUser();
	}
	catch(FacebookApiException $e){
		echo "Er heeft zich een fout voorgedaan! ";
		exit;
	}
    preg_match('/^.*\/(.*)$/',$_SERVER["REQUEST_URI"],$matches);
	if (!$user && $matches[1]!=="index.php") {
		header("Location: index.php");
		exit;
	}
	else if ($user){
		//Get the profile
        $user_profile = $facebook->api('/me'); 
	}
    session_start();
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Knelkiezer</title>
</head>
<body>
