<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html';
  if(isset($_GET['mezua'])){
    if($_GET['mezua']==1){
      echo "<script>
                      alert('Debes loguearte primero.');
                      window.location= 'Layout.php'
                    </script>";
    }elseif($_GET['mezua']==2){
      echo "<script>
                      alert('Debes loguearte como Alumno para poder acceder a esta página.');
                      window.location= 'Layout.php'
                    </script>";
    }elseif($_GET['mezua']==3){
      echo "<script>
                      alert('Debes loguearte como Profesor para poder acceder a esta página.');
                      window.location= 'Layout.php'
                    </script>";
    }elseif($_GET['mezua']==4){
      echo "<script>
                      alert('Debes loguearte como Admin para poder acceder a esta página.');
                      window.location= 'Layout.php'
                    </script>";
    }elseif($_GET['mezua']==5){
      echo "<script>
                      alert('Debes loguearte como Alumno o Profesor para poder acceder a esta página.');
                      window.location= 'Layout.php'
                    </script>";
    }
  }
  ?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      <img src="../images/logo.jpeg" width="600" height="400">   
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
