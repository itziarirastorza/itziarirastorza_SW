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
      
    <center><form id="fregister" name="fregister" action="ChangePassword.php" method="post" enctype="multipart/form-data"> 
        <label for="codigo">Inserta aquí el código:</label><br>
        <input type="text" id="codigo" name="codigo" ><br>
        <label for="codigo">Inserta aquí la nueva contraseña:</label><br>
        <input type="password" id="newpass" name="newpass" ><br>
        <label for="codigo">Repite la contraseña:</label><br>
        <input type="password" id="newpass2" name="newpass2" ><br><br>
        <input id="submit" type="submit" value="Submit" style="width:100px; height:25px" >
      </form></center>
    

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>