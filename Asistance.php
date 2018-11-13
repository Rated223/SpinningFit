<!DOCTYPE HTML>
<?php include "php/AuthenticationInstructor.php";?>
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
	<?php

	include "php/conection.php";

	?>
 	<div class="colorlib-loader"></div>

     <?php if (isset($_GET["agregado"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ window.alert("Se a guardado la lista de asistencia correctamente."); };
            </script>
    <?php } ?>
    <?php if (isset($_GET["error"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ window.alert("A ocurrido un error al intentar realizar esta acción:\n\n <?php echo $_GET['m'] ?>"); };
            </script>
    <?php } ?>
        <?php if (isset($_GET["already"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ window.alert("Ya se a tomado asistencia el dia de hoy para esta clase."); };
            </script>
    <?php } ?>

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

		<div id="colorlib-main" style="background-image: url(images/img_bg_3.jpg);" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-12 mt-5 bg-white rounded">
						<div class="mt-5 text-center colorlib-heading animate-box">
						<h2 class="text-dark">Asistencia</h2>
							 <p>Se registraran los alumnos que asistieron el dia <span class="text-dark"><?php echo date("d-m-Y"); ?></span></p>
							<form action="php/UpdateAsistance.php" method="POST">
								<div class="form-group row justify-content-center"> 
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01">Clase</label> 
									</div>
									<select class="custom-select" id="clases" name="clases" onchange="AddAlumnos()">
										<option id="Selected" selected value="0">---Selecciona la clase---</option>
										<?php
										$query=$mysqli->query("SELECT * FROM clases WHERE Instructor_idInstructor = '".$_SESSION['id']."'");
										while($clases=mysqli_fetch_array($query)){ 
											echo '<option value="'.$clases["idClases"].'">'.$clases["frecuencia"].' '.$clases["hora_inicio"].'-'.$clases['hora_fin'].'</option>';
										}
										?>
									</select>
								</div>
								<div class="row justify-content-center">
									<div class="col-8 col-m-12">
										<table class="table table-striped table-sm" id="listas">
											 <thead id="Asisthead" class="d-none">
												<tr class="thead-inverse">
													<th class="w-25 text-center" scope="col">Asistencia</th>
													<th scope="col">Alumno</th>
												</tr>
											</thead>
											<tbody class="text-left text-dark" id="container">
											</tbody>
										</table>
									</div>
								</div>
								<div class="form-group row justify-content-center">
				                    <div class="col-sm-offset-2 col-sm-10">
				                            <button id="Asistsave" type="submit" class="btn btn-primary" disabled>Guardar Asistencia</button>
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

  		var thead = document.getElementById("Asisthead");

		function AddAlumnos(){
			document.getElementById("Selected").setAttribute("class", "d-none");
			thead.setAttribute("class", "");
			document.getElementById("container").innerHTML = "";
			document.getElementById("Asistsave").disabled = false;
			var id=document.getElementById("clases").value;//Toma elemnto del id Clases
			var params = {
		        "id" : id
		    };
			$.ajax({
	            type: 'POST',
	            url: "php/ComplementAsistance.php",
	            data: params,
	            success: function(response) {
	            	var json_x = jQuery.parseJSON(response);
	            	console.log(response);
	            	var container = document.getElementById("container");
	            	for (var i = 0; i < Object.keys(json_x).length; i++) {
	            		var key = "alumn"+i;
	            		var tr = document.createElement("tr");

	            		var tdcheck = document.createElement("td");
	            		tdcheck.setAttribute("class", "w-25");
	            		var rowcheck  = document.createElement("div");
	            		rowcheck.setAttribute("class", "row justify-content-center");
	            		var colcheck  = document.createElement("div");
	            		colcheck.setAttribute("class", "col-auto");
	            		var ckeck = document.createElement("input");
	            		ckeck.type = "checkbox";
				    	ckeck.name = "Asist[]";
				    	ckeck.value = json_x[key]['aid'];

	            		var tdname = document.createElement("td");

	            		colcheck.appendChild(ckeck);
	            		rowcheck.appendChild(colcheck);
	            		tdcheck.appendChild(rowcheck);
	            		tdname.innerHTML = json_x[key]['name'];
	            		tr.appendChild(tdcheck);
	            		tr.appendChild(tdname);
	            		container.appendChild(tr);
	            	}
	            }
	        })
			return false;
		}

		/*if(document.getElementById("checkstat").checked){
			document.getElementById("checkstathidden").disabled=true;
		}*/

	</script>
	</body>
</html>