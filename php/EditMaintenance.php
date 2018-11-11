<?php
	session_start();
	include "conection.php";
	$rid = $_POST["id"];
	$id = $_SESSION["id"]; //cambiar por el id de la session
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$mail = $_POST['mail'];
	$phone = $_POST['phone'];
	$salary = $_POST['salary'];
	$key = $_POST['key'];
	if (!mysqli_query($mysqli, "UPDATE `mantenimiento` SET `Administrador_idAdministrador`='".$id."',`nombre_mantenimiento`='".$name."',`apellido_mantenimiento`='".$lastname."',`correo_mantenimiento`='".$mail."',`telefono_mantenimiento`='".$phone."',`sueldo_mantenimiento`='".$salary."',`clave_mantenimiento`='".$key."' WHERE `idMantenimiento`='".$rid."'")) {
        $m = mysqli_error($mysqli);
        header("Location: ../ctMaintenance.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctMaintenance.php?editado=si");
	}
?>