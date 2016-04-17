<?php
require_once("inc/GeoIP/geoip.inc");
require_once('inc/confs.php');
require_once('inc/funcs.php');
?>
<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Ceci est mon royaume</title>
		<style type="text/css">
			body {
				background-image:url(img/temari.jpg);
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-position: left bottom;
				background-color: #FFF;
			}
		</style>
	</head>
	<body>
		<!--
		Quand a toi, petit curieux, sache que Temari est mienne.
		Que tu sois maudit sur 50 generations si tu oses essayer de la toucher.
		-->
    <p>Welcome.</p>
		
	<?php if(isset($_POST['submit'])) reloadIpList(); ?>

	<form role="form" method="POST">
		<button type="submit" name="submit">Feel free to ban yourself !</button>
	</form>
	
	</body>
</html>