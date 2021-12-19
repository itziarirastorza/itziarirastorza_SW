<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <script type= "text/javascript" src='../js/ValidateFieldsQuestionJS.js'></script>
  <script src="../js/ValidateFieldsQuestionJQ.js"></script>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <form id="fquestion" name="fquestion" action="DbConfig.php" method="post">
        <label for="email">Email:(*)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label> 
        <input type="text" id="email" name="email" ><br><br>
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
        <select name="complejidad" id="complejidad"><br>
          <option value="1"> Baja </option>
          <option value="2"> Media </option>
          <option value="3"> Alta </option>
        </select><br><br>
        <label for="tema">Tema:(*)</label>
        <input type="text" id="tema" name="tema" ><br><br>
        <button type="reset" style="width:100px; height:25px" >Reset</button>
        <input id="submit" type="submit" value="Submit" onclick="return validateForm(this.form);" style="width:100px; height:25px" >
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>