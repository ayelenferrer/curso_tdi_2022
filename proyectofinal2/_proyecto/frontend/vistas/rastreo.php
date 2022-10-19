<?php 
    require_once("php/modelos/envios_modelo.php");

    $objEnvios = new envios_modelo();

    if(isset($_GET['codigo']) && $_GET['codigo'] != ""){
        $codigo = isset($_GET['codigo'])?$_GET['codigo']:"";
        $retorno = $objEnvios->cargarCodigo($codigo);
        if(isset($retorno['codigo']) && $retorno['codigo']=='Error'){
            header("Location: index.php?r=rastrear");
        } 
    } 
    else{
        header("Location: index.php?r=rastrear");
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rastrear</title>
</head>

<body>
 
    <!-- START CONTENT -->
    <section id="content">
        <!--start container-->
        <div class="container">
        <div class="row">
                    <div class="col s6">
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Codigo</h5>
                            <p><?=$objEnvios->obtenerCodigo()?> </p>
                        </div>
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Destinatario</h5>
                            <p><?=$objEnvios->obtenerDestinatario()?> </p>
                        </div>
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Fecha envio</h5>
                            <p><?=$objEnvios->obtenerEnvio()?> </p>
                        </div>
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Fecha de recepcion</h5>
                            <?php
                            $recepcion = $objEnvios->obtenerRecepcion();
                                if(!isset($recepcion)){
                                    echo '<p class="red-text text-darken-2">NO RECIBIDO</p>';
                                }
                                else{
                                    echo '<p>'.$recepcion.'</p>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Estado</h5>
                            <?php
                                $estado = $objEnvios->obtenerEstado();
                                if($estado=='pendiente'){
                                    echo '<p class="blue-text text-darken-2">PENDIENTE</p>';
                                }
                                if($estado=='en_reparto'){
                                    echo '<p class="yellow-text text-darken-2">EN CAMINO</p>';
                                }
                                if($estado=='en_camino'){
                                    echo '<p class="yellow-text text-darken-2">EN CAMINO</p>';
                                }
                                if($estado=='entregado'){
                                    echo '<p class="green-text text-darken-2">ENTREGADO</p>';
                            }
                            ?> 
                        </div>
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Ciudad destino</h5>
                            <p><?=$objEnvios->obtenerCiudad()?> </p>
                        </div>
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Direccion</h5>
                            <p><?=$objEnvios->obtenerCalle(). " - Nº ".$objEnvios->obtenerPuerta(). " - Dpto " .$objEnvios->obtenerApartamento()?> </p>
                        </div>
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Cliente</h5>
                            <p><?=$objEnvios->obtenerCliente()?> </p>
                        </div>
                        
                    </div>
                </div>
        </div>
    </section>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });
    </script>
</body>