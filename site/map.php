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
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4/leaflet.css" />
	 <!--[if lte IE 8]>
     <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4/leaflet.ie.css" />
     <![endif]-->
        <script src="js/vendor/modernizr-2.6.1.min.js"></script>
    </head>
	<body>
	<div id="container">
            <div id="home">
				<div id="map" style="width: 600px; height: 400px"></div>
			</div>
	</div>
	<script src="http://cdn.leafletjs.com/leaflet-0.4/leaflet.js"></script>
	<?php echo '<script>' ?>
		<?php echo "var map = L.map('map').setView([50.850339, 4.351709700000015], 7);" ?>
		L.tileLayer('http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png', {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>'
		}).addTo(map);
		
		<?php echo "L.marker([50.9819,4.8234]).addTo(map)"; ?>
			.bindPopup("EURES AARSCHOT").openPopup();
		<?php echo "L.marker([50.9754,5.041652]).addTo(map)"; ?>
			.bindPopup("VDAB DIEST").openPopup();
		<?php echo "L.marker([51.063584, 3.734345]).addTo(map)"; ?>
			.bindPopup("VDAB STAPELPLEIN").openPopup();
		<?php echo "L.marker([".$_SESSION['mylocationlat'].", ".$_SESSION['mylocationlong']."]).addTo(map)"; ?>
			.bindPopup("Woonplaats").openPopup();
	<?php echo '</script>' ?>
</body>
</html>
