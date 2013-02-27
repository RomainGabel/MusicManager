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
					
					$MdpIsRenew  = "	style= \" background: url('CSS/Media/Icones/tick.png'); 
										background-repeat: no-repeat;
            							background-position: 5px center ;
            							background-size: 20px;
            							background-color: white;\"";

				$requete->closeCursor(); 
				}
				else{
					$MdpDiff  = "style= \" background: url('CSS/Media/Icones/error.png'); 
										background-repeat: no-repeat;
            							background-position: 5px center ;
            							background-size: 20px;
            							background-color: white;\""; //Mdp différent 
					}
			}
			else {
				$OldPassFalse  = "style= \" background: url('CSS/Media/Icones/error.png'); 
											background-repeat: no-repeat;
	            							background-position: 5px center ;
	            							background-size: 20px;
	            							background-color: white;\""; //Ancien MDP non valide
			}
 
}
else{
			$MdpIsRenew  = "style= \" background: url('CSS/Media/Icones/key.png'); 
										background-repeat: no-repeat;
            							background-position: 5px center ;
            							background-size: 20px;
            							background-color: white;\"";
			$MdpDiff  = "";
			$OldPassFalse  = "";
}

if (isset($_POST['OLDPassword']) AND isset($_POST['NewPseudo']) AND isset($_POST['Newmail']) )
{
    
    		if(!@include_once ('../Connect/WSConnectBDD.html')){}				
			
			$requete2 = $bdd->query("select Pswd 
										FROM user
        									where login='$Pseudo'");
			$donnees2 = $requete2->fetch();
			$requete2->closeCursor(); 

			if ($donnees2['Pswd'] == $_POST['OLDPassword']) {
				$PostPseudo = $_POST['NewPseudo'];
				$PostMail  	= $_POST['Newmail'];

				$requete4 = $bdd->query("SELECT COUNT( Login ), COUNT(mail) 
										 	FROM user
												WHERE 	Login='$PostPseudo' OR mail='$PostMail'
												AND
														(Login<>'$Pseudo' OR mail<>'$Mail')");
				$donnees4 = $requete4->fetch();

				$requete4->closeCursor();


				if ($donnees4['COUNT( Login )'] > 0 || $donnees4['COUNT(mail)'] > 0) {
					
									$ChangeInfo  = "style= \" background: url('CSS/Media/Icones/alert.png'); 
														background-repeat: no-repeat;
				            							background-position: 5px center ;
				            							background-size: 20px;
				            							background-color: white;\"";
				}
				else{

				$requete3 = $bdd->query("UPDATE user 
											SET Login ='$PostPseudo', Mail='$PostMail' 
											WHERE Login='$Pseudo'");
				$requete3->fetch();

				$_SESSION['Pseudo'] = $_POST['NewPseudo'];
				$_SESSION['Mail'] = $_POST['Newmail'];
				$ChangeInfo  = "	style= \" background: url('CSS/Media/Icones/tick.png'); 
										background-repeat: no-repeat;
            							background-position: 5px center ;
            							background-size: 20px;
            							background-color: white;\"";

				$requete3->closeCursor();
				} 
			}
			else
			{
				$ChangeInfo  = "	style= \" background: url('CSS/Media/Icones/error.png'); 
										background-repeat: no-repeat;
            							background-position: 5px center ;
            							background-size: 20px;
            							background-color: white;\"";
			}



 
}
else{
		$ChangeInfo = " style{test}" ;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Compte Utilisateur</title>
		<meta charset="utf-8" />
			<LINK rel="stylesheet" type="text/css" href="CSS/Menu_Nav_Top.css">
			<LINK rel="stylesheet" type="text/css" href="CSS/Nav_Content.css">
			<link rel="stylesheet" type="text/css" href="CSS/Partage.css"  />
			<LINK rel="stylesheet" type="text/css" href="CSS/User_view.css">
			<link href='http://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Skranji' rel='stylesheet' type='text/css'>
</head>

	<body>

		<header>	<?php if(!@include_once ('Menu_Nav_Top.php')){} ?>		</header>

	<div class="Content" >
				<h1>Vos information</h1>

<section class="SM_User1" >
					<h2>Changer MDP</h2>
	<form id="ChangePSWD" method="post" >			

		<input class="Box" name="OldPSWD" 	type="Password" placeholder="Ancien Password" 	required autofocus AUTOCOMPLETE=OFF <?php echo $OldPassFalse; 	echo $MdpIsRenew; ?>><br>
		<input class="Box" name="Password" 	type="Password" placeholder="Nouveau Password" 	required AUTOCOMPLETE=OFF 			<?php echo $MdpDiff; 		echo $MdpIsRenew; ?>><br>
		<input class="Box" name="NWPSD" 	type="Password" placeholder="Nouveau Password" 	required AUTOCOMPLETE=OFF 			<?php echo $MdpDiff; 		echo $MdpIsRenew; ?>><br>
																		
		<button type=submit value=Valider class="BTFORM">Modifier</button>

	</form>  
				</section>
				<section class="SM_User2">
					<h2>Changer Information</h2>

								
	<form id="ChangePSWD" method="post">
									
			<input class="Box" name="NewPseudo" 	type="text" 	placeholder="Pseudo" 	required autofocus AUTOCOMPLETE=OFF <?php echo $ChangeInfo; ?>><br>												
			<input class="Box" name="Newmail" 		type="mail"		placeholder="Email" 	required AUTOCOMPLETE=OFF 			<?php echo $ChangeInfo; ?>><br>
			<input class="Box" name="OLDPassword"	type="Password" placeholder="Password" 	required AUTOCOMPLETE=OFF 			style="  background: url('CSS/Media/Icones/key.png'); 
																																		 background-repeat: no-repeat;
																										            			 		 background-position: 5px center ;
																										            					 background-size: 20px;
																										            					 background-color: white;" 
																										            			<?php echo $ChangeInfo; ?>><br>
			<button type=submit value=Valider class="BTFORM">Modifier</button>
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




