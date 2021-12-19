<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/CheckAnswer.js"></script>
</head>
<body>
  <script type= "text/javascript" src='../js/ValidateFieldsQuestionJS.js'></script>
  <script src="../js/ValidateFieldsQuestionJQ.js"></script>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      
    <label style="color:blueviolet; font-size: 30px;" for="codigo">Pregunta</label><br><br><br>

    <?php
      $tema= $_GET['tema'];
      $pregunta=$_GET['numero'];
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
      try{
        $dsn= "mysql:host=localhost;dbname=$basededatos";
        $dbh = new PDO($dsn, $user, $pass);
          //Mirar si el codigo existe
        $stmt = $dbh->prepare("SELECT * FROM preguntas WHERE tema=?");
        $stmt->bindParam(1,$tema);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $i=0;
        while ($row = $stmt->fetch()){
          $preguntas[$i] = $row;
          $i++;
        }
        
        $tamaño = sizeof($preguntas);
        $pregunta_aleatoria = $preguntas[$pregunta];
        $siguiente = $pregunta+1;

        if($siguiente == $tamaño){
            echo'<form  id="quiz" name="quiz" method="post" ><label style="color:blue; font-size: 30px;" for="codigo">'.$pregunta_aleatoria['enunciado'].'</label><br><br><br>';
          echo'<select id="respuestas" name="respuestas" style="width:150px; height:35px; font-size:30px">
              <option value="correcta" >'.$pregunta_aleatoria['correcta'].'</option>';
          echo'<option value="incorrecta1" >'.$pregunta_aleatoria['incorrecta1'].'</option>';
          echo'<option value="incorrecta2" >'.$pregunta_aleatoria['incorrecta2'].'</option>';
          echo'<option value="incorrecta3" >'.$pregunta_aleatoria['incorrecta3'].'</option></select><br><br>';
          echo'<input id="submit" type="button" value="Corregir" style="width:100px; height:25px" ></form><br><br>
          <input type="button" id="next" value="Siguiente pregunta" /> <script type="text/javascript">
              document.getElementById("next").onclick = function () {
              location.href = "../php/GameFinish.php";
              };
           </script>';
        }else{
          echo'<form action="CheckAnswer.php" id="quiz" name="quiz" method="post" ><label style="color:blue; font-size: 30px;" for="codigo">'.$pregunta_aleatoria['enunciado'].'</label><br><br><br>';
          echo'<select id="respuestas" name="respuestas" style="width:150px; height:35px; font-size:30px">
              <option value="correcta" >'.$pregunta_aleatoria['correcta'].'</option>';
          echo'<option value="incorrecta1" >'.$pregunta_aleatoria['incorrecta1'].'</option>';
          echo'<option value="incorrecta2" >'.$pregunta_aleatoria['incorrecta2'].'</option>';
          echo'<option value="incorrecta3" >'.$pregunta_aleatoria['incorrecta3'].'</option></select><br><br>';
          echo'<input id="submit" type="button" value="Corregir" style="width:100px; height:25px" ></form><br><br>
          <input type="button" id="next" value="Siguiente pregunta" /> <script type="text/javascript">
              document.getElementById("next").onclick = function () {
              location.href = "../php/PreguntasPorTema.php?tema='.$tema.'&numero='.$siguiente.'";
              };
           </script>';
        }
        

        
        

     }catch (PDOException $e){
            echo $e->getMessage();
      }

    ?>

    <div id="resultado">
          <p> </p>
        </div>



    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>