<?php
	include "conection.php";

	if (!mysqli_query($mysqli, "DELETE FROM `ventas` WHERE `idVentas`='".$_POST['id']."'")) {
	  	$m = mysqli_error($mysqli);
	  	header("Location: ../ctSales.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctSales.php?eliminado=si");
	}
?>