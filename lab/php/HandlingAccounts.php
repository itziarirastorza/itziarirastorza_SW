<?php include '../php/SeguridadAdmin.php'?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1" style="overflow:scroll">
    <div>
    <center><table border="1">
      <thead><td><center>USUARIO</center></td><td><center>CONTRASEÑA</center></td><td><center>FOTO</center></td><td><center>ESTADO</center></td><td><center>BLOQUEO</center></td><td><center>BORRAR</center></td></thead>
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

      $sql="SELECT * FROM usuarios";
      $resultado=mysqli_query($connection,$sql) or die ('Error en el query database');
      if( mysqli_num_rows( $resultado ) > 0){
        while($fila = mysqli_fetch_array( $resultado ) ){
          if ($fila['email']!= "admin@ehu.es"){
          //Lehen sortutako taula bete
            echo "<tr><td>" . 
              $fila["email"] . "</td>";
            echo "<td >" . 
              $fila["contraseña"] . "</td>";

            if ($fila["foto"]!=NULL){
              echo '<td><img height="80" width="80" src="data:image/jpeg;base64,'.base64_encode($fila["foto"]).'"/></td>';
            }else{
              echo '<td><img height="80" width="80" src="../images/noimage.png"/></td>';
            }
            echo "<td >" . 
              $fila["estado"] . "</td>";

            echo "<td >
                <script type='text/javascript'>
                  function confirmChange(){
                    if (!confirm('Estas seguro de que quieres cambiar el estado?')){
                      return false;
                    }else{
                      return true;
                    }
                  }
                </script>
                <form action='ChangeUserState.php' method='post'>
                  <input type='text' id='email' name='email' value='".$fila["email"]."' hidden>
                  <input type='text' id='estado' name='estado' value='".$fila["estado"]."' hidden>
                  <input type='submit' onclick='return confirmChange();' value='Cambiar estado'>
                </form>
            </td>";
            echo "<td >
                <script type='text/javascript'>
                    function confirmDelete(){
                      if (!confirm('Estas seguro de que quieres borrar el usuario?')){
                        return false;
                      }else{
                        return true;
                      }
                    }
                </script>
                <form action='RemoveUser.php' method='post'>
                  <input type='text' id='email' name='email' value='".$fila["email"]."' hidden>
                  <input type='submit' onclick='return confirmDelete()' value='Borrar'>
                </form>
            </td></tr>";
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
