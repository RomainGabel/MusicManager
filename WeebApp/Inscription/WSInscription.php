<!DOCTYPE html>
<html>

<head>
	<title>Inscription test</title>
	<LINK rel="stylesheet" type="text/css" href="../CSS/V1.css">
	</head>
	
	<body>

     
		<img style="position:absolute; left: 0px; top:0px; width:100%;"
		src="../CSS/LogoWall.png" alt=""/>
		<div style="position:absolute; left:0px; top:0px; width:100%; height:100%;">


		<section id="Container">
			<a href="../"><img style="margin-left: 30px; left: 0px; top:0px; width:400px;"
			src="../CSS/Logo.png" ></a>
			
			<?php

				if(!@include_once ('WSIFormulaire.php')){
					echo "NO";
				}
			
			?>

		</section>

	</body>

</html>