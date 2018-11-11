<?php
//Se hace una extension a la conexion de la base 
include ("conection.php");
$aid = $_SESSION["id"];

//Se consulta la tabla y se guardan diversas variables auxiliares para la consulta de las notas.
//$converter = "SELECT FROM_UNIXTIME(fecha_nota) AS '%Y %D %M' FROM notas_alumnos";
$sql = "SELECT *, DATE_FORMAT(fecha_nota,'%d/%m/%Y') AS 'fecha_nota_formato' FROM notas_alumnos WHERE Alumnos_idAlumnos = '$aid'";
$resultado = mysqli_query($mysqli, $sql);

$notedate = array();
$comments = array();
$height = array();
$weight = array();


if(mysqli_num_rows($resultado)>0)
    {
        while($row = mysqli_fetch_assoc($resultado)){
            $id[] = $row['idNotas_Alumnos'];
            $notedate[] = $row['fecha_nota_formato'];
            $height[] = $row['altura_nota'];
            $weight[] = $row['peso_nota'];
            $comments[] = $row['descripcion_notas'];
        }
    } else {
            echo "No hay notas registradas";
    }


//Contenedor del comentario
for ($i=0; $i < mysqli_num_rows($resultado) ; $i++) {
    echo '<li>';
    echo '<div class="comment-main-level">';
    echo '<div class="comment-box">';
    echo '<div class="comment-head">';
    echo '<h6 class="comment-name">'.'<a>'.'Fecha: '.$notedate[$i].'</a>'.'</h6>';
    echo '<form action="php/editarNotasAux.php" method="POST">';
    echo '<i>'.'<button type=submit class="icon-edit" name = "idNota" value = "'.$id[$i].'">'.'</button>'.'</i>';
    echo '</form>'; 
    echo '<form action="php/eliminarNotas.php" method="POST" onsubmit = "return eraseConfirm();">';
    echo '<i>'.'<button type="submit" class="icon-trash" name = "idNota"  value = "'.$id[$i].'">'.'</button>'.'</i>';
    echo '</form>';
    echo '<br><span>'.'Peso: '.$weight[$i].'</span>'.'<span>'.'&emsp;Altura: '.$height[$i].'</span>';
    echo '</div>';
    echo '<div class="comment-content">'.$comments[$i].'</div>';
    echo '</div>';
    echo '</div>';
    echo '</li>';
}	
?>