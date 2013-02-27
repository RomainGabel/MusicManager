<?php
	// Désactivation du cache WSDL
	ini_set("soap.wsdl_cache_enabled", "0");  

  $client = new SoapClient("operation.wsdl"); 
  try { 
  	$requetteSQL = "UPDATE user
                      SET Login = 'apeeters'
                        WHERE Login='gabellllll'";

  	echo "requette:  ";
  	echo $client->getResult($requetteSQL); 
  } catch (SoapFault $exception) { 
    echo $exception;       
  } 
?>