<?php
    session_start();

    if (!isset($_SESSION["autentificado"])){
        header("Location: Layout.php?mezua=1" );
        exit();
    }


?>