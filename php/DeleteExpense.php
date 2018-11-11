<?php
	include "conection.php";

	if (!mysqli_query($mysqli, "DELETE FROM `gastos` WHERE `idGastos`='".$_POST['id']."'")) {
	  	$m = mysqli_error($mysqli);
	  	header("Location: ../ctExpenses.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctExpenses.php?eliminado=si");
	}
?>