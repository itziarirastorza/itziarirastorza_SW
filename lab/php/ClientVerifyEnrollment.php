<?php
	

$client = new SoapClient('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl');
$resultado= $client->comprobar($_GET['email']);

echo($resultado);


?>