<?php
//Se hace una extension a la conexion de la base 
include ("conection.php");
session_start();

$id2update = $_SESSION['idNota'];

$newaltura = $_POST["altura"];
$newpeso = $_POST["peso"];
$newnotes = $_POST["note"];

$sql = "UPDATE notas_alumnos SET altura_nota='$newaltura', peso_nota='$newpeso ', descripcion_notas='$newnotes' 
WHERE idNotas_Alumnos LIKE '$id2update'";

if(mysqli_query($mysqli,$sql)){
	echo'<script>alert("La nota se ha actualizado exitosamente.");
	window.location.replace("../notas.php");
	</script>';

}else{
	echo'<script>alert("La nota no se ha podido actualizar.");
	window.history.go(-1);</script>';
}


mysqli_close($mysqli);

?>