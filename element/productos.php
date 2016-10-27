<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Productos - OT</title>
		<link rel="stylesheet" href="../css/foundation.css">
		<link rel="stylesheet" href="../css/clientes.css">
		<link rel="stylesheet" href="../css/index.css">
		<link rel="stylesheet" href="../css/font-awesome-4.6.3/css/font-awesome.css">
		<link rel="stylesheet" href="../css/tabs.css">
	</head>
	<body>
		<menu class="men-princi">
			<ul>
				<li style="float:left;">LOGO</li>
				<li style="float:right;">
					<div id="nav-prin"> 
						<a href="#" id="nav-link"><i class="fa fa-bars"></i></a> 
					</div>
				</li>
			</ul>
		</menu>
		<div class="miga-pan">
			<a href="../inicio.php">
				Home
			</a>
			/
			<a>
				Productos
			</a>
		</div>
		<div class="titulo-seccion">
			<h3>PRODUCTOS</h3>
		</div>
		
		<ul class="tabs">
			<li span id="taber-one">
				LISTAR PRODUCTOS
			</li>
			<li id="taber-two">
				CREAR PRODUCTO
			</li>
		</ul>
		<div class="contener">
			<div class="content-one active">
				<div class="container">
					<table>
						<thead>
							<tr>
								<th>id</th>
								<th>Producto</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody id="mostrarProductos">
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="content-two">
				<div class="container">
					<form id="" name="">
						
						<div class="row">
							<div class="large-6 columns">
						      	<label>Codigo
						        	<input type="text" placeholder="Codigo del producto" name="cod_producto" id="cod_producto">
						      	</label>
						    </div>
						    <div class="large-6 columns">
						      	<label>Producto
						        	<select name="producto" id="producto">
										<option value="">-- Seleccione una opción --</option>
						        	</select>
						      	</label>
						    </div>
						</div>
						<hr>
						<div class="row">
							<div class="large-12 columns text-right">
								<button class="button success"> <i class="fa fa-send"></i> Enviar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		

	</body>
	<?php include "../tpl/menu-principal.php" ?>
	<script src="../js/vendor/jquery.js"></script>
	<script src="../js/vendor/foundation.min.js"></script>
	<script src="../js/menu.js"></script>
	<script src="../js/tabs.js"></script>
	<script src="../js/app/productos.js"></script>
</html>