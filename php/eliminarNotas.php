<?php
//Se hace una extension a la conexion de la base 
include ("conection.php");

$id = $_POST["idNota"];

$sql = "DELETE FROM notas_alumnos WHERE idNotas_Alumnos LIKE '$id'";

if(mysqli_query($mysqli,$sql)){
	echo'<script>alert("La nota se ha eliminado exitosamente.");
	window.location.replace("../notas.php");
	</script>';

}else{
	echo'<script>alert("La nota no se ha podido eliminar.");
	window.history.go(-1);</script>';
}

mysqli_close($mysqli);
?>
