<?php
// Constantes para el acceso a datos...
//phpinfo();
DEFINE("_HOST_", "localhost");
DEFINE("_PORT_", "22");
DEFINE("_USERNAME_", "iirastorza013");
DEFINE("_DATABASE_", "db_iirastorza013");
DEFINE("_PASSWORD_", "owMxATY6J3b0NXYylWa");

require_once 'database.php';
$method = $_SERVER['REQUEST_METHOD'];
$resource = $_SERVER['REQUEST_URI'];

    $cnx = Database::Conectar();
    switch ($method) {
        case 'GET': 
			if(isset($_GET['email']))
			{
            $datos = "";
            $email = $_GET['email'];
			$sql = "SELECT * FROM vips WHERE email='$email'";
            $data=Database::EjecutarConsulta($cnx, $sql);
			if (isset($data[0])){echo "<br><br><b>ENHORABUENA ".$email." ES VIP</b><br><img src=../images/ok.png>";break;}
			else {echo "<br><br><b>LO SIENTO ".$email." NO ES VIP</b><br><img src=../images/error.png>";
			break;}
			}
			else
			{
				echo 'kaixo';// Servicio para Listar Vips (GET sin parámetro)
			}
			break;
        case 'POST':
            echo 'kaixo';// Para añadir VIPS
        case 'PUT':
            echo 'kaixo';// Este no hay que implementar
        case 'DELETE':
            echo 'kaixo';// Borrado de usuario VIP
	}
    Database::Desconectar($cnx);

?>
