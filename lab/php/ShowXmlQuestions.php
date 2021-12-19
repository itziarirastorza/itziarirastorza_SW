<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <center><table border="1">
      <thead><td><center>AUTOR</center></td><td><center>ENUNCIADO</center></td><td><center>RESPUESTA CORRECTA</center></td></thead>

      <?php
        //leer datos XML
        $assessmentItems = simplexml_load_file("../xml/Questions.xml");
        foreach ($assessmentItems as $assessmentItem){
            //autor
            $atributos= $assessmentItem->attributes();
            $autor= $atributos['author'];
            //enunciado
            $tbody = $assessmentItem->itemBody;
            $enunciado= $tbody->p;

            //respuesta correcta
            $correctResponse = $assessmentItem->correctResponse;
            $correcta= $correctResponse->response;

            echo "<tr><td>" . 
              $autor . "</td>";
            echo "<td >" . 
              $enunciado. "</td>";
            echo "<td>" . 
              $correcta. "</td></tr>";
        }

      ?>

    </table></center>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>