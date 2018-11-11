<?php 
	include "conection.php";
	session_start();
	$re = $mysqli->query("SELECT * FROM `mensajes` WHERE `id_emisor` = '".$_SESSION['id']."' && `tipo_emisor` = '".$_SESSION['tipo']."' && `id_receptor` = '".$_GET['id']."' && `tipo_receptor` = '".$_GET['type']."' UNION SELECT * FROM `mensajes` WHERE `id_emisor` = '".$_GET['id']."' && `tipo_emisor` = '".$_GET['type']."' && `id_receptor` = '".$_SESSION['id']."' && `tipo_receptor` = '".$_SESSION['tipo']."' ORDER BY `fecha_mensaje` ASC");
	while ($f=mysqli_fetch_array($re)) {
		if ($f['id_emisor']==$_SESSION['id'] && $f['tipo_emisor']==$_SESSION['tipo']) {
?>
							<div class="w-100">
								<div class="row px-4 my-1 justify-content-end">
									<div class="col-auto text-white bg-info p-2 chatboxR">
										<?php echo $f['contenido_mensaje']; ?>
									</div>
								</div>
							</div>
<?php
		} else {
?>
							<div class="w-100">
								<div class="row px-4 my-1">
									<div class="col-auto text-white bg-secondary p-2 chatboxE">
										<?php echo $f['contenido_mensaje']; ?>
									</div>
								</div>
							</div>
<?php 
		}
	}
	$re2 = $mysqli->query("UPDATE `mensajes` SET `leido_mensaje`='1' WHERE id_receptor = '".$_SESSION['id']."'&& tipo_receptor = '".$_SESSION['tipo']."'");
 ?>