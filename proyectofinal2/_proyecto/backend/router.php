<?php

if (isset($_GET['r']) && !empty($_GET['r']) && $_GET['r'] != "") {

    $ruta = $_GET['r'];

    if ($ruta == "clientes") {
        include("vistas/clientes.php");
    }
    if ($ruta == "clientes") {
        include("vistas/clientes.php");
    }
    if ($ruta == "clientes") {
        include("vistas/clientes.php");
    }
    if ($ruta == "clientes") {
        include("vistas/clientes.php");
    }
} else {

    echo ("No se encontraron parametros");
}
