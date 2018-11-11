<?php
	session_start();
	include "conection.php";
	$rid = $_POST["id"];
	/* OBTENEMOS EL NOMBRE DEL ARCHIVO DE IMAGEN ACTUAL */
	$re = $mysqli->query("SELECT imagen_anuncio FROM `anuncios` WHERE `idAnuncios`=".$rid);
   	$f = mysqli_fetch_array($re);
   	/* VERIFICAMOS SI SE HA SUBIDO UNA IMAGEN Y SI CUMPLE CON EL FORMATO REQUERIDO */
	if (!($_FILES['imagen']['size']==0)) {
		if (($_FILES['imagen']['type'] != 'image/jpeg') && ($_FILES['imagen']['type'] != 'image/png')) {
    		header("Location: ../ctAds.php?formato=no");
    	} else {
    		/* SI SE CUMPLEN AMBAS COSAS, LE DAMOS NOMBRE AL ARCHIVO, BORRAMOS LA IMAGEN ANTERIOR, COPIAMOS LA NUEVA EN LA CARPETA DE IMAGENES Y LLENAMOS EL CAMPO CORRESPONDIENTE */
    		if ($_FILES['imagen']['type'] == 'image/jpeg') {
	       		$_FILES['imagen']['name'] = $rid.'.jpg';
	       	} else {
	       		$_FILES['imagen']['name'] = $rid.'.png';
	       	}
	       	unlink("../images/" .$f['imagen_anuncio']);
	       	move_uploaded_file($_FILES['imagen']['tmp_name'], "../images/" . $_FILES['imagen']['name']);
	       	$img = $_FILES['imagen']['name'];
    	}
	} else {
		/* SI NO SE SUBIO UNA IMAGEN, GUARDAMOS EN EL CAMPO CORRESPONDIENTE EL MISMO NOMBRE QUE YA TENIA */
		$img = $f['imagen_anuncio'];
	}
	$aid = $_SESSION["id"]; //Cambiar este id por el de la session guardada
	$title = $_POST["title"];	
	$desc = $_POST["Description"];
	$date = $_POST["FechaAnun"];
	/* EJECUTAMOS EL QUERY PARA ACTUALIZAR LA TABLA */
	if (!mysqli_query($mysqli, "UPDATE `anuncios` SET `Administrador_idAdministrador`='".$aid."',`imagen_anuncio`='".$img."',`titulo_anuncio`='".$title."',`descripcion_anuncio`='".$desc."',`fecha_anuncio`='".$date."' WHERE `idAnuncios`='".$rid."'")) {
        $m = mysqli_error($mysqli);
        header("Location: ../ctAds.php?error=si&&m=".$m);
        echo "UPDATE `anuncios` SET `Administrador_idAdministrador`='".$aid."',`imagen_anuncio`='".$img."',`titulo_anuncio`='".$title."',`descripcion_anuncio`='".$desc."',`fecha_anuncio`='".$date."' WHERE `idAnuncios`='".$rid."'";
	} else {
		header("Location: ../ctAds.php?editado=si");
	}
?>