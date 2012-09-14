<?php include_once('header.tpl'); ?>
<?php 
	if (! $user){
		header("Location: index.php");
       	exit;	
	}
	else{
?>

<?php
	
	//haal aantal vragen op
	$con = mysql_connect("localhost","pieter","moeilijkwachtwoord");
	if (!$con)	die('DBfout, fout: ' . mysql_error());
	mysql_select_db("knelkiezer",$con);

	$query="SELECT COUNT(*) FROM `vragen`";

	$result = mysql_query($query) or die ("fout: " . mysql_error());
	$count = mysql_result($result,0);
	
	for( $counter = 1; $counter <= $count; $counter++){
	
		echo "\n<div id=_".$counter." class='question'>Vraag ".$counter.":<br/>";
		echo "<form action='postvraag.php'>";
		$query="SELECT `vraag` FROM `vragen` WHERE `id`=".$counter.";";
		$result = mysql_query($query) or die ("fout: " . mysql_error());
		$result = mysql_result($result,0);
		echo $result;
		
		echo "<br/>\n<input type='radio' name='antwoord' value='1'/>Like<br/>";
		echo "<input type='radio' name='antwoord' value='0'/>Dislike";
		echo "<input type='hidden' name='vraag' value='".$counter."' />";
		echo "</form>";
		echo "</div>\n";
	
	}
	
	mysql_close($con);
}
?>


<?php include_once('footer.tpl'); ?>