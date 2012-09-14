<?php include_once('header.tpl'); ?>
<?php 
	if (! $user){
		//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		header("Location: index.php");
       	exit;	
	}
	else{
?>

<?php

if(is_null($_POST['vraag'])){
	$_POST['vraag']=1;
} else {
	$nr = $_POST['vraag'];
	$_SESSION['antwoorden'][$nr]=$_POST['antwoord'];
	/*foreach($_SESSION['antwoorden'] as $key=>$value){ 
		echo $value; 
	}*/
	
	//test of vragenlijst ten einde
	$con = mysql_connect("localhost","pieter","moeilijkwachtwoord");
	if (!$con)	die('DBfout, fout: ' . mysql_error());
	mysql_select_db("knelkiezer",$con);

	$query="SELECT COUNT(*) FROM `vragen`";

	$result = mysql_query($query) or die ("fout: " . mysql_error());
	$result = mysql_result($result,0);
	
	mysql_close($con);
	
	if($_POST['vraag']==$result+1)
			header("Location: result.php");
}
?>

<p>Vraag <?php echo $_POST['vraag']; ?></p>

<form action="vragen.php" method="post">

<table>
<tr><td>Vraag:</td><td>

<?php
	$con = mysql_connect("localhost","pieter","moeilijkwachtwoord");
	if (!$con)	die('DBfout, fout: ' . mysql_error());
	mysql_select_db("knelkiezer",$con);

	$query="SELECT `vraag` FROM `vragen` WHERE `id`=".$_POST['vraag'].";";

	$result = mysql_query($query) or die ("fout: " . mysql_error());
	$result = mysql_result($result,0);
	echo $result;
	
	mysql_close($con);
?>
</td></tr>
<tr><td><input type="radio" name="antwoord" value="1"/>Like</td>
<td><input type="radio" name="antwoord" value="0"/>Dislike</td></tr>

<input type="hidden" name="vraag" value="<?php echo $_POST['vraag']+1; ?>" />
<tr><td colspan="3">
<input type="submit" name="submit!" />
</td></tr>

</form>
<?php } ?>


<?php include_once('footer.tpl'); ?>
