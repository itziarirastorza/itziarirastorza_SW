<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <form id='fquestion' name='fquestion' action=’AddQuestion.php’> 
        <label for="email">Email:(*)</label> 
        <input type="text" id="email" name="email" placeholder="mdela013@ikasle.ehu.eus" pattern="([a-z]+[0-9]{3}@ikasle[.]ehu[.](eus|es))|([a-z]+[.]{0,1}[a-z]+@ehu[.](eus|es))" required><br><br>
        <label for="enunciado">Enunciado:(*)</label>
        <input type="text" id="enunciado" name="enunciado" required><br><br>
        <label for="correcta">Respuesta correcta:(*)</label>
        <input type="text" id="correcta" name="correcta" required><br>
        <label for="incorrecta1">Respuesta incorrecta 1:(*)</label>
        <input type="text" id="incorrecta1" name="incorrecta1" required><br>
        <label for="incorrecta2">Respuesta incorrecta 2:(*)</label>
        <input type="text" id="incorrecta2" name="incorrecta2" required><br>
        <label for="incorrecta3">Respuesta incorrecta 3:(*)</label>
        <input type="text" id="incorrecta3" name="incorrecta3" required><br>
        <label for="complejidad" > Complejidad: </label>
        <select name="complejidad" id="complejidad">
          <option value="1"> Baja </option>
          <option value="2"> Media </option>
          <option value="3"> Alta </option>
        </select><br><br>
        <label for="tema">Tema:(*)</label>
        <input type="text" id="tema" name="tema" ><br><br>
        <button type="reset" style="width:100px; height:25px" >Reset</button>
        <input type="submit" value="Submit" style="width:100px; height:25px" >
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
