<?php
//Se hace una extension a la conexion de la base 
include ("conection.php");
session_start();

$_SESSION['idNota'] = $_POST['idNota'];

echo'<script>
	window.location.replace("../editarNotas.php");
    </script>';

mysqli_close($mysqli);

?>