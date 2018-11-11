<?php
	session_start();
	include "conection.php";
	/* COMPROBAMOS QUE EL ARCHIVO SUBIDO SEA UNA IMAGEN */
	print_r($_FILES);
	if (($_FILES['imagen']['type'] != 'image/jpeg') && ($_FILES['imagen']['type'] != 'image/png')) {
    	header("Location: ../ctAds.php?formato=no");
    } else {
    	/* SI ES ASI, PROCEDEMOS A CREAR UN REGISTRO EN LA BDD, AUN NO SE SUBE LA IMAGEN */
    	$id = $_SESSION["id"]; //Cambiar este id por el de la session guardada
		$title = $_POST["title"];	
		$desc = $_POST["Description"];
		$date = $_POST["FechaAnun"];
		if (!mysqli_query($mysqli, "INSERT INTO `anuncios` (Administrador_idAdministrador, titulo_anuncio, descripcion_anuncio, fecha_anuncio) VALUES ('".$id."', '".$title."', '".$desc."', '".$date."')")) {
            $m = mysqli_error($mysqli);
            header("Location: ../ctAds.php?error=si&&m=".$m);
        }
        /* BUSCAMOS EL ULTIMO REGISTRO QUE ACABAMOS DE AGREGAR PARA OBTENER EL ID GENERADO */
        $re = $mysqli->query("SELECT * FROM `anuncios`");
        if(mysqli_connect_errno()){
            echo 'conexion fallida: ', mysqli_connect_error;
        }
        while ($f=mysqli_fetch_array($re)) {
			$idn = 0;
        	if ($f['idAnuncios']>$idn) {
        		$idn = $f['idAnuncios'];
        	}
    	}
    	/* LE CAMBIAMOS EL NOMBRE A LA IMAGEN SUBIDA POR EL ID DEL REGISTRO DE SU ANUNCIO */
    	if ($_FILES['imagen']['type'] == 'image/jpeg') {
       		$_FILES['imagen']['name'] = $idn.'.jpg';
       	} else {
       		$_FILES['imagen']['name'] = $idn.'.png';
       	}

       	/* ACTUALIZAMOS EL CAMPO nombre_imagen DEL REGISTRO CON EL NOMBRE QUE ACABAMOS DE PONER */
       	if (!mysqli_query($mysqli, "UPDATE anuncios SET imagen_anuncio='".$_FILES['imagen']['name']."' WHERE idAnuncios = '$idn'")) {
            $m = mysqli_error($mysqli);
            header("Location: ../ctAds.php?error=si&&m=".$m);
        } else {
          /* MOVEMOS EL ARCHIVO A LA CARPETA DE IMAGENES */
          move_uploaded_file($_FILES['imagen']['tmp_name'], "../images/" . $_FILES['imagen']['name']);
          $re2 = $mysqli->query("SELECT * FROM `anuncios` ORDER BY idAnuncios DESC");
          $f2 = mysqli_fetch_array($re2);
         	header("Location: MakeNotifications.php?type=1&&id=".$f2['idAnuncios']);
        }
    }
?>