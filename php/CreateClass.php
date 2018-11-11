<?php
	session_start();
	include "conection.php";
	$id = $_SESSION["id"];; //cambiar por el id guardado en la sesion
	    $horaI = $_POST["horainicio"];
		$horaF= $_POST["horafin"];
		$frec = $_POST["frecu"];
	if (!mysqli_query($mysqli, "INSERT INTO `clases`(`Instructor_idInstructor`, `hora_inicio`,`hora_fin`, `frecuencia`) VALUES ('".$id."','".$horaI."','".$horaF."','".$frec."')")) {
        $m = mysqli_error($mysqli);
        header("Location: ../ctClass.php?error=si&&m=".$m);
    } else {
   	 	header("Location: ../ctClass.php?agregado=si");	
    }
?>