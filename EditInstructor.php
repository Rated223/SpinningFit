<!DOCTYPE HTML>
<?php 
	include "php/conection.php"; 
	$id = $_POST['id'];
	$re = $mysqli->query("SELECT * FROM `instructor` WHERE `idinstructor` = '$id'");
	$f=mysqli_fetch_array($re);
?>
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
							<h2 class="text-dark">Editar datos de adminsitrador</h2>
							<form action="php/EditInstructor.php" method="POST">
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Nombre de Usuario:</label>
									<div class="col-md-5 col-10">
										<input type="text" class="form-control" id="user" name="user" placeholder="Nombre de Usuario" value ="<?php echo $f['usuario_instructor']; ?>">
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="pass" class="col-md-2 col-12 form-control-label">Contraseña:</label>
									<div class="col-md-5 col-10">
										<input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" value ="<?php echo $f['contrasena_instructor']; ?>">
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Confirmar contraseña:</label>
									<div class="col-md-5 col-10">
										<input type="password" class="form-control" id="pass2" name="pass2" placeholder="Contraseña" value ="<?php echo $f['contrasena_instructor']; ?>">
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Nombre:</label>
									<div class="col-md-5 col-10">
										<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value ="<?php echo $f['nombre_instructor']; ?>">
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Apellidos:</label>
									<div class="col-md-5 col-10">
										<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos" value ="<?php echo $f['apellido_instructor']; ?>">
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Dirección:</label>
									<div class="col-md-5 col-10">
										<input type="text" class="form-control" id="address" name="address" placeholder="Dirección" value ="<?php echo $f['direccion_instructor']; ?>">
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Correo:</label>
									<div class="col-md-5 col-10">
										<input type="email" class="form-control" id="email" name="email" placeholder="Correo" value ="<?php echo $f['correo_instructor']; ?>">
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Telefono:</label>
									<div class="col-md-5 col-10">
										<input type="text" class="form-control" id="phone" name="phone" placeholder="Telefono" value ="<?php echo $f['telefono_instructor']; ?>">
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Sueldo:</label>
									<div class="col-md-5 col-10">
										<input type="text" class="form-control" id="salary" name="salary" placeholder="Sueldo" value ="<?php echo $f['sueldo_instructor']; ?>">
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-primary" name="id" value="<?php echo $id; ?>">Enviar</button>
									</div>
								</div>
							</form>
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

