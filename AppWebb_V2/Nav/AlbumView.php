<?php
session_start();


$Album = $_GET['Album'];
$Artiste = $_GET['Artiste'];

$Pseudo = $_SESSION['Pseudo'] ;
$Nom = $_SESSION['Nom'];
$Prenom = $_SESSION['Prenom'];
$Mail = $_SESSION['Mail'];

		if(!@include_once ('../Connect/WSConnectBDD.html')){
						
		}	

$requete = $bdd->query("SELECT U.Login, C.Titre
	FROM inter_user_chanson I
		INNER JOIN user U ON I.IdUser = U.IdUser
		INNER JOIN chanson C ON I.IdChanson = C.IdChanson
			WHERE C.Titre IN (
SELECT C.Titre 
	FROM inter_chanson_album I
		INNER JOIN album A ON I.IdAlbum = A.IdAlbum
	    INNER JOIN chanson C ON I.IdChanson = C.IdChanson
			WHERE A.Titre = '$Album' ) 
				AND U.Login = '$Pseudo'" );

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Titre</title>
			<meta charset="utf-8" />
	<LINK rel="stylesheet" type="text/css" href="CSS/Menu_Nav_Top.css">
	<LINK rel="stylesheet" type="text/css" href="CSS/Nav_Content.css">
			<link rel="stylesheet" href="CSS/Partage.css" type="text/css" />
		<LINK rel="stylesheet" type="text/css" href="CSS/Nav_Content_Album.css">
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
				<h1>Albums de <?php echo $Artiste; ?>: </h1>

		<ul id="AlbumView">
			<li id="itemAlbumView" style="margin-left: 5%;">
				<ul style="width: 290px;">
					<li style="	font-size: 3em;"><?php echo $Album ;?></li>
					<?php 
					$i = 1 ;
					while (	$donnees = $requete->fetch() ) {
						?>
						<li style="	font-size: 1.3em;"><?php echo $i.'. '.$donnees['Titre'] ;?></li>
						<?php
						$i +=1;
					}
					$requete->closeCursor();

					$requete = $bdd->query("	SELECT  D.Nom, A.Titre
	FROM chanteur D, inter_chanson_album I
		INNER JOIN album A ON I.IdAlbum = A.IdAlbum
	    INNER JOIN chanson C ON I.IdChanson = C.IdChanson
			WHERE (C.Titre, D.Nom) IN (	
				SELECT C.Titre, B.NOM
					FROM interchansonchanteur I
						INNER JOIN chanteur B ON I.IdChanteur = B.IdChanteur
			        	INNER JOIN chanson C ON I.IdChanson = C.IdChanson
		                   WHERE B.Nom LIKE '$Artiste') GROUP BY A.Titre ");


					?>
				</ul>
				<img alt="Album1" src="CSS/Media/Pochette/<?php echo $Artiste."_".$Album.".jpg"; ?>" />
			</li>
		</ul>

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

</html>