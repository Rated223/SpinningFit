<?php
	session_start();
	include "conection.php";
	$aid = $_POST["aid"];
	$cant = $_POST["amount"];	
	$date = $_POST["Fecha"];
	if (!mysqli_query($mysqli, "INSERT INTO `facturas`(`Alumnos_idAlumnos`, `total_factura`, `fecha_factura`) VALUES ('".$aid."','".$cant."','".$date."')")) {
        $m = mysqli_error($mysqli);
        header("Location: ../ctInvoices.php?error=si&&m=".$m);
    } else {
	    header("Location: ../ctInvoices.php?agregado=si");
    }
?>