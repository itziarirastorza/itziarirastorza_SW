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
      
    <center><form id="fregister" name="fregister" action="VerifyEmail.php" method="post" enctype="multipart/form-data"> 
        <label for="email">Inserta tu email:(*)</label>
        <input type="text" id="email" name="email" ><br><br>
        <input id="submit" type="submit" value="Submit" style="width:100px; height:25px" >
      </form></center>
    

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>