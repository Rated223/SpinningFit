<?php
	session_start();
	include "conection.php";
	$rid = $_POST["id"];
	$aid = $_POST["aid"];
	$cant = $_POST["amount"];	
	$date = $_POST["Fecha"];
	if (!mysqli_query($mysqli, "UPDATE `facturas` SET `Alumnos_idAlumnos`='".$aid."',`total_factura`='".$cant."',`fecha_factura`='".$date."' WHERE `idFacturas`='".$rid."'")) {
        $m = mysqli_error($mysqli);
        header("Location: ../ctInvoices.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctInvoices.php?editado=si");
	}
?>