<?php
session_start();

	if ($_SESSION['valido']) {
	    //include "../db/General.php";
	    $ciu_select = $_SESSION["ciudad"];
?>	
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Anunciantes - OT</title>
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
					Anunciantes
				</a>
			</div>
			<div class="titulo-seccion">
				<h3>ANUNCIANTES</h3>
			</div>
			
			<ul class="tabs">
				<li span id="taber-one">
					LISTAR ANUNCIANTES
				</li>
				<li id="taber-two">
					CREAR ANUNCIANTE
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
						<form id="" name="">
							<div class="row">
								<div class="large-6 columns">
							      	<label>Cliente
							        	<select name="cliente" id="cliente">
							        		<option>-- Seleccione una opción --</option>
							        	</select>
							      	</label>
							    </div>
							</div>
							<div class="row">
								<div class="large-6 columns">
							      	<label>Anunciante
							        	<input type="text" placeholder="Nombre del Anunciante" name="anunciante" id="anunciante">
							      	</label>
							    </div>
							    <div class="large-6 columns">
							      	<label>Sector
							        	<input type="text" placeholder="Nombre del Sector" name="sector" id="sector">
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
<?php
	}else{
		header("location: ../index.php")
	}

?>