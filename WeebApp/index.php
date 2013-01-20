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
		<?php
		if(!@include_once ('CSS/include/Wall.html')){
			echo "Erreur d'inclusion de fond d'écran";
		}
		?>


		<?	include 'WeebSiteMenu.php' ?>


		<section id="Container">

			<img style="margin-left: 30px; left: 0px; top:0px; width:400px;"
			src="CSS/Logo.png">


			<fieldset>
				<legend>Connexion </legend>
				<?php 
				if (empty($_SESSION)){
					?>
					<form name="Connect" id="InscriptionUser" method="post" action="Connexion/WSConnexion.php">

						<input style="left: 0px; top:0px; width:200px;" id="Pseudo" name="Pseudo" type="text" placeholder="Login"  autofocus onblur="verifLenght1(this)">
						<input style="left: 0px; top:0px; width:200px;" id="Password" name="Password" type="Password" placeholder="Password" onblur="verifLenght1(this)">

						<div class="DbBouton"> 
							<button  type=button class="BTLOG" onClick="if(verificationform1())document.Connect.submit()"> </button> 
							<a href="../Inscription/WSInscription.php" ><button  type=button class="BTINSCR"> </button></a>
						</div>

					</form>
					<?php
				}
				else{
					?>

					<p> 
						<?php echo $_SESSION['Pseudo'] ?> est connecte
						<a href="Connexion/WSDeconexion.php">Deconnexion</a>
					</p>
					<?php
				}
				?>



			</fieldset>
		</section>

	</body>

	</html>

		<?php
		if(!@include_once ('SCRIPT/VerificationFormulaire.html')){
			echo "Erreur d'inclusion de fond d'écran";
		}
		?>
	














