<?php include_once('header.tpl'); ?>
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
    <?php 
		if (! $user){
			//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
			header("Location: index.php");
			exit;	
		}
		else{
	?>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div id="container">
        	<div id="container_questions">
               
		
        <?php
			
			//haal aantal vragen op
			$con = mysql_connect("localhost","pieter","moeilijkwachtwoord");
			if (!$con)	die('DBfout, fout: ' . mysql_error());
			mysql_select_db("knelkiezer",$con);
		
			$query="SELECT COUNT(*) FROM `vragen`";
		
			$result = mysql_query($query) or die ("fout: " . mysql_error());
			$count = mysql_result($result,0);
			$url = preg_match('/(.*)\/.*/',$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"],$matches);
			$url = $matches[1];
			$url = preg_replace('/^localhost/','http://localhost',$url);
			for( $counter = 1; $counter <= $count; $counter++){
			
				echo "<div id=_".$counter." class='question'>";
				$query="SELECT `vraag` FROM `vragen` WHERE `id`=".$counter.";";
				$result = mysql_query($query) or die ("fout: " . mysql_error());
				$result = mysql_result($result,0);
				echo '<h1 class="underline">' . $result . '</h1>';
				echo "<form id='f_" . $counter . "'  method='post' action=''>";
				echo '<input type="hidden" name="vraag" value="' . $counter .  '" />';
                echo '<input class="antwoordHidden" type="hidden" name="antwoord" value="1" />';
			?>
            <div id="antwoord" class="clearfix">
                            <div class="ja" onClick="sendData('yes', <?php echo $counter; ?>, '<?php echo $url; ?>');">
                            </div>
                            <div class="nee" onClick="sendData('no',  <?php echo $counter; ?>, '<?php echo $url; ?>');">
                            </div>
                        </div>
			</form>
            </div>

			<?php
			}
			
			mysql_close($con);
		}
		?>
        
        </div>
        </div>
		
		
        
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
</html>
