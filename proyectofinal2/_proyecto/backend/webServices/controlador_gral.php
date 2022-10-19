
<?php

require_once("controlador_clientes.php");
require_once("controlador_ciudades.php");
       
$retorno = array();
if(isset($_GET['c']) && !Empty($_GET['c']) && $_GET['c'] != ""){

    $accion 	= $_GET['c'];	
    $parametros = array();
    if(isset($_GET['filtro'])){
        $filtro = $_GET['filtro'];
        $parametros['filtro'] = $filtro;
    }
    if($accion == "listarClientes"){
        $objClientes 	= new controlador_clientes();
        $retorno 	= $objClientes->listarClientes($parametros);		
    }
    else if($accion == "listarCiudades"){
        $objCiudades 	= new controlador_ciudades();
        $retorno 	= $objCiudades->listarCiudades($parametros);		
    }

}

//Realizo el encodin de json y lo muestro en pantalla
$json = json_encode($retorno);
print_r($json);

?>

