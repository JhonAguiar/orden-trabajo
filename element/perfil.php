<?php
session_start();

if ($_SESSION['valido']) {
    include "../model/General.php";
    $ciu_select = $_SESSION["ciudad"];
    include "../model/Usuario.php";
    $rol_select = $_SESSION["rol"];
    ?>

    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Perfil - OT</title>
            <link rel="stylesheet" href="../css/foundation.css">
            <link rel="stylesheet" href="../css/clientes.css">
            <link rel="stylesheet" href="../css/index.css">
            <link rel="stylesheet" href="../css/font-awesome-4.6.3/css/font-awesome.css">
            <link rel="stylesheet" href="../css/tabs.css">
            <script src="../js/vendor/jquery.js"></script>
            <link rel="stylesheet" href="../css/jquery-ui.css">
            <script src="../js/vendor/jquery-ui.js"></script>
            <script>
                $(function () {
                    $("#fec_nac").datepicker();
                });
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
                    Perfil
                </a>
            </div>
            <div class="titulo-seccion">
                <h3>Perfil</h3>
            </div>

            <div class="container">
                <form id="form-perfil" name="" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="large-3 columns" style="text-align: center">
                            <img src="<?php echo "../img/userImg/".$_SESSION['src']; ?>" alt="">
                            <input type="file" name="foto_perfil" style="display: none;"/>
                            <br><br>
                            <div>
                                <button type="button" class="button info" id="subir-foto"> SUBIR FOTO</button><br>
                                <b><span id="nom-foto"></span></b>
                                <input type="file" id="foto_perfil" name="foto" style="display: none">
                            </div>
                        </div>
                        <div class="large-9 columns">
                            <div class="row">
                                <div class="large-6 columns">
                                    <label>Nombre
                                        <input type="text" placeholder="Nombre del Usuario" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre']; ?>">
                                    </label>
                                </div>
                                <div class="large-6 columns">
                                    <label>Identificación
                                        <input type="text" placeholder="Identificación" name="documento" id="documento" value="<?php echo $_SESSION['identificacion']; ?>">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-3 columns">
                                    <label>Usuario
                                        <input type="text" placeholder="Usuario" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>">
                                    </label>
                                </div>
                                <div class="large-3 columns">
                                    <label>Fecha Nacimiento
                                        <input type="text" placeholder="Fecha de Nacimiento" name="fec_nac" id="fec_nac" value="<?php echo $_SESSION['fec_nac']; ?>">
                                    </label>
                                </div>
                                <div class="large-6 columns">
                                    <label>Dirección
                                        <input type="text" placeholder="Dirección" name="direccion" id="direccion" value="<?php echo $_SESSION['direccion'] ?>">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-6 columns">
                                    <label>Ciudad
                                        <select name="ciudad" id="ciudad" required>
                                            <option value="">-- Seleccione una opción --</option>
                                            <?php
                                            $gen = new General();
                                            $ciu = $gen->ciudad();
                                            for ($i = 0; $i < count($ciu); $i++) {
                                                if ($i + 1 == $ciu_select) {
                                                    echo '<option selected value="' . $ciu[$i]["id_ciudad"] . '">' . $ciu[$i]["ciudad"] . ' - ' . $ciu[$i]["departamento"] . '</option>';
                                                } else {
                                                    echo '<option value="' . $ciu[$i]["id_ciudad"] . '">' . $ciu[$i]["ciudad"] . ' - ' . $ciu[$i]["departamento"] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </label>
                                </div>
                                <div class="large-6 columns">
                                    <label>Correo Electronico
                                        <input type="text" placeholder="Nombre del Direccion" name="correo" id="correo" value="<?php echo $_SESSION['correo'] ?>">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-6 columns">
                                    <label>Telefono
                                        <input type="text" placeholder="Telefono" name="telefono" id="telefono" value="<?php echo $_SESSION['telefono'] ?>">
                                    </label>
                                </div>
                                <div class="large-6 columns">
                                    <label>Rol
                                        <select name="rol" id="rol">
                                            <option value="">-- Seleccione una opción --</option>
                                            <?php
                                            $usu = new Usuario();
                                            $rol = $usu->rol();
                                            for ($i = 0; $i < count($rol); $i++) {
                                                if ($i + 1 == $rol_select) {
                                                    echo '<option selected value="' . $rol[$i]["id_rol"] . '">' . $rol[$i]["rol"] . '</option>';
                                                } else {
                                                    echo '<option value="' . $rol[$i]["id_rol"] . '">' . $rol[$i]["rol"] . '</option>';
                                                }
                                            }
                                            ?>
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

        </body>
        <?php include "../tpl/menu-principal.php" ?>
        <script src="../js/vendor/foundation.min.js"></script>
        <script src="../js/menu.js"></script>
        <script src="../js/tabs.js"></script>
        <script type="text/javascript" src="../js/app/perfil.js"></script>
    </html>

    <?php
} else {
    header('location: ../index.php');
}
?>