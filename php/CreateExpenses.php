<?php
	session_start();
	include "conection.php";
	$id = $_SESSION["id"]; //cambiar por el id guardado en la sesion
	$cant = $_POST["amount"];	
	$date = $_POST["Fecha"];
	if (!mysqli_query($mysqli, "INSERT INTO `gastos`(`Administrador_idAdministrador`, `cantidad_gasto`, `fecha_gasto`) VALUES ('".$id."','".$cant."','".$date."')")) {
        $m = mysqli_error($mysqli);
        header("Location: ../ctExpenses.php?error=si&&m=".$m);
    } else {
   	 	header("Location: ../ctExpenses.php?agregado=si");	
    }
?>