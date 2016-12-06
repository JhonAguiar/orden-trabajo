<?php
    session_start();

    if($_SESSION['valido']){

        require_once "../model/Cliente.php";
        require_once "../model/OrdenTrabajo.php";
?>
<!DOCTYPE html>
<html lang="en">s
    <head>
        <meta charset="UTF-8">
        <title>Orden de Trabajo - OT</title>
        <link rel="stylesheet" href="../css/foundation.css">
        <link rel="stylesheet" href="../css/clientes.css">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/font-awesome-4.6.3/css/font-awesome.css">
        <link rel="stylesheet" href="../css/tabs.css">
        <link rel="stylesheet" href="../css/vertical-tab.css">
        <script src="../js/vendor/jquery.js"></script>
        <link rel="stylesheet" href="../css/jquery-ui.css">
        <script src="../js/vendor/jquery-ui.js"></script>
        <script>
            $( function() {
                $( "#desde" ).datepicker();
                $( "#hasta" ).datepicker();     
            } );
        </script>
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
                Orden de Trabajo
            </a>
        </div>s
        <div class="titulo-seccion">
            <h3>APROBACIÓN</h3>
        </div>

		<div class="container">
			<div class="row">
				<table>
					<thead>
						<tr>
							<th>No. Factura</th>
							<th>Cliente</th>
							<th>Ap. Comercial</th>
							<th>Ap. Servicio al Cliente</th>
							<th>Ap. Operaciones</th>
							<th>Estado</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
    </body>
    <?php include "../tpl/menu-principal.php" ?>
    <script src="../js/vendor/foundation.min.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/tabs.js"></script>
    <script src="../js/vertical-tab.js"></script>
    <script src="../js/app/aprobacion.js"></script>
</html>
<?php
    }else{
        header('location: ../index.php');
    }

?>