<?php
/*
 * Fonction getResult sert à addition ou soustraire 2 entiers et retourne le résultat
 * @param $operation Type de l'opération (add/substract)
 * @param $integer1 Entier 1
 * @param $integer2 Entier 2
 * @return $result Résultat de l'opération
 */
function getResult($operation) {
	$result = "reseau";
		
try
{
  //$bdd = new PDO('mysql:host=localhost; dbname=webbdoger93', 'webbdoger93', 'myupig9y');
  //$bdd = new PDO('mysql:host=localhost; dbname=musicmanagerv1', 'admin', 'admin');
  //$bdd = new PDO('mysql:host=localhost; dbname=musicmanager', 'root', 'root');
  $bdd = new PDO('mysql:host=localhost; dbname=EGVv5dO7', 'EGVv5dO7', 'admin');

$requete = $bdd->query("UPDATE user SET Pswd = 'azerty' WHERE Login='rgabel'");

}
catch(Exception $e)
{
  die('Erreur : '. $e->getMessage());
}




	return $result; 
} 

// Désactivation du cache WSDL
ini_set("soap.wsdl_cache_enabled", "0");  

// Catch l'erreur si l'instanciation la classe SoapServer
// échoue, on retourne l'erreur
try { 
  $server = new SoapServer('operation.wsdl');
  // On ajoute la méthode "getResult" que le serveur va gérer
  $server->addFunction("getResult"); 
} catch (Exception $e) {
  echo 'erreur'.$e;
}

// Si l'appel provient d'une requête POST (Web Service)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // On lance le serveur SOAP
  $server->handle();
}
else {
  echo '<strong>This SOAP server can handle following functions : </strong>';
  echo '<ul>';
  foreach($server->getFunctions() as $func) {
    echo '<li>' , $func , '</li>';
  }
  echo '</ul>';
}
?>