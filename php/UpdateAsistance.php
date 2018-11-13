<?php
	include ("conection.php");
	$date = date("Y-m-d");
	echo date("Y-m-d");
	$cid = $_POST['clases'];
	$aid = $_POST['Asist'];
	print_r($aid);
	$rm = $mysqli->query("SELECT * FROM asistencia WHERE fecha_asistencia = '".$date."' && Clases_idClases = '".$cid."'");
	if (mysqli_num_rows($rm)>0) {
		header("Location: ../Asistance.php?already=si");
	} else {
		$re = $mysqli->query("SELECT idalumno FROM lista_clase");
		while ($f = mysqli_fetch_array($re)) {
			$A = 'N';
			for ($i=0; $i < count($aid); $i++) { 
				if ($f['idalumno'] == $aid[$i]) {
					$A = 'Y';
				}
			}
			if (!mysqli_query($mysqli, "INSERT INTO `asistencia`(`Alumnos_idAlumnos`, `Clases_idClases`,`fecha_asistencia`,`Comp_asistencia`) VALUES ('".$f['idalumno']."','".$cid."','".$date."','".$A."')")) {
		        $m = mysqli_error($mysqli);
		        header("Location: ../Asistance.php?error=si&&m=".$m);
		    }
		}
		header("Location: ../Asistance.php?agregado=si");
	}
?>