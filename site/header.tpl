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
