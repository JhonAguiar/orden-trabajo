<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Sistema de Gestion de Ordenes de Trabajo</title>
		<link rel="stylesheet" href="css/foundation.css">
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/font-awesome-4.6.3/css/font-awesome.css">
	</head>
	<body>
		<?php include "tpl/header.php"; ?>
		<?php include "tpl/menu.php" ; ?>
		<section class="row">
			<div class="small-12 large-offset-2 large-8 columns">
				<h2 class="text-center title-prin">Generación de Ordenes de Trabajo</h2>
				<div class="row">
					<div class="columns large-3">
						<a href="" id="comunidad">
							<div class="card">
								<div class="row">
									<div class="large-12 columns">
										<i class="fa fa-newspaper-o"></i>
									</div>
									<div class="large-12 columns">
										<span>Noticias</span>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="columns large-3">
						<a href="#" id="cursos"> 	
							<div class="card">
								<div class="row">
									<div class="large-12 columns">
										<i class="fa fa-book"></i>
									</div>
									<div class="large-12 columns">
										<span>Manual</span>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="columns large-3">
						<a href="" id="ejercicios">
							<div class="card">
								<div class="row">
									<div class="large-12 columns">
										<i class="fa fa-info"></i>
									</div>
									<div class="large-12 columns">
										<span>Ayuda</span>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="columns large-3">
						<a href="element/perfil.php" id="ingreso">
							<div class="card">
								<div class="row">
									<div class="large-12 columns">
										<i class="fa fa-user"></i>
									</div>
									<div class="large-12 columns">
										<span>Mi Perfil</span>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
		
		<?php include "tpl/page-home.php" ?>

		<?php include "tpl/footer.php" ?>

		<?php include "tpl/menu-prin.php" ?>
	</body>
	<script src="js/vendor/jquery.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/view.js"></script>
</html>