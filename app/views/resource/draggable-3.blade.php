<!--dynamicc_map.htm file-->
<html>
	<head>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="js/map_draggable.js"></script>
	</head>
	<body onload="initialize();">
	<form method="POST" action="post-draggable">
		Latitude, Longitude <input type="text" value="37.7699298, -122.4469157" name="txt_latlng" id="txt_latlng" style="width:480px;">
		<div id="map_canvas" style="width:600px;height:400px;border:solid black 1px;"></div>
		<input type="submit">
	</form>
	</body>
</html>