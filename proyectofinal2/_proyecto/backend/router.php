<?php
if (isset($_GET['r']) && !empty($_GET['r']) && $_GET['r'] != "") {

    $ruta = $_GET['r'];
    /* backend */
    @session_start();
    if(isset($_SESSION['tipo'])){
        if($_SESSION['tipo']=='admin'){
            if ($ruta == "empleados") {
                include("vistas/empleados.php");
            }
            if ($ruta == "registrarEmpleado") {
                include("vistas/registrarEmpleado.php");
            }
            if ($ruta == "editarEmpleado") {
                include("vistas/editarEmpleado.php");
            }
        }
        else if($_SESSION['tipo']=='recepcionista'){
            if ($ruta == "clientes") {
                include("vistas/clientes.php");
            }
            if ($ruta == "envios") {
                include("vistas/envios.php");
            }
            if ($ruta == "registrarEnvio") {
                include("vistas/registrarEnvio.php");
            }
            if ($ruta == "registrarCliente") {
                include("vistas/registrarCliente.php");
            }
            if ($ruta == "editarCliente") {
                include("vistas/editarCliente.php");
            }
            if ($ruta == "editarEnvio") {
                include("vistas/editarEnvio.php");
            }
        }
        else if($_SESSION['tipo']=='encargado'){
            if ($ruta == "envios") {
                include("vistas/envios.php");
            }
            if ($ruta == "editarEnvio") {
                include("vistas/editarEnvio.php");
            }
            if ($ruta == "gestionarEnvio") {
                include("vistas/gestionarEnvio.php");
            }
        }
        else if($_SESSION['tipo']=='cadete'){
            if ($ruta == "editarEnvio") {
                include("vistas/editarEnvio.php");
            }
            if ($ruta == "envios") {
                include("vistas/envios.php");
            }
            if ($ruta == "gestionarEnvio") {
                include("vistas/gestionarEnvio.php");
            }
        }
        if ($ruta == "menu") {
            include("menu.php");
        }
    }
    else{
        header('Location: login.php');
    }

} else {
    include("menu.php");
}
