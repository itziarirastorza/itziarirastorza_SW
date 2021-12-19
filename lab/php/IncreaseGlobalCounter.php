<?php

function IncreaseGlobalCounter(){
	$users = simplexml_load_file("../xml/UserCounter.xml");
	$users->addChild('user', 1);
	//gorde
	$domxml = new DOMDocument('1.0');
	  $domxml->preserveWhiteSpace = false;
	  $domxml->formatOutput = true;
	  if ($domxml->loadXML($users->asXML()) == FALSE) {
	    echo "No se ha podido insertar el user. <br \>";
	  } else {
	    if ($domxml->save("./../xml/UserCounter.xml") == FALSE) {
	      echo "No se ha podido insertar el user XML. <br \>";
	    } else {
	      echo "Se ha guardado bien en XML. <br \>";
	    }
	  }

}

?>
