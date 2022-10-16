<?php

require_once("modelos/empleados_modelo.php");

$objEmpleados = new empleados_modelo();

if(isset($_GET['a']) && $_GET['a'] == "editar" && isset($_GET['id']) && $_GET['id'] != ""){ 
    $idRegistro = isset($_GET['id'])?$_GET['id']:"";
    $objEmpleados->cargar($idRegistro);
    if (isset($_POST['submit'])) {

        if($_POST['clave']!= $_POST['clave_repeticion']){
            $error['mensaje'] = "Las claves ingresadas no coinciden";
        }
        else{
    
            $objEmpleados->constructor();
    
            $error = $objEmpleados->guardar();
    
            if(isset($error['estado']) && $error['estado'] == 'Ok'){
                header("Location: sistema.php?r=empleados");
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar Empleado</title>
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
                                    <label>Email<span class="required"></span></label>
                                    <input type="text" id="email" name="email" class="field-long" value="<?=$objEmpleados->obtenerEmail()?>" />
                                </li>
                                <li>
                                    <label>Clave<span class="required"></span></label>
                                    <input type="password" id="clave" name="clave" class="field-long" />
                                </li>
                                <li>
                                    <label>Repetir clave<span class="required"></span></label>
                                    <input type="password" id="clave_repeticion" name="clave_repeticion" class="field-long"  />
                                </li>
                                <li>
                                    <label>Tipo de empleado<span class="required"></span></label>
                                    <div class="input-field col s12">
                                        <select id="tipo" name="tipo"  value="<?=$objEmpleados->obtenerTipo()?>" >
                                            <option value="" disabled>Seleccione una opcion...</option>
                                            <option value="recepcionista" <?=$objEmpleados->obtenerTipo() == 'recepcionista' ? 'selected' : '' ?>>Recepcionista</option>
                                            <option value="cadete" <?=$objEmpleados->obtenerTipo() == 'cadete' ? 'selected' : '' ?>>Cadete</option>
                                            <option value="encargado" <?=$objEmpleados->obtenerTipo() == 'encargado' ? 'selected' : '' ?>>Encargado</option>
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