<?php 
	$id = $_POST['id'];
	include "conection.php";
	$re = mysqli_query($mysqli, "SELECT idProductos, nombre_producto, precio_producto, cantidad_producto FROM productos WHERE idProductos = '".$id."'");
	$f = mysqli_fetch_array($re);
	if (mysqli_num_rows($re)>0) {
		echo json_encode($f);
	} else {
		echo $_POST['id'];
	}
 ?>