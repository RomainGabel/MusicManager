<?php
session_start();

$_SESSION['Pseudo'] ='';


$Pseudo = $_POST['Pseudo'];
$Password= $_POST['Password'];



try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost; dbname=musicmanagerv1', 'root', '');
	//$bdd = new PDO('mysql:host=localhost; dbname=musicmanager', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
	die('Erreur : '. $e->getMessage());

}

$requete = $bdd->query("SELECT Login FROM user WHERE Login = '$Pseudo' AND Pswd= '$Password' ");
$test = $requete->fetch();
$requete->closeCursor();  


 // Test si l'utilisateur et mdp correspond.
if ( $test['Login'] == '') {

	session_destroy();

} else {
	$_SESSION['Pseudo'] =  $test['Login'];
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Welcome to jobManager !</title>
	<LINK rel="stylesheet" type="text/css" href="../CSS/V1.css">
		<meta http-equiv="refresh" content="5; URL=../Navigation/index.php">
	</head>
	<body>

		<section id="Container">
			<fieldset>
				<?php
				if ($_SESSION['Pseudo'] == '') {
					?>


					<legend>Echec de la connexion </legend>

					<p>Vous semblez ne pas posséder de compte enregistrer sur notre WebApp. <br>
						Vous Pouvez très simplement en crée un en cliquant sur le lien si dessous<br>
						<a href="../Inscription/WSInscription.php">inscription</a></p>
						<?php
					}
					else {
						?>

						<legend>Welcome Back</legend>


						<p>Redirection</p><progress id="prog" max=50 >

							<?php
						}

						?>


					</fieldset>
				</section>

			</body>

			</html>