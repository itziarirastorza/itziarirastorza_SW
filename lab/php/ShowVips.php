<?php include '../php/SeguridadProfesor.php'?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <!--<script type= "text/javascript" src='../js/ValidateFieldsQuestionJS.js'></script>-->
  <!--<script src="../js/ValidateFieldsQuestionJQ.js"></script>-->
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php
        $url= $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
        $parametros = explode("?", $url);
        $usuario_array= explode("=", $parametros[1]);
        $email = str_replace("%40", "@", $usuario_array[1]);
      ?>
    <form id="showVips" name="showVips"  method="GET" enctype="multipart/form-data"> 
        <label style="color: teal;font-weight: 25px;" for="email">Listado de VIPS:(*)</label>
      </br><br>
        <?php
        $curl = curl_init();
        $url = "https://sw.ikasten.io/~iirastorza013/REST/vipusers/";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $str = curl_exec($curl);
        echo $str;
        curl_close($curl);
        ?>
    
    </form>
    

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>