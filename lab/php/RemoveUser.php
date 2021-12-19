<?php
include '../php/SeguridadAdmin.php';
$email= $_POST['email'];

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
$connection=mysqli_connect($server,$user,$pass,$basededatos);
if(!$connection){
    die("Error de conexión" . mysqli_error($connection));
}

$sql="DELETE FROM usuarios WHERE email='$email'";

if(mysqli_query($connection, $sql)){
    echo'<script type="text/javascript">
        alert("¡Se ha borrado el usuario: '.$email.'!");
        window.location.href="HandlingAccounts.php";
        </script>';
    
    
    die();
}else{
    //echo("Ha habido un error". mysqli_error($connection));
    $errores = "Ha habido un error intentando guardar el usuario en la base de datos.";
}
$connection->close();