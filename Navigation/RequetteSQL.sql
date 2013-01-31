/* Selection des Chanson d'un artiste particulier :*/
	SELECT C.Titre
		FROM interchansonchanteur I
			INNER JOIN Chanteur A ON I.IdChanteur = A.IdChanteur
        	INNER JOIN Chanson C ON I.IdChanson = C.IdChanson
				WHERE A.Nom LIKE 'Shakira'
					LIMIT 0 , 30
/* Select l'artiste qui chante la chanson */

	SELECT A.Nom , C.Titre 
		FROM interchansonchanteur I
			INNER JOIN Chanteur A ON I.IdChanteur = A.IdChanteur
	        INNER JOIN Chanson C ON I.IdChanson = C.IdChanson
				WHERE C.Titre LIKE '%Panic%'

/* La chanson appartient à cette album : */

	SELECT A.Titre, C.Titre
		FROM Chanson C
			INNER JOIN Album A ON C.IdAlbum = A.IdAlbum
				WHERE C.Titre LIKE '%Panic%'

/* Tous les Albums de Chanteur :*/
	
	SELECT  D.Nom, A.Titre, C.Titre
		FROM Chanteur D, Chanson C
			INNER JOIN Album A ON C.IdAlbum = A.IdAlbum
				WHERE (C.Titre, D.Nom) IN (	
					SELECT C.Titre, B.NOM
						FROM interchansonchanteur I
							INNER JOIN Chanteur B ON I.IdChanteur = B.IdChanteur
				        		INNER JOIN Chanson C ON I.IdChanson = C.IdChanson
                                                        	WHERE B.Nom LIKE 'Coldplay') 

/* Select Chanteur et Album d'une chanson */
	SELECT A.Titre, C.Titre , B.Nom
		FROM Chanson C
			INNER JOIN Album A ON C.IdAlbum = A.IdAlbum , 
			interchansonchanteur I
			INNER JOIN Chanteur B ON I.IdChanteur = B.IdChanteur
	       		INNER JOIN Chanson  ON I.IdChanson = Chanson.IdChanson
				WHERE (C.Titre AND Chanson.Titre) LIKE '%Panic%'
                                
/* Qui chante dans cette album */

	SELECT A.Nom , C.Titre 
		FROM interchansonchanteur I
			INNER JOIN Chanteur A ON I.IdChanteur = A.IdChanteur
	        INNER JOIN Chanson C ON I.IdChanson = C.IdChanson
				WHERE C.Titre LIKE (
					SELECT C.Titre 
						FROM Chanson C
					        	INNER JOIN Album A ON C.IdAlbum = A.IdAlbum
					                	WHERE A.Titre = 'Parachutes'
					                        	LIMIT 0,1)

/* Quelle chanson posséde UTILISATEUR */

	SELECT U.Login, C.Titre
		FROM inter_user_chanson I
			INNER JOIN User U ON I.IdUser = U.IdUser
				INNER JOIN Chanson C ON I.IdChanson = C.IdChanson
					WHERE U.Login =  'rgabel'


/* Quel album posséde l'utilisateur */
	SELECT U2.Login, A.Titre
		FROM User U2, Chanson C2
			INNER JOIN Album A ON C2.IdAlbum = A.IdAlbum
				WHERE (U2.Login, C2.Titre) IN (
	                        	SELECT U.Login, C.Titre
						FROM inter_user_chanson I
						INNER JOIN User U ON I.IdUser = U.IdUser
						INNER JOIN Chanson C ON I.IdChanson = C.IdChanson
							WHERE U.Login =  'vnicolas' ) GROUP BY A.Titre

/* Clef etrangère : exemple */

ALTER TABLE Inter_user_chanson 
	ADD CONSTRAINT fk_chanson_idchanson
		FOREIGN KEY (IdChanson) 
			REFERENCES Chanson(IdChanson)

	
/* Select tout les album et artiste d'un utilisateur */
SELECT A.Nom , C.Titre , D.Titre
FROM Album D, interchansonchanteur I
	INNER JOIN Chanteur A ON I.IdChanteur = A.IdChanteur
        INNER JOIN Chanson C ON I.IdChanson = C.IdChanson
	WHERE (C.Titre, D.Titre)  in (
		SELECT C.Titre, A.Titre
		FROM  Chanson C
			INNER JOIN Album A  ON C.IdAlbum = A.IdAlbum
			WHERE A.Titre IN (	
                        	SELECT A.Titre
				FROM User U2, Chanson C2
					INNER JOIN Album A ON C2.IdAlbum = A.IdAlbum
					WHERE (U2.Login, C2.Titre) IN (
	                        		SELECT U.Login, C.Titre
						FROM inter_user_chanson I
							INNER JOIN User U ON I.IdUser = U.IdUser
							INNER JOIN Chanson C ON I.IdChanson = C.IdChanson
								WHERE U.Login =  'rgabel' ) GROUP BY A.Titre) )


















