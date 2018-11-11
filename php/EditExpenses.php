<?php
	session_start();
	include "conection.php";
	$rid = $_POST["id"];
	$aid = $_SESSION["id"]; //Cambiar este id por el de la session guardada
	$cant = $_POST["amount"];	
	$date = $_POST["Fecha"];
	if (!mysqli_query($mysqli, "UPDATE `gastos` SET `Administrador_idAdministrador`='".$aid."',`cantidad_gasto`='".$cant."',`fecha_gasto`='".$date."' WHERE `idGastos`='".$rid."'")) {
        $m = mysqli_error($mysqli);
        header("Location: ../ctExpenses.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctExpenses.php?editado=si");
	}
?>