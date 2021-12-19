<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">

    <div>

      <?php 
        require_once("funcionesAyuda.inc");
        // QuestionFormWithImage.php fitxategitik balioak eskuratu
        $email = trim($_POST['email']);
        $enunciado = trim($_POST['enunciado']);
        $correcta = trim($_POST['correcta']);
        $incorrecta1 = trim($_POST['incorrecta1']);
        $incorrecta2 = trim($_POST['incorrecta2']);
        $incorrecta3 = trim($_POST['incorrecta3']);
        if (isset($_POST['complejidad'])) {
          $complejidad = $_POST['complejidad'];
        } else {
          $complejidad = 0;
        }
        $tema = trim($_POST['tema']);
        
        // Irudiaren informazioa eskuratu
        $imagen= addslashes(file_get_contents($_FILES['file']['tmp_name']));

        // Hutsune guztiak egokiak direla ziurtatu
        $error = validate($email, $enunciado, $correcta, $incorrecta1, $incorrecta2, $incorrecta3, $complejidad, $tema);

        if ($error) {
          // Konexioa ezarri
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
          $db = new mysqli($server, $user, $pass, $basededatos);

          if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
          }

         
            $sql = "INSERT INTO preguntas (email,enunciado,correcta,incorrecta1,incorrecta2,incorrecta3,tema,complejidad,imagen) VALUES ('$email', '$enunciado', '$correcta', '$incorrecta1', '$incorrecta2', '$incorrecta3', '$tema', $complejidad, '$imagen')";
          
          
          if ($db->query($sql)) {
            echo 'Se ha guardado bien en la base de datos. <br />';
            
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
              $domxml = new DOMDocument('1.0');
              $domxml->preserveWhiteSpace = false;
              $domxml->formatOutput = true;
              if ($domxml->loadXML($assessmentItems->asXML()) == FALSE) {
                echo "No se ha podido insertar la pregunta XML. <br \>";
              } else {
                if ($domxml->save("./../xml/Questions.xml") == FALSE) {
                  echo "No se ha podido insertar la pregunta XML. <br \>";
                } else {
                  echo "Se ha guardado bien en XML. <br \>";
                }
              }

              // JSON nodo berri bat gehitu
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

              if (file_put_contents("./../json/Questions.json", $jsonData) == FALSE) {
                echo "No se ha podido guardar en JSON. <br \>";
              } else {
                echo "Se ha guardado bien en JSON. <br \>";
              }
                
          } else {
            echo "Error: " . $sql . "<br>" . $db->error;
          }
          $db->close();
        }else{?>
            <br /> No se ha podido guardar en la base de datos. <br />
         Para añadir una nueva pregunta <a href="./QuestionFormWithImage.php?email=<?php echo $_GET['email']; ?>">Pulsa aquí</a>
       <?php } 
      ?>

    </div>

  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
