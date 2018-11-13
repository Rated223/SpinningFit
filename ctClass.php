<!DOCTYPE HTML>
<?php include "php/AuthenticationClientInstructor.php";?>

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

	<!-- Validaciones y mensajes-->

	<?php if (isset($_GET["editado"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ window.alert("Las datos se han cambiado correctamente."); };
            </script>
    <?php } ?>
    <?php if (isset($_GET["error"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ window.alert("A ocurrido un error al intentar realizar esta acción:\n\n <?php echo $_GET['m'] ?>"); };
            </script>
    <?php } ?>
    <?php if (isset($_GET["eliminado"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ window.alert("El registro ha sido eliminado."); };
            </script>
    <?php } ?>
    <?php if (isset($_GET["agregado"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ window.alert("El registro se a guardado correctamente."); };
            </script>
    <?php } ?>
    <?php if (isset($_GET["editado"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ window.alert("El registro se a editado correctamente."); };
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
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 mt-5 bg-white rounded">
						<div class="mt-5 text-center colorlib-heading animate-box">
						<h2 class="text-dark">Clases</h2>
						 
						<!-- CABECERA DE CATALOGO -->
						<div class="row mb-3">
							<form action="" method="GET" class="form-inline my-2 col-auto m-auto">
		                        <input class="form-control mr-sm-2" placeholder="Buscar" type="text" name="buscar">
		                        <button class="btn btn-outline-primary my-2" type="submit"><i class="icon-search2 mx-2"></i></button>
		                    </form>
		                    <a class="btn btn-success my-auto ml-auto mr-3 text-white" href="FormClass.php">
		                        Agregar Clase
		                    </a>
	                    </div>

						<?php
		                    $re2 = $mysqli->query("SELECT * FROM `clases`");
		                    $cantidad_resultados = 15;
		                    if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
		                        if ($_GET["page"] != 1) {
		                            $pagina = $_GET["page"];
		                        } else {
		                        	$pagina = 1;
		                        }
		                    } else {
		                        $pagina = 1;
		                    }
		                    $empieza = ($pagina-1) * $cantidad_resultados;
		                    $total_registros = mysqli_num_rows($re2);

		                    $total_paginas = ceil($total_registros / $cantidad_resultados);

		                    if(isset($_GET['buscar'])){
		                        $re = $mysqli->query("SELECT * FROM clases WHERE `Instructor_idInstructor`  LIKE '%".$_GET['buscar']."%' ORDER BY `idClases` ASC LIMIT $empieza, $cantidad_resultados");
		                    } else {
		                        $re = $mysqli->query("SELECT * FROM clases ORDER BY `idClases` ASC LIMIT $empieza, $cantidad_resultados");
		                    }
		                     if ((mysqli_num_rows($re))!=0) {
		                ?>

						<!--TABLA-->
							 <table class="table table-striped table-bordered table-sm table-hover">
								  <thead class="thead-dark bg-dark text-white">
								    
								      <th class="text-center col-auto">#</th>
								      <th class="text-center col-auto">Instructor</th>
								      <th class="text-center col-auto">Hora de Inicio</th>
								      <th class="text-center col-auto">Hora Fin</th>
								      <th class="text-center col-auto">Frecuencia</th>
								      <th class="text-center col-auto">Editar</th>
								      <th class="text-center col-auto">Eliminar</th>
								  </thead>
								  <?php
		                        		while ($f=mysqli_fetch_array($re)) {
		                          ?> 
								 
								    <tr>
										<td class="text-center"><?php echo $f['idClases']; ?></td>

			                             <!--CAMBIAR POR NOMBRE DE INSTRUCTOR-->
										<td class="text-center"><?php echo $f['Instructor_idInstructor']; ?></td>

								        <td class="text-center"><?php echo $f['hora_inicio']; ?></td>
								        <td class="text-center"><?php echo $f['hora_fin']; ?></td>
								        <td class="text-center"><?php echo $f['frecuencia']; ?></td>
								      	 <td>
		                        			<a href="FormClass.php?id=<?php echo $f['idClases']; ?>" class="btn btn-info btn-sm">
		                                		<i class="icon-edit" aria-hidden="true"></i>
		                           			</a>
		                        		</td>

								       <td class="text-center">
		                            	<form action="php/DeleteClass.php" method="POST">
		                                	<button type="submit" class="btn btn-danger btn-sm" name="id" value="<?php echo $f['idClases']; ?>">
		                                    	<i class="icon-trash" aria-hidden="true"></i>
		                                	</button>
		                            	</form>
		                       			</td>
								    </tr>
								  <?php
		                        		}
		                        	?>
							  </table>
											<!-- PAGINACION -->
						<nav class="mt-4" aria-label="Page navigation example">
		                    <ul class="pagination justify-content-center">
		                        <li class="page-item <?php if($pagina==1){ echo "disabled";} ?>">
		                            <a class="page-link" href="?page=<?php echo ($pagina-1); ?>" tabindex="-1"><i class="icon-arrow-left2"></i></a>
		                        </li>
		                        <?php
		                            if ($pagina<4) {
		                                $i = 1;
		                            } else {
		                                $i = $pagina-2;
		                            }
		                            if ($total_paginas<=5) {
		                                 $Muestra_paginas = $total_paginas;
		                            } else {
		                            	if ($pagina==1 	|| $pagina==2) {
		                            		$Muestra_paginas = 5;
		                            	} elseif ($pagina==($total_paginas-1)) {
		                            		$Muestra_paginas = $pagina+1;
		                            		$i = $pagina-3;
		                            	} elseif ($pagina==$total_paginas) {
		                            		$Muestra_paginas = $pagina;
		                            		$i = $pagina-4;
		                            	} else {
		                            		$Muestra_paginas = $pagina+2;
		                            	}
		                                
		                            }
		                            for ($i; $i<=$Muestra_paginas; $i++) {
		                                print '<li class="page-item ';
		                                if($pagina==$i){print 'disabled';}
		                                echo '"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
		                            }; 
		                        ?>       
		                        <li class="page-item <?php if($pagina==$total_paginas){ echo "disabled";} ?>">
		                            <a class="page-link" href="?page=<?php echo ($pagina+1); ?>""><i class="icon-arrow-right2"></i></a>
		                        </li>
		                    </ul>
		                </nav>
		                <?php
		                } else {
		                    echo "<div class='col-12 m-5'><center><strong>No hay registros</strong></center></div>";
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