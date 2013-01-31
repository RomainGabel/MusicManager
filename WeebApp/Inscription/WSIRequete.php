<?php
$Nom = $_POST['Nom'];
$Prenom= $_POST['Prenom'];
$Login = $_POST['Pseudo'];
$Password= $_POST['Password'];
$Email= $_POST['Email'];



try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost; dbname=musicmanager', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
	die('Erreur : '. $e->getMessage());

}
 
if ( 0/*$bdd->query("SELECT COUNT(`IDUser`) FROM `user` WHERE Mail = `$Email` Or `Nom`= `$Nom`")->fetch()*/ == 0 ) {

	$requete = $bdd->query("INSERT INTO `musicmanager`.`user` (`IDUser`, `Nom`, `Prenom`, `Login`, `Pswd`, `Mail`) VALUES (NULL, '$Nom', '$Prenom', '$Login', '$Password', '$Email')");
	$requete->closeCursor();  
	
	echo "OK";

} else {
	echo "Fail";
}


?>

<!DOCTYPE html>
<html>

<head>
	<title>Welcome to jobManager !</title>
	<LINK rel="stylesheet" type="text/css" href="../CSS/V1.css">
		<!--<meta http-equiv="refresh" content="5; URL=../index.php">-->
	</head>
	<body>

		<img style="position:absolute; left: 0px; top:0px; width:100%;"
		src="../CSS/LogWall.png" alt=""/>
		<div style="position:absolute; left:0px; top:0px; width:100%; height:100%;">


		<section id="Container">
			<h1> Envoi du formulaire </h1>
		</section>

	</body>

</html>