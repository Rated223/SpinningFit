<?php
	include "conection.php";

	if (!mysqli_query($mysqli, "DELETE FROM `administrador` WHERE `idadministrador`='".$_POST['id']."'")) {
	  	$m = mysqli_error($mysqli);
	  	header("Location: ../ctadmins.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctadmins.php?eliminado=si");
	}
    
?>