<?php
session_start();


$Pseudo = $_SESSION['Pseudo'];

try
{
	// On se connecte à MySQL
	//$bdd = new PDO('mysql:host=localhost; dbname=musicmanagerv1', 'root', '');
	$bdd = new PDO('mysql:host=localhost; dbname=musicmanager', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
	die('Erreur : '. $e->getMessage("erreur de connection"));

}

$requete = $bdd->query("SELECT A.Nom , D.Titre
							FROM album D, interchansonchanteur I
								INNER JOIN chanteur A ON I.IdChanteur = A.IdChanteur
							        INNER JOIN chanson C ON I.IdChanson = C.IdChanson
								WHERE (C.Titre, D.Titre)  in (
									SELECT C.Titre, A.Titre
									FROM  chanson C
										INNER JOIN album A  ON C.IdAlbum = A.IdAlbum
										WHERE A.Titre IN (	
							                        	SELECT A.Titre
											FROM user U2, chanson C2
												INNER JOIN album A ON C2.IdAlbum = A.IdAlbum
												WHERE (U2.Login, C2.Titre) IN (
								                        		SELECT U.Login, C.Titre
													FROM inter_user_chanson I
														INNER JOIN user U ON I.IdUser = U.IdUser
														INNER JOIN chanson C ON I.IdChanson = C.IdChanson
															WHERE U.Login =  '$Pseudo' ) GROUP BY A.Titre)) GROUP BY D.Titre 
																Order by D.Titre DESC");

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
			<li >
				<ul id="itemAlbum">
					<li><?php echo $donnees['Nom']; ?></li>
					<li><?php echo $donnees['Titre']; ?></li>
					
				</ul>
				<?php echo "<a href='AlbumView.php?Album=".$donnees['Titre']."'>"?> <img alt="Album1" src="5.jpg" /></a>
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
				<a href="AlbumView.php?Album=Parachutes"><img alt="Album1" src="1.jpg" /></a>
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