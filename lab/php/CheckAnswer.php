<?php
	$respuestas = $_POST['respuestas'];

	if ($respuestas != "correcta"){
		echo "La respuesta no es correcta";
	}else{
		echo "La respuesta es correcta";
	}


?>