<?php
	session_start();
	include "conection.php";
	$rid = $_POST["id"];
	$aid = 2; //Cambiar este id por el de la session guardada
	$equipname = $_POST["nom_equipo"];	
	$est=$_POST["estado"];
	$date = $_POST["Fecha"];
	if (!mysqli_query($mysqli, "UPDATE `equipo` SET `Administrador_idAdministrador`='".$aid."',`nombre_equipo`='".$equipname."',`estado_equipo`='".$est."', `fecha_equipo`='".$date."' WHERE `idEquipo`='".$rid."'")) {
        $m = mysqli_error($mysqli);
        header("Location: ../ctEquipo.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctEquipo.php?editado=si");
	}
?>