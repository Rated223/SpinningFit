<?php
	session_start();
	include "conection.php";
	$rid = $_POST["id"];
	$aid = $_SESSION["id"]; //Cambiar este id por el de la session guardada
	    $horaI = $_POST["horainicio"];
		$horaF= $_POST["horafin"];
		$frec = $_POST["frecu"];
	if (!mysqli_query($mysqli, "UPDATE `clases` SET `Instructor_idInstructor`='".$aid."',`hora_inicio`='".$horaI."',`hora_fin`='".$horaF."', `frecuencia`='".$frec."' WHERE `idClases`='".$rid."'")) {
        $m = mysqli_error($mysqli);
        header("Location: ../ctClass.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctClass.php?editado=si");
	}
?>