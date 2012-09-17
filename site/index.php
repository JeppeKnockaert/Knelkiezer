<?php include_once('header.tpl'); ?>
<?php 
	if ($user){
		$geocode = getGeoCoding($user_profile['location']['name']);
		$_SESSION['mylocationlat'] = $geocode['lat'];
		$_SESSION['mylocationlong'] = $geocode['lng'];
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=vragen.php">';
       	exit;	
	}
	else{
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<script type="text/javascript">
	<!--
	if(document.URL=="http://pieterreuse.be/tools/knelkiezer/index.php") window.location = "http://www.pieterreuse.be/tools/knelkiezer/index.php"
	//-->
	</script>
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
            <div id="home">
                <h1 class="underline">Welkom op de knelkiezer</h1>
                <p>Koppel je Facebook zodat we sneller je knelpuntberoep kunnen zoeken!</p>
                <div id="login" onclick="window.location = '<?php echo $facebook->getLoginUrl(
							array(
								'display' => 'touch',
                            	'scope' => 'publish_stream,user_location'
                            )
                    );
				?>'"></div>
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
        <?php }
	function getGeoCoding($address){
		require_once('curl.php');
		$baseurl = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=";
		$result = get($baseurl.str_replace(', ','+',$address));
		return (array)$result->results[0]->geometry->location;
	}
?>
<?php include_once('footer.tpl'); ?>
