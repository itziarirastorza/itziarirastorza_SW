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
    <form id="addVip" name="addVip"  method="POST"> 
        
        <label style="color: teal;font-weight: 25px;" for="email">Convertir el alumno en VIP:(*)</label>
        <input type="text" id="email" name="email" ><br>
        <?php
        require_once("funcionesAyuda.inc");
        //exekutatu
        $curl = curl_init();
        $url = "https://sw.ikasten.io/~iirastorza013/REST/vipusers/";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, true);
        $email = $_POST['email'];
        if($email !=''){
          if (validarEmail($email)==''){
            $data = array('email' => $email,);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            $str = curl_exec($curl);
            echo '<br> <p style="color: teal;font-weight: 35px;" > El usuario '.$email.' ya es VIP!</p> ';
          }else{
            echo 'El email no es válido';
          }
        }
        curl_close($curl);
        ?>
        <br><input id="submit" type="submit" value="Convertir" style="width:100px; height:25px" >
      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
