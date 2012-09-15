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
	
	$maxscore=-2*$count;
	$maxid=1;
	
	for( $counter = 1; $counter < $beroepen -1; $counter++){
		
		//$_SESSION['result'][$counter]=0;
		$score=0;
		for( $counter2 = 1; $counter2 < $count; $counter2++){
			//$_SESSION['result'][$counter] += $_SESSION['antwoord'][$counter2];
			
			$antwoord = $_SESSION['antwoord'][$counter2];
			$antwoord = 2*$antwoord-1;
			
			$query="SELECT `beroep` FROM `beroepen` WHERE `id`='".$counter."';";
			$result = mysql_query($query) or die ("fout: " . mysql_error());
			$beroep = mysql_result($result,0);
			
			$query="SELECT `".$beroep."` FROM `coeff` WHERE `id`='".$counter2."';";
			$result = mysql_query($query) or die ("fout: " . mysql_error());
			$coeff = mysql_result($result,0);
			
			$score += $antwoord * $coeff;
			//echo $counter2.": ".$_SESSION['antwoord'][$counter2];
		}
		if($score > $maxscore){
			$maxscore = $score;
			$maxid = $counter;
		}
	
	}

	/*foreach($_SESSION['result'] as $key=>$value){ 
		echo $key." : ".$value; 
	}*/
	
	$query="SELECT `Naam` FROM `beroepen` WHERE `id`='".$maxid."';";
	$result = mysql_query($query) or die ("fout: " . mysql_error());
	$beroep = mysql_result($result,0);
	
	$_SESSION['fbmessage'] = "Knelkiezer raadde mij een job als ".$beroep." aan!";
?>

UITSLAG: <br/><br/>

U past het best bij het beroep van <?php echo $beroep; ?>.<br/><br/>
<img src="http://www.pieterreuse.be/tools/knelkiezer/img/<?php echo $maxid; ?>.jpg"/><br/><br/>

<a href="fb/facebook_post.php">Deel op facebook</a>

<br/><br/>Zie ook <a href="http://www.pieterreuse.be/tools/knelkiezer/map.php">de kaart</a> van bijhorende
VDAB-opleidingen.

<?php include_once('footer.tpl'); ?>