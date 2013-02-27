<?php
session_start();

$Album = $_GET['Album'];

$Pseudo = $_SESSION['Pseudo'];

try
{
	//On se connecte à MySQL
	//$bdd = new PDO('mysql:host=localhost; dbname=musicmanagerv1', 'root', '');
	$bdd = new PDO('mysql:host=localhost; dbname=musicmanager', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
	die('Erreur : '. $e->getMessage("erreur de connection"));

}

$requete = $bdd->query("SELECT C.Titre 
							FROM chanson C
			        			INNER JOIN album A ON C.IdAlbum = A.IdAlbum
					               	WHERE A.Titre = '$Album'");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Titre</title>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<div id="Content">
			<ul id="AlbumView">
				<li id="item">
					<ul >
						<li style="	font-size: 3em;"><?php echo $Album; ?></li>
						<?php 
							$i = 1 ;
							while (	$donnees = $requete->fetch()) {
								?>
									<li style="	font-size: 1.3em;"><?echo $i.'. '.$donnees['Titre'] ;?></li>
								<?php
								$i +=1;
							}

						?>
					</ul>
					<img alt="Album1" src="1.jpg" />
				</li>
			</ul>

		<ul id="ListAlbum">
			<li id="item">
				<ul>
					<li>Album</li>
					<li>Chanteur</li>
					<li>Année</li>
				</ul>
				<a href="#"><img alt="Album1" src="1.jpg" /></a>
			</li>
			<li id="item">
				<ul>
					<li>Album</li>
					<li>Chanteur</li>
					<li>Année</li>
				</ul>
				<a href="#"><img alt="Album1" src="2.jpg" /></a>
			</li>
			<li id="item">
				<ul>
					<li>Album</li>
					<li>Chanteur</li>
					<li>Année</li>
				</ul>
				<a href="#"><img alt="Album1" src="3.jpg" /></a></li>
				<li id="item">
					<ul>
						<li>Album</li>
						<li>Chanteur</li>
						<li>Année</li>
					</ul>
					<a href="#"><img alt="Album1" src="4.jpg" /></a></li>
						<li id="item">
							<ul>
								<li>Album</li>
								<li>Chanteur</li>
								<li>Année</li>
							</ul>
							<a href="#"><img alt="Album1" src="7.jpg" /></a>
						</li>


					</ul>




		<div id="Menu">
			<h1 style="color: red"><?php echo $Pseudo ?></h1>

			<ul id="ListMenu">
				<li><img src="CPBT.png" style="width:0.6em;position:relative; left: 0px; bottom:0px;"> Compte</li>
				<li><img src="MBT.png" style="width:0.6em;position:relative; left: 0px; bottom:0px;"> <a href="index.php">Musique</a></li>
				<li><img src="PLBT.png" style="width:0.6em;position:relative; left: 0px; bottom:0px;"> Playlist</li>
				<li><img src="CBT.png" style="width:0.6em;position:relative; left: 0px; bottom:0px;"> <a href="../Connexion/WSDeconexion.php">Logout</a></li>
			</ul>

		</div>

	</div>

</body>
</html>