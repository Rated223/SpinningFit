<?php
	session_start();
	include "conection.php";
	$id=$_POST['id'];
    $x=0;
    $y=0;
    $z=0;
    $contador=0;
	$re2 = $mysqli->query("SELECT * FROM instructor");
    if(mysqli_connect_errno()){
        echo 'conexion fallida: ', mysqli_connect_error;
    }
		while ($f2=mysqli_fetch_array($re2)) {
        	if (($_POST['user'] == $f2['usuario_instructor']) && ($id != $f2['idinstructor'])) {
        		$x=1;
        	}
        	if (($_POST['email'] == $f2['correo_instructor']) && ($id != $f2['idinstructor'])) {
        		$y=1;
        	}
        }

    if ($_POST['pass'] != $_POST['pass2']) {
        $z=1;
    }

    if ($x==1 && $y==1) {
        header("Location: ../ctinstructores.php?repetidos=si");
    } elseif ($x==1) {
        header("Location: ../ctinstructores.php?errorusuario=si");
    } elseif ($y==1) {
        header("Location: ../ctinstructores.php?errorcorreo=si");
    } elseif ($z==1) {
        header("Location: ../ctinstructores.php?errorcontra=si");
    } else {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $salary = $_POST['salary'];
        if (!mysqli_query($mysqli, "UPDATE `instructor` SET `usuario_instructor`='$user',`contrasena_instructor`='$pass',`nombre_instructor`='$name',`apellido_instructor`='$lastname',`direccion_instructor`='$address',`correo_instructor`='$email',`telefono_instructor`='$phone',`sueldo_instructor`='$salary' WHERE `idinstructor`='$id'")) {
            $m = mysqli_error($mysqli);
            header("Location: ../ctinstructores.php?error=si&&m=".$m);
        } else {
            if ($_SESSION['id']==$_POST['id']) {
                $_SESSION['usuario'] = $nombre;
                $_SESSION['contra'] = $contrasena;
            }
            header("Location: ../ctinstructores.php?editado=si");  
        }
        /*
        $rs = $mysqli->query();
        */  
    }
?>