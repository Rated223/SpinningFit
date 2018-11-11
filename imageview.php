<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<title>Image</title>
</head>
<body style="background: #727272;">
	<?php
		include "php/conection.php";
		$name = $_GET['name'];
		$re = $mysqli->query("SELECT imagen_anuncio FROM `anuncios` WHERE idAnuncios = '$name'");
		$f = mysqli_fetch_array($re);
	?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-auto my-3">
				<img src="images/<?php echo $f['imagen_anuncio']; ?>">
			</div>
		</div>
	</div>
</body>
</html>