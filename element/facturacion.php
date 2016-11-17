<?php
	session_start();
	if($_SESSION['valido']){
		include "../model/Cliente.php";
		include "../model/Facturacion.php";
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Facturación - OT</title>
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
				Facturación
			</a>
		</div>
		<div class="titulo-seccion">
			<h3>FACTURACIÓN</h3>
		</div>
		
		<ul class="tabs">
			<li span id="taber-one">
				LISTAR FACTURAS
			</li>
			<li id="taber-two">
				CREAR FACTURACIÓN
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
					<div class="row">
						<div class="large-2 columns">
					      	<label>Numéro de factura
					        	<input type="text" name="nombre_cliente" id="nombre_cliente" readonly>
					      	</label>
					    </div>
						<div class="large-6 columns">
					      	<label>Nombre Cliente
					        	<select name="nombre_cliente" id="nombre_cliente">
					        		<option value="">-- Seleccione una opción --</option>
					        		<?php
                                        $cli = new Cliente();
                                        $clien = $cli->cliente();
                                        for ($i=0; $i < count($clien) ; $i++) { 
                                            echo '<option value="'.$clien[$i]["id_cliente"].'">'.$clien[$i]["cliente"].'</option>';
                                        }
                                    ?>   			
					        	</select>
					      	</label>
					    </div>
					    <div class="large-4 columns">
					      	<label>Nombre Corto
					        	<input type="text" name="nombre_cliente" id="nombre_cliente" readonly>
					        </label>
					    </div>
					</div>
					<div class="row">
					 	<div class="large-6 columns">
					      	<label>NIT
					        	<input type="text" name="nit" id="nit" readonly>
					        </label>
					    </div>
					    <div class="large-6 columns">
					      	<label>Fecha de Factura
					        	<input type="text" name="fecha_factura" id="fecha_factura">
					      	</label>
					    </div>
					    <div class="large-6 columns">
					      	<label>Dirección
					        	<input type="text" name="direccion" id="direccion">
					        </label>
					    </div>
					    <div class="large-6 columns">
					      	<label>Teléfono
					        	<input type="text" name="telefono" id="telefono">
					        </label>
					    </div>
					</div>
					<div class="row">
						<div class="large-3 columns">
					      	<label>Orden
					        	<input type="text" name="orden" id="orden">
					        </label>
					    </div>
					    <div class="large-3 columns"><br>
					    	<input id="valor_internet" type="checkbox">
							<label for="valor_internet">Factura IVA</label>
					    </div>
					    <div class="large-6 columns">
					      	<label>Tipo de Moneda
					        	<select name="tipo_moneda" id="tipo_moneda">
					        		<option value="">-- Seleccione una opción --</option>
					        		<?php
                                        $mon = new Facturacion();
                                        $mone = $mon->moneda();
                                        for ($i=0; $i < count($mone) ; $i++) { 
                                            echo '<option value="'.$mone[$i]["id_tipo_moneda"].'">'.$mone[$i]["descripcion"].'</option>';
                                        }
                                    ?>  
					        	</select>
					      	</label>
					    </div>
					</div>
					<div class="row">
						<div class="large-12 columns text-center">
							<button class="btn-sender">Ver Información Facturación</button>
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="large-12 columns">
							<table>
								<thead>
									<tr>
										<th>OT No</th>
										<th>Nit CLIENTE</th>
										<th>Nombre</th>
										<th>Valor OT</th>
										<th>Facturar</th>
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
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="large-12 columns text-center">
							<button class="btn-sender">Agregar Información Secundaria</button>
							<hr>
						</div>
					</div>
					<div class="row">
						<table>
							<thead>
								<tr>
									<th>CANTIDAD</th>
									<th>DESCRIPCIÓN</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="large-12 columns text-right">
							<button class="btn-send">Grabar</button>
							<hr>
						</div>
					</div>
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
<?php
	}else{
		header('location: ../index.php');
	}
?>