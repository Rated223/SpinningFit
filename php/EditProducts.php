<?php
	session_start();
	include "conection.php";
	$x = 0;
	$rid = $_POST["id"];
	$aid = $_SESSION["id"]; //cambiar por el id guardado en la sesion
	$name = $_POST["name"];
	$code = $_POST["code"];
	$price = $_POST["price"];
	$cant = $_POST["cant"];
	$re = $mysqli->query("SELECT * FROM productos");
	while ($f = mysqli_fetch_array($re)) {
		if ($f['codigo_producto'] == $code && $f['idProductos'] != $rid) {
			$x = 1;
		}
	}

	if ($x == 1) {
		header("Location: ../ctProducts.php?errorcodigo=si");
	} else {
		if (!mysqli_query($mysqli, "UPDATE `productos` SET `Administrador_idAdministrador`='".$aid."',`nombre_producto`='".$name."',`codigo_producto`='".$code."',`precio_producto`='".$price."',`cantidad_producto`='".$cant."' WHERE `idProductos`='".$rid."'")) {
	        $m = mysqli_error($mysqli);
	        header("Location: ../ctProducts.php?error=si&&m=".$m);
		} else {
			header("Location: ../ctProducts.php?editado=si");
		}
	}
?>