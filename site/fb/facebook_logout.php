<?php
	require 'facebook.php';
	require 'config.php';
	
	$facebook->destroySession();
	header('Location: ../index.php');
?>	
