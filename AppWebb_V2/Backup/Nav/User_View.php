<?php
session_start();

$Pseudo = $_SESSION['Pseudo'] ;
$Nom = $_SESSION['Nom'];
$Prenom = $_SESSION['Prenom'];
$Mail = $_SESSION['Mail'];

if (isset($_POST['OldPSWD']) AND isset($_POST['Password']) AND isset($_POST['NWPSD']) )
{
    
    
    		if(!@include_once ('../Connect/WSConnectBDD.html')){}				
			
			$requete = $bdd->query("select Pswd 
										FROM user
        									where login='$Pseudo'");
			$donnees = $requete->fetch();
			$requete->closeCursor(); 


			$MdpIsRenew  = "";
			$MdpDiff ="";

			if ($donnees['Pswd'] == $_POST['OldPSWD']) {

				$OldPassFalse  = ""; //Ancien MDP non valide

				if ($_POST['Password'] == $_POST['NWPSD']) {
					$NewPWD = $_POST['NWPSD'];
					$MdpDiff  = "";
				$requete = $bdd->query("UPDATE user
											SET Pswd = '$NewPWD'
												WHERE login='$Pseudo'");
					$MdpIsRenew  = "style= \"background-color: #B0CC99;\"";

				$requete->closeCursor(); 
				}
				else{
					$MdpDiff  = "style= \"background-color: #FFB6B8;\""; //Mdp différent 
					}
			}
			else {
				$OldPassFalse  = "style= \"background-color: #FFB6B8;\""; //Ancien MDP non valide
			}
 
}
else{
			$MdpIsRenew  = "";
			$MdpDiff  = "";
			$OldPassFalse  = "";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Compte Utilisateur</title>
		<meta charset="utf-8" />
	<LINK rel="stylesheet" type="text/css" href="CSS/Menu_Nav_Top.css">
	<LINK rel="stylesheet" type="text/css" href="CSS/Nav_Content.css">
	<LINK rel="stylesheet" type="text/css" href="CSS/User_view.css">
	<link href='http://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Skranji' rel='stylesheet' type='text/css'>
	</head>

	<body>

		<header>

				<?php 
					if(!@include_once ('Menu_Nav_Top.php')){
						
					}
				?>


		</header>

	<div class="Content" >
				<h1>Vos information</h1>

				<section class="SM_User1" <?php echo $MdpIsRenew; ?>>
					<h2>Changer MDP</h2>
	<form id="ChangePSWD" method="post" >			

		<input class="Box" name="OldPSWD" type="Password" placeholder="Ancien Password" required autofocus <?php echo $OldPassFalse; ?> ><br>
		<input class="Box" name="Password" type="Password" placeholder="Nouveau Password" required <?php echo $MdpDiff; ?>><br>
		<input class="Box" name="NWPSD" type="Password" placeholder="Nouveau Password" required <?php echo $MdpDiff; ?>><br>
																		
		<button type=submit value=Valider class="BTFORM">Modifier</button>

	</form>  
				</section>
				<section class="SM_User2">
					<h2>Changer Information</h2>

								
	<form id="ChangePSWD" method="post" action=".php">
								
		<input class="Box" name="Pseudo" type="text" placeholder="Pseudo" required autofocus><br>												
		<input class="Box"  name="mail" type="mail" placeholder="Email" required><br>
		<input class="Box" name="Password" type="Password" placeholder="Password" required ><br>
																					

	<button type=submit value=Valider class="BTFORM">Modifier</button>
</form>  


</form>  
				</section>
				<section class="SM_User3">
					<h2>Statistique</h2>
				</section>
				<section class="SM_User4">
					<h2>Option</h2>
				</section>

	</div>


	</body>

	</html>




