<?php
include ("conection.php");
	$query=$mysqli->query("SELECT idalumno FROM alumno");
	$queryclase=$mysqli->query("SELECT idClases FROM clases");
	
	$asistencia=$_POST['Valid'];
	$fecha=date("d-m-Y");

	$i=0;
	while($alumno=mysqli_fetch_array($query) and $clase=mysqli_fetch_array($queryclase) and $i<count($asistencia)){
		$IDA=$alumno["idalumno"];
		$IDC=$clase["idClases"];
		if($asistencia[$i]==1){
			unset($asistencia[$i+1]);
			$sql="INSERT INTO asistencia (idAsistencia, Alumnos_idAlumnos, Clases_idClases, fecha_asistencia) VALUES (null,'.$IDA.','.$IDC.','.$fecha.')";
			if($mysqli->query($sql)===TRUE){
				
			}
			else{
				echo 'No se creo nada';
			}
			//echo 'Asistio';
		}
		else{
			$sql="INSERT INTO asistencia (idAsistencia, Alumnos_idAlumnos, Clases_idClases, fecha_asistencia) VALUES (null,'.$IDA.','.$IDC.','NO ASISTIO')";
			if($mysqli->query($sql)===TRUE){

			}
			else{
				echo 'No se creo nada';
			}
		}
		$i++;
	}
	echo '<script language="javascript">';
echo 'alert("Asistencia actualizada")';

echo '</script>';
	$nueva_asistencia=array_values($asistencia);
?>