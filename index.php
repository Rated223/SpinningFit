<!DOCTYPE HTML>
<?php 
	include "php/conection.php"; 
	session_start();
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
	<?php if (isset($_GET["success"])){ ?>
            <!--<script type="text/javascript">
                window.onload = function(){ window.alert("bienvenido <?php echo $_SESSION["usuario"] ?>."); };
            </script>-->
    <?php } ?>
    <?php if (isset($_GET["denied"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ window.alert("No tiene autorización para entrar a esta ruta."); };
            </script>
    <?php } ?>
    <?php if (isset($_GET["error"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ window.alert("Ha ocurrido un error al intentar mandar notificaciones de esta acción a los usuarios."); };
            </script>
    <?php } ?>
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div id="colorlib-logo"><a href="index.php">Spinning Fit</a></div>
						</div>
						<div class="col-md-9 text-center menu-1">
							<ul>
								<li class="active"><a href="index.php">Inicio</a></li>
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

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/spinning_bg1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Esto es un estilo de vida , no hay una linea de meta </h1>
				   					<p><a href="contact.html" class="btn btn-primary btn-lg btn-learn">Unete a la comunidad</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_5.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>No te detengas cuando duela, detente cuando hayas terminado</h1>
				   					<p><a href="contact.html" class="btn btn-primary btn-lg btn-learn">Unete a la comunidad</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_6.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Deja de desear, empieza a hacer</h1>
				   					<p><a href="contact.html"  class="btn btn-primary btn-lg btn-learn">Unete a la comunidad</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_7.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Hacer ejercicio es una recompensa, no un castigo</h1>
				   					<p><a href="contact.html" href="#ventanareg" class="btn btn-primary btn-lg btn-learn" data-toggle="modal">Unete a la comunidad</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>	
			  	</ul>
		  	</div>
		</aside>
		
		<div id="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-md-12 intro-wrap animate-box">
						<div class="intro-flex">
							<div class="one-third intro-img" style="background-image: url(images/intro-img-1.jpg)">
								<div class="desc">
									<h3>Fortalece y tonifica musculos</h3>
									<span class="price text-center">$350.00<br><small>/mensual</small></span>
								</div>
							</div>
							<div class="one-third intro-img" style="background-image: url(images/intro-img-2.jpg)">
								<div class="desc">
									<h3>Quema calorias y recude tú estrés</h3>
									<p></p>
									<span class="price text-center">$350.00<br><small>/mensual</small></span>
								</div>
							</div>
							<div class="one-third intro-img" style="background-image: url(images/intro-img-3.jpg)">
								<div class="desc">
									<h3>Mejora cardiovascular</h3>
									<p></p>
									<span class="price text-center">$350.00<br><small>/mensual</small></span>
								</div>
							</div>
						</div>
		         </div>
				</div>
			</div>
		</div>

		<div id="colorlib-services">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Estar en forma es atractivo</h2>
						<p>Con Spinning Fit te ayudaremos tonificar tus músculos sin aumentar tu volumen muscular, consiguiendo estilizar tu figura. Ven y visítanos</p>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-schedule" class="colorlib-light-grey">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Nuestros Horarios</h2>
						<p>Revisa las horarios que ofrecemos en Spinning Fit de Lunes a Viernes</p>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="schedule text-center animate-box">
						<div class="col-md-12">
						</div>
						<div class="schedule-flex">
<?php  
	$re2 = mysqli_query($mysqli, "SELECT hora_inicio, hora_fin, frecuencia, nombre_instructor, apellido_instructor FROM clases INNER JOIN instructor WHERE clases.Instructor_idInstructor = instructor.idinstructor");
	while ($f2 = mysqli_fetch_array($re2)) {
?>
							<div class="entry-forth">
								<p class="icon"><span><i class="flaticon-gym"></i></span></p>
								<p class="time"><span><?php echo $f2['hora_inicio']." - ".$f2['hora_fin']; ?></span></p>
								Frecuencias: <span class="text-uppercase text-dark"><?php echo $f2['frecuencia']; ?></span>
								<hr>
								<h3>Instructor</h3>
								<p class="trainer"><span><?php echo $f2['nombre_instructor']." ".$f2['apellido_instructor']; ?></span></p>
							</div>
<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Agregar testimonios realistas -->
		<div id="colorlib-testimony" class="testimony-img" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Que dice la gente</h2>
						<h3>Historias de éxito</h3>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="row animate-box">
							<div class="owl-carousel1">
								<div class="item">
									<div class="testimony-slide">
										<div class="testimony-wrap">
											<blockquote>
												<span>Sophia Foster Loose 20 libras en solo 2 meses</span>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel amet deserunt architecto nulla maiores non ducimus eligendi consequuntur, tempore cupiditate.</p>
											</blockquote>
											<div class="figure-img" style="background-image: url(images/person1.jpg);"></div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="testimony-slide">
										<div class="testimony-wrap">
											<blockquote>
												<span>John Collins</span>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, incidunt laudantium, natus officia debitis odit.</p>
											</blockquote>
											<div class="figure-img" style="background-image: url(images/person2.jpg);"></div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="testimony-slide">
										<div class="testimony-wrap">
											<blockquote>
												<span>Adam Ross</span>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro commodi omnis suscipit cumque qui hic sequi tenetur, repellat sit. Eos suscipit eligendi rerum minus in.</p>
											</blockquote>
											<div class="figure-img" style="background-image: url(images/person3.jpg);"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Agregar dinamicamente div.trainers-entry por cada registro en la tabla instructores de la BDD -->
		<div class="colorlib-trainers">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Nuestros entrenadores con experiencia</h2>
						<p>Conoce a nuestros instructores certificados</p>
					</div>
				</div>
				<div class="row">
<?php  
	$re3 = mysqli_query($mysqli, "SELECT * FROM instructor");
	while ($f3 = mysqli_fetch_array($re3)) {
?>
					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="trainer-img" style="background-image: url(images/trainer-<?php echo $f3['idinstructor']; ?>.jpg)"></div>
							<div class="desc">
								<h3><?php echo $f3['nombre_instructor']." ".$f3['apellido_instructor']; ?></h3>
								<span><?php echo $f3['correo_instructor']; ?></span>
							</div>
						</div>
					</div>
<?php } ?>
				</div>
			</div>
		</div>

		<!-- Agregar dinamicamente div.event-entry por cada registro en la tabla eventos de la BDD con fecha posterior a la actual -->
		<div class="colorlib-event colorlib-light-grey">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Próximos Eventos</h2>
						<p>Enterate y participa en las dinámicas que tenemos preparadas para próximas fechas.</p>
					</div>
				</div>
				<div class="row row-pb-sm">
<?php 
	$re = mysqli_query($mysqli, "SELECT *, DATE_FORMAT(fecha_anuncio, '%d') AS day_F, DATE_FORMAT(fecha_anuncio, '%b') AS month_F FROM anuncios WHERE fecha_anuncio > DATE_FORMAT(NOW(), '%Y-%m-%d') ORDER BY fecha_anuncio ASC LIMIT 6");
		while ($f = mysqli_fetch_array($re)) {
?>
					<div class="col-md-4 animate-box">
						<div class="event-entry">
							<div class="desc">
								<p class="meta"><span class="day"><?php echo $f['day_F']; ?></span><span class="text-uppercase month"><?php echo $f['month_F']; ?></span></p>
								<h2><a href="event.html"><?php echo $f['titulo_anuncio']; ?></a></h2>
								<p class="organizer"><span><?php echo $f['descripcion_anuncio']; ?></span></p>
							</div>
							<div class="location">
								<img src="images/<?php echo $f['imagen_anuncio']; ?>" class="img-fluid img-thumbnail" alt="Responsive image">
							</div>
						</div>
					</div>
<?php } ?>	
				</div>
			</div>
		</div>
		<div id="colorlib-subscribe" class="subs-img" style="background-image: url(images/img_bg_7.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						
					</div>
				</div>
				<div class="row animate-box justify-content-center">
					<div class="col-md-6 col-md-offset-3">
						<div class="row">
							<div class="col-md-12">
							<form class="form-inline qbstp-header-subscribe">
								<div class="col-three-forth">
									<div class="form-group">
										<input type="text" class="form-control" id="email" placeholder="Enter your email">
									</div>
								</div>
								<div class="col-one-third">
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Suscribete</button>
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
	</div>

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

