<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Clientes - OT</title>
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
				Clientes
			</a>
		</div>
		<div class="titulo-seccion">
			<h3>CLIENTES</h3>
		</div>
		
		<ul class="tabs">
			<li span id="taber-one">
				LISTAR CLIENTES
			</li>
			<li id="taber-two">
				CREAR CLIENTE
			</li>
		</ul>
		<div class="contener">
			<div class="content-one active">
				<div class="container">
					<table>
						<thead>
							<tr>
								<th>Nit</th>
								<th>Cliente</th>
								<th>Telefono</th>
								<th>Telefono</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="content-two">
				<div class="container">
					<form action="">
						<div class="row">
							<div class="large-4 columns">
						      	<label>Fecha
						        	<input type="text" placeholder="Fecha" name="fecha" id="fecha" value="<?php echo date('d/M/Y')?>" readonly>
						      	</label>
						    </div>
						</div>
						<div class="row">
							<div class="large-6 columns">
						      	<label>Nombre del Cliente
						        	<input type="text" placeholder="Nombre del Cliente" name="cliente" id="cliente">
						      	</label>
						    </div>
						    <div class="large-5 columns">
						      	<label>Nit
						        	<input type="text" placeholder="Nit" name="nit" id="nit">
						      	</label>
						    </div>
						    <div class="large-1 columns">
						      	<label>DV
						        	<input type="text" placeholder="DV" name="dv" id="dv">
						      	</label>
						    </div>
						</div>
						<div class="row">
							<div class="large-6 columns">
						      	<label>Nombre Corto Cliente
						        	<input type="text" placeholder="Nombre Corto Cliente" name="nombre-corto" id="nombre-corto">
						      	</label>
						    </div>
							<div class="large-6 columns">
						      	<label>Persona de Contacto
						        	<input type="text" placeholder="Persona de Contacto" name="persona-contacto" id="persona-contacto">
						      	</label>
						    </div>
						</div>
						<div class="row">
							<div class="large-6 columns">
						      	<label>Pagador
						        	<input type="text" placeholder="Pagador" name="pagador" id="pagador">
						      	</label>
						    </div>
						    <div class="large-3 columns">
						      	<label>Teléfono Pagador
						        	<input type="text" placeholder="Teléfono Pagador" name="telefono-pagador" id="telefono-pagador">
						      	</label>
						    </div>
						    <div class="large-3 columns">
						      	<label>Movil Pagador
						        	<input type="text" placeholder="Movil Pagador" name="movil-pagador" id="movil-pagador">
						      	</label>
						    </div>
						</div>
						<div class="row">
							<div class="large-6 columns">
						      	<label>Ciudad
						        	<select name="ciudad" id="ciudad">
						        		<option value="" disabled selected>- Seleccione una opción--</option>
						        	</select>
						      	</label>
						    </div>
						    <div class="large-6 columns">
						      	<label>Correo Electrónico
						        	<input type="text" placeholder="Correo Electrónico" name="correo" id="correo">
						      	</label>
						    </div>
						</div>
						<div class="row">
							<div class="large-6 columns">
						      	<label>Pagina Web
						        	<input type="text" placeholder="Pagina web" name="pagina-web" id="pagina-web">
						      	</label>
						    </div>
						    <div class="large-4 columns">
						      	<label>Tipo
						        	<select name="tipo-cliente" id="tipo-cliente">
						        		<option value="" disabled selected>-- Seleccione una opción--</option>
						        	</select>
						      	</label>
						    </div>
						    <div class="large-2 columns">
						      	<label>Cumpleaños
						        	<input type="text" placeholder="Cumpleaños" name="cumpleanos" id="cumpleanos">
						      	</label>
						    </div>
						</div>
						<div class="row">
							<div class="large-6 columns">
						      	<label>Descripción
						        	<textarea placeholder="Descripción" name="descrip-cliente" id="descrip-cliente"></textarea>
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
</html>