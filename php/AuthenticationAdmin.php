<?php
	include "conection.php";
	session_start();

	if (isset($_SESSION["tipo"])) {
		if ($_SESSION["tipo"] != "administrador") {
			header("Location: index.php?denied=1");
		}
	} else {
		header("Location: index.php?denied=1");
	}
?> 