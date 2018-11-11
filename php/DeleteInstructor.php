<?php
	include "conection.php";

	if (!mysqli_query($mysqli, "DELETE FROM `instructor` WHERE `idinstructor`='".$_POST['id']."'")) {
	  	$m = mysqli_error($mysqli);
	  	header("Location: ../ctinstructores.php?error=si&&m=".$m);
	} else {
		header("Location: ../ctinstructores.php?eliminado=si");
	}
    
?>