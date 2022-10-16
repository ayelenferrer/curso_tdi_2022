<?php

require_once("modelos/envios_modelo.php");

$objEnvios = new envios_modelo();

if(isset($_GET['a']) && $_GET['a'] == "editar" && isset($_GET['id']) && $_GET['id'] != ""){ 
    $idRegistro = isset($_GET['id'])?$_GET['id']:"";
    $objEnvios->cargar($idRegistro);
    if (isset($_POST['submit'])) {
        {
            $objEnvios->constructor();
    
            $error = $objEnvios->guardar();
    
            if(isset($error['estado']) && $error['estado'] == 'Ok'){
                header("Location: sistema.php?r=envios");
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Editar Envio</title>
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
                    <form action="" method="POST">
                        <fieldset>
                            <ul class="form-style-1">
                                <li>
                                    <label>Id<span class="required"></span></label>
                                    <input type="text" id="identificador" name="identificador" class="field-long" value="<?=$objEnvios->obtenerIdentificador()?>" />
                                </li>
                                <li>
                                    <label>Código<span class="required"></span></label>
                                    <input type="text" id="codigo" name="codigo" class="field-long" value="<?=$objEnvios->obtenerCodigo()?>" />
                                </li>
                                <li>
                                    <label>Destinatario<span class="required"></span></label>
                                    <input type="text" id="destinatario" name="destinatario" class="field-long" value="<?=$objEnvios->obtenerDestinatario()?>" />
                                </li>
                                <li>
                                    <label>Recepción<span class="required"></span></label>
                                    <input type="text" id="fecha_recepcion" name="fecha_recepcion" class="field-long" value="<?=$objEnvios->obtenerRecepcion()?>" />
                                </li>
                                <li>
                                    <label>Envio<span class="required"></span></label>
                                    <input type="text" id="fecha_envio" name="fecha_envio" class="field-long" value="<?=$objEnvios->obtenerEnvio()?>" />
                                </li>
                                <li>
                                    <label>Calle<span class="required"></span></label>
                                    <input type="text" id="calle" name="calle" class="field-long" value="<?=$objEnvios->obtenerCalle()?>" />
                                </li>
                                <li>
                                    <label>Puerta<span class="required"></span></label>
                                    <input type="text" id="numero_puerta" name="numero_puerta" class="field-long" value="<?=$objEnvios->obtenerPuerta()?>" />
                                </li>
                                <li>
                                    <label>Apartamento<span class="required"></span></label>
                                    <input type="text" id="apartamento" name="apartamento" class="field-long" value="<?=$objEnvios->obtenerApartamento()?>" />
                                </li>
                                <li>
                                    <label>Otros<span class="required"></span></label>
                                    <input type="text" id="otros" name="otros" class="field-long" value="<?=$objEnvios->obtenerOtros()?>" />
                                </li>
                                <li>
                                    <input class="waves-effect waves-light btn blue darken-4" type="submit" name="submit" value="Enviar">
                                </li>


                            </ul>
                        </fieldset>
                    </form>
                    <?php if(isset($error['mensaje'])){ ?>
                        <div class="alert card red lighten-4 red-text text-darken-4">
                            <div class="card-content">
                                <p><i class="material-icons">report</i><span><?=$error['mensaje']?></span></p>
                            </div>
                        </div>
                    <?php }?>

                </div>
               
            </section>

        </div>
</body>