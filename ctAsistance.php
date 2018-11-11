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

	<!--logo de la pestaña-->
	<link rel="shortcut icon" type="image/x-icon" href="images/LOGO.png">

	<!-- Facebook and Twitter integraton-->
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
	<link rel="stylesheet" href="css/styleasistencia.css">

	<script src="js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
		<?php

		include "php/conection.php";

		?>
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

		<div id="colorlib-main" style="background-image: url(images/img_bg_3.jpg);" data-stellar-background-ratio="0.5">
					<div class="container">
						<div class="row">
							<div class="col-12 mt-5 bg-white rounded">
								<div class="mt-5 text-center colorlib-heading animate-box">
								<h2 class="text-dark">Asistencia</h2>
								 <p>Se registrarn los alumnos que asistieron un determinado dia</p>



								<!--Checklist donde se especifica la clase  -->
								<form action="php/UpdateAsistance.php" method="POST">
									<div class="form-group row justify-content-center"> 
										<div class="input-group-prepend">
											<label class="input-group-text" for="inputGroupSelect01">Clase</label> 
										</div>
										<select class="custom-select" id="clases" name="clases" onchange="seleccionfiltro()"> 
											<option selected value="0">---Selecciona la clase---</option>
											<?php
											$query=$mysqli->query("SELECT hora_inicio FROM clases");
											while($clases=mysqli_fetch_array($query)){
												echo '<option value="'.$clases["hora_inicio"].'">'.$clases["hora_inicio"].'</option>';
											}
											?>
										</select>

									</div>

									<div class="row justify-content-center">
							     		<label id="Hora" name="Hora" value="" />
							     	</div>

								<table class="table table-striped" id="listas">
									 <thead >
										<tr>
											<th scope="col">Asistencia</th>
											<th scope="col">Alumno</th>
											<th scope="col">Clase</th>
											<th scope="col">Fecha</th> 
										</tr>
									</thead>
									<tbody>
										<?php
											$querylistaclases=$mysqli->query("SELECT * FROM lista_clase");
											while($lista=mysqli_fetch_array($querylistaclases)){
												$idalumno=$lista["idalumno"];
												//echo $idalumno;
												$idclase=$lista["idclase"];
												//echo $idclase;
												$query=$mysqli->query("SELECT * FROM alumno WHERE idalumno=".$idalumno."");
												$queryclases=$mysqli->query("SELECT * FROM clases WHERE idClases=".$idclase."");
												while($nombres=mysqli_fetch_array($query) and $clases=mysqli_fetch_array($queryclases)){
													echo '<tr>
												<th scope="row">
													<div class="row justify-content-center">
													  <div class="input-group-prepend">
													    <div class="input-group-text">
													      <input type="checkbox" id="checkstat" aria-label="Checkbox for following text input" name="Valid[]" value=1>
													      <input type="hidden" id="checkstathidden" aria-label="Checkbox for following text input" name="Valid[]" value=0>
													      
													    </div> 
												</th> 

												<td>
													<div class="row justify-content-center">
											     		<label id="" name="" step="" value="">'.$nombres["nombre_alumno"]." ".$nombres["apellido_alumno"].'
											     	</div>
												</td>

											    <td>
											    	<div class="row justify-content-center">
											     		<label id="FechaAsis" name="" step="" value="">'.$clases["hora_inicio"].'
											     	</div>
											    </td>
											    
											    <th>
											     	<div class="row justify-content-center">
											     		<input type="date" id="fecha" name="fecha" step="1" min="2013-01-01" max="2030-12-31" value="<?php echo $date; ?>" required> 
											     	</div>
											    </th>
											
											</tr> ';
												}
											}
											?>
										
										
									</tbody>
								</table>

				<div class="form-group row justify-content-center">
                    <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" >Guardar Asistencia</button>
                    </div>
                </div>				

				<!--Se termina La tabla-->
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
	<script type="text/javascript">
		function seleccionfiltro(){
			var op=document.getElementById("clases");//Toma elemnto del id Clases
			var text=document.getElementById("Hora");//Toma elemento del id Hora
			
			//De acuerdo a la opcion seleccionada, situa valores en el input
			if(op.selectedIndex==0){
				text.value="";
			}
			if(op.selectedIndex==1){
				text.value="9:00";
			}
			if(op.selectedIndex==2){
				text.value="8:00";
			}
			if(op.selectedIndex==3){
				text.value="18:30";
			}
			if(op.selectedIndex==4){
				text.value="19:30";
			}

			var input, filter, table, tr, td, i;
			  input = document.getElementById("Hora");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("listas");
			  tr = table.getElementsByTagName("tr");
			  for (i = 0; i < tr.length; i++) {
			    td = tr[i].getElementsByTagName("td")[1]; //Es el indice de la columna a buscar
			    if (td) {
			      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
			        tr[i].style.display = "";
			      } else {
			        tr[i].style.display = "none";
			      }
			    }       
			  }
		}

		if(document.getElementById("checkstat").checked){
			document.getElementById("checkstathidden").disabled=true;
		}

	</script>
	</body>
</html>