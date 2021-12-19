<?php
    session_start();
    if (!isset($_SESSION["autentificado"])){
        header("Location: Layout.php?mezua=1" );
        exit();
    }else if(isset($_SESSION["tipoA_P"])){
        if($_SESSION["tipoA_P"]=="Alumno"){
            header("Location: Layout.php?mezua=4" );
            exit();
        }elseif($_SESSION["tipoA_P"]=="Profesor"){
            if(isset($_SESSION["email"])){
                if($_SESSION["email"]!="admin@ehu.es"){
                    header("Location: Layout.php?mezua=4" );
                    exit();
                }
            }
            
        }
    }
?>