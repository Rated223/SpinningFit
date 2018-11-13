<?php 
	$id = $_POST['id'];
	$list = [];
	$i = 0;
	include "conection.php";
	$re = mysqli_query($mysqli, "SELECT idalumno FROM lista_clase WHERE idclase = '".$id."'");
	while ($f = mysqli_fetch_array($re)) {
		$key = "alumn".$i;
		$re2 = mysqli_query($mysqli, "SELECT idalumno, nombre_alumno, apellido_alumno FROM alumno WHERE idalumno = '".$f['idalumno']."'");
		while ($f2 = mysqli_fetch_array($re2)) {
			$aid = $f2['idalumno'];
			$name = $f2['nombre_alumno']." ".$f2['apellido_alumno'];
			$alumn = [];
			$alumn['aid'] = $aid;
			$alumn['name'] = $name;
			$list[$key] = $alumn;
		}
		$i++;
	}
	echo json_encode($list);
?>