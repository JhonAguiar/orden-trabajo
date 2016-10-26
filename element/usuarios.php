<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Usuarios - OT</title>
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
		</menu>f
		<div class="miga-pan">
			<a href="../inicio.php">
				Home
			</a>
			/
			<a>
				Usuarios
			</a>
		</div>
		<div class="titulo-seccion">
			<h3>USUARIOS</h3>
		</div>
		
		<ul class="tabs">
			<li span id="taber-one">
				LISTAR USUARIOS
			</li>
			<li id="taber-two">
				CREAR USUARIO
			</li>
		</ul>
		<div class="contener">
			<div class="content-one active">
				<div class="container">
					<table id="mostrarUsuario">
						<thead>
							<tr>
								<th>Identificación</th>
								<th>Nombre</th>
								<th>Telefono</th>
								<th>dirección</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
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
					<form id="form-user" name="form-user">
						<div class="row">
							<div class="large-3 columns" style="text-align: center">
								<img src="../img/no-photo.png" alt="">
								<br><br>
								<div>
									<button class="button info"> SUBIR FOTO</button>
								</div>
							</div>
							<div class="large-9 columns">
								<div class="row">
									<div class="large-6 columns">
								      	<label>Nombre
								        	<input type="text" placeholder="Nombre del Usuario" name="nombre" id="nombre">
								      	</label>
								    </div>
								    <div class="large-6 columns">
								      	<label>Identificación
								        	<input type="text" placeholder="Identificación" name="nombre" id="nombre">
								      	</label>
								    </div>
								</div>
								<div class="row">
									<div class="large-3 columns">
								      	<label>Usuario
								        	<input type="text" placeholder="Usuario" name="usuario" id="usuario">
								      	</label>
								    </div>
									<div class="large-3 columns">
								      	<label>Fecha Nacimiento
								        	<input type="text" placeholder="Fecha de Nacimiento" name="fec_nac" id="fec_nac">
								      	</label>
								    </div>
								    <div class="large-6 columns">
								      	<label>Dirección
								        	<input type="text" placeholder="Dirección" name="direccion" id="direccion">
								      	</label>
								    </div>
								</div>
								<div class="row">
									<div class="large-6 columns">
								      	<label>Ciudad
								        	<select name="ciudad" id="ciudad">
								        		<option value="">-- Seleccione una opción --</option>
								        	</select>
								      	</label>
								    </div>
								    <div class="large-6 columns">
								      	<label>Correo Electronico
								        	<input type="text" placeholder="Nombre del Direccion" name="sector" id="sector">
								      	</label>
								    </div>
								</div>
								<div class="row">
									<div class="large-6 columns">
								      	<label>Contraseña
								        	<input type="password" placeholder="Contraseña" name="pass" id="pass">
								      	</label>
								    </div>
								    <div class="large-6 columns">
								      	<label>Repetir Contraseña
								        	<input type="password" placeholder="Repetir Contraseña" name="pass2" id="pass2">
								      	</label>
								    </div>
								</div>
								<div class="row">
									<div class="large-6 columns">
								      	<label>Telefono
								        	<input type="text" placeholder="Nombre del Anunciante" name="anunciante" id="anunciante">
								      	</label>
								    </div>
								    <div class="large-6 columns">
								      	<label>Rol
								        	<select name="anunciante" id="anunciante">
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
	<script src="../js/app/usuario.js"></script>
</html>