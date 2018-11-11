<?php
	session_start();
	include "conection.php";
	$id=$_POST['id'];
    $x=0;
    $y=0;
    $z=0;
    $contador=0;
	$re2 = $mysqli->query("SELECT * FROM alumno");
    if(mysqli_connect_errno()){
        echo 'conexion fallida: ', mysqli_connect_error;
    }
		while ($f2=mysqli_fetch_array($re2)) {
        	if (($_POST['user'] == $f2['usuario_alumno']) && ($id != $f2['idalumno'])) {
        		$x=1;
        	}
        	if (($_POST['email'] == $f2['correo_alumno']) && ($id != $f2['idalumno'])) {
        		$y=1;
        	}
        }

    if ($_POST['pass'] != $_POST['pass2']) {
        $z=1;
    }

    if ($x==1 && $y==1) {
        header("Location: ../ctClients.php?repetidos=si");
    } elseif ($x==1) {
        header("Location: ../ctClients.php?errorusuario=si");
    } elseif ($y==1) {
        header("Location: ../ctClients.php?errorcorreo=si");
    } elseif ($z==1) {
        header("Location: ../ctClients.php?errorcontra=si");
    } else {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        if (!mysqli_query($mysqli, "UPDATE `alumno` SET `usuario_alumno`='$user',`contrasena_alumno`='$pass',`nombre_alumno`='$name',`apellido_alumno`='$lastname',`direccion_alumno`='$address',`correo_alumno`='$email',`telefono_alumno`='$phone' WHERE `idalumno`='$id'")) {
            $m = mysqli_error($mysqli);
            header("Location: ../ctClients.php?error=si&&m=".$m);
        } else {
            header("Location: ../ctClients.php?editado=si");  
        }
        /*
        $rs = $mysqli->query();
        */  
    }
?>