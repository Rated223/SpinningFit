<!DOCTYPE HTML>
<?php include "php/AuthenticationClient.php";?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Spinning Fit Web</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	
	
        <link rel="shortcut icon" type="image/x-icon" href="images/LOGO.png"> <!--Logo de pestañas-->


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
	<link rel="stylesheet" href="css/stylenotas.css">
	<link rel="stylesheet" href="css/fontello.css">
	<link rel="shortcut icon" type="image/x-icon" href="images/LOGO.png">
	<script src="js/modernizr-2.6.2.min.js"></script>
	

	<script src="js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
		
	<!--<div class="colorlib-loader"></div>-->

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
		
		<div id="colorlib-main" style="background-image: url(images/img_bg_3.jpg);" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-12 mt-5 bg-white rounded">
						<div class="mt-5 text-center colorlib-heading animate-box">
						<h2 class="text-dark">Notas</h2>
						 <p>Realiza notas personales </p>


 <!--Captura datos-->
						<form action="php/insertarNotas.php" method="POST" onsubmit="return validarNota()">						
							<div class="form-group row justify-content-left">
								<label for="num_peso" class="col-md-2 col-1 form-control-label">Peso:</label>
								<div class="col-md-2 col-10"> 
									<input type="text" class="form-control" id="peso" name="peso" placeholder="Ej. 64 Kg">
								</div>
							</div>
							<div class="form-group row justify-content-left">
								<label for="no_altura" class="col-md-2 col-1 form-control-label">Altura:</label>
								<div class="col-md-2 col-10">
									<input type="text" class="form-control" id="altura" name="altura" placeholder="Ej. 1.70 m">
								</div>
							</div>
									<label for="user" class="col-md-3 col-12 form-control-label">Nota:</label>
                                                        <div class="col-md-10 col-10">
                                                            <textarea type="text" class="form-control" id="notes" name="note" placeholder="Escriba su nota..."></textarea>
                                                        </div><br>                     
							    <div class="form-group row justify-content-center">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Guardar Nota</button>
                                            </div>
                                        </div>
						</form>

<!--Fin de capturar datos-->
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="colorlib-services">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
					<h2>Lista de notas</h2>
					<div class="comments-container">
						<ul id="comments-list" class="comments-list">
							<?php
							include ("php/consultarNotas.php");
							mysqli_close($mysqli);
							?>
						</ul>
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
	<script src="js/functionNotes.js"></script>
	</body>
</html>

