<?php
    session_start();
    if (!isset($_SESSION["autentificado"])){
        header("Location: Layout.php?mezua=1" );
        exit();
    }else if(isset($_SESSION["tipoA_P"])){
        //Si no eres alumno, 
        if($_SESSION["tipoA_P"]=="Profesor"){
            header("Location: Layout.php?mezua=2" );
            exit();
        }
    }
?>