<?php
	$mysqli = new mysqli("localhost","root","","spinningfitbd");
	if(mysqli_connect_errno()){
		echo 'conexion fallida: ', mysqli_connect_error;
	}
$acentos = $mysqli->query("SET NAMES 'utf8'");
?>