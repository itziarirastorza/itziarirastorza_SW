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
      
    <label style="color:blueviolet; font-size: 30px;" for="codigo">RESULTADOS</label><br><br><br>


    <div id="resultado">
          <p> </p>
        </div>



    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>