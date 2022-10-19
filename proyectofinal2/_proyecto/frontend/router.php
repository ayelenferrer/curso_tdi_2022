<?php
if (isset($_GET['r']) && !empty($_GET['r']) && $_GET['r'] != "") {

    $ruta = $_GET['r'];
 
    /* frontend */
    if ($ruta == "inicio") {
        include("inicio.php");
    }
    if ($ruta == "contacto") {
        include("vistas/contacto.php");
    }
    if ($ruta == "rastrear") {
        include("vistas/rastrear.php");
    }
    if ($ruta == "rastreo") {
        include("vistas/rastreo.php");
    }
    if ($ruta == "servicios") {
        include("vistas/servicios.php");
    }

} else {
    include("inicio.php");
}
