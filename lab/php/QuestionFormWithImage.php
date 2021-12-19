<?php include '../php/Seguridad.php'?>
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
    <form id="fquestion" name="fquestion" action="AddQuestionWithImage.php?<?php echo $parametros[1]?>" method="post" enctype="multipart/form-data"> 
        <label for="email">Email:(*)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label> 
        <input type="text" id="email" name="email" value=<?php echo($email)?>><br><br>
        <label for="enunciado">Enunciado:(*)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        <input type="text" id="enunciado" name="enunciado" ><br><br>
        <label for="correcta">Respuesta correcta:(*) &nbsp&nbsp&nbsp&nbsp&nbsp </label>
        <input type="text" id="correcta" name="correcta" ><br>
        <label for="incorrecta1">Respuesta incorrecta 1:(*)</label>
        <input type="text" id="incorrecta1" name="incorrecta1" ><br>
        <label for="incorrecta2">Respuesta incorrecta 2:(*)</label>
        <input type="text" id="incorrecta2" name="incorrecta2" ><br>
        <label for="incorrecta3">Respuesta incorrecta 3:(*)</label>
        <input type="text" id="incorrecta3" name="incorrecta3" ><br><br>
        <label for="complejidad" > Complejidad: </label>
        <select name="complejidad" id="complejidad">
          <option value="1"> Baja </option>
          <option value="2"> Media </option>
          <option value="3"> Alta </option>
        </select><br><br>
        <label for="tema">Tema:(*)</label>
        <input type="text" id="tema" name="tema" ><br><br>
        <input type="file" class="form-control" id="file" name="file" multiple>
        <button type="button" hidden=true id="clear" style="width:125px; height:px" >Clear Image</button><br><br>
        <!-- La imagen que vamos a usar para previsualizar lo que el usuario selecciona -->

        <img id="imagenPrevisualizacion" hidden=true width="170" height="120"><br>
        <script src="../js/ShowImageInForm.js"></script>
   
        <button type="reset" id="reset" style="width:100px; height:25px" >Reset</button>

        <input id="submit" type="submit" value="Submit" style="width:100px; height:25px" >
      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
