<?php
	session_start();
	include "conection.php";
	$id=$_POST['id'];
    $x=0;
    $y=0;
    $z=0;
    $contador=0;
	$re2 = $mysqli->query("SELECT * FROM administrador");
    if(mysqli_connect_errno()){
        echo 'conexion fallida: ', mysqli_connect_error;
    }
		while ($f2=mysqli_fetch_array($re2)) {
        	if (($_POST['user'] == $f2['usuario_administrador']) && ($id != $f2['idadministrador'])) {
        		$x=1;
        	}
        	if (($_POST['email'] == $f2['correo_administrador']) && ($id != $f2['idadministrador'])) {
        		$y=1;
        	}
        }

    if ($_POST['pass'] != $_POST['pass2']) {
        $z=1;
    }

    if ($x==1 && $y==1) {
        header("Location: ../ctadmins.php?repetidos=si");
    } elseif ($x==1) {
        header("Location: ../ctadmins.php?errorusuario=si");
    } elseif ($y==1) {
        header("Location: ../ctadmins.php?errorcorreo=si");
    } elseif ($z==1) {
        header("Location: ../ctadmins.php?errorcontra=si");
    } else {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $salary = $_POST['salary'];
        $key = $_POST['key'];
        if (!mysqli_query($mysqli, "UPDATE `administrador` SET `usuario_administrador`='$user',`contrasena_administrador`='$pass',` nombre_administrador`='$name',`apellido_administrador`='$lastname',`direccion_administrador`='$address',`correo_administrador`='$email',`telefono_administrador`='$phone',`sueldo_administrador`='$salary',`clave_administrador`='$key' WHERE `idadministrador`='$id'")) {
            $m = mysqli_error($mysqli);
            header("Location: ../ctadmins.php?error=si&&m=".$m);
        } else {
            if ($_SESSION['id']==$_POST['id']) {
                $_SESSION['usuario'] = $nombre;
                $_SESSION['contra'] = $contrasena;
            }
            header("Location: ../ctadmins.php?editado=si");  
        }
        /*
        $rs = $mysqli->query();
        */  
    }
?>