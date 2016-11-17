<?php
session_start();

if($_SESSION['valido']){
	require_once "../model/Cliente.php";
	require_once "../model/General.php";
?>
<!DOCTYPE html>
	<html lang="es">
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
					<div class="conteneter-tabla">
						<table>
							<thead>
								<tr>
									<th>Nit</th>
									<th>Cliente</th>
									<th>Telefono</th>
									<th>Dirección</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody id="listarClientes">
							
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="content-two">
				<div class="container">
					<form id="form-cliente" name="form-cliente">
						<div class="row">
							<div class="large-4 columns">
						      	<label>Fecha
						        	<input type="text" placeholder="Fecha" name="fecha" id="fecha" value="<?php echo date('Y-m-d')?>" readonly>
						      	</label>
						    </div>
						</div>
						<div class="row">
							<div class="large-6 columns">
						      	<label>Nombre del Cliente
						        	<input type="text" placeholder="Nombre del Cliente" name="cliente" id="cliente" required>
						      	</label>
						    </div>
						    <div class="large-5 columns">
						      	<label>Nit
						        	<input type="text" placeholder="Nit" name="nit" id="nit" required>
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
						        	<input type="text" placeholder="Persona de Contacto" name="persona-contacto" id="persona-contacto" required>
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
						        	<input type="text" placeholder="Teléfono Pagador" name="telefono-pagador" id="telefono-pagador" required>
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
						        	<label>
							    	<select id="ciudad" name="ciudad" >
							    		<option value="">-- Seleccione una opción --</option>
										<?php 
						        			$gen = new General();
											$ciu = $gen->ciudad();
											for ($i=0; $i < count($ciu) ; $i++) { 
												echo '<option value="'.$ciu[$i]["codigo"].'">'.$ciu[$i]["ciudad"].' - '.$ciu[$i]["departamento"].'</option>';
											}
						        		?>
							        </select> 
								</label>
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
						    
						    <div class="large-6 columns">
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
						    <div class="large-6 columns">
						      	<label>Dirección
						        	<input type="text" placeholder="Dirección" name="direccion" id="direccion">
						      	</label>
						    </div>
						</div>
						<div class="row">
							<div class="large-6 columns">
						      	<label>Consecutivo
						        	<input type="text" placeholder="Consecutivo" name="consecutivo" id="consecutivo" required>
						      	</label>
						    </div>
						    <div class="large-4 columns">Tipo Cliente
						    	<label>
							    	
							        <select id="listaClientes">
							          	<option label="Chrome" value="Chrome">
							          	<option label="Firefox" value="Firefox">
							          	<option label="Internet Explorer" value="Internet Explorer">
							          	<option label="Safari" value="Safari">          
							        </select> 
								</label>
						    </div>
						</div>
						<hr>
						<div class="row">
							<div class="large-12 columns text-right">
								<button class="button warning" type="reset"> <i class="fa fa-send"></i> Limpiar</button>
								<button class="button success" type="submit"> <i class="fa fa-send"></i> Enviar</button>
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
	<script src="../js/app/clientes.js"></script>
</html>

<?php
	}else{
		header('location: ../index.php');
	}
?>