<?php
if (isset($_GET['r']) && !empty($_GET['r']) && $_GET['r'] != "") {

    $ruta = $_GET['r'];
    /* backend */
    if ($ruta == "menu") {
        include("menu.php");
    }
    if ($ruta == "recepcionistas") {
        include("vistas/recepcionistas.php");
    }
    if ($ruta == "encargados") {
        include("vistas/encargados.php");
    }
    if ($ruta == "cadetes") {
        include("vistas/cadetes.php");
    }
    if ($ruta == "clientes") {
        include("vistas/clientes.php");
    }
    /* frontend */
    if ($ruta == "inicio") {
        include("../frontend/inicio.php");
    }
    if ($ruta == "servicios") {
        include("../frontend/vistas/servicios.php");
    }
    if ($ruta == "contacto") {
        include("../frontend/vistas/contacto.php");
    }
    if ($ruta == "rastrear") {
        include("../frontend/vistas/rastrear.php");
    }
    
} else {

    echo ("No se encontraron parametros");
}
