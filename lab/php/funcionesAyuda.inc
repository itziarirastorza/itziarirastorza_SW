<?php

function validate($email, $enunciado, $correcta, $incorrecta1, $incorrecta2, $incorrecta3, $complejidad, $tema) {

  // Derrigorrezko eremuak hutsak ez daudela ziurtatu
  if (empty($email)) {
    echo "<p align='center' style='color:red;'> No se ha rellenado el campo del correo electrónico </p>";
    return false;
  } else if (empty($enunciado)) {
    echo "<p align='center' style='color:red;'> El enunciado está vacio </p>";
    return false;
  } else if (empty($correcta)) {
    echo "<p align='center' style='color:red;'> La respuesta correcta está vacia </p>";
    return false;
  } else if (empty($incorrecta1) || empty($incorrecta2) || empty($incorrecta3)) {
    echo "<p align='center' style='color:red;'> Hay que rellenar todas las respuestas incorrectas </p>";
    return false;
  } else if (empty($tema)) {
    echo "<p align='center' style='color:red;'> El tema no esta escrito </p>";
    return false;
  }

  //Eposta egokia dela ziurtatu
  $emailcorrecto = "/^([a-zA-Z]+\d{3}@ikasle\.ehu\.(eus|es))|([a-zA-Z]+(\.[a-zA-Z]+)?@ehu\.(eus|es))$/";
  if (!preg_match($emailcorrecto, $email)) {
    echo "<p align='center' style='color:red;'> Email incorrecto </p>";
    return false;
  }

  // Galderaren testuaren luzera
  if (strlen($enunciado) < 10) {
    echo "<p align='center' style='color:red;'> El enunciado debe tener 10 caracteres como mínimo </p>";
    return false;
  }

  return true;
}

// Irudiaren informazioa eskuratu
function irudiInf($irudia) {
  $fileName = basename($irudia["name"]);
  $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

  // Formatu zehatz batzuk onartu
  $allowTypes = array('jpg','png','jpeg','gif'); 
  if (in_array($fileType, $allowTypes)) {
    $image = $irudia['tmp_name']; 
    $imgContent = addslashes(file_get_contents($image)); 
    return $imgContent;
  }
  return false;
}

function validar_user($email, $enunciado, $correcta, $incorrecta1, $incorrecta2,$incorrecta3,$tema,$complejidad)
{
	$url= $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
    $parametros = explode("?", $url);
    $usuario_array= explode("=", $parametros[1]);
    $email2 = str_replace("%40", "@", $usuario_array[1]);
	$mensaje = '';
	$pattern = "/^(([a-z]+[0-9]{3}@ikasle[.]ehu[.](eus|es))|([a-z]+[.]{0,1}[a-z]+@ehu[.](eus|es)))$/";
	if($email == '' )	// email eremua ez da bete.
		$mensaje = $mensaje.'<li>No se ha rellenado el campo del correo electrónico.</li>';
	if(preg_match_all($pattern, $email)!=1 )	// E-posta eremua bete da, baina bere formatua ez da zuzena.
		$mensaje = $mensaje.'<li>El formato del correo electrónico no es válido.</li>';
	if(strcmp($email, $email2)!=0){
		$mensaje = $mensaje.'<li>Este no es el correo electrónico con el que usted está registrado.</li>';
	}
	if($enunciado == '' )	
		$mensaje = $mensaje.'<li>No se ha rellenado el campo del enunciado.</li>';
	if(strlen($enunciado) <10)
		$mensaje = $mensaje.'<li>El enunciado debe de tener 10 caracteres como mínimo.</li>';
	if($correcta == '')
		$mensaje = $mensaje.'<li>No se ha rellenado el campo de la respuesta correcta</li>';
	if($incorrecta1 == '')	// username eremua ez da bete.
		$mensaje = $mensaje.'<li>No se ha rellenado el campo de la respuesta incorrecta1</li>';
	if($incorrecta2 == '')
		$mensaje = $mensaje.'<li>No se ha rellenado el campo de la respuesta incorrecta2</li>';
    if($incorrecta3== '')	
		$mensaje = $mensaje.'<li>No se ha rellenado el campo de la respuesta incorrecta3</li>';
    if($tema== '')	
		$mensaje = $mensaje.'<li>No se ha rellenado el campo del tema.</li>';
    if($complejidad== '')	
		$mensaje = $mensaje.'<li>No has seleccionado ninguna complejidad.</li>';
	return $tr;
}

function validarEmail($email){
	$mensaje = '';
	$pattern = "/^(([a-z]+[0-9]{3}@ikasle[.]ehu[.](eus|es))|([a-z]+[.]{0,1}[a-z]+@ehu[.](eus|es)))$/";
	if($email == '' )	// email eremua ez da bete.
		$mensaje = $mensaje.'<li>No se ha rellenado el campo del correo electrónico.</li>';
	elseif(preg_match_all($pattern, $email)!=1 )	// E-posta eremua bete da, baina bere formatua ez da zuzena.
		$mensaje = $mensaje.'<li>El formato del correo electrónico no es válido.</li>';
	return $mensaje;
}
function validarNombre($nombre){
	$mensaje = '';
	$pattern = "/^(([a-zA-Z]{2,}\s){1,}([a-zA-Z]{2,}){1})$/";
	if($nombre == '' )	// izenaren eremua ez da bete.
		$mensaje = $mensaje.'<li>No se ha rellenado el campo "Nombre y apellidos".</li>';
	elseif(preg_match_all($pattern, $nombre)!=1 )	// izenaren eremua bete da, baina bere formatua ez da zuzena.
		$mensaje = $mensaje.'<li>El formato de "Nombres y apellidos" no es correcto.</li>';
	return $mensaje;
}
function validarContraseña($contraseña, $repetirContraseña){
	$mensaje = '';
	if($contraseña == '' )	// pasahitzaren eremua ez da bete.
		$mensaje = $mensaje.'<li>No se ha rellenado el campo de la contraseña.</li>';
	elseif($repetirContraseña != $contraseña  )	// pasahitzaren eremua ez da bete.
		$mensaje = $mensaje.'<li>Las contraseñas no coinciden.</li>';
	elseif(strlen($contraseña) < 8 )	// contraseña motzegia.
		$mensaje = $mensaje.'<li>La contraseña es demasiado corta.</li>';
	return $mensaje;
}

?>