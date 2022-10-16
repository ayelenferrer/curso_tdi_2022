<?php
if (isset($_GET['r']) && !empty($_GET['r']) && $_GET['r'] != "") {

    $ruta = $_GET['r'];
    /* backend */
    if ($ruta == "menu") {
        include("menu.php");
    }
    if ($ruta == "empleados") {
        include("vistas/empleados.php");
    }
    if ($ruta == "clientes") {
        include("vistas/clientes.php");
    }
    if ($ruta == "envios") {
        include("vistas/envios.php");
    }
    if ($ruta == "registrarEmpleado") {
        include("vistas/registrarEmpleado.php");
    }
    if ($ruta == "registrarCliente") {
        include("vistas/registrarCliente.php");
    }
    if ($ruta == "registrarEnvio") {
        include("vistas/registrarEnvio.php");
    }
    if ($ruta == "editarEmpleado") {
        include("vistas/editarEmpleado.php");
    }
    if ($ruta == "editarCliente") {
        include("vistas/editarCliente.php");
    }
    if ($ruta == "editarEnvio") {
        include("vistas/editarEnvio.php");
    }

} else {

    echo ("No se encontraron parametros");
}
