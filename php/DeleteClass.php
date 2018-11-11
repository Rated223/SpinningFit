<?php
	include "conection.php";

	if (!mysqli_query($mysqli, "DELETE FROM `clases` WHERE `idClases`='".$_POST['id']."'")) {
	  	$m = mysqli_error($mysqli);
	  	header("Location: ../ctClass.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctClass.php?eliminado=si");
	}
?>