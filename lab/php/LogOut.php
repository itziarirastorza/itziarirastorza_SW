<?php
    session_start();
    include '../php/DecreaseGlobalCounter.php';
    /*if(isset($_SESSION["email"]){
        unset($_SESSION["email"]);
    }
    if(isset($_SESSION["tipoA_P"]){
        unset($_SESSION["tipoA_P"]);
    }
    if(isset($_SESSION["autentificado"]){
        unset($_SESSION["autentificado"]);
    }*/

    session_destroy();
    DecreaseGlobalCounter();
	echo'<script type="text/javascript">
                        alert("¡Hasta pronto!");
                        window.location.href="Layout.php";
                        </script>';
?>