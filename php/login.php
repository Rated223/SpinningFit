<?php
	include("conection.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"]== "POST"){
		$usuario=mysqli_real_escape_string($mysqli, $_POST['user']);
		$contrasena=mysqli_real_escape_string($mysqli,$_POST['pass']);

		$tipo=mysqli_real_escape_string($mysqli, $_POST['Type']);

		$sql="SELECT*FROM ".$tipo." WHERE usuario_".$tipo."='$usuario' AND contrasena_".$tipo."='$contrasena'";
		$result=mysqli_query($mysqli,$sql);

		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

		$count=mysqli_num_rows($result);
		if($usuario=="" || $contrasena==""){
			$message = "Llena los campos correspondientes";
			echo "<script type='text/javascript'> alert('$message'); history.back(); </script>";
		}
		$id = $row['id'.$tipo];
		if($count==1){
			$_SESSION=[
				"id"=>$id,
				"tipo"=>$tipo,
				"usuario"=>$usuario
			];
			header("Location: ../index.php?success=1");
		} else {
			header("Location: ../login.php?errorusuario=1");
		}

	}
?>