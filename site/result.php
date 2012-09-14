<?php include_once('header.tpl'); ?>

<?php

	//haal aantal vragen op
	$con = mysql_connect("localhost","pieter","moeilijkwachtwoord");
	if (!$con)	die('DBfout, fout: ' . mysql_error());
	mysql_select_db("knelkiezer",$con);

	$query="SELECT COUNT(*) FROM `vragen`";
	$result = mysql_query($query) or die ("fout: " . mysql_error());
	$count = mysql_result($result,0);

	$query="SELECT COUNT(*) FROM `coeff`";
	$result = mysql_query($query) or die ("fout: " . mysql_error());
	$beroepen = mysql_result($result,0);
	
	
	for( $counter = 1; $counter <= $beroepen; $counter++){
		
		$_SESSION['result'][$counter]=0;
		for( $counter2 = 1; $counter2 <= $count; $counter2++){
			$_SESSION['result'][$counter]+=$_SESSION['antwoord'][$counter2];
		}
	
	}

	foreach($_SESSION['result'] as $key=>$value){ 
		echo $key." : ".$value; 
	}

}

?>


<?php $_SESSION['fbmessage'] = "Knelkiezer raadde mij een job als bokser aan!" ?>
Bokser
<a href="fb/facebook_post.php">Share</a>

<?php include_once('footer.tpl'); ?>