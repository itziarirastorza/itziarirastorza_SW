<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <script type= "text/javascript" src='../js/ValidateFieldsQuestionJS.js'></script>
  <script src="../js/ValidateFieldsQuestionJQ.js"></script>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php
        include '../php/IncreaseGlobalCounter.php' ;
        
        if(isset($_GET['email']) & isset($_GET['contraseña']) ){
                //Codigo para meter al usuario en la base de datos
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
                $email=$_GET['email'];
                  $email_berria= str_replace('@', '%40', $email);
                  $contraseña=$_GET['contraseña'];

                  //////////////////////////////// MYSQL /////////////////////////////////////////////
                /*$connection=mysqli_connect($server,$user,$pass,$basededatos);
                if(!$connection){
                    die("Error de conexión" . mysqli_error($connection));
                }
                $sql="SELECT * FROM usuarios";
                $resultado= mysqli_query($connection,$sql);
                if( $resultado ){
                  if( mysqli_num_rows( $resultado ) > 0){
                    $encontrado=0;
                    while($fila = mysqli_fetch_array( $resultado ) ){
                      if($email== $fila["email"]){
                        $encontrado=1;
                        $usuario = $fila;

                        if(!password_verify($contraseña, $fila["contraseña"])){
                          echo "<script>
                            alert('La contraseña no es correcta');
                            window.location= 'Login.php'
                          </script>";

                        }else{
                          if($fila['estado']=="inactivo"){
                            echo "<script>
                            alert('El usuario está inactivo');
                            window.location= 'Login.php'
                          </script>";
                          }else{
                            $_SESSION["autentificado"]= "SI";
                            $_SESSION["email"]=$fila["email"]; 
                            $_SESSION["tipoA_P"]=$fila["tipoA_P"];
                            IncreaseGlobalCounter();
                            if ($fila["email"]=="admin@ehu.es"){
                               echo "<script>
                              alert('La contraseña es correcta');
                              window.location= 'HandlingAccounts.php';
                              </script>";
                            }else{
                              echo "<script>
                                alert('La contraseña es correcta');
                                window.location= 'HandlingQuizesAjax.php';
                              </script>";
                            }
                            die();
                          }
                        }
                      }
                    }
                    if($encontrado==0){
                      echo "<script>
                            alert('El email no está registrado');
                            window.location= 'Login.php'
                          </script>";
                    }
                  } 
                }else{
                  die ('Error en el query database');
                } 
                $connection->close();*/
                
                /////////////////////////////////// PDO /////////////////////////////////////////////////////
                try{ 
                  $dsn= "mysql:host=localhost;dbname=$basededatos";
                  $dbh = new PDO($dsn, $user, $pass);
                  $stmt = $dbh->prepare("SELECT * FROM usuarios");
                  $stmt->setFetchMode(PDO::FETCH_ASSOC);
                  $stmt->execute();
                  while ($row = $stmt->fetch()){
                    if($email== $row["email"]){
                        $encontrado=1;
                        $usuario = $fila;

                        if(!password_verify($contraseña, $row["contraseña"])){
                          echo "<script>
                            alert('La contraseña no es correcta');
                            window.location= 'Login.php'
                          </script>";

                        }else{
                          if($fila['estado']=="inactivo"){
                            echo "<script>
                            alert('El usuario está inactivo');
                            window.location= 'Login.php'
                          </script>";
                          }else{
                            $_SESSION["autentificado"]= "SI";
                            $_SESSION["email"]=$row["email"]; 
                            $_SESSION["tipoA_P"]=$row["tipoA_P"];
                            IncreaseGlobalCounter();
                            if ($fila["email"]=="admin@ehu.es"){
                               echo "<script>
                              alert('La contraseña es correcta');
                              window.location= 'HandlingAccounts.php';
                              </script>";
                            }else{
                              echo "<script>
                                alert('La contraseña es correcta');
                                window.location= 'HandlingQuizesAjax.php';
                              </script>";
                            }
                            die();
                          }
                        }
                      }
                  }
                  if($encontrado==0){
                      echo "<script>
                            alert('El email no está registrado');
                            window.location= 'Login.php'
                          </script>";
                  }
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                $dbh = null;
              
              }
            ?>
    <center><form id="fregister" name="fregister" action="" method="get" enctype="multipart/form-data"> 
        <label for="email">Email:(*)</label>
        <input type="text" id="email" name="email" ><br><br>
        <label for="contraseña">Contraseña:(*)</label>
        <input type="password" id="contraseña" name="contraseña" ><br><br>
        <button type="reset" id="reset" style="width:100px; height:25px" >Reset</button>
        <input id="submit" type="submit" value="Submit" style="width:100px; height:25px" >
        <span style="color:red" > <?php echo($errores) ?> </span> <br><br>
      </form></center>
    

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>