<?php
	include "conection.php";

	if (!mysqli_query($mysqli, "DELETE FROM `alumno` WHERE `idalumno`='".$_POST['id']."'")) {
	  	$m = mysqli_error($mysqli);
	  	header("Location: ../ctClients.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctClients.php?eliminado=si");
	}
?>