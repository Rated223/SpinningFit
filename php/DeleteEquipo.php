<?php
	include "conection.php";

	if (!mysqli_query($mysqli, "DELETE FROM `equipo` WHERE `idEquipo`='".$_POST['id']."'")) {
	  	$m = mysqli_error($mysqli);
	  	header("Location: ../ctEquipo.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctEquipo.php?eliminado=si");
	}
?>