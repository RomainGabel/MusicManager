<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
	<title>MusicManager</title>
		<LINK rel="stylesheet" type="text/css" href="CSS/Content_Pres.css">
		<LINK rel="stylesheet" type="text/css" href="CSS/Menu_Top_Pres.css">
			
				<meta charset="utf-8" />
				<?php 
					if (!empty($_SESSION)){
						?>
							<meta http-equiv="refresh" content="0; URL=Nav/index.php">
						<?php
					}
				?>

</head>
	<body>
					<header>
						<?php
							if(!@include_once ('menu_top.html')){
								echo "Erreur d'inclusion du MENU_TOP";
							}
						?>
					</header>

		<div id="Content_Pres">

			<h1>Présentation</h1>
			<p>
				His cognitis Gallus ut serpens adpetitus telo vel saxo iamque spes extremas opperiens et succurrens saluti suae quavis ratione colligi omnes iussit armatos et cum starent attoniti, districta dentium acie stridens adeste inquit viri fortes mihi periclitanti vobiscum.
			</p>

<img src="CSS/Media/1.jpg">

			<h1>Inscription</h1>

			<section class="Formulaire1">
				<?php 
					if(!@include_once ('Connect/WSForm.html')){					
					}
				?>
			</section>


		</div>
	</body>
</html>













