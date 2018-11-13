<?php 
include 'conection.php';
if (isset($_SESSION["tipo"])) {
	if ($_SESSION["tipo"] == 'alumno') {
?>
	<div data-pushbar-id="client-menu" class="pushbar from_left pushbar-menu bg-light">
		<div>
			<a class="btn-cerrar" data-pushbar-close><span class="icon-cancel-1"></span></a>
		</div>
		<nav class="menuPush">
			<div id="colorlib-logo"><a class="text-dark" href="index.php">Spinning Fit</a></div>
			<div class="text-right m-2">
				<div class="d-inline-block">
					<?php 
						$re = $mysqli->query("SELECT * FROM `notificaciones` WHERE `id_usuario` = '".$_SESSION['id']."' && `tipo_usuario` = 'alumno' && `leido_notificacion` = '0'");
						$re2 = $mysqli->query("SELECT * FROM `mensajes` WHERE `id_receptor` = '".$_SESSION['id']."' && `tipo_receptor` = 'alumno' && `leido_mensaje` = '0'");
					 ?>
					 <?php if ((mysqli_num_rows($re2))!=0) { ?>
					<div class="<?php if ((mysqli_num_rows($re))!=0) {echo "numMes";}else{echo "numNot";} ?>" style="z-index: 1;"><?php echo mysqli_num_rows($re2); ?></div>
					<?php } ?>
					<a href="messagesList.php" class="<?php if ((mysqli_num_rows($re))!=0) {echo "chat" ;} ?> text-dark">
						<i class="icon-chat-empty m-2"></i>
					</a>

					<?php if ((mysqli_num_rows($re))!=0) { ?>
					<div class="numNot"><?php echo mysqli_num_rows($re); ?></div>
					<?php } ?>
					<a href="notificationsList.php" class="text-dark">
						<i class="icon-bell-alt m-2"></i>
					</a>
				</div>
			</div>
			<a href="">
				<div class="navLink"><span class="icon-user"></span>Perfil</div>
			</a>
			<a href="">
				<div class="navLink"><span class="icon-contacts"></span>Instructor</div>
			</a>
			<a href="">
				<div class="navLink"><span class="icon-calendar-inv"></span>Calendario</div>
			</a>
			<a href="notas.php">
				<div class="navLink"><span class="icon-doc-text-inv"></span>Notas</div>
			</a>
			<a href="">
				<div class="navLink"><span class="icon-chart-line-1"></span>Avances</div>
			</a>
			<a href="">
				<div class="navLink"><span class="icon-info-circled"></span>Información de inscripción</div>
			</a>
		</nav>
	</div>


<?php
	} elseif ($_SESSION["tipo"] == 'instructor') {
?>
	<div data-pushbar-id="instructor-menu" class="pushbar from_left pushbar-menu bg-light">
		<div>
			<a class="btn-cerrar" data-pushbar-close><span class="icon-cancel-1"></span></a>
		</div>
		<nav class="menuPush">
			<div id="colorlib-logo"><a class="text-dark" href="index.php">Spinning Fit</a></div>
			<div class="text-right m-2">
				<div class="d-inline-block">
					<?php 
						$re = $mysqli->query("SELECT * FROM `notificaciones` WHERE `id_usuario` = '".$_SESSION['id']."' && `tipo_usuario` = 'instructor' && `leido_notificacion` = '0'");
						$re2 = $mysqli->query("SELECT * FROM `mensajes` WHERE `id_receptor` = '".$_SESSION['id']."' && `tipo_receptor` = 'instructor' && `leido_mensaje` = '0'");
					 ?>
				  	<?php if ((mysqli_num_rows($re2))!=0) { ?>
					<div class="<?php if ((mysqli_num_rows($re))!=0) {echo "numMes";}else{echo "numNot";} ?>"><?php echo mysqli_num_rows($re2); ?></div>
					<?php } ?>
					<a href="messagesList.php" class="<?php if ((mysqli_num_rows($re))!=0) {echo "chat" ;} ?> text-dark">
						<i class="icon-chat-empty m-2"></i>
					</a>

					<?php if ((mysqli_num_rows($re))!=0) { ?>
					<div class="numNot"><?php echo mysqli_num_rows($re); ?></div>
					<?php } ?>
					<a href="notificationsList.php" class="text-dark">
						<i class="icon-bell-alt m-2"></i>
					</a>
				</div>
			</div>
			<a href="">
				<div class="navLink"><span class="icon-user"></span>Perfil</div>
			</a>
			<a href="Asistance.php">
				<div class="navLink"><span class="icon-clipboard"></span>Asistencia</div>
			</a>
			<a href="ctClass.php">
				<div class="navLink"><span class="icon-clipboard"></span>Clases</div>
			</a>
			<a href="">
				<div class="navLink"><span class="icon-pitch"></span>Rutinas</div>
			</a>
			<a href="">
				<div class="navLink"><span class="icon-chart-line"></span>Aparatos</div>
			</a>
		</nav>
	</div>


<?php
	} elseif ($_SESSION["tipo"] == 'administrador') {
?>
	<div data-pushbar-id="instructor-menu" class="pushbar from_left pushbar-menu bg-light">
		<div>
			<a class="btn-cerrar" data-pushbar-close><span class="icon-cancel-1"></span></a>
		</div>
		<nav class="menuPush">
			<div id="colorlib-logo"><a class="text-dark" href="index.php">Spinning Fit</a></div>


			
			<div class="text-right m-2">
				<div class="d-inline-block">
					<?php 
						$re = $mysqli->query("SELECT * FROM `notificaciones` WHERE `id_usuario` = '".$_SESSION['id']."' && `tipo_usuario` = 'administrador' && `leido_notificacion` = '0'");
						if ((mysqli_num_rows($re))!=0) {
					 ?>
					<div class="numNot"><?php echo mysqli_num_rows($re); ?></div>
					<?php } ?>
					<a href="notificationsList.php" class="text-dark">
						<i class="icon-bell-alt m-2"></i>
					</a>
				</div>
			</div>

			<a href="">
				<div class="navLink"><span class="icon-user"></span>Perfil</div>
			</a>
			<a href="ctadmins.php">
				<div class="navLink"><span class="icon-clipboard"></span>Administradores</div>
			</a>
			<a href="ctinstructores.php">
				<div class="navLink"><span class="icon-clipboard"></span>Instructores</div>
			</a>
			<a href="ctClients.php">
				<div class="navLink"><span class="icon-clipboard"></span>Alumnos</div>
			</a>
			<a href="ctAds.php">
				<div class="navLink"><span class="icon-clipboard"></span>Anuncios</div>
			</a>
			<a href="ctExpenses.php">
				<div class="navLink"><span class="icon-clipboard"></span>Gastos</div>
			</a>
			<a href="ctSales.php">
				<div class="navLink"><span class="icon-clipboard"></span>Ventas</div>
			</a>
			<a href="ctProducts.php">
				<div class="navLink"><span class="icon-clipboard"></span>Productos</div>
			</a>
			<a href="ctInvoices.php">
				<div class="navLink"><span class="icon-clipboard"></span>Facturas</div>
			</a>
			<a href="ctEquipo.php">
				<div class="navLink"><span class="icon-clipboard"></span>Equipos</div>
			</a>
			<a href="ctMaintenance.php">
				<div class="navLink"><span class="icon-clipboard"></span>Mantenimiento</div>
			</a>
			<a href="">
				<div class="navLink"><span class="icon-chart-line-1"></span>Reportes</div>
			</a>
		</nav>
	</div>
<?php
	}
}

?>