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
	<script>
		function messages(){
			var request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if (request.readyState == 4 && request.status == 200) {
					document.getElementById('Chat').innerHTML = request.responseText;
				}
			}
			request.open('GET', 'php/chat.php?id=<?php echo $_POST['id'] ?>&type=<?php echo $_POST['type'] ?>', true);
			request.send();
		}
		setInterval(function(){messages();}, 1000);
	    function scrollDiv(){
	        setTimeout("document.getElementById('Chat').scrollTo(0,9999);", 400);
	    }

	</script>
	</head>
	<body onload="messages(); scrollDiv();">
	<!--<div class="colorlib-loader"></div>-->

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
						<div class="mt-5 colorlib-heading animate-box">
<?php 
	if ($_POST["type"] == "alumno") {
		$re = $mysqli->query("SELECT * FROM `alumno` WHERE idalumno = '".$_POST["id"]."'");
		$f = mysqli_fetch_array($re);
		$nombre = $f['nombre_alumno']." ".$f['apellido_alumno'];
	} else {
		$re = $mysqli->query("SELECT * FROM `instructor` WHERE idinstructor = '".$_POST["id"]."'");
		$f = mysqli_fetch_array($re);
		$nombre = $f['nombre_instructor']." ".$f['apellido_instructor'];
	}
?>
						<h4 class="mx-5 text-dark"><?php echo $nombre; ?></h4>
						<div id="Chat" class="mx-5 border py-4" style="height: 300px; min-height: 300px; overflow-y: auto; overflow-x: hidden;">
						</div>

						<form method="POST" action="chat.php">
							<div class="row border mx-5">
								<div class="col-12 mt-1">
									<textarea class="w-100 m-0" name="mensaje" rows="1" style="border: 0;"></textarea>
									<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
									<input type="hidden" name="type" value="<?php echo $_POST['type']; ?>">
								</div>
								<div class="col-auto ml-auto">
									<button class="btn btn-info" type="submit" name="enviar" value="Enviar">Enviar</button>
								</div>
							</div>
						</form>
<?php 
	if (isset($_POST['enviar'])) {
		$contenido = $_POST['mensaje'];
		if ($contenido != "") {
			if (!mysqli_query($mysqli, "INSERT INTO `mensajes` (`id_emisor`, `tipo_emisor`, `id_receptor`, `tipo_receptor`, `contenido_mensaje`) VALUES ('".$_SESSION['id']."', '".$_SESSION['tipo']."', '".$_POST['id']."', '".$_POST['type']."', '".$contenido ."')")) {
	            $m = mysqli_error($mysqli);
	            echo "<script type='text/javascript'> alert('$m'); </script>";
	        } else {
	        	echo '<embed loop="false" src="media/message.mp3" hidden="true" autoplay="true">';
	        }
		}
	}
?>
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

