<<?php
session_start();


try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost; dbname=musicmanager', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
	die('Erreur : '. $e->getMessage("erreur de connection"));

}

$requete = $bdd->query("SELECT Titre, Auteur FROM Album  ");

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
		<img style="width:300px;"
		src="../CSS/Logo.png">

		<ul id="ListAlbum">
			<?php
			while ($donnees = $requete->fetch())
			{
				?>
			<li id="item">
				<ul>
					<li><?php echo $donnees['Auteur']; ?></li>
					<li><?php echo $donnees['Titre']; ?></li>
					
				</ul>
				<a href="#"><img alt="Album1" src="5.jpg" /></a>
			</li>
				<?php
			}
			$requete->closeCursor();  
			?>
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
						<a href="#"><img alt="Album1" src="5.jpg" /></a></li>
						<li id="item">
							<ul>
								<li>Album</li>
								<li>Chanteur</li>
								<li>Année</li>
							</ul>
							<a href="#"><img alt="Album1" src="6.jpg" /></a>
						</li>
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
						<h1 style="color: red">MENU</h1>

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