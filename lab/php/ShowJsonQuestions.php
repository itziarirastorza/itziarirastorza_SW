<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <center><table border="1">
      <thead><td><center>AUTOR</center></td><td><center>ENUNCIADO</center></td><td><center>RESPUESTA CORRECTA</center></td></thead>

      	<?php
		$data = file_get_contents("../json/Questions.json");
		$array=json_decode($data);
		foreach($array->assessmentItems as $assessmentItem)
		{
		$autor = $assessmentItem->author;
		$enunciado=$assessmentItem->itemBody->p;
		$correcta=$assessmentItem->correctResponse->value;
		echo '<tr>
		<td>' . $autor . '</td>
		<td>' . $enunciado . '</td>
		<td>' . $correcta . '</td>
		</tr>';
		}

		?>
    </table></center>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>