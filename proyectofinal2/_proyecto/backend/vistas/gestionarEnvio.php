<?php

require_once("modelos/envios_modelo.php");

$objEnvios = new envios_modelo();

if(isset($_POST['submitReparto'])){
    $id = $_POST['idEnvio'];
    $objEnvios->actualizarEstado('en_reparto',$id);
}
if(isset($_POST['submitCamino'])){
    $id = $_POST['idEnvio'];
    $objEnvios->actualizarEstado('en_camino',$id);
}
if(isset($_POST['submitEntregado'])){
    $id = $_POST['idEnvio'];
    $objEnvios->actualizarEstado('entregado',$id);
}
if(isset($_POST['codigo']) && $_POST['codigo'] != ""){
    $codigo = isset($_POST['codigo'])?$_POST['codigo']:"";
    $retorno = $objEnvios->cargarCodigo($codigo);
} 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Entregar envio</title>
    <style>
        span {
            font-weight: bold;
            font-size: 1.1em;
            margin-right:4px;
        }
        .material-icons {
            font-size: 1.5em;
            position: relative;
            top: 5px;
            margin-right: 0.5em;
        }	
        .dropdown-content li>a, .dropdown-content li>span {
            color:rgb(13,71,161);
        }
    </style>
</head>

<body>
            <!-- START CONTENT -->
            <section id="content">
                <!--start container-->
                <div class="container">
                    <div class="section">
                        <h5>Ingrese el codigo del envio</h5>
                        <div class="divider"></div>
                    </div>
                <nav>
                    <div class="nav-wrapper">
                        <form action="" method="POST"> 
                            <div class="input-field grey lighten-2">
                                <input id="codigo" name='codigo' type="search" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>
                    <br>
                </nav>
                <br>
                <?php if(isset($retorno['codigo']) && $retorno['codigo']=='OK'){?>
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
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Calle</h5>
                            <p><?=$objEnvios->obtenerCalle()?> </p>
                        </div>
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Numero de puerta</h5>
                            <p><?=$objEnvios->obtenerPuerta()?> </p>
                        </div>
                    </div>
                    <div class="col s6">
                     
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Apartamento</h5>
                            <p><?=$objEnvios->obtenerApartamento()?> </p>
                        </div>
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Otros</h5>
                            <p><?=$objEnvios->obtenerOtros()?> </p>
                        </div>
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Cliente</h5>
                            <p><?=$objEnvios->obtenerCliente()?> </p>
                        </div>
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Ciudad</h5>
                            <p><?=$objEnvios->obtenerCiudad()?> </p>
                        </div>
                        <div class="divider"></div>
                        <div class="section">
                            <h5>Estado</h5>
                            <?php
                                $estado = $objEnvios->obtenerEstado();
                                if($estado=='pendiente'){
                                    echo '<p class="blue-text text-darken-2">PENDIENTE</p>';
                                }
                                if($estado=='en_reparto'){
                                    echo '<p class="orange-text text-darken-2">EN REPARTO</p>';
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
                            <form method="POST">
                                <input id="idEnvio" name="idEnvio" type="hidden" value="<?=$objEnvios->obtenerIdentificador()?>">
                                <input id="codigo" name="codigo" type="hidden" value="<?=$objEnvios->obtenerCodigo()?>">
                                <?php
                                    if($estado != 'entregado'){
                                        echo '<h5>Acciones</h5>';
                                    }
                                    if($estado=='pendiente'){
                                        echo ' <input class="waves-effect waves-light btn blue darken-4" type="submit" id="submitReparto" name="submitReparto" value="Marcar como en reparto">';
                                    }
                                    if($estado=='en_reparto'){
                                        echo ' <input class="waves-effect waves-light btn blue darken-4" type="submit" id="submitCamino" name="submitCamino" value="Marcar como en camino">';
                                    }
                                    if($estado=='en_camino'){
                                        echo ' <input class="waves-effect waves-light btn blue darken-4" type="submit" id="submitEntregado" name="submitEntregado" value="Marcar como entregado">';
                                    }
                                ?> 
                            </form>
                        </div>
                    </div>
                </div>
                    <?php 
                    }
                    else if(isset($retorno['codigo']) && $retorno['codigo']=='Error'){ ?>
                        <div class="alert card red lighten-4 red-text text-darken-4">
                            <div class="card-content">
                                <p><i class="material-icons">report</i><span><?=$retorno['mensaje']?></span></p>
                            </div>
                        </div>
                    <?php }?>

                </div>
               
            </section>

        </div>
</body>