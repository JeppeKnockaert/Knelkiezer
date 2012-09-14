<?php
	require_once( 'facebook.php' );
    require_once( 'config.php' );
	$PostData = array(
		'message' => $_SESSION['fbmessage'],
		'name' => 'Bericht gepost vanaf Knelkiezer',
	);
	$facebook->api('/me/feed', 'post', $PostData);
	header('location: ../result.php');
?>