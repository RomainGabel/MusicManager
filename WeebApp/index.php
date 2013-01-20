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

						<input style="left: 0px; top:0px; width:200px;" id="Pseudo" name="Pseudo" type="text" placeholder="Login"  autofocus onblur="verifPseudo(this)">
						<input style="left: 0px; top:0px; width:200px;" id="Password" name="Password" type="Password" placeholder="Password" onblur="verifPseudo(this)">

						<div class="DbBouton"> 
							<button  type=button class="BTLOG" onClick="if(verification())document.Connect.submit()"> </button> 
							<a href="../Inscription/WSInscription.php"><button  type=button class="BTINSCR"> </button></a>
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


	<script type="text/javascript">

	function verification()
	{
		var myVar = document.forms["Connect"].elements["Pseudo"].value;		
		if(myVar.length == 0){
			surligne(document.forms["Connect"].elements["Pseudo"], true);
			surligne(document.forms["Connect"].elements["Password"], true);
			return false;
		}
				
		else
			return true;
	}

	function surligne(champ, erreur)
	{
		if(erreur)
			champ.style.backgroundColor = "#fba";
		else
			champ.style.backgroundColor = "";
	}

	function verifPseudo(champ)
	{
		if(champ.value.length < 4 || champ.value.length > 10)
		{
			surligne(champ, true);
			return false;
		}
		else
		{
			surligne(champ, false);
			return true;
		}
	}

	</script>















