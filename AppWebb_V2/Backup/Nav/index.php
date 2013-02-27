<?php
session_start();

$Pseudo = $_SESSION['Pseudo'] ;
$Nom = $_SESSION['Nom'];
$Prenom = $_SESSION['Prenom'];
$Mail = $_SESSION['Mail'];


		if(!@include_once ('../Connect/WSConnectBDD.html')){
						
		}	

$requete = $bdd->query("SELECT A.Nom , D.Titre
	FROM album D, interchansonchanteur I
		INNER JOIN chanteur A ON I.IdChanteur = A.IdChanteur
		INNER JOIN chanson C ON I.IdChanson = C.IdChanson
			WHERE (C.Titre, D.Titre)  in (
				SELECT C.Titre, A.Titre
					FROM   inter_chanson_album I
						INNER JOIN album A ON I.IdAlbum = A.IdAlbum
						INNER JOIN chanson C ON I.IdChanson = C.IdChanson
							WHERE A.Titre IN (	
SELECT A.Titre
	FROM user U2,  inter_chanson_album I
		INNER JOIN album A ON I.IdAlbum = A.IdAlbum
	    INNER JOIN chanson C ON I.IdChanson = C.IdChanson
			WHERE (U2.Login, C.Titre) IN (
SELECT U.Login, C.Titre
	FROM inter_user_chanson I
		INNER JOIN user U ON I.IdUser = U.IdUser
		INNER JOIN chanson C ON I.IdChanson = C.IdChanson
			WHERE U.Login =  '$Pseudo' ) GROUP BY A.Titre)) 
				GROUP BY D.Titre 
				ORDER BY D.Titre DESC");


?>

<!DOCTYPE html>
<html>
<head>
	<title>Title of the document</title>
		<meta charset="utf-8" />
	<LINK rel="stylesheet" type="text/css" href="CSS/Menu_Nav_Top.css">
	<LINK rel="stylesheet" type="text/css" href="CSS/Nav_Content.css">
		<link href='http://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Skranji' rel='stylesheet' type='text/css'>
	</head>

	<body>

		<header>

				<?php // MENU de NAV
					if(!@include_once ('Menu_Nav_Top.php')){
						
					}
				?>


		</header>

	<div class="Content">
				<h1>Mes Albums: </h1>

			<ul id="ListAlbum">
				<?php
			while ($donnees = $requete->fetch())
			{
				?>
			<li >
				<ul id="itemAlbum">
					<li style="	font-size: 1.2em;"><?php echo $donnees['Nom']; ?></li>
					<li style="	font-size: 1.6em;"><?php echo $donnees['Titre']; ?></li>
					
				</ul>
				<?php echo "<a href='AlbumView.php?Album=".$donnees['Titre']."&Artiste=".$donnees['Nom']."'>"?> <img alt="Album1" src="CSS/Media/Pochette/<?php echo $donnees['Nom']."_".$donnees['Titre'].".jpg"; ?>" /></a>
			</li>
				<?php
			}
			$requete->closeCursor();  

			?>
		

			</ul>
	</div>


</body>
</html>




