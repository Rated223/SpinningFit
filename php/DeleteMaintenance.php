<?php
	include "conection.php";

	if (!mysqli_query($mysqli, "DELETE FROM `mantenimiento` WHERE `idMantenimiento`='".$_POST['id']."'")) {
	  	$m = mysqli_error($mysqli);
	  	header("Location: ../ctMaintenance.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctMaintenance.php?eliminado=si");
	}
?>