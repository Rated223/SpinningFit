<?php
//Se hace una extension a la conexion de la base 
include ("conection.php");
session_start();

//Recibir los datos y almacenarlos en variables
$id = $_SESSION['id'];
$peso = $_POST["peso"];
$altura = $_POST["altura"];
$notes = $_POST["note"];

//Como aun no se mantiene la sesión del alumno, es dificil traer el id del alumno, por lo que se pone un 1 por mientras.
$insertar = "INSERT INTO notas_alumnos(Alumnos_idAlumnos, descripcion_notas, altura_nota, peso_nota)
VALUES('$id', '$notes', '$altura', '$peso')";

$resultado = mysqli_query($mysqli, $insertar);
$m = mysqli_error($mysqli);

if($resultado){
	echo'<script>alert("El registro se ha agregado exitosamente.");
	window.location.replace("../notas.php");
	</script>';

}else{
	echo $m;
	echo'<script>alert("El registro no se pudo agregar. ");
	window.history.go(-1);</script>';
}

//Cerrar coneexion
mysqli_close($mysqli);
?>
