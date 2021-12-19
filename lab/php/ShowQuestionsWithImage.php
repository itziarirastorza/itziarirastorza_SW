<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <center><table border="1">
      <thead><td><center>AUTOR</center></td><td><center>ENUNCIADO</center></td><td><center>RESPUESTA CORRECTA</center></td><td><center>IMAGEN</center></td></thead>
    <?php
      $local=0; //0 para la nube
      if ($local==1){
          $server="localhost";
          $user="root";
          $pass="";
          $basededatos="ws";
      }
      else{
          $server="localhost";
          $user="iirastorza013";
          $pass="owMxATY6J3b0NXYylWa";
          $basededatos="db_iirastorza013";
      }
      $connection=mysqli_connect($server,$user,$pass,$basededatos);
      if(!$connection){
          die("Error de conexión" . mysqli_error($connection));
      }

      $sql="SELECT * FROM preguntas";
      $resultado=mysqli_query($connection,$sql) or die ('Error en el query database');
      if( mysqli_num_rows( $resultado ) > 0){
        while($fila = mysqli_fetch_array( $resultado ) ){
    
          //Lehen sortutako taula bete
            echo "<tr><td>" . 
              $fila["email"] . "</td>";
            echo "<td >" . 
              $fila["enunciado"] . "</td>";
            echo "<td>" . 
              $fila["correcta"] . "</td>";
            if ($fila["imagen"]!=NULL){
              echo '<td><img height="80" width="80" src="data:image/jpeg;base64,'.base64_encode($fila["imagen"]).'"/></td></tr>';
            }else{
              echo '<td><img height="80" width="80" src="../images/noimage.png"/></td></tr>';
            }
        }
      }
      mysqli_free_result($resultado);

      mysqli_close($connection);
      ?>
      </table></center>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
