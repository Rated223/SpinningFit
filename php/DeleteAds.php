<?php
	include "conection.php";

	if (!mysqli_query($mysqli, "DELETE FROM `anuncios` WHERE `idAnuncios`='".$_POST['id']."'")) {
	  	$m = mysqli_error($mysqli);
	  	header("Location: ../ctAds.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctAds.php?eliminado=si");
	}
    
?>