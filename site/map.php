<?php include_once('header.tpl'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Knelkiezer</title>
	<meta charset="utf-8" />

	 <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4/leaflet.css" />
	 <!--[if lte IE 8]>
     <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4/leaflet.ie.css" />
     <![endif]-->
</head>
<body>
	<div id="map" style="width: 600px; height: 400px"></div>
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
