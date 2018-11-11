<?php
	session_start();
	include "conection.php";
	$x = 0;
	$id = $_SESSION["id"]; //cambiar por el id guardado en la sesion
	$name = $_POST["name"];
	$code = $_POST["code"];
	$price = $_POST["price"];
	$cant = $_POST["cant"];
	$re = $mysqli->query("SELECT * FROM productos");
	while ($f = mysqli_fetch_array($re)) {
		if ($f['codigo_producto'] == $code) {
			$x = 1;
		}
	}

	if ($x == 1) {
		header("Location: ../ctProducts.php?errorcodigo=si");
	} else {
		if (!mysqli_query($mysqli, "INSERT INTO `productos`(`Administrador_idAdministrador`, `nombre_producto`, `codigo_producto`, `precio_producto`, `cantidad_producto`) VALUES ('".$id."','".$name."','".$code."','".$price."','".$cant."')")) {
	        $m = mysqli_error($mysqli);
	        header("Location: ../ctProducts.php?error=si&&m=".$m);
	    } else {
	   	 	header("Location: ../ctProducts.php?agregado=si");	
	    }
	}
?>