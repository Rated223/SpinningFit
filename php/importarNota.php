<?php
    include("php/conection.php");
	$id2update = $_SESSION["idNota"];
	$sql = "SELECT * FROM notas_alumnos WHERE idNotas_Alumnos LIKE '$id2update'";
    $resultado = mysqli_query($mysqli, $sql);
    mysqli_close($mysqli);
?>