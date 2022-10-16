<?php

require_once("modelos/clientes_modelo.php");

$objClientes = new clientes_modelo();

if(isset($_GET['a']) && $_GET['a'] == "editar" && isset($_GET['id']) && $_GET['id'] != ""){ 
    $idRegistro = isset($_GET['id'])?$_GET['id']:"";
    $objClientes->cargar($idRegistro);
    if (isset($_POST['submit'])) {
        {
            $objClientes->constructor();
    
            $error = $objClientes->guardar();
    
            if(isset($error['estado']) && $error['estado'] == 'Ok'){
                header("Location: sistema.php?r=clientes");
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar Cliente</title>
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
                                    <label>Documento<span class="required"></span></label>
                                    <input type="text" id="documento" name="documento" class="field-long" value="<?=$objClientes->obtenerDocumento()?>" />
                                </li>
                                <li>
                                    <label>Nombres<span class="required"></span></label>
                                    <input type="text" id="nombres" name="nombres" class="field-long" value="<?=$objClientes->obtenerNombres()?>" />
                                </li>
                                <li>
                                    <label>Apellidos<span class="required"></span></label>
                                    <input type="text" id="apellidos" name="apellidos" class="field-long" value="<?=$objClientes->obtenerApellidos()?>" />
                                </li>
                                <li>
                                    <label>Teléfono<span class="required"></span></label>
                                    <input type="text" id="telefono" name="telefono" class="field-long" value="<?=$objClientes->obtenerTelefono()?>" />
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