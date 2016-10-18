<?php
session_start();

if ($_SESSION['valido']) {
    //include "../db/General.php";
    $ciu_select = $_SESSION["ciudad"];
    ?>	
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Ciudades - OT</title>
            <link rel="stylesheet" href="../css/foundation.css">
            <link rel="stylesheet" href="../css/clientes.css">
            <link rel="stylesheet" href="../css/index.css">
            <link rel="stylesheet" href="../css/font-awesome-4.6.3/css/font-awesome.css">
            <link rel="stylesheet" href="../css/tabs.css">
            <script src="../js/vendor/jquery.js"></script>
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
                    Ciudades
                </a>
            </div>
            <div class="titulo-seccion">
                <h3>CIUDADES</h3>
            </div>

            <ul class="tabs">
                <li span id="taber-one">
                    LISTAR CIUDADES
                </li>
                <li id="taber-two">
                    CREAR CIUDAD
                </li>
            </ul>
            <div class="contener">
                <div class="content-one active">
                    <div class="container">
                        <table id="myTable">
                            <thead>
                                <tr>
                                    <th>Codigo DANE</th>
                                    <th>Ciudad</th>
                                    <th>Departamento</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="mostrarCiudades">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="content-two">
                    <div class="container">
                        <form id="form_ciudad" name="form_ciudad">
                            <div class="row">
                                <div class="large-6 columns">
                                    <label>Codigo DANE
                                        <input type="text" placeholder="Codigo DANE" name="codigo" id="codigo" required>
                                    </label>
                                </div>
                                <div class="large-6 columns">
                                    <label>Ciudad
                                        <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad">
                                    </label>
                                </div>
                                <div class="large-6 columns">
                                    <label>Departamento
                                        <input type="text" name="departamento" id="departamento" placeholder="Departamento">
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


                <ul class="pagination">
                    <li class="arrow unavailable" id="previous"><a href="#">&laquo;</a></li>
                    <li class="current"><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li class="unavailable"><a href="">&hellip;</a></li>
                    <li><a href="">12</a></li>
                    <li><a href="">13</a></li>
                    <li class="arrow" id="after">&raquo;</li>
                </ul>
            </div>


        </body>
        <?php include "../tpl/menu-principal.php" ?>
        <script src="../js/vendor/foundation.min.js"></script>
        <script src="../js/menu.js"></script>
        <script src="../js/tabs.js"></script>
        <script src="../js/app/ciudad.js"></script>
    </html>

    <?php
} else {
    header('location: ../index.php');
}
?>