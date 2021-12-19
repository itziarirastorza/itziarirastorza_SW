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
    <form id="isVip" name="isVip" method="POST" > 
        
        <label for="email">Buscar email:(*)</label>
        <input type="text" id="email" name="email" ><br>
        <?php
          $curl = curl_init();
          if ($_POST['email']!=''){
            $url1 = "https://sw.ikasten.io/~iirastorza013/REST/VipUsers.php?email=".$_POST['email'];
            curl_setopt($curl, CURLOPT_URL, $url1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            $str = curl_exec($curl);
            //print_r( curl_getinfo($curl));
            //var_dump(curl_error($curl));
            echo $str;
          }
          curl_close($curl);
        ?>
        <br><input id="submit" type="submit" value="Buscar" style="width:100px; height:25px" >
      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>