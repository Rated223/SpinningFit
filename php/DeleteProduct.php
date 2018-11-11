<?php
	include "conection.php";

	if (!mysqli_query($mysqli, "DELETE FROM `productos` WHERE `idProductos`='".$_POST['id']."'")) {
	  	$m = mysqli_error($mysqli);
	  	header("Location: ../ctProducts.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctProducts.php?eliminado=si");
	}
?>