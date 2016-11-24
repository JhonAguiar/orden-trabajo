<?php
    session_start();

    if($_SESSION['valido']){
        require_once "../model/Cliente.php";
?>
<!DOCTYPE html>
<html lang="en">
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
        </div>
        <div class="titulo-seccion">
            <h3>ORDEN DE TRABAJO</h3>
        </div>

        <ul class="tabs">
            <li span id="taber-one">
                LISTAR ORDEN DE TRABAJO
            </li>
            <li id="taber-two">
                CREAR ORDEN DE TRABAJO
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
                    <div class="row">
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
                    </div>
                    <div class="row">
                        <div class="large-5 columns">
                            <label>Anunciante
                                <select name="anunciante" id="anunciante" disabled>
                                    <option value="">-- Seleccione una opción --</option>
                                </select>
                            </label>
                        </div>
                        <div class="large-4 columns">
                            <label>Nit
                                <input type="text" placeholder="nit" name="nit_anunciante" id="nit_anunciante" readonly>
                            </label>
                        </div>
                        <div class="large-3 columns">
                            <label>Tipo de OT
                                <select name="tipo_ot" id="tipo_ot">
                                    <option value="">-- Seleccione una opción --</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <label>Aplicación
                                <textarea name="" id="" cols="10" rows="2"></textarea>
                            </label>
                        </div>
                    </div>

                    <div class="contents-tab-ver">
                        <div class="vertical-one">
                            <ul>
                                <div id="vertical-tab-one">
                                    <li>Medios a monitorear</li>
                                </div>
                                <div id="vertical-tab-two">
                                    <li>Free Press</li>
                                </div>
                                <div id="vertical-tab-three">
                                    <li>Catálogo</li>
                                </div>
                                <div id="vertical-tab-four">
                                    <li>Datos del negocio</li>
                                </div>
                            </ul>
                        </div>
                        <div class="vertical-two">
                            <div class="contenete-ver-one active">
                                <div class="container">
                                    <div class="row">
                                        <div class="large-6 columns field-medios">
                                            <fieldset>
                                                <div class="row field-left">
                                                    <legend>&nbsp;&nbsp;&nbsp;<b>Medios a monitorear</b></legend>
                                                    <div class="normal-one">
                                                        <label for="valor_impresos">Valor Impresos</label>
                                                    </div>
                                                    <div class="normal">
                                                        <input type="text" id="val-impresos" name="val-impresos">
                                                    </div>
                                                    <div class="normal-one">
                                                        <label for="valor_radio">Valor Radio</label>
                                                    </div>
                                                    <div class="normal">
                                                        <input type="text" id="val-radio" name="val-radio">
                                                    </div>
                                                    <div class="normal-one">
                                                        <label for="valor_television">Valor Televisión</label>
                                                    </div>
                                                    <div class="normal">
                                                        <input type="text" id="val-television" name="val-television">
                                                    </div>
                                                    <div class="normal-one">
                                                        <label for="valor_internet">Valor Internet</label>
                                                    </div>
                                                    <div class="normal">
                                                        <input type="text" id="val-internet" name="val-internet">
                                                    </div>
                                                    <div class="normal-one">
                                                        <label for="valor_analisis">Valor Análisis</label>
                                                    </div>
                                                    <div class="normal">
                                                        <input type="text" id="val-analisis" name="val-analisis">
                                                    </div>
                                                    <div class="normal-one"><b>Total</b></div>
                                                    <div class="normal">
                                                        <input type="text" id="total" name="total" readonly>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="large-6 columns">
                                            <fieldset>
                                                <div class="row">
                                                    <legend>&nbsp;&nbsp;&nbsp;<b>Alertas</b></legend>
                                                    <div class="normal-one">
                                                        <input id="valor_impresos" type="checkbox">
                                                        <label for="valor_impresos">Alertas</label>
                                                    </div>
                                                    <div class="normal-one">
                                                        <input id="valor_impresos" type="checkbox">
                                                        <label for="valor_impresos">Free Press</label>
                                                    </div>
                                                    <div class="normal-one">
                                                        <input id="valor_impresos" type="checkbox">
                                                        <label for="valor_impresos">Publicidad</label>
                                                    </div>
                                                    <div class="normal-one">
                                                        <input id="valor_impresos" type="checkbox">
                                                        <label for="valor_impresos">Análisis</label>
                                                    </div>
                                                    <div class="normal-one">
                                                        Tipo de alerta
                                                        <input type="text">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <label>Observaciones de Cierre
                                                <textarea placeholder="Observaciones de Cierre" name="observ_cierre" id="observ_cierre"></textarea>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contenete-ver-two">
                                <div class="container">
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <label>Marca
                                                <textarea placeholder="Marca" name="marca" id="marca"></textarea>
                                            </label>
                                        </div>
                                        <div class="large-12 columns">
                                            <label>Entorno
                                                <textarea placeholder="Entorno" name="entorno" id="entorno"></textarea>
                                            </label>
                                        </div>
                                        <div class="large-12 columns">
                                            <label>Competencias
                                                <textarea placeholder="Competencias" name="competencias" id="competencias"></textarea>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contenete-ver-three">
                                <div class="container">
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <label>Sectores
                                                <textarea placeholder="Sectores" name="sectores" id="sectores"></textarea>
                                            </label>
                                        </div>
                                        <div class="large-12 columns">
                                            <label>Catégoria
                                                <textarea placeholder="Catégoria" name="categoria" id="categoria"></textarea>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contenete-ver-four">
                                <div class="container">
                                    <div class="row">
                                        <div class="large-6 columns">
                                            <label>Actividad
                                                <select name="actividad" id="actividad">
                                                    <option value="">-- Seleccione una opción --</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="large-6 columns">
                                            <label>Comercial
                                                <select name="comercial" id="comercial">
                                                    <option value="">-- Seleccione una opción --</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="large-6 columns">
                                            <label>Numéro de Factura
                                                <input type="text" name="factura" id="factura">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h6>&nbsp;&nbsp;&nbsp;<b>Vigencia del contrato</b></h6>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="large-4 columns">
                                            <label>Desde
                                                <input type="text" name="desde" id="desde" placeholder="Desde">
                                            </label>
                                        </div>
                                        <div class="large-4 columns">
                                            <label>Hasta
                                                <input type="text" name="hasta" id="hasta" placeholder="Hasta">
                                            </label>
                                        </div>
                                        <div class="large-2 columns">
                                            <br>
                                            <label>
                                                <input type="text" name="dias" id="dias" readonly>
                                            </label>
                                        </div>
                                        <div class="large-2 columns">
                                            <br><h3>DIAS</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <label>Observaciones
                                                <textarea placeholder="Observaciones" name="observaciones" id="observaciones"></textarea>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php include "../tpl/menu-principal.php" ?>
    <script src="../js/vendor/foundation.min.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/tabs.js"></script>
    <script src="../js/vertical-tab.js"></script>
    <!--<script src="../js/vista-previa.js"></script>-->
    <script src="../js/app/orden-trabajo.js"></script>
</html>
<?php
    }else{
        header('location: ../index.php');
    }

?>