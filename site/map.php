<?php require_once('header.tpl'); ?>
<?php 
	require_once('curl.php');
	$request_url = "http://data.appsforflanders.be/sql.json?query=" ;
    $query = "SELECT plaats_oe FROM vdab.cursussen WHERE ";
    $where = "opleiding_code=".$_GET["code"]; 
    $fullurl = $request_url.urlencode( $query . $where ) ;
    $places = get( $fullurl )->sqlquery;
    $uniqueplaces = array();
    $i = 0;
    foreach ($places as $place){
    	if(!in_array($place->plaats_oe,$uniqueplaces)){
	    	$uniqueplaces[$i] = $place->plaats_oe;
	    	$i++;
	   	} 
    }
    $nolocations = false;
    if ($i ===0){
    	$nolocations = true;
    }
    else{
    	$request_url = "http://data.appsforflanders.be/sql.json?query=" ;
		$query = "SELECT omschrijving, adres1, postcode, stad, lat, long  FROM vdab.kantoren WHERE ";
		$where = "";
		$i = 0;
    	foreach ($uniqueplaces as $place){	
			$where .= "oe=".$place; 
			if ($i < count($uniqueplaces)-1){
				$where .= " OR ";
			}
			$i++;
		}
		$fullurl = $request_url.urlencode( $query . $where." AND lat <> ''" ) ;
		$offices = get( $fullurl )->sqlquery;
		if (count($offices) === 0){
			$nolocations = true;
		}
    }
?>
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
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4/leaflet.css" />
	 <!--[if lte IE 8]>
     <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4/leaflet.ie.css" />
     <![endif]-->
        <script src="js/vendor/modernizr-2.6.1.min.js"></script>
    </head>
	<body>
	<div id="container">
            <div id="home">
            <?php 
				if ($nolocations){
					echo "Op dit moment kunt u deze opleiding niet volgen";
				}
				else{
			?>
				<div id="map" style="width: 600px; height: 400px"></div>
			<?php } ?>
			</div>
	</div>
	<script src="http://cdn.leafletjs.com/leaflet-0.4/leaflet.js"></script>
	<?php echo '<script>' ?>
		var homeIcon = L.icon({
    		iconUrl: 'img/home.png',
    		iconAnchor:   [15, 36], // point of the icon which will correspond to marker's location
    		popupAnchor:  [3, -28]
		});
		var cursusIcon = L.icon({
    		iconUrl: 'img/cursus.png',
    		iconAnchor:   [15, 36], // point of the icon which will correspond to marker's location
    		popupAnchor:  [3, -28]
		});
		<!-- Center the map, by putting Brussels in the middle -->
		<?php echo "var map = L.map('map').setView([50.850339, 4.351709700000015], 7);" ?>
		L.tileLayer('http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png', {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>'
		}).addTo(map);
		<?php
			foreach ($offices as $office){
				echo "L.marker([".$office->lat.", ".$office->long."], {icon: cursusIcon}).addTo(map).bindPopup('".$office->omschrijving."<br />".$office->adres1."<br />".$office->postcode." ".$office->stad."');";
			}
		?>			
		<?php echo "L.marker([".$_SESSION['mylocationlat'].", ".$_SESSION['mylocationlong']."], {icon: homeIcon}).addTo(map).bindPopup('Thuis')"; ?>;
	<?php echo '</script>' ?>
</body>
</html>