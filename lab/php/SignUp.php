<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/ClientVerifyEnrollment.js"></script>
</head>
<body>
  <!--<script type= "text/javascript" src='../js/ValidateFieldsQuestionJS.js'></script> 
  <script src="../js/ValidateFieldsQuestionJQ.js"></script> -->
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
        <?php
            require_once("funcionesAyuda.inc");
            $errores= '';
            if (isset($_POST['email'])){
                $ema=validarEmail($_POST['email']);
                $errores = $errores.$ema;
                /*$comp = comprobar($_POST['email']);
                if(!$comp){
                    $comprobar = "El email no está matriculado en Sistemas Web.";
                    $errores= $errores.$comprobar;
                }*/
            }
            if(isset($_POST['nombreApellidos'])){
                $nom=validarNombre($_POST['nombreApellidos']);
                $errores = $errores.$nom;
            }
            if(isset($_POST['contraseña'])){
                $con=validarContraseña($_POST['contraseña'],$_POST['repetirContraseña']);
                $errores = $errores.$con;
            }
            
              if($ema == '' & isset($_POST['email']) & $nom=='' & isset($_POST['nombreApellidos']) & $con=='' & isset($_POST['contraseña']) & isset($_POST['repetirContraseña']) /*& $comp*/){
                
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
                $email=$_POST['email'];
                $nombreApellidos=$_POST['nombreApellidos'];
                $contraseña=password_hash($_POST['contraseña'],PASSWORD_DEFAULT);
                $tipo_A_P= $_POST['tipo'];
                $estado = "activo";
                $revisar = getimagesize($_FILES["file"]["tmp_name"]);
                $imagen= addslashes(file_get_contents($_FILES['file']['tmp_name']));
                $tmpName  = $_FILES['file']['tmp_name'];  
                $fp = fopen($tmpName, 'rb'); // read binary
                //////////////////////////////// MYSQL KIN /////////////////////////////////////////////////////
                /*
                $connection=mysqli_connect($server,$user,$pass,$basededatos);
                if(!$connection){
                    die("Error de conexión" . mysqli_error($connection));
                }
                $sql="INSERT INTO usuarios (tipoA_P,email,Nombre_Apellidos,contraseña, foto, estado) VALUES ('$tipo_A_P','$email','$nombreApellidos', '$contraseña', '$imagen', 'activo')";
                if(mysqli_query($connection, $sql)){
                    echo'<script type="text/javascript">
                        alert("¡Se ha registrado correctamente!");
                        window.location.href="Login.php";
                        </script>';
                    
                    
                    die();
                }else{
                    //echo("Ha habido un error". mysqli_error($connection));
                    $errores = "Ha habido un error intentando guardar el usuario en la base de datos.";
                }
                $connection->close();*/
                ////////////////////////////////////////////////////////////////////////////////////////////////

                ///////////////////////////////////////// PDO //////////////////////////////////////////////////
                try{
                    //connect
                    $dsn= "mysql:host=localhost;dbname=$basededatos";
                    $dbh = new PDO($dsn, $user, $pass);

                    //prepare
                    $stmt = $dbh->prepare("INSERT INTO usuarios (tipoA_P,email,Nombre_Apellidos,contraseña, foto, estado) VALUES (?,?,?,?,?,?)");
                    //bind
                    $stmt->bindParam(1,$tipo_A_P);
                    $stmt->bindParam(2,$email);
                    $stmt->bindParam(3,$nombreApellidos);
                    $stmt->bindParam(4,$contraseña);
                    $stmt->bindParam(5,$fp, PDO::PARAM_LOB);
                    $stmt->bindParam(6,$estado);
                    // Execute
                    $stmt->execute();
                    echo'<script type="text/javascript">
                        alert("¡Se ha registrado correctamente!");
                        window.location.href="Login.php";
                        </script>';

                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                $dbh = null;

              }
            
        ?>
    <center><form id="fregister" name="fregister" action="" method="post" enctype="multipart/form-data"> 
        <label for="tipoUsuario">Tipo de usuario:(*)</label> <br><br>
            <input type="radio" id="tipo" name="tipo" value="Alumno" checked>
            <label for="alumno">Alumno</label>
            <input type="radio" id="tipo" name="tipo" value="Profesor">
            <label for="profesor">Profesor</label><br><br>
        <label for="email">Email:(*)</label>
        <input type="text" id="email" name="email" >
        <label id="resultado" name="resultado"></label><br><br>
        <label for="nombreApellidos">Nombre y Apellidos:(*)</label>
        <input type="text" id="nombreApellidos" name="nombreApellidos" ><br><br>
        <label for="contraseña">Contraseña:(*)</label>
        <input type="password" id="contraseña" name="contraseña" ><br><br>
        <label for="repetirContraseña">Repetir contraseña:(*)</label>
        <input type="password" id="repetirContraseña" name="repetirContraseña"><br><br>
        <input type="file" class="form-control" id="file" name="file" multiple>
        <button type="button" hidden=true id="clear" style="width:125px; height:px" >Clear Image</button><br><br>
        <!-- La imagen que vamos a usar para previsualizar lo que el usuario selecciona -->
        <img id="imagenPrevisualizacion" hidden=true width="170" height="120"><br>
        <script src="../js/ShowImageInForm.js"></script>
        <button type="reset" id="reset" style="width:100px; height:25px" >Reset</button>
        <input id="submit" type="submit" value="Submit" style="width:100px; height:25px" disabled>
        <span style="color:red" > <?php echo($errores); ?> </span>
      </form></center>
      
    

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>