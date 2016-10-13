<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>SITEMA DE OT</title>
		<link rel="stylesheet" href="css/foundation.css">
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		<div class="row">
			<div class="columns medium-6 medium-offset-3">
				<section id="content-login">
					<h4 class="text-center">SISTEMA GESTIÓN ORDENES DE TRABAJO</h4>
					<form action="controller/loginController.php" method="post" class="logIn.php">
						<div class="row">
							<div class="medium-12">
								<label for=""><i>Usuario</i>
									<input type="text" name="usuario" placeholder="Usuario">
								</label>
							</div>
							<div class="medium-12">
								<label for=""><i>Contraseña</i>
									<input type="password" name="clave" placeholder="Contraseña">
								</label>
							</div>
						</div>
						<div class="row">
							<div class="large-12 text-center">
								<!--<a href="inicio.php" class="button teal">Ingresar</a>-->
								<button class="button teal">Ingresar</button>
							</div>
						</div>
					</form>
					<div class="text-center">
						<a href="olvido-contrasena.php" style="color:teal; text-decoration: underline;">¿Has olvidado tu contraseña?</a>
					</div>
				</section>
				<br>
				<h5 class="text-center copyr">&copy; Copyright 2016</h5>
			</div>
		</div>
	</body>
</html>