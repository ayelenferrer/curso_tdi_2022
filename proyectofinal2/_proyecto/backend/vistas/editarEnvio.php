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

    <script>
        $(document).ready(function(){
            $('select').material_select();
        });
    </script>
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
                                    <label>Destinatario<span class="required"></span></label>
                                    <input type="text" id="destinatario" name="destinatario" class="field-long" value="<?=$objEnvios->obtenerDestinatario()?>" />
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
                                    <label>Estado<span class="required"></span></label>
                                    <div class="input-field col s12">
                                        <select id="estado" name="estado"  value="<?=$objEnvios->obtenerEstado()?>" >
                                            <option value="" disabled>Seleccione una opcion...</option>
                                            <option value="pendiente" <?=$objEnvios->obtenerEstado() == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                                            <option value="en_reparto" <?=$objEnvios->obtenerEstado() == 'en_reparto' ? 'selected' : '' ?>>En reparto</option>
                                            <option value="en_camino" <?=$objEnvios->obtenerEstado() == 'en_camino' ? 'selected' : '' ?>>En camino</option>
                                            <option value="entregado" <?=$objEnvios->obtenerEstado() == 'entregado' ? 'selected' : '' ?>>Entregado</option>
                                        </select>
                                    </div>
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