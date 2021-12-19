<?php
	
	$email = $_POST['email'];

	try{ 
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


          $dsn= "mysql:host=localhost;dbname=$basededatos";
          $dbh = new PDO($dsn, $user, $pass);
          $stmt = $dbh->prepare("SELECT * FROM usuarios");
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $encontrado=0;
          while ($row = $stmt->fetch()){
            if($email== $row["email"]){
            	$encontrado = 1;
            	$codigo_aleatorio = random_int(1000000, 9999999);
            	//gorde kodea datu basean
            	$stmt = $dbh->prepare("INSERT INTO codigos_aleatorios (email, codigo) VALUES (?,?)");
            	$stmt->bindParam(1,$email);
            	$stmt->bindParam(2,$codigo_aleatorio);
            	$stmt->execute();
      				$titulo    = 'Quiz - iirastorza013';
      				$mensaje   = 'Buenas, aqui tienes el link para restablecer: https://sw.ikasten.io/~iirastorza013/lab/php/NewPassword2.php
      					El codigo para restablecer es la siguiente: '.$codigo_aleatorio;
              $headers = "From: SW IKASTEN QUIZ <iirastorza013@ikasle.ehu.eus>\r\n"; 
      				if(mail($email, $titulo, $mensaje, $headers)) {
                 echo "<script>
                          alert('Se ha enviado un email correctamente!');
                          window.location= 'Login.php';
                        </script>";  
              } else {
                  echo "<script>
                          alert('error!');
                          window.location= 'Login.php';
                        </script>";
              }
            }
          }
          if($encontrado==0){
              echo "<script>
                    alert('El email no está registrado');
                    window.location= 'Login.php';
                  </script>";
          }
        }catch (PDOException $e){
            echo $e->getMessage();
        }
		$dbh = null;

?>
