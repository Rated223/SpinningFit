<?php
	include "conection.php";

	if (!mysqli_query($mysqli, "DELETE FROM `facturas` WHERE `idFacturas`='".$_POST['id']."'")) {
	  	$m = mysqli_error($mysqli);
	  	header("Location: ../ctInvoices.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctInvoices.php?eliminado=si");
	}
?>