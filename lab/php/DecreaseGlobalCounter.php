<?php

function DecreaseGlobalCounter(){
	$doc = new DOMDocument; 
	$doc->load('../xml/UserCounter.xml');
	$thedocument = $doc->documentElement;

	$list = $thedocument->getElementsByTagName('user');
	
	$node = $list->item(0);

	$thedocument->removeChild($node);

	echo $doc->save('../xml/UserCounter.xml');
	return true;
}

?>