<?php
	session_start();
	include "conection.php";
	$id = $_SESSION["id"]; //cambiar por el id de la session
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$mail = $_POST['mail'];
	$phone = $_POST['phone'];
	$salary = $_POST['salary'];
	$key = $_POST['key'];
	if (!mysqli_query($mysqli, "INSERT INTO `mantenimiento`(`Administrador_idAdministrador`, `nombre_mantenimiento`, `apellido_mantenimiento`, `correo_mantenimiento`, `telefono_mantenimiento`, `sueldo_mantenimiento`, `clave_mantenimiento`) VALUES ('".$id."','".$name."','".$lastname."','".$mail."','".$phone."','".$salary."','".$key."')")) {
        $m = mysqli_error($mysqli);
        header("Location: ../ctMaintenance.php?error=si&&m=".$m);
    } else {
	    header("Location: ../ctMaintenance.php?agregado=si");
    }
?>