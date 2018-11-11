<?php
	if (isset($_SESSION["id"])) {
		echo '<li><a href="php/Logout.php">Cerrar sesión</a></li>';
	} else {
		echo '<li><a href="login.php">Iniciar sesión</a></li>';
	}
?>