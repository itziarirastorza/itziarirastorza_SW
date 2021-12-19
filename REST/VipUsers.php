<?php
// Constantes para el acceso a datos...
//phpinfo();
DEFINE("_HOST_", "localhost");
DEFINE("_PORT_", "22");
DEFINE("_USERNAME_", "G20");
DEFINE("_DATABASE_", "db_G20");
DEFINE("_PASSWORD_", "VZ5Jmjh1luZre");

require_once 'database.php';
$method = $_SERVER['REQUEST_METHOD'];
$resource = $_SERVER['REQUEST_URI'];

    $cnx = Database::Conectar();
    switch ($method) {
        case 'GET':
            if(isset($_GET['email'])){
                $datos = "";
                $email = $_GET['email'];
                $sql = "SELECT * FROM vips WHERE email='$email'";
                $data=Database::EjecutarConsulta($cnx, $sql);
                if (isset($data[0])){echo "<br><br><b>ENHORABUENA ".$email." ES VIP</b><br><img style='width: 150px;' src=../images/ok.png>";break;}
                else {echo "<br><br><b>LO SIENTO ".$email." NO ES VIP</b><br><img style='width: 150px;' src=../images/error.png>";
                break;}
            }
			else
			{
                //$datos = "";
                $sql = "SELECT * FROM vips";
                //echo ($sql);
                $data=Database::EjecutarConsulta($cnx, $sql);
                echo $data;
            }
                
			//echo 'kaixo';// Servicio para Listar Vips (GET sin parámetro)
            
			break;
        case 'POST':
            $arguments = $_POST;
            $result = 0;
            $email= $arguments['email'];
            $sql = "INSERT INTO vips (email)
            VALUES ('$email');";
            $num=Database::EjecutarNoConsulta($cnx, $sql);
            if ($num==0){echo "Ya está en la BD";}
            Else {echo json_encode(array('insertedId' => $email));}
            break;// Para añadir VIPS
        case 'PUT':
            echo 'kaixo';// Este no hay que implementar
        case 'DELETE':
            $arguments = $_REQUEST;
            $email=$arguments['email'];

            $sql = "DELETE FROM vips WHERE email = '$email';";
            echo'<script type="text/javascript">
            alert("'.$sql.'");
            </script>';
            $result = Database::EjecutarNoConsulta($cnx, $sql);
            if ($result == 0)
            {echo "No existe la clave:" . $email ;}
            else
            {echo json_encode(array('Deleted row' => $email));};
            break;

	}
    Database::Desconectar($cnx);

?>
