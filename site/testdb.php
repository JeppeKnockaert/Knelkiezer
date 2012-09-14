<?php

	$con = mysql_connect("localhost","pieter","moeilijkwachtwoord");
	if (!$con)	die('DBfout, fout: ' . mysql_error());
	mysql_select_db("knelkiezer",$con);

	$query="SELECT COUNT(*) FROM `vragen`";

	$result = mysql_query($query) or die ("fout: " . mysql_error());
	$result = mysql_result($result,0);
	echo $result;
	
	mysql_close($con);

?>