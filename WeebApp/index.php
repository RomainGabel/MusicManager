<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
	<title>MusicManager</title>
	<LINK rel="stylesheet" type="text/css" href="CSS/V1.css">
	</head>

	<body>
		<img style="position:absolute; left: 0px; top:0px; width:100%;"
		src="CSS/LogWall.png" alt=""/>
		<div style="position:absolute; left:0px; top:0px; width:100%; height:100%;">


			<?	include 'WeebSiteMenu.php' ?>


			<section id="Container">

				<img style="margin-left: 30px; left: 0px; top:0px; width:400px;"
				src="CSS/Logo.png">

				
				<fieldset>
					<legend>Connexion </legend>
					<?php 
					if (empty($_SESSION)){
						?>
						<form id="InscriptionUser" method="post" action="Connexion/WSConnexion.php">
							
							<input style="left: 0px; top:0px; width:200px;" id="Pseudo" name="Pseudo" type="text" placeholder="Login" required autofocus>
							<input style="left: 0px; top:0px; width:200px;" id="Password" name="Password" type="Password" placeholder="Password" required>
							
							<button  type=submit class="BTLOG"> </button>

						</form>
						<?php
					}
					else{
						
						echo $_SESSION['Pseudo'] . " est connecter";
						?>

						<a href="Connexion/WSDeconexion.php">Deconnexion</a>

						<?php
					}
					?>



				</fieldset>
			</section>

		</body>

		</html>