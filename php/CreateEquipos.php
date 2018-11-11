<?php
	session_start();
	include "conection.php";
	$id = 2; //cambiar por el id guardado en la sesion
	$equipname = $_POST["nom_equipo"];	
	$est=$_POST["estado"];
	$date = $_POST["Fecha"];
	if (!mysqli_query($mysqli, "INSERT INTO `equipo`(`Administrador_idAdministrador`, `nombre_equipo`,`estado_equipo`, `fecha_equipo`) VALUES ('".$id."','".$equipname."','".$est."','".$date."')")) {
        $m = mysqli_error($mysqli);
        header("Location: ../ctEquipo.php?error=si&&m=".$m);
    } else {
   	 	header("Location: ../ctEquipo.php?agregado=si");	
    }
?>