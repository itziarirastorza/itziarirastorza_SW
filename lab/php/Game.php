<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <script type= "text/javascript" src='../js/ValidateFieldsQuestionJS.js'></script>
  <script src="../js/ValidateFieldsQuestionJQ.js"></script>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      
    <label style="color:blueviolet; font-size: 30px;" for="codigo">Selecciona un tema para jugar:</label><br>
    <ul>
    <?php
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
        $stmt = $dbh->prepare("SELECT DISTINCT tema FROM preguntas");
          $stmt->bindParam(1,$codigo);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        while ($row = $stmt->fetch()){ 
          echo "<li><a href='PreguntasPorTema.php?tema=".$row['tema']."&numero=0'>".$row['tema']."</a></li>"; 
        }
        $dbh = null;

      }catch (PDOException $e){
            echo $e->getMessage();
      }

    ?>
    </ul>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>