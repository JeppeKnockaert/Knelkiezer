<?php require_once('header.tpl'); ?>

<?php
	require_once('curl.php');
	//haal aantal vragen op
	$con = mysql_connect($db['hostname'],$db['login'],$db['pass']);
	if (!$con)	die('DBfout, fout: ' . mysql_error());
	mysql_select_db("knelkiezer",$con);

	$query="SELECT COUNT(*) FROM `vragen`";
	$result = mysql_query($query) or die ("fout: " . mysql_error());
	$count = mysql_result($result,0);

	$query="SELECT COUNT(*) FROM `coeff`";
	$result = mysql_query($query) or die ("fout: " . mysql_error());
	$beroepen = mysql_result($result,0);
	
	$maxscore=-5*$count;
	$maxid=1;
	
	for( $counter = 1; $counter < $beroepen -1; $counter++){
		
		$score=0;
		for( $counter2 = 1; $counter2 < $count -1; $counter2++){
			
			$antwoord = $_SESSION['antwoord'][$counter2];
			//echo $_SESSION['antwoord'][$counter2];
			$antwoord = 2*$antwoord-1;
			
			$query="SELECT `beroep` FROM `beroepen` WHERE `id`='".$counter."';";
			$result = mysql_query($query) or die ("fout: " . mysql_error());
			$beroep = mysql_result($result,0);
			
			$query="SELECT `".$beroep."` FROM `coeff` WHERE `id`='".$counter2."';";
			$result = mysql_query($query) or die ("fout: " . mysql_error());
			$coeff = mysql_result($result,0);
			
			$score += $antwoord * $coeff;
		
		}
		if($score > $maxscore){
			$maxscore = $score;
			$maxid = $counter;
		}
	
	}
	
	$query="SELECT `Naam`,`beroep` FROM `beroepen` WHERE `id`='".$maxid."';";
	$result = mysql_query($query) or die ("fout: " . mysql_error());
	$columns = mysql_fetch_array($result);
	$beroep = $columns['Naam'];
	$beroepcat = $columns['beroep'];
	$_SESSION['fbmessage'] = "Knelkiezer raadde mij een job als ".$beroep." aan! Vind jouw knelpuntberoep op http://pieterreuse.be/tools/knelkiezer";
		
	mysql_close($con);
	$request_url = "http://data.appsforflanders.be/sql.json?query=" ;
    $query = "SELECT omschrijving,code FROM vdab.opleidingen WHERE ";
    $where = "sectie_omschrijving LIKE '%".strtoupper($beroepcat)."%'"; 
    $fullurl = $request_url.urlencode( $query . $where ) ;
    // get "opleidingen"
    $opleidingen = get( $fullurl )->sqlquery;
	//$opleidingen = 0;
?>

<!--<img src="http://www.pieterreuse.be/tools/knelkiezer/img/<?php //echo $maxid; ?>.jpg"/><br/><br/>-->



<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Knelkiezer. Vind wat jouw knelbuntberoep zou zijn in enkele seconden.</title>
        <meta name="description" content="Vind het knelpuntberoep dat bij jou past in enkele seconden!">
        <meta property="og:title" content="Knelkiezer" />
		<meta property="og:type" content="video.movie" />
		<meta property="og:url" content="Vind het knelpuntberoep dat bij jou past in enkele seconden!" />
		<!--<meta property="og:image" content="http://ia.media-imdb.com/images/rock.jpg" />-->
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.1.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <!-- Add your site or application content here -->  
         <div id="container">
            <div id="result">
                <p>Het knelpuntberoep dat bij u past is dat van...</p>
                <h1 class="underline"><?php echo $beroep; ?></h1>
                <a id="share" href="fb/facebook_post.php">
                </a>
            </div>
        </div>
        
        U kunt hiervoor volgende opleidingen volgen:<br /><br /> 
        <?php 
        	foreach ($opleidingen as $opleiding){
    			echo ($opleiding->omschrijving)." <a href='map.php?code=".$opleiding->code."'>Kaart</a><br />";
    		}
        ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
 </body>
 <html>
