<?php 

	$codigo = $_POST['codigo'];
    $contraseña1 = $_POST['newpass'];
    $contraseña2 =  $_POST['newpass2'];
    $newpass= password_hash($_POST['newpass'],PASSWORD_DEFAULT);

    if($contraseña1 == $contraseña2){
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
        try{
            $dsn= "mysql:host=localhost;dbname=$basededatos";
        	$dbh = new PDO($dsn, $user, $pass);
            //Mirar si el codigo existe
        	$stmt = $dbh->prepare("SELECT * FROM codigos_aleatorios WHERE codigo=?");
            $stmt->bindParam(1,$codigo);
        	$stmt->setFetchMode(PDO::FETCH_ASSOC);
        	$stmt->execute();
            $email= "";
        	while ($row = $stmt->fetch()){ 
        		$email = $row['email']; 
        	}
            if ($email ==""){
                echo "<script>
                  alert('Ese código no es válido!');
                  window.location= 'NewPassword2.php';
                </script>";
            }else{
                //cambiar la contraseña del usuario en la base de datos
                $stmt = $dbh->prepare("UPDATE usuarios SET contraseña=? WHERE email=?");
                $stmt->bindParam(1,$newpass);
                $stmt->bindParam(2, $email);
                $stmt->execute();
                //borrar el codigo aleatorio de la base de datos
                $stmt = $dbh->prepare("DELETE FROM codigos_aleatorios WHERE email=?");
                $stmt->bindParam(1,$email);
                $stmt->execute();
                echo "<script>
                  alert('Se ha guardado bien la nueva contraseña!');
                  window.location= 'Login.php';
                </script>";
                $dbh=null;

            }
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }else{
        echo "<script>
                  alert('Las contraseñas no coinciden!');
                  window.location= 'NewPassword2.php';
                </script>";
    }


