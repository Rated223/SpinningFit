<!DOCTYPE HTML>
<?php include "php/AuthenticationClientInstructor.php"; ?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Spinning Fit Web</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" type="text/css" href="css/pushbar.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/fontello.css">
	<link rel="shortcut icon" type="image/x-icon" href="images/LOGO.png">
	<script src="js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation" style="background: #25282a;">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div id="colorlib-logo"><a href="index.php">Spinning Fit</a></div>
						</div>
						<div class="col-md-9 text-center menu-1">
							<ul>
								<li><a href="index.php">Inicio</a></li>
								<li><a href="schedule.html">Horarios</a></li>
								<li><a href="trainers.html">Instructores</a></li>
								<li><a href="info.html">Acerca de</a></li>
								<li><a href="contact.html">Contacto</a></li>
								<?php include "php/SessionButtons.php"; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php include "php/UserMenus.php"; ?>
		</nav>
		
		<div id="colorlib-main" style="background-image: url(images/img_bg_5.jpg);" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-12 mt-5 bg-white rounded">
						<div class="mt-5 text-center colorlib-heading animate-box">
						<h2 class="text-dark">Mensajes</h2>
						<div class="list-group text-left mx-5">
							<li class="list-group-item">
								<div class="row">
									<div class="col-6 font-weight-bold">
										Nombre
									</div>
									<div class="col-3 font-weight-bold">
										Tipo
									</div>
									<div class="col-3 font-weight-bold">
										Clase
									</div>
								</div>
							</li>
<?php 
 /* Comprobamos el tipo de usuario */
 if ($_SESSION["tipo"] == "alumno") {
 	 /* Si el usuario es alumno, buscamos las clases en las que esta inscrito */
 	 $re = $mysqli->query("SELECT idclase FROM `lista_clase` WHERE idalumno = '".$_SESSION["id"]."'");
 	 while ($f=mysqli_fetch_array($re)) {
 	 	 /* Por cada clase a la que esta inscrito buscamos el registro correspondiente */
 	 	$re2 = $mysqli->query("SELECT * FROM `clases` WHERE idclases = '".$f["idclase"]."'");
 	 	$f2=mysqli_fetch_array($re2);
 	 	 /* despues con el id del instructor de cada clase consultamos sus datos */
 		$re3 = $mysqli->query("SELECT * FROM `instructor` WHERE idinstructor = '".$f2["Instructor_idInstructor"]."'");
 		$f3=mysqli_fetch_array($re3);
 		 /* Imprimimos los datos del instructor y de la clase en pantalla */
?>
							<form method="POST" action="chat.php">
								<input type="hidden" name="type" value="instructor">
								<button type="submit" class="list-group-item list-group-item-action<?php 

							$rm = $mysqli->query("SELECT * FROM `mensajes` WHERE id_emisor = '".$f2["Instructor_idInstructor"]."' && tipo_emisor = 'instructor' && id_receptor = '".$_SESSION['id']."' && tipo_receptor = '".$_SESSION['tipo']."' && leido_mensaje = '0'");
								if (mysqli_num_rows($rm)>0) {
									echo " bg-light";
								}

							 ?>" name="id" value="<?php echo $f3['idinstructor']; ?>">
									<div class="row">
										<div class="col-6">
											<?php echo $f3['nombre_instructor']." ".$f3['apellido_instructor']; ?>
										</div>
										<div class="col-3">
											Instructor
										</div>
										<div class="col-3">
											<?php echo $f2['hora_inicio']."-".$f2['hora_fin']." ".$f2['frecuencia']; ?>
										</div>
									</div>
								</button>
							</form>
<?php
		/* Seleccionamos los id de todos los alumnos que estan inscritos en la misma clase */
		$re4 = $mysqli->query("SELECT idalumno FROM `lista_clase` WHERE idclase = '".$f["idclase"]."'");
		while ($f4=mysqli_fetch_array($re4)) {
			/* Despues, consultamos los datos de cada alumno */
			$re5 = $mysqli->query("SELECT * FROM `alumno` WHERE idalumno = '".$f4["idalumno"]."'");
			$f5=mysqli_fetch_array($re5);
			/* Comprobamos que no se impriman los datos del  mismo usuario */
			if ($f5['idalumno'] != $_SESSION['id']) {
				/* Imprimimos los datos de todos los demas alumnos con su respectiva clase */
?>
							<form method="POST" action="chat.php">
								<input type="hidden" name="type" value="alumno">
								<button type="submit" class="list-group-item list-group-item-action<?php 

							$rm = $mysqli->query("SELECT * FROM `mensajes` WHERE id_emisor = '".$f5['idalumno']."' && tipo_emisor = 'alumno' && id_receptor = '".$_SESSION['id']."' && tipo_receptor = '".$_SESSION['tipo']."' && leido_mensaje = '0'");
								if (mysqli_num_rows($rm)>0) {
									echo " bg-light";
								}

							 ?>" name="id" value="<?php echo $f5['idalumno']; ?>">
									<div class="row">
										<div class="col-6">
											<?php echo $f5['nombre_alumno']." ".$f5['apellido_alumno']; ?>
										</div>
										<div class="col-3">
											Alumno
										</div>
										<div class="col-3">
											<?php echo $f2['hora_inicio']."-".$f2['hora_fin']." ".$f2['frecuencia']; ?>
										</div>
									</div>
								</button>
							</form>
<?php
			}
		}
 	 }
 
 } else {
 	/* Si el usuario es un instructor, buscamos todas las clases que imparte */
 	$re = $mysqli->query("SELECT * FROM `clases` WHERE Instructor_idInstructor = '".$_SESSION["id"]."'");
 	while ($f=mysqli_fetch_array($re)) {
 		/* Por cada clase, conslutamos los id de los alumnos inscritos a esas clases */
 		$re2 = $mysqli->query("SELECT * FROM `lista_clase` WHERE idclase = '".$f['idClases']."'");
 		while ($f2=mysqli_fetch_array($re2)) {
 			/* Y por cada alumno de cada clase, buscamos sus datos */
 			$re3 = $mysqli->query("SELECT * FROM `alumno` WHERE idalumno = '".$f2['idalumno']."'");
 			$f3=mysqli_fetch_array($re3);
?>
							<form method="POST" action="chat.php">
								<input type="hidden" name="type" value="alumno">
								<button type="submit" class="list-group-item list-group-item-action" name="id" value="<?php echo $f3['idalumno']; ?>">
									<div class="row">
										<div class="col-6">
											<?php echo $f3['nombre_alumno']." ".$f3['apellido_alumno']; ?>
										</div>
										<div class="col-3">
											Alumno
										</div>
										<div class="col-3">
											<?php echo $f['hora_inicio']."-".$f['hora_fin']." ".$f['frecuencia']; ?>
										</div>
									</div>
								</button>
							</form>
<?php
 		}
 	}
 }

 ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer id="colorlib-footer">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 colorlib-widget">
					<h4>Acerca de Spinning Fit </h4>
					<!-- Cambiar el siguiente texto -->
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur minima nam soluta provident numquam. Aspernatur laborum aliquid, esse accusamus libero asperiores, nemo nobis excepturi quas veniam commodi at eaque quidem.</p>
					<p>
						<ul class="colorlib-social-icons">
							<!-- Agregar enlaces a redes sociales, o dejar en blanco -->
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
				<div class="col-md-3 colorlib-widget">
					<h4>Links</h4>
					<p>
						<ul class="colorlib-footer-links">
							<li><a href="info.html"><i class="icon-check"></i> Acerca de</a></li>
							<li><a href="schedule.html"><i class="icon-check"></i> Horarios</a></li>
							<li><a href="trainers.html"><i class="icon-check"></i> Instructores</a></li>
							<li><a href="contact.html"><i class="icon-check"></i> Contacto</a></li>
						</ul>
					</p>
				</div>

				<div class="col-md-3 colorlib-widget">
					<h4>Info de contacto</h4>
					<ul class="colorlib-footer-links">
						<li>Calle Hidalgo #910-Col. concordia Santa Catarina<br>  CP. 66168- Local #906 </li>
						<li><a href="tel://1234567920"><i class="icon-phone"></i> + 1235 2355 98</a></li>
						<!-- Agregar un correo de contacto -->
						<li><a href="mailto:info@yoursite.com"><i class="icon-envelope"></i> info@yoursite.com</a></li>
						<li><a href="http://luxehotel.com"><i class="icon-location4"></i> spinningfitweb.com</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="copy">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							<small class="block">&copy;
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-up-big"></i></a>
	</div>
	<?php include "php/UserMenus2.php"; ?>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<script src="js/jquery.countTo.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript" src="js/pushbar.js"></script>
	<script type="text/javascript">
	  	var pushbar = new Pushbar({
        	blur:true,
        	overlay:true,
  		});
	</script>
	</body>
</html>

