<?php
	require 'fb/facebook.php';
	require 'fb/config.php';
	
	$facebook->destroySession();
	header('Location: index.php');
?>	
