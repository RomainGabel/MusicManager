<?php
session_start();

$_SESSION['Pseudo'] ='';
$_SESSION['Nom'] =  '';
$_SESSION['Prenom'] =  '';
$_SESSION['Mail'] = '';


$Pseudo = $_POST['Pseudo'];
$Password= $_POST['Password'];
		if(!@include_once ('WSConnectBDD.html')){
				echo "Inclusion de WSConnectBDD.html";
		}	
									
try {
	$requete = $bdd->query("SELECT Login, Nom, Prenom, Mail FROM user WHERE Login = '$Pseudo' AND Pswd= '$Password' ");
	$test = $requete->fetch();
	$requete->closeCursor(); 
} catch (Exception $e) {
		echo "Erreur de requette";
}
 


 // Test si l'utilisateur et mdp correspond.
if ( $test['Login'] == '') {

	session_destroy();

} else {
	$_SESSION['Pseudo'] =  $test['Login'];
	$_SESSION['Nom'] =  $test['Nom'];
	$_SESSION['Prenom'] =  $test['Prenom'];
	$_SESSION['Mail'] =  $test['Mail'];
}
?>


<!DOCTYPE html>

<html>

<head>
	<title>Welcome to jobManager !</title>
	<LINK rel="stylesheet" type="text/css" href="CSS/Content_Connect.css">
			<LINK rel="stylesheet" type="text/css" href="CSS/Form_Connect.css">
				<meta charset="utf-8" /> 
		<?php
		if (!$_SESSION['Pseudo'] == '') {
			?>
			<meta http-equiv="refresh" content="3; URL=../Nav/">
			<?php
		}
		?>
	</head>
	<body>

		
		<?php
		if ($_SESSION['Pseudo'] == '') {
			?>
			<div id="Content_Connect">

				<section class="Etat_Connect">
					<h1>Compte Inexistant</h1>

					<p>
						Bienvenue sur Music-Manager, Vos identifiant ne semble pas être correct. Deux choix sobre à vous !!<br>
						<span style="margin-left: 30px;">1. Vous n'étes pas encore inscrit mais vous souhaiter absolument utiliser notre service ? <br>
							<span style="margin-left: 30px;"><span style="margin-left: 30px;">Le premier onglet est pour vous !! <br>
								<span style="margin-left: 30px;">2. Si Vous vous êtes trompé d'identifiant. <br>
									<span style="margin-left: 30px;"><span style="margin-left: 30px;">Regarder le deuxième onglet. <br>
									</p>
								</section>
							</div>
							<section class="Etat1">
								<section class="Etat1_1">
									<div id="Menu_top" >
										<div id="Menu_top_1">
											

											<form name="Connect" id="InscriptionUser" method="post" action="WSConnexion.php">
												<input class="Box" style="left: 50%; top:0px; " name="Pseudo" type="text" placeholder="Pseudo"  autofocus onblur="verifLenght1(this)" required><br>
												<input class="Box" style="left: 50%; top:0px; " name="Password" type="Password" placeholder="Password" onblur="verifLenght1(this)" required><br>
												<button  type=submit value="valider" class="BTFORM"> se connecter </button> 
											</form>
										

										</div>

									</div>

								</section>
								<section class="Etat1_2"><p>Connexion</p></section>
							</section>
							<section class="Etat2">
								<section class="Etat1_1">
								<?php // MENU de NAV
									if(!@include_once ('WSForm.html')){
						
									}
								?>

								</section>
								<section class="Etat2_2"><p>Inscription</p></section>
							</section>


						</section>
						<?php
					}
					else {
						?>
<div id="Content_Connect2">
				
				<section class="Etat_Connect">
						<p>
							Bonjour, <br>
							Vous étes maintenant connecté en tant que <?php echo $_SESSION['Mail'];?> et aller être rediriger vers votre liste d'album d'ici quelque seconde.
						</p>
						<section class="Timer">
							<section class="Timer1">
							</section>
						</section>

						<?php
					}
					?>
				</section>
			</div>

		</body>
		</html>