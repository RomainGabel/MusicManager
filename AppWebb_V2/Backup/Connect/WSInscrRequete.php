<?php
$Nom = $_POST['Nom'];
$Prenom= $_POST['Prenom'];
$Login = $_POST['Pseudo'];
$Password= $_POST['Password'];
$Email= $_POST['Email'];



				
					if(!@include_once ('WSConnectBDD.html')){
						
					}
				

		$requete = $bdd->query("INSERT INTO `user` (`IDUser`, `Nom`, `Prenom`, `Login`, `Pswd`, `Mail`) 
 								VALUES (NULL, '$Nom', '$Prenom', '$Login', '$Password', '$Email')");

?>

<!DOCTYPE html>
<html>

<head>
	<title>Welcome to jobManager !</title>
	<LINK rel="stylesheet" type="text/css" href="CSS/Content_Connect.css">
						<meta charset="utf-8" />
		<meta http-equiv="refresh" content="4; URL=WSConnexion.php">
	</head>
	<body>

		<div id="Content_Connect2">
			<?php

					if ($requete == FALSE) {
						?>
							<h1>Erreur lors de l'envoie du formulaire</h1>
							<?php		
					
									$requete = $bdd->query("SELECT COUNT(IDUser) FROM user WHERE Nom ='$Nom' OR Mail='$Email' ");
									$test = $requete->fetch();
									$requete->closeCursor(); 

									if (!$test==NULL) {
									 	
										?>
										<p style='margin-left: 15%; margin-top: 5%;'> Il existe déjà un utilisateur nommé <span class="Underline"> <?php echo $Login ;?> </span>, où possédant l'adresse mail <span class="Underline"><?php echo $Email ;?></span><br>
											Vous allez être redirigé d'ici quelques secondes :
																	<section class="Timer">
																		<section class="Timer1">
																		</section>
																	</section>
										</p>
										<?php

									 } 
					}
				else {
						
						$requete->closeCursor();
						?>
						<h1> Envoi du formulaire </h1>
						<section class="Timer">
							<section class="Timer1">
							</section>
						</section>
					<?php
					}
						
			?>




		</div>
	</body>
</html>