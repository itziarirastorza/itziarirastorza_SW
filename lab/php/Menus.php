<?php //session_start();
 
 if (isset($_SESSION['autentificado'])){
   // kautotuta
   $email=$_SESSION["email"];
 } else {
   // "ez dago kautotuta
 }

 
?>
<div id='page-wrap'>
<header class='main' id='h1'>
  <?php
/** 
    $url= $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
    $parametros = explode("?", $url);
    $hay_param = strpos($url, "=");
    if($hay_param){ 
      $usuario_array= explode("=", $parametros[1]);
      $email = str_replace("%40", "@", $usuario_array[1]);*/
      
      if (isset($_SESSION['autentificado'])){
        //lortu irudia
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
                  $sql="SELECT * FROM usuarios WHERE usuarios.email='$email'";
                  $resultado= mysqli_query($connection,$sql);
                  if( $resultado ){
                    if ($resultado!=NULL){
                      if( mysqli_num_rows( $resultado ) > 0){
                        while($fila = mysqli_fetch_array( $resultado ) ){
                          $tipo_A_P = $fila['tipoA_P'];
                          if ($fila['foto']!=NULL){
                            $imagen= '<img height="80" width="80" src="data:image/jpeg;base64,'.base64_encode($fila['foto']).'"/>';
                          }else{
                            $imagen= '<img height="80" width="80" src="../images/noimage.png"/>';
                          }
                        }
                      }
                    }
                  }else{
                    die ('Error en el query database');
                  } 
                  $connection->close();
        }


        if (isset($_SESSION['autentificado'])){
          ?>
          <span class="right"><a href="LogOut.php">Logout</a></span>
          <span class="right"><?php echo $email; ?></span>
          <span class="right"><?php echo $imagen; ?></span>

        <?php }else{ ?>
          <span class="right"><a href="SignUp.php">Registro</a></span>
          <span class="right"><a href="Login.php">Login</a></span>
          <span class="right"><a style="width:170px;" href="NewPassword.php">Restablecer contraseña</a></span>
        <?php } ?>
      


</header>

<nav class='main' id='n1' role='navigation'>
  

  <?php
      if(isset($_SESSION['autentificado'])){
        if($_SESSION['email']=="admin@ehu.es"){ ?>
          <span><a href='Layout.php'>Inicio</a></span>
          <span><a href='HandlingAccounts.php'> Gestionar usuarios</a></span>
          <span><a href='Credits.php'>Creditos</a></span>

        <?php }else if($tipo_A_P == "Alumno"){
          ?>
        <span><a href='Layout.php'>Inicio</a></span>
        <span><a href='HandlingQuizesAjax.php'> Gestionar preguntas</a></span>
        <span><a href='Game.php'> Jugar</a></span>
        <span><a href='Credits.php'>Creditos</a></span>

  <?php }else{?>
        <span><a href='Layout.php'>Inicio</a></span>
        <span><a href='HandlingQuizesAjax.php'> Gestionar preguntas</a></span>
        <span><a href='AddVip.php'> Añadir VIP</a></span>
        <span><a href='ShowVips.php'> Listado VIPS</a></span>
        <span><a href='IsVip.php'> Es VIP ? </a></span>
        <span><a href='DeleteVip.php'> Borrar VIP </a></span>
        <span><a href='Credits.php'>Creditos</a></span>
        <?php }
      }else{ ?>
        <span><a href='Layout.php'>Inicio</a></span>
        <span><a href='Credits.php'>Creditos</a></span>
  <?php } ?>
</nav>

