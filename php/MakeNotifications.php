<?php 
	include "conection.php";
	$type = $_GET['type'];
	switch ($type) {
		case 1:
			$id = $_GET['id'];
			$re = $mysqli->query("SELECT * FROM anuncios WHERE idAnuncios = '$id'");
			$f = mysqli_fetch_array($re);
			$re2 = $mysqli->query("SELECT * FROM administrador");
			while ($f2 = mysqli_fetch_array($re2) ) {
				if (!mysqli_query($mysqli, "INSERT INTO `notificaciones`(`id_usuario`, `tipo_usuario`, `tipo_notificacion`, `titulo_notificacion`, `contenido_notificacion`, `leido_notificacion`) VALUES ('".$f2['idadministrador']."','administrador','1','Evento: ".$f['titulo_anuncio']."','".$f['descripcion_anuncio']."','0')")) {
			        $m = mysqli_error($mysqli);
			        header("Location: ../ctExpenses.php?error=si&&m=".$m);
			    }
			}
			$re3 = $mysqli->query("SELECT * FROM instructor");
			while ($f3 = mysqli_fetch_array($re3) ) {
				if (!mysqli_query($mysqli, "INSERT INTO `notificaciones`(`id_usuario`, `tipo_usuario`, `tipo_notificacion`, `titulo_notificacion`, `contenido_notificacion`, `leido_notificacion`) VALUES ('".$f3['idinstructor']."','instructor','1','Evento: ".$f['titulo_anuncio']."','".$f['descripcion_anuncio']."','0')")) {
			        $m = mysqli_error($mysqli);
			        header("Location: ../ctExpenses.php?error=si&&m=".$m);
			    }
			}
			$re4 = $mysqli->query("SELECT * FROM alumno");
			while ($f4 = mysqli_fetch_array($re4) ) {
				if (!mysqli_query($mysqli, "INSERT INTO `notificaciones`(`id_usuario`, `tipo_usuario`, `tipo_notificacion`, `titulo_notificacion`, `contenido_notificacion`, `leido_notificacion`) VALUES ('".$f4['idalumno']."','alumno','1','Evento: ".$f['titulo_anuncio']."','".$f['descripcion_anuncio']."','0')")) {
			        $m = mysqli_error($mysqli);
			        header("Location: ../ctExpenses.php?error=si&&m=".$m);
			    }
			}
			header("Location: ../ctAds.php?agregado=si");
			break;
		
		default:
			header("Location: ../index.php?error=si");
			break;
	}

?>