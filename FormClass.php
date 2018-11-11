<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Spinning Fit Web</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<!--Logo de la pestaña-->
	<link rel="shotcut icon" type="image/x-icon" href="images/LOGO.png">

	<!--Facebook and Twitter integration -->
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
	<link rel="stylesheet" href="css/style.css">

	<script src="js/modernizr-2.6.2.min.js"></script>
	</head>

	<body>
		<div class="colorlib-loader"></div>


		<?php


	include "php/conection.php";
	if (isset($_GET["id"])) {
		$id = $_GET["id"];
		$re = $mysqli->query("SELECT * FROM `clases` WHERE idClases = '".$id."'");
		$f=mysqli_fetch_array($re);
		
//FALTA AGREGAR CAMPO DE "nombre_instructor" en DB
		// $instructorname = $f[''];
		$horaI = $f['hora_inicio'];
		$horaF= $f['hora_fin'];
		$frec = $f['frecuencia'];
	} else {
		$id = 0;
     // $instructorname = "";
		$horaI ="";
		$horaF ="";
		$frec = "";
	}

	?>


	<div id="page">
		<nav class="colorlib-nav" role="navigation" style="background: #25282a;">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div id="colorlib-logo"><a href="index.html">Spinning Fit</a></div>
						</div>
						<div class="col-md-9 text-center menu-1">
							<ul>
								<li><a href="index.html">Inicio</a></li>
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
						<h2 class="text-dark">Clases</h2>
						<p>Registro de las clases que hay</p>
							<!--Captura de Datos-->
							<form action="<?php 
							if (isset($_GET["id"])) {
								echo "php/EditClass.php";
							} else {
								echo "php/CreateClass.php";
							}
							?>" method="POST" enctype="multipart/form-data"> 
							<div class="form-group row justify-content-center">
								<label for="Instrutor" class="col-md-2 col-1 form-control-label">Instructor:</label>
								<div class="col-md-2 col-10">
									<!-- AGREGAR CAMPO DE "nombre_instructor" en DB-->
									<input type="text" id="instructor" name="nom_inst" placeholder="Nombre Instructor" >
								</div>
							</div>
							<div class="form-group row justify-content-center">
								<label for="Hora_Inicio" class="col-md-2 col-1 form-control-label">Hora Inicio</label>
								<div class="col-md-2 col-10">
									<input type="time"  id="horaincio" name="horainicio" placeholder="Hora inicio: 07:00-18:00" min="09:00" max="21:00" value="<?php echo $horaI; ?>" required>
								</div>
							</div>
							<div class="form-group row justify-content-center">
								<label for="Hora_Fin" class="col-md-2 col-1 form-control-label">Hora Fin</label>
								<div class="col-md-2 col-10">
									<input type="time"  id="horafin" name="horafin" placeholder="Hora inicio: 07:00-18:00" min="09:00" max="21:00"  value="<?php echo $horaF; ?>" required>
								</div>
							</div>
							<div class="input-group-prepend">
											<label class="input-group-text" for="inputGroupSelect01">Frecuencia</label> 
										</div>
										<select class="custom-select" id="frecu" name="frecu">
											<option selected>---Selecciones la frecuencia---</option>
											<option value="L,M y V">L,M y V</option>
    										<option value="M y J">M y J</option>
										</select>
									</div>

							
				                 <div class="form-group row justify-content-center">
				                    <div class="col-sm-offset-2 col-sm-10">
				                            <button type="submit" class="btn btn-primary" name="id" value="<?php echo $id; ?>" >Guardar</button>
				                    </div>
				                </div>
                		</form>
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