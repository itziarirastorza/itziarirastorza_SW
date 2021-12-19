<?php
require_once("funcionesAyuda.inc"); 
    //formulariotik datuk irakurri
    $email=$_POST['email'];
    $enunciado=$_POST['enunciado'];
    $correcta=$_POST['correcta'];
    $incorrecta1=$_POST['incorrecta1'];
    $incorrecta2=$_POST['incorrecta2'];
    $incorrecta3=$_POST['incorrecta3'];
    $tema=$_POST['tema'];
    $complejidad=$_POST['complejidad'];
    
    // BALIDAZIOA
    $error = validar_user($email, $enunciado, $correcta, $incorrecta1, $incorrecta2,$incorrecta3,$tema,$complejidad);
    if($error == ''){

        //XML-a irakurri
        $assessmentItems = simplexml_load_file("../xml/Questions.xml");

         //######  XML-an galdera berri bat sortu ########
        $assessmentItem = $assessmentItems->addChild('assessmentItem');
        $assessmentItem->addAttribute('subject', $tema);
        $assessmentItem->addAttribute('author', $email);

        //enunciado
        $itemBody= $assessmentItem->addChild('itemBody');
        $itemBody->addChild('p', $enunciado);

        //respuesta correcta
        $correctResponse= $assessmentItem->addChild('correctResponse');
        $correctResponse->addChild('response',$correcta);

        //respuestas incorrectas
        $incorrectResponses= $assessmentItem->addChild('incorrectResponses');
        $incorrectResponses->addChild('response', $incorrecta1);
        $incorrectResponses->addChild('response', $incorrecta2);
        $incorrectResponses->addChild('response', $incorrecta3);

        //GORDE
        $assessmentItems->asXML('../xml/Questions.xml');
        echo '<br
        >Pregunta insertada al fichero XML<br>';

    //-----------------------   JSON-en GORDE ------------------//

        $data = file_get_contents("../json/Questions.json"); 
        $array=json_decode($data);
        $assessmentItem = new stdClass();
        $assessmentItem->subject=$tema;
        $assessmentItem->author=$email;
        $itemBody=new stdClass();
        $itemBody->p = $enunciado;
        $assessmentItem->itemBody=$itemBody;
        $correctResponse= new stdClass();
        $correctResponse->value=$correcta;
        $assessmentItem->correctResponse=$correctResponse;

        $incorrectResponse= new stdClass();
        $value[0]=$incorrecta1;
        $value[1]=$incorrecta2;
        $value[2]=$incorrecta3;
        $incorrectResponse->value=$value;
        $assessmentItem->incorrectResponse=$incorrectResponse;

        $assessmentItemArray[0] = $assessmentItem;
        array_Push($array
        ->assessmentItems, $assessmentItemArray[0]);
        $jsonData = json_encode($array); $jsonData = str_replace('{', '{'.PHP_EOL, $jsonData); $jsonData = str_replace(',', ','.PHP_EOL, $jsonData); $jsonData = str_replace('}', PHP_EOL.'}', $jsonData);
        file_put_contents("../json/Questions.json",$jsonData);
        echo '<br
        >Pregunta insertada al fichero JSON<br>';

    //-----------------------   PHPMYADMINEN GORDE ------------------//
        
        $local=0; //0 para la nube
        if ($local==1){
            $server="localhost";
            $user="root";
            $pass="";
            $basededatos="ws";
        }
        else{
            $server="localhost";
            $user="iirastorza013";
            $pass="owMxATY6J3b0NXYylWa";
            $basededatos="db_iirastorza013";
        }
        $connection=mysqli_connect($server,$user,$pass,$basededatos);
        if(!$connection){
            die("Error de conexión" . mysqli_error($connection));
        }
        $url= $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
        $parametros = explode("?", $url);

        $prueba= $parametros[1];
        $revisar = getimagesize($_FILES["file"]["tmp_name"]);
        $imagen= addslashes(file_get_contents($_FILES['file']['tmp_name']));
        $sql="INSERT INTO preguntas (email,enunciado,correcta,incorrecta1,incorrecta2,incorrecta3,tema,complejidad,imagen) VALUES ('$email','$enunciado','$correcta','$incorrecta1','$incorrecta2','$incorrecta3','$tema','$complejidad', '$imagen')";
        if(mysqli_query($connection, $sql)){
            die();
        }else{
            echo("Ha habido un error". mysqli_error($connection));
        }
    }else{
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo($error);
        echo '<a href="javascript:history.back(-1);" title="Ir la página anterior">Ir atras</a>';
    }
$connection->close();
?>