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
    <?php if (isset($_GET["error"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ window.alert("A ocurrido un error al intentar realizar esta acción:\n\n <?php echo $_GET['m'] ?>"); };
            </script>
    <?php } ?>
    <?php if (isset($_GET["saleid"])){ ?>
            <script type="text/javascript">
            	direct = "php/recibo.php?id=<?php echo $_GET["saleid"] ?>";
            	console.log(direct);
            	window.open(direct, '_blank');
                window.onload = function(){ window.alert("Se ha registrado la venta."); };
            </script>
    <?php } ?>
	<div class="colorlib-loader"></div>

	<?php

	include "php/conection.php";

	?>

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
			<div class="container-fluid">
				<div class="row">
					<div class="col-6 mt-5 bg-white" style="border-right: solid 1px #d9d9d9;">
						<div class="mt-5 text-center colorlib-heading animate-box">
						<h2 class="text-dark">Ventas</h2>
							<form action="javascript:AddProduct()" method="POST" >
								<div class="form-group row justify-content-center">
									<div class="col-md-5 col-10">
									<?php
									
									$queryfolio=$mysqli->query("SELECT folio_venta FROM ventas ORDER BY folio_venta DESC");
									if (mysqli_num_rows($queryfolio)>0) {
										while($folio=mysqli_fetch_array($queryfolio)){
											$Folio=$folio["folio_venta"]+1;
										}
									} else {
										$Folio = 1;
									}
								echo'<input type="hidden" id="" name=""  value="'.$Folio.'"  required disabled>';
								?>
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Admin: </label>
									<div class="col-md-5 col-10">
										<input type="text" class="form-control" id="" name="" placeholder="Id" value="<?php echo $_SESSION['id']; ?>" readonly required>
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Producto:</label>
									<div class="col-md-5 col-10">
										<select id="listaproducto" class="form-control" onchange="recargar()">
											<option id="Seleccione" value="0">Seleccione</option>
											<?php
											$query=$mysqli->query("SELECT * FROM productos");
											$rows=array();
											while($productos=mysqli_fetch_assoc($query)){
											?>
											<option value="<?php echo $productos["idProductos"]; ?>"><?php echo $productos["nombre_producto"];?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Id:</label>
									<div class="col-md-5 col-10">
										<input type="number" class="form-control" id="idProducto" name="" placeholder="0" value="" required>
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Precio:</label>
									<div class="col-md-5 col-10">
										<input type="number" class="form-control" id="PrecioProducto" name="" placeholder="0" value="" required>
									</div>
								</div>
								<div class="form-group row justify-content-center">
									<label for="user" class="col-md-2 col-12 form-control-label">Cantidad:</label>
									<div class="col-md-5 col-10">
										<input type="number" class="form-control" id="CantChose" name="" placeholder="0" value="" min="1" required>
										<p class="font-weight-light text-dark font-italic mt-1"> - max: <span id="CantProducto"></span> -</p>
									</div>
								</div>
								<input type="hidden" id="nameProducto" name="">
								<div class="form-group row justify-content-center">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="" class="btn btn-primary" id="btnAgregar" name="id" disabled>Agregar al carrito</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-6 mt-5 bg-white">
						<form action="php/CreateSale.php" method="POST">
							<div class="mt-5 text-center colorlib-heading animate-box">
								<h3 class="mx-3 text-left">Folio: <?php echo $Folio; ?></h3>
								<input type="hidden" name="Folio" value="<?php echo $Folio; ?>">
								<div class="sales-container">
									<div class="col-12">
										<div class="comments-container">
											<ul id="comments-list" class="list-group">
												<div class="list-group-item text-dark font-weight-bold">
													<div class="row justify-content-center">
														<div class="col-2 text-center">
															ID
														</div>
														<div class="col-4 text-left">
															Nombre del Producto
														</div>
														<div class=" col-2 text-center">
															Cantidad
														</div>
														<div class=" col-2 text-center">
															Subtotal
														</div>
														<div class=" col-2 text-center">
															Eliminar
														</div>
													</div>
												</div>
											</ul>
										</div>
									</div>
								</div>
								<div class="row justify-content-end">
									<div class="col-auto">
										<div class="fontTotal" id="total"></div>
									</div>
									<div class="col-auto">
										<button type="submit" id="MakeSale" class="btn btn-primary" disabled>Finalizar Venta</button>
									</div>
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

	<div class="gototop js-top text-left">
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

  		var total = 0;

  		function recargar(){
  			var id = document.getElementById("listaproducto").value;
  			var params = {
		        "id" : id
		    };

	        $.ajax({
	            type: 'POST',
	            url: "php/ComplementSales.php",
	            data: params,
	            success: function(response) {
	            	var json_x = jQuery.parseJSON(response);
	            	if (json_x.cantidad_producto>0) {
	            		document.getElementById("btnAgregar").disabled = false;
		                document.getElementById("idProducto").value = json_x.idProductos;
		                document.getElementById("idProducto").max = json_x.idProductos;
		                document.getElementById("idProducto").min = json_x.idProductos;
		                document.getElementById("PrecioProducto").value = json_x.precio_producto;
		                document.getElementById("PrecioProducto").max = json_x.precio_producto;
		                document.getElementById("PrecioProducto").min = json_x.precio_producto;
		                document.getElementById("CantChose").value = "";
		                document.getElementById("CantChose").max = json_x.cantidad_producto;
		                document.getElementById("CantProducto").innerHTML = json_x.cantidad_producto;
		                document.getElementById("nameProducto").value = json_x.nombre_producto;
	            	} else {
	            		alert("No quedan unidades de este producto");
	            		document.getElementById("idProducto").value = "";
	            		document.getElementById("PrecioProducto").value = "";
            		 	document.getElementById("CantChose").value = "";
	            		document.getElementById("CantProducto").innerHTML = "";
	            	}
	            }
	        })
	        return false;
	    }

	    function AddProduct() {
	    	document.getElementById("MakeSale").disabled = false;
	    	/* Obtenemos los valores del form */
	    	var id = document.getElementById("idProducto").value;
	    	var Nom = document.getElementById("nameProducto").value;
	    	var Pre = document.getElementById("PrecioProducto").value;
	    	var Cant = document.getElementById("CantChose").value;
	    	var identificador = "#row"+id;
	    	if($(identificador).length == 0) {
	    		/* Creamos la estructura HTML de la nueva fila */
		    	var Container = document.getElementById("comments-list");
		    	var Product = document.createElement("div");
		    	Product.setAttribute("class", "list-group-item");
		    	Product.id = "row"+id;
		    	var row = document.createElement("div");
		    	row.setAttribute("class", "row justify-content-center");
		    	var Colid = document.createElement("div");
		    	Colid.setAttribute("class", "col-2 text-center");
		    	Colid.innerHTML = id;
		    	var Colname = document.createElement("div");
		    	Colname.setAttribute("class", "col-4 text-left");
		    	Colname.innerHTML = Nom;
		    	var Colpre = document.createElement("div");
		    	Colpre.setAttribute("class", "col-2 text-center");
		    	Colpre.setAttribute("id", "Pre"+id);
		    	subtotal = Pre*Cant;
		    	Colpre.innerHTML = subtotal;
		    	var Colcant = document.createElement("div");
		    	Colcant.setAttribute("class", "col-2 text-center");
		    	Colcant.innerHTML = Cant;
		    	var Delete = document.createElement("span");
		    	Delete.setAttribute("class", "icon-cancel-1");
		    	var EnDelete = document.createElement("a");
		    	EnDelete.setAttribute("class", "mx-auto");
		    	EnDelete.setAttribute("href", "javascript:RemoveRow("+id+")");
		    	var ColDelete = document.createElement("div");
		    	ColDelete.setAttribute("class", "col-2");
		    	/* inputs con los valores de los productos */
		    	var inid = document.createElement("input");
		    	inid.type = "hidden";
		    	inid.name = "id[]";
		    	inid.value = id;
		    	inid.id = "in"+id;
		    	var inCant = document.createElement("input");
		    	inCant.type = "hidden";
		    	inCant.name = "Cant[]";
		    	inCant.value = Cant;
		    	inCant.id = "Cant"+id;
		   		/* Agregamos todos los elementos creados al documento */
		    	EnDelete.appendChild(Delete);
		    	ColDelete.appendChild(EnDelete);
		    	row.appendChild(Colid);
		    	row.appendChild(Colname);
		    	row.appendChild(Colcant);
		    	row.appendChild(Colpre);
		    	row.appendChild(ColDelete);
		    	Product.appendChild(row);
		    	Container.appendChild(Product);
		    	Container.appendChild(inid);
		    	Container.appendChild(inCant);
		    	total += subtotal;
		    	document.getElementById("total").innerHTML = "Total: $"+total;
	    	} else {
	    		alert("Este producto ya esta en la lista.\n\nDebe eliminarlo si desea cambiar la cantidad.");
	    		console.log($(identificador));
	    	}
	    }

	    function RemoveRow(id) {
	    	var identRow = "row"+id;
	    	var identid = "in"+id;
	    	var identcant = "Cant"+id;
	    	var identPre = "Pre"+id;
	    	var subtotal =document.getElementById(identPre).innerHTML;
	    	document.getElementById(identRow).remove();
	    	document.getElementById(identid).remove();
	    	document.getElementById(identcant).remove();
	    	total -= subtotal;
	    	if (document.getElementById("comments-list").childNodes.length == 3) {
	    		document.getElementById("MakeSale").disabled = true;
	    		document.getElementById("total").innerHTML = "";
	    	} else{
	    		document.getElementById("total").innerHTML = "Total: $"+total;
	    		console.log(document.getElementById("comments-list").childNodes.length);
	    	}
	    }

	</script>
	</body>
</html>