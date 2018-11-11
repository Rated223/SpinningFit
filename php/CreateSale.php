<?php 
	include "conection.php";
	session_start();
	$folio = $_POST['Folio'];
	$aid = $_SESSION['id'];
 	$id = $_POST['id'];
 	$Cant = $_POST['Cant'];
 	$total = 0;
 	/* Creamos un nuevo registro solo con el id del administrador, mas adelante lo modificaremos para agregar los demas datos */
 	if (!mysqli_query($mysqli, "INSERT INTO ventas(Administrador_idAdministrador) VALUES('$aid')")) {
			$m = mysqli_error($mysqli);
            header("Location: ../FormSales.php?error=si&&m=".$m);
 	}
 	/* Buscamos el reigistro que acabamos de crear para obtener su id */
 	$rm = $mysqli->query("SELECT * FROM ventas ORDER BY idVentas DESC");
 	$f = mysqli_fetch_array($rm);
 	for ($i=0; $i < count($id); $i++) {
 		/* Por cada producto que seleccionamos para la venta, creamos un registro en la tabla de detalles, donde se incluye el id de la venta a la que pertenece y que guardamos previamente */
	 	if (!mysqli_query($mysqli, "INSERT INTO detalles_venta(id_venta, id_producto, cantidad_producto_venta) VALUES('".$f['idVentas']."', '".$id[$i]."', '".$Cant[$i]."')")) {
				$m = mysqli_error($mysqli);
	            header("Location: ../FormSales.php?error=si&&m=".$m);
	 	}
	 	/* con el id del producto buscamos su precio correspondiente */	
	 	$rm2 = $mysqli->query("SELECT precio_producto, cantidad_producto FROM productos WHERE idProductos = '$id[$i]'");
 		$f2 = mysqli_fetch_array($rm2);
 		/* este precio lo multiplicamos por la cantidad comprada de ese producto y lo sumamos al total */
	 	$total += ($Cant[$i] * $f2['precio_producto']);
	 	/* Despues, actualizamos la cantidad que queda en stock del producto */
	 	$NuevaCantidad = $f2['cantidad_producto'] - $Cant[$i];
	 	if (!mysqli_query($mysqli, "UPDATE productos SET cantidad_producto='".$NuevaCantidad."' WHERE idProductos = '".$id[$i]."'")) {
				$m = mysqli_error($mysqli);
	            header("Location: ../FormSales.php?error=si&&m=".$m);
	 	}
 	}
 	/* Por ultimo, actualizamos el registro de la venta agregando el total y el folio */
 	if (!mysqli_query($mysqli, "UPDATE ventas SET total_venta='$total', folio_venta='$folio' WHERE idVentas = '".$f['idVentas']."'")) {
			$m = mysqli_error($mysqli);
            header("Location: ../FormSales.php?error=si&&m=".$m);
 	}
 	header("Location: ../FormSales.php?saleid=".$f['idVentas']);
?>